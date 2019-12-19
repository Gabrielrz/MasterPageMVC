<?php
require("PHPMailer.php");
require("SMTP.php");
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->Username = 'csldaw2mailing@gmail.com';
$mail->Password = 'csldaw2mailing1234';
$mail->From = 'csldaw2mailing@gmail.com';
$mail->FromName = 'Mikel';
$mail->AddAddress('tudireccion@gmail.com');
$mail->AddReplyTo('csldaw2mailing@gmail.com', 'Information');

$mail->IsHTML(true);
$mail->Subject    = "Prueba de correo electrónico desde PHP";
$mail->AltBody    = "Para ver este mensaje, por favor, utilice un gestor de correo  compatible con HTML!";
$mail->Body    = "<p>Hola Holita PRUEBA :) </p>";

if(!$mail->Send())
{
  echo "Error al enviar el correo: " . $mail->ErrorInfo;
}
else
{
  echo "Correo enviado :)!";
}
?>
