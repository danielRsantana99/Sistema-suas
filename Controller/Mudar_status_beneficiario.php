<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";

try {

    $use = new formularioModel();
    
    $id= $_GET['id'];
    $novo_status= $_GET['novo_status']; 

    
    $use->editar_status($conexao,$id,$novo_status);

    $_SESSION['status'] = 1;
     
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-beneficio.php");
   // echo $exc;
}
?>