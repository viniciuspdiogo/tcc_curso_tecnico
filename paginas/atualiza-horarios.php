<?php
session_start();
include_once("conexao-geral.php");

for($p=0;$p<count($_POST['id-horario']);$p++){
	
	$horarios=mysqli_query($con,"select * from horarios where idhorario=".$_POST['id-horario'][$p]." order by 1");
	
	$verifica=mysqli_num_rows($horarios);
	
	Echo count($verifica);
	
	/*$conta_horarios=mysqli_fetch_array($horarios);
	
	if($conta_horarios['idhorario']==$_POST['id-horario'][$p]){
		
	$atualiza=mysqli_query($con,"update horarios set codhorarios='".$_POST['horarios-manipula'][$p]."' where idhorario=".$_POST['id-horario'][$p].";");
	
	}elseif($_POST['id-horario'][$p]!=$conta_horarios['idhorario']){
		
			$insere=mysqli_query($con,"insert into horarios(codhorarios) values('".$_POST['horarios-manipula'][$p]."');");
			
	}*/
}	
	
	//$_SESSION['msg']="Horários atualizados com sucesso!";
	//header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
?>