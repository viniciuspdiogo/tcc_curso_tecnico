<?php
include_once("conexao-geral.php");

$procura=mysqli_query($con,"select * from usuarios where loginusr='".$_GET['nome']."';");
$contalinha=mysqli_num_rows($procura);


if($contalinha>0){
	echo '<img alt="usuário indisponível" style="display:block" src="imagens/aviso.png" class="aviso" id="imglog"/><div id="dtlLog" class="tipo-erro">Usuário já existe</div>';
}else{
	echo '<img alt="usuário disponível" style="display:block" src="imagens/ok.png" class="aviso" id="imglog"/><div id="dtlLog" class="tipo-erro"></div>';
}
?>
