<?php
$mensagem="";
if (isset($_SESSION['mensagem'])) {
  $mensagem=$_SESSION['mensagem'];
}
  if (isset($_SESSION['status'])) {   
    if($_SESSION['status']==0){
        echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Oops',
            text:' $mensagem'
            
          })
      </script>"; 
     
        
    }else if($_SESSION['status']==1) {
      echo "<script>      
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Ação Concluída',
          showConfirmButton: false,
          timer: 1500
        })
      </script>"; 
      
    }

    unset($_SESSION['status']);
    unset($_SESSION['mensagem']);
  } 
?>