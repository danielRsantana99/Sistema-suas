<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {
    
    $use = new beneficiosModel();
    $id_beneficiario = $_POST['id_beneficiario']; 
    $_SESSION['recebimento'] = $id_beneficiario; 
    $entregue = 'SIM'; 
    $id_beneficio = $_POST['beneficios']; 
    $data = $_POST['data_recebimento'];
    
        function validaRecebimento($conexao,$use,$id_beneficiario,$id_beneficio,$data) {
        $validar = 0;
        $res = $use->verificar_recebimento($conexao,$id_beneficiario,$id_beneficio,$data);
            foreach ($res as $key => $value) {
                $validar = $value['nome'];

        }
        return $validar;

        }

        $validacao = validaRecebimento($conexao,$use,$id_beneficiario,$id_beneficio,$data);

        if($validacao == 0){      
            $use->cadastrar_recebimento($conexao,$id_beneficiario,$id_beneficio,$entregue,$data);
            $_SESSION['status'] = 1; 

        }else{
            $_SESSION['mensagem'] = "esse recebimento  ja está cadastrado no sistema!!!";
            $_SESSION['status'] = 0;

        }
        
    
    header("location:../View/adicionar_recebimento.php");
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'Este recebimento ja está cadastrado no sistema!!!';
    $_SESSION['status'] = 0;
    header("location:../View/pesquisar_formulario.php");
    //echo $exc;
}
?>