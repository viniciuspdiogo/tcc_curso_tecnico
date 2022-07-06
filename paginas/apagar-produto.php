<?php
session_start();
$con=mysqli_connect('localhost','root','','barbearia22') or die("Servidor não encontrado");
	if(isset($_GET['produto'])){
		$verifica=mysqli_query($con,"select * from produtos");
		$conta=mysqli_num_rows($verifica);
		if($conta<2){
			$_SESSION['msg']="Minímo de 1 produto cadastrado!";
			header("Location:../Barbearia22-adm-logado.php#tabela-produtos");
		}else{
		$apaga=mysqli_query($con,"DELETE FROM produtos WHERE idprod='".$_GET['produto']."';");
		if($apaga>0){
			header("Location:../Barbearia22-adm-logado.php#tabela-produtos");
		}else{
			$_SESSION['msg']="Houve um erro para remover o produto!";
			header("Location:../Barbearia22-adm-logado.php#tabela-produtos");}
		}
	}

?>