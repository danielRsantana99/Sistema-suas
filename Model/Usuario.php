<?php 

class usuarioModel{

    public function cadastrar_usuario($conexao,$nome,$whatsapp,$cpf,$email,$senha,$nivelAcesso) {
    $sql = $conexao->prepare("INSERT INTO usuario (nome,whatsapp,cpf,email,senha,nivel_acesso_id,status,status_conta)VALUES(:nome,:whatsapp,:cpf,:email,:senha,:nivelAcesso,1,'ATIVADO')");
      
      $sql->execute(array(
          'nome' => $nome,
          'whatsapp' => $whatsapp,
          'cpf' => $cpf,
          'email' =>$email,
          'senha'=>$senha,
          'nivelAcesso' => $nivelAcesso));
    }

    public function cadastrar_unidade($conexao,$nome) {
    $sql = $conexao->prepare("INSERT INTO unidade (nome,status)VALUES(:nome,'ATIVADO')");
      
      $sql->execute(array('nome' => $nome));
    }

     public function listarUnidades($conexao) {
        $sql = $conexao->prepare("SELECT * FROM unidade");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function cadastrar_relacao_usuario_unidade($conexao,$id_usuario,$unidade) {
    $sql = $conexao->prepare("INSERT INTO relacao_usuario_unidade (id_usuario,id_unidade)VALUES(:id_usuario,:unidade)");
      
      $sql->execute(array(
          'id_usuario' => $id_usuario,
          'unidade' => $unidade)
    );
    }

     public function editar_relacao_usuario_unidade($conexao,$id_usuario,$unidade) {
    $sql = $conexao->prepare("UPDATE relacao_usuario_unidade SET id_unidade=:unidade WHERE id_usuario =:id_usuario ");
      
       $sql->bindParam(":unidade", $unidade);
       $sql->bindParam(":id_usuario", $id_usuario);
       $sql->execute();
    }

    public function apagar_relacao_usuario_unidade($conexao,$id) {
      $sql = $conexao->prepare("DELETE FROM relacao_usuario_unidade where id_usuario =:id");
        $sql->execute(array('id' =>$id));
    }

    public function editar_dados($conexao,$id,$whatsapp,$email) {
    $sql = $conexao->prepare("UPDATE usuario,relacao_usuario_unidade SET usuario.whatsapp = :whatsapp, usuario.email = :email where relacao_usuario_unidade.id_usuario = usuario.id AND usuario.id =:id");
      
        $sql->bindParam(":whatsapp", $whatsapp);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public function editar_usuario($conexao,$id,$nome,$whatsapp,$email) {
    $sql = $conexao->prepare("UPDATE usuario,relacao_usuario_unidade SET usuario.whatsapp = :whatsapp, usuario.email = :email,usuario.nome =:nome where relacao_usuario_unidade.id_usuario = usuario.id AND usuario.id =:id");
      
        $sql->bindParam(":whatsapp", $whatsapp);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public function listarUsuario($conexao) {
        $sql = $conexao->prepare("SELECT count(*) as 'nome' FROM  usuario where status=1");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function pesquisar_usuario($conexao,$id){
      $sql = $conexao->prepare("SELECT usuario.nome,usuario.email,usuario.whatsapp,usuario.cpf,unidade.id as 'id_unidade', unidade.nome as 'unidade' FROM usuario,unidade,relacao_usuario_unidade where relacao_usuario_unidade.id_usuario = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND usuario.id=:id");
      
        $sql->execute(array('id' =>$id));
        return $sql->fetchAll();
    }

    public function pesquisar_usuario_todos($conexao){
      $sql = $conexao->prepare("SELECT usuario.id,usuario.status_conta, usuario.nome,usuario.email, unidade.nome as 'unidade' FROM usuario,relacao_usuario_unidade,unidade WHERE usuario.id = relacao_usuario_unidade.id_usuario AND relacao_usuario_unidade.id_unidade = unidade.id");
      
        $sql->execute();
        return $sql->fetchAll();
    }

    public function pesquisar_usuario_nome($conexao,$pesquisa,$unidade,$status){
      $sql = $conexao->prepare("SELECT usuario.id,usuario.nome,usuario.email,usuario.whatsapp,usuario.status_conta FROM usuario,relacao_usuario_unidade WHERE relacao_usuario_unidade.id_usuario = usuario.id AND usuario.status_conta = :status AND relacao_usuario_unidade.id_unidade = :unidade AND (usuario.nome LIKE :pesquisa OR usuario.cpf like :pesquisa1 )");
      
        $sql->execute(array(
              'status'=>$status,
              'unidade'=>$unidade,
              'pesquisa1'=>'%'.$pesquisa.'%',
              'pesquisa'=>'%'.$pesquisa.'%'

      ));
        return $sql->fetchAll();
    }

    public function pesquisar_usuario_validar($conexao,$nome,$cpf){
      $sql = $conexao->prepare("SELECT * FROM usuario WHERE nome LIKE :nome AND cpf =:cpf");
      
        $sql->execute(array(
              'cpf'=>$cpf,
              'nome'=>'%'.$nome.'%'
            ));
        return $sql->fetchAll();
    }

    public function editar_status($conexao,$id,$status) {
     $sql = $conexao->prepare("UPDATE usuario SET status_conta = :status where id =:id" );
        
        $sql->bindParam(":status", $status);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

     public function editar_status_unidade($conexao,$id,$status) {
     $sql = $conexao->prepare("UPDATE unidade SET status = :status where id =:id" );
        
        $sql->bindParam(":status", $status);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public function pesquisar_unidades_todos($conexao){
      $sql = $conexao->prepare("SELECT * FROM unidade ");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function pesquisar_unidades_validar($conexao,$nome){
      $sql = $conexao->prepare("SELECT * FROM unidade where nome like :nome");
         $sql->execute(
            array("nome"=>'%'.$nome.'%'));
        return $sql->fetchAll();
    }

}

?>