<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.html');
    exit;
} else {
    // Show users the page!
    $user = $_SESSION['user'];
    $role = $_SESSION['user_rol'];
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>vid 19 - <?php echo $role?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link rel="shortcut icon" type="image/x-icon" href="../img/pestana.png"> <!-- imagen q sale en la pestaña -->

        <link rel="stylesheet" href="../css/default.css"> <!-- LO PUEDES CAMBIAR A "../css/styles.css" -->

    </head>
    <body>
    <!-- Menu de Navegacion -->
    <header id="header">
    <nav class="menu">
     <div class="logo-box">
       <h1><a href="index.php">vid 19 - <?php echo $role?></a></h1>
       <span class="btn-menu"><i class="fas fa-bars"></i></span> <!-- Icono de barra de menu -->
     </div>
     
     <div class="list-container">
        <ul class="lists">
            <li><a class="activo"><?php echo $user?></a></li>
            <li><a href="#">Recomendaciones</a></li>
            <li><a href="#">Buscar locales de oxigeno</a></li>
            <li><a href="../php/cerrar_login_usuario.php">Cerrar sesion</a></li>
        </ul>
     </div>
    </nav>
    <!-- Imagen Header -->
    <div class="img-header">
      <div class="texto-info"> 
        <h2><b>Minsa</b></h2>
        <hr>
         <p>En la página web de esta institucion encontraras toda la informacion estadistica necesaria para esta al tanto del avance del covid 19
          en el Perú, para mayor información ingresa <a href = "https://covid19.minsa.gob.pe/sala_situacional.asp">aquí</a>
         </p>
        <h2><b>Gob.pe</b></h2>
        <hr>
         <p>
          En la pagina oficial del estado podras encontrar información general sobre el covid 19 y de distintas herramientas otorgadas
           por el estado, para mayor informacion ingresa <a href = "https://www.gob.pe/coronavirus">aquí</a>
         </p>
      </div>     
        
    </div>
    </header>

    <!--  -->
    <main>

    <!-- footer -->
        <div class="footer-text">
        <p>&copy; Vid19 - 2021 | Todos los derechos reservados.</p>
        </div>
    </main>

            <script src="js/script.js"></script>
            <script src="js/app.js"></script>
    </body>
</html>