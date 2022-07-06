<?php
include_once("conexao-geral.php");

$direcao="imagens/banner/";
$guarda="../imagens/banner/";

for($i=0; $i <count($_POST['id-img']); $i++) {
			
	//Lista padrôes das imagens escolhidas
		
		$nomes_arquivos_bd=$_POST['nome-img'][$i]; // nome da imagem que vem do banco e não foi trocada
		
		$arquivos_novos =$_FILES['imagem-banner']['name'][$i];
		
		$tamanhoArquivo_novo = $_FILES["imagem-banner"]["size"][$i];
		
		$nomeTemporario_novo = $_FILES["imagem-banner"]["tmp_name"][$i];
		
		$ext=end(explode(".", $arquivos_novos)); // RECUPERA EXTENSÃO
		
		$nome_imagem_novo=md5($arquivos_novos).'.'.$ext; // IMAGEM ESCOLHIDA
		
		
		// PESQUISA SE O ID EXISTE
		
		$imagem_bd=mysqli_query($con,"select * from imagens where idimg=".$_POST['id-img'][$i].";");
		
		$imagens_bd=mysqli_fetch_array($imagem_bd);
		

		// SEÇÃO ARQUIVOS JÁ EXISTENTES NO BANCO
		// SEÇÃO ARQUIVOS NOVOS
		
		if($_FILES['imagem-banner']['name'][$i]){ // SE ARQUIVO NOVO EXISTE
			
			
			if(($nome_imagem_novo!=$imagens_bd['bannerimg']) && ($imagens_bd['idimg']==$_POST['id-img'][$i])){ // ALTERA IMAGEM SE EXISTIR O ID NO BD E O NOME FOR DIFERENTE
			 
				//"Altera Imagem do banco e apaga do diretorio e manda valor da posicao<br>";
				
				$troca=mysqli_query($con,"update imagens set bannerimg='".$direcao.$nome_imagem_novo."' where idimg=".$_POST['id-img'][$i].";");
				move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
				if(unlink("../".$imagens_bd['bannerimg'])){
					
				}else{ // Se não existir, troca mesmo assim
					move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
				}
				var_dump(unlink($imagens_bd['bannerimg']));
			}
		
		
		
		if(($nome_imagem_novo!=$imagens_bd['bannerimg']) && ($_POST['id-img'][$i]!=$imagens_bd['idimg'])){ // SE O NOME NÃO EXISTIR E O ID TAMBÉM, SALVAR UMA NOVA IMAGEM E ENVIAR A POSIÇÃO DO ATIVO
			
			$guarda_img=mysqli_query($con,"insert into imagens (bannerimg,imgativo) values('".$direcao.$nome_imagem_novo."',0);");
			move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
		}
		}
			//header("Location:../Barbearia22-adm-logado.php#tabela-titulo");
}
?>
