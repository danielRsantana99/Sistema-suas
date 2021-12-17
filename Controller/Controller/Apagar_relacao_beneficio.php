<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";
try {

    $beneficio = new formularioModel();
    
    $id = $_GET['id'];

    $beneficio->apagar_relacao_beneficio_beneficiario_2($conexao,$id);

    $_SESSION['status'] = 1;
     
    
} catch (Exception $exc) {
    $_SESSION['status'] = 0;
   header("location:../View/cadastrar-usuario.php");
    echo $exc;
}
?>