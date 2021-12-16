<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../../Model/Conexao.php"; 
include_once "../../Model/Categoria.php"; 
include_once "../../Model/Licitacao.php"; 
include_once "../../Controller/Conversao.php"; 
$categoria= new CategoriaModel();
$licitacao= new LicitacaoModel();
$idempresa=$_SESSION['id'];
?>
  <!-- Main Sidebar Container -->

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-1"></div>
          <div class="col-sm-10 alert alert-<?php echo $tema_aplivacao; ?>">
<center>
  
            <h1 class="m-0"><b>

           <?php echo $nome_aplicacao ?>
          </b></h1>
</center>

          </div><!-- /.col -->


        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
    <div class="row">

        
 <!--      <div class="col-sm-1"></div>
      <div class="col-sm-4">
          <label>DATA INICIAL</label>
          <input id='data_inicial'  autofocus="" type="date" value="<?php echo date('Y-m-d');?>" class="form-control" > 
        </div>
        
        <div class="col-sm-4">
          <label>DATA FINAL</label>
          <input id='data_final'  autofocus="" type="date" value="<?php echo date('Y-m-d');?>" class="form-control" " >
        </div> 
         <div class="col-sm-3">
          <br>
          <label> </label>
          <a href="#" onclick="buscar_atendimento_triagem_por_data();" class="btn btn-primary">BUSCAR</a>
        </div>   --> 

    </div>

    <br>
    <br>
      <div class="row">
      <div class="col-sm-1"> </div>
      <div class="col-sm-10"> 


        <?php 
                       $resultado = $licitacao->listar_licitacao_associado_catehgoria($conexao,$idempresa);
                       foreach ($resultado as $key => $value) {
                         $categoria_id = $value['idcategoria'];
                         $idsubcategoria = $value['idsubcategoria'];
                         $descricao_categoria = $value['descricao_categoria'];
                         
                         $titulo = $value['titulo'];
                         $descricao = $value['descricao'];
                         $data_oficial = $value['data_oficial'];
                         $link_oficial = $value['link_oficial'];


                         echo "
                         <div class='card card-secondary collapsed-card'>
                           <div class='card-header' data-card-widget='collapse'>
                             <h3 class='card-title'>$descricao_categoria </h3>

                             <div class='card-tools'>
                               <button type='button' class='btn btn-tool' data-card-widget='collapse'>
                                 <i class='fas fa-plus'></i>
                               </button>
                             </div>
                             <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class='card-body' style='display: none;'>
                           ";


                             
                                echo "
                                 <h2>$titulo </h2>
                        <b> $descricao <br>
                        ". converte_data($data_oficial) ."</b><br>
                         Acesse o link: <a href='$link_oficial' target='_blanck'>$link_oficial</a> 
                         ";
                             

                             echo"
                           </div>
                         </div>
                         
                        ";
                       }
                       ?>


          <br>
          <br>
          <br>
        

      </div>
    </div>   


<!-- 
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        
      <div class="card">
                      <div class="card-header">
                     
                      </div>
                     
                      <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">

                              <img class="d-block w-100" src="https://imagens1.ne10.uol.com.br/blogsjconline/jcnegocios/2015/10/assembleia.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="imagens/img01.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item ">
                              <img class="d-block w-100" src="imagens/img03.jpg" alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-custom-icon" aria-hidden="true">
                              <i class="fas fa-chevron-left  btn-secondary"></i>
                            </span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-custom-icon" aria-hidden="true">
                              <i class="fas fa-chevron-right btn-secondary"></i>
                            </span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                   
                    </div>
          </div>
      </div> -->

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
          <h4 class="modal-title">Aluno selecionado</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
           <!--  <div class="row">
              <div class="col-md-5 col-sm-5 col-12">
                <label>Nome</label>

                <input id='campo_pesquisa'  autofocus="" type="text" class="form-control"  placeholder="Pesquisar" > 
              </div>
              <div class="col-md-3 col-sm-3col-12">
                <label>Data nascimento</label>
                <input id='data_nascimento'  autofocus="" type="date" class="form-control" " >
              </div>

              <div class="col-md-3 col-sm-3 col-12">
                <br>
                <label> </label>
                <a href="#" class="btn btn-success" onclick="pesquisar_paciente();" >BUSCAR</a>
              </div>
            </div> -->
            
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
                          <tbody id='tabela_paciente'>
                            <tr class="table-primary">
                              <td>1</td>
                              <td>Maria Silva</td>
                              <td>
                                Responsável: Adão da Glória e Jesus<br>
                                CPF: 5646464654<BR>
                                Nascimento: 14/10/2010<BR>
                              </td>
                              
                              <td>           
                            
                              <div class="form-group">
                                <label for="tipo"><b>Tamanho</b></label>
                                <select name="sexo" id="sexo" class="form-control" required="">
                             
                                  <option value="M">P</option>
                                  <option value="F">M</option>
                                </select>
                             
                            </div></td>
                            </tr>                           
                     
                     
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <BR>

                    <a class="btn btn-block btn-primary">CONCLUIR</a>
               
            </div>
              <!-- /corpo -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?php include_once "rodape.php"; ?>