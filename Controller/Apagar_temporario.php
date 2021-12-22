<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";
try {

    $beneficio = new beneficiosModel();
    

    $beneficio->apagar_temporario($conexao,$_SESSION['id']);


    $_SESSION['status'] = 1;
    
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   //header("location:../View/cadastrar-usuario.php");
    echo $exc;
}
?>