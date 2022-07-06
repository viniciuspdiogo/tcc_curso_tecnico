<?php
session_start();
include_once('conexao-geral.php');

$login=$_POST['usuario'];
$senha=$_POST['senha'];

	if(empty($login) || empty($senha)){
		session_start();
		$_SESSION['erro']='Login/E-Mail ou senha Vazios.';
		header("Location:../Barbearia22-adm.php");
	}if(preg_match_all("/[^a-zA-Z0-9]+/i", $login)){
		
		$_SESSION['erro']='Login com carcteres Incorretos.';
		header("Location:../Barbearia22-adm.php");
	
	}elseif(preg_match("/[^a-zA-Z0-9]+/i",$senha) ) {
		$_SESSION['erro']='Senha com carcteres Incorretos.';
		header("Location:../Barbearia22-adm.php");
	
	}else{


	
	$sql=mysqli_query($con,"SELECT idmst, nomemst from masters where loginmst='$login' and senhamst='$senha'");
			$num=mysqli_num_rows($sql);		
	if($num>0){
			$rst=mysqli_fetch_array($sql,$num);
				$id		=$rst['idmst'];
				$nome	=$rst['nomemst'];

			$_SESSION['idmaster']		=$id;
			$_SESSION['loginmaster']	=$login;
			$_SESSION['nomemaster']	=$nome;
			
			mysqli_close($con);
			header('Location:../Barbearia22-adm-logado.php');
	}
	if($num<1 && $num2<1){
		$_SESSION['erro']='Login/E-Mail ou senha Incorretos.';
		header("Location:../Barbearia22-adm.php");
	}
	}
?>
