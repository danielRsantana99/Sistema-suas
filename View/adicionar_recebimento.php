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
$formulario = new formularioModel();
$beneficio = new beneficiosModel();
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
                RECEBIMENTO DE BENEFICIOS
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
  <form method="POST" action="../Controller/Cadastrar_recebimento.php" >
   <input type="hidden" id="id_beneficiario"  name="id_beneficiario" value="<?php echo $id; ?>">        
     <div class="card-body">
      <br><h4 align="center"> CADASTRO DE RECEBIMENTO</h4><br>
        <div class="row" > 
          <div class="col-sm-4">
            <div class="form-group">
             <label for="nome">DATA DE RECEBIMENTO</label>
             <input type="date" class="form-control" id="data_recebimento" name="data_recebimento[]">
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label for="exampleInputEmail1">BENEFÍCIO</label>
              <select class="form-control"  id="beneficios" name="beneficios[]" >
              <?php
                $res = $formulario->pesquisar_relacao_beneficio_beneficiario($conexao,$id);
                foreach ($res as $key => $value) {
                  $id_beneficio = $value['id_beneficio'];

                  $res2 = $beneficio->pesquisar_beneficios($conexao,$id_beneficio);
                  foreach ($res2 as $key => $value) {
                    $nome = $value['nome'];
                  }
                  echo"<option value=$id_beneficio>$nome</option>
                  ";
                }


                ?>
            </select> 
            </div>
          </div> 
          <div class="col-sm-4" >
            <div class="form-group" style="margin-top: 8px;">
             <label for="exampleInputEmail1" class="text-white"></label>
             <a class="btn btn-block btn-success" onclick="adicionar_beneficio_recebimento();">ADICIONAR</a>
            </div>
          </div>
        </div>
        <br>
        <div class="card-footer">
          <button type="submit" class="btn btn-block btn-primary">Concluir</button>
        </div>
      </div>
    </form>
     <div class="row">
      <div class="col-sm-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">BENEFÍCIO</th>
                <th scope="col">DATA DO RECEBIMENTO</th>
              </tr>
            </thead>
            <tbody id="tabela_beneficios">

            </tbody>
        </table>
      </div>
    </div>

</div>
    





<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>