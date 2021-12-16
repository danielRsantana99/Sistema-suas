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

        $_SESSION['status'] = 1;
        header("location:../View/cadastrar-beneficio.php");
    }else{
        echo "<script type='text/javascript'>alert('Ja existe um beneficio com este nome !!!');</script>";
    }
    
    
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-beneficio.php");
   // echo $exc;
}
?>