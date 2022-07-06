<?php session_start();?>
<html>
<head>
<meta name="diveme-color" content="#3d3d3d"/>
<meta charset="utf-8"/>
<title>Barbearia 22 - Administrador </title>
<link href="imagens/logo.png" rel="icon"/>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<style>
*{
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	font-family:"Lato",arial,sans-serif;
	font-size:26px ;
}
body{
	background:url('imagens/fundoportal.jpg') center center fixed no-repeat;
	background-size:cover;
	overflow:hidden;
}
#tabela{
	position:relative;
	width:400px;
	min-height:1px;
	margin:100px auto;
	background:rgba(0,0,0,.8);
	padding:10px;
}
.cx-logo{
	position:relative;
	margin-bottom:10px;
	border-bottom:3px solid rgba(255,255,255,.8);
	padding:5px;
}
.logo{
	position:relative;
	margin:0px auto;
	width:160px;
	max-height:160px;
}
.logo img{
	position:relative;
	max-width:100%;
	max-height:100%;
}
.adm-gestor{
	position:relative;
	width:100%;
	text-align:center;
}
.linha{
	position:relative;
	margin:auto;
	width:100%;
	display:block;
	text-align:center;
}
.titulo,.sub-titulo{
	display:block;
	color:#ffffff;
}
.titulo{
	font-size:20px;
	font-weight:normal;
	margin-top:10px;
	letter-spacing:2px;
}
.sub-titulo{
	font-size:100%;
	text-transform:uppercase;
	letter-spacing:1px;
	font-weight:bold;
}
.txt{
	position:relative;
	width:100%;
	min-height:1px;
	margin:10px auto;
	color:#ffffff;
	border:0px;
	border:1px solid rgba(255,255,255,.5);
	background:none;
	font:100 24px "Lato",arial,sans-serif;
	text-align:center;
	outline:0px;
	padding:10px;
}
::-webkit-input-placeholder{
   color: #ffffff;
   font:24px "Lato",arial,sans-serif;
}
::-moz-input-placeholder{
   color: #ffffff;
   font:24px "Lato",arial,sans-serif;
}
::-ms-input-placeholder {
   color: #ffffff;
   font:24px "Lato",arial,sans-serif;
}
.linha .button{
	position:relative;
	background:none;
	color:#ffffff;
	cursor:pointer;
	padding:10px 15px;
	margin:10px auto;
	transition:all ease 0.3s;
	font-weight:bold;
	border:0px;
	border-bottom:1px solid #ffffff;
}
.linha .button:hover{
	background:#ffffff;
	color:#666;
	transition:all ease 0.3s;
}
.linha .button:active{
	background:none;
	color:#fff;
	transition:all ease 0s;
}

.erro{
	font-size:18px;
	color:#ff0;
	letter-spacing:2px;
}
</style>
</head>
<body>
	<form method="post" action="paginas/login-master.php">
	<div id="tabela">
		<div class='cx-logo'>
			<div class='logo'>
				<img src="imagens/logo.png"/>
			</div>
			<div class="adm-gestor">
				<span class="titulo">Área do</span>
				<span class="sub-titulo">Administrador</span>
			</div>
		</div>
		
		<div class="linha" >
			<input class="txt" type="text" name="usuario" placeholder="Login Administrador"/>
		</div>
		<div class="linha" >
			<input class="txt" type="password" name="senha" placeholder="Senha "/>
		</div>
		<div class="linha" >
			<input class="button" type="submit" value="Entrar"/>
		</div>
		<div class="linha" >
		<?php 
			if(isset($_SESSION['erro'])){
				echo "<span class='erro'>".$_SESSION['erro']."</span>";
			}
			else{
				echo "";
			}unset($_SESSION['erro']);
		?>  
		</div>
		</form>		
	</div>
</body>
</html>
