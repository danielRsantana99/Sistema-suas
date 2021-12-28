<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";
include "../Model/Familiar.php";

try {
    
    $cadastro = 0;
    $use = new formularioModel();
    $use2 = new familiarModel();
    $result = '';
    $nome = $_POST['nome_beneficiario']; 
    $sexo= $_POST['sexo']; 
    $data_nascimento = $_POST['data_nascimento'];
    $estado_civil = $_POST['estado_civil'];
    $escolaridade_beneficiario = $_POST['escolaridade_beneficiario'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco']; 
    $ponto_referencia = $_POST['ponto_referencia'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $titulo_eleitoral = $_POST['titulo_eleitoral'];
    $zona = $_POST['zona']; 
    $secao = $_POST['secao'];
    $nis = $_POST['nis'];
    $empregado = $_POST['empregado'];
    $renda_propria = $_POST['renda_propria'];
    $bolsa_familia = $_POST['bolsa_familia']; 
    $quanto_bolsa_familia = $_POST['quanto_bolsa_familia'];
    $moradia = $_POST['moradia'];
    $quanto_moradia = $_POST['valor_aluguel'];
    $tipo_moradia = $_POST['tipo_moradia'];
    $qual_tipo = $_POST['qual_tipo']; 
    $numero_comodos = $_POST['numero_comodos'];
    $presenca_idoso = $_POST['presenca_idoso'];
    $presenca_gestante = $_POST['presenca_gestante'];
    $meses_gestantes = $_POST['meses_gestantes'];
    $presenca_deficiente = $_POST['presenca_deficiente'];
    $qual_deficiente = $_POST['qual_deficiente'];
    $agua_filtrada = $_POST['agua_filtrada'];
    $qual_agua_filtrada = $_POST['qual_agua_filtrada'];
    $parecer_tecnico = $_POST['parecer_tecnico'];
    $situacao = $_POST['situacao'];
    
//-------CALCULAR IDADE-----------------------------------------------------------/

    // separando yyyy, mm, ddd
    list($ano, $mes, $dia) = explode('-', $data_nascimento);

    // data atual
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // cálculo
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
//--------------------------------------------------------------------------------/
//----------------FUNÇÃO PARA VALIDAR CPF--------------------//
    function  validaCPF($cpf) {
     
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    } 
//-----------------------------------------------------------//     
    $cpfvalido = validaCPF($cpf); 
    $validar = $use->pesquisar_formulario_validar($conexao,$nome,$cpf,$rg);
    foreach ($validar as $key => $value) {
        $cadastro = $value['id'];
    }

    if($cadastro == 0 && $cpfvalido == true){
        $use->cadastrar_formulario($conexao,$nome,$sexo,$data_nascimento,$idade,$estado_civil,$escolaridade_beneficiario,$endereco,$ponto_referencia,$telefone,$rg,$cpf,$titulo_eleitoral,$zona,$secao,$nis,$empregado,$renda_propria,$bolsa_familia,$quanto_bolsa_familia,$moradia,$quanto_moradia,$tipo_moradia,$qual_tipo,$numero_comodos,$presenca_idoso,$presenca_gestante,$meses_gestantes,$presenca_deficiente,$qual_deficiente,$agua_filtrada,$qual_agua_filtrada,$parecer_tecnico,$_SESSION['id'],$situacao,'ATIVADO');
            $id_beneficiario= $conexao->lastInsertId();

        foreach ( $_POST['nome_familiar'] as $key => $value) {
            $nome_familiar = $_POST['nome_familiar'][$key];
            $sexo_familiar = $_POST['sexo_familiar'][$key];
            $parentesco = $_POST['parentesco'][$key];
            $idade_familiar = $_POST['idade_familiar'][$key];
            $escolaridade = $_POST['escolaridade_familiar'][$key];
            $renda_familiar = $_POST['renda_familiar'][$key];
            $profissao_familiar = $_POST['profissao_familiar'][$key];

            $use2->cadastrar_composicao_familiar($conexao,$id_beneficiario,$nome_familiar,$sexo_familiar,$parentesco,$idade_familiar,$escolaridade,$renda_familiar,$profissao_familiar);
        }   
          
        foreach ( $_POST['beneficios'] as $key => $value) {
            $id_beneficios = $_POST['beneficios'][$key];
            $tempo_beneficio = $_POST['tempo_beneficio'][$key];
       
            $use->cadastrar_relacao_beneficio_beneficiario($conexao,$id_beneficiario,$id_beneficios,$tempo_beneficio);
               
        }   

        $_SESSION['idFormulario'] = $id_beneficiario;
        $_SESSION['status'] = 2;
        

        header("location:../View/cadastrar-formulario.php");
        }else{

        if($cpfvalido  == false){
            $_SESSION['mensagem'] = 'cpf invalido!!!';
            $_SESSION['status'] = 0; 
        }else{
            $_SESSION['mensagem'] = 'beneficiario ja cadastrado no sistema!!!';
            $_SESSION['status'] = 0;
        }
        header("location:../View/cadastrar-formulario.php");
    }


    

        
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'beneficiario ja cadastrado no sistema!!!';
    $_SESSION['status'] = 0;
   //header("location:../View/painel.php");
   echo $exc;
}
?>
