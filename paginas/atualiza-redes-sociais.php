<?php
session_start();
include_once("conexao-geral.php");

		$face = $_POST['facebook'];
		$insta = $_POST['instagram'];
		
		if(empty($face) || empty ($insta)){
			$_SESSION['msg']='Preencha todos os campos!';
			header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
		}
		else{
			$inserir = mysqli_query($con,"update infogerais set faceinfo='".$face."',instainfo ='".$insta."';");
			if($inserir){
				$_SESSION['msg']='Atualizado com sucesso!';
					header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
			}else{
				$_SESSION['msg']='Erro ao atualizar!';
					header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
				}
			}

?>
