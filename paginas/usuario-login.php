<?php
include_once("conexao-geral.php");
$usu=trim($_POST['userlogin']);
$snh=trim($_POST['keylogin']);

if(isset($usu) && isset($snh)){
	$busca_user=mysqli_query($con,"select * from usuarios where loginusr='$usu' and senhausr='$snh';");
	$contalinha=mysqli_num_rows($busca_user);
	if($contalinha==1){
		$mostra=mysqli_fetch_array($busca_user);
		echo 1;
		if(!isset($_SESSION)) 	
		session_start();		
		$_SESSION['id']=$mostra['idusr']; 		
		$_SESSION['nome']=$mostra['nomeusr'];
		$_SESSION['email']=$mostra['emailusr'];
		exit;	
	}else{
		echo 0;
		
	}
	
}

?>