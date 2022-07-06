<?php
include_once("conexao-geral.php");

$procura=mysqli_query($con,"select * from usuarios where numerousr='".$_GET['num']."';");
$contalinha=mysqli_num_rows($procura);

if($contalinha>0){
	echo '<img alt="número indisponível" style="display:block" src="imagens/aviso.png" class="aviso" id="imgnum"/><div id="dtlLog" class="tipo-erro">Número já existente</div>';
}else{
	echo '<img alt="número disponível" style="display:block" src="imagens/ok.png" class="aviso" id="imgnum"/><div id="dtlLog" class="tipo-erro"></div><script>celular=true;</script>';
}
?>