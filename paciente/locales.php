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
            <li><a href="locales.php">Buscar locales de oxigeno</a></li>
            <li><a href="../php/cerrar_login_usuario.php">Cerrar sesion</a></li>
        </ul>
     </div>
    </nav>
    <!-- Imagen Header -->
    <div class="img-header">
      <div class="texto-info"> 
        <div class="map-oxigeno">  
         <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1gF2RY8n5StvqMhBo-AfYFqUag4RvkwLv" width="840" height="680"></iframe>
        </div>
          <h2><b>Gob.pe</b></h2>

        <hr>
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