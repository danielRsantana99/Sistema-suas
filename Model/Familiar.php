<?php 

class familiarModel{

    public function cadastrar_composicao_familiar($conexao,$id_beneficiario,$nome,$sexo,$parentesco,$idade,$escolaridade,$renda){
    $sql = $conexao->prepare("INSERT INTO familiar (id_beneficiario,nome,sexo,parentesco,idade,escolaridade,renda)VALUES(:id_beneficiario, :nome, :sexo, :parentesco, :idade, :escolaridade, :renda)");
      
      $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario,
          'nome'=>$nome,
          'sexo' =>$sexo,
          'parentesco'=>$parentesco,
          'idade' =>$idade,
          'escolaridade'=>$escolaridade,
          'renda' =>$renda,
       ));
    }

    public function apagar_familiar($conexao,$id_beneficiario){
      $sql = $conexao->prepare("DELETE FROM familiar WHERE id_beneficiario = :id_beneficiario");
      $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario));
    }

    public function apagar_familiar_2($conexao,$id_beneficiario,$id_familiar){
      $sql = $conexao->prepare("DELETE FROM familiar WHERE id_beneficiario = :id_beneficiario AND id = :id_familiar");
     $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario,
          'id_familiar'=>$id_familiar));
    }

    public function editar_composicao_familiar($conexao,$id,$id_beneficiario,$nome,$sexo,$parentesco,$idade,$escolaridade,$renda){
    $sql = $conexao->prepare("UPDATE familiar SET  id_beneficiario = :id_beneficiario,nome = :nome, sexo = :sexo, parentesco = :parentesco, idade =:idade, escolaridade = :escolaridade , renda = :renda where id =:id" );
        
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":parentesco", $parentesco);
        $sql->bindParam(":idade", $idade);
        $sql->bindParam(":escolaridade", $escolaridade);
        $sql->bindParam(":renda", $renda);
        $sql->execute();
    }

    

    public function pesquisar_familiar($conexao,$id) {
        $sql = $conexao->prepare("SELECT * FROM familiar where id_beneficiario=:id");
        $sql->execute(array('id' =>$id));
        return $sql->fetchAll();
    }

    public function pesquisar_todos_familiar($conexao,$nome) {
        $sql = $conexao->prepare("SELECT * FROM familiar where nome =:nome");
        $sql->execute(array('nome' =>$nome));
        return $sql->fetchAll();
    }


}

?>