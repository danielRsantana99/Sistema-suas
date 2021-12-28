<?php 

class formularioModel{


    public function pesquisar_formulario_individual($conexao,$id) {
        $sql = $conexao->prepare("SELECT * FROM beneficiario where id=:id");
        $sql->execute(array('id' =>$id));
        return $sql->fetchAll();
    }

    public function cadastrar_formulario($conexao,$nome,$sexo,$data_nascimento,$idade,$estado_civil,$escolaridade,$endereco,$ponto_referencia,$telefone,$rg,$cpf,$titulo_eleitoral,$zona,$secao,$nis,$empregado,$renda_propria,$bolsa_familia,$quanto_bolsa_familia,$moradia,$quanto_moradia,$tipo,$qual_tipo,$numero_comodos,$presenca_idosos,$presenca_gestante,$meses_gestantes,$presenca_deficiente,$qual_deficiencia,$agua_filtrada,$qual_agua_filtrada,$parecer_tecnico_servico_social,$contratador,$situacao,$status) {
      $sql = $conexao->prepare("INSERT INTO beneficiario (nome,sexo,data_nascimento,idade,estado_civil,escolaridade,endereco,ponto_referencia,telefone,rg,cpf,titulo_eleitoral,zona_eleitoral,secao_eleitoral,nis,empregado,renda_propria,bolsa_familia,quanto_bolsa_familia,moradia,quanto_moradia,tipo_moradia,outros_qual,n_comodos,presenca_idosos,presenca_gestante, quantos_meses_gestante,presenca_deficiente,qual_deficiencia,agua_filtrada,qual_agua_filtrada,parecer_tecnico_servico_social,id_contratador,situacao,status)
      VALUES(:nome, :sexo, :data_nascimento,:idade,  :estado_civil, :escolaridade, :endereco, :ponto_referencia, :telefone, :rg, :cpf, :titulo_eleitoral, :zona, :secao, :nis, :empregado, :renda_propria, :bolsa_familia, :quanto_bolsa_familia, :moradia, :quanto_moradia, :tipo_moradia, :outros_qual, :n_comodos, :presenca_idosos, :presenca_gestante, :quantos_meses_gestante, :presenca_deficiente, :qual_deficiencia, :agua_filtrada, :qual_agua_filtrada, :parecer_tecnico_servico_social,:contratador,:situacao,:status)");
      
      $sql->execute(
        array(
          'nome' => $nome,
          'sexo' =>$sexo,
          'data_nascimento' =>$data_nascimento,
          'idade' =>$idade,
          'estado_civil' =>$estado_civil,
          'escolaridade' =>$escolaridade,
          'endereco' =>$endereco,
          'ponto_referencia' =>$ponto_referencia,
          'telefone' =>$telefone,
          'rg' =>$rg,
          'cpf' =>$cpf,
          'titulo_eleitoral' =>$titulo_eleitoral,
          'zona' =>$zona,
          'secao' =>$secao,
          'nis' =>$nis,
          'empregado' =>$empregado,
          'renda_propria' =>$renda_propria,
          'bolsa_familia' =>$bolsa_familia,
          'quanto_bolsa_familia' =>$quanto_bolsa_familia,
          'moradia' =>$moradia,
          'quanto_moradia' =>$quanto_moradia,
          'tipo_moradia' =>$tipo,
          'outros_qual' =>$qual_tipo,
          'n_comodos' =>$numero_comodos,
          'presenca_idosos' =>$presenca_idosos,
          'presenca_gestante' =>$presenca_gestante,
          'quantos_meses_gestante' =>$meses_gestantes,
          'presenca_deficiente' =>$presenca_deficiente,
          'qual_deficiencia' =>$qual_deficiencia,
          'agua_filtrada' =>$agua_filtrada,
          'qual_agua_filtrada' =>$qual_agua_filtrada,
          'parecer_tecnico_servico_social' =>$parecer_tecnico_servico_social,
          'contratador' =>$contratador,
          'situacao'=> $situacao,
          'status'=> $status)
    );
    }

     public function editar_formulario($conexao,$id,$nome,$sexo,$data_nascimento,$idade,$estado_civil,$escolaridade,$endereco,$ponto_referencia,$telefone,$rg,$cpf,$titulo_eleitoral,$zona,$secao,$nis,$empregado,$renda_propria,$bolsa_familia,$quanto_bolsa_familia,$moradia,$quanto_moradia,$tipo,$qual_tipo,$numero_comodos,$presenca_idosos,$presenca_gestante,$meses_gestantes,$presenca_deficiente,$qual_deficiencia,$agua_filtrada,$qual_agua_filtrada,$parecer_tecnico_servico_social,$situacao) {
        
        $sql = $conexao->prepare("UPDATE beneficiario SET nome = :nome, sexo = :sexo, data_nascimento = :data_nascimento,idade =:idade, estado_civil = :estado_civil , escolaridade = :escolaridade, endereco = :endereco, ponto_referencia = :ponto_referencia, telefone =:telefone,rg =:rg, cpf=:cpf,titulo_eleitoral=:titulo_eleitoral, zona_eleitoral=:zona, secao_eleitoral=:secao, nis=:nis, empregado=:empregado, renda_propria=:renda_propria,bolsa_familia=:bolsa_familia, quanto_bolsa_familia=:quanto_bolsa_familia, moradia=:moradia,quanto_moradia=:quanto_moradia, tipo_moradia=:tipo,   outros_qual=:qual_tipo, n_comodos =:numero_comodos, presenca_idosos=:presenca_idosos, presenca_gestante=:presenca_gestante, quantos_meses_gestante=:meses_gestantes, presenca_deficiente=:presenca_deficiente, qual_deficiencia=:qual_deficiencia,agua_filtrada=:agua_filtrada, qual_agua_filtrada=:qual_agua_filtrada, parecer_tecnico_servico_social=:parecer_tecnico_servico_social,situacao=:situacao where id =:id");
        
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":data_nascimento", $data_nascimento);
        $sql->bindParam(":idade", $idade);
        $sql->bindParam(":estado_civil", $estado_civil);
        $sql->bindParam(":escolaridade", $escolaridade);
        $sql->bindParam(":endereco", $endereco);
        $sql->bindParam(":ponto_referencia", $ponto_referencia);
        $sql->bindParam(":telefone", $telefone);
        $sql->bindParam(":rg", $rg);
        $sql->bindParam(":cpf", $cpf);
        $sql->bindParam(":titulo_eleitoral", $titulo_eleitoral);
        $sql->bindParam(":zona", $zona);
        $sql->bindParam(":secao", $secao);
        $sql->bindParam(":nis", $nis);
        $sql->bindParam(":empregado", $empregado);
        $sql->bindParam(":renda_propria", $renda_propria);
        $sql->bindParam(":bolsa_familia", $bolsa_familia);
        $sql->bindParam(":quanto_bolsa_familia", $quanto_bolsa_familia); 
        $sql->bindParam(":moradia", $moradia);
        $sql->bindParam(":quanto_moradia", $quanto_moradia);
        $sql->bindParam(":tipo", $tipo);
        $sql->bindParam(":qual_tipo", $qual_tipo);
        $sql->bindParam(":numero_comodos", $numero_comodos);
        $sql->bindParam(":presenca_idosos", $presenca_idosos);
        $sql->bindParam(":presenca_gestante", $presenca_gestante);
        $sql->bindParam(":meses_gestantes", $meses_gestantes);
        $sql->bindParam(":presenca_deficiente", $presenca_deficiente);
        $sql->bindParam(":qual_deficiencia", $qual_deficiencia);
        $sql->bindParam(":agua_filtrada", $agua_filtrada);
        $sql->bindParam(":qual_agua_filtrada", $qual_agua_filtrada);
        $sql->bindParam(":parecer_tecnico_servico_social", $parecer_tecnico_servico_social);
        $sql->bindParam(":situacao", $situacao);
        $sql->bindParam(":id", $id);
        $sql->execute();
        // return $sql->fetchAll();
    }

