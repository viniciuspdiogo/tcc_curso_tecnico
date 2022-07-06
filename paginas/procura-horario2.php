<?php

//Determina o tipo da codificação da página
header("content-type: text/html; charset=utf-8"); 
include("conexao-geral.php");
	$horario=mysqli_query($con,"select * from horarios order by codhorarios");
	$nl=mysqli_num_rows($horario);
	if(isset($_POST['data'])){
		if($_POST['data']){
		echo "<table class='data'><tr><th>Agendados no dia ".$_POST['data']." / Fechar hórarios</th></tr></table>";
	$data=str_replace("/","",$_POST['data']);
	$registrados=mysqli_query($con,"select * from agendamentos where codagd like'%".$data."%'");
	$ocupado=mysqli_num_rows($registrados);
	
	while($hora=mysqli_fetch_array($horario)){
			$teste=$data.str_replace(":","",$hora['codhorarios']);
			$registros=mysqli_query($con,"select * from agendamentos where codagd=".$teste." order by codagd");
			$procura=mysqli_num_rows($registros);
			$livre=mysqli_fetch_array($registros);
			$usuario=mysqli_query($con,"select * from usuarios where idusr='".$livre['idusr']."'");
			$campo_user=mysqli_fetch_array($usuario);
			if($procura>0){
			
			if($livre['idusr'] && !$livre['idmst']){
			echo 
				"<div id='ocupado'><input class='horario' type='checkbox' name='horario[]' value='".$teste."' 
				id='".$teste."'/><label for='".$teste."'>".$hora['codhorarios']."</label>
				<div id='detalhe-agendado'>
				<table>
				<tr><th>".$campo_user['nomeusr']."</th></tr>
				<tr><th>".$campo_user['emailusr']."</th></tr>
				<tr><th>".$campo_user['numerousr']."</th></tr>
				</table>
				</div>
				</div>";
			}elseif($livre['idmst'] && !$livre['idusr']){
				echo "<div id='fechado' ><label title='Fechado pelo Adm'>".$hora['codhorarios']."</label>
				<a id='abrir' title='Deixar Disponível para agendamento' onclick='return abrir()' href='reabrir-horario.php?horario=".$teste."'>Abrir</a>
				</div>";
			}elseif($livre['idmst']==4 && $livre['idusr']==true){
			echo 
				"<div id='remarcado'><input class='horario' type='checkbox' name='horario[]' value='".$teste."' 
				id='".$teste."'/><label for='".$teste."'>".$hora['codhorarios']."</label>
				<div id='detalhe-remarcado'>
				<table>
				<tr><th>".$campo_user['nomeusr']."</th></tr>
				<tr><th>".$campo_user['emailusr']."</th></tr>
				<tr><th>".$campo_user['numerousr']."</th></tr>
				</table>
				</div>
				</div>";
			}elseif($livre['idmst']!=4 && $livre['idusr']){
				echo "<div id='fechado'><label title='Horário já agendado fechado pelo Adm'>".$hora['codhorarios']."</label>
				<a id='abrir' title='Deixar Disponível para agendamento' onclick='return abrir()' href='reabrir-horario.php?horario=".$teste."'>Abrir</a>
				<a id='remarcar' title='Remarcar o agendamento' onclick='return remarcar()' href='remarcar-agendamento.php?horario=".$teste."'>Remarcar</a>
				<div id='detalhe-remarcar'>
				<table>
				<tr><th>".$campo_user['nomeusr']."</th></tr>
				<tr><th>".$campo_user['emailusr']."</th></tr>
				<tr><th>".$campo_user['numerousr']."</th></tr>
				</table>
				</div>
				</div>";
			}
			}else{ 
			echo 
				"<div id='livre'>
				<input type='checkbox' class='horario' name='horario[]' value='".$teste."'
				id='".$teste."'/><label for='".$teste."'>".$hora['codhorarios']."</label>
				</div>";}
		}
	}}
	if(empty($_POST['data'])){
		echo "<table class='indisponivel'><tr><th>Escolha uma Data</th></tr></table>";
	}
?>
