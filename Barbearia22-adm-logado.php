<?php
include_once("paginas/conexao-geral.php");
include_once('paginas/verifica-master.php');
	
	if(isset($_SESSION['msg'])){
		echo "<script>alert('".$_SESSION['msg']."');</script>";
	}else{ echo "";}
	unset($_SESSION['msg']);
	
?>
<html>
<head>
<meta name="theme-color" content="#3d3d3d"/>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Barbearia 22 - Área do Administrador</title>
<link href="imagens/logo.png" rel="icon"/>
<link href="estilos/barbearia22-adm.css" rel="stylesheet"/>
<script type='text/javascript' src="scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.18.custom.min.js"></script>
<script src="scripts/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/js-adm.js"></script>
<script>
/*-----------CONFIRMA REABRIR HORÁRIO------*/
function abrir(){
	var confirma=confirm("Tem certeza que deseja reabrir este horário?");
	if(confirma){
	return true;
	}else{return false;}
}
/*-----------CONFIRMA REMARCAR HORÁRIO------*/
function remarcar(){
	var confirma=confirm("Tem certeza que deseja remarcar este horário?");
	if(confirma){
	return true;
	}else{return false;}
}

/*-----------CONFIRMA FECHAR TODOS OS HORÁRIOS------*/
function fechaTodos(){
	var confirma=confirm("Tem certeza que quer fechar todos os horários?");
	if(confirma){
	return true;
	}else{return false;}
}
/*-----------CONFIRMA ABRIR TODOS OS HORÁRIOS------*/
function abreTodos(){
	var confirma=confirm("Tem certeza que quer abrir todos os horários?\n Inclusive os já agendados ou remarcados?");
	if(confirma){
	return true;
	}else{return false;}
}


/*-----------CONFIRMA REMOVER PRODUTO------*/
function excluirProduto(){
	var confirma=confirm("Tem certeza que deseja remover este produto?");
	if(confirma){
	return true;
	}else{return false;}
}
/*----------CONFIRMA DELETAR HORÁRIO----------------*/
function DeletaHorario(){
	var confirma=confirm("Você perderá todos os dados sobre este horário, tem certeza que deseja deleta-lo?");
	if(confirma){
		return true;
	}else{return false;}
	
}
/*--------------CONFIRMA APAGAR IMAGEM----------*/
function ApagarImagem(){
	var confirma=confirm("Tem certeza que deseja apagar está imagem?");
	if(confirma){
		return true;
	}else{
		return false;
	}
}
/* add caixa imagem titulo*/
var contaimgTitulo=0;
function Addcaixa() {
	var soma=parseInt($(".img-titulo").length/2)*parseInt($(".caixota").outerHeight(true));
	var novacaixa = $("<div class='img-titulo'>");
	var caixaimg=$(".caixota").length;
	var cols="";
        cols +='<div class="caixota"><div class="img-box" ><div class="caixa-img" id="images'+caixaimg+'"></div><input type="hidden" name="id-img[]" value="0"/><input type="file" name="imagem-banner[]" class="file" accept="image/*" id="file'+caixaimg+'" onchange="preview(this,'+caixaimg+');"><input type="button" class="pesq-img" onclick="';
		cols+="document.getElementById('file"+caixaimg+"').click()";
		cols+='"value="Procurar imagem" id="inputtitulo'+caixaimg+'"></div><div class="descricao-img"></div></div>';
		if(caixaimg<5){
			contaimgTitulo++;
			novacaixa.append(cols).fadeIn(400);
			$(".img-salva-titulo").append(novacaixa);
			$(".img-salva-titulo").animate({scrollTop:soma}, 300);
			return true;
			}else{
				alert("Limite de 5 Imagens alcançado!");
			}
  };
  /* Remove caixa titulo*/
function  RemoveCaixa () {
	var linhanew = $(".img-titulo:last-child");
	 var soma=parseInt($(".img-titulo").length/2)*parseInt($(".caixota").outerHeight(true));
		if(contaimgTitulo>0){
		linhanew.fadeOut(400,function (){linhanew.remove();});
			 contaimgTitulo--;
			 $(".img-salva-titulo").animate({scrollTop:soma}, 300);
			 return false;
		}else{
				alert('Ops! Para apagar essa linha clique no botão "remover"');
			}
  };
