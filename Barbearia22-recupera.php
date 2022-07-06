<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8"/>
<meta name="theme-color" content="#3d3d3d"/>
<title>Barbearia 22 - Recuperação de senha</title>
<link href="imagens/logo.png" rel="icon"/>
<style>
*{
padding:0px;
margin:0px;
font-family:arial,sans-serif;
font-weight:none;
font-size:13pt;
border:0px;
}
body{
background:url('imagens/fundoportal.jpg')no-repeat;
background-size:100%;
}
#tabela{
position:absolute;
width:45%;
top:10%;
left:0%;
right:0%;
margin:auto;
}
.adm-gestor{
	text-align:left;
	padding-bottom:10%;
	width:40%;
}
#tabela img{
	width:90%;
	margin-bottom:50px;
}
#tabela .txt{
	width:90%;
	height:55px;
	text-indent:10px;
	color:#fff;
	border:0px;
	border-bottom:2px solid #fff;
	background:none;
	font:100 15pt Roboto,arial,sans-serif;
}
::-webkit-input-placeholder {
   color: #fff;
   font:15pt Roboto,arial,sans-serif;
}
::-moz-input-placeholder {
	color: #fff;  
	font:15pt Roboto,arial,sans-serif;
}

:-ms-input-placeholder {  
   color: #fff;  
   font:15pt Roboto,arial,sans-serif;
}
#tabela .button{
	background:none;
	color:#ffffff;
	cursor:pointer;
	padding:5px;
	margin:10px auto;
	transition:all ease 0.3s;
	margin-bottom:5px;
	font:bold 15pt Roboto,arial,sans-serif;
	border-bottom:2px solid #fff;
}
#tabela .button:hover{
	background:#ffffff;
	color:#232323;
	transition:all ease 0.3s;
}
#tabela .button:active{
	background:none;
	color:#fff;
	transition:all ease 0s;
}
#tabela span{
	text-transform:uppercase;
	color:#ffffff;
}
#tabela a{
	color:#ffffff;
	font-size:13pt;
	margin-right:3px;
}
.msg{
	margin:10px auto;
	padding:5px;
	font-size:10pt;
	color:#fff;
	letter-spacing:2px;
}
.portal1{
	font:100 14pt Roboto, arial,sans-serif;
}
.portal2{
	font:bold 17pt Roboto, arial,sans-serif;
}
.voltar{
	text-align:right;
}
/*@media screen and (min-width: 1025px){
#tabela img{
	width:90%;
	height:160px;
	margin-bottom:50px;
}
#tabela .txt{
	width:90%;
	height:55px;
	text-indent:10px;
	color:#000;
	border:1px solid #ccc;
}
#tabela{
position:absolute;
width:30%;
top:22%;
left:0%;
right:0%;
margin:auto;
}
}*/
</style>
</head>
<body>
<div id="container">
	<form method="post" action='verifica-senha.php'>
	<table id="tabela" border="0" cellspacing="0">
		<tr><th><img src="imagens/logo.png"/></th>
		<th class="adm-gestor"><span class="portal1">recuperar<span><br><span class="portal2">Senha</span></th></tr>
		<tr><th class="logo" colspan="2">
			<input class="txt" type="text" name="recuperar" placeholder="E-Mail"/>
		</th></tr>
		<th class="msg" colspan="2">
			<?php 
					if(isset($_SESSION['senha'])){
						echo $_SESSION['senha'];
					}
					else{echo "";}unset($_SESSION['senha']);
			?>
		</th></tr>
		<tr><th class="logo" colspan="2">
			<input class="button" type="submit" value="Enviar"/>
		</th></tr>
		<tr><th class="voltar" colspan="2">		
			<a href="Index.php">Voltar</a>
		</th></tr>
		</form>
	</table>
</div>
</body>
</html>
