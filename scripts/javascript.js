var ultimaPos=$(window).scrollTop();

function Rolando(){
	
	//alert($(window).scrollTop());
	var atualPos=$(window).scrollTop();
	
	if($(document).innerWidth()<981){
		
		if($(this).scrollTop() > $('#inicia-menu').offset().top){
		
			if(ultimaPos==atualPos){
				
				$('#menu').slideUp("fast");
				$('#menu-mobile').slideUp("fast");
				//alert("não mexeu");
			}
			
		}
	}
	ultimaPos=$(window).scrollTop();
}
setInterval(Rolando,1000);

$(window).scroll(function(){
	if($(document).innerWidth()<981){
		
		$('#menu').slideDown("fast");
		
	if($(this).scrollTop() > $('#inicia-menu').offset().top){
		
		$('#menu-mobile').slideDown("fast");
		
	}else{
		
		$('#menu-mobile').slideUp("fast");
	}

	}
});


//-------------- CALENDÁRIO
$(function() {
   $("#calendario").datepicker({
	beforeShowDay: $ .datepicker.noWeekends,
	dateFormat: 'dd/mm/yy',
	minDate: +2,
	maxDate:"+1M",
	monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
	monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
	dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Quarta", "Sábado"],
	dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
	dayNamesMin: ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"],
	inline:true,
	onSelect: function(textoData, objDatepicker){
        document.all.data.value=textoData;
        document.all.dia.value=textoData;
		PesquisaHorario();
		}
});
});

/* Código Voltar ao Topo */
$(function() { $(window).scroll(function() 
{ 
if($(this).scrollTop() >= 630) { $('#toTop').fadeIn();   } 
else { $('#toTop').fadeOut(); } }); $('#toTop').click(function()
 { $('body,html').animate({scrollTop:0},1000); });
});


