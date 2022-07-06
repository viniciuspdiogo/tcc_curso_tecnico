<?php
session_start();
include_once("conexao-geral.php");
$apaga=mysqli_query($con,"delete from horarios where idhorario=".$_GET['id']);
if($apaga){
	$_SESSION['msg']="Horário deletado com sucesso";
	header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
}
?>