<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Beneficios.php"; 
include_once "../Model/Usuario.php"; 

$beneficio = new beneficiosModel();
$usuario = new usuarioModel();

?>
  <!-- Main Sidebar Container -->
<div class="content-wrapper">
<!-- ####################### CORPO ################################################# -->
<script type="text/javascript" src="ajax.js?<?php echo rand(); ?>"></script>

      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-1"></div>
          <div class="col-sm-10 alert alert-<?php echo $tema_aplivacao; ?>">
          <center>  
            <h1 class="m-0">
              <b>
                PESQUISAR FORMULÁRIOS DE ATENDIMENTO
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
  <form method="GET">                 
   <div class="card-body">
      <br><h4 align="center"> FILTRO</h4><br>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
           <label for="exampleInputEmail1">UNIDADE</label>
           <select class="form-control"  id="unidade" name="unidade">
            <option value='todos'>Todas</option>
            <?php
            $res_unidade = $usuario->pesquisar_unidades_todos($conexao);
            foreach ($res_unidade as $key => $value) {
              $id_unidade = $value['id'];
              $unidade = $value['nome'];
              
              echo"<option value=$id_unidade>$unidade</option>
              ";
            }
            ?>
           </select> 
          </div>
        </div> 
        <div class="col-sm-4">
          <div class="form-group">
           <label for="exampleInputEmail1">SITUAÇÃO DO BENEFICIADO</label>
           <select class="form-control"  id="situacao" name="situacao">
            <option value="todos">Todas</option>-->
            <option value="APROVADO">APROVADO</option>
            <option value="REPROVADO">REPROVADO</option>
            <option value="VISITA">VISITA</option>
           </select> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
           <label for="exampleInputEmail1">STATUS DO BENEFICIADO</label>
           <select class="form-control"  id="status" name="status">
            <option value="todos">Todos</option>-->
            <option value="ATIVADO">ATIVADO</option>
            <option value="DESATIVADO">DESATIVADO</option>
           </select> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
           <label for="exampleInputEmail1">BENEFICIO DO BENEFICIADO</label>
           <select class="form-control"  id="beneficio" name="beneficio">
            <option value="todos">Todos</option>-->
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
           <label for="exampleInputEmail1">DATA REGISTRO INICIAL</label>
           <input type="date" class="form-control" name="data_inicial" id="data_inicial">
          </div>
        </div>
         <div class="col-sm-4">
          <div class="form-group">
           <label for="exampleInputEmail1">DATA REGISTRO FINAL</label>
           <input type="date" class="form-control" name="data_final" id="data_final">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
           <label for="exampleInputEmail1">PESQUISA</label>
           <input type="text" class="form-control" name="pesquisa" id="pesquisa">
          </div>
        </div>
        <div class="col-sm-2" style="margin-top: 7px;" ><br>
         <a  class="btn btn-primary" onclick="pesquisa_formulario()">Pesquisar</a>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">     
            <!-- /.card-header -->
          <div class="card-body table-responsive ">
            <table class="table table-hover text-nowrap" id="resultado">
              
            </table>
          </div>
            <!-- /.card-body -->
        </div>
          <!-- /.card -->
      </div>
    </div>
  </div>

</div>
    





<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>