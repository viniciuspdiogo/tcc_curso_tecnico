<?php
session_start();
include_once("conexao-geral.php");

if($_GET['dia']){
	$dia=str_replace("/","",$_GET['dia']);
	$horario=mysqli_query($con,"select * from horarios order by idhorario");
	
	foreach($horario as $horarios){
		
		$registros=mysqli_query($con,"select * from agendamentos where codagd=".$dia.str_replace(":","",$horarios['codhorarios'])." order by codagd");
		
		$verifica_abre=mysqli_fetch_array($registros);
		
		$procura=mysqli_num_rows($registros);
		
		if(!$verifica_abre['idusr']){
			
		if($procura>0){
			
		$deleta=mysqli_query($con,"DELETE FROM agendamentos WHERE codagd='".$dia.str_replace(":","",$horarios['codhorarios'])."';");
			
				if($deleta){
				
				$_SESSION['msg']="Todos os horários foram abertos com Sucesso!";
				header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
				
				}
			}
		}
	}

}else{
	
	$_SESSION['msg']="Por favor, escolha uma data!";
	header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
	
}
?>
