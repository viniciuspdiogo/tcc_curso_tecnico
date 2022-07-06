<?php
session_start();
include_once("conexao-geral.php");
$id=$_POST['id-produto'];
$produto=$_POST['produto'];
$valor=$_POST['preco'];
$x=count($_POST['id-produto']);
/*echo $x."<br>";
while($x>=1){
	$x--;
echo $x;	
}*/
	while($x>0){
		$x--;
		$busca_produto=mysqli_query($con,"select * from produtos where idprod='".$id[$x]."';");
		$posicao=mysqli_num_rows($busca_produto);
		
		if($posicao){
			
			$atualiza=mysqli_query($con,"UPDATE produtos SET descprod='".trim($produto[$x])."',valorprod='".trim($valor[$x])."' where idprod=".trim($id[$x])."");
			
		}else{
		
			$insere=mysqli_query($con,"insert into produtos(descprod,valorprod) values('".trim($produto[$x])."','".trim($valor[$x])."');");
			
		}
		
		if($atualiza || $insere){
			
			$_SESSION['msg']="Produtos Atualizados/Inseridos com Sucesso!";
			header("Location:../Barbearia22-adm-logado.php#tabela-produtos");
			
		}else{
			
			$_SESSION['msg']="Houve algum erro, tente novamente!\n Se persistirem, avise os desenvolvedores";
			header("Location:../Barbearia22-adm-logado.php#tabela-produtos");
			
		}
	}
	
?>