<?php
session_start();
	require_once 'class.smtp.php';
	require_once 'class.pop3.php';
	require_once 'class.phpmailer.php';
	include_once("conexao-geral.php");


if(isset($_POST['horario'])){

$Codigos=$_POST['horario'];

	foreach($Codigos as $codigo){
		$verifica=mysqli_query($con,"select * from agendamentos where codagd='".$codigo."';");
		$conta=mysqli_num_rows($verifica);
		
		if($conta>0){
			
		while($campo=mysqli_fetch_array($verifica)){
		$guarda=mysqli_query($con,"update agendamentos set idmst='".$_SESSION['idmaster']."' where codagd='".$codigo."'");
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
		$mail->Subject = "Cancelamento de agendamento";               //Assumto
		$mail->Body    = "
		<h1>AGENDAMENTO CANCELADO!!</h1>
		<p> Infelizmente o seu agendamento das ".$campo['hora']." do dia ".$campo['dia']." foi cancelado, para mais informações, contate o Lucas +55 (11) 94648-6025, ou então para realizar novo agendamento. Para realizar um novo agendamento online entre em Barbearia22.com<div><p>Barbearia 22  &copy; 2016 - todos os direitos reservados.</p></div>"; //Mensagem em html
		
		$mail->AltBody = "AGENDAMENTO CANCELADO!!
		 Infelizmente o seu agendamento das ".$campo['hora']." do dia ".$campo['dia']." foi cancelado, para mais informações, contate o Lucas +55 (11) 94648-6025, ou então para realizar novo agendamento. Para realizar um novo agendamento online entre em Barbearia22.com \n Barbearia 22  &copy; 2016 - todos os direitos reservados."; //Mensagem alternativa para leitores que não suportam html

		//Manda a mensagem
		if(!$mail->send()) {
		    $_SESSION['msg']="Horário cancelado, mas houve um erro para enviar E-Mailm para o usuário ".$mostra['nomeusr']."\n";
			header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
		}else{
				$_SESSION['msg']="Horários cancelados! Os usuários com serviços marcados já foram avisados por E-Mail...";
				header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
			 }
				}
			}
		}
			else{
		$agenda=mysqli_query($con,"insert into agendamentos(codagd,idmst) values('".$codigo."','".$_SESSION['idmaster']."')");
		if($agenda>0){
			$_SESSION['msg']="Os horários foram cancelados com sucesso";
			header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
		}else{
			$_SESSION['msg']="Houve algum erro, se o mesmo persistir, avise os Desenvolvedores";
			header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
			}
		
		}
		
  }

  
}else{
	$_SESSION['msg']="Por favor, escolha um horário";
	header("Location:../Barbearia22-adm-logado.php#tabela-agendamento");
}
?>