</script>
<script>
  
 /* add caixa imagem galeria*/
var contaimgGaleria=0;
function AddcaixaGaleria() {
	var soma=parseInt($(".img-galeria").length/2)*parseInt($(".caixota-galeria").outerHeight(true));
	var novacaixa = $("<div class='img-galeria'>");
	var caixaGaleria=$(".img-galeria").length;
	var cols="";
    cols +='<div class="caixota-galeria"><div class="img-box" "><div class="caixa-img" id="images-galeria'+caixaGaleria+'"></div><input type="hidden" name="id-img[]" value="0"/><input type="file" name="img-galeria[]" class="file" accept="image/*" id="file-galeria'+caixaGaleria+'" onchange="previewGaleria(this,'+caixaGaleria+');"/><input id="galeria-escolhe'+caixaGaleria+'" type="button" class="pesq-img" onclick="';
	cols+="document.getElementById('file-galeria"+caixaGaleria+"').click()";
	cols+='"value="Procurar imagem"/></div><div class="descricao-img"</div>';
		if(caixaGaleria<30){
			contaimgGaleria++;
			novacaixa.append(cols).fadeIn(400);
			$(".img-salva-galeria").append(novacaixa);
			$(".img-salva-galeria").animate({scrollTop:soma}, 300);
			return true;
			}else{
				alert("Limite de 30 Imagens alcançado!");
			}
  };
 /* Remove caixa galeria*/
function  RemoveCaixaGaleria() {
	var linhanew = $(".img-galeria:last-child");
	 
		if(contaimgGaleria>0){
		linhanew.fadeOut(400,function (){linhanew.remove();});
			 contaimgGaleria--;
			 return false;
		}else{
				alert('Ops! Para apagar essa linha clique no botão "remover"');
			}
  };
</script>
<script>
/* add caixa imagem Slide Principal*/
var contaimgPrincipal=0;
function AddcaixaPrincipal() {
	var soma=parseInt($(".img-principal").length/2)*parseInt($(".caixota-principal").outerHeight(true));
	var novacaixa = $("<div class='img-principal'>");
	var caixaimg=$(".img-principal").length;
	var cols="";
        cols +='<div class="caixota-principal"><div class="img-box" ><div class="caixa-img" id="images-principal'+caixaimg+'"></div><input type="hidden" name="id-img[]" value="0"/><input type="file" name="img-slide[]" class="file" accept="image/*" id="file-principal'+caixaimg+'" onchange="previewPrincipal(this,'+caixaimg+');"><input type="button" class="pesq-img" onclick="';
		cols+="document.getElementById('file-principal"+caixaimg+"').click()";
		cols+='"value="Procurar imagem" id="principal-escolhe'+caixaimg+'"></div><div class="descricao-img"></div>';
		if(caixaimg<5){
			contaimgPrincipal++;
			novacaixa.append(cols).fadeIn(400);
			$(".img-salva-principal").append(novacaixa);
			$(".img-salva-principal").animate({scrollTop:soma}, 300);
			return true;
			}else{
				alert("Limite de 5 Imagens alcançado!");
			}
  };
  /* Remove caixa Slide Principal*/
function  RemoveCaixaPrincipal () {
	var linhanew = $(".img-principal:last-child");
	 var soma=parseInt($(".img-principal").length/2)*parseInt($(".caixota-principal").outerHeight(true));
		if(contaimgPrincipal>0){
			linhanew.fadeOut(400,function (){linhanew.remove();});
			contaimgPrincipal--;
			 $(".img-salva-principal").animate({scrollTop:soma}, 300);
			 return false;
		}else{
				alert('Ops! Apenas troque a imagem!');
			}
  };
</script>
<script>
  
 /* add caixa Horário*/
