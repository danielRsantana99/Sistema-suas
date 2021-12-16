<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";
try {

    $beneficio = new beneficiosModel();
    
    $id_beneficiario = $_GET['id_beneficiario'];
    $id_beneficio = $_GET['id_beneficio'];

    $beneficio->apagar_beneficio($conexao,$id_beneficiario,$id_beneficio);


    $_SESSION['status'] = 1;
     
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   //header("location:../View/cadastrar-usuario.php");
    echo $exc;
}
?>