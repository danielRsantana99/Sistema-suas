<?php 

class beneficiosModel{

    public function cadastrar_beneficios($conexao,$nome) {
      $sql = $conexao->prepare("INSERT INTO beneficio (nome) VALUES (:nome)");
      $sql->execute(array('nome' =>$nome));
    }

    public function registrar_beneficio_temporario($conexao,$id,$id_usuario) {
      $sql = $conexao->prepare("INSERT INTO temporario_beneficio (id_beneficio,id_usuario) VALUES (:id,:id_usuario)");
      $sql->execute(array('id' =>$id,'id_usuario'=>$id_usuario));
    }

    public function editar_status($conexao,$id,$status){
     $sql = $conexao->prepare("UPDATE beneficio SET status = :status where id =:id" );
        
        $sql->bindParam(":status", $status);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public function editar_beneficios($conexao,$id,$nome) {
     $sql = $conexao->prepare("UPDATE beneficio SET nome = :nome where id =:id" );
        
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public function apagar_beneficio($conexao,$id_beneficiario,$id_beneficio){
      $sql = $conexao->prepare("DELETE FROM relacao_beneficio_beneficiario WHERE id_beneficiario = :id_beneficiario AND id_beneficio =:id_beneficio");
        $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario,
          'id_beneficio'=>$id_beneficio));
    }

    public function apagar_temporario($conexao,$id){
      $sql = $conexao->prepare("DELETE FROM temporario_beneficio where id_usuario =:id_usuario");
        $sql->execute(array('id_usuario' =>$id));
    }

    public function apagar_temporario_especifico($conexao,$id,$id_usuario){
      $sql = $conexao->prepare("DELETE FROM temporario_beneficio where id_beneficio = :id and id_usuario = :id_usuario");
        $sql->execute(array('id' =>$id,'id_usuario'=>$id_usuario));
    }



    public function pesquisar_beneficios($conexao,$id) {
        $sql = $conexao->prepare("SELECT * FROM beneficio where id=:id AND status = 'ATIVADO'");
        $sql->execute(array('id' =>$id));
        return $sql->fetchAll();
    }
    public function pesquisar_beneficios_validar($conexao,$nome) {
        $sql = $conexao->prepare("SELECT * FROM beneficio where nome like :nome");
        $sql->execute(array('nome' =>'%'.$nome.'%'));
        return $sql->fetchAll();
    }

       public function pesquisar_beneficio_cadastrado($conexao,$id_beneficiario) {
        $sql = $conexao->prepare("SELECT * FROM beneficio where id_beneficiario=:id_beneficiario");
        $sql->execute(array('id_beneficiario' =>$id_beneficiario));
        return $sql->fetchAll();
    }


    public function pesquisar_todos_beneficios($conexao) {
        $sql = $conexao->prepare("SELECT * FROM beneficio ");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function pesquisar_beneficios_disponivel($conexao) {
        $sql = $conexao->prepare("SELECT * FROM beneficio where status = 'ATIVADO' ");
        $sql->execute();
        return $sql->fetchAll();
    }

     public function pesquisar_temporarios($conexao,$id) {
        $sql = $conexao->prepare("SELECT * FROM temporario_beneficio where id_usuario = :id");
        $sql->execute(array('id' =>$id));
        return $sql->fetchAll();
    }

    public function pesquisar_recebimento($conexao,$id,$data) {
        $sql = $conexao->prepare("SELECT * FROM recebimento where id_relacao=:id and data_recebimento=:data");
        $sql->execute(array('id' =>$id,
          'data' =>$data
      ));
        return $sql->fetchAll();
    }


    public function cadastrar_recebimento($conexao,$id_beneficiario,$id_beneficio,$entregue,$data) {
        $sql = $conexao->prepare("INSERT INTO recebimento (id_beneficiario, id_beneficio,confirmacao_recebimento, data_recebimento)VALUES(:id_beneficiario,:id_beneficio,:entregue,:data)");
      
      $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario,
          'id_beneficio'=>$id_beneficio,
          'entregue'=>$entregue,
          'data'=>$data
        ));
    }

    public function verificar_recebimento($conexao,$id_beneficiario,$id_beneficio,$data){
      $sql = $conexao->prepare("SELECT count(*) as 'nome' FROM recebimento WHERE id_beneficiario =:id_beneficiario AND id_beneficio =:id_beneficio AND data_recebimento =:data");
      
      $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario,
          'id_beneficio'=>$id_beneficio,
          'data'=>$data
        ));
      return $sql->fetchAll();
    }

    public function listar_recebimento($conexao,$id_beneficiario){
      $sql = $conexao->prepare("SELECT *  FROM recebimento WHERE id_beneficiario =:id_beneficiario");
      
      $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario));
      return $sql->fetchAll();
    }


}

?>