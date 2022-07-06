<?php
include_once("paginas/conexao-geral.php");
	session_start();
	$situacao="";
	if(isset($_SESSION['mensagem'])){
		echo
		"<script>
			document.getElementById('avisos-sessao').fadeIn();
		</script>";
		
	}else{echo "";}unset($_SESSION['mensagem']);
	
?>
<html>
<head>
	
<meta charset="utf-8"/>
<meta name="theme-color" content="#3d3d3d"/>

<title>Barbearia 22</title>

<link rel="stylesheet" href="estilos/barbearia22.css" title="normal" type="text/css" />
<link rel="stylesheet" href="estilos/barbearia22-branco.css" title="branco" type="text/css" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script rel='text/javascript' src="scripts/jquery-1.7.1.min.js"></script>
<script rel="text/javascript" src="scripts/jquery-ui-1.8.18.custom.min.js"></script>
<script rel="text/javascript" src="scripts/jquery.cycle.all.js"></script>
<script rel="text/javascript" language="javascript" src="scripts/jquery.cookie.js"></script>
<script type='text/javascript' language="javascript" src="scripts/javascript.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5qM9A95haC8SfhCkCxxe7J3mvMzA20ko&callback=initMap"></script>

<script type='text/javascript' >
function texto(hora){
	document.all.hora.value=hora.innerHTML;
}

/* Slide galeria de fotos*/
	$(function() {
    $('.fotos').cycle({
        fx:     'none',
        timeout: 0,
        pager:  '#miniaturas',
		prev:'.prev-galeria',
        next:'.next-galeria',
        pagerAnchorBuilder: function(idx, slide) {
			
		var img = $(slide).children().eq(0).attr("src");
		return '<div class="item-foto" style="background:url(' + img +  ') no-repeat center center;background-size:cover" value="'+slide+'"></div>';
			
		}
		
    });
	
	

$(document).ready(function() {
	
			//==== TAMANHO DA IMAGEM
			var Imgsize=$('.item-foto').outerWidth()+20; 
			
			// IMAGENS VISIVEIS NA CAIXA
			var Imgvisiveis=parseInt($('#container2').outerWidth()/Imgsize); 
			
			//==== QUANTIDADE DE IMAGENS
			var quant=$('.item-foto').length;
			
			//==== DANDO TAMANHO PARA O CONTAINER COM IMAGENS
			$('.carrossel').css('width',Imgsize*quant);
			
			//==== VALOR PADRAO É O QUE DEFINE SE HAVERÁ ROLAMENTO OU NÃO
			var padrao=Imgvisiveis;
			
			//==== TAMANHO DO CONTAINER VISÍVEL
			var caixa=$("#container-galeria").outerWidth();
			
			//==== O QUANTO VAI DESLIZAR ATÉ A ÚLTIMA IMAGEM
			var Desliza=(Imgsize*quant)-caixa;
			
			/*======
				Pager das MIniaturas
				===========*/
			$('#prox').click(function(){ /*--- PRÓXIMA ---*/
				if(padrao<quant){
				padrao++;
				$('.carrossel').animate({'margin-left':'-='+Imgsize+'px'},'800');
				}

			});
			
			$('#ant').click(function(){ /*--- ANTERIOR ---*/
				if(padrao>Imgvisiveis){
				$('.carrossel').animate({'margin-left':'+='+Imgsize+'px'},'800');
				padrao--;
				}
			});
			
			
			
			/*=======
			Pager da galeria
			=========*/
			$('.next-galeria').click(function(){ /*--- PRÓXIMA ---*/
				if(padrao<quant){
					$('.carrossel').animate({'margin-left':'-='+Imgsize+'px'},'800');
					padrao++;
				}
				if($('.item-foto:first').hasClass('activeSlide')){
					$('.carrossel').animate({'margin-left':0},'800');
					padrao=Imgvisiveis;
				}
			});
			
			$('.prev-galeria').click(function(){ /*--- ANTERIOR ---*/
			
				if(padrao>Imgvisiveis){
					$('.carrossel').animate({'margin-left':'+='+Imgsize+'px'},'800');
					padrao--;
				}
				if($('.item-foto:last').hasClass('activeSlide')){
					$('.carrossel').animate({'margin-left':'-='+Desliza+'px'},'800');
					padrao=quant;
				}
			});
			});



$('body').keyup(function(e){
  const KEY_LEFT  = 37;
  const KEY_RIGHT = 39;
  switch(e.keyCode){
    case KEY_LEFT  : {
      $('.prev-galeria').click(); 
      break;
    }
    case KEY_RIGHT : {
      $('.next-galeria').click();
      break;
    }
  }
});
});

