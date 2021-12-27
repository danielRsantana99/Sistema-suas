<?php 
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";
include "../Model/Familiar.php";
include "../Model/Usuario.php";
include "../Model/Beneficios.php";
require 'vendor/autoload.php';
use Dompdf\Dompdf;
try {
    $usuario = new usuarioModel();
    $formulario = new formularioModel();
    $familiar = new familiarModel();
    
    $pesquisa =  $_SESSION['pesquisa'];
    $status =  $_SESSION['statusBeneficiario'];
    $unidade1 = $_SESSION['unidade'];
    $situacao = $_SESSION['situacao'];
    $beneficio = $_SESSION['beneficio'];
    $data_inicial = $_SESSION['data_inicial'];
    $data_final = $_SESSION['data_final'];
    $idpassado = 0;
    $renda_familiar = 0;
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

$result = "<html xmlns:v='urn:schemas-microsoft-com:vml'
    xmlns:o='urn:schemas-microsoft-com:office:office'
    xmlns:w='urn:schemas-microsoft-com:office:word'
    xmlns:m='http://schemas.microsoft.com/office/2004/12/omml'
    xmlns='http://www.w3.org/TR/REC-html40'>

    <head>
    <meta http-equiv=Content-Type content='text/html; charset=windows-1252'>
    <meta name=ProgId content=Word.Document>
    <meta name=Generator content='Microsoft Word 15'>
    <meta name=Originator content='Microsoft Word 15'>
    <link rel=File-List href='Lista%20de%20Beneficiários_arquivos/filelist.xml'>
    <link rel=themeData href='Lista%20de%20Beneficiários_arquivos/themedata.thmx'>
    <link rel=colorSchemeMapping
    href='Lista%20de%20Beneficiários_arquivos/colorschememapping.xml'>
    <style>
    @font-face
        {font-family:Calibri;
        panose-1:2 15 5 2 2 2 4 3 2 4;
        mso-font-charset:0;
        mso-generic-font-family:swiss;
        mso-font-pitch:variable;
        mso-font-signature:-469750017 -1073732485 9 0 511 0;}
     /* Style Definitions */
     p.MsoNormal, li.MsoNormal, div.MsoNormal
        {mso-style-unhide:no;
        mso-style-qformat:yes;
        mso-style-parent:'';
        margin-top:0cm;
        margin-right:0cm;
        margin-bottom:8.0pt;
        margin-left:0cm;
        line-height:107%;
        mso-pagination:widow-orphan;
        font-size:11.0pt;
        font-family:'Calibri',sans-serif;
        mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;
        mso-fareast-font-family:Calibri;
        mso-fareast-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;
        mso-hansi-theme-font:minor-latin;
        mso-bidi-font-family:'Times New Roman';
        mso-bidi-theme-font:minor-bidi;
        mso-fareast-language:EN-US;}
    p.MsoCommentText, li.MsoCommentText, div.MsoCommentText
        {mso-style-noshow:yes;
        mso-style-priority:99;
        mso-style-link:'Texto de comentário Char';
        margin-top:0cm;
        margin-right:0cm;
        margin-bottom:8.0pt;
        margin-left:0cm;
        mso-pagination:widow-orphan;
        font-size:10.0pt;
        font-family:'Calibri',sans-serif;
        mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;
        mso-fareast-font-family:Calibri;
        mso-fareast-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;
        mso-hansi-theme-font:minor-latin;
        mso-bidi-font-family:'Times New Roman';
        mso-bidi-theme-font:minor-bidi;
        mso-fareast-language:EN-US;}
    span.MsoCommentReference
        {mso-style-noshow:yes;
        mso-style-priority:99;
        mso-ansi-font-size:8.0pt;
        mso-bidi-font-size:8.0pt;}
    p.MsoCommentSubject, li.MsoCommentSubject, div.MsoCommentSubject
        {mso-style-noshow:yes;
        mso-style-priority:99;
        mso-style-parent:'Texto de comentário';
        mso-style-link:'Assunto do comentário Char';
        mso-style-next:'Texto de comentário';
        margin-top:0cm;
        margin-right:0cm;
        margin-bottom:8.0pt;
        margin-left:0cm;
        mso-pagination:widow-orphan;
        font-size:10.0pt;
        font-family:'Calibri',sans-serif;
        mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;
        mso-fareast-font-family:Calibri;
        mso-fareast-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;
        mso-hansi-theme-font:minor-latin;
        mso-bidi-font-family:'Times New Roman';
        mso-bidi-theme-font:minor-bidi;
        mso-fareast-language:EN-US;
        font-weight:bold;}
    span.TextodecomentrioChar
        {mso-style-name:'Texto de comentário Char';
        mso-style-noshow:yes;
        mso-style-priority:99;
        mso-style-unhide:no;
        mso-style-locked:yes;
        mso-style-link:'Texto de comentário';
        mso-ansi-font-size:10.0pt;
        mso-bidi-font-size:10.0pt;}
    span.AssuntodocomentrioChar
        {mso-style-name:'Assunto do comentário Char';
        mso-style-noshow:yes;
        mso-style-priority:99;
        mso-style-unhide:no;
        mso-style-locked:yes;
        mso-style-parent:'Texto de comentário Char';
        mso-style-link:'Assunto do comentário';
        mso-ansi-font-size:10.0pt;
        mso-bidi-font-size:10.0pt;
        font-weight:bold;}
    .MsoChpDefault
        {mso-style-type:export-only;
        mso-default-props:yes;
        font-family:'Calibri',sans-serif;
        mso-ascii-font-family:Calibri;
        mso-ascii-theme-font:minor-latin;
        mso-fareast-font-family:Calibri;
        mso-fareast-theme-font:minor-latin;
        mso-hansi-font-family:Calibri;
        mso-hansi-theme-font:minor-latin;
        mso-bidi-font-family:'Times New Roman';
        mso-bidi-theme-font:minor-bidi;
        mso-fareast-language:EN-US;}
    .MsoPapDefault
        {mso-style-type:export-only;
        margin-bottom:8.0pt;
        line-height:107%;}
    @page WordSection1
        {size:595.3pt 841.9pt;
        margin:70.85pt 3.0cm 70.85pt 3.0cm;
        mso-header-margin:35.4pt;
        mso-footer-margin:35.4pt;
        mso-paper-source:0;}
    div.WordSection1
        {page:WordSection1;}

    </style>
    </head>

    <body lang=PT-BR style='tab-interval:35.4pt;word-wrap:break-word'>

    <div class=WordSection1>

    <p class=MsoNormal align=center style='text-align:center'><span
    style='font-size:14.0pt;line-height:107%;font-family:'Times New Roman',serif'>Lista
    de Beneficiários<o:p></o:p></span></p>

    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 
     style='border-collapse:collapse;border:none;
     mso-border-alt:solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:
     0cm 5.4pt 0cm 5.4pt'>
     <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:6.6pt'>
      <td valign=top style='border:solid windowtext 1.0pt;
      mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
      line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>Nome</span></p>
      </td>
      <td valign=top style='border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
      line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>CPF</span></p>
      </td>
      <td  valign=top style='border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
      line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>Telefone</span></p>
      </td>
      <td  valign=top style='border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
      line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>Data
      Entrevista</span></p>
      </td>
      <td  valign=top style='border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
      line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>Renda
      Familiar<u></u></span></p>
      </td>
      <td width=115 valign=top style='width:85.9pt;border:solid windowtext 1.0pt;
      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
      solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
      <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
      line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>Endereço</span></p>
      </td>
     </tr>
    ";
foreach ($res as $key => $value){
    $id = $value['id'];
    $nome = $value['nome'];
    $cpf = $value['cpf'];
    $telefone = $value['telefone'];
    $endereco = $value['endereco'];
    $data= new DateTime($value['data']);
    $renda_propria = $value['renda_propria'];
    $resFamiliar = $familiar->pesquisar_familiar($conexao,$id);
    foreach ($resFamiliar as $key => $value) {
        $renda_familiar += $value['renda'];
    }
    $rendaTotal = $renda_familiar + $renda_propria;
    $data_registro = $data->format('d/m/Y');
    if($id != $idpassado){
        $result.="
            <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes;height:6.6pt'>
              <td width=114 valign=top style='width:70.8pt;border:solid windowtext 1.0pt;
              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
              padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>$nome</span></p>
              </td>
              <td width=114 valign=top style='width:80.8pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>$cpf</span></p>
              </td>
              <td width=115 valign=top style='width:83.9pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>$telefone</span></p>
              </td>
              <td width=115 valign=top style='width:50.9pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>$data_registro</span></p>
              </td>
              <td width=115 valign=top style='width:70.9pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>R$ $rendaTotal</span></p>
              </td>
              <td width=115 valign=top style='width:120.9pt;border-top:none;border-left:
              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
              mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:6.6pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span style='font-size:12.0pt;font-family:'Times New Roman',serif'>$endereco</span></p>
              </td>
            </tr>
        ";
        
        $idpassado = $id;
    }
}

$result.="
    </table>
    </div>
    </body>
    </html>
";

$dompdf = new Dompdf();

$dompdf->loadHtml($result);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();


// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);

$_SESSION['pesquisa'] = '';
$_SESSION['statusBeneficiario']= '';
$_SESSION['unidade']= '';
$_SESSION['situacao']= '';
$_SESSION['beneficio']= '';
$_SESSION['data_inicial']= '';
$_SESSION['data_final']= '';
    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}

?>