<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Usuario.php";

$id = $_POST['id'];

$use = new usuarioModel();
$nome='';
$whatsapp='';
$email='';
$unidade = '';
$cpf = '';

$res = $use->pesquisar_usuario($conexao,$id);
foreach ($res as $key => $value) {
  $nome = $value['nome'];
  $whatsapp= $value['whatsapp'];
  $email= $value['email'];
  $id_unidade = $value['id_unidade'];
  $unidade = $value['unidade'];
  $cpf= $value['cpf'];
}
?>
  <!-- Main Sidebar Container -->
<div class="content-wrapper">
<!-- ####################### CORPO ################################################# -->

      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-1"></div>
          <div class="col-sm-10 alert alert-<?php echo $tema_aplivacao; ?>">
          <center>  
            <h1 class="m-0">
              <b>
                DADOS
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
<form action="../Controller/Editar_usuario.php" method="POST">
  <input type="hidden" name="id" id="id" value='<?php echo $id; ?>'>
  <div class="card-body">
    <div class="row" >
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">NOME</label>
         <input type="text" class="form-control" id="nome" name="nome"  value='<?php echo $nome; ?>' >
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">EMAIL</label>
         <input type="text" class="form-control" id="email" name="email" value='<?php echo $email; ?>' >
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">WHATSAPP</label>
         <input type="text" class="form-control" id="whatsapp" name="whatsapp" value='<?php echo $whatsapp; ?>'>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
           <label for="nome">CPF</label>
           <input type="text" class="form-control" value='<?php echo $cpf; ?>' disabled>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
         <label for="exampleInputEmail1">UNIDADE</label>
         <select class="form-control"  id="unidade" name="unidade" >
          <option selected value='<?php echo $id_unidade; ?>'><?php echo $unidade; ?></option>
            <?php
            $res_unidade = $use->pesquisar_unidades_todos($conexao);
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
    </div>
    <div class="card-footer">
     <button type="submit" class="btn btn-block btn-primary">Editar</button>
    </div>
  </div>
</form>
</div>
    












 
<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>