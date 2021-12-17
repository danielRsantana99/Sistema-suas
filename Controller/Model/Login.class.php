<?php

class LoginModel {

    public function login($conexao, $usuario, $senha) {
        $sql = $conexao->prepare("SELECT * FROM usuario WHERE email = :usuario AND senha=:senha AND status=1 AND status_conta ='ATIVADO'");
        $sql->bindParam(':usuario', $usuario);
        $sql->bindParam(':senha', $senha);
        $sql->execute();
        return $sql->fetchAll();
    }
   

}

?>