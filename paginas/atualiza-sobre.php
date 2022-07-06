<?php
session_start();
 include_once("conexao-geral.php");

		$titulo = trim($_POST['titulo-sobre']);
		$texto = trim($_POST['conteudo-sobre']);
		
		if(empty($titulo) || empty ($texto)){
			echo "<script>alert('Preencha todos os campos!')</script>";
			header("Location:Barbearia22-adm-logado.php");
		}
		else{
			$inserir = mysqli_query($con,"update sobre set tituloSobre='".$titulo."',textoSobre ='".$texto."' where id='1';");
			if($inserir){
					$_SESSION['msg']="Atualizado com Sucesso!";
					header("Location:../Barbearia22-adm-logado.php#tabela-texto");
			}else{
					$_SESSION['msg']="Erro ao atualizar!! \n Tente novamente";
					header("Location:../Barbearia22-adm-logado.php#tabela-texto");
				}
			}

?>
