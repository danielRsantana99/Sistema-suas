<?php
session_start();

try {

    $_SESSION['recebimento'] = $_GET['id'];

    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}
?>