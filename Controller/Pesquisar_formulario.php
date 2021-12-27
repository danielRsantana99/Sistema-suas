<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";
include "../Model/Familiar.php";
include "../Model/Usuario.php";
include "../Model/Beneficios.php";

try {
    $conta=0;
    $beneficios = new beneficiosModel();
    $usuario = new usuarioModel();
    $formulario = new formularioModel();
    $familiar = new familiarModel();
    
    $pesquisa = $_GET['pesquisa'];
    $status = $_GET['status'];
    $unidade1 = $_GET['unidade'];
    $situacao = $_GET['situacao'];
    $beneficio = $_GET['beneficio'];
    $data_inicial = $_GET['data_inicial'];
    $data_final = $_GET['data_final'];
    $idpassado = 0;
    $result="
            <thead>
                <tr>
                    <th>BENEFICIÁRIO</th>
                    <th>CPF</th>
                    <th>FAMILIARES</th>
                    <th>BENEFICIOS</th>
                    <th>CADASTRADOR</th>
                    <th>UNIDADE ATENDIDO</th>
                    <th>OPÇÕES</th>
                    <th></th>  
                    <th></th>   
                    <th></th>
                    <th></th>                                                
                </tr>
            </thead>
            <tbody>";

    if($unidade1 == 'todos' && $situacao != 'todos' && $status != 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_unidade($conexao,$pesquisa,$status,$situacao,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 == 'todos' && $situacao == 'todos' && $status != 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_unidade_situacao($conexao,$pesquisa,$status,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 == 'todos' && $situacao != 'todos' && $status == 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_unidade_status($conexao,$pesquisa,$situacao,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 == 'todos' && $situacao != 'todos' && $status != 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_unidade_beneficio($conexao,$pesquisa,$status,$situacao,$data_inicial,$data_final);
    }
    else if($unidade1 == 'todos' && $situacao == 'todos' && $status == 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_unidade_situacao_status($conexao,$pesquisa,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 == 'todos' && $situacao == 'todos' && $status != 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_unidade_situacao_beneficio($conexao,$pesquisa,$status,$data_inicial,$data_final);
    }   
    else if($unidade1 == 'todos' && $situacao != 'todos' && $status == 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_unidade_status_beneficio($conexao,$pesquisa,$situacao,$data_inicial,$data_final);
    }
    else if($unidade1 != 'todos' && $situacao == 'todos' && $status != 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_situacao($conexao,$pesquisa,$unidade1,$status,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 != 'todos' && $situacao == 'todos' && $status == 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_status_situacao($conexao,$pesquisa,$unidade1,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 != 'todos' && $situacao == 'todos' && $status != 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_situacao_beneficio($conexao,$pesquisa,$unidade1,$status,$data_inicial,$data_final);
    }
    else if($unidade1 != 'todos' && $situacao != 'todos' && $status == 'todos' && $beneficio != 'todos')
    {
        $res=$formulario->p_f_d_status($conexao,$pesquisa,$unidade1,$situacao,$beneficio,$data_inicial,$data_final);
    }
    else if($unidade1 != 'todos' && $situacao != 'todos' && $status == 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_status_beneficio($conexao,$pesquisa,$unidade1,$situacao,$data_inicial,$data_final);
    }
    else if($unidade1 != 'todos' && $situacao != 'todos' && $status != 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_beneficio($conexao,$pesquisa,$unidade1,$status,$situacao,$data_inicial,$data_final);
    }
    else if($unidade1 == 'todos' && $situacao == 'todos' && $status == 'todos' && $beneficio == 'todos')
    {
        $res=$formulario->p_f_d_unidade_situacao_status_beneficio($conexao,$pesquisa,$data_inicial,$data_final);
    }else{
        $res=$formulario->pesquisar_formulario_detalhes($conexao,$pesquisa,$unidade1,$status,$situacao,$beneficio,$data_inicial,$data_final);
    }


    foreach ($res as $key => $value){
        $id = $value['id'];
        $nome = $value['nome'];
        $cpf = $value['cpf'];
        $contratador = $value['contratador'];
        $unidade= $value['unidade'];
        $status_beneficiario = $value['status'];
        $res2  = $familiar->pesquisar_familiar($conexao,$id);
        $res4 = $formulario->pesquisar_relacao_beneficio_beneficiario($conexao,$id);

        if($id != $idpassado){
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
                <h5>$cpf</h5>
            </td>
            <td>";
            foreach ($res2 as $key => $value){
                $nome_familiar = $value['nome'];
                $result.="<h5>$nome_familiar</h5>";   
            }
            $result.="</td>
                  <td>";

            foreach ($res4 as $key => $value){
                $id_beneficio= $value['id_beneficio'];
                $nome_beneficio = $value['nome'];

                $result.="<h5>$nome_beneficio</h5>";    
            }

            $result.="
             </td>
            <td>
                <h5>$contratador</h5>
             </td>
             <td>
              <h5>$unidade</h5> </td>
            <td>
                <form name='vericar$id' action='recebimento.php' method='POST'>
                     <input type='hidden' value='$id' name='id'>
                     <button type='submit' class='btn btn-info'>VERIFICAR</button>
                 </form>
            </td>";

            if (isset($_SESSION['nivel_acesso_id'])) {
                    if ($_SESSION['nivel_acesso_id']==2 && $status_beneficiario == 'ATIVADO') {
                        $result.="
                         <td>     
                            <form name='adicionar$id' action='adicionar_recebimento.php' method='POST'>
                                <input type='hidden' value='$id' name='id'>
                                <button type='submit' class='btn btn-success'>ADICIONAR</button>
                            </form>
                        </td>
                       <td>
                        <form name='editar$id' action='editar-formulario.php' method='POST'>
                            <input type='hidden' value='$id' name='id'>
                            <button type='submit' class='btn btn-warning'>EDITAR</button>
                        </form>
                        </td>
                        <td>
                        <form name='gerarPDF$id' action='teste_pdf.php' method='POST' target='_blank'>
                            <button type='submit' class='btn btn-info' onclick='criar_pdf_formulario($id);'>GERAR PDF</button>
                        </form>
                        </td>";
                        
                    }else{
                        $result.="
                        <td>     
                            <form>
                                <button type='submit' class='btn btn-success' disabled>ADICIONAR</button>
                            </form>
                        </td>
                       <td>
                        <form>
                            <button type='submit' class='btn btn-warning'disabled>EDITAR</button>
                        </form>
                        </td>";
                    }
            
            
            $result.="<td id='status_beneficiario$id' name ='status_beneficiario$id'>";
                if($status_beneficiario == 'ATIVADO'){
                    
                    $result.="<form name='desativar$id' method='GET'>
                   <input type='hidden' value='DESATIVADO' id='novo_status$id' name='novo_status$id'>
                   <input type='hidden' value=$id id='id' name='id'>
                   <button type='submit' class='btn btn-danger' onclick='mudar_status_beneficiario($id);'>DESATIVAR</button>
                    </form>";

                 }
                 else if($status_beneficiario == 'DESATIVADO')
                 {
                    $result.="<form name='ativar$id' method='GET'>
                    <input type='hidden' value='ATIVADO' id='novo_status$id'  name='novo_status$id'>
                    <input type='hidden' value=$id id='id' name='id'>
                    <button type='submit' class='btn btn-primary' onclick='mudar_status_beneficiario($id);' >ATIVAR</button>
                    </form>";
                 }
                $result.="</td>";

                

            }
            $result.="</tr>";
            $idpassado = $id;
        }
        
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