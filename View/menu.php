      <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
              <a href="index.php" class="brand-link">
                <img src="imagens/logo.png" alt="Logo" class="brand-image img-circle elevation-1" style="opacity: 20">
                
                <span class="brand-text font-weight-light"><?php echo $nome_aplicacao_mini; ?></span>
              </a>

          <!-- Sidebar -->
          <div class="sidebar">


       
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <!-- ######################################################################## -->

          <li class="nav-item">
            <a href="./painel.php" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>

              <p>
               INÍCIO
           
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="meus-dados.php" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>
                MEUS DADOS
           
              </p>
            </a>
         
          </li>        

<?php 
if (isset($_SESSION['nivel_acesso_id'])) {
  if ($_SESSION['nivel_acesso_id']==1) {
 ?>
   
    <li class="nav-item">
      <a href="cadastrar-usuario.php" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>
          CADASTRAR USUARIO
        </p>
      </a>

    </li> 
    <li class="nav-item">
      <a href="cadastrar-beneficio.php" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>
          CADASTRAR BENEFICIO
        </p>
      </a>

    </li> 
    <li class="nav-item">
      <a href="cadastrar-unidade.php" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>
          CADASTRAR UNIDADE
        </p>
      </a>

    </li> 
    <li class="nav-item">
      <a href="pesquisar_usuario.php" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>
          LISTAR USUARIOS
        </p>
      </a>

    </li> 
    <li class="nav-item">
      <a href="pesquisar_formulario.php" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>
          PESQUISAR FORMULARIOS 
     
        </p>
      </a>
   
    </li> 
<?php 
    }elseif ($_SESSION['nivel_acesso_id'] == 2) {
?>
        <li class="nav-item">
          <a href="cadastrar-formulario.php" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>

            <p>
              CADASTRAR FORMULARIO 
         
            </p>
          </a>
        </li> 
        <li class="nav-item">
          <a href="pesquisar_formulario.php" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>
              PESQUISAR FORMULARIOS 
         
            </p>
          </a>
        </li> 

<?php      
    }
  }
?>
         

  <!-- <li class="nav-header">LABELS</li> -->
  <li class="nav-item">
    <a href="logoff.php" class="nav-link">
      <i class="nav-icon far fa-circle text-danger"></i>
      <p class="text">SAIR</p>
    </a>
  </li>


<!-- ######################################################################## -->

              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>