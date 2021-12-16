<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {
    $result="";
    $use = new beneficiosModel(); 

    $beneficio = $_GET['beneficio'];
    $use->registrar_beneficio_temporario($conexao,$beneficio);

    $res = $use->pesquisar_todos_beneficios($conexao);
    foreach ($res as $key => $value) {
        $id = $value['id'];
        $nome = $value['nome'];
        $confirma = $use->pesquisar_temporarios($conexao);
    }
    foreach ($confirma as $key => $value) {
        $idpassado = $value['id_beneficio'];
        if ($id != $idpassado) {
            $result.="<option value='$id'>$nome</option>"; 
        }
    }
    echo "$result";
    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}
?>