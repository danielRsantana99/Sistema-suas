<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../../Model/Conexao.php"; 
include_once "../../Model/Prefeitura.php"; 
include_once "../../Model/Empresa.php"; 
include_once "../../Model/Usuario.class.php"; 
$prefeitura= new prefeituraModel();
$empresa= new EmpresaModel();
$usuario= new UsuarioModel();
$quantidade_licitacao=0;
$quantidade_empresa=0;
$quantidade_usuario=0;
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
                <?php echo $nome_aplicacao ?>
              </b>
            </h1>
          </center>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-sm-12"> 
            <div class="row">


              <div class="col-lg-4 col-6">

                <div class="small-box bg-info">
                  <a href="#" class="small-box-footer">
                    <div class="inner">
                      <h3>EMPRESAS</h3>


                    </div>
                    <div class="icon">
                      <i class="fas fa-tag"></i>
                    </div>
                    <h3>

                      <?php try {
                        $res_empresa=$empresa->quantidade_empresa($conexao,1);
                        foreach ($res_empresa as $key => $value) {
                          $quantidade_empresa= $value['quantidade'];
                        }
                        echo $quantidade_empresa;
                      } catch (Exception $e) {

                        echo $e;
                      } ?>
                    </h3> <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div> 

              <div class="col-lg-4 col-6">

                <div class="small-box bg-warning">
                  <a href="#" class="small-box-footer">
                    <div class="inner">
                      <h3>LICITAÇÕES</h3>


                    </div>
                    <div class="icon">
                      <i class="fas fa-tag"></i>
                    </div>
                    <h3>
                     <?php try {
                       $res_prefeitura=$prefeitura->quantidade_licitacao($conexao,1);
                       foreach ($res_prefeitura as $key => $value) {
                         $quantidade_licitacao= $value['quantidade'];
                       }
                       echo $quantidade_licitacao;
                     } catch (Exception $e) {


                     } ?>
                   </h3> <i class="fas fa-arrow-circle-right"></i>
                 </a>
               </div>
             </div> 

             <div class="col-lg-4 col-6">

              <div class="small-box bg-primary">
                <a href="#" class="small-box-footer">
                  <div class="inner">
                    <h3>USUÁRIOS</h3>


                  </div>
                  <div class="icon">
                    <i class="fas fa-tag"></i>
                  </div>
                  <h3>
                   <?php try {
                     $res_usuario=$usuario->quantidade_usuario($conexao,1);
                     foreach ($res_usuario as $key => $value) {
                       $quantidade_usuario= $value['quantidade'];
                     }
                     echo $quantidade_usuario;
                   } catch (Exception $e) {


                   } ?>
                 </h3> <i class="fas fa-arrow-circle-right"></i>
               </a>
             </div>
           </div>



         </div>


       </div>
     </div>   
     <!-- /.row -->
   </div><!--/. container-fluid -->
 </section>
 
<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>