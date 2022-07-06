<?php
session_start();
include_once("conexao-geral.php");

if($_GET['id-imagem'] && $_GET['diretorio-img']){
	
	$apaga_imagem=mysqli_query($con,"DELETE FROM imagens WHERE idimg=".$_GET['id-imagem'].";");
		if(unlink("../".$_GET['diretorio-img'])){
			$_SESSION['msg']="Imagem Apagada com Sucesso!";
			header("Location:../Barbearia22-adm-logado.php".$_GET['lugar']);
		}else{
			$_SESSION['msg']="Imagem Já Apagada!";
			header("Location:../Barbearia22-adm-logado.php".$_GET['lugar']);
		}
	
}
?>