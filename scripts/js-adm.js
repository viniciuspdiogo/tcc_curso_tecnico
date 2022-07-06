

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
$('html, body').animate({scrollTop: targetOffset}, 1000);
return false;
});
}
}
});
});

/*calendario*/
$(function() {
   $("#calendario").datepicker({
	dateFormat: 'dd/mm/yy',
	//minDate: +1,
	monthNames: ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
	monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
	dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Quarta", "Sábado"],
	dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
	dayNamesMin: ["Dom","Seg","Ter","Qua","Qui","Sex","Sab"],
	inline:true,
	onSelect: function(textoData, objDatepicker){
        document.all.data.value=textoData; 
		$('#link-abre').attr('href',"abre-todos.php?dia="+textoData);
		$('#link-fecha').attr('href',"fecha-todos.php?dia="+textoData);
		PesquisaHorario();
	}
});
});
/*envia form-horario*/

		function PesquisaHorario(){
			var dados = jQuery("#ajax_form").serialize();

			jQuery.ajax({
				type: "POST",
				url: "paginas/procura-horario2.php",
				data: dados,
				success: function( data )
				{
					document.getElementById("horarios").innerHTML=data;
				}
			});
			return false;
		};

/*add linha- tabela*/
var conta=0;
var linha=$(".tabela-lista-produtos tr").length;
function AddTableRow() {
	var soma=$(".tabela-lista-produtos tr").length*$(".tabela-lista-produtos tr").outerHeight(true);
    var newRow = $("<tr>");
    var cols = "";
	var linha=$(".tabela-lista-produtos tr").length;
    cols += '<th class="remove-prod"><input type="hidden" name="id-produto[]"/></th><th class="linha-produtos-item"><input type="text" name="produto[]" required/></th>';
    cols += '<th class="linha-precos-item" ><input class="preco" onkeyup="mascara(this, mvalor);" id="moeda" type="text" name="preco[]" required/></th>';
		if(linha<11){
			newRow.append(cols).fadeIn(400);
			$(".tabela-lista-produtos").append(newRow);
			$(".produtos-lista").animate({scrollTop:soma},300);
			conta++;
			
			return true;
			}else{
				alert("Limite de Produtos alcançado!");
			}
  };
  

 /*-----------Remove linha tabela-------------*/
function  RemoveTableRow () {
	var linhanew = $(".tabela-lista-produtos tr:last-child");
	 
		if(conta>0){
		linhanew.fadeOut(400,function (){$(".tabela-lista-produtos tr:last-child").remove();});
			 conta--;
			 return false;
		}else{
				alert('Ops! Para apagar essa linha clique no botão "remover"');
			}
  };
  
 
/* Preview img escolhida BANNER*/
  function preview(input,valor) {
    for (i = 0; i < input.files.length; i++) {
            var Img = new FileReader();
            Img.onload = function (e) {
                    if (document.getElementById("images"+valor).getElementsByTagName('img').length) {
                            document.getElementById("images"+valor).innerHTML = '';
                    }
                    var img = document.createElement('img');
                    img.src = e.target.result;
					document.getElementById("images"+valor).appendChild(img);
					document.getElementById("inputtitulo"+valor).value="Trocar Imagem";
					document.getElementById("atv-titulo"+valor).style.display="block";
            };
            Img.readAsDataURL(input.files[i]);
   }
}
/* Preview img escolhida GALERIA*/
  function previewGaleria(input,posicao) {
    for (i = 0; i < input.files.length; i++) {
		
            var Img = new FileReader();
            Img.onload = function (e) {
                    if (document.getElementById("images-galeria"+posicao).getElementsByTagName('img').length) {
                            document.getElementById("images-galeria"+posicao).innerHTML = '';
                    }
                    var img = document.createElement('img');
                    img.src = e.target.result;
					document.getElementById("images-galeria"+posicao).appendChild(img);	
					document.getElementById("galeria-escolhe"+posicao).value="Trocar Imagem";
					document.getElementById("atv-galeria"+posicao).style.display="block";
            };
            Img.readAsDataURL(input.files[i]);
   }
}
/* Preview img escolhida Slide Principal*/
  function previewPrincipal(input,posicao) {
    for (i = 0; i < input.files.length; i++) {
		
            var Img = new FileReader();
            Img.onload = function (e) {
                    if (document.getElementById("images-principal"+posicao).getElementsByTagName('img').length) {
                            document.getElementById("images-principal"+posicao).innerHTML = '';
                    }
                    var img = document.createElement('img');
                    img.src = e.target.result;
					document.getElementById("images-principal"+posicao).appendChild(img);	
					document.getElementById("principal-escolhe"+posicao).value="Trocar Imagem";
					document.getElementById("atv-principal"+posicao).style.display="block";
            };
            Img.readAsDataURL(input.files[i]);
   }
}
/* Ativa input file-- Titulo*/
	function muda(es){
		var checado=document.getElementById("ativar"+es).value;
		if(checado== "on"){
		document.getElementById("da"+es).innerHTML="Imagem escolhida com Padrão";
		}else{
			document.getElementById("da"+es).innerHTML="Imagem escolhida com Padrão";
		}
	}
	
