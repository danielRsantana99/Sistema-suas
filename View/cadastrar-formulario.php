<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Beneficios.php"; 

$beneficio = new beneficiosModel();
$beneficios = array();

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
                CADASTRO FORMULÁRIO DE ATENDIMENTO
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
<form action="../Controller/Cadastrar_formulario.php" method="POST">
  <div class="card-body">
    <br><h4 align="center"> IDENTIFICAÇÃO</h4><br>
    <div class="row" >
      <div class="col-sm-5">
        <div class="form-group">
         <label for="nome">NOME DO BENEFICIÁRIO</label>
         <input type="text" class="form-control" id="nome_beneficiario" name="nome_beneficiario" required="">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
         <label for="exampleInputEmail1">SEXO</label>
         <select class="form-control"  id="sexo" name="sexo" >
          <option value="MASCULINO">MASCULINO</option>
          <option value="FEMININO">FEMININO</option>
         </select> 
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">DATA DE NASCIMENTO</label>
         <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
         <label for="exampleInputEmail1">ESTADO CIVIL</label>
         <select class="form-control"  id="estado_civil" name="estado_civil" >
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
         <select class="form-control"   name="escolaridade_beneficiario" id="escolaridade_beneficiario" >
          <option value="NÃO_ALFABETIZADO">NÃO ALFABETIZADO</option>
          <option value="ALFABETIZADO">ALFABETIZADO</option>
         </select> 
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="acesso_ssh">TELEFONE</label>
         <input type="text" class="form-control" id="telefone" name="telefone" >
        </div>
      </div>
    </div>
    <div class="row">
     <div class="col-sm-6">
        <div class="form-group">
         <label for="acesso_ssh">ENDEREÇO</label>
         <input type="text" class="form-control" id="endereco" name="endereco">
        </div>
      </div>
     <div class="col-sm-6">
        <div class="form-group">
         <label for="acesso_ssh">PONTO DE REFERENCIA</label>
         <input type="text" class="form-control" id="ponto_referencia" name="ponto_referencia">
        </div>
      </div>
    </div>
    <br><h4 align="center"> DOCUMENTAÇÃO</h4><br>
    <div class="row">
       <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">RG</label>
         <input type="text" class="form-control" id="rg" name="rg">
        </div>
       </div>
       <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">CPF</label>
         <input type="text" class="form-control" id="cpf" name="cpf">
        </div>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-5">
        <div class="form-group">
         <label for="nome">TITULO ELEITORAL</label>
         <input type="text" class="form-control" id="titulo_eleitoral" name="titulo_eleitoral">
        </div>
       </div>
       <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">ZONA</label>
         <input type="text" class="form-control" id="zona" name="zona">
        </div>
       </div>
       <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">SEÇÃO</label>
         <input type="text" class="form-control" id="secao" name="secao">
        </div>
       </div>
       <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">NIS</label>
         <input type="text" class="form-control" id="nis" name="nis">
        </div>
       </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label for="exampleInputEmail1">EMPREGADO</label>
          <select class="form-control"  id="empregado" name="empregado" >
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
         <input type="number" class="form-control" id="renda_propria" name="renda_propria">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label for="exampleInputEmail1">BOLSA FAMILIA</label>
          <select class="form-control"  id="bolsa_familia" name="bolsa_familia">
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div> 
       <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">QUANTO</label>
         <input type="number" class="form-control" id="quanto_bolsa_familia" name="quanto_bolsa_familia" 
         >
        </div>
       </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label for="exampleInputEmail1">MORADIA</label>
          <select class="form-control"  id="moradia" name="moradia" >
          <option value="PRÓPRIA">PRÓPRIA</option>
          <option value="DE_FAVOR">DE FAVOR</option>
          <option value="ALUGADA">ALUGADA</option>
        </select> 
        </div>
      </div> 
      <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">VALOR ALUGUEL?</label>
         <input type="number" class="form-control" id="valor_aluguel" name="valor_aluguel" >
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="exampleInputEmail1">TIPO</label>
          <select class="form-control"  id="tipo_moradia" name="tipo_moradia" >
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
         <input type="text" class="form-control" id="qual_tipo" name="qual_tipo">
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
         <label for="nome">N° CÔMODOS</label>
         <input type="number" class="form-control" id="numero_comodos" name="numero_comodos">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ PRESENÇA DE IDOSOS?</label>
          <select class="form-control"  id="presenca_idoso" name="presenca_idoso" >
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
          <select class="form-control"  id="presenca_gestante" name="presenca_gestante" >
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">QUANTOS MESES?</label>
         <input type="text" class="form-control" id="meses_gestantes" name="meses_gestantes" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ PRESENÇA DE DEFICIENTES?</label>
          <select class="form-control"  id="presenca_deficiente" name="presenca_deficiente" >
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">QUAL?</label>
         <input type="text" class="form-control" id="qual_deficiente" name="qual_deficiente" >
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="exampleInputEmail1">HÁ ÁGUA FILTRADA EM CASA?</label>
          <select class="form-control"  id="agua_filtrada" name="agua_filtrada" >
          <option value="SIM">SIM</option>
          <option value="NÃO">NÃO</option>
        </select> 
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
         <label for="nome">QUAL?</label>
         <input type="text" class="form-control" id="qual_agua_filtrada" name="qual_agua_filtrada" >
        </div>
      </div>
    </div>
    <br><h4 align="center">COMPOSIÇÃO FAMILIAR</h4><br>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">NOME</label>
         <input type="text" class="form-control" id="nome_familiar">
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
         <a class="btn btn-block btn-success" onclick="adicionar_familiar();">ADICIONAR</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">NOME</th>
              <th scope="col">SEXO</th>
              <th scope="col">PARENTESCO</th>
              <th scope="col">IDADE</th>
              <th scope="col">ESCOLARIDADE/PROFISSÃO</th>
              <th scope="col">RENDA</th>
              <th scope="col">PROFISSÃO</th>
              <th scope="col">OPÇÕES</th>
            </tr>
          </thead>
          <tbody id="tabela_familiar">
            
          </tbody>
        </table>
      </div>
    </div>
    <br>
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
         <label for="nome">TEMPO RECEBIMENTO</label>
         <input type="number" class="form-control" id="tempo_beneficio" name="tempo_beneficio">
        </div>
      </div>
      <div class="col-sm-4" >
        <div class="form-group" style="margin-top: 8px;">
         <label for="exampleInputEmail1" class="text-white"></label>
         <a class="btn btn-block btn-success" onclick="adicionar_beneficios();">ADICIONAR</a>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">BENEFÍCIO</th>
                <th scope="col">TEMPO</th>
                <th scope="col">OPÇÕES</th>
              </tr>
            </thead>
            <tbody id="tabela_beneficios">

            </tbody>
        </table>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="exampleInputEmail1">PARECER DO TÉCNICO EM SERVIÇO SOCIAL</label>
          <textarea rows="3" type="text" class="form-control" id="parecer_tecnico" name="parecer_tecnico"></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
         <label for="exampleInputEmail1">SITUAÇÃO</label>
         <select class="form-control"  id="situacao" name="situacao">
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