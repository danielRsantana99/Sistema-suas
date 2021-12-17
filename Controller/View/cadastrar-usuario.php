<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../Model/Conexao.php"; 
include_once "../Model/Usuario.php"; 

$usuario = new usuarioModel();

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
                CADASTRO USUÁRIO
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
<form action="../Controller/Cadastrar_usuario.php" method="POST">
  <div class="card-body">
    <div class="row" >
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">NOME</label>
         <input type="text" class="form-control" id="nome" name="nome" >
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">CPF</label>
         <input type="numeric" class="form-control" id="cpf" name="cpf" >
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
         <label for="nome">EMAIL</label>
         <input type="text" class="form-control" id="email" name="email" >
        </div>
      </div>
    </div>
    <div class="row" >
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">SENHA</label>
         <input type="text" class="form-control" id="senha" name="senha" >
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
         <label for="nome">WHATSAPP</label>
         <input type="text" class="form-control" id="whatsapp" name="whatsapp" >
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
         <label for="exampleInputEmail1">NIVEL DE ACESSO</label>
         <select class="form-control"  id="nivelAcesso" name="nivelAcesso">
          <option value="1">ADMINISTRADOR</option>
          <option value="2">AUXILIAR</option>
         </select> 
        </div>
      </div> 
      <div class="col-sm-4">
        <div class="form-group">
         <label for="exampleInputEmail1">UNIDADE</label>
         <select class="form-control"  id="unidade" name="unidade" >
            <?php
            $res_unidade = $usuario->pesquisar_unidades_todos($conexao);
            foreach ($res_unidade as $key => $value) {
              $status_unidade = $value['status'];
              if($status_unidade == 'ATIVADO'){
                 $id_unidade = $value['id'];
                 $unidade = $value['nome'];
              
                echo"<option value=$id_unidade>$unidade</option>
              ";
              }
             
            }
            ?>
         </select> 
        </div>
      </div> 
    </div>
    <div class="card-footer">
     <button type="submit" class="btn btn-block btn-primary">Concluir</button>
    </div>
  </div>
</form>
<br><h4 align="center">USUARIOS CADASTRADOS</h4><br>
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
                      <th>EMAIL</th> 
                      <th>UNIDADE</th>                    
                      <th>OPÇÕES</th> 
                      <th></th>                                       
                  </tr>
              </thead>
              <tbody>
                <?php 
                $res = $usuario->pesquisar_usuario_todos($conexao);
                foreach ($res as $key => $value) {
                $id = $value['id'];
                $nome = $value['nome'];
                $email = $value['email'];
                $unidade= $value['unidade'];
                $status_conta = $value['status_conta'];
                echo"<tr>
                      <td>$nome</td>
                      <td>$email</td>
                      <td>$unidade</td>
                      <td>
                        <form name='editar$id' action='editar-usuario.php' method='POST'>
                            <input type='hidden' value='$id' name='id'>
                            <button type='submit' class='btn btn-warning'>EDITAR</button>
                        </form>
                      </td>
                      <td id ='status_usuario$id' name ='status_usuario$id'>";
                      if($status_conta == 'ATIVADO'){
                          
                          echo"<form name='desativar$id' method='GET'>
                         <input type='hidden' value='DESATIVADO' id='novo_status$id' name='novo_status$id'>
                         <input type='hidden' value=$id id='id' name='id'>
                         <button type='submit' class='btn btn-danger' onclick='mudar_status_usuario($id);'>DESATIVAR</button>
                          </form>";

                       }
                       else if($status_conta == 'DESATIVADO')
                       {
                          echo"<form name='ativar$id' method='GET'>
                          <input type='hidden' value='ATIVADO' id='novo_status$id'  name='novo_status$id'>
                          <input type='hidden' value=$id id='id' name='id'>
                          <button type='submit' class='btn btn-primary' onclick='mudar_status_usuario($id);' >ATIVAR</button>
                          </form>";
                       }
                echo"
                  </td>
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