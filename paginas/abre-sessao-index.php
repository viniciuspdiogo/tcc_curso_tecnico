<?php
session_start();
$_SESSION['mensagem']="Bem vindo".$_SESSION['nome'];
header('Location:Index.php');
?>