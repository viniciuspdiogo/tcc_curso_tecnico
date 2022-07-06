<?php
// FECHAR HORÁRIOS
session_start();
include_once("conexao-geral.php");
echo "abriu";
if($_GET['dia']){
	
	$dia=str_replace("/","",$_GET['dia']);
	$horario=mysqli_query($con,"select * from horarios order by idhorario");
	if ($horario){
		echo "<br>buscou";
	}
	foreach($horario as $horarios){
		
		$registros=mysqli_query($con,"select * from agendamentos where codagd=".$dia.str_replace(":","",$horarios['codhorarios'])." order by codagd");
		$procura=mysqli_num_rows($registros);
		if($procura<1){
			$fecha=mysqli_query($con,"insert into agendamentos (codagd,idmst) values('".$dia.str_replace(":","",$horarios['codhorarios'])."','".$_SESSION['idmaster']."');");
		if($fecha){
			echo "ok";
			$_SESSION['msg']="Todos os horários foram fechado com Sucesso!";
			header("Location:localhost:8001/Barbearia22-adm-logado.php#tabela-agendamento");
		}
		}elseif($procura==count($horarios['idhorario'])){
			$_SESSION['msg']="Os horários já foram fechados!";
			header("Location:localhost:8001/Barbearia22-adm-logado.php#tabela-agendamento");
		}		
	}
	
	
}else{
	
	$_SESSION['msg']="Por favor, escolha uma data!";
	header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
	
}


?>