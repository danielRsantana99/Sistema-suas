<?php

// Oculta os erros
ini_set('display_errors', 0 );
error_reporting(0);


require_once 'config.php';
require_once 'classes/profissional.class.php';
require_once 'classes/relatorio.class.php';
require_once 'classes/funcoes.class.php';
require_once 'classes/usuario.class.php';

date_default_timezone_set('America/Sao_Paulo');

$r = new Relatorios();
$funcoes = new Funcoes();
$pr = new Profissional();
$u = new Usuarios();

if($_SESSION['tipo'] == 1 OR $_SESSION['tipo'] == 10 OR $_SESSION['tipo'] == 4){


}else{
  ?>
 	 <!--script type="text/javascript">window.location.href="home.php"</script-->
  <?php
}



if(isset($_GET['id_faa']) && !empty($_GET['id_faa'])){

	$id_faa = addslashes($_GET['id_faa']);
    $recepcao = $r->relFichaAtendimento($id_faa);
    $infoMed = $pr->getProfConsulta($id_faa);
    $usuario = $u->getUsuario($recepcao['id_usuario_cadastro']); 


}


?>

<!-- Botão imprimir -->
<body style="font-family:arial;" >
		<hr width="100%" style="margin-top: -25px;">
		<table style="display: block; margin-top: -5px; margin-bottom: -5px;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
					<tr>
						<td style="table-layout: fixed; width: 50px;">
							<img src="assets/img/logos/logo-prefeitura.png" width="100px">
						</td>
						<td style="font-size:14px; " width="1060">
							<!-- <h2 align="center">PREFEITURA MUN. DE LUIS EDUARDO MAGALHAES</h2> -->
							<b>PREFEITURA MUNICIPAL DE LUÍS EDUARDO MAGALHÃES <br>ESTADO DA BAHIA</b><br>
							<b>CNPJ: 04.214.419/0001-05</b><br>	
						</td>
					</tr>
					
				</tbody>
			</table>
		<hr width="100%">
		<table width="100%">
			<div id="funcoes" align="center" style="display: block; margin-top: -15px;">
				<h3 style="color: #299;">FORMULÁRIO PARA TRIAGEM DE PACIENTE COVID-19 <br>N° <?php echo $recepcao['id_faa'];?></h3>
			</div>
		</table>
		<div  align="center" >
			<table style="border: 1px solid black; margin-top: -15px; border-spacing: 0;" class="bordered striped centered">
				<thead>
					<tr style="border: 1px solid black;">
						<td width="800" colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Identificação do Paciente</strong></td>
					</tr>
					<tr>
						<td   align="center" style="font-size: 17px;"><strong>ID: <?php echo $recepcao['id_paciente'];?> - <?php echo $recepcao['nome_paciente'];?></br></strong>
						</td>
						<td   align="center" style="font-size: 17px;"><strong>SENHA: <?php echo $recepcao['senha_numero'];?></br></strong>
						</td>
						
					</tr>

				</thead>
				<tbody>

					<td style="border-top: 1px solid black; border-bottom:1px solid #999; padding-left:30px; padding:5px;">
						Cartão SUS:<b> <?php echo $recepcao['cartao_sus_paciente'];?></b></br>
						RG:<b> <?php echo $recepcao['rg_paciente'];?></b></br>
						CPF:<b> <?php echo $recepcao['cpf_paciente'];?></b></br>
						Mãe: <b><?php echo $recepcao['mae_paciente'];?></b></br>
						Nascimento: <b><?php echo $data_nascimento = $funcoes->saidaData($recepcao['nascimento_paciente']);?></b>&nbsp;&nbsp;<b>(<?php echo $recepcao['nascimento_paciente'] = $funcoes-> calculaIdade($data_nascimento); ?> anos)</b>

					</td>
					<td colspan="6" style= "border-top: 1px solid black; border-bottom:1px solid #999; padding-left:30px; padding:5px;vertical-align:top;">
						Contato:<b><?php echo $recepcao['contato1'];?></b></br>
						Endereço: <b><?php echo $recepcao['rua_paciente'];?></b></br>
						Bairro: <b><?php echo $recepcao['bairro_paciente'];?></b></br>
						Admissão: <b><?php echo $data_atendimento = $funcoes->saidaData($recepcao['data_atendimento']);?> <?php echo date("H:i")?></b><br>Conduzido por: <b style="font-size: 11px;"><?php echo $usuario['nome'] ?></b></br>
					</td>
				</tbody>
				<thead>
					<?php if($_SESSION['unidade'] == 1):?>
					<tr style="border: 1px solid black;">
						<td colspan="4" align="center" style="background: #D5D8DC; border-top: 1px solid black;"><strong>Atendimento</strong></td>						
					</tr>
					<?php endif; ?>					
					<?php if($_SESSION['unidade'] == 2):?>
					<?php endif; ?>
				</thead>
				<tbody>
				<!-- MODELO ELETRÔNICO ETAPA DA TRIAGEM
				<tr>
					<td style="border: 1px solid black; vertical-align:top;" width="310">PA: <?php echo $recepcao['tri_preart']." mmHG";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Peso: <?php echo $recepcao['tri_peso']." kg";?></td>
					<td style="border: 1px solid black;vertical-align:top;" width="300"> Altura: <?php echo $recepcao['tri_alt'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temperatura: <?php echo $recepcao['tri_temp']." °C";?></td>
					
					<td style="border: 1px solid black;vertical-align:top;" width="50">Gestante:
					<?php  echo ($recepcao['tri_gest'] == 's')?'Sim':'Não'; ?></td>
				</tr>
				
				<tr>
					<td style="border: 1px solid black; vertical-align:top;">FC: <?php echo $recepcao['tri_frecar'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<tag>FR:</tag> <?php echo $recepcao['tri_freres'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SpO²: <?php echo $recepcao['tri_satu2'];?>
					
					</td>
					<td colspan="3" style="border: 1px solid black;vertical-align:top;">Glicemia:<?php  if(!empty($recepcao['tri_glicap'])){echo $recepcao['tri_glicap'];}?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [<?php if($recepcao['tri_mcol'] == 'jej'){echo 'X';}?>___] Jejum &nbsp;&nbsp;&nbsp;&nbsp;   [<?php if($recepcao['tri_mcol'] == 'posp'){echo 'X';}?>___] Pós Prandial</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 1px solid black; max-width: 630px;">Alergias:<?php echo $recepcao['tri_alerg']; ?></td>

					<td colspan="2"  style="border: 1px solid black;">Glasgow: <?php echo $recepcao['tri_glasg']; ?></td>
				</tr>
			</tbody>
			-->
			<thead>
				<tr>
					<td  colspan="6" style="background: #D5D8DC; border: 1px solid black;" align="center"><b>SINAIS E SINTOMAS</b></td>
				</tr>
				<tr>
					<td  colspan="6" align="center" style="border-bottom:1px solid; padding:5px; ">
						Temperatura: _______ &nbsp;&nbsp; Saturação de O2: _______ &nbsp;&nbsp;&nbsp;  BPM: _______ &nbsp;&nbsp;&nbsp;  PA: _______ &nbsp;&nbsp;&nbsp;PESO: _______ &nbsp;&nbsp;
					</td>
				</tr>
			</thead>
			<thead>
				<tr>
					<td  style="border-bottom:1px solid; padding:5px;">
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;FEBRE 
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;DIARRÉIA 
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;DIFICULDADE RESPIRATÓRIA 
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp; TOSSE &nbsp;
						(&nbsp;&nbsp;&nbsp;) SECA &nbsp;
						(&nbsp;&nbsp;&nbsp;) PRODUTIVA &nbsp;
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp; DOR NA GARGANTA 
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;CRISES NA COLUNA 
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;DORES NO CORPO 
						<br>
					</td>
					
					<td  style="border-bottom:1px solid; padding:5px;">
						
						
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;DOR NAS ARTICULAÇÕES
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp;CORIZA OU OBSTRUÇÃO NASAL
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp; CEFALEIA
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp; CANSAÇO (MAL ESTAR)
						<br>
						(&nbsp;&nbsp;&nbsp;) &nbsp;&nbsp;&nbsp; ALERGIA MENDICAMENTOSA ?<br> QUAL:________________________________________
						<br>
					</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				

				<!-- Início do modelo eletrônico -->
				<?php if($_SESSION['unidade'] == 2):?>
				<!--
				<tr>
					<td colspan="3" style="background: #D5D8DC; border: 1px solid black;" align="center"><b>Acolhimento da enfermagem:</b></td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				
				<tr>
					<td colspan="2" style="border-bottom:1px solid;" align="right">Assinatura:</td>
					<td style="border-left:1px solid;">__________________</td>
				</tr>
				-->
				<?php endif; ?>
				<!-- Fim do modelo eletrônico -->
				<!-- Início do modelo eletrônico -->
				<!--
				</tbody>
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Classificação</strong></td>						
					</tr>
				</thead>
				<tr>
					<td colspan="6" align="">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Azul(<?php echo $recepcao['tri_tipo_senha'] == 'nurg' ? "X" : ""; ?>) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Verde(<?php echo $recepcao['tri_tipo_senha'] == 'purg' ? "X" : ""; ?>) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Amarelo(<?php echo $recepcao['tri_tipo_senha'] == 'urge' ? "X" : ""; ?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laranja (<?php echo $recepcao['tri_tipo_senha'] == 'murg' ? "X" : ""; ?>)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vermelho (<?php echo $recepcao['tri_tipo_senha'] == 'emer' ? "X" : ""; ?>)
					</td>
				</tr>
				<!-- Fim do modelo eletrônico-->
				<!-- Início do modelo manual -->
				<!-- 
				</tbody>
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Classificação</strong></td>						
					</tr>
				</thead>
				<tr>
					<td colspan="6" align="">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Azul(__) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Verde(__) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Amarelo(__)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laranja (__)  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Vermelho (__)
					</td>
				</tr>
			-->
				<!-- Fim do modelo manual -->
				<!-- Início do modelo eletrônico-->
				<!-- 
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Avaliação Médica</strong></td>						
					</tr>
				</thead>
			-->
				<!-- 
				<tr>
					<td colspan="3" style="border-bottom:1px solid; padding:5px; text-align: justify;"><p>
						<?php echo $recepcao['conmed_anamnese'];?></p></td>
				</tr>
				-->
				<!--
				<tr>
					<td colspan="3" style="border-bottom:1px solid; padding:5px; text-align: justify;">
						Viajou para algum lugar nos últimos 14 dias ? Sim(__) Não (__). Qual ? _________________________________
					</td>
				</tr>
				-->
				<!-- Fim do modelo eletrônico -->
				<!-- Início do modelo manual-->
				
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Evolução de Enfermagem</strong></td>						
					</tr>
				</thead>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;"><a> Assinatura  e Carimbo Profissional da Triagem<br><br><br></a></td>
				</tr>
				
				<!-- Início do eletrônico-->
				<!-- 
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black; "><strong>Prescrição</strong></td>						
					</tr>
				</thead>
				<tr>
					<td colspan="3" style="border-bottom:1px solid; padding:5px; text-align: justify;">
					<p>
						<?php echo $recepcao['receita'];?>
						
					</p>
					</td>
				</tr>
				-->
				<!-- Fim do eletrônico-->
				<!-- Início do modelo manual-->
				
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black; "><strong>Evolução Médica</strong></td>						
					</tr>
				</thead>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="left" style=" padding-top:30px;">&nbsp;&nbsp;&nbsp;Assinatura e carimbo profissional do médico.</td>
					</tr>
				</thead>

				<!-- Fim do modelo manual-->
				<!-- Início do modelo eletrônico -->
				<!-- 
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Conduta</strong></td>						
					</tr>
				</thead>

				<tbody>
				<tr>
					<td colspan="3" style="border-bottom:1px solid; padding:5px; text-align: justify;">
						
					</td>
				</tr>
				-->
				<!-- Fim do modelo eletrônico -->
				<!-- Ìnício do modelo manual -->
				<!-- 
				<thead>
					<tr style="border: 1px solid black;">
						<td colspan="6" align="center" style="background: #D5D8DC; border: 1px solid black;"><strong>Conduta</strong></td>						
					</tr>
				</thead>

				<tbody>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				<tr>
					<td colspan="3" style="border-bottom:1px solid;">.</td>
				</tr>
				-->
				<!-- Ìnício do modelo manual -->
				</tbody>
			</table>
		</div>

</body>
</html>
		
	
	
</body>
</html>