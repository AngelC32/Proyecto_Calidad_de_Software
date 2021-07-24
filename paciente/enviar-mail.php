<?php 
$nombres = $telefono = $email = $sintomas = $fecha = $departamento = $genero = $hora = NULL;

if (isset($_POST['name'])){
	
	$nombres=htmlentities($_POST['name']);
	$telefono=htmlentities($_POST['number']);
	$email=htmlentities($_POST['email']);
	$sintomas=htmlentities($_POST['symptoms']);
	$fecha=htmlentities($_POST['datepicker1']);
	$departamento=htmlentities($_POST['departament']);
	$genero=htmlentities($_POST['gender']);
	$hora=htmlentities($_POST['time']);

	/*SIGUE RECOLECTANDO DATOS PARA FUNCION MAIL*/
	$message = '';
	$message .= '<p>Hola, ha sido registrada una nueva cita en el sitio web, según el detalle siguiente:</p> ';
	$message .= '<p>Paciente: '.$nombres.'</p> ';
	$message .= '<p>Teléfono: '.$telefono.'</p> ';
	$message .= '<p>Email: '.$email.'</p> ';
	$message .= '<p>Síntomas: '.$sintomas.'</p> ';
	$message .= '<p>Saturación de oxigeno: '.$departamento.'</p> ';
	$message .= '<p>Fecha de cita: '.$fecha.'</p> ';
	$message .= '<p>Hora de cita '.$hora.'</p> ';

	
	$headers = 'From' . " " . $email . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8";
	$email='maishet.ventura@gmail.com';//Ingresa tu dirección de correo
	
	$subject="Nueva cita médica en línea de: ".$nombres;			
	if (@mail($email,$subject,$message,$headers)){
		?>
		<div class='col-md-12' style="color:green">
			Bien hecho! la cita médica ha sido realiza correctamente.
		</div>
		<?php
	}	 else {
		?>
		<div class='col-md-12' style="color:red">
			Error no se pudo realizar la cita médica.
		</div>	
		<?php
	}
	/*FINALIZA RECOLECTANDO DATOS PARA FUNCION MAIL*/
	

	?>

	<?php
}

?>
