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
    $_SESSION['status'] = 1;
     header("location:../View/cadastrar-unidade.php");

    }else{
        echo "<script type='text/javascript'>alert('Ja existe uma unidade com este nome !!!');</script>";
    }
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-unidade.php");
   // echo $exc;
}
?>