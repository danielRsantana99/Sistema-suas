<?php 
session_start();
$nome_sistema = $_GET['nomesistema'];
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 

?>
<script type="text/javascript" src="ajax.js?<?php rand(); ?>"></script>
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
              <?php echo $nome_aplicacao ?>
            </b>
          </h1>
        </center>

      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->


  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> <?php echo $nome_sistema ?></h3>
    </div>
    <!-- /.card-header -->
   <!-- Lista empresas -->
   <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">     
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SISTEMA</font></font></th>
                  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ANYDESK</font></font></th>
                  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ACESSO SSH</font></font></th>
                  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">BANCO DE DADOS</font></font></th>
                  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">OPÇÕES</font></font></th>      
                </tr>
              </thead>
              <tbody> 
                <td>
                  
                </td>
                <td>
                  
                </td>
                <td>
                  
                </td>
                <td>
                  
                </td>
                <td>
                  <button type="button" class="btn btn-warning">EDITAR</button>
                  <button type="button" class="btn btn-danger">DESATIVAR</button>
                </td>
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


<br><br><br><br>


<div class="modal fade" id="cadastro_sub_categoria">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">CADASTRO SUB CATEGORIA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
            <form action="../../Controller/Cadastrar_sub_categoria.php" method="post">
          <!-- corpo -->
             <a class="btn btn-block btn-secondary">CADASTRO SUB CATEGORIA : <b class="text-warning" id="nome_categoria"></b></a>
             <br>
                    <input type="text" class="form-control"  name="sub_categoria" id="sub_categoria" placeholder="Nome sub categoria" required>
                    <input type="hidden" class="form-control"  name="categoria" id="categoria" required>
                  
            
                    
                    <br>

<!-- 
                    <script type="text/javascript">
                     var input = document.querySelector('#input input');
                     var img = document.querySelector('#input img');
                     img.addEventListener('click', function () {
                       input.type = input.type == 'text' ? 'password' : 'text';
                     });
                    
                    </script> -->



               
                 <div class="modal-footer justify-content-between">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                     <div id="botao_continuar" onclick='carregando_login()'>
                       <a class="btn btn-primary" onclick="cadastrar_sub_categoria();" >cadastrar sub categoria</a>
                     </div>
                </div>
            </form>
              <!-- /corpo -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>