<?php
$con=mysqli_connect("localhost","root","","db_usuario");
	if(isset($_POST['horario'])){
		if($_POST['horario']){
		$guarda=mysqli_query($con,"insert into agendamentos(horario) values('".$_POST['horario']."')");
			if($guarda>0){
				echo "foi";
			}else{
				echo "erro";
			}
			}
		}
?>