<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";
try {

    $beneficio = new beneficiosModel();
    
    $id= $_GET['id'];

    $beneficio->apagar_temporario_especifico($conexao,$id);


    $_SESSION['status'] = 1;
     
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   //header("location:../View/cadastrar-usuario.php");
    echo $exc;
}
?>