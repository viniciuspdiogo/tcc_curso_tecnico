<?php
	session_start();
	if(empty($_SESSION['idmaster']) || empty($_SESSION['nomemaster']) || empty($_SESSION['loginmaster'])){
		
		header('Location:barbearia22-adm.php');
	}
	$usuarioativo=$_SESSION['nomemaster'];

?>