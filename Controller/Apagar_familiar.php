<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Familiar.php";
try {

    $familiar = new familiarModel();
    
    $id_beneficiario = $_GET['id_beneficiario'];
    $id_familiar = $_GET['id_familiar'];

    $familiar->apagar_familiar_2($conexao,$id_beneficiario,$id_familiar);


    $_SESSION['status'] = 1;
     
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-usuario.php");
    echo $exc;
}
?>