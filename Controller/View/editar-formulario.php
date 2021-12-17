<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Formulario.php"; 
include_once "../Model/Familiar.php";
include_once "../Model/Beneficios.php";

 $id = $_POST['id'];
 $formulario = new formularioModel();
 $familiar = new familiarModel();
 $beneficio = new beneficiosModel();
 $res = $formulario->pesquisar_formulario_individual($conexao, $id);
 $res_familiar = $familiar->pesquisar_familiar($conexao,$id);
 $res2 = $formulario->pesquisar_relacao_beneficio_beneficiario($conexao,$id);
 //----------Beneficios
 $valor_beneficio = '';
 $nome_beneficio = '';
 //----------Familiar
 $nome_familiar = '';
 $sexo_familiar = '';
 $parentesco_familiar = '';
 $idade_familiar = '';
 $escolaridade_familiar = '';
 $renda_familiar = '';
 $profissão_familiar = '';

 //---------Formulario
 $nome = '';
 $sexo = '';
 $data_nascimento = '';
 $estado_civil = '';
 $escolaridade = '';
 $endereco = '';
 $ponto_referencia = '';
 $telefone = '';
 $rg = '';
 $cpf = '';
 $titulo_eleitoral = '';
 $zona_eleitoral = '';
 $secao_eleitoral = '';
 $nis = '';
 $empregado = '';
 $renda_propria = '';
 $bolsa_familia = '';
 $quanto_bolsa_familia = '';
 $moradia = '';
 $quanto_moradia = '';
 $tipo_moradia = '';
 $outros_qual = '';
 $numero_comodos = '';
 $presenca_idosos = '';
 $presenca_gestante = '';
 $quantos_meses_gestante = '';
 $presenca_deficiente = '';
 $qual_deficiencia = '';
 $agua_filtrada = '';
 $qual_agua_filtrada = '';
 $parecer_tecnico_servico_social = '';
 $situacao = '';
 foreach ($res as $key => $value) {
   $nome_beneficiario = $value['nome'];
   $sexo = $value['sexo'];
   $data_nascimento = $value['data_nascimento'];
   $estado_civil = $value['estado_civil'];
   $escolaridade_beneficiario = $value['escolaridade'];
   $endereco = $value['endereco'];
   $ponto_referencia = $value['ponto_referencia'];
   $telefone = $value['telefone'];
   $rg = $value['rg'];
   $cpf = $value['cpf'];
   $titulo_eleitoral = $value['titulo_eleitoral'];
   $zona_eleitoral = $value['zona_eleitoral'];
   $secao_eleitoral = $value['secao_eleitoral'];
   $nis = $value['nis'];
   $empregado = $value['empregado'];
   $renda_propria = $value['renda_propria'];
   $bolsa_familia = $value['bolsa_familia'];
   $quanto_bolsa_familia = $value['quanto_bolsa_familia'];
   $moradia = $value['moradia'];
   $quanto_moradia = $value['quanto_moradia'];
   $tipo_moradia = $value['tipo_moradia'];
   $outros_qual = $value['outros_qual'];
   $numero_comodos = $value['n_comodos'];
   $presenca_idosos = $value['presenca_idosos'];
   $presenca_gestante = $value['presenca_gestante'];
   $quantos_meses_gestante = $value['quantos_meses_gestante'];
   $presenca_deficiente = $value['presenca_deficiente'];
   $qual_deficiencia = $value['qual_deficiencia'];
   $agua_filtrada = $value['agua_filtrada'];
   $qual_agua_filtrada = $value['qual_agua_filtrada'];
   $parecer_tecnico_servico_social = $value['parecer_tecnico_servico_social'];
   $situacao = $value['situacao'];
 }
?>
  <!-- Main Sidebar Container -->
  <script src="ajax.js?<?php echo rand(); ?>"></script>
