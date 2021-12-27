<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {
    
    $use = new beneficiosModel();
    $id_beneficiario = $_POST['id_beneficiario']; 
    $entregue = 'SIM'; 
    $entregas= 0;
    
        function validaRecebimento($conexao,$use,$id_beneficiario,$id_beneficio,$data) {
        $validar = 0;
        $res = $use->verificar_recebimento($conexao,$id_beneficiario,$id_beneficio,$data);
            foreach ($res as $key => $value) {
                $validar = $value['nome'];

        }
        return $validar;

        }

    foreach ($_POST['beneficios'] as $key => $value){
        $id_beneficio = $_POST['beneficios'][$key]; 
        $data = $_POST['data_recebimento'][$key];
        $validacao = validaRecebimento($conexao,$use,$id_beneficiario,$id_beneficio,$data);

        if($validacao == 0){      
            $use->cadastrar_recebimento($conexao,$id_beneficiario,$id_beneficio,$entregue,$data); 
        }else{
            $entregas++;
            $arrayDuplicados[] = $data; 
        }
        
    }

    if($entregas > 0){
        $_SESSION['mensagem'] = "foi encontrado $entregas cadastrados ja presente no sistema. as duplicadas são:";
            foreach ($arrayDuplicados as $key => $value) {

                $dataencontrada = $value;
                $_SESSION['mensagem'] .="$dataencontrada,";
            }
            
        $_SESSION['mensagem'].=".Eles não foram registrados novamente";
        $_SESSION['status'] = 0;  
    }else{
        $_SESSION['status'] = 1;    
    }
    
    header("location:../View/pesquisar_formulario.php");
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'Este recebimento ja está cadastrado no sistema!!!';
    $_SESSION['status'] = 0;
    header("location:../View/pesquisar_formulario.php");
    //echo $exc;
}
?>