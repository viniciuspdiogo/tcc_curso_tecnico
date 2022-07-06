<?php
session_start();
include("conexao-geral.php");
	if(isset($_GET['horario'])){
		$busca=mysqli_query($con,"select idagd from agendamentos where codagd='".$_GET['horario']."'");
		$mostra=mysqli_fetch_array($busca);
		$apaga=mysqli_query($con,"DELETE FROM agendamentos WHERE idagd='".$mostra['idagd']."';");
		if($apaga>0){
			header("Location:../Barbearia22-adm-logado.php#tabela-agendamentos");
		}else{
			$_SESSION['msg']="Houve um erro para reabrir o horário!";
			header("Location:../Barbearia22-adm-logado.php#tabela-agendamentos");}
		
	}

?>
