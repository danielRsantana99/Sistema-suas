<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Beneficios.php";

try {
    $result="";
    $use = new beneficiosModel(); 
    $array = [];
    $arraytemporario = [];
    $arraynome = [];

    $beneficio = $_GET['beneficio'];
    $use->registrar_beneficio_temporario($conexao,$beneficio,$_SESSION['id']);

    $res = $use->pesquisar_beneficios_disponivel($conexao);
    foreach ($res as $key => $value) {
        $array[] = $value['id'];
        $arraynome[] = $value['nome'];
    }
    $confirma = $use->pesquisar_temporarios($conexao,$_SESSION['id']);
        foreach ($confirma as $key => $value) {
        $arraytemporario[] = $value['id_beneficio'];
    }
    $resultado = array_diff($array,$arraytemporario);
    foreach ($resultado as $key => $value) {
        $result.="<option value='$array[$key]'>$arraynome[$key]</option>"; 
    }
    
    echo "$result";
    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}
?>