/* Código menu âncora */
$(document).ready(function() {
function filterPath(string) {
return string
.replace(/^\//,'')
.replace(/(index|default).[a-zA-Z]{3,4}$/,'')
.replace(/\/$/,'');
}
$('a[href*=#]').each(function() {
if ( filterPath(location.pathname) == filterPath(this.pathname)
&& location.hostname == this.hostname
&& this.hash.replace(/#/,'') ) {
var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
if ($target) {
var targetOffset = $target.offset().top;
$(this).click(function() {
$('html, body').animate({scrollTop: targetOffset}, 300);
return false;
});
}
}
});
});

/* Menu fixo */
$(function(){   
			var nav = $('#menu');
			   if ($(this).scrollTop() > $('#inicia-menu').offset().top) { 
					nav.addClass("menu-fixo"); 
				} else { 
					nav.removeClass("menu-fixo"); 
				} 
			$(window).scroll(function () { 
				if ($(this).scrollTop() > $('#inicia-menu').offset().top) { 
					nav.addClass("menu-fixo"); 
				} else { 
					nav.removeClass("menu-fixo"); 
				} 
			});  
		});
		
		
		
/* ABRE-FECHA CAIXA LOGIN */

$(document).ready(function(){
    $(".flip").click(function(){
        $(".caixa-login").fadeIn("fast");
		$("#tabelas").fadeIn("fast");
		$('body').css('overflow-y','hidden');
	});

	$(".fecha-login").click(function(){
        $(".caixa-login").fadeOut("fast");
		$("#tabelas").fadeOut("fast");
		$('body').css('overflow-y','auto');
	});


	$(".caixa-login").click(function(){
        $(".caixa-login").fadeOut("fast");
        $("#tabelas").fadeOut("fast");
		$('body').css('overflow-y','auto');
	});
	
	
	// ABRE - FECHA DESENVOLVEDORES
	
	 $("#abre-desenvolvedor").click(function(){
        $(".caixa").fadeIn("fast");
		$('body').css('overflow-y','hidden');
	});

	$("#fecha-desenvolvedor").click(function(){
        $(".caixa").fadeOut("fast");
		$('body').css('overflow-y','auto');
	});


	$(".caixa").click(function(){
        $("#caixa").fadeOut("fast");
		$('body').css('overflow-y','auto');
	});
});

/*==========LOGIN=============*/
$(document).ready(function(){
	$('#errolog').hide(); //Esconde o elemento com id errolog
	$('#ok').hide(); //Esconde o elemento com id ok
	$('#form_login').submit(function(){ 	//Ao submeter formulário
		var login=$('#userlogin').val();	//Pega valor do campo email
		var senha=$('#keylogin').val();	//Pega valor do campo senha
		$.ajax({			//Função AJAX
			url:"paginas/usuario-login.php",			//Arquivo php
			type:"post",				//Método de envio
			data: "userlogin="+login+"&keylogin="+senha,	//Dados
   			success: function (result){			//Sucesso no AJAX
                		if(result==1){		
							$('#errolog').hide();
							$("#ok").fadeIn(100);
							setTimeout(escondeOK(),2000);
              
                		}else{
							
                			$('#errolog').fadeIn(400);	
							setTimeout('escondeErro()',2000);
                		}
            		}
		})
		return false;	//Evita que a página seja atualizada
	})
})



function escondeOK(){
	location.href='Barbearia22.php';
}
function escondeErro(){
	$('#errolog').fadeOut(400);
}
/* Pesquisa Horário  sem refresh*/
function PesquisaHorario(){
			var dados = jQuery("#chama-horario").serialize();
			jQuery.ajax({
				type: "POST",
				url:"paginas/procura-horario.php",
				data: dados,
				success: function( data )
				{
					document.getElementById("listar-horarios").innerHTML=data;
				}
			});
			return false;
		};

/* Muda cor do iTem do menu*/
$(function() {
	if($(window).scrollTop() > $('#inicia-menu').offset().top) {
      $("a[href*=#cortes] button").addClass("local");
	   $("a[href*=#galeria] button").removeClass("local");
	  $("a[href*=#agenda] button").removeClass("local");
	  $("a[href*=#sobre] button").removeClass("local");
    } else {
		$("a[href*=#cortes] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#cortes').offset().top+250)) {
	  $("a[href*=#cortes] button").removeClass("local");
	  $("a[href*=#galeria] button").addClass("local");
	   $("a[href*=#agenda] button").removeClass("local");
	   $("a[href*=#sobre] button").removeClass("local");
    } else {
	  $("a[href*=#galeria] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#galeria').offset().top+250)) {
      $("a[href*=#agenda] button").addClass("local");
	  $("a[href*=#cortes] button").removeClass("local");
	  $("a[href*=#galeria] button").removeClass("local");
	  $("a[href*=#sobre] button").removeClass("local");
    } else {
	  $("a[href*=#agenda] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#agenda').offset().top+250)) {
      $("a[href*=#agenda] button").removeClass("local");
	  $("a[href*=#cortes] button").removeClass("local");
	  $("a[href*=#galeria] button").removeClass("local");
	  $("a[href*=#sobre] button").addClass("local");
    } else {
	  $("a[href*=#sobre] button").removeClass("local");
    }
  $(window).on("scroll", function() {
	if($(window).scrollTop() > $('#inicia-menu').offset().top) {
      $("a[href*=#cortes] button").addClass("local");
	   $("a[href*=#galeria] button").removeClass("local");
	  $("a[href*=#agenda] button").removeClass("local");
    } else {
		$("a[href*=#cortes] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#cortes').offset().top+250)) {
      $("a[href*=#galeria] button").addClass("local");
	  $("a[href*=#cortes] button").removeClass("local");
	    $("a[href*=#agenda] button").removeClass("local");
    } else {
	  $("a[href*=#galeria] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#galeria').offset().top+250)) {
      $("a[href*=#agenda] button").addClass("local");
	  $("a[href*=#cortes] button").removeClass("local");
	    $("a[href*=#galeria] button").removeClass("local");
    } else {
	  $("a[href*=#agenda] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#agenda').offset().top+250)) {
      $("a[href*=#agenda] button").removeClass("local");
	  $("a[href*=#cortes] button").removeClass("local");
	  $("a[href*=#galeria] button").removeClass("local");
	  $("a[href*=#sobre] button").addClass("local");
    } else {
	  $("a[href*=#sobre] button").removeClass("local");
    }
  });
});


/* ------------------ VERIFICAÇÃO CAMPOS DE CADASTRO-----------------*/

var usuario=false;
var nomeuser=false;
var senha=false;
var confsenha=false;
var email=false;
var celular=false;

var DURACAO_DIGITACAO =200,
    digitando = false,
    tempoUltimaDigitacao;
	//Verifica Nome------------------------------------
$(document).ready(function(){
	var input = $('#nomecad');
	input.on('input', function () {
		atualiza();
});
});
function atualiza () {
    if(!digitando) {
        digitando = true;
    }
    tempoUltimaDigitacao = (new Date()).getTime();
    
    setTimeout(function () {
        var digitacaoTempo = (new Date()).getTime();
        var diferencaTempo = digitacaoTempo - tempoUltimaDigitacao;
        
    if(diferencaTempo >= DURACAO_DIGITACAO && digitando) {
            digitando = false;
          var nome=registro.nomecad.value;
		  var invnome=new RegExp('[^a-zA-Z \u00C0-\u00FF]');
		 
			
	if(nome.match(invnome)){
		document.getElementById("dtlnome").innerHTML="Uso de carácter inválido!";
		document.getElementById("imgnome").style.display="block";
		document.getElementById("imgnome").src="imagens/aviso.png";
		nomeuser=false;
		verifica()
		return false;
	}
	if(nome.length<1){
		document.getElementById("dtlnome").innerHTML="Preencher este campo!";
		document.getElementById("imgnome").style.display="block";
		document.getElementById("imgnome").src="imagens/aviso.png";
		nomeuser=false;
		verifica()
		return false;
	}
	else{ if(nome.length<8){
		document.getElementById("dtlnome").innerHTML="Nome curto demais!";
		document.getElementById("imgnome").style.display="block";
		document.getElementById("imgnome").src="imagens/aviso.png";
		nomeuser=false;
		verifica()
		return false;
		}else{
		document.getElementById("dtlnome").innerHTML="";
		document.getElementById("imgnome").style.display="block";
		document.getElementById("imgnome").src="imagens/ok.png";		
		nomeuser=true;
		verifica()
		return false;
	}}
	}
}, DURACAO_DIGITACAO);}


//Verifica USUÁRIO------------------------------------
$(document).ready(function(){
	$("#logcad").click(function(){
		usuario=false;
		verifica()
	})
});
$(document).ready(function(){
	$("#logcad").blur(function(){

    setTimeout(function () {
			var usu=registro.logcad.value;
			var invuser=new RegExp('[^a-zA-Z0-9_]');
	if(usu.match(invuser)){
		$("#dtlLog").html("Uso de carácter inválido!");
		$("#imglog").css("display","block");
		$("#imglog").attr({src:"imagens/aviso.png",alt:""});	
		usuario=false;
		return false;
	}
	if(usu.length<1){
		$("#dtlLog").html("");
		$("#imglog").css("display","none");	
		usuario=false;
		return false;
	}
	if(usu.length<8){
		$("#dtlLog").html("Nome de Usuário inválido!");
		$("#imglog").css("display","block");
		$("#imglog").attr({src:"imagens/aviso.png",alt:""});	
		usuario=false;
		verifica()
		return false;
		}else{
		document.getElementById("dtlLog").innerHTML="";
		document.getElementById("imglog").innerHTML="";
		url = "paginas/procura-usuario.php?nome=" + document.getElementById("logcad").value; 
		div = "mostra";
		ajax(url, div);
		return false;
		}
	return false;
	
}, 400);
verifica()
});

});

function ajax(url, div) {
  req = null;
  if (window.XMLHttpRequest) {
    req = new XMLHttpRequest();
    req.onreadystatechange = processReqChange;
    req.open("GET", url, true);
    req.send(null);
  } else if (window.ActiveXObject) {
    req = new ActiveXObject("Microsoft.XMLHTTP");
    if (req) {
      req.onreadystatechange = processReqChange;
      req.open("GET", url, true);
      req.send(null);
    }
  }
}

function processReqChange() {
  if (req.readyState == 4) {
    if (req.status ==200) {
      document.getElementById("mostra").innerHTML = req.responseText;
	  var ok=document.getElementById("imglog").alt; 
	  if(ok=="usuário disponível"){
		  usuario=true;verifica()
	  }else{usuario=false;}
    } else{
      alert("Houve um problema ao obter os dados:n" + req.statusText);
    }
  }
}
//Verifica SENHAS------------------------------------


$(document).ready(function(){
	var inputkey = $('#keycad');
	inputkey.on('input', function () {
		senha=false;
		confsenha=false;
		verifica();
		atualizakey ();
		$("#confkcad").val("");
		document.getElementById("dtlconf").innerHTML="";
		document.getElementById("imgconf").style.display="none";
		document.getElementById('imgconf').src="";
});
});
function atualizakey () {
    if(!digitando) {
        digitando = true;
    }
    tempoUltimaDigitacao = (new Date()).getTime();
    
    setTimeout(function () {
        var digitacaoTempo = (new Date()).getTime();
        var diferencaTempo = digitacaoTempo - tempoUltimaDigitacao;
        
    if(diferencaTempo >= DURACAO_DIGITACAO && digitando) {
            digitando = false;
          var key=registro.keycad.value;
	var invkey=new RegExp('[^a-zA-Z0-9]');
		 
			
	if(key.match(invkey)){
		document.getElementById("dtlkey").style.background="#f00";
		document.getElementById("dtlkey").innerHTML="Uso de carácter inválido";
		document.getElementById("imgkey").style.display="block";
		document.getElementById("imgkey").src="imagens/aviso.png";
		verifica()
		senha=false;
		return false;
	}
	if(key.length<1){
		document.getElementById("dtlkey").style.background="#f00";
		document.getElementById("dtlkey").innerHTML="Preencher este campo!";
		document.getElementById("imgkey").style.display="block";
		document.getElementById('imgkey').src="imagens/aviso.png";
		verifica()
		senha=false;
	}
	else{
	if(key.length<8){
		document.getElementById("dtlkey").style.background="#f00";
		document.getElementById("dtlkey").innerHTML="Senha curta demais!";
		document.getElementById("imgkey").style.display="block";
		document.getElementById("imgkey").src="imagens/aviso.png";
		senha=false;
		verifica()
		return false;
		}
	if(key.length<12){
		document.getElementById("dtlkey").innerHTML="Senha Fraca!";
		document.getElementById("dtlkey").style.background="#ff9933";
		document.getElementById("imgkey").style.display="block";
		document.getElementById("imgkey").src="imagens/aviso.png";
		senha=true;
		verifica()
		return false;
		}else{
		document.getElementById("dtlkey").innerHTML="Senha Forte!";
		document.getElementById("dtlkey").style.background="#5fd409";
		document.getElementById("imgkey").style.display="block";
		document.getElementById("imgkey").src="imagens/ok.png";
		senha=true;		
		verifica()
		return false;
		
	}}
	}
}, DURACAO_DIGITACAO);}

/*CONFIRMAR SENHA-----------*/
$(document).ready(function(){
	var inputkey = $('#confkcad');
	inputkey.on('input', function () {
		ConfirmaSenha();
});
});
function ConfirmaSenha () {
    if(!digitando) {
        digitando = true;
    }
    tempoUltimaDigitacao = (new Date()).getTime();
    
    setTimeout(function () {
        var digitacaoTempo = (new Date()).getTime();
        var diferencaTempo = digitacaoTempo - tempoUltimaDigitacao;
        
    if(diferencaTempo >= DURACAO_DIGITACAO && digitando) {
            digitando = false;
			var key=registro.keycad.value;
			var Confkey=registro.confkcad.value;
			var invConfKey=new RegExp('[^a-zA-Z0-9]');
		 
			
	if(Confkey.match(invConfKey)){
		document.getElementById("dtlconf").style.background="#f00";
		document.getElementById("dtlconf").innerHTML="Uso de carácter inválido";
		document.getElementById("imgconf").style.display="block";
		document.getElementById("imgconf").src="imagens/aviso.png";
		confsenha=false;
		verifica()
		return false;
	}
	if(Confkey.length<1){
		document.getElementById("dtlconf").style.background="#f00";
		document.getElementById("dtlconf").innerHTML="Preencher este campo!";
		document.getElementById("imgconf").style.display="block";
		document.getElementById('imgconf').src="imagens/aviso.png";
		confsenha=false;
		verifica()	
	}
	else{
	if(key!=Confkey){
		document.getElementById("dtlconf").style.background="#f00";
		document.getElementById('dtlconf').innerHTML="As senhas não batem";
		document.getElementById("imgconf").style.display="block";
		document.getElementById("imgconf").src="imagens/aviso.png";
		confsenha=false;
		verifica()
		return false;
		}
		document.getElementById("dtlconf").innerHTML="As Senhas batem!";
		document.getElementById("dtlconf").style.background="#5fd409";
		document.getElementById("imgconf").style.display="block";
		document.getElementById("imgconf").src="imagens/ok.png";
		confsenha=true;
		verifica()
		return false;
	}}
	
}, DURACAO_DIGITACAO);}

//VERIFICAR E-MAIL-----------------------
$(document).ready(function(){
	var inputMail = $('#emailcad');
	inputMail.on('input', function () {
		ConfirmaMail();
});
});
function ConfirmaMail () {
    if(!digitando) {
        digitando = true;
    }
    tempoUltimaDigitacao = (new Date()).getTime();
    
    setTimeout(function () {
        var digitacaoTempo = (new Date()).getTime();
        var diferencaTempo = digitacaoTempo - tempoUltimaDigitacao;
        
    if(diferencaTempo >= DURACAO_DIGITACAO && digitando) {
            digitando = false;
		var mail=registro.emailcad.value;
		var invMail=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;	
		
	if(mail.search(invMail)){
		document.getElementById("mostra-email").innerHTML="<img style='display:block' src='imagens/aviso.png' class='aviso' id='imgmail'/><div id='dtlmail' style='background:#f00;' class='tipo-erro'>Uso de carácter inválido!</div>";
		email=false;
		verifica()
		return false;
	}
	if(mail.length<1){
			document.getElementById("mostra-email").innerHTML="";
			verifica()
		}
	else{
		verifica()
		urlMail = "paginas/procura-mail.php?mail=" + document.getElementById("emailcad").value; 
		divMail = "th-detalhe";
		Mail(urlMail, divMail)
		return false;
	}}	
}, DURACAO_DIGITACAO);}

/*-------- VERIFICA SE O EMAIL EXISTE--------------*/
	

function Mail(urlMail, divMail) {
  req = null;
  if (window.XMLHttpRequest) {
    req = new XMLHttpRequest();
    req.onreadystatechange = processReqChange3;
    req.open("GET", urlMail, true);
    req.send(null);
  } else if (window.ActiveXObject) {
    req = new ActiveXObject("Microsoft.XMLHTTP");
    if (req) {
      req.onreadystatechange = processReqChange3;
      req.open("GET", urlMail, true);
      req.send(null);
    }
  }
}

function processReqChange3() {
  if (req.readyState == 4) {
    if (req.status ==200) {
      document.getElementById("mostra-email").innerHTML = req.responseText;
		var okEmail=document.getElementById("imgmail").alt;
			if(okEmail=="email disponivel"){
				email=true;
				verifica()
			}else{
				email=false;
				verifica()
				}
    } else{
      alert("Houve um problema ao obter os dados:n" + req.statusText);
    }
  }
}

/*----------- FORMALIZA TELEFONE ---------------*/

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
	if(v_obj.value.length>13){
		url2 = "paginas/confirma-numero.php?num=" + document.getElementById("telefone").value; 
		div2 = "num";
		ajax2(url2, div2)
	}else{
		document.getElementById("num").innerHTML ="";
		celular=false;
		verifica()
	}
}
function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
		
	}
}

/*-------- VERIFICA SE O NÚMERO EXISTE--------------*/
	

function ajax2(url2, div2) {
  req = null;
  if (window.XMLHttpRequest) {
    req = new XMLHttpRequest();
    req.onreadystatechange = processReqChange2;
    req.open("GET", url2, true);
    req.send(null);
  } else if (window.ActiveXObject) {
    req = new ActiveXObject("Microsoft.XMLHTTP");
    if (req) {
      req.onreadystatechange = processReqChange2;
      req.open("GET", url2, true);
      req.send(null);
    }
  }
}

function processReqChange2() {
  if (req.readyState == 4) {
    if (req.status ==200) {
		
      document.getElementById("num").innerHTML = req.responseText;
	  var oknum=document.getElementById("imgnum").alt;
	   if(oknum=="número disponível"){
		  celular=true;
		  verifica()
	  }else{
		  celular=false;
		  verifica()
		  }
    } else{
      alert("Houve um problema ao obter os dados:n" + req.statusText);
    }
  }
}


/*------------------ VALIDANDO FORMULÁRIOS--------------------*/
//----MOstra botão cadastro-----

function verifica(){
	if((nomeuser==false)|| (usuario==false) || (senha==false) || (confsenha==false) || (email==false)){
		$("#cadastrar").fadeOut("fast");
		return false;
	}else{
		$("#cadastrar").fadeIn('fast');
		return true;
	}
}

function vrfCadastro(){
if((nomeuser==false)|| (usuario==false) || (senha==false) || (confsenha==false) || (email==false)){
		alert("Houve algum erro para cadastrar")
		return false;
	}else{
		cadastro()
		return true;
	}
}