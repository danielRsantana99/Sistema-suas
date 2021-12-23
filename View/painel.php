<?php 
  session_start();
 include_once 'cabecalho.php' ;
 include_once 'barra_horizontal.php' ;
 include_once 'menu.php' ;
 include_once 'alertas.php';
 include_once '../Model/Conexao.php' ;
 include_once '../Model/Usuario.php' ;
 include_once '../Model/Formulario.php' ;
 $usuario = new usuarioModel();
 $formulario = new formularioModel();
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

         

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <section class="content">
      <h5 class="mt-4 mb-2" style="font-size: 25px"><b><center>SISTEMA SUAS</center></b><code></code></h5>

      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-sm-2"> </div>
          <div class="col-sm-8"> 
            
              <div class="row">
                  <div class="col-md-6">
                      <!-- small card -->
                      <div class="small-box bg-gradient-info">
                        <div class="inner">
                          <h5><strong>TOTAL DE USUARIOS</strong></h5>
                          <p>
                          <?php try {
                          $quantidade_usuario=0;
                          $res_usuario=$usuario->listarUsuario($conexao);
                          foreach ($res_usuario as $key => $value) {
                            $quantidade_usuario = $value['nome'];
                          }
                          echo $quantidade_usuario;
                          } catch (Exception $e) {
                        } 
                        ?>
                          </p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="small-box bg-gradient-purple">
                        <div class="inner">
                          <h5><strong>FORMULARIOS REGISTRADAS</strong></h5>
                          <p>
                          <?php try {
                          $quantidade_formulario=0;
                          $res_formulario=$formulario->listar_formularios($conexao);
                          foreach ($res_formulario as $key => $value) {
                            $quantidade_formulario = $value['nome'];
                          }
                          echo $quantidade_formulario;
                          } catch (Exception $e) {
                        } 
                        ?>
                          </p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-clipboard-list"></i>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <!-- small card -->
                  <div class="small-box entregue bg-primary">
                    <a  class="small-box-footer" href="cadastrar-formulario.php" >
                      <div class="inner">
                        <h5><strong>REGISTRAR FORMULARIOS</strong></h5>
                      </div>
                      <div class="icon">
                        <i class="fas fa-file-alt"></i>
                      </div>
                      <h3>
                        <br>
                      </h3> <!--i class="fas fa-arrow-circle-right"></i-->
                    </a>
                  </div>                
                </div>
                <div class="col-sm-6">  
                 <div class="small-box entregue bg-info">
                    <a  class="small-box-footer" href="pesquisar_formulario.php">
                      <div class="inner">
                        <h5><strong>PESQUISAR FORMULARIO</strong></h5>
                      </div>
                      <div class="icon">
                       <i class="fas fa-search"></i>
                      </div>
                      <h3>
                        <br>
                      </h3> <!--i class="fas fa-arrow-circle-right"></i-->
                    </a>
                  </div>                
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>

        <div class="container-fluid" >
          <!-- Info boxes -->
          <div class="row">
            <div class="col-sm-12"> 
              <div class="row">

               <hr>

               <script type="text/javascript">
                setTimeout('pesquisa_benefeciado_mudar_status()',500);
              </script>

              <!--div id='resultado_pesquisa'></div-->

              <script type="text/javascript">
                const inputEle = document.getElementById('pesquisa');
                inputEle.addEventListener('keyup', function(e){
                  var key = e.which || e.keyCode;
                                    if (key == 13) { // codigo da tecla enter
                                      pesquisa_usuario();
                                    }
                                  });
                                </script>
                              </div>

                              <!-- /.row -->
                            </div><!--/. container-fluid -->


                          </section>
                          <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->

                        <div class="modal fade" id="modal-procurar">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Pesquisar artista</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-5 col-sm-5 col-12">
                                    <label>Nome artista</label>

                                    <input id='pesquisa'  autofocus="" type="text" class="form-control"  placeholder="Pesquisar" > 
                                  </div>


                                  <div class="col-md-3 col-sm-3 col-12">
                                    <br>
                                    <label> </label>
                                    <a href="#" class="btn btn-primary" onclick="" >BUSCAR</a>
                                  </div>
                                </div>

                                <div class="card">
                                  <br>
                                  <!-- /.card-header -->
                                  <div class="card-body p-0">
                                    <div class="table-responsive">
                                      <table class="table m-0">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Outros dados</th>
                                            <th>Opção</th>

                                          </tr>
                                        </thead>
                                        <tbody id='resultado'>





                                        </tbody>
                                      </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                  </div>
                                  <BR>



                                </div>
                                <!-- /corpo -->
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

 <?php include_once 'rodape.php' ?>