/* Preview img escolhida LOGOTIPÓ*/
  function previewLogo(input) {
    for (i = 0; i < input.files.length; i++) {
            var Img = new FileReader();
            Img.onload = function (e) {
                    if (document.getElementById("imagem-logo").getElementsByTagName('img').length) {
                            document.getElementById("imagem-logo").innerHTML = '';
                    }
                    var img = document.createElement('img');
                    img.src = e.target.result;
					document.getElementById("imagem-logo").appendChild(img);
					document.getElementById("logo-escolhe").value="Trocar Imagem";
            };
            Img.readAsDataURL(input.files[i]);
   }
}
/* Muda cor do item do menu*/
$(function() {
	if($(window).scrollTop() <= $('#tabela-produtos').offset().top) {
		$("a[href*=#tabela-agendamento] button").addClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-agendamento').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").addClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	   $("a[href*=#tabela-produtos] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-produtos').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").addClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-titulo] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-titulo').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").addClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-galeria] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-galeria').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").addClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-principal] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-principal').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").addClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-texto] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-texto').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").addClass("local");
    } else {
	  $("a[href*=#informacoes-gerais] button").removeClass("local");
    }
	
	
  $(window).on("scroll", function() {
	if($(window).scrollTop() <= $('#tabela-produtos').offset().top) {
		$("a[href*=#tabela-agendamento] button").addClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-agendamento').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").addClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		 $("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	   $("a[href*=#tabela-produtos] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-produtos').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").addClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		 $("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-titulo] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-titulo').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").addClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		 $("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-galeria] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-galeria').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").addClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		 $("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-principal] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-principal').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").addClass("local");
		 $("a[href*=#informacoes-gerais] button").removeClass("local");
    } else {
	  $("a[href*=#tabela-texto] button").removeClass("local");
    }
	if($(window).scrollTop() > ($('#tabela-texto').offset().top+250)) {
		$("a[href*=#tabela-agendamento] button").removeClass("local");
		$("a[href*=#tabela-produtos] button").removeClass("local");
		$("a[href*=#tabela-titulo] button").removeClass("local");
		$("a[href*=#tabela-galeria] button").removeClass("local");
		$("a[href*=#tabela-principal] button").removeClass("local");
		$("a[href*=#tabela-texto] button").removeClass("local");
		$("a[href*=#informacoes-gerais] button").addClass("local");
    } else {
	  $("a[href*=#informacoes-gerais] button").removeClass("local");
    }
  });
});

/*----------------MANIPULA IMAGEM ---------*/

function ControlaImagem(idIMg,opcao){ 
		jQuery.ajax({
				type: "GET",
				url: "paginas/controle-imagens.php",
				data: "idimg="+idIMg+"&opcao="+opcao,
				success: function( data )
				{
				if(data==0){
					
				document.getElementById("descricao-imagem"+idIMg).innerHTML="";
				document.getElementById("descricao-imagem"+idIMg).innerHTML='<button title="Deixar imagem Ativa?" type="button" class="desativa-imagem" onclick="return ControlaImagem('+idIMg+',1)" >imagem inativa</button>';
				return false;
			
					}if(data==1){
					
				document.getElementById("descricao-imagem"+idIMg).innerHTML="";
				document.getElementById("descricao-imagem"+idIMg).innerHTML='<button title="Deixar imagem Inativa?" type="button" class="ativa-imagem" onclick="return ControlaImagem('+idIMg+',0)" >imagem Ativa</button>';
				return false;
				}
			}
		});
			return false;
	};
	

	
 /*-------- MÁSCARA DE MOEDA ---------*/
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares

    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return v;
}
/*----------------- MASCARA CEP------------*/
function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")         //Esse é tão fácil que não merece explicações
    return v
}

/*--------------TELEFONE-----------*/

function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}