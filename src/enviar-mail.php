<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
	

$mail = new PHPMailer();
$mail ->isSMTP();
$mail ->Host='smtp.gmail.com';
$mail ->Port=587;
$mail ->SMTPAuth=true;
$mail ->SMTPSecure='tls';
$mail ->Username='moi.982555147@gmail.com';
$mail ->Password='rhrblctlthtykfyz';

$mail ->setFrom($_POST['email'], $_POST['name']);
$mail ->addAddress('moi.982555147@gmail.com');
//$mail ->addAddress('dajogonbro@gmail.com');
$mail ->addReplyTo($_POST['email'], $_POST['name']);


$mail ->isHTML(true);
$mail ->Subject='Enviado por '.$_POST['name'];

$mail ->Body='<h1 align=center>Paciente: '.$_POST['name']. '<br>Telefono: '.$_POST['number']. '<br>Email: '.$_POST['email'].
'<br>Sintomas: '.$_POST['symptoms']. '<br>Saturación de oxigeno: '.$_POST['saturacion'].
'<br>Doctor(a) selecionado: '.$_POST['doctor'].'<br>Fecha de cita: '.$_POST['datepicker1'].'<br>Hora de cita: '.$_POST['time'].'</h1>';

if(!$mail ->send()){
	?>
	<div class='col-md-12' style="color:red">
		Error no se pudo realizar la cita médica.
	</div>	
	<?php
}else {
	?>
	<div class='col-md-12' style="color:green">
			Bien hecho! la cita médica ha sido realiza correctamente.
	</div>
	<?php
}
