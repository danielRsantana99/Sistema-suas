<?php
session_start();

try {

    $_SESSION['idFormulario'] = $_GET['id'];

    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}
?>