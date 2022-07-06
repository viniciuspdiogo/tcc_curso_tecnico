<?php
include_once("conexao-geral.php");
	if(isset($_POST['horario'])){
		if($_POST['horario']){
			$verifica=mysqli_query($con,"select * from agendamentos where horario='".$_POST['horario']."'");
			$total = mysqli_num_rows($verifica);
		if($total==1){
				echo "Hora Existente";
			}else{ 
			$guarda=mysqli_query($con,"insert into agendamentos(horario) values('".$_POST['horario']."')");
			header('location:teste-calendario.php');
			}
		}
	}
?>