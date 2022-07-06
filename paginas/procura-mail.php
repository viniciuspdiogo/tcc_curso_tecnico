<?php
include_once("conexao-geral.php");

$procura=mysqli_query($con,"select * from usuarios where emailusr='".$_GET['mail']."';");
$contalinha=mysqli_num_rows($procura);

if($contalinha>0){
	echo '<img alt="email indisponivel" style="display:block" src="imagens/aviso.png" class="aviso" id="imgmail"/><div id="dtlmail" class="tipo-erro">Email j? existente</div>';
}else{
	echo '<img alt="email disponivel" style="display:block" src="imagens/ok.png" class="aviso" id="imgmail"/><div id="dtlmail" class="tipo-erro"></div>';
}
?>