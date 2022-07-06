<?php

//Determina o tipo da codificação da página
header("content-type: text/html; charset=utf-8"); 
include_once("conexao-geral.php");
	
	if(isset($_POST['data'])){

	if($_POST['data']){
		echo "<table class='data'><tr><th>Agendados no dia ".$_POST['data']." / Fechar hórarios</th></tr></table>";
	
	$horavar=str_replace('/','',$_POST['data']);

	$agendamentos=mysqli_query($con,"select replace(replace(replace(concat(".$horavar.", codhorarios), '-', ''),':', ''), ' ', '') horarios, agendamentos. * from horarios left join agendamentos on replace(replace(replace(concat(".$horavar.", codhorarios), '-', ''),':', ''), ' ', '') = codagd order by 1;");
	
	
	
	
	

	
	while($hora=mysqli_fetch_array($agendamentos)){
		
			echo "<p style='color:red'".$hora['codagd']."</p>";
		/*$horarios=mysqli_query($con,"select * from horarios order by codhorarios");
		$usuario=mysqli_query($con,"select * from usuarios where idusr=".$hora['idusr']."");
			$usuarios=mysql_fetch_assoc($usuario);
			$horario=mysqli_fetch_array($horarios);
		echo $usuarios['nomeusr'];*/
	}
		/*	if($hora['idusr'] && !$hora['idmst']){

			echo 
				"<div id='ocupado'><input class='horario' type='checkbox' name='horario[]' value='".$hora['codagd']."' 
				id='".$horario['codhorarios']."'/><label for='".$horario['codhorarios']."'>".$horario['codhorarios']."</label>
				<div id='detalhe-agendado'>
				<table>
				<tr><th>".$usuarios['nomeusr']."</th></tr>
				<tr><th>".$usuarios['numerousr']."</th></tr>
				</table>
				</div>
				</div>";
				
			}elseif($hora['idmst'] && !$hora['idusr']){
				
				echo "<div id='fechado' ><label title='Fechado pelo Adm'>".$horario['codhorarios']."</label>
				<a id='abrir' title='Deixar Disponível para agendamento' onclick='return abrir()' href='reabrir-horario.php?horario=".$hora['codagd']."'>Abrir</a>
				</div>";
				
			}elseif($hora['idmst']==4 && $hora['idusr']==true){
				
			echo 
				"<div id='remarcado'><input class='horario' type='checkbox' name='horario[]' value='".$hora['codagd']."' 
				id='".$hora['codagd']."'/><label for='".$hora['codagd']."'>".$horario['codhorarios']."</label>
				<div id='detalhe-remarcado'>
				<table>
				<tr><th>".$usuarios['nomeusr']."</th></tr>
				<tr><th>".$usuarios['numerousr']."</th></tr>
				</table>
				</div>
				</div>";
				
			}elseif($hora['idmst']!=4 && $hora['idusr']){
				
				echo "<div id='fechado'><label title='Horário já agendado fechado pelo Adm'>".$horario['codhorarios']."</label>
				<a id='abrir' title='Deixar Disponível para agendamento' onclick='return abrir()' href='reabrir-horario.php?horario=".$hora['codagd']."'>Abrir</a>
				<a id='remarcar' title='Remarcar o agendamento' onclick='return remarcar()' href='remarcar-agendamento.php?horario=".$hora['codagd']."'>Remarcar</a>
				<div id='detalhe-remarcar'>
				<table>
				<tr><th>".$usuarios['nomeusr']."</th></tr>
				<tr><th>".$usuarios['numerousr']."</th></tr>
				</table>
				</div>
				</div>";
			
			}elseif(!$hora['idusr'] && !$hora['idmst']){ 
			

				echo 
				"<div id='livre'>
				<input type='checkbox' class='horario' name='horario[]' value='".$hora['codagd']."'
				id='".$horario['codhorarios']."'/><label for='".$horario['codhorarios']."'>".$horario['codhorarios']."</label>
				</div>";
			}
	}*/
	

	}}  //fecha if verificação data existente	
	if(empty($_POST['data'])){
		echo "<table class='indisponivel'><tr><th>Escolha uma Data</th></tr></table>";
	}
?>
