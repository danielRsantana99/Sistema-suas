<?php
session_start();


try {

    $_SESSION['pesquisa'] = $_GET['pesquisa'];
    $_SESSION['statusBeneficiario'] = $_GET['status'];
    $_SESSION['unidade']  = $_GET['unidade'];
    $_SESSION['situacao']  = $_GET['situacao'];
    $_SESSION['beneficio']  = $_GET['beneficio'];
    $_SESSION['data_inicial']  = $_GET['data_inicial'];
    $_SESSION['data_final']  = $_GET['data_final'];

    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}
?>