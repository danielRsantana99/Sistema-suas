<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";
try {

    $use = new usuarioModel();
    
    $id = $_POST['id'];
    $whatsapp = $_POST['whatsapp']; 
    $email = $_POST['email']; 
    $unidade = $_POST['unidade'];
    $nome = $_POST['nome'];
   
    $use->editar_usuario($conexao,$id,$nome,$whatsapp,$email);   
    $use->editar_relacao_usuario_unidade($conexao,$id,$unidade); 

    $_SESSION['mensagem'] = 'usuario editado com sucesso!!!'; 
    $_SESSION['status'] = 1;

    header("location:../View/cadastrar-usuario.php");
    
} catch (Exception $exc) {
   // $_SESSION['mensagem'] = 'usuario não editado!!!';
    //$_SESSION['status'] = 0;
    //header("location:../View/painel.php");

   echo $exc;
}
?>