    public function editar_status($conexao,$id,$status) {
     $sql = $conexao->prepare("UPDATE beneficiario SET status = :status where id =:id" );
        
        $sql->bindParam(":status", $status);
        $sql->bindParam(":id", $id);
        $sql->execute();
    }

    public function cadastrar_relacao_beneficio_beneficiario($conexao,$id_beneficiario,$id_beneficios,$tempo_beneficio) {
         $sql = $conexao->prepare("INSERT INTO relacao_beneficio_beneficiario (id_beneficiario,id_beneficio,tempo_recebimento)VALUES(:id_beneficiario, :id_beneficios,:tempo_beneficio)");
      
      $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario,
          'id_beneficios'=>$id_beneficios,  
          'tempo_beneficio'=>$tempo_beneficio  
       ));
    }

    public function editar_relacao_beneficio_beneficiario($conexao,$id,$id_beneficiario,$id_beneficio,$tempo_beneficio) {
      $sql = $conexao->prepare("UPDATE relacao_beneficio_beneficiario SET id_beneficiario = :id_beneficiario, id_beneficio = :id_beneficio, tempo_recebimento = :tempo_beneficio where id =:id" );
        
        $sql->bindParam(":id_beneficiario", $id_beneficiario);
        $sql->bindParam(":id_beneficio", $id_beneficio);
        $sql->bindParam(":tempo_beneficio", $tempo_beneficio);
        $sql->execute();
    }

    public function apagar_relacao_beneficio_beneficiario($conexao,$id_beneficiario) {
      $sql = $conexao->prepare("DELETE FROM relacao_beneficio_beneficiario WHERE id_beneficiario = :id_beneficiario");
        $sql->execute(array(
          'id_beneficiario' =>$id_beneficiario));
    }

    public function apagar_relacao_beneficio_beneficiario_2($conexao,$id) {
      $sql = $conexao->prepare("DELETE FROM relacao_beneficio_beneficiario WHERE id = :id");
        
         $sql->execute(array('id' =>$id));
    }

    public function listar_formularios($conexao) {
        $sql = $conexao->prepare("SELECT count(*) as 'nome' FROM beneficiario");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function pesquisar_formulario($conexao,$pesquisa) {
        $sql = $conexao->prepare("SELECT * FROM  beneficiario where id like :pesquisa or nome like :pesquisa1  or cpf like :pesquisa2 or rg like :pesquisa3 ");
        $sql->execute(
            array(
                "pesquisa"=>'%'.$pesquisa.'%',
                "pesquisa1"=>'%'.$pesquisa.'%',
                "pesquisa2"=>'%'.$pesquisa.'%',
                "pesquisa3"=>'%'.$pesquisa.'%'
            )
        );
        return $sql->fetchAll();
    }

    public function pesquisar_formulario_validar($conexao,$nome,$cpf,$rg) {
        $sql = $conexao->prepare("SELECT * FROM  beneficiario where nome like :nome AND cpf = :cpf AND rg = :rg ");
        $sql->execute(
            array(
                "nome"=>'%'.$nome.'%',
                "cpf"=>$cpf,
                "rg"=>$rg)
        );
        return $sql->fetchAll();
    }

    public function pesquisar_formulario2($conexao,$id) {
        $sql = $conexao->prepare("SELECT * FROM  beneficiario where id = :id");
        $sql->execute(
            array(
                "id"=>$id,
            )
        );
        return $sql->fetchAll();
    }

    public function pesquisar_relacao_beneficio_beneficiario($conexao,$id) {
        $sql = $conexao->prepare("SELECT * FROM 
          relacao_beneficio_beneficiario,
          beneficio
         where 
         relacao_beneficio_beneficiario.id_beneficio = beneficio.id and  id_beneficiario=:id");
      
        $sql->execute(array('id' =>$id));
        return $sql->fetchAll();
    }

    public function pesquisar_recebimento_data($conexao,$id_beneficiario,$data_inicial,$data_final,$beneficio){
      $sql = $conexao->prepare("SELECT beneficio.nome as 'nome_beneficio', beneficiario.nome as 'nome_beneficiario', recebimento.data_recebimento,recebimento.confirmacao_recebimento as 'entregue' FROM recebimento,beneficiario,beneficio, relacao_beneficio_beneficiario WHERE relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_beneficio_beneficiario.id_beneficio = beneficio.id AND recebimento.id_beneficiario = beneficiario.id AND recebimento.id_beneficio = beneficio.id AND beneficiario.id =:id_beneficiario AND beneficio.id = :beneficio AND recebimento.data_recebimento BETWEEN :data_inicial AND :data_final");
      $sql->execute(array('id_beneficiario' =>$id_beneficiario,
        'beneficio'=>$beneficio,
        'data_inicial'=>$data_inicial,
        'data_final'=>$data_final));

        return $sql->fetchAll();
    }


    public function pesquisar_formulario_sem_beneficio($conexao,$pesquisa,$unidade,$status,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'status'=>$status,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_s_b_u($conexao,$pesquisa,$status,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'status'=>$status,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_s_b_st($conexao,$pesquisa,$unidade,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }
    public function p_f_s_b_s($conexao,$pesquisa,$unidade,$status,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'status'=>$status,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_s_b_u_st($conexao,$pesquisa,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_s_b_u_s($conexao,$pesquisa,$status,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status  AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'status'=>$status,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_s_b_st_s($conexao,$pesquisa,$unidade,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_s_b_u_st_s($conexao,$pesquisa,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_usuario_unidade.id_unidade = unidade.id relacao_usuario_unidade.id_usuario = usuario.id AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function pesquisar_formulario_detalhes($conexao,$pesquisa,$unidade,$status,$situacao,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'status'=>$status,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_beneficio($conexao,$pesquisa,$unidade,$status,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.situacao = :situacao AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'status'=>$status,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_situacao($conexao,$pesquisa,$unidade,$status,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'status'=>$status,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_situacao_beneficio($conexao,$pesquisa,$unidade,$status,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'status'=>$status,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_status($conexao,$pesquisa,$unidade,$situacao,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_status_situacao($conexao,$pesquisa,$unidade,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_status_beneficio($conexao,$pesquisa,$unidade,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND unidade.id = :unidade AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.situacao = :situacao AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'unidade'=>$unidade,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }
    public function p_f_d_unidade($conexao,$pesquisa,$status,$situacao,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'status'=>$status,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_unidade_situacao($conexao,$pesquisa,$status,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'status'=>$status,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_unidade_status($conexao,$pesquisa,$situacao,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.situacao = :situacao AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }


    public function p_f_d_unidade_beneficio($conexao,$pesquisa,$status,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.situacao = :situacao AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'status'=>$status,
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_unidade_status_beneficio($conexao,$pesquisa,$situacao,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.situacao = :situacao AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'situacao'=>$situacao,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_unidade_situacao_beneficio($conexao,$pesquisa,$status,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.status = :status AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'status'=>$status,
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_unidade_situacao_status($conexao,$pesquisa,$beneficio,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND relacao_beneficio_beneficiario.id_beneficio = :beneficio AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'beneficio'=>$beneficio,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

    public function p_f_d_unidade_situacao_status_beneficio($conexao,$pesquisa,$data_inicial,$data_final){
        $sql = $conexao->prepare("SELECT beneficiario.id,beneficiario.status,beneficiario.telefone,beneficiario.endereco,beneficiario.data,beneficiario.renda_propria, beneficiario.nome,beneficiario.cpf,usuario.nome AS 'contratador', unidade.nome AS 'unidade' FROM beneficiario,relacao_usuario_unidade,unidade,relacao_beneficio_beneficiario,usuario WHERE beneficiario.id_contratador = usuario.id AND relacao_beneficio_beneficiario.id_beneficiario =beneficiario.id AND relacao_usuario_unidade.id_unidade = unidade.id AND relacao_usuario_unidade.id_usuario = usuario.id AND beneficiario.nome like :pesquisa OR beneficiario.cpf like :pesquisa1 AND beneficiario.data BETWEEN :data_inicial AND :data_final ORDER BY beneficiario.id ASC");
        $sql->execute(
            array(
                'data_inicial'=>$data_inicial,
                'data_final'=>$data_final,
                'pesquisa'=>'%'.$pesquisa.'%',
                'pesquisa1'=>'%'.$pesquisa.'%'

            )
        );
        return $sql->fetchAll();
    }

}

?>