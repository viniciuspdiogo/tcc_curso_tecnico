<?php

//Determina o tipo da codifica��o da p�gina
header("content-type: text/html; charset=iso-8859-1"); 
include_once("conexao-geral.php");
	$horario=mysqli_query($con,"select * from horarios order by codhorarios");
	$nl=mysqli_num_rows($horario);
	$x=1;
	if(isset($_POST['data'])){
		if($_POST['data']){
		echo "<table class='data'><tr><th>Dispon�veis no dia ".$_POST['data']."</th></tr></table>";
	$data=str_replace("/","",$_POST['data']);
	$registrados=mysqli_query($con,"select * from agendamentos where codagd like'%".$data."%'");
	$ocupado=mysqli_num_rows($registrados);
	if($ocupado>=$nl){
		echo "<table class='indisponivel'><tr><th>Hor�rios Indispon�veis</th></tr></table>";
	}else{
	
		while($hora=mysqli_fetch_array($horario)){
			$teste=$data.str_replace(":","",$hora['codhorarios']);
			$registros=mysqli_query($con,"select * from agendamentos where codagd=".$teste." order by codagd");
			$procura=mysqli_num_rows($registros);
			$livre=mysqli_fetch_array($registros);
			if($procura>0){
				echo 
				"<div id='ocupado'><label for='".$teste."'>".$hora['codhorarios']."</label>
				</div>";
			}else{ 
				echo 
				"<div id='livre'>
				<input type='radio' name='horario' value='".$teste."'
				id='".$teste."'/><label onclick='texto(this)' text='".$hora['codhorarios']."' for='".$teste."'>".$hora['codhorarios']."</label>
				</div>";}
		}
	}}}
	if(empty($_POST['data'])){
		echo "<table class='indisponivel'><tr><th>Escolha uma Data</th></tr></table>";
	}
?>
