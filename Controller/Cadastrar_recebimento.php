<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {

    $use = new beneficiosModel();

    $id_beneficiario = $_POST['id_beneficiario']; 
    $entregue = 'SIM'; 
    foreach ( $_POST['beneficios'] as $key => $value){
        $id_beneficio = $_POST['beneficios'][$key]; 
        $data = $_POST['data_recebimento'][$key]; 
        $use->cadastrar_recebimento($conexao,$id_beneficiario,$id_beneficio,$entregue,$data); 
    }

    $_SESSION['status'] = 1;
     header("location:../View/pesquisar_formulario.php");
        
    
    


    
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'Este recebimento ja está cadastrado no sistema!!!';
    $_SESSION['status'] = 0;
    header("location:../View/pesquisar_formulario.php");
    //echo $exc;
}
?>