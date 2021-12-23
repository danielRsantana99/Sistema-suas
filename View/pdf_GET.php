<?php 
session_start();
include "../Model/Conexao.php";
include "../Model/Formulario.php";
include "../Model/Familiar.php";
require 'vendor/autoload.php';
use Dompdf\Dompdf;
try {
   $id=$_GET['id'];
   $formulario = new formularioModel();
   $familiar = new familiarModel();
	$renda_total  = 0;
   $resContarMembros=$familiar->listar_familiar($conexao,$id);
   foreach ($resContarMembros as $key => $value) {
   	 $contador_membros = $value['nome'];
   }
   $res=$formulario->pesquisar_formulario_individual($conexao,$id);
   foreach ($res as $key => $value) {
    $nome = $value['nome']; 
    $sexo= $value['sexo']; 
    $data_nascimento = new DateTime($value['data_nascimento']); 
    $idade = $value['idade'];
    $estado_civil = $value['estado_civil'];
    $escolaridade = $value['escolaridade'];
    $endereco = $value['endereco']; 
    $ponto_referencia = $value['ponto_referencia'];
    $telefone = $value['telefone'];
    $rg = $value['rg'];
    $cpf = $value['cpf'];
    $titulo_eleitoral = $value['titulo_eleitoral'];
    $zona = $value['zona_eleitoral']; 
    $secao = $value['secao_eleitoral'];
    $nis = $value['nis'];
    $empregado = $value['empregado'];
    $renda_propria = $value['renda_propria'];
    $bolsa_familia = $value['bolsa_familia']; 
    $quanto_bolsa_familia = $value['quanto_bolsa_familia'];
    $moradia = $value['moradia'];
    $quanto_moradia = $value['quanto_moradia'];
    $tipo_moradia = $value['tipo_moradia'];
    $qual_tipo = $value['outros_qual']; 
    $numero_comodos = $value['n_comodos'];
    $presenca_idoso = $value['presenca_idosos'];
    $presenca_gestante = $value['presenca_gestante'];
    $meses_gestantes = $value['quantos_meses_gestante'];
    $presenca_deficiente = $value['presenca_deficiente'];
    $qual_deficiencia = $value['qual_deficiencia'];
    $agua_filtrada = $value['agua_filtrada'];
    $qual_agua_filtrada = $value['qual_agua_filtrada'];
    $parecer_tecnico = $value['parecer_tecnico_servico_social'];
    $data= new DateTime($value['data']);
    $renda_total += $renda_propria;
   }
   $data_registro = $data->format('d/m/Y');
   $data_formatada = $data_nascimento->format('d/m/Y');
   $resFamiliar = $familiar->pesquisar_familiar($conexao,$id);
   
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
        <link rel=File-List href='FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/filelist.xml'>

        <link rel=themeData
        href='FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/themedata.thmx'>
        <link rel=colorSchemeMapping
        href='FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/colorschememapping.xml'>

        <style>
            <!--
             /* Font Definitions */
            @font-face
                {font-family:'Cambria Math';
                panose-1:2 4 5 3 5 4 6 3 2 4;
                mso-font-charset:0;
                mso-generic-font-family:roman;
                mso-font-pitch:variable;
                mso-font-signature:-536870145 1107305727 0 0 415 0;}
            @font-face
                {font-family:Calibri;
                panose-1:2 15 5 2 2 2 4 3 2 4;
                mso-font-charset:0;
                mso-generic-font-family:swiss;
                mso-font-pitch:variable;
                mso-font-signature:-469750017 -1073732485 9 0 511 0;}
            @font-face
                {font-family:'Britannic Bold';
                mso-font-charset:0;
                mso-generic-font-family:swiss;
                mso-font-pitch:variable;
                mso-font-signature:3 0 0 0 1 0;}
            @font-face
                {font-family:Tahoma;
                panose-1:2 11 6 4 3 5 4 4 2 4;
                mso-font-charset:0;
                mso-generic-font-family:swiss;
                mso-font-pitch:variable;
                mso-font-signature:-520081665 -1073717157 41 0 66047 0;}
             /* Style Definitions */
             p.MsoNormal, li.MsoNormal, div.MsoNormal
                {mso-style-unhide:no;
                mso-style-qformat:yes;
                mso-style-parent:'';
                margin-top:0cm;
                margin-right:0cm;
                margin-bottom:10.0pt;
                margin-left:0cm;
                line-height:115%;
                mso-pagination:widow-orphan;
                font-size:11.0pt;
                font-family:'Calibri',sans-serif;
                mso-ascii-font-family:Calibri;
                mso-ascii-theme-font:minor-latin;
                mso-fareast-font-family:'Times New Roman';
                mso-fareast-theme-font:minor-fareast;
                mso-hansi-font-family:Calibri;
                mso-hansi-theme-font:minor-latin;
                mso-bidi-font-family:'Times New Roman';
                mso-bidi-theme-font:minor-bidi;}
            p.MsoHeader, li.MsoHeader, div.MsoHeader
                {mso-style-noshow:yes;
                mso-style-priority:99;
                mso-style-link:'Cabeçalho Char';
                margin:0cm;
                mso-pagination:widow-orphan;
                tab-stops:center 212.6pt right 425.2pt;
                font-size:11.0pt;
                font-family:'Calibri',sans-serif;
                mso-ascii-font-family:Calibri;
                mso-ascii-theme-font:minor-latin;
                mso-fareast-font-family:'Times New Roman';
                mso-fareast-theme-font:minor-fareast;
                mso-hansi-font-family:Calibri;
                mso-hansi-theme-font:minor-latin;
                mso-bidi-font-family:'Times New Roman';
                mso-bidi-theme-font:minor-bidi;}
            p.MsoFooter, li.MsoFooter, div.MsoFooter
                {mso-style-noshow:yes;
                mso-style-priority:99;
                mso-style-link:'Rodapé Char';
                margin:0cm;
                mso-pagination:widow-orphan;
                tab-stops:center 212.6pt right 425.2pt;
                font-size:11.0pt;
                font-family:'Calibri',sans-serif;
                mso-ascii-font-family:Calibri;
                mso-ascii-theme-font:minor-latin;
                mso-fareast-font-family:'Times New Roman';
                mso-fareast-theme-font:minor-fareast;
                mso-hansi-font-family:Calibri;
                mso-hansi-theme-font:minor-latin;
                mso-bidi-font-family:'Times New Roman';
                mso-bidi-theme-font:minor-bidi;}
            p.MsoCaption, li.MsoCaption, div.MsoCaption
                {mso-style-unhide:no;
                mso-style-qformat:yes;
                mso-style-next:Normal;
                margin:0cm;
                text-align:center;
                mso-pagination:widow-orphan;
                font-size:12.0pt;
                font-family:'Arial',sans-serif;
                mso-fareast-font-family:'Times New Roman';
                mso-bidi-font-family:'Times New Roman';
                font-weight:bold;
                mso-bidi-font-weight:normal;}
            p.MsoTitle, li.MsoTitle, div.MsoTitle
                {mso-style-unhide:no;
                mso-style-qformat:yes;
                mso-style-link:'Título Char';
                margin-top:0cm;
                margin-right:-13.05pt;
                margin-bottom:0cm;
                margin-left:0cm;
                text-align:center;
                mso-pagination:widow-orphan;
                font-size:12.0pt;
                font-family:'Arial',sans-serif;
                mso-fareast-font-family:'Times New Roman';
                mso-bidi-font-family:'Times New Roman';
                font-weight:bold;
                mso-bidi-font-weight:normal;}
            p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
                {mso-style-unhide:no;
                mso-style-link:'Corpo de texto Char';
                margin:0cm;
                text-align:center;
                mso-pagination:widow-orphan;
                font-size:11.0pt;
                mso-bidi-font-size:10.0pt;
                font-family:'Britannic Bold',sans-serif;
                mso-fareast-font-family:'Times New Roman';
                mso-bidi-font-family:'Times New Roman';
                font-weight:bold;
                mso-bidi-font-weight:normal;}
            p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
                {mso-style-noshow:yes;
                mso-style-priority:99;
                mso-style-link:'Texto de balão Char';
                margin:0cm;
                mso-pagination:widow-orphan;
                font-size:8.0pt;
                font-family:'Tahoma',sans-serif;
                mso-fareast-font-family:'Times New Roman';
                mso-fareast-theme-font:minor-fareast;}
            span.CorpodetextoChar
                {mso-style-name:'Corpo de texto Char';
                mso-style-unhide:no;
                mso-style-locked:yes;
                mso-style-link:'Corpo de texto';
                mso-bidi-font-size:10.0pt;
                font-family:'Britannic Bold',sans-serif;
                mso-ascii-font-family:'Britannic Bold';
                mso-fareast-font-family:'Times New Roman';
                mso-hansi-font-family:'Britannic Bold';
                mso-bidi-font-family:'Times New Roman';
                font-weight:bold;
                mso-bidi-font-weight:normal;}
            span.TtuloChar
                {mso-style-name:'Título Char';
                mso-style-unhide:no;
                mso-style-locked:yes;
                mso-style-link:Título;
                mso-ansi-font-size:12.0pt;
                mso-bidi-font-size:12.0pt;
                font-family:'Arial',sans-serif;
                mso-ascii-font-family:Arial;
                mso-fareast-font-family:'Times New Roman';
                mso-hansi-font-family:Arial;
                mso-bidi-font-family:'Times New Roman';
                font-weight:bold;
                mso-bidi-font-weight:normal;}
            span.CabealhoChar
                {mso-style-name:'Cabeçalho Char';
                mso-style-noshow:yes;
                mso-style-priority:99;
                mso-style-unhide:no;
                mso-style-locked:yes;
                mso-style-link:Cabeçalho;}
            span.RodapChar
                {mso-style-name:'Rodapé Char';
                mso-style-noshow:yes;
                mso-style-priority:99;
                mso-style-unhide:no;
                mso-style-locked:yes;
                mso-style-link:Rodapé;}
            span.TextodebaloChar
                {mso-style-name:'Texto de balão Char';
                mso-style-noshow:yes;
                mso-style-priority:99;
                mso-style-unhide:no;
                mso-style-locked:yes;
                mso-style-link:'Texto de balão';
                mso-ansi-font-size:8.0pt;
                mso-bidi-font-size:8.0pt;
                font-family:'Tahoma',sans-serif;
                mso-ascii-font-family:Tahoma;
                mso-hansi-font-family:Tahoma;
                mso-bidi-font-family:Tahoma;}
            span.SpellE
                {mso-style-name:'';
                mso-spl-e:yes;}
            span.GramE
                {mso-style-name:'';
                mso-gram-e:yes;}
            .MsoChpDefault
                {mso-style-type:export-only;
                mso-default-props:yes;
                font-family:'Calibri',sans-serif;
                mso-ascii-font-family:Calibri;
                mso-ascii-theme-font:minor-latin;
                mso-fareast-font-family:'Times New Roman';
                mso-fareast-theme-font:minor-fareast;
                mso-hansi-font-family:Calibri;
                mso-hansi-theme-font:minor-latin;
                mso-bidi-font-family:'Times New Roman';
                mso-bidi-theme-font:minor-bidi;}
            .MsoPapDefault
                {mso-style-type:export-only;
                margin-bottom:10.0pt;
                line-height:115%;}
             /* Page Definitions */
             @page
                {mso-footnote-separator:url('FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/header.htm') fs;
                mso-footnote-continuation-separator:url('FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/header.htm') fcs;
                mso-endnote-separator:url('FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/header.htm') es;
                mso-endnote-continuation-separator:url('FORMULÁRIO%20DE%20CADASTRO.docx_arquivos/header.htm') ecs;}
            @page WordSection1
                {size:595.3pt 841.9pt;
                margin:70.85pt 3.0cm 70.85pt 3.0cm;
                mso-header-margin:35.4pt;
                mso-footer-margin:35.4pt;
                mso-paper-source:0;}
            div.WordSection1
                {page:WordSection1;}
            -->
        </style>
    </head>

    <body lang=PT-BR style='tab-interval:35.4pt;word-wrap:break-word'>

            <div class=WordSection1>

            <p class=MsoTitle align=left style='text-align:center;
            text-indent:35.4pt'>FORMULARIO DE REQUERIMENTO</p>

            <p class=MsoTitle><span lang=EN-US style='mso-ansi-language:EN-US'><o:p>&nbsp;</o:p></span></p>
             <p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:
              0cm;margin-left:0cm;line-height:normal'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
              mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>1 –
              IDENTIFICAÇÃO<span
              style='mso-spacerun:yes'>                                                                      
              </span>DATA: $data_registro  </span></b></p>
            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
               style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
               mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
               <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
                <td colspan=4 valign=top style='border:solid black 1.0pt;
                mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
                text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal;'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Nome
                do Beneficiário: $nome</span></p>
                </td>
               </tr>
               <tr style='mso-yfti-irow:1'>
                <td width=172 valign=top style='width:129.0pt;border:solid black 1.0pt;
                mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
                mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
                text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Sexo:";
                if($sexo == 'MASCULINO'){
                	$result.="<span class=GramE>(<span style='mso-spacerun:yes'> X </span></span><span
                 style='mso-spacerun:yes'></span>) M<span style='mso-spacerun:yes'>    </span>(<span style='mso-spacerun:yes'>   </span>) F</span>";

                }else if($sexo == 'FEMININO'){
                	$result.="<span class=GramE>(<span style='mso-spacerun:yes'> </span></span><span
                 style='mso-spacerun:yes'></span>) M<span style='mso-spacerun:yes'>    </span>(<span style='mso-spacerun:yes'> X</span>) F</span>";
                }
                $result.="</p>
                </td>
                <td width=344 colspan=2 valign=top style='width:258.0pt;border-top:none;
                border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:
                text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
                mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
                mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
                mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Data
                de Nascimento:$data_formatada; </span></p>
                </td>
                <td width=172 valign=top style='width:129.0pt;border-top:none;border-left:
                none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
                border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
                mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
                mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
                mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Idade:
                <span class=GramE>(<span style='mso-spacerun:yes'> $idade</span></span><span
                style='mso-spacerun:yes'> </span>) anos</span></p>
                </td>
               </tr>
               <tr style='mso-yfti-irow:2'>
                <td width=688 colspan=4 valign=top style='width:516.0pt;border:solid black 1.0pt;
                mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
                mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
                text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;;text-align:justify;text-justify:
                inter-ideograph;line-height:normal'><span style='font-size:10.0pt;
                mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
                'Times New Roman';mso-bidi-theme-font:minor-bidi'>Estado Civil: "; 
                if($estado_civil == 'SOLTEIRO'){
                	$result.="<span
                class=GramE>(<span style='mso-spacerun:yes'> X</span></span><span
                style='mso-spacerun:yes'> </span>) Solteiro<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Casado<span style='mso-spacerun:yes'>   </span>(<span
                style='mso-spacerun:yes'>    </span>) Viúvo<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Divorciado / Separado<span style='mso-spacerun:yes'>  
                </span>(<span style='mso-spacerun:yes'>    </span>) União Estável</span>";
                }elseif ($estado_civil == 'CASADO') {
                	$result.="<span
                class=GramE>(<span style='mso-spacerun:yes'> </span></span><span
                style='mso-spacerun:yes'>  </span>) Solteiro<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'> X 
                </span>) Casado<span style='mso-spacerun:yes'>   </span>(<span
                style='mso-spacerun:yes'>    </span>) Viúvo<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Divorciado / Separado<span style='mso-spacerun:yes'>  
                </span>(<span style='mso-spacerun:yes'>    </span>) União Estável</span>";
                }elseif ($estado_civil == 'VIÚVO') {
                	$result.="<span
                class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
                style='mso-spacerun:yes'>  </span>) Solteiro<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Casado<span style='mso-spacerun:yes'>   </span>(<span
                style='mso-spacerun:yes'> X  </span>) Viúvo<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Divorciado / Separado<span style='mso-spacerun:yes'>  
                </span>(<span style='mso-spacerun:yes'>    </span>) União Estável</span>";
                }elseif ($estado_civil == 'DIVORCIADO') {
                	$result.="<span
                class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
                style='mso-spacerun:yes'>  </span>) Solteiro<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Casado<span style='mso-spacerun:yes'>   </span>(<span
                style='mso-spacerun:yes'>    </span>) Viúvo<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'> X 
                </span>) Divorciado / Separado<span style='mso-spacerun:yes'>  
                </span>(<span style='mso-spacerun:yes'>    </span>) União Estável</span>";
                }elseif ($estado_civil == 'UNIÃO ESTAVEL') {
                	$result.="<span
                class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
                style='mso-spacerun:yes'>  </span>) Solteiro<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Casado<span style='mso-spacerun:yes'>   </span>(<span
                style='mso-spacerun:yes'>    </span>) Viúvo<span
                style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                </span>) Divorciado / Separado<span style='mso-spacerun:yes'>  
                </span>(<span style='mso-spacerun:yes'> X  </span>) União Estável</span>";
                }

                $result.="</p>
                </td>
               </tr>
               <tr style='mso-yfti-irow:3'>
                <td width=422 colspan=2 valign=top style='width:316.2pt;border:solid black 1.0pt;
                mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
                mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
                text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Escolaridade
                "; 
                if($escolaridade == 'NÃO_ALFABETIZADO'){
                	$result.="
                <span class=GramE>(<span style='mso-spacerun:yes'>  X</span></span><span
                style='mso-spacerun:yes'> </span>) Não alfabetizado<span
                style='mso-spacerun:yes'>               </span>ou (<span
                style='mso-spacerun:yes'>   </span>) Alfabetizado<span
                style='mso-spacerun:yes'>   </span></span>
                "; 
                }elseif ($escolaridade == 'ALFABETIZADO') {
                	$result.="
                <span class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
                style='mso-spacerun:yes'> </span>) Não alfabetizado<span
                style='mso-spacerun:yes'>               </span>ou (<span
                style='mso-spacerun:yes'> X </span>) Alfabetizado<span
                style='mso-spacerun:yes'>   </span></span>
                "; 
                }
                $result.="</p>
                </td>
                <td width=266 colspan=2 valign=top style='width:199.8pt;border-top:none;
                border-left:none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:
                text1;border-right:solid black 1.0pt;mso-border-right-themecolor:text1;
                mso-border-top-alt:solid black .5pt;mso-border-top-themecolor:text1;
                mso-border-left-alt:solid black .5pt;mso-border-left-themecolor:text1;
                mso-border-alt:solid black .5pt;mso-border-themecolor:text1;padding:0cm 5.4pt 0cm 5.4pt'>
                </td>
               </tr>
               <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
                <td width=688 colspan=4 valign=top style='width:516.0pt;border:solid black 1.0pt;
                mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
                mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
                text1;padding:0cm 5.4pt 0cm 5.4pt'>
                <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><span style='font-size:10.0pt;
                mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
                'Times New Roman';mso-bidi-theme-font:minor-bidi'><b
                style='mso-bidi-font-weight:normal'>Endereço:</b>
                $endereco</span></p>
             
                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b
                style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;
                mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
                'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></b></p>
                <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Ponto
                de Referência: $ponto_referencia<span
                style='mso-spacerun:yes'>                                                                                                   
                </span><span class=SpellE>Tel: $telefone</span></span></p>
                </td>
               </tr>
               <![if !supportMisalignedColumns]>
               <tr height=0>
                <td width=72 style='border:none'></td>
                <td width=150 style='border:none'></td>
                <td width=94 style='border:none'></td>
                <td width=72 style='border:none'></td>
               </tr>
               <![endif]>
            </table>
            <p class=MsoNormal style='margin-top:40px;text-align:justify;text-justify:
              inter-ideograph'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
              mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>2-
              DOCUMENTAÇÃO</span></b></p>
            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
               style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
               mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
              <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:0.75pt;mso-row-margin-left:
              4.25pt;mso-row-margin-right:11.55pt'>
              <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
              width=6><p class='MsoNormal'>&nbsp;
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
              width=15 colspan=2><p class='MsoNormal'>&nbsp;</td>
              </tr>
              <tr style='mso-yfti-irow:1;height:1.0cm;mso-row-margin-left:4.25pt;mso-row-margin-right:
              11.55pt'>
              <td style='mso-cell-special:placeholder;border:none;border-bottom:solid windowtext 1.0pt'
              width=6><p class='MsoNormal'>&nbsp;</td>
              <td width=689 colspan=2 valign=top style='width:516.75pt;border:none;
              border-bottom:solid windowtext 1.0pt;mso-border-top-alt:solid windowtext .75pt;
              mso-border-top-alt:solid windowtext .75pt;mso-border-bottom-alt:solid windowtext .75pt;
              padding:0cm 0cm 0cm 0cm;height:1.0cm'>
              </td>
              <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
              width=15 colspan=2><p class='MsoNormal'>&nbsp;</td>
             </tr>
             <tr style='mso-yfti-irow:2;mso-row-margin-right:8.0pt'>
                  <td width=293 colspan=2 valign=top style='width:219.85pt;border:solid windowtext 1.0pt;
                  border-top:none;mso-border-top-alt:solid windowtext .75pt;mso-border-alt:
                  solid windowtext .5pt;mso-border-top-alt:solid windowtext .75pt;padding:0cm 3.5pt 0cm 3.5pt'>
                  <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
                  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>RG: $rg</span></p>
                  <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
                  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>CPF:$cpf</span></p>
                  </td>
                  <td width=406 colspan=2 valign=top style='width:304.7pt;border-top:none;
                  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                  mso-border-top-alt:solid windowtext .75pt;mso-border-left-alt:solid windowtext .5pt;
                  mso-border-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .75pt;
                  padding:0cm 3.5pt 0cm 3.5pt'>
                  <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
                  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>TITULO ELEITORAL:$titulo_eleitoral   ZONA:$zona   SEÇÃO: $secao</span></p>
                  <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
                  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>NIS: $nis </span></p>
                  </td>
                  <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
                  width=11><p class='MsoNormal'>&nbsp;</td>
                 </tr>
                 <tr style='mso-yfti-irow:3;height:25.7pt;mso-row-margin-right:8.0pt'>
                 <td width=699 colspan=4 valign=top style='width:524.55pt;border:solid windowtext 1.0pt;
                  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                  padding:0cm 3.5pt 0cm 3.5pt;height:25.7pt'>
                  <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><b style='mso-bidi-font-weight:normal'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>SITUAÇÃO ATUAL</span></b><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>:</span></p>
                  <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;mso-bidi-font-size:
                  11.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>Empregado:
                  "; 
                  if($empregado == 'FORMAL'){
                  	$result.="( <span
                  class=GramE><span style='mso-spacerun:yes'>X</span>)</span> <span
                  style='mso-spacerun:yes'> </span>Formal </span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>(<span style='mso-spacerun:yes'>   </span>) <span
                  style='mso-spacerun:yes'> </span>Informal</span><span style='font-size:10.0pt;
                  mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> </span><span
                  style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>(<span
                  style='mso-spacerun:yes'>   </span>) <span style='mso-spacerun:yes'> </span>Autônomo(<span
                  style='mso-spacerun:yes'>   </span>)<span style='mso-spacerun:yes'>     
                  </span><span style='mso-spacerun:yes'> </span>Desempregado(<span
                  style='mso-spacerun:yes'>    </span>)</span></p>
                  <p class=MsoNormal style='margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span class=GramE><span style='font-size:
                  10.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>( <span
                  style='mso-spacerun:yes'> </span></span></span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'><span
                  style='mso-spacerun:yes'> </span>)Aposentado/Pensionista<span
                  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>   
                  </span>)</span>
                  ";
                  }elseif ($empregado == 'INFORMAL') {
                  	$result.="( <span
                  class=GramE><span style='mso-spacerun:yes'>  </span>)</span> <span
                  style='mso-spacerun:yes'>  </span>Formal </span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>(<span style='mso-spacerun:yes'>X </span>) <span
                  style='mso-spacerun:yes'> </span>Informal</span><span style='font-size:10.0pt;
                  mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> </span><span
                  style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>(<span
                  style='mso-spacerun:yes'>   </span>) <span style='mso-spacerun:yes'> </span>Autônomo(<span
                  style='mso-spacerun:yes'>   </span>)<span style='mso-spacerun:yes'>     
                  </span><span style='mso-spacerun:yes'> </span>Desempregado(<span
                  style='mso-spacerun:yes'>    </span>)</span></p>
                  <p class=MsoNormal style='margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span class=GramE><span style='font-size:
                  10.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>( <span
                  style='mso-spacerun:yes'> </span></span></span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'><span
                  style='mso-spacerun:yes'> </span>)Aposentado/Pensionista<span
                  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>   
                  </span>)</span>
                  ";
                  }elseif ($empregado == 'AUTÔNOMO') {
                  	$result.="( <span
                  class=GramE><span style='mso-spacerun:yes'>  </span>)</span> <span
                  style='mso-spacerun:yes'>  </span>Formal </span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>(<span style='mso-spacerun:yes'>   </span>) <span
                  style='mso-spacerun:yes'> </span>Informal</span><span style='font-size:10.0pt;
                  mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> </span><span
                  style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>(<span
                  style='mso-spacerun:yes'>X </span>) <span style='mso-spacerun:yes'> </span>Autônomo(<span
                  style='mso-spacerun:yes'>   </span>)<span style='mso-spacerun:yes'>     
                  </span><span style='mso-spacerun:yes'> </span>Desempregado(<span
                  style='mso-spacerun:yes'>    </span>)</span></p>
                  <p class=MsoNormal style='margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span class=GramE><span style='font-size:
                  10.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>( <span
                  style='mso-spacerun:yes'> </span></span></span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'><span
                  style='mso-spacerun:yes'> </span>)Aposentado/Pensionista<span
                  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>   
                  </span>)</span>
                  ";
                  }elseif ($empregado == 'DESEMPREGADO') {
                  	$result.="( <span
                  class=GramE><span style='mso-spacerun:yes'>  </span>)</span> <span
                  style='mso-spacerun:yes'>  </span>Formal </span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>(<span style='mso-spacerun:yes'>   </span>) <span
                  style='mso-spacerun:yes'> </span>Informal</span><span style='font-size:10.0pt;
                  mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> </span><span
                  style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>(<span
                  style='mso-spacerun:yes'>   </span>) <span style='mso-spacerun:yes'> </span>Autônomo(<span
                  style='mso-spacerun:yes'>X </span>)<span style='mso-spacerun:yes'>     
                  </span><span style='mso-spacerun:yes'> </span>Desempregado(<span
                  style='mso-spacerun:yes'>    </span>)</span></p>
                  <p class=MsoNormal style='margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span class=GramE><span style='font-size:
                  10.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>( <span
                  style='mso-spacerun:yes'> </span></span></span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'><span
                  style='mso-spacerun:yes'> </span>)Aposentado/Pensionista<span
                  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>   
                  </span>)</span>
                  ";
                  }elseif ($empregado == 'APOSENTADO/PENSIONISTA') {
                  	$result.="( <span
                  class=GramE><span style='mso-spacerun:yes'>  </span>)</span> <span
                  style='mso-spacerun:yes'>  </span>Formal </span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>(<span style='mso-spacerun:yes'>   </span>) <span
                  style='mso-spacerun:yes'> </span>Informal</span><span style='font-size:10.0pt;
                  mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> </span><span
                  style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>(<span
                  style='mso-spacerun:yes'>   </span>) <span style='mso-spacerun:yes'> </span>Autônomo(<span
                  style='mso-spacerun:yes'>   </span>)<span style='mso-spacerun:yes'>     
                  </span><span style='mso-spacerun:yes'> </span>Desempregado(<span
                  style='mso-spacerun:yes'>    </span>)</span></p>
                  <p class=MsoNormal style='margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span class=GramE><span style='font-size:
                  10.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>( <span
                  style='mso-spacerun:yes'>X</span></span></span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'><span
                  style='mso-spacerun:yes'> </span>)Aposentado/Pensionista<span
                  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>   
                  </span>)</span>
                  ";
                  }elseif ($empregado == 'BPC/LOAS') {
                  	$result.="( <span
                  class=GramE><span style='mso-spacerun:yes'>  </span>)</span> <span
                  style='mso-spacerun:yes'>  </span>Formal </span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>(<span style='mso-spacerun:yes'>   </span>) <span
                  style='mso-spacerun:yes'> </span>Informal</span><span style='font-size:10.0pt;
                  mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> </span><span
                  style='font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>(<span
                  style='mso-spacerun:yes'>   </span>) <span style='mso-spacerun:yes'> </span>Autônomo(<span
                  style='mso-spacerun:yes'>   </span>)<span style='mso-spacerun:yes'>     
                  </span><span style='mso-spacerun:yes'> </span>Desempregado(<span
                  style='mso-spacerun:yes'>    </span>)</span></p>
                  <p class=MsoNormal style='margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span class=GramE><span style='font-size:
                  10.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>( <span
                  style='mso-spacerun:yes'> </span></span></span><span style='font-size:10.0pt;
                  line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'><span
                  style='mso-spacerun:yes'> </span>)Aposentado/Pensionista<span
                  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>X
                  </span>)</span>
                  ";
                  }

                  $result.="</p>
                  <p class=MsoNormal style='margin-top: 10px;margin-bottom:7px;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;mso-bidi-font-size:
                  11.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>
                  Renda própria: R$ $renda_propria   
                  </span><span style='font-size:10.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'> Bolsa Família:
                  "; 
                  if($bolsa_familia == 'SIM'){
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>X</span></span><span
                  style='mso-spacerun:yes'></span>)Sim<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'>  </span><span
                  style='mso-spacerun:yes'> </span>)Não .

                  "; 
                  }elseif ($bolsa_familia == 'NÃO') {
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'> </span>)Sim<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'>X</span><span
                  style='mso-spacerun:yes'> </span>)Não .

                  "; 
                  }

                  $result.="Quanto? $quanto_bolsa_familia </span></p>

                  <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;text-justify:
                  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;mso-bidi-font-size:
                  11.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
                  'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
                  </td>
                 <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
                  width=11><p class='MsoNormal'>&nbsp;</td>
             </tr>
             <tr style='mso-yfti-irow:3;mso-row-margin-right:8.0pt'>
                <td width=293 colspan=4 valign=top style='width:219.85pt;border:solid windowtext 1.0pt;
                  border-top:none;mso-border-top-alt:solid windowtext .75pt;mso-border-alt:
                  solid windowtext .5pt;mso-border-top-alt:solid windowtext .75pt;padding:0cm 3.5pt 0cm 3.5pt'><p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><b
                  style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;line-height:
                  115%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>MORADIA:</span></b><span style='font-size:
                  10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'></span></p>
                  "; 
                  if($moradia == 'PRÓPRIA'){
                  	$result.="
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:115%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Própria: <span class=GramE>(<span
                  style='mso-spacerun:yes'> X</span></span><span
                  style='mso-spacerun:yes'> </span>)<span style='mso-spacerun:yes'>  </span>De
                  favor: (<span style='mso-spacerun:yes'>    </span>)<span
                  style='mso-spacerun:yes'>   </span>Alugada(<span style='mso-spacerun:yes'>   
                  </span>) </span>
                  "; 
                  }elseif ($moradia == 'DE_FAVOR') {
                  	$result.="
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:115%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Própria: <span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>  </span>)<span style='mso-spacerun:yes'>  </span>De
                  favor: (<span style='mso-spacerun:yes'>X</span>)<span
                  style='mso-spacerun:yes'>   </span>Alugada(<span style='mso-spacerun:yes'> X 
                  </span>) </span>
                  "; 
                  }elseif ($moradia== 'ALUGADA') {
                  	$result.="
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:115%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Própria: <span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>  </span>)<span style='mso-spacerun:yes'>  </span>De
                  favor: (<span style='mso-spacerun:yes'>    </span>)<span
                  style='mso-spacerun:yes'>   </span>Alugada(<span style='mso-spacerun:yes'>   
                  </span>) </span>
                  "; 
                  }
                  $result.="<span style='font-size:10.0pt;line-height:150%;font-family:
                  'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:
                  minor-bidi'>Se paga aluguel: Quanto? R$ $quanto_moradia</span></p>
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Tipo:
                  "; 
                  if($tipo_moradia == 'ALVENARIA'){
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'> X</span></span><span
                  style='mso-spacerun:yes'> </span>) Alvenaria<span
                  style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                  </span>) Madeira<span style='mso-spacerun:yes'>   </span>(<span
                  style='mso-spacerun:yes'>    </span>) Taipa<span style='mso-spacerun:yes'>  
                  </span>Outros: (<span style='mso-spacerun:yes'>    </span>) Qual? 
                  ";
                  }elseif ($tipo_moradia == 'MADEIRA') {
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>  </span>) Alvenaria<span
                  style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'> X 
                  </span>) Madeira<span style='mso-spacerun:yes'>   </span>(<span
                  style='mso-spacerun:yes'>    </span>) Taipa<span style='mso-spacerun:yes'>  
                  </span>Outros: (<span style='mso-spacerun:yes'>    </span>) Qual? 
                  ";
                  }elseif ($tipo_moradia == 'TAIPA') {
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>  </span>) Alvenaria<span
                  style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                  </span>) Madeira<span style='mso-spacerun:yes'>   </span>(<span
                  style='mso-spacerun:yes'> X  </span>) Taipa<span style='mso-spacerun:yes'>  
                  </span>Outros: (<span style='mso-spacerun:yes'>    </span>) Qual? 
                  ";
                  }elseif ($tipo_moradia == 'OUTROS') {
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>  </span>) Alvenaria<span
                  style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
                  </span>) Madeira<span style='mso-spacerun:yes'>   </span>(<span
                  style='mso-spacerun:yes'>    </span>) Taipa<span style='mso-spacerun:yes'>  
                  </span>Outros: (<span style='mso-spacerun:yes'> X  </span>) Qual? 
                  ";
                  }
                  $result.="
                  N º Cômodos:$numero_comodos</span></p>
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Há presença de idosos?
                  ";
                  if($presenca_idoso == 'SIM'){
                  	$result.=" <span class=GramE>(<span
                  style='mso-spacerun:yes'></span></span><span
                  style='mso-spacerun:yes'> X </span>)Sim<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'>     </span>)Não
                  ";
                  }elseif ($presenca_idoso == 'NÃO') {
                  	$result.=" <span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>   </span>)Sim<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'> X  </span>)Não
                  ";
                  }
                  $result.="</p>
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Há presença de Gestante?
                  "; 
                  if($presenca_gestante == 'SIM'){
                  	 $result.="<span style='mso-spacerun:yes'>  
                  </span><span class=GramE>(<span style='mso-spacerun:yes'></span></span><span
                  style='mso-spacerun:yes'> X </span>)Sim. Quantos <span class=GramE>meses?(</span><span
                  style='mso-spacerun:yes'>     </span>)<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'>     </span>)Não<span
                  style='mso-spacerun:yes'>  </span>
                  ";
                  }elseif ($presenca_gestante == 'NÃO') {
                  	 $result.="<span style='mso-spacerun:yes'>  
                  </span><span class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>   </span>)Sim. Quantos <span class=GramE>meses?(</span><span
                  style='mso-spacerun:yes'>     </span>)<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'> X  </span>)Não<span
                  style='mso-spacerun:yes'>  </span>
                  ";
                  }
                  $result.="</p>
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Há presença de deficientes?
                  ";
                  if($presenca_deficiente == 'SIM') {
                   	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'></span></span><span
                  style='mso-spacerun:yes'> X </span>)Sim<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'>     </span>)Não.
                  "; 
                   }elseif ($presenca_deficiente == 'NÃO') {
                   	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>   </span>)Sim<span style='mso-spacerun:yes'>    
                  </span>(<span style='mso-spacerun:yes'> X  </span>)Não.
                  "; 
                   } 
                  $result.="<span
                  style='mso-spacerun:yes'>    </span>Qual? $qual_deficiencia</p>
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
                  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
                  mso-bidi-theme-font:minor-bidi'>Há água filtrada em casa? 
                  "; 
                  if ($agua_filtrada == 'SIM') {
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'></span></span><span
                  style='mso-spacerun:yes'> X </span>) Sim<span style='mso-spacerun:yes'>  
                  </span>(<span style='mso-spacerun:yes'>     </span>) Não.
                  "; 
                  }elseif ($agua_filtrada == 'NÃO') {
                  	$result.="<span class=GramE>(<span
                  style='mso-spacerun:yes'>  </span></span><span
                  style='mso-spacerun:yes'>   </span>) Sim<span style='mso-spacerun:yes'>  
                  </span>(<span style='mso-spacerun:yes'> X  </span>) Não.
                  "; 
                  }
                  $result.="<span
                  style='mso-spacerun:yes'>  </span>Qual? $qual_agua_filtrada</p>
                  </td>
                  <td width=11 valign=top style='width:8.0pt;border:none;mso-border-left-alt:
                  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:44.95pt'>
                  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
                  style='mso-bidi-font-size:10.0pt;line-height:150%;font-family:'Arial',sans-serif;
                  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
                  </td>
             </tr>
                 <![if !supportMisalignedColumns]>
                 <tr height=0>
                  <td width=6 style='border:none'></td>
                  <td width=187 style='border:none'></td>
                  <td width=302 style='border:none'></td>
                  <td width=5 style='border:none'></td>
                  <td width=11 style='border:none'></td>
                 </tr>
                 <![endif]>
            </table>
            <p class=MsoCaption align=left style='margin-top:100px;margin-left:106.2pt;text-align:left;
            text-indent:35.4pt'><o:p>&nbsp;</o:p></p>

            <p class=MsoCaption align=left style='text-align:left;
            text-indent:35.4pt'>ANEXO II</p>

            <p class=MsoNormal style='margin-left:63.8pt;text-indent:5.0cm;tab-stops:decimal 205.55pt'><b
            style='mso-bidi-font-weight:normal'><span style='font-family:'Arial',sans-serif;
            mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'><span
            style='mso-tab-count:4'></span>CADASTRO
            SÓCIO-ECONÔMICO</span></b><span style='font-size:10.0pt;line-height:115%;
            font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
            mso-bidi-theme-font:minor-bidi'><o:p></o:p></span></p>

            <table class=MsoTableGrid border=0 cellspacing=0 cellpadding=0>
             <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
              <td  colspan=7 valign=top style='border:solid black 1.0pt;
              mso-border-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 1.4pt 0cm 1.4pt'>
              <p class=MsoNormal style='text-align:justify;text-justify:
              inter-ideograph;line-height:15px;'><span
              style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
              mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>4 –
              COMPOSIÇÃO FAMILIAR: Quantos componentes: $contador_membros</span></p>
              </td>
             </tr>
             <tr style='mso-yfti-irow:1'>
              <td  valign=top style='border:solid black 1.0pt;
              mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
              mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 1.4pt 0cm 1.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:10.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
              'Times New Roman';mso-bidi-theme-font:minor-bidi'>Nome</span></b></p>
              </td>
              <td valign=top style='border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:10.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
              'Times New Roman';mso-bidi-theme-font:minor-bidi'>Sexo</span></b></p>
              </td>
              <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:9.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
              'Times New Roman';mso-bidi-theme-font:minor-bidi'>Parentesco</span></b></p>
              </td>
              <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:10.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
              'Times New Roman';mso-bidi-theme-font:minor-bidi'>Idade</span></b></p>
              </td>
              <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
              none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b
              style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;font-family:
              'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:
              minor-bidi'>Escolaridade</span></b></p>
              </td>
               <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
              none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b
              style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;font-family:
              'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:
              minor-bidi'>Profissão</span></b></p>
              </td>
              <td width=76 valign=top style='width:2.0cm;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><b style='mso-bidi-font-weight:normal'><span
              style='font-size:10.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
              'Times New Roman';mso-bidi-theme-font:minor-bidi'>Renda</span></b></p>
              </td>
             </tr>
             "; 
             foreach ($resFamiliar as $key => $value) {
			   	$nome_familiar = $value['nome'];
			      $sexo_familiar = $value['sexo'];
			      $parentesco = $value['parentesco'];
			      $idade_familiar = $value['idade'];
			      $escolaridade = $value['escolaridade'];
			      $renda_familiar = $value['renda'];
			      $profissao_familiar = $value['profissao'];
			      $renda_total += $renda_familiar;
			      $result.="
             <tr style='mso-yfti-irow:2'>
              <td width=70 valign=top style='width:70.95pt;border:solid black 1.0pt;
              mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
              mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'> $nome_familiar</span></p>
              </td>
              <td width=61 valign=top style='width:60.5pt;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>$sexo_familiar</span></p>
              </td>
              <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>$parentesco </span></p>
              </td>
              <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>$idade_familiar</span></p>
              </td>
              <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
              none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>$escolaridade</span></p>
              </td>
              <td width=76 valign=top style='width:2.0cm;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>$profissao_familiar</span></p>
              </td>
              <td width=76 valign=top style='width:2.0cm;border-top:none;border-left:none;
              border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
              border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
              solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
              mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
              text1;padding:0cm 5.4pt 0cm 5.4pt'>
              <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
              line-height:normal'><span
                style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>R$ $renda_familiar </span></p>
              </td>
             </tr>";

			   }
            $result.="
            </table>

            <p class=MsoNormal style='margin-right:416.75pt;tab-stops:decimal 524.5pt'>&nbsp;</p>

            <p class=MsoNormal style='margin-left:365.0pt;text-indent:35.4pt'><span
                style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:'Arial',sans-serif;
                mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Renda Familiar:<u>R$ $renda_total</u> </span></p>

            <p class=MsoNormal style='margin-left:424.8pt'><o:p>&nbsp;</o:p></p>

            <p class=MsoNormal style='text-align:center;text-indent:35.4pt'>_______________________________________________________<o:p></o:p></p>

            <p class=MsoNormal align=center style='text-indent:35.4pt'><b
            style='mso-bidi-font-weight:normal'>Assinatura do requerente<o:p></o:p></b></p>

            <p class=MsoNormal align=center style='margin-left:283.2pt;text-align:center'><b
            style='mso-bidi-font-weight:normal'><o:p>&nbsp;</o:p></b></p>

            <p class=MsoNormal><o:p>&nbsp;</o:p></p>

            <p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:
            normal'><o:p>&nbsp;</o:p></b></p>

            <p class=MsoNormal align=center><b style='mso-bidi-font-weight:
            normal'>PARECER DO TÉCNICO EM SERVIÇO SOCIAL<o:p></o:p></b></p>


            <p class=MsoNormal style='margin-left: 40px;text-align:left;text-justify:
            inter-ideograph'><u>$parecer_tecnico</u><o:p></p>
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
    
} catch (Exception $exc) {
   //echo " VERIFIQUE SUA CONEXÃO COM A INTERNET";
   echo $exc;
}

?>