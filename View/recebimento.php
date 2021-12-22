<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Formulario.php"; 
include_once "../Model/Beneficios.php";
 
$id = $_POST['id'];
$beneficio = new beneficiosModel();

$formulario = new formularioModel();
$res = $formulario->pesquisar_formulario2($conexao,$id);
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
                VERIFICAÇÃO DE RECEBIMENTO
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
  <form method="POST" action="adicionar_recebimento.php">   
    <input type="hidden" class="form-control" name="id" id="id" value='<?php echo $id; ?>'>              
     <div class="card-body" style="margin-left: 20px;">
        <br><h4 align="center"> BENEFICIARIO <?php foreach ($res as $key => $value) {
          $nome = $value['nome'];
          $status = $value['status'];
          echo "$nome";
        } ?></h4><br>
        <div class="row">
          <div class="col-sm-2">
            <div class="form-group">
             <label for="exampleInputEmail1">DATA INICIAL</label>
             <input type="date" class="form-control" name="data_inicial" id="data_inicial" required>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
             <label for="exampleInputEmail1">DATA FINAL</label>
             <input type="date" class="form-control" name="data_final" id="data_final" required>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="exampleInputEmail1">BENEFÍCIO</label>
              <select class="form-control"  id="beneficio" name="beneficio" >
              <?php
                $res = $formulario->pesquisar_relacao_beneficio_beneficiario($conexao,$id);
                foreach ($res as $key => $value) {
                  $id_beneficio = $value['id_beneficio'];
                  $res2 = $beneficio->pesquisar_beneficios($conexao,$id_beneficio);
                  foreach ($res2 as $key => $value) {
                    $nome = $value['nome'];
                  }
                  echo"<option value='$id_beneficio'>$nome</option>
                  ";
                }


                ?>
            </select> 
            </div>
          </div> 
          <div class="col-sm-2" style="margin-top: 7px;"><br>
           <a  class="btn btn-primary" onclick="pesquisa_recebimento()">Pesquisar</a>
          </div>
          <?php 
            if($status == 'ATIVADO'){
              echo"<div class='col-sm-3' style='margin-top: 7px;'><br>
                <button type='submit' class='btn btn-success'>ADICIONAR RECEBIMENTO</button>
              </div>";
            }else{
              echo"<div class='col-sm-3' style='margin-top: 7px;'><br>
                <button type='submit' class='btn btn-success' disabled>ADICIONAR RECEBIMENTO</button>
              </div>";

            }
           ?>
          
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">     
            <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
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