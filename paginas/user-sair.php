<?php
session_start();
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	unset($_SESSION['email']);
session_destroy();
	header("Location:../Barbearia22.php");
?>