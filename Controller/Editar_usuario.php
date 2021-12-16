<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";
try {

    $use = new usuarioModel();
    
    $id = $_SESSION['id'];
    $whatsapp = $_POST['whatsapp']; 
    $email = $_POST['email']; 
   
    $use->editar_usuario($conexao,$id,$whatsapp,$email);

    $_SESSION['status'] = 1;

     header("location:../View/meus-dados.php");
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   //header("location:../View/painel.php");
   echo $exc;
}
?>