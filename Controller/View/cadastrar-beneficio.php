<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Beneficios.php";

$beneficio = new beneficiosModel();
$res = $beneficio->pesquisar_todos_beneficios($conexao);
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
  <form action="../Controller/Cadastrar_beneficios.php" method="POST">
    <div class="card-body">
      <br><h4 align="center">CADASTRO BENEFÍCIO</h4><br>
      <div class="row" >
        <div class="col-sm-12">
          <div class="form-group">
           <label for="nome_beneficio">NOME DO BENEFÍCIO</label>
           <input type="text" class="form-control" id="nome_beneficio" name="nome_beneficio" required="">
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-block btn-primary">Concluir</button>
      </div>   
    </div>
  </form>
  <br><h4 align="center">BENEFÍCIOS CADASTRADOS</h4><br>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">     
            <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                      <th>NOME</th>                      
                  </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($res as $key => $value) {
                $id = $value['id'];
                $nome = $value['nome'];
               
                echo"<tr id='div_$id'>
                      <td>$nome</td>
                      </tr>
                ";
              }
                 ?>
              </tbody>
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