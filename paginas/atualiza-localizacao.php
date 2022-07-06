<?php
session_start();
include_once("conexao-geral.php");
		$endereço = $_POST['endereço'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$cep = $_POST['cep'];
		$google = $_POST['google'];
		
		if(empty($endereço) || empty ($bairro) || empty ($cidade) || empty ($cep) || empty($google)){
			$_SESSION['msg']='Preencha todos os campos!';
			header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
		}
		else{
			$inserir = mysqli_query($con,"update infogerais set endinfo='".$endereço."',bairroinfo ='".$bairro."' ,cidadeinfo ='".$cidade."' ,cepinfo ='".$cep."' , googleinfo ='".$google."'");
			if($inserir){
					$_SESSION['msg']='Atualizado com sucesso!';
					header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
			}else{
					$_SESSION['msg']='Erro ao atualizar!';
					header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");
				}
			}

?>

