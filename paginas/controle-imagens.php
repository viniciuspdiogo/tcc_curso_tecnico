<?php
include_once("conexao-geral.php");
	$altera=mysqli_query($con,"update imagens set imgativo=".$_GET['opcao']." where idimg=".$_GET['idimg'].";");
	echo $_GET['opcao'];
	return;

?>