<?php
session_start();
include_once("conexao-geral.php");
require_once 'class.smtp.php';
require_once 'class.pop3.php';
require_once 'class.phpmailer.php';


$nome=$_POST['nomecad'];
$user=$_POST['logcad'];
$senha=$_POST['keycad'];
$email=$_POST['emailcad'];
$numero=$_POST['whats'];



if(isset($_POST['autoriza'])){
	
	$cadastra=mysqli_query($con,"insert into usuarios(nomeusr,loginusr,senhausr,emailusr,numerousr,liberausr) values('$nome','$user'
	,'$senha','$email','$numero',".$_POST['autoriza'].")");
	
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
		$mail->addAddress('contato.barbearia22@gmail.com','Barbearia 22');     //Destinatário com nome
		$mail->addReplyTo('contato.barbearia22@gmail.com',"Barbearia 22"); //Responder para...
		$mail->isHTML(true);                                  //Diz que a mensagem é em html
		$mail->CharSet = 'utf-8';
		$mail->Subject = "Novo Registro com direito de imagem livre";               //Assumto
		$mail->Body    = "
		<h1>REGISTRO COM DIREITOS DE IMAGEM LIBERADO!!</h1>
		<p>".$nome." reallizou um registro e liberou o direito de imagem<br> Seus dados são:<br>E-Mail: ".$email." ;<br> Contato: ".$numero."</span></p>Barbearia 22  &copy; 2016 - todos os direitos reservados.<p>"; //Mensagem em html
		//Manda a mensagem
		if($mail->send()){
		   
	
	
		if($cadastra){
		
		$logauser=mysqli_query($con,"select * from usuarios where loginusr='$user'");
		
		$dadosuser=mysqli_fetch_array($logauser);
			$_SESSION['id']=$dadosuser['idusr'];
			$_SESSION['nome']=$dadosuser['nomeusr'];
			$_SESSION['email']=$dadosuser['emailusr'];		
		mysqli_close($con);
		$_SESSION['mensagem']="Cadastro realzado com sucesso, Você liberou o direito de imagem!";
		header("Location:Barbearia22.php");
		}}else{
			if($cadastra){
		
		$logauser=mysqli_query($con,"select * from usuarios where loginusr='$user'");
		
		$dadosuser=mysqli_fetch_array($logauser);
			$_SESSION['id']=$dadosuser['idusr'];
			$_SESSION['nome']=$dadosuser['nomeusr'];
			$_SESSION['email']=$dadosuser['emailusr'];	
		$_SESSION['mensagem']="Cadastro realzado com sucesso, Você liberou o direito de imagem!";			
		mysqli_close($con);
		header("Location:Barbearia22.php");
		}
			
		}
	
}else{
	
	$cadastra=mysqli_query($con,"insert into usuarios(nomeusr,loginusr,senhausr,emailusr,numerousr,liberausr) values('$nome','$user'
	,'$senha','$email','$numero',0)");
	
	if($cadastra){
		
		$logauser=mysqli_query($con,"select * from usuarios where loginusr='$user'");
		
		$dadosuser=mysqli_fetch_array($logauser);
		
			$_SESSION['id']=$dadosuser['idusr'];
			$_SESSION['log']=$dadosuser['loginusr'];
			$_SESSION['name']=$dadosuser['nomeusr'];		
		mysqli_close($con);
		$_SESSION['mensagem']="Cadastro realzado com sucesso, Você não liberou o direito de imagem!";
		header("Location:Barbearia22.php");
	}
}

?>
