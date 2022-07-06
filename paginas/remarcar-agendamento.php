<?php
session_start();
include_once("conexao-geral.php");
	require_once 'class.smtp.php';
	require_once 'class.pop3.php';
	require_once 'class.phpmailer.php';


if(isset($_GET['horario'])){

$codigo=$_GET['horario'];
		$verifica=mysqli_query($con,"select * from agendamentos where codagd='".$codigo."';");
		$conta=mysqli_num_rows($verifica);
		
		if($conta>0){
			
		while($campo=mysqli_fetch_array($verifica)){
			$agenda=mysqli_query($con,"update agendamentos set idmst=4 where idagd=".$campo['idagd'].";");
		$busca_user=mysqli_query($con,"select * from usuarios where idusr='".$campo['idusr']."'");
		foreach($busca_user as $mostra){
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
		$mail->addAddress($mostra['emailusr'],$mostra['nomeusr']);     //Destinatário com nome
		$mail->addReplyTo('contato.barbearia22@gmail.com',"Barbearia 22"); //Responder para...
		$mail->isHTML(true);                                  //Diz que a mensagem é em html
		$mail->CharSet = 'utf-8';
		$mail->Subject = "Agendamento Remarcado";               //Assumto
		$mail->Body    = "
		<h1>AGENDAMENTO REMARCADO!!</h1>
		<p>".$mostra['nomeusr'].", o seu agendamento das ".$campo['hora']."hs do dia ".$campo['dia']." foi remarcado, para mais informações, contate o Lucas +55 (11) 94648-6025, ou então realize um novo agendamento via WhatsApp ou realize um agendamento online  em Barbearia22.com<div><p>Barbearia 22  &copy; 2016 - todos os direitos reservados.</p></div>"; //Mensagem em html
		
		$mail->AltBody = "AGENDAMENTO Remarcado!!
		O seu agendamento das ".$campo['hora']." do dia ".$campo['dia']." foi remarcado, para mais informações, contate o Lucas +55 (11) 94648-6025, ou então realize um novo agendamento via WhatsApp ou realize um agendamento online em Barbearia22.com\n\nBarbearia 22  &copy; 2016 - todos os direitos reservados."; //Mensagem alternativa para leitores que não suportam html

		//Manda a mensagem
		if(!$mail->send()) {
		    $_SESSION['msg']="Houve um erro para enviar E-Mail para o usuário".$mostra['nomeusr']."\n";
			header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
		}else{
				$_SESSION['msg']="Horário Remarcado! Os usuário com serviço marcado já foi avisado via E-Mail...";
				header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
			 }
				}
			}
		}
  

  
}else{
	$_SESSION['msg']="Por favor, escolha um horário";
	header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
}
?>