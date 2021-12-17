<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Usuario.php";


try {
    $usuario = new usuarioModel();

    $pesquisa = $_GET['pesquisa'];
    $status = $_GET['status'];
    $unidade = $_GET['unidade'];
    $status = $_GET['status'];

   
    $res=$usuario->pesquisar_usuario_nome($conexao,$pesquisa,$unidade,$status);

    $result="
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>WHATSAPP</th>
                    <th>STATUS</th>
                    <th>OPÇÃO</th>
                    <th></th>             
                </tr>
            </thead>
            <tbody>
 
    ";

    $conta=0;
    foreach ($res as $key => $value){
         $id = $value['id'];
         $nome = $value['nome'];
         $email= $value['email'];
         $whatsapp = $value['whatsapp'];     
         $status_conta = $value['status_conta'];
        
$result.="
    <tr> 
        <td>

        <h5>$nome</h5>
        ";
$result.="
           </div>
         </div>
        ";
        $result.="<br>
        
    </td>
    <td>
        <h5>$email</h5>
    </td>
    <td>
        <h5>$whatsapp</h5>
    </td>
    <td>$status</td>
    <td>
        <form name='editar$id' action='editar-usuario.php' method='POST'>
            <input type='hidden' value='$id' id='id' name='id'>
            <button type='submit' class='btn btn-warning'>EDITAR</button>
        </form>
    </td>
    <td id ='status_usuario$id' name ='status_usuario$id'>";
        if($status_conta == 'ATIVADO'){
            
            $result.="<form name='desativar$id' method='GET'>
           <input type='hidden' value='DESATIVADO' id='novo_status$id' name='novo_status$id'>
           <input type='hidden' value=$id id='id' name='id'>
           <button type='submit' class='btn btn-danger' onclick='mudar_status_usuario($id);'>DESATIVAR</button>
            </form>";

         }
         else if($status_conta == 'DESATIVADO')
         {
            $result.="<form name='ativar$id' method='GET'>
            <input type='hidden' value='ATIVADO' id='novo_status$id'  name='novo_status$id'>
            <input type='hidden' value=$id id='id' name='id'>
            <button type='submit' class='btn btn-primary' onclick='mudar_status_usuario($id);' >ATIVAR</button>
            </form>";
         }
        
 $result.="</td>
    </tr>
    ";
           
        
    $conta++;
    }
    if ($conta==0) {
        $result.="<tr> <td> NADA ENCONTRADO </td> </tr>";
    }
    
$result.="</tbody>";
echo "$result";
    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}
?>