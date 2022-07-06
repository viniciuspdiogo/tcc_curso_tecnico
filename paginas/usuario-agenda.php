<?php
session_start();
include("conexao-geral.php");
	require_once 'class.smtp.php';
		require_once 'class.pop3.php';
		require_once 'class.phpmailer.php';
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('d/m/Y');
		
	if(isset($_POST['horario'])){
		$verifica=mysqli_query($con,"select * from agendamentos where codagd='".$_POST['horario']."';");
		$conta=mysqli_num_rows($verifica);
		if($conta>0){
			$_SESSION['mensagem']="Horário indisponível";
			header("Location:../Barbearia22.php#agenda");
		}else{
		
		$guarda=mysqli_query($con,"insert into agendamentos(codagd,idusr,dia,hora,diapedido) values('".$_POST['horario']."',".$_SESSION['id'].",'".$_POST['dia']."','".$_POST['hora']."','".$date."')");
		
		$usuario=mysqli_query($con,"select * from usuarios where idusr=".$_SESSION['id']."");
		$campo_user=mysqli_fetch_array($usuario);
		if($guarda>0){
		
		$mail = new PHPMailer();
		$mail->isSMTP();                           	           // Manda usar SMTP
		$mail->Host = 'smtp.gmail.com';  // Especifica os servidores 
		$mail->SMTPAuth = true;                               // Habilita autenticação para SMTP 
		$mail->Username = 'contato.barbearia22@gmail.com';                 // usuário SMTP
		$mail->Password = 'barbeariaacesso';                           // senha SMTP 
		$mail->SMTPSecure = 'tls';                            // Habilita encriptação TLS, SSL também é aceito
		$mail->Port = 587;  
		//$mail->SMTPDebug = 3;
		//$mail->Sender='contato.barbearia22@gmail.com';
		$mail->From = 'contato.barbearia22@gmail.com';                     //Remetente
		$mail->FromName = 'Barbearia 22';                           //Nome do remetente
		$mail->addAddress($_SESSION['email'],$_SESSION['nome']);  
		$mail->addAddress('contato.barbearia22@gmail.com','Barbearia 22');    //Destinatário com nome
		$mail->addReplyTo('contato.barbearia22@gmail.com',"Barbearia 22"); //Responder para...
		$mail->isHTML(true);                                  //Diz que a mensagem é em html
		$mail->CharSet = 'utf-8';
		$mail->Subject = "Informações Agendamento";               //Assumto
		$mail->Body    = "
		<h1>AGENDAMENTO REALIZADO</h1>
		<p> ".$_SESSION['nome'].". Olá, você realizou um agendamento na Barbearia 22 para o dia ".$_POST['dia']." às ".$_POST['hora']."hrs, para confirmar sua presença e discutir o serviço desejado envie uma mensagem via WhatsApp para o Lucas +55 (11) 94648-6025<div><p>Seus contatos registrados na Barbearia22 são:<br>Contato: ".$campo_user['numerousr']."  <br> E-mail: ".$campo_user['emailusr']."</p><p>Barbearia 22  &copy; 2016 - todos os direitos 		reservados.</p></div>";
		//Mensagem em html
		$mail->AltBody = "AGENDAMENTO REALIZADO COM SUCESSO
		você realizou um agendamento na Barbearia 22 para o dia ".$_POST['dia']." às ".$_POST['hora']."hrs, para confirmar sua presença e discutir o serviço desejado envie uma mensagem via WhatsApp para o Lucas +55 (11) 94648-6025...\nBarbearia 22  &copy; 2016 - todos os direitos reservados."; //Mensagem alternativa para leitores que não suportam html

		//Manda a mensagem
		if(!$mail->send()) {
		   	$_SESSION['mensagem']="Erro no envio de E-Mail, mas foi agendado com sucesso, Chame o Lucas via WhatsApp +55 (11) 94648-6025";
			header("Location:../Barbearia22.php#agenda");
		}else {
			$_SESSION['mensagem']="Agendamento realizado com sucesso, verifique seu email para mais informações ";
		    header("Location:../Barbearia22.php#agenda");}
			
			}else{
				$_SESSION['mensagem']="Não foi possível agendar, tente novamente!";
				header("Location:../Barbearia22.php#agenda");
				
			}
		}}else{
			$_SESSION['mensagem']="Por Favor, escolha um horário!";
			header("Location:../Barbearia22.php");
			
		}		
?>
