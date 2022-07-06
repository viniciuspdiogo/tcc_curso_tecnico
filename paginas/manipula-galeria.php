<?php
include_once("conexao-geral.php");
$direcao="imagens/galeria/";
$guarda="../imagens/galeria/";

for($i=0; $i <count($_POST['id-img']); $i++) {
			
	//Lista padrôes das imagens escolhidas
		
		$nomes_arquivos_bd=$_POST['nome-img'][$i]; // nome da imagem que vem do banco e não foi trocada
		
		$arquivos_novos =$_FILES['img-galeria']['name'][$i];
		
		$tamanhoArquivo_novo = $_FILES["img-galeria"]["size"][$i];
		
		$nomeTemporario_novo = $_FILES["img-galeria"]["tmp_name"][$i];
		
		$ext=end(explode(".", $arquivos_novos)); // RECUPERA EXTENSÃO
		
		$nome_imagem_novo=md5($arquivos_novos).'.'.$ext; // IMAGEM ESCOLHIDA
		
		
		// PESQUISA SE O ID EXISTE
		
		$imagem_bd=mysqli_query($con,"select * from imagens where idimg=".$_POST['id-img'][$i].";");
		
		$imagens_bd=mysqli_fetch_array($imagem_bd);
		
		

		// SEÇÃO ARQUIVOS JÁ EXISTENTES NO BANCO
			
		// SEÇÃO ARQUIVOS NOVOS
		
		if($_FILES['img-galeria']['name'][$i]){ // SE ARQUIVO NOVO EXISTE
			
			
			if(($nome_imagem_novo!=$imagens_bd['glrimg']) && ($imagens_bd['idimg']==$_POST['id-img'][$i])){ // ALTERA IMAGEM SE EXISTIR O ID NO BD E O NOME FOR DIFERENTE
			 
				//echo "Altera Imagem do banco e apaga do diretorio e manda valor da posicao<br>";
				$update = "update imagens set glrimg='$direcao$nome_imagem_novo' where idimg='".$_POST['id-img'][$i]."'";
				$troca=mysqli_query($con,$update);
				
				if(unlink("../".$imagens_bd['glrimg'])){
					move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
				}else{
					move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
				}
			}
		
		
		
			if(($nome_imagem_novo!=$imagens_bd['glrimg']) && ($_POST['id-img'][$i]!=$imagens_bd['idimg'])){ // SE O NOME NÃO EXISTIR E O ID TAMBÉM, SALVAR UMA NOVA IMAGEM e enviar posição do ativo
				
				$sql = "INSERT INTO imagens(glrimg,imgativo) values ('$direcao$nome_imagem_novo',1)";
				if(mysqli_query($con,$sql)){
					move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
				}
				
			}
		}
			
}	
	

?>

