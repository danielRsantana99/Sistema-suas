<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";
try {

    $use = new usuarioModel();
    
    $id = $_SESSION['id'];
    $whatsapp = $_POST['whatsapp']; 
    $email = $_POST['email']; 
   
    $use->editar_dados($conexao,$id,$whatsapp,$email);
    $_SESSION['mensagem'] = 'usuario editado com sucesso!!!'; 
    $_SESSION['status'] = 1;

     header("location:../View/meus-dados.php");
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'usuario não editado!!!';
    $_SESSION['status'] = 0;
   //header("location:../View/painel.php");
   //echo $exc;
}
?>