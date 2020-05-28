<?php
	include('phpmailer/PHPMailerAutoload.php');
	$mail = new PHPMailer();
	$mail -> isSMTP();
	$mail -> Host = 'smtp.gmail.com';
	$mail -> SMTPAuth = true;
	$mail -> Username = 'cursophpadr@gmail.com';
	$mail -> Password = '123456789';
	$mail -> SMTPSecure = 'tls';
	$mail -> Port = 587;
	$mail -> setFrom('cursophpadr@gmail.com', 'José');
	$mail -> isHTML(true);
	$mail -> CharSet = 'UTF-8';
	$mail -> Subject = 'Prueba de envío';
	$mail -> Body = 'Mensaje de <b>prueba</b>';
	$mail -> addAddress('maria@gmail.com', 'María');
	if (!$mail -> send()) {
	echo 'Error en el envío: ' . $mail -> ErrorInfo;
	} else {
	echo 'Correo enviado';
	}
?>