<?php
session_start();
include_once("conexao-geral.php");
require_once 'class.smtp.php';
require_once 'class.pop3.php';
require_once 'class.phpmailer.php';

$recuperar=$_POST['recuperar'];


if($recuperar){
	
	$sql2 = mysqli_query($con,"select * from usuarios where emailusr='".$recuperar."';");

	$achar = mysqli_num_rows($sql2);

	if($achar> 0){
	
	$senharecu=mysqli_fetch_array($sql2);
	
	$mail = new PHPMailer();
		$mail->isSMTP();                           	           // Manda usar SMTP
		$mail->Host = 'smtp.gmail.com';  // Especifica os servidores 
		$mail->SMTPAuth = true;                               // Habilita autenticação para SMTP 
		$mail->Username = 'contato.barbearia22@gmail.com';                 // usuário SMTP
		$mail->Password = 'barbeariaacesso';                           // senha SMTP 
		$mail->SMTPSecure = 'tls';                            // Habilita encriptação TLS, SSL também é aceito
		$mail->Port = 587;  
		//$mail->SMTPDebug = 2;
		//$mail->Sender='contato.barbearia22@gmail.com';
		$mail->From = 'contato.barbearia22@gmail.com';                     //Remetente
		$mail->FromName = 'Barbearia 22';                           //Nome do remetente
		$mail->addAddress($senharecu['emailusr'],$senharecu['nomeusr']);     //Destinatário com nome
		$mail->addReplyTo('contato.barbearia22@gmail.com',"Barbearia 22"); //Responder para...
		$mail->isHTML(true);                                  //Diz que a mensagem é em html
		$mail->CharSet = 'utf-8';
		$mail->Subject = "Pedido de senha";               //Assumto
		$mail->Body    = "
		<h1>RECUPERAÇÃO DE SENHA!!</h1>
		<p>".$senharecu['nomeusr'].", conforme o seu pedido para recuperação da senha, estamos lhe enviando a sua senha. <br> Sua senha é: <span style='color:#f00;font-size:13pt;'>".$senharecu['senhausr']."</span></p>Barbearia 22  &copy; 2016 - todos os direitos reservados.<p>"; //Mensagem em html
		
		$mail->AltBody ="
		RECUPERAÇÃO DE SENHA!!\n
		".$senharecu['nomeusr'].", conforme o seu pedido para recuperação da senha, estamos lhe enviando o seu pedido \n Sua senha é:".$senharecu['senhausr']."\nBarbearia 22  &copy; 2016 - todos os direitos reservados."; //Mensagem alternativa para leitores que não suportam html

		//Manda a mensagem
		if(!$mail->send()) {
		    $_SESSION['senha']="<span style='color:#fff;font-size:9pt;'>Erro ao enviar E-mail, mas sua senha é:<span style='color:#f00;'>".$senharecu['senhausr']."</span></span>";
		}else{
				
				$_SESSION['senha']="<span style='color:#fff;font-size:9pt;'>Senha enviada com sucesso, verifique seu Email!</span>";
			 }
	
	
	
	}else{
		
	$_SESSION['senha']="<span style='color:#fff;font-size:10pt;'>Usuário não encontrado! Verifique seu Email!</span>";

	}
	
}if(empty($recuperar)){
	
	$_SESSION['senha']="<span style='color:#fff;font-size:10pt;'>Por favor, informar um E-Mail!</span>";

}
header('Location:../Barbearia22-recupera.php');

?>