var contaHorario=0;
function AddHorario() {
	var soma=parseInt($(".horario-mani").length/4)*parseInt($(".horario-mani").outerHeight(true));
	var novacaixa = $("<div class='horario-mani'>");
	var caixaHorario=$(".horario-mani").length;
	var cols="";
    cols +='<input type="hidden" name="id-horario[]" value="0"/><input type="text" name="horarios-manipula[]" />';
		if(caixaHorario<24){
			contaHorario++;
			novacaixa.append(cols).fadeIn(400);
			$("#manipula-horarios").append(novacaixa);
			$("#manipula-horarios").animate({scrollTop:soma}, 300);
			return true;
			}else{
				alert("Limite de 24 horários alcançado!");
			}
  };
 /* Remove caixa Horário*/
function  RemoveHorario() {
	var linhanew = $(".horario-mani:last-child");
	 
		if(contaHorario>0){
			linhanew.fadeOut(400,function (){linhanew.remove();});
			 contaHorario--;
			 return false;
		}else{
				alert('Ops! Para apagar esse horário clique em "remover"');
			}
  };
</script>
</head>
<body>
<div id="usuario-master">
	<nav class="user">
	<ul>
	<li class="icone"><img src="imagens/icones/user.png" /><?php echo $usuarioativo." | " ;?><a href="paginas/destroy.php">Sair</a></li>
	</ul>
	</nav>
</div>
<div id="container">
	<table id="tabela" cellspacing='0'>
		<tr><th>
		<?php 
			$logotipo=mysqli_query($con,"select logoimg,imgativo from imagens where imgativo=1 order by 1;");
			foreach($logotipo as $logo_menu){
			if($logo_menu['logoimg'] && $logo_menu['imgativo']==1){
		?>
		<img src="<?php echo $logo_menu['logoimg'];?>"/>
			<?php }}?>
		</th></tr>
		<tr><th style="border-bottom:2px solid #ffffff;"><span>Área do administrador</span></th></tr>
		<tr><th class="linha">
			<a href='#tabela-agendamento'><button class="button">Agendamentos</button></a>
		</th></tr>
		<tr><th class="linha">
			<a href='#tabela-produtos'><button class="button">Produtos</button></a>
		</th></tr>
		<tr><th class="linha">
			<a href='#tabela-titulo'><button class="button">Banner</button></a>
		</th></tr>
		<tr><th class="linha">
			<a href='#tabela-galeria'><button class="button">Galeria</button></a>
		</th></tr>
		<tr><th class="linha">
			<a href='#tabela-principal'><button class="button">Slide</button></a>
		</th></tr>
		<tr><th class="linha">
			<a href='#tabela-texto'><button class="button">Sobre</button></a>
		</th></tr>
		<tr><th class="linha">
			<a href='#informacoes-gerais'><button class="button">gerais</button></a>
		</th></tr>
	</table>
</div>

<div id="tabela-agendamento">
	<div class="exemplo">
		<table class="titulo" summary="Controle de agendamento"><tr><th>Controle de Agendamentos</th></tr></table>
		<div class="calendar"><div id="calendario" ></div></div>
		<form action="paginas/" method="post" id="ajax_form">
		<input type="hidden" name="data" />
		</form>
		<form action="paginas/adm-agenda.php" method="post">
			<div id="horarios">
				<table class='indisponivel'><tr><th>Escolha uma Data</th></tr></table>
			</div>
			<div id="controle-horarios">
			<div class="direito"><input class="salvar" type="submit" value="fechar" /></div>
		</form>
			<div class="esquerdo">
				<div class="todos"><a href="paginas/fecha-todos.php" onclick="return fechaTodos()" id='link-fecha'>Fechar Todos</a></div>
				<div class="abre-todos"><a href="paginas/abre-todos.php" onclick="return abreTodos()" id="link-abre">Abrir Todos</a></div>
			</div>
			</div>
	</div>
