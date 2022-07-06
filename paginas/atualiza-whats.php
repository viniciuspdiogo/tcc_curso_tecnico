<?php
session_start();
include_once("conexao-geral.php");

		$whats = $_POST['whats'];
		
		if(empty($whats)){
			$_SESSION['msg']='Coloque um número de contato!';
			header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
		}
		else{
			$inserir = mysqli_query($con,"update infogerais set whatsinfo='".$whats."'");
			if($inserir){
					$_SESSION['msg']='Atualizado com sucesso!';
					header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
			}else{
					$_SESSION['msg']='Erro ao atualizar!';
					header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
				}
			}

?>
