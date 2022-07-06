<?php
include_once("conexao-geral.php");
	
	$campos_p_apagar=mysqli_query($con,"select * from imagens where bannerimg like'%imagens/banner/%'");
	
	foreach($campos_p_apagar as $apaga){

	
	$zera=mysqli_query($con,"update imagens set imgativo=0 where idimg=".$apaga['idimg']."");
	
	$altera=mysqli_query($con,"update imagens set imgativo=".$_GET['opcao']." where idimg=".$_GET['idimg'].";");
	}
	header("Location:../Barbearia22-adm-logado.php#tabela-titulo");
?>