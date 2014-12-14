<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="5;URL=index.html">
<style>
body {margin: 0 auto; background-color: #B5B5B5;}
#msg {width: 15%; margin: 5% auto; background-color: #CFCFCF; border-radius: 8px; box-shadow: 0px 0px 20px 10px white; text-align: center; height: 5%; padding: 5%}
</style>
</head>
<body>
<div id="msg">
<?php
if ((strlen($_POST["name"]) >0) && (strlen($_POST["email"]) >0)){
	require("phpmailer/class.phpmailer.php"); // Chama o arquivo da classe

	$mail = new PHPMailer(); // Cria a instância
	$mail->SetLanguage("br"); // Define o Idioma
	$mail->CharSet = "utf-8"; // Define a Codificação
	$mail->IsSMTP(); // Define que será enviado por SMTP
	$mail->Host = "mx1.hostinger.com.br"; // Servidor SMTP
	$mail->Port = "2525";
	$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	$mail->Username = "contato@etrevisan.w.pw"; // Usuário ou E-mail para autenticação no SMTP
	$mail->Password = "Kalebe01"; // Senha do E-mail
	$mail->IsHTML(true); // Enviar como HTML
	$mail->From = $_POST["email"]; // Define o Remetente
	$mail->FromName = $_POST["name"]; // Nome do Remetente
	$mail->AddAddress("trevisan.elder@gmail.com", "MENSAGEM DO SITE"); // Email e Nome do destinatário

	
	// Estes campos a seguir são opcionais, caso não queira usar, remova-os
	//$mail->AddReplyTo("email@dominio.com.br","Information"); // E-mail de Resposta
	//$mail->AddCC("trevisan.elder@gmail.com";"Elder - Gmail"); // Envia Cópia
	//$mail->AddBCC("meuemail@dominio.com.br";"Nome"); // Envia Cópia Oculta

	/*
	// Se você quiser anexar aquivos, pode utilizar os comandos abaixo, caso não vá enviar anexos, remova os comandos
	$mail->AddAttachment("/var/tmp/file.tar.gz"); // Arquivo Anexo 1
	$mail->AddAttachment("/tmp/image.jpg","new.jpg"); // Arquivo Anexo 2
	*/

	// Configuração de Assuntos e Corpo do E-mail
	$mail->Subject = "Mensagem do Site"; // Define o Assunto
	$mail->Body = $_POST["message"]; // Corpo da mensagem em formato HTML

	/*
	// Este campo abaixo é Opcional
	$mail->AltBody = "Corpo da Mensagem somente Texto, sem formatações"; // Você pode mandar um e-mail somente texto, caso o leitor de e-mails da pessoa não leia no formato HTML
	*/


	// Fazemos o envio do email
	if(!$mail->Send()){
		print "Ocorreu um erro no envio da Mensagem.<br />";
		print "Erro: ".$mail->ErrorInfo;
	}else{
		print "Sua mensagem foi enviada com sucesso !!!";
	}
}else{
	print "A mensagem não será enviada, faltam dados a serem preenchidos!";
}
?>
</div>
</body>
</html>