</div>
<div id="tabela-produtos">
	<div class="exemplo">
		<div class="produtos-titulo"><table>
		<tr><th>Atualizar produtos</th></tr></table></div>
		<div class="produtos-lista">
		<form method="post" action="paginas/atualiza-produto.php">
			<table class="tabela-lista-produtos">
				<tr><th class="linha-produtos" colspan='2'>Produtos</th>
				<th class="linha-precos">Preços</th></tr>
				
				<?php
					$busca_produtos=mysqli_query($con,"select * from produtos order by idprod");
					foreach($busca_produtos as $produtos){
						echo '
						<tr>
						<th class="remove-prod">
						<a title="Remover Produto" role="button" onclick="return excluirProduto()" id="apaga-produto"  href="paginas/apagar-produto.php?produto='.$produtos['idprod'].'"><img src="imagens/icones/delete.png"></a>
						<input type="hidden" name="id-produto[]" value="'.$produtos['idprod'].'"/>
						</th>
						<th class="linha-produtos-item"><input type="text" name="produto[]" value="'.$produtos['descprod'].'" required/></th>
						<th class="linha-precos-item"><input onkeyup="mascara(this, mvalor);" id="moeda" type="text" name="preco[]" value="'.$produtos['valorprod'].'" required/></th></tr>';
					}
				?>
			</table>
			</div>
			<div class="manipula-produtos">
				<table class="controle-produtos" cellspacing="0">
				<tr><th class="direito"><input class="salvar" type="submit" value="atualizar" /></th>
				</form>
				<th class="esquerdo">
				<button class="add adiciona" title="Adicionar Item" onclick="AddTableRow()">+</button>
				<button class="add remove"  title="Retirar Item" onclick="RemoveTableRow(this)">-</button>
				</th></tr>
			</table>
			
		</div>
	</div>
