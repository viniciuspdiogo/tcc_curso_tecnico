<?php
include_once("conexao-geral.php");
$direcao="imagens/slide/";
$guarda="../imagens/slide/";

for($i=0; $i <count($_POST['id-img']); $i++) {
			
	//Lista padrôes das imagens escolhidas
		
		$nomes_arquivos_bd=$_POST['nome-img'][$i]; // nome da imagem que vem do banco e não foi trocada
		
		$arquivos_novos =$_FILES['img-slide']['name'][$i];
		
		$tamanhoArquivo_novo = $_FILES["img-slide"]["size"][$i];
		
		$nomeTemporario_novo = $_FILES["img-slide"]["tmp_name"][$i];
		
		$ext=end(explode(".", $arquivos_novos)); // RECUPERA EXTENSÃO
		
		$nome_imagem_novo=md5($arquivos_novos).'.'.$ext; // IMAGEM ESCOLHIDA
		
		
		// PESQUISA SE O ID EXISTE
		
		$imagem_bd=mysqli_query($con,"select * from imagens where idimg=".$_POST['id-img'][$i].";");
		
		$imagens_bd=mysqli_fetch_array($imagem_bd);
		
		//echo $arquivos_novos." Imagem<br>";

		// SEÇÃO ARQUIVOS JÁ EXISTENTES NO BANCO
			
		// SEÇÃO ARQUIVOS NOVOS
		
		if($_FILES['img-slide']['name'][$i]){ // SE ARQUIVO NOVO EXISTE
			
			
			if(($nome_imagem_novo!=$imagens_bd['slideimg']) && ($imagens_bd['idimg']==$_POST['id-img'][$i])){ // ALTERA IMAGEM SE EXISTIR O ID NO BD E O NOME FOR DIFERENTE
			 
				//echo "Altera Imagem do banco e apaga do diretorio e manda valor da posicao<br>";
				
				$troca=mysqli_query($con,"update imagens set slideimg='".$direcao.$nome_imagem_novo."' where idimg=".$_POST['id-img'][$i].";");
				
				if(unlink("../".$imagens_bd['slideimg'])){
					move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
					
				}
			}
		
		
		
		if(($nome_imagem_novo!=$imagens_bd['slideimg']) && ($_POST['id-img'][$i]!=$imagens_bd['idimg'])){ // SE O NOME NÃO EXISTIR E O ID TAMBÉM, SALVAR UMA NOVA IMAGEM e enviar posição do ativo
			
			$guarda_img=mysqli_query($con,"insert into imagens (slideimg,imgativo) values('".$direcao.$nome_imagem_novo."',1);");
			move_uploaded_file($nomeTemporario_novo,$guarda.$nome_imagem_novo);
		}
		}
			header("Location:../Barbearia22-adm-logado.php#tabela-principal");
}	
?>