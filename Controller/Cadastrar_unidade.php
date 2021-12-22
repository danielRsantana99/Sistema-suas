<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";

try {
     $cadastro = 0;
    $use = new usuarioModel();
    ;
    $nome = $_POST['nome_unidade']; 
    $validar = $use->pesquisar_unidades_validar($conexao,$nome);
    foreach ($validar as $key => $value) {
       $cadastro=$value['id']; 
    }

    if($cadastro == 0){
    $use->cadastrar_unidade($conexao,$nome);
    $_SESSION['mensagem'] = 'cadastro realizado com sucesso!';
    $_SESSION['status'] = 1;
     header("location:../View/cadastrar-unidade.php");

    }else{
        $_SESSION['mensagem'] = 'unidade ja cadastrada no sistema!!';
        $_SESSION['status'] = 0;
        header("location:../View/cadastrar-unidade.php");

    }
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'unidade ja cadastrada no sistema!!';
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-unidade.php");
   // echo $exc;
}
?>