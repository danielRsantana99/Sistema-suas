<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {
    $cadastro = 0;
    $use = new beneficiosModel();
    $nome = $_POST['nome_beneficio']; 
    $validar = $use->pesquisar_beneficios_validar($conexao,$nome);
    
    foreach ($validar as $key => $value) {
       $cadastro=$value['id']; 
    }

    if($cadastro == 0){
        $use->cadastrar_beneficios($conexao,$nome);
        $_SESSION['mensagem'] = 'cadastro realizado com sucesso!';
        $_SESSION['status'] = 1;
        header("location:../View/cadastrar-beneficio.php");
    }else{

    $_SESSION['mensagem'] = 'beneficio ja cadastrada no sistema';
    $_SESSION['status'] = 0;
    header("location:../View/cadastrar-beneficio.php");

        
    }
    
    
    
} catch (Exception $exc) {
    $_SESSION['mensagem'] = 'cadastro não realizado!';
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-beneficio.php");
   // echo $exc;
}
?>