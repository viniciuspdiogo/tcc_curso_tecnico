<?php
header("content-type: text/html; charset=iso-8859-1"); 

$usuario=$_POST['userlogin'];
$senha=$_POST['keylogin'];

echo $usuario."<br>".$senha;
session_start();
$_SESSION['foi']="<script>alert('entrou');</script>";
header("location:../Barbearia22.php");
?>