<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {
    
    $use = new beneficiosModel();
    $id_beneficiario = $_POST['id_beneficiario']; 
    $entregue = 'SIM'; 

    function  validaRecebimento($conexao,$id_beneficiario,$id_beneficio,$data) {
    $use2 = new beneficiosModel();
    $res = $use2->verificar_recebimento($conexao,$id_beneficiario,$id_beneficio,$data);
    foreach ($res as $key => $value) {
        $validar = $value['id'];
    }
    if ($validar < 1) {
         return true;
    }else{
         return false;
    }
   

    }
    foreach ( $_POST['beneficios'] as $key => $value){
        $id_beneficio = $_POST['beneficios'][$key]; 
        $data = $_POST['data_recebimento'][$key];
        $validacao = validaRecebimento($conexao,$id_beneficiario,$id_beneficio,$data);
        if($validacao == true){
            //$use->cadastrar_recebimento($conexao,$id_beneficiario,$id_beneficio,$entregue,$data); 
            $_SESSION['status'] = 1;
        }else{
            $_SESSION['status'] = 0;
        }
    }

    
    header("location:../View/pesquisar_formulario.php");
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'Este recebimento ja está cadastrado no sistema!!!';
    $_SESSION['status'] = 0;
    header("location:../View/pesquisar_formulario.php");
    //echo $exc;
}
?>