</div>
<div id="tabela-titulo">
	<div class="exemplo">
		<div class="caixa-de-imagens">
			<div class="titulo-caixa"><table cellspacing="0">
			</tr><th>Manipular Imagens do banner</th></tr></table>
			</div>
			<form action="paginas/manipula-banner.php" method="post" enctype="multipart/form-data"> 
			<div class="img-salva-titulo">
						
				<?php
				$busca_banner=mysqli_query($con,"select * from imagens where bannerimg is not null order by 1;");
				foreach($busca_banner as $imagem_banner){
					
					if($imagem_banner['bannerimg'] && $imagem_banner['imgativo']>0){
					
				echo //Imagem  padrão
				
				'<div class="img-titulo"><div class="caixota" >
					<div class="img-box">
					<div class="caixa-img" id="images'.$imagem_banner['idimg'].'"><img src="'.$imagem_banner['bannerimg'].'"/></div>
					
					<input type="hidden" name="id-img[]" value="'.$imagem_banner['idimg'].'"/>
					
					<input type="hidden" name="nome-img[]" value="'.$imagem_banner['bannerimg'].'"/>
					
					<input type="file" name="imagem-banner[]" class="file" accept="image/*" id="file'.$imagem_banner['idimg'].'" onchange="preview(this,'.$imagem_banner['idimg'].');"/>
						
						<input type="button" class="pesq-img" id="inputtitulo'.$imagem_banner['idimg'].'"
						'."onclick='document.getElementById(\"file".$imagem_banner['idimg']."\").click()' value='Trocar imagem' />".'
						
					</div>
					
					<div id="descricao-banner'.$imagem_banner['idimg'].'" class="descricao-img">
					<button title="IMAGEM ATIVA NO SITE!" type="button" class="ativa-imagem">imagem ativa</button>
					</div>
					
				</div>
				</div>';
				
					}elseif($imagem_banner['bannerimg'] && $imagem_banner['imgativo']<1){
						
						echo //Imagem não padrão
						'<div class="img-titulo"><div class="caixota" >
					<div class="img-box">
					<div class="caixa-img" id="images'.$imagem_banner['idimg'].'"><img src="'.$imagem_banner['bannerimg'].'"/></div>
					
					<input type="hidden" name="id-img[]" value="'.$imagem_banner['idimg'].'"/>
					
					<input type="hidden" name="nome-img[]" value="'.$imagem_banner['bannerimg'].'"/>
					
					<input type="file" name="imagem-banner[]" class="file" accept="image/*" id="file'.$imagem_banner['idimg'].'" onchange="preview(this,'.$imagem_banner['idimg'].');"/>
											
					<input type="button" class="pesq-img" id="inputtitulo'.$imagem_banner['idimg'].'"
						'."onclick='document.getElementById(\"file".$imagem_banner['idimg']."\").click()' value='Trocar imagem' />".'
						
					<div class="div-apaga-imagem"><a class="apaga-foto" href="paginas/apaga-imagem.php?id-imagem='.$imagem_banner['idimg'].'&diretorio-img='.$imagem_banner['bannerimg'].'&lugar=#tabela-titulo" title="Apagar Imagem?" onclick="return ApagarImagem()"></a></div>
					</div>
					
					<div id="descricao-banner'.$imagem_banner['idimg'].'" class="descricao-img">
					<button id="troca'.$imagem_banner['idimg'].'" title="Deixar imagem ativa?" type="button" class="desativa-imagem"><a href="paginas/controle-banner.php?idimg='.$imagem_banner['idimg'].'&opcao=1">imagem inativa</a></button>
					</div>
				</div>
				</div>';
					}
				}
				?>
			</div>
			<table class="controle-imagens"><tr><th><input type="submit" class="salvar" value="atualizar"/></th><th></form>
			<button type="button" title="Adicionar Item" class="adiciona" onclick="Addcaixa()">+</button>
			<button type="button" title="Retirar Item" class="remove" onclick="RemoveCaixa()">-</button></th></tr></table>
		</div>

	</div>
</div>
<div id="tabela-galeria">
	<div class="exemplo">
	<div class="caixa-de-imagens">
			<div class="titulo-caixa"><table cellspacing="0" width="100%" height="100%">
			</tr><th>Manipular Imagens da galeria</th></tr></table>
			</div>
			<form action="paginas/manipula-galeria.php" method="post" enctype="multipart/form-data"> 
			<div class="img-salva-galeria">
				
				<?php
				$busca_galeria=mysqli_query($con,"select * from imagens where glrimg is not null order by 1;");
				foreach($busca_galeria as $imagem_galeria){
					
					if($imagem_galeria['glrimg'] && $imagem_galeria['imgativo']>0){
					
				echo //Imagem  padrão
				
				'<div class="img-galeria"><div class="caixota-galeria">
					<div class="img-box" >
					<div class="caixa-img" id="images-galeria'.$imagem_galeria['idimg'].'"><img src="'.$imagem_galeria['glrimg'].'"/></div>
					
					<input type="hidden" id="id-galeria" name="id-img[]" value="'.$imagem_galeria['idimg'].'"/>
					
					<input type="hidden" name="nome-img[]" value="'.$imagem_galeria['glrimg'].'"/>
					
					<input type="file" name="img-galeria[]" class="file" accept="image/*" id="file-galeria'.$imagem_galeria['idimg'].'" onchange="previewGaleria(this,'.$imagem_galeria['idimg'].');" />
					
					<input type="button" class="pesq-img" id="galeria-escolhe" 
						'."onclick='document.getElementById(\"file-galeria".$imagem_galeria['idimg']."\").click()' value='Trocar imagem' />".'
					<div class="div-apaga-imagem"><a class="apaga-foto" href="paginas/apaga-imagem.php?id-imagem='.$imagem_galeria['idimg'].'&diretorio-img='.$imagem_galeria['glrimg'].'&lugar=#tabela-galeria" title="Apagar Imagem?" onclick="return ApagarImagem()"></a></div>
					</div>
					
					<div id="descricao-imagem'.$imagem_galeria['idimg'].'" class="descricao-img">
					<button id="troca'.$imagem_galeria['idimg'].'" title="Deixar imagem Inativa?" type="button" class="ativa-imagem" onclick="return ControlaImagem('.$imagem_galeria['idimg'].',0)">imagem ativa</button>
					</div>
					
				</div>
				</div>';
				
					}elseif($imagem_galeria['glrimg'] && $imagem_galeria['imgativo']<1){
						
						echo //Imagem não padrão
						'<div class="img-galeria"><div class="caixota-galeria">
					<div class="img-box" >
					<div class="caixa-img" id="images-galeria'.$imagem_galeria['idimg'].'"><img src="'.$imagem_galeria['glrimg'].'"/></div>
					
					<input type="hidden" name="id-img[]" value="'.$imagem_galeria['idimg'].'"/>
					
					<input type="hidden" name="nome-img[]" value="'.$imagem_galeria['glrimg'].'"/>
					
					<input type="file" name="img-galeria[]" class="file" accept="image/*" id="file-galeria'.$imagem_galeria['idimg'].'" onchange="previewGaleria(this,'.$imagem_galeria['idimg'].');"  />
					
					<input type="button" class="pesq-img" id="galeria-escolhe" 
						'."onclick='document.getElementById(\"file-galeria".$imagem_galeria['idimg']."\").click()' value='Trocar imagem' />".'
					
					<div class="div-apaga-imagem"><a class="apaga-foto" href="paginas/apaga-imagem.php?id-imagem='.$imagem_galeria['idimg'].'&diretorio-img='.$imagem_galeria['glrimg'].'&lugar=#tabela-galeria" title="Apagar Imagem?" onclick="return ApagarImagem()"></a></div>
					</div>
					
					<div id="descricao-imagem'.$imagem_galeria['idimg'].'" class="descricao-img">
					<button id="troca'.$imagem_galeria['idimg'].'" title="Deixar imagem Ativa?" type="button" class="desativa-imagem" onclick="return ControlaImagem('.$imagem_galeria['idimg'].',1)" >imagem inativa</button>
					</div>
					
				</div>
				</div>';
					}
				}
				?>
			</div>
			<table class="controle-imagens"></tr><th><input type="submit" class="salvar" value="atualizar"/></th><th></form>
			<button type="button" class="adiciona" title="Adicionar Item" onclick="AddcaixaGaleria()">+</button>
			<button type="button"class="remove" title="Retirar Item"onclick="RemoveCaixaGaleria()">-</button></th></tr></table>
		</div>
	</div>
</div>
<div id="tabela-principal">
	<div class="exemplo">
		<div class="caixa-de-imagens">
			<div class="titulo-caixa"><table cellspacing="0" width="100%" height="100%">
			</tr><th>Manipular Imagens do slide principal</th></tr></table>
			</div>
			<form action="paginas/manipula-slide.php" method="post" enctype="multipart/form-data"> 
			<div class="img-salva-principal">
				<?php $busca_slide=mysqli_query($con,"select * from imagens where slideimg is not null order by 1;");
				foreach($busca_slide as $imagem_slide){
					
					if($imagem_slide['slideimg'] && $imagem_slide['imgativo']>0){
						
				echo '<div class="img-principal">
				<div class="caixota-principal">
					<div class="img-box" >
					<div class="caixa-img" id="images-principal'.$imagem_slide['idimg'].'">
					<img src="'.$imagem_slide['slideimg'].'"/></div>
					
					<input type="hidden" name="id-img[]" value="'.$imagem_slide['idimg'].'"/>
					
					<input type="hidden" name="nome-img[]" value="'.$imagem_slide['slideimg'].'"/>
					
					<input type="file" name="img-slide[]" class="file" accept="image/*" id="file-principal'.$imagem_slide['idimg'].'" onchange="previewPrincipal(this,'.$imagem_slide['idimg'].');"/>
					<input type="button" class="pesq-img" id="principal-escolhe0" 
						onclick="document.getElementById(\'file-principal'.$imagem_slide['idimg'].'\').click()" value="Trocar imagem" />
					
					<div class="div-apaga-imagem"><a class="apaga-foto" href="paginas/apaga-imagem.php?id-imagem='.$imagem_slide['idimg'].'&diretorio-img='.$imagem_slide['slideimg'].'&lugar=#tabela-principal" title="Apagar Imagem?" onclick="return ApagarImagem()"></a></div>
					</div>
					
					<div id="descricao-imagem'.$imagem_slide['idimg'].'" class="descricao-img">
					<button id="troca'.$imagem_slide['idimg'].'" title="Deixar imagem Ativa?" type="button" class="ativa-imagem" onclick="return ControlaImagem('.$imagem_slide['idimg'].',0)" >imagem ativa</button>
					</div>
				</div>
					</div>';}elseif($imagem_slide['slideimg'] && $imagem_slide['imgativo']<1){
							
							echo '<div class="img-principal">
				<div class="caixota-principal">
					<div class="img-box" >
					<div class="caixa-img" id="images-principal'.$imagem_slide['idimg'].'">
					<img src="'.$imagem_slide['slideimg'].'"/></div>
					
					<input type="hidden" name="id-img[]" value="'.$imagem_slide['idimg'].'"/>
					
					<input type="hidden" name="nome-img[]" value="'.$imagem_slide['slideimg'].'"/>
					
					<input type="file" name="img-slide[]" class="file" accept="image/*" id="file-principal'.$imagem_slide['idimg'].'" onchange="previewPrincipal(this,'.$imagem_slide['idimg'].');"/>
					<input type="button" class="pesq-img" id="principal-escolhe0" 
						onclick="document.getElementById(\'file-principal'.$imagem_slide['idimg'].'\').click()" value="Trocar imagem" />
					
					<div class="div-apaga-imagem"><a class="apaga-foto" href="paginas/apaga-imagem.php?id-imagem='.$imagem_slide['idimg'].'&diretorio-img='.$imagem_slide['slideimg'].'&lugar=#tabela-principal" title="Apagar Imagem?" onclick="return ApagarImagem()"></a></div>
					</div>
					
					<div id="descricao-imagem'.$imagem_slide['idimg'].'" class="descricao-img">
					<button id="troca'.$imagem_slide['idimg'].'" title="Deixar imagem Ativa?" type="button" class="desativa-imagem" onclick="return ControlaImagem('.$imagem_slide['idimg'].',1)" >imagem inativa</button>
					</div>
				</div>
					</div>';
						
				}}?>
			</div>	
			<table class="controle-imagens"><tr><th><input type="submit" class="salvar" value="atualizar"/></th><th></form>
			<button type="button" title="Adicionar Item" class="adiciona" onclick="AddcaixaPrincipal()">+</button>
			<button type="button" title="Retirar Item" class="remove" onclick="RemoveCaixaPrincipal()">-</button></th></tr></table>	
		</div>			
	</div>
</div>
<div id="tabela-texto">
	<div class="exemplo">
		<div id="controle-texto">
			<table><tr><th>Atualizar Sobre</th></tr></table>
			<?php
				$busca_sobre=mysqli_query($con,"select * from sobre");
				foreach($busca_sobre as $mostra_sobre){
			?>
			<form action="paginas/atualiza-sobre.php" method="post">
			<input type="text" name="titulo-sobre" value="<?php echo $mostra_sobre['tituloSobre'];?>" class="titulo-sobre"/>
			<textarea maxlength='600' class="texto-sobre" name="conteudo-sobre" ><?php echo $mostra_sobre['textoSobre'];?></textarea>
			<input type="submit" value="atualizar" class="salvar-sobre"/>
			</form>
				<?php }?>
		</div>
	</div>
</div>
<div id="informacoes-gerais">
	<div class="exemplo">
	<div id="controle-texto">
			<table><tr><th>atualizar informações gerais</th></tr></table>
			<aside id="info-esquerda">
			<div id="redes-sociais">
			<?php
				$busca_info=mysqli_query($con,"select * from infogerais order by 1;");
				foreach($busca_info as $campo_info){
			?> 
			<form action="paginas/atualiza-redes-sociais.php" method="post">
				<p>Redes Sociais</p>
				<input class="links" type="text" name="facebook" placeholder="Link Facebook" value="<?php echo $campo_info['faceinfo'];?>"/>
				<input class="links" type="text" name="instagram" placeholder="Link Instagram" value="<?php echo $campo_info['instainfo'];?>"/>
				<input type="submit" class="atualiza-info" value="atualizar"/>
			</form>
			</div>
			<div id="endereco">
			<form action="paginas/atualiza-localizacao.php" method="post">
				<p>localização</p>
				<input class="links" type="text" name="endereço" placeholder="Logradouro" value="<?php echo $campo_info['endinfo'];?>"/>
				<input class="links" type="text" name="bairro" placeholder="Bairro" value="<?php echo $campo_info['bairroinfo'];?>"/>
				<input class="links" type="text" name="cidade" placeholder="Cidade-UF" value="<?php echo $campo_info['cidadeinfo'];?>"/>
				<input onkeyup="mascara( this, mcep );" class="links" type="text" name="cep" placeholder="Cep" value="<?php echo $campo_info['cepinfo'];?>"/>
				<input class="links" type="text" name="google" placeholder="Link Google Maps" value="<?php echo $campo_info['googleinfo'];?>"/>
				<input type="submit" class="atualiza-info" value="atualizar"/>
			</form>
			</div>
			<div id="whatsapp">
			<form action="paginas/atualiza-whats.php" method="post">
			<p>contato</p>
				<input 
			onkeyup="mascara( this, mtel );"id="whats" class="links" type="text" name="whats" placeholder="WhatsApp" value="<?php echo $campo_info['whatsinfo'];?>"/>
				<input type="submit" class="atualiza-info" value="atualizar"/>
			</form>
			<?php }?>
			</div>
			</aside>
			<aside id="info-direita">
			<form action="paginas/manipula-logo.php" method="post" enctype="multipart/form-data">
			<div id="img-logotipo">
			<p>logotipo</p>
				<?php 
					$logo=mysqli_query($con,"select logoimg,idimg from imagens where imgativo=1 order by 1;");
					foreach($logo as $campo_logo){
				if($campo_logo['logoimg']){
					echo '<div class="box-logo">
					<div class="caixa-logo" id="imagem-logo"><img src="'.$campo_logo['logoimg'].'"/></div>
					<input type="hidden" name="id-logo" value="'.$campo_logo['idimg'].'"/>
					<input type="file" name="imagem-logo" class="file-logo" accept="image/*" id="file-logo" onchange="previewLogo(this);"/>
					<input type="button" class="pesq-logo" id="logo-escolhe" 
						onclick="document.getElementById(\'file-logo\').click()" value="Procurar imagem" />
					</div>';}
					}
					 if($logo==null){
						 echo '<div class="box-logo">
					<div class="caixa-logo" id="imagem-logo"><img/></div>
					<input type="hidden" name="id-logo" value=""/>
					<input type="file" name="imagem-logo" class="file-logo" accept="image/*" id="file-logo" onchange="previewLogo(this);"/>
					<input type="button" class="pesq-logo" id="logo-escolhe" 
						onclick="document.getElementById(\'file-logo\').click()" value="Procurar imagem" />
					</div>';
					 }
				?>
				<input type="submit" class="atualiza-info" value="atualizar"/>
			</div></form>
			<div id="atualiza-horarios"> 
			<p>manipula horários</p>
			<form action="paginas/atualiza-horarios.php" method="post">
				<div id="manipula-horarios">
				<?php
					$horario=mysqli_query($con,"select * from horarios order by codhorarios");
					
					foreach($horario as $horarios){
						echo '<div class="horario-mani">
						<input type="hidden" name="id-horario[]" value="'.$horarios['idhorario'].'"/>
						<input type="text" name="horarios-manipula[]" value="'.$horarios['codhorarios'].'"/><div><a title="Remover Horário" href="paginas/deleta-horario.php?id='.$horarios['idhorario'].'" onclick="return DeletaHorario()">X</a></div></div>';
					}
				?>
				</div>
				<input type="submit" class="atualiza-info" value="atualizar"/></form>
				<button type="button" title="Adicionar Item" class="adiciona-info" onclick="AddHorario()">+</button>
				<button type="button" title="Retirar Item" class="remove-info" onclick="RemoveHorario()">-</button>
			</div>
			</aside>
	</div>
	</div>
</div>
</body>
</html>
