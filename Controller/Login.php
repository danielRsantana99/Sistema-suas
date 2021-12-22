<?php
session_start();
require_once '../Model/Conexao.php';
require_once '../Model/Login.class.php';

$l = new LoginModel();
$usuario = ($_POST['email']);
$senha = (md5($_POST['senha']));


try {
    $conta = 0;
    $res = $l->login($conexao, $usuario, $senha);
    foreach ($res as $value) {
        $_SESSION['id'] = $value['id'];
        $_SESSION['nome'] = $value['nome'];
        $_SESSION['senha'] = $value['senha'];
        $_SESSION['nivel_acesso_id'] = $value['nivel_acesso_id'];
        $_SESSION['mensagem'] = 'Login executado com sucesso!';
        $_SESSION['status'] = 1;
        header("location:../View/painel.php");
        exit();
        $conta++;
        
    }    

    if($conta == 0) {
        $_SESSION['status'] = 0;
        $_SESSION['mensagem'] = 'Acesso negado, tente novamente!';
        header("location:../View/login.php");
        exit();
    }

} catch (Exception $ex) {
    $_SESSION['status'] = 0;
    
    $_SESSION['mensagem'] = 'Acesso negado, tente novamente!';
    header("location:../View/login.php");
  
}

?>
