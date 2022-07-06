
<?php
include_once("conexao-geral.php");


$direcao="imagens/logotipo/";
$guarda="../imagens/logotipo/";

	//Lista padrôes das imagens escolhidas
		$arquivos_novos =$_FILES['imagem-logo']['name'];
		
		$tamanhoArquivo_novo = $_FILES["imagem-logo"]["size"];
		
		$nomeTemporario_novo = $_FILES["imagem-logo"]["tmp_name"];
		
		$ext=end(explode(".", $arquivos_novos)); // RECUPERA EXTENSÃO
		
		$nome_imagem_novo=md5($arquivos_novos).'.'.$ext; // IMAGEM ESCOLHIDA
		
		
		
		
		$imagem_bd=mysqli_query($con,"select * from imagens where idimg=".$_POST['id-logo'].";");
		
		$imagens_bd=mysqli_fetch_array($imagem_bd);
		

		
		if($_FILES['imagem-logo']['name']){ // SE ARQUIVO NOVO EXISTE
			
			
			if(unlink("../".$imagens_bd['logoimg'])){
					$troca=mysqli_query($con,"update imagens set logoimg='".$direcao.$nome_imagem_novo."' where idimg=".$_POST['id-logo'].";");
					move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);	
			}else{
				move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
			}
		}
			header("Location:../Barbearia22-adm-logado.php#informacoes-gerais");	
?>
