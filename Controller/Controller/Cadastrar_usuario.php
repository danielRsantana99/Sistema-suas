<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";

try {
    $cadastro = 0;
    $use = new usuarioModel();
    
    $nome = $_POST['nome']; 
    $cpf = $_POST['cpf']; 
    $whatsapp = $_POST['whatsapp']; 
    $email = $_POST['email']; 
    $senha = (md5($_POST['senha']));
    $nivelAcesso = $_POST['nivelAcesso']; 
    
    $unidade = $_POST['unidade']; 

    $validar = $use->pesquisar_usuario_validar($conexao,$nome,$cpf);
    foreach ($validar as $key => $value) {
        $cadastro = $value['id'];
    }

    if($cadastro == 0){
        $use->cadastrar_usuario($conexao,$nome,$whatsapp,$cpf,$email,$senha,$nivelAcesso,$unidade);
        $id_usuario = $conexao->lastInsertId();

        $use->cadastrar_relacao_usuario_unidade($conexao,$id_usuario,$unidade);

        $_SESSION['status'] = 1;
        header("location:../View/cadastrar-usuario.php");
    }else{
        echo "<script type='text/javascript'>alert('Ja existe um usuario com este nome e cpf !!!');</script>";

    }

   
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-usuario.php");
   // echo $exc;
}
?>