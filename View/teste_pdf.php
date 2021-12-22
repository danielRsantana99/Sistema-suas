<?php 
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

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
  </span>DATA____/___/______<o:p></o:p></span></b></p>
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
    do Beneficiário:</span></p>
    </td>
   </tr>
   <tr style='mso-yfti-irow:1'>
    <td width=172 valign=top style='width:129.0pt;border:solid black 1.0pt;
    mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
    mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
    text1;padding:0cm 5.4pt 0cm 5.4pt'>
    <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><span
    style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
    mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Sexo:
    <span class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
    style='mso-spacerun:yes'>  </span>) M<span style='mso-spacerun:yes'>    
    </span>(<span style='mso-spacerun:yes'>   </span>) F</span></p>
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
    de Nascimento: ______/______/______</span></p>
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
    <span class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
    style='mso-spacerun:yes'>      </span>) anos</span></p>
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
    'Times New Roman';mso-bidi-theme-font:minor-bidi'>Estado Civil: <span
    class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
    style='mso-spacerun:yes'>  </span>) Solteiro<span
    style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
    </span>) Casado<span style='mso-spacerun:yes'>   </span>(<span
    style='mso-spacerun:yes'>    </span>) Viúvo<span
    style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
    </span>) Divorciado / Separado<span style='mso-spacerun:yes'>  
    </span>(<span style='mso-spacerun:yes'>    </span>) União Estável</span></p>
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
    <span class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
    style='mso-spacerun:yes'> </span>) Não alfabetizado<span
    style='mso-spacerun:yes'>               </span>ou (<span
    style='mso-spacerun:yes'>   </span>) Alfabetizado<span
    style='mso-spacerun:yes'>   </span></span></p>
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
    <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;line-height:normal'><b
    style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
    'Times New Roman';mso-bidi-theme-font:minor-bidi'>Endereço:
    _________________________________________________________________________________</span></b></p>
 
    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><b
    style='mso-bidi-font-weight:normal'><span style='font-size:10.0pt;
    mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;mso-bidi-font-family:
    'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></b></p>
    <p class=MsoNormal style='margin-bottom:0cm;line-height:normal'><span
    style='font-size:10.0pt;mso-bidi-font-size:11.0pt;font-family:'Arial',sans-serif;
    mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>Ponto
    de Referência:<span
    style='mso-spacerun:yes'>                                                                                                   
    </span><span class=SpellE>Tel</span></span></p>
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

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
   style='border-collapse:collapse;border:none;mso-border-alt:solid black .5pt;
   mso-border-themecolor:text1;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
  <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:0.75pt;mso-row-margin-left:
  4.25pt;mso-row-margin-right:11.55pt'>
  <td style='mso-cell-special:placeholder;border:none;padding:0cm 0cm 0cm 0cm'
  width=6><p class='MsoNormal'>&nbsp;</td>
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
	  mso-bidi-theme-font:minor-bidi'>RG:_______________________________</span></p>
	  <p class=MsoNormal style='margin-bottom:0cm;text-align:justify;text-justify:
	  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
	  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>CPF:_______________________________</span></p>
	  </td>
	  <td width=406 colspan=2 valign=top style='width:304.7pt;border-top:none;
	  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  mso-border-top-alt:solid windowtext .75pt;mso-border-left-alt:solid windowtext .5pt;
	  mso-border-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .75pt;
	  padding:0cm 3.5pt 0cm 3.5pt'>
	  <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;text-align:justify;text-justify:
	  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
	  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>TITULO ELEITORAL:________________ZONA_____SEÇÃO___</span></p>
	  <p class=MsoNormal style='margin-top: 7px;margin-bottom:7px;text-align:justify;text-justify:
	  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;line-height:
	  150%;font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>NIS:_________________________________________________</span></p>
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
	  'Times New Roman';mso-bidi-theme-font:minor-bidi'>Empregado:( <span
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
	  style='mso-spacerun:yes'>  </span>BPC/LOAS(<span style='mso-spacerun:yes'>   
	  </span>)</span></p>
	  <p class=MsoNormal style='margin-top: 10px;margin-bottom:7px;text-align:justify;text-justify:
	  inter-ideograph;line-height:150%'><span style='font-size:10.0pt;mso-bidi-font-size:
	  11.0pt;line-height:150%;font-family:'Arial',sans-serif;mso-bidi-font-family:
	  'Times New Roman';mso-bidi-theme-font:minor-bidi'>
	  Renda própria: R$
	  </span><span style='font-size:10.0pt;line-height:150%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'> Bolsa Família:<span class=GramE>(<span
	  style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'> </span>)Sim<span style='mso-spacerun:yes'>    
	  </span>(<span style='mso-spacerun:yes'>  </span><span
	  style='mso-spacerun:yes'> </span>)Não . Quanto?_____________</span></p>

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
	  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
	  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:115%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>Própria: <span class=GramE>(<span
	  style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'>  </span>)<span style='mso-spacerun:yes'>  </span>De
	  favor: (<span style='mso-spacerun:yes'>    </span>)<span
	  style='mso-spacerun:yes'>   </span>Alugada(<span style='mso-spacerun:yes'>   
	  </span>) </span><span style='font-size:10.0pt;line-height:150%;font-family:
	  'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:
	  minor-bidi'>Se paga aluguel: Quanto? R$</span></p>
	  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
	  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>Tipo: <span class=GramE>(<span
	  style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'>  </span>) Alvenaria<span
	  style='mso-spacerun:yes'>   </span>(<span style='mso-spacerun:yes'>   
	  </span>) Madeira<span style='mso-spacerun:yes'>   </span>(<span
	  style='mso-spacerun:yes'>    </span>) Taipa<span style='mso-spacerun:yes'>  
	  </span>Outros: (<span style='mso-spacerun:yes'>    </span>) Qual? 
	  N º Cômodos:</span></p>
	  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
	  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>Há presença de idosos? <span class=GramE>(<span
	  style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'>   </span>)Sim<span style='mso-spacerun:yes'>    
	  </span>(<span style='mso-spacerun:yes'>     </span>)Não</p>
	  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
	  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>Há presença de Gestante?<span style='mso-spacerun:yes'>  
	  </span><span class=GramE>(<span style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'>   </span>)Sim. Quantos <span class=GramE>meses?(</span><span
	  style='mso-spacerun:yes'>     </span>)<span style='mso-spacerun:yes'>    
	  </span>(<span style='mso-spacerun:yes'>     </span>)Não<span
	  style='mso-spacerun:yes'>  </span></p>
	  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
	  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>Há presença de deficientes?<span class=GramE>(<span
	  style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'>   </span>)Sim<span style='mso-spacerun:yes'>    
	  </span>(<span style='mso-spacerun:yes'>     </span>)Não.<span
	  style='mso-spacerun:yes'>    </span>Qual? </p>
	  <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'><span
	  style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;
	  font-family:'Arial',sans-serif;mso-bidi-font-family:'Times New Roman';
	  mso-bidi-theme-font:minor-bidi'>Há água filtrada em casa? <span class=GramE>(<span
	  style='mso-spacerun:yes'>  </span></span><span
	  style='mso-spacerun:yes'>   </span>) Sim<span style='mso-spacerun:yes'>  
	  </span>(<span style='mso-spacerun:yes'>     </span>) Não.<span
	  style='mso-spacerun:yes'>  </span>Qual? </p>
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
<p class=MsoCaption align=left style='margin-left:106.2pt;text-align:left;
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
  COMPOSIÇÃO FAMILIAR: Quantos componentes:______________</span></p>
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
 <tr style='mso-yfti-irow:2'>
  <td width=66 valign=top style='width:66.95pt;border:solid black 1.0pt;
  mso-border-themecolor:text1;border-top:none;mso-border-top-alt:solid black .5pt;
  mso-border-top-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
  <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
  <td width=76 valign=top style='width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
  <td width=76 valign=top style='width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;mso-border-bottom-themecolor:text1;
  border-right:solid black 1.0pt;mso-border-right-themecolor:text1;mso-border-top-alt:
  solid black .5pt;mso-border-top-themecolor:text1;mso-border-left-alt:solid black .5pt;
  mso-border-left-themecolor:text1;mso-border-alt:solid black .5pt;mso-border-themecolor:
  text1;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;text-align:center;
  line-height:normal'><span style='font-size:26.0pt;font-family:'Arial',sans-serif;
  mso-bidi-font-family:'Times New Roman';mso-bidi-theme-font:minor-bidi'>&nbsp;</span></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='margin-right:416.75pt;tab-stops:decimal 524.5pt'>&nbsp;</p>

<p class=MsoNormal style='margin-left:365.0pt;text-indent:35.4pt'>Renda Familiar:________</p>

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

<p class=MsoNormal style='text-align:center;text-justify:
inter-ideograph'>________________________________________________________________________<o:p></o:p></p>

<p class=MsoNormal style='text-align:center;text-justify:
inter-ideograph'>________________________________________________________________________<o:p></o:p></p>

<p class=MsoNormal style='text-align:center;text-justify:
inter-ideograph'>________________________________________________________________________<o:p></o:p></p>

<p class=MsoNormal style='text-align:center;text-justify:
inter-ideograph'>________________________________________________________________________<o:p></o:p></p>

<p class=MsoNormal style='text-align:center;text-justify:
inter-ideograph'>________________________________________________________________________</p>

<p class=MsoNormal style='text-align:center;text-justify:
inter-ideograph'>________________________________________________________________________<o:p></o:p></p>

</div>

</body>

</html>
";

$dompdf->loadHtml($result);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();


// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);

?>