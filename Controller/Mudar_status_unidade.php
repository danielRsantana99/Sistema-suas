<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";

try {

    $use = new usuarioModel();
    
    $id= $_GET['id'];
    $novo_status= $_GET['novo_status']; 

    
    $use->editar_status_unidade($conexao,$id,$novo_status);

    $_SESSION['status'] = 1;
     
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-beneficio.php");
   // echo $exc;
}
?>