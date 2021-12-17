<?php 
session_start();
include_once 'cabecalho.php'; 
include_once 'barra_horizontal.php'; 
include_once "menu.php"; 
include_once "alertas.php"; 
include_once "../../Model/Conexao.php"; 
include_once "../../Model/Prefeitura.php"; 
include_once "../../Model/Empresa.php"; 
include_once "../../Model/Categoria.php"; 
$categoria= new CategoriaModel();
$prefeitura= new prefeituraModel();
$empresa= new EmpresaModel();
$quantidade_licitacao=0;
$quantidade_empresa=0;
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



      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ENVIAR COMUNICADO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <!-- form start -->
             <form action="../../Controller/Enviar_comunicado.php" method="POST">                   
              <div class="card-body">
               <div class="form-group">
                 <label for="exampleInputEmail1">Titulo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="titulo" required="">
               </div>
                <div class="form-group">
                 <label for="exampleInputEmail1">Descrição</label>
                 <textarea rows="3" class="form-control" id="exampleInputEmail1" name="descricao" required=""></textarea>
               </div>   


<h3 class='btn btn-block btn-info'>Áreas que receberão o comunicado  </h3>


       
       <?php 
                    $resultado = $categoria->listar_categoria_todos($conexao);
                    $conta=1;

                      foreach ($resultado as $key => $value) {
                        $categoria_id = $value['id'];
                        $descricao = $value['descricao'];
                        // if ($conta%2==0 || $conta==1) {
                        //     echo "
                        //     <div class='row'>";
                        // }

                        echo "
                
                        <div class='col-sm-12 mb-12'>
                            <h3 class='alert alert-block alert-secondary'>$descricao </h3>
                            
                          ";


                             $resultado_sub = $categoria->listar_sub_categoria_todos($conexao,$categoria_id);
                             foreach ($resultado_sub as $key => $value) {
                               $subcategoria_id = $value['id'];
                               $descricao_sub_categoria = $value['descricao'];
                               echo "
                               <div class='custom-control custom-checkbox'>
                                   <input class='custom-control-input' type='checkbox' id='customCheckbox2$categoria_id$subcategoria_id' name='sub_categoria_id[]' value='$subcategoria_id'>
                                   <label for='customCheckbox2$categoria_id$subcategoria_id' class='custom-control-label'> <b>$descricao_sub_categoria </b></label>
                               </div>

                               ";
                            }

                          
                    echo"</div>";

                    // if ($conta%2==0) {
                    //     echo"</div>";
                    //     $conta=1;
        
                    // }
                    $conta++;
                    
                }
                    
                ?>


         <br>
         <br>
         <br>
  
               <div class="card-footer">
                 <button type="submit" class="btn btn-block btn-primary">Enviar</button>
               </div>
              </div>
             </form>
        </div>
       <!-- Fim Listando Usuários - Já Cadastrado -->



    
 
<!-- ######################################################################## -->
</div>
<?php include_once "rodape.php"; ?>