/* Slide Apresentação*/
	$(function (){
		$('.slider').cycle({
			fx:'scrollHorz',
			timeout:2000,
			next:'#next',
			prev:'#prev',
			speed:800,
			pager:".pager-real",
			pagerAnchorBuilder: function(index,DOMelement){
				return "<li><a></a></li>";
			}
		});
	});
	
	/*Cookie */
	if($.cookie("css")) {
		$("link").attr("href",$.cookie("css"));
	}
	
	$(document).ready(function() {
		$(".styleswitch").click(function() { 
			$("link").attr("href",$(this).attr('rel'));
			$.cookie("css",$(this).attr('rel'), {expires: 7, path: '/'});
			return false;
		});
	});
</script>
<script type='text/javascript' >
	/*mapa*/
	<?php
		$busca_google=mysqli_query($con,"select * from infogerais");
		$mostra_google=mysqli_fetch_array($busca_google);
	?>		
			
			var link=<?php echo "'".$mostra_google['googleinfo']."'";?>;
			var Mapa=link;
			var link=link.replace("https://","");
			var link=link.split('/@');
			var link=link[1].split(',');
		function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(link[0],link[1]),mapTypeId: google.maps.MapTypeId.MAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(link[0],link[1])});infowindow = new google.maps.InfoWindow({content:'<strong><a class="mapa" target="_blank" href="'+Mapa+'">Chegue à Barbearia 22</a></strong>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
</script>

<link href='imagens/logo.png' rel='icon' type="image/x-icon"/>
</head>
<body id="body">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="avisos-sessao" class="aviso-sessao">
	<span id="mensagem"></span>
</div>
<div id="menu-mobile">

		<div class="item-menu-mobile">
		<a href="#cortes"><img src="imagens/icones/lista.png"/><span>serviços</span></a>
		</div>
		
		<div class="item-menu-mobile">
		<a href="#galeria"><img src="imagens/icones/image.png"/><span>galeria</span></a>
		</div>
		
		<div class="item-menu-mobile">
		<a  href="#body"><img src="imagens/icones/home.png"/><span>home</span></a>
		</div>
		
		<div class="item-menu-mobile">
		<a href="#agenda"><img src="imagens/icones/calendario.png"/><span>agendamentos</span></a>
		</div>
		
		<div class="item-menu-mobile">
		<a href="#sobre"><img src="imagens/icones/historia.png"/><span>a barbearia</span></a>
		</div>
</div>
<section id="inicio">
<div id="troca">
	<a id="sol" href="#" rel="estilos/barbearia22-branco.css" class="styleswitch"></a>
	<a id="lua" href="#" rel="estilos/barbearia22.css" class="styleswitch"></a>
</div>
<div class="caixabanner">
	<?php
		$banner=mysqli_query($con,"select bannerimg,imgativo from imagens where imgativo=1;");
		foreach($banner as $mostra_banner){
		if($mostra_banner['bannerimg'] && $mostra_banner['imgativo']==1){
		echo '<img src="'.$mostra_banner['bannerimg'].'" id="banner"/>';
		}}
	?>
	<?php
				$logo=mysqli_query($con,"select logoimg,imgativo from imagens where imgativo=1;");
			foreach($logo as $mostra_logo){
			if($mostra_logo['logoimg'] && $mostra_logo['imgativo']==1){
				
			echo '
					<img class="banner-mobile" src="'.$mostra_logo['logoimg'].'"/>
				';
				
	}}?>
</div>
	<div id="inicia-menu"></div>
	
	<nav id="menu">
		<ul>
			<li ><a href="#inicio"><button>HOME</button></a></li>
			<li><a href="#cortes"><button>SERVIÇOS</button></a></li>
			<li><a href="#galeria"><button>GALERIA</button></a></li>
			<li><a href="#agenda"><button>AGENDAMENTOS</button></a></li>
			<li><a href="#sobre"><button>SOBRE</button></a></li>
		</ul>
		<?php
		if(empty($_SESSION['id'])||empty($_SESSION['nome'])||empty($_SESSION['email'])){
			
	
			$situacao='<div class="detalhe-horario">Agendamentos online Seg à Sex das 9 às 17hrs</div>
		<div class="bot-agenda">Para agendar faça o Login ou registre-se</div>';
			
		?>
		<div class="flip" title="Login/Registre-se"></div>		
	</nav>
		
			<div class="caixa-login"></div>
			<div id="tabelas">
			<img src="imagens/fecha-novo.png" class="fecha-login"/>
			<form  method="post" action="usuario-login.php" id="form_login">
			<table class="tabela" summary="Tabela de Login" border="0">
				<caption style="cursor:default;">Entrar</caption>
				<tr><th><input class="texto" type="text"  id="userlogin" name="userlogin" maxlength="16" placeholder="Nome de Usuário *" required /></th></tr>
				<tr><th><input class="texto" type="password" id="keylogin" name="keylogin" maxlength="30" placeholder="Senha *" required /></th></tr>
				<tr><th><input type="submit" class="bot" value="Entrar"/>
			</form>
				<a alt="Recuperar Senha" class="senha" href="Barbearia22-recupera.php">Recuperar senha</a></th></tr>
				<tr><th></th></tr>
				<tr><th><span id="errolog">
				<img class='img-login' src="imagens/aviso.png" width="10%"/><span>Usuário ou senha incorreto!</span></span></th></tr>
				<tr><th><span id="ok"><img class='img-login' src="imagens/ok.png" width="10%" /><span>Você está sendo logado...</span></span></th></tr>
			</table>
			<div class="erro" ></div>
			
			<form name="registro" method="post" action="cadastro-user.php" id="form_cad">
			<div id="resultado_cad"></div>
			<table class="tabela-registro" summary="Tabela de Cadastro" >
				<caption style="cursor:default;">registre-se</caption>
				
				
				<tr><th>
				<input id="nomecad" name="nomecad" type="text" class="texto"  maxlength="30" placeholder="Nome *" required /></th>
				<th class="th-detalhe"><img class="aviso" id="imgnome"/><DIV id="dtlnome" class="tipo-erro"></DIV>
				</th></tr>
				
				<tr><th>
				<input id="logcad" name="logcad" type="text" class="texto" maxlength="16" placeholder="Nome de Usuário *" required /></th>
				<th class="th-detalhe"><div  id="mostra"><img  class="aviso" id="imglog"/><div id="dtlLog" class="tipo-erro"></div></div>
				</th></tr>
				
				<tr><th>
				<input name="keycad" id="keycad" type="password" class="texto"  maxlength="30" placeholder="Senha *" required /></th>
				<th class="th-detalhe"><img class="aviso"  id="imgkey"/><div id="dtlkey" class="tipo-erro"></div>
				</th></tr>
				
				<tr><th>
				<input name="confkcad" id="confkcad" type="password" class="texto"  maxlength="30" placeholder="Confirmar Senha *" required /></th>
				<th class="th-detalhe"><img class="aviso"  id="imgconf"/><div id="dtlconf" class="tipo-erro"></div>
				</th></tr>
				
				<tr><th>
				<input id="emailcad" name="emailcad" type="text" class="texto"  maxlength="100" placeholder="E-mail *" required /></th>
				<th class="th-detalhe"><div  id="mostra-email"></div>
				</th></tr>
				
				<tr><th>
				<input id="telefone" name="whats" type="text" class="texto"  maxlength="15" placeholder="Telefone\WhatsApp" required /></th>
				<th class="th-detalhe"><div id="num"></div>
				</th></tr>
				
				<tr><th class="info-login" colspan="2"><input name="autoriza" type="checkbox" value="1"/>Liberar direito de imagem para uso no website e redes sociais.</th></tr>
				
				<tr><th><input id="cadastrar" class="bot" type="submit" value="Registrar"/></th></tr>
			</table>
			</form>
		<?php	}else{			
				date_default_timezone_set('America/Sao_Paulo');
				$date = date('d/m/Y');
				$verifica_agendamento=mysqli_query($con,"select * from agendamentos where idusr=".$_SESSION['id']." and diapedido='".$date."';");
				
				$conta_verifica=mysqli_num_rows($verifica_agendamento);
				
				if($conta_verifica){
				$situacao='<div class="detalhe-horario">
				Disponível apenas 1 agendamento por dia.</div>
				<div class="bot-agenda">Agendamentos online Seg à Sex das 9 às 17hrs</div>';
				}else{
			
			$situacao='<div class="bot-verifica">
				<input type="submit" value="Agendar" class="testa"/></div>
				<div class="bot-agenda">Agendamentos online Seg à Sex das 9 às 17hrs</div>';}
			?>
			<div class="flip" title="Informações de Usuário"></div>		
	</nav>
			<div class="caixa-login"></div>
			<div id="tabelas">
			<img src="imagens/fecha-novo.png" class="fecha-login"/>
			<div id="tabelas-logado">
			<table summary="Informações do usuário" class="tabela-usuario" cellspacing="0">
			<tr><th class="usu-logo"><img src="imagens/logo.png" /></th></tr>
			<tr><th class="usu-nome"><?php echo $_SESSION['nome'];?></th></tr>
			<tr><th class="usu-sair"><a href="user-sair.php?"><button>SAIR</button></a></th></tr>
			
			</table>
			</div>
			</div>
			
		<?php
				}
		?>
	
</section>


<div id="slideshow-container">
 	<div id="prev"><img  src='imagens/icones/seta-esquerda.png'/></div>
	<div id="next"><img  src='imagens/icones/seta-direita.png'/></div>
		<div class="slider">
			<?php 
				$slide=mysqli_query($con,"select slideimg,imgativo from imagens where imgativo=1;");
			foreach($slide as $mostra_slide){
			if($mostra_slide['slideimg'] && $mostra_slide['imgativo']==1){
				
			echo '<div class="slider-item">
					<img src="'.$mostra_slide['slideimg'].'" style="max-height:100%;max-width:100%"/>
				</div>';
				
			}}?>	
		</div>
		
</div>


	<div class="pager">
		<ul class="pager-real"></ul>
	</div>

<section id="cortes"> 

<div id="tabela-cortes">
	<table id="cortes-valores" summary="Tabela de cortes e valores" border="0" cellspacing="0">
		<caption>serviços e produtos</caption>
		<?php 
			$busca_produto=mysqli_query($con,"select * from produtos");
			foreach($busca_produto as $mostra_produto){
		
			echo '<tr><th class="esquerda">'.$mostra_produto['descprod'].'</th><th class="direita">R$: '.$mostra_produto['valorprod'].'</th></tr>';}
		?>
	</table>
</div>

	<div id="toTop" style="display: none;"></div>
	
</section>

<section id="galeria">
	<div id="container-galeria">

	<div class="fotos">
		<?php 
				$galeria=mysqli_query($con,"select glrimg,imgativo from imagens where imgativo=1 order by idimg ASC;");
			foreach($galeria as $mostra_galeria){
			if($mostra_galeria['glrimg'] && $mostra_galeria['imgativo']==1){
				
			echo'	<div class="item">
						<img src="'.$mostra_galeria['glrimg'].'"/>
					</div>
				';
				
			}}?>
	</div>
<span class="prev-galeria"></span><span class="next-galeria"></span>
</div>
<div id="container2">
<div id="miniaturas" class="carrossel">
</div>
<span id="prox"></span>
<span id="ant"></span>
</div>
</section>

<section id="agenda">
	<div id="agendamentos">
		<div class="tabela-agenda" >
		<div>Calendário Online</div>
		<div class="calendar"><div id="calendario" ></div></div>
		</div>
		
		<form method="post" action="" id="chama-horario">
		<input type="hidden" name="data"/>
		
		<div class="horarios-disponiveis">
		<div class="span-horario">Horários</div>
		</form>
		
		<form action="usuario-agenda.php" id="registra-horario" method="post">
		<div class="lista-horario" id="listar-horarios">
		<table class='indisponivel'><tr><th>Escolha uma Data</th></tr></table>
		</div>
		<input type="hidden" name="hora"/>
		<input type="hidden" name="dia"/>
		<?php echo $situacao;?>
		</form>
		</div>
	</div>
</section>
<section id="sobre">
	<div class="sobre">
	<?php 
		$busca_sobre=mysqli_query($con,"select * from sobre;");
		
		foreach($busca_sobre as $mostra_sobre){
	
	echo'<h1 class="titulo-sobre">'.$mostra_sobre['tituloSobre'].'</h1>
	<p class="texto-sobre">'.nl2br($mostra_sobre['textoSobre']).'</p>';
		}
	?>
	</div>
	<div class="img-sobre">
	
		<?php
				$logo=mysqli_query($con,"select logoimg,imgativo from imagens where imgativo=1;");
			foreach($logo as $mostra_logo){
			if($mostra_logo['logoimg'] && $mostra_logo['imgativo']==1){
				
			echo '
					<img class="sobre-imagem" src="'.$mostra_logo['logoimg'].'"/>
				';
				
			}}?>
	</div>
	</section>
<footer id="rodape">
	<div class="redes-sociais">
		<div class="areas">
		<table border="0" class="tabela-info" cellspacing="0">
			<tr>
			<?php
		$busca_info=mysqli_query($con,"select * from infogerais");
		foreach($busca_info as $mostra_info){
			echo'	<th class="fotos-redes"><p><img src="imagens/icones/whatsapp-logo.png"/>'.$mostra_info['whatsinfo'].'</p></th>
			</tr>
			<tr>
				<th class="fotos-redes">
				
			
			
			<a href="'.$mostra_info['faceinfo'].'" target="_blank" title="Facebook"/><img src="imagens/icones/facebook.png"/></a>
				<a href="'.$mostra_info['instainfo'].'" target="_blank" title="Instagram"/><img src="imagens/icones/instagram.png"/></a></th>
			</tr>
			<tr>
				<th class="endereco">endereço:</th>
			</tr>
			<tr>
				<th class="endereco2">'.$mostra_info['endinfo'].'</th>
			</tr>
			<tr>
				<th class="endereco2">'.$mostra_info['bairroinfo'].' '.$mostra_info['cepinfo'].'</th>
			</tr>
			<tr>
				<th class="endereco2">'.$mostra_info['cidadeinfo'].'</th>
			</tr>
			</table>';
		}?>
		</div>
	</div>
	<div class="redes-sociais">
		<div class="areas face">
		<?php
		$busca_face=mysqli_query($con,"select * from infogerais");
		foreach($busca_face as $mostra_face){
			
	echo '
		<div class="fb-page" data-href="'.$mostra_face['faceinfo'].'" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="'.$mostra_face['faceinfo'].'" class="fb-xfbml-parse-ignore"><a href="'.$mostra_face['faceinfo'].'">Barbearia 22</a></blockquote></div>
		';
		}?>
		</div>
	</div>
	<div class="redes-sociais">
		<div class="areas">
			<div id="gmap_canvas"><small><a href="http://embedgooglemaps.com">embed google map</a></small></div>
		</div>
	</div>
	<div class="empresa">
		<div id="caixa" class="caixa">
			<div id="popup" class="popup"> 
				<table class="tabela-design">
					<tr><th><th><th></th></tr>
				</table>
			<p><small class="fechar"><span id="fecha-desenvolvedor">Fechar pop-up</span></small></p>
			</div>
		</div>
		<div class="design">
				<table width="100%" height="100%" border="0">
				<tr><th><span id="abre-desenvolvedor">desenvolvedores</span></th></tr>
				</table>
		</div>
		<table class="nome-empresa">
			<tr><th><p style="cursor:default;">Barbearia 22  &copy; <?php date_default_timezone_set('UTC'); echo date("Y"); ?> - todos os direitos reservados.</p></th></th>
		</table>
	</div>
</footer>
	
</body>
</html>