<div class="content-wrapper">
<!-- ####################### CORPO ################################################# -->

      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-1"></div>
          <div class="col-sm-10 alert alert-<?php echo $tema_aplivacao; ?>">
          <center>  
            <h1 class="m-0">
              <b>
                EDITAR FORMULÁRIO DE ATENDIMENTO
              </b>
            </h1>
          </center>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->




<div class="card card-primary">
<div class="card-header">
 
</div>
<!-- /.card-header -->
<!-- form start -->
<!-- form start -->
<form action="../Controller/Editar_formulario.php" method="POST">
  <input type="hidden" name='id' value='<?php echo $id; ?>'>
  <div class="card-body">
    <br><h4 align="center"> IDENTIFICAÇÃO</h4><br>
    <div class="row" >
      <div class="col-sm-5">
        <div class="form-group">
         <label for="nome">NOME DO BENEFICIÁRIO</label>
         <input type="text" class="form-control" id="nome_beneficiario" name="nome_beneficiario" value='<?php echo $nome_beneficiario; ?>' >
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
         <label for="exampleInputEmail1">SEXO</label>
         <select class="form-control"  id="sexo" name="sexo">
          <option selected value='<?php echo $sexo; ?>'><?php echo $sexo; ?></option>
          <option value="MASCULINO">MASCULINO</option>
          <option value="FEMININO">FEMININO</option>
         </select> 
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">DATA DE NASCIMENTO</label>
         <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value='<?php echo $data_nascimento; ?>'>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
         <label for="exampleInputEmail1">ESTADO CIVIL</label>
         <select class="form-control"  id="estado_civil"  name="estado_civil" >
          <option selected value='<?php echo $estado_civil; ?>'><?php echo $estado_civil; ?></option>
          <option value="SOLTEIRO">SOLTEIRO</option>
          <option value="CASADO">CASADO</option>
          <option value="SEPARADO">SEPARADO</option>
          <option value="VIÚVO">VIÚVO</option>
          <option value="DIVORCIADO">DIVORCIADO</option>
          <option value="UNIÃO_ESTAVEL">UNIÃO ESTAVEL</option>
         </select> 
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="exampleInputEmail1">ESCOLARIDADE</label>
         <select class="form-control"   name="escolaridade_beneficiario" >
          <option selected value='<?php echo $escolaridade_beneficiario; ?>'><?php echo $escolaridade_beneficiario; ?></option>
          <option value="NÃO_ALFABETIZADO">NÃO ALFABETIZADO</option>
          <option value="ALFABETIZADO">ALFABETIZADO</option>
         </select> 
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="acesso_ssh">TELEFONE</label>
         <input type="text" class="form-control" id="telefone" name="telefone" value='<?php echo $telefone; ?>'>
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-sm-6">
        <div class="form-group">
         <label for="acesso_ssh">ENDEREÇO</label>
         <input type="text" class="form-control" id="endereco" name="endereco"  value='<?php echo $endereco; ?>'>
        </div>
      </div>
     <div class="col-sm-6">
        <div class="form-group">
         <label for="acesso_ssh">PONTO DE REFERENCIA</label>
         <input type="text" class="form-control" id="ponto_referencia" name="ponto_referencia" value='<?php echo $ponto_referencia; ?>' >
        </div>
      </div>
    </div>
    <br><h4 align="center"> DOCUMENTAÇÃO</h4><br>
    <div class="row">
       <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">RG</label>
         <input type="text" class="form-control" id="rg" name="rg" value='<?php echo $rg; ?>' >
        </div>
       </div>
       <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">CPF</label>
         <input type="text" class="form-control" id="cpf" name="cpf" value='<?php echo $cpf; ?>' >
        </div>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-5">
        <div class="form-group">
         <label for="nome">TITULO ELEITORAL</label>
         <input type="text" class="form-control" id="titulo_eleitoral" name="titulo_eleitoral" value='<?php echo $titulo_eleitoral; ?>' >
        </div>
       </div>
       <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">ZONA</label>
         <input type="text" class="form-control" id="zona" name="zona" value='<?php echo $zona_eleitoral; ?>' >
        </div>
       </div>
       <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">SEÇÃO</label>
         <input type="text" class="form-control" id="secao" name="secao" value='<?php echo $secao_eleitoral; ?>' >
        </div>
       </div>
       <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">NIS</label>
         <input type="text" class="form-control" id="nis" name="nis" value='<?php echo $nis; ?>' >
        </div>
       </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label for="exampleInputEmail1">EMPREGADO</label>
          <select class="form-control"  id="empregado" name="empregado"  >
          <option selected value='<?php echo $empregado; ?>'><?php echo $empregado; ?></option>
          <option value="FORMAL">FORMAL</option>
          <option value="INFORMAL">INFORMAL</option>
          <option value="AUTÔNOMO">AUTÔNOMO</option>
          <option value="DESEMPREGADO">DESEMPREGADO</option>
          <option value="APOSENTADO/PENSIONISTA">APOSENTADO/PENSIONISTA</option>
          <option value="BPC/LOAS">BPC/LOAS</option>
        </select> 
        </div>
      </div> 
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">RENDA PROPRIA</label>
         <input type="number" class="form-control" id="renda_propria" name="renda_propria" value='<?php echo $renda_propria; ?>' >
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="exampleInputEmail1">BOLSA FAMILIA</label>
          <select class="form-control"  id="bolsa_familia" name="bolsa_familia" value='<?php echo $bolsa_familia; ?>'>
          <option selected value='<?php echo $bolsa_familia; ?>'><?php echo $bolsa_familia; ?></option>
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div> 
       <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">QUANTO</label>
         <input type="number" class="form-control" id="quanto_bolsa_familia" name="quanto_bolsa_familia" value='<?php echo $quanto_bolsa_familia; ?>'>
        </div>
       </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label for="exampleInputEmail1">MORADIA</label>
          <select class="form-control"  id="moradia" name="moradia"  >
          <option selected value='<?php echo $moradia; ?>'><?php echo $moradia; ?></option>
          <option value="PRÓPRIA">PRÓPRIA</option>
          <option value="DE_FAVOR">DE FAVOR</option>
          <option value="ALUGADA">ALUGADA</option>
        </select> 
        </div>
      </div> 
      <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">VALOR ALUGUEL?</label>
         <input type="number" class="form-control" id="valor_aluguel" name="valor_aluguel" value='<?php echo $quanto_moradia; ?>'>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="exampleInputEmail1">TIPO</label>
          <select class="form-control"  id="tipo_moradia" name="tipo_moradia" >
          <option selected value='<?php echo $tipo_moradia; ?>' ><?php echo $tipo_moradia; ?></option>
          <option value="ALVENARIA">ALVENARIA</option>
          <option value="MADEIRA">MADEIRA</option>
          <option value="TAIPA">TAIPA</option>
          <option value="OUTROS">OUTROS</option>
        </select> 
        </div>
      </div> 
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">QUAL?</label>
         <input type="text" class="form-control" id="qual_tipo" value='<?php echo $outros_qual; ?>' name="qual_tipo">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">N° CÔMODOS</label>
         <input type="number" class="form-control" id="numero_comodos" name="numero_comodos" value='<?php echo $numero_comodos; ?>'>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ PRESENÇA DE IDOSOS?</label>
          <select class="form-control"  id="presenca_idoso" name="presenca_idoso"  >
          <option selected value='<?php echo $presenca_idosos; ?>' ><?php echo $presenca_idosos; ?></option>
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ PRESENÇA DE GESTANTES?</label>
          <select class="form-control"  id="presenca_gestante" name="presenca_gestante"  >
          <option selected value='<?php echo $presenca_gestante; ?>' ><?php echo $presenca_gestante; ?></option>
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">QUANTOS MESES?</label>
         <input type="text" class="form-control" id="meses_gestantes" name="meses_gestantes" value='<?php echo $quantos_meses_gestante; ?>' >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ PRESENÇA DE DEFICIENTES?</label>
          <select class="form-control"  id="presenca_deficiente" name="presenca_deficiente" >
          <option selected value='<?php echo $presenca_deficiente; ?>'  ><?php echo $presenca_deficiente; ?></option>
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">QUAL?</label>
         <input type="text" class="form-control" id="qual_deficiente" name="qual_deficiente" value='<?php echo $qual_deficiencia; ?>' >
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ ÁGUA FILTRADA EM CASA?</label>
          <select class="form-control"  id="agua_filtrada" name="agua_filtrada"  >
          <option selected value='<?php echo $agua_filtrada; ?>'  ><?php echo $agua_filtrada; ?></option>
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">QUAL?</label>
         <input type="text" class="form-control" id="qual_agua_filtrada" name="qual_agua_filtrada" value='<?php echo $qual_agua_filtrada; ?>' >
        </div>
      </div>
    </div>
    <br><h4 align="center">COMPOSIÇÃO FAMILIAR</h4><br>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">NOME</label>
         <input type="text" class="form-control" id="nome_familia">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
         <label for="exampleInputEmail1">SEXO</label>
         <select class="form-control"  id="sexo_familiar">
          <option value="MASCULINO">MASCULINO</option>
          <option value="FEMININO">FEMININO</option>
         </select> 
        </div>
      </div> 
       <div class="col-sm-3">
        <div class="form-group">
         <label for="exampleInputEmail1">PARENTESCO</label>
         <select class="form-control"  id="parentesco">
          <option value="PAI">PAI</option>
          <option value="MÃE">MÃE</option>
          <option value="IRMÃO">IRMÃO</option>
          <option value="ESPOSA">ESPOSA</option>
          <option value="MARIDO">MARIDO</option>
          <option value="FILHO">FILHO</option>
          <option value="FILHA">FILHA</option>
         </select> 
        </div>
      </div> 
       <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">IDADE</label>
         <input type="number" class="form-control" id="idade_familiar" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">ESCOLARIDADE</label>
         <input type="text" class="form-control" id="escolaridade" >
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">PROFISSÃO</label>
         <input type="text" class="form-control" id="profissao_familiar" >
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">RENDA</label>
         <input type="number" class="form-control" id="renda_familiar" >
        </div>
      </div>
      <div class="col-sm-3" >
        <div class="form-group" style="margin-top: 8px;">
         <label for="exampleInputEmail1" class="text-white"></label>
         <a class="btn btn-block btn-success" onclick="adicionar_familiar_editar();">ADICIONAR</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">NOME</th>
              <th scope="col">SEXO</th>
              <th scope="col">PARENTESCO</th>
              <th scope="col">IDADE</th>
              <th scope="col">ESCOLARIDADE</th>
              <th scope="col">RENDA</th>
              <th scope="col">PROFISSÃO</th>
              <th scope="col">OPÇÃO</th>
            </tr>
          </thead>
          <tbody id="tabela_familiar">
            <?php 
            foreach ($res_familiar as $key => $value) {
              $id_familiar = $value['id'];
              $nome_familiar = $value['nome'];
              $sexo_familiar = $value['sexo'];
              $parentesco_familiar= $value['parentesco'];
              $idade_familiar = $value['idade'];
              $escolaridade_familiar = $value['escolaridade'];
              $renda_familiar = $value['renda'];
              $profissão_familiar = $value['profissao'];

              echo"<tr id='div_$id_familiar'>
                      <td><input type='hidden' class='form-control' id='nome_familiar' name='nome_familiar[]' value='$nome_familiar' >$nome_familiar</td>

                      <td><input type='hidden' class='form-control' id='sexo_familiar' name='sexo_familiar[]' value='$sexo_familiar' >$sexo_familiar</td>

                      <td><input type='hidden' class='form-control' id='parentesco_familiar' name='parentesco_familiar[]' value='$parentesco_familiar' >$parentesco_familiar</td>

                      <td><input type='hidden' class='form-control' id='idade_familiar' name='idade_familiar[]' value='$idade_familiar'>$idade_familiar</td>

                      <td><input type='hidden' class='form-control' id='escolaridade' name='escolaridade[]'  value='$escolaridade'>$escolaridade</td>

                      <td><input type='hidden' class='form-control' id='renda_familiar' name='renda_familiar[]'  value='$renda_familiar'>$renda_familiar</td>

                      <td><input type='hidden' class='form-control' id='profissão_familiar' name='profissão_familiar[]'  value='$profissão_familiar'>$profissão_familiar</td>

                      <td><a class='btn btn-danger' onclick=remover_familiar('div_$id_familiar');remover_familiar_editar($id,$id_familiar); >Apagar</a></td>
                      </td>
                    </tr>
              ";
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="exampleInputEmail1">BENEFÍCIOS</label>
          <select class="form-control"  id="beneficios" name="beneficios" >
          <?php
            $res = $beneficio->pesquisar_todos_beneficios($conexao);
            foreach ($res as $key => $value) {
              $id_beneficio = $value['id'];
              $nome = $value['nome'];
              
              echo"<option value='$id_beneficio'>$nome</option>
              ";
            }


            ?>
        </select> 
        </div>
      </div> 
       <div class="col-sm-4">
        <div class="form-group">
         <label for="tempo_beneficio">TEMPO</label>
         <input type="number" class="form-control" id="tempo_beneficio" name="tempo_beneficio">
        </div>
      </div>
      <div class="col-sm-4" >
        <div class="form-group" style="margin-top: 8px;">
         <label for="exampleInputEmail1" class="text-white"></label>
         <a class="btn btn-block btn-success" onclick="adicionar_beneficios_editar(<?php $id ?>);">ADICIONAR</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">BENEFÍCIO</th>
                <th scope="col">TEMPO</th>
                <th scope="col">OPÇÃO</th>
              </tr>
            </thead>
            <tbody id="tabela_beneficios">
            <?php 
              foreach ($res2 as $key => $value) {
                $id_relacao = $value['id'];
                $id_beneficio = $value['id_beneficio'];
                $beneficio->registrar_beneficio_temporario($conexao,$id_beneficio);
                $tempo_beneficio = $value['tempo_recebimento'];
                $res_beneficio = $beneficio->pesquisar_beneficios($conexao,$id_beneficio);
                foreach ($res_beneficio as $key => $value){
                  $nome_beneficio = $value['nome'];
                }
                echo"<tr id='div_$id_beneficio'>
                        <td><input type='hidden' class='form-control' id='beneficios' name='beneficios[] 'value='$id_beneficio' >$nome_beneficio</td>
                        <td><input type='hidden' class='form-control' id='tempo_beneficio' name='tempo_beneficio[]' 'value='$tempo_beneficio' >$tempo_beneficio</td>
                        <td><a class='btn btn-danger' onclick=;remover_beneficio('div_$id_beneficio');remover_beneficio2($id,$id_beneficio); >Apagar</a></td>
                      </td>
                      </tr>
                ";
              }
              revalidar_beneficio();
             ?>
            </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="exampleInputEmail1">PARECER DO TÉCNICO EM SERVIÇO SOCIAL</label>
          <textarea rows="3" type="text" class="form-control" id="parecer_tecnico" name="parecer_tecnico" value='<?php echo $parecer_tecnico_servico_social; ?>'></textarea>
        </div>
      </div>
    </div>
      <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
         <label for="exampleInputEmail1">SITUAÇÃO</label>
         <select class="form-control"  id="situacao" name="situacao">
          <option selected value='<?php echo $situacao; ?>'  ><?php echo $situacao; ?></option>

          <option value="APROVADO">APROVADO</option>
          <option value="REPROVADO">REPROVADO</option>
          <option value="VISITA_SOCIAL">VISITA SOCIAL</option>
         </select> 
        </div>
      </div> 
    </div>
    <div class="card-footer">
     <button type="submit" class="btn btn-block btn-primary">Concluir</button>
    </div>
  </div>
</form>
</div>
    





<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>