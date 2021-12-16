<?php
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";
include "../Model/Beneficios.php";

try {

    $formulario = new formularioModel();
    $beneficio = new beneficiosModel();
    
    $data_inicial = $_GET['data_inicial'];
    $beneficio = $_GET['beneficio'];
    $data_final = $_GET['data_final'];
    $id_beneficiario = $_GET['id'];

    $res = $formulario->pesquisar_recebimento_data($conexao,$id_beneficiario,$data_inicial,$data_final,$beneficio);
    $result="
            <thead>
                <tr>
                    <th>BENEFICIÁRIO</th>
                    <th>BENEFÍCIO</th>
                    <th>DATA RECEBIMENTO</th>
                    <th>ENTREGUE</th>    
                </tr>
            </thead>
            <tbody>
 
    ";
    $conta=0;
    foreach ($res as $key => $value) {
        $nome_beneficiario = $value['nome_beneficiario'];
        $nome_beneficio = $value['nome_beneficio'];
        $data = $value['data_recebimento'];
        $entregue = $value['entregue'];
       
        

$result.="
    <tr> 
        <td>
        <h5>$nome_beneficiario</h5>
        </td>
        <td>
        <h5>$nome_beneficio</h5>
        ";
$result.="
           </div>
         </div>
        ";
        $result.="<br>
        
    </td>
    <td>
        <h5>$data</h5>
    </td>
    <td>
        <h5>$entregue</h5>
    </td>
         </tr>";


         $conta++;
    }
    if ($conta==0) {
        $result.="<tr> <td> NADA ENCONTRADO </td> </tr>";
    }
    
$result.="</tbody>";
echo "$result";
    
} catch (Exception $exc) {
  // echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
    echo $exc;
}
?>