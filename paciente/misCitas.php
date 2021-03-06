<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.html');
    exit;
} else {
    // Show users the page!
    $user = $_SESSION['user'];
    $role = $_SESSION['user_rol'];
    $email = $_SESSION['user_email'];
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

        <link rel="stylesheet" href="../css/styles.css"> <!-- LO PUEDES CAMBIAR A "../css/styles.css" -->

        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 


    </head>
    <body>

    <!-- chat html code -->

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
            <li><a href="recomendaciones.php">Recomendaciones</a></li>
            <li><a href="locales.php">Buscar locales de oxigeno</a></li>
            <li><a href="misCitas.php">Mis Citas</a></li>
            <li><a href="misRecetas.php">Mis Recetas</a></li>
            <li><a href="../php/cerrar_login_usuario.php">Cerrar sesion</a></li>
        </ul>
     </div>
    </nav>
    <!-- Imagen Header -->

    </header>
    <?php
        include_once '../php/config.php';
        //$objeto = new Conexion();
        //$conexion = $objeto->Conectar();

        $consulta = "SELECT * FROM files";
        $resultado = $connection->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!--  -->
    <br> <br>
    <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                <p></p>
                    <h1>Citas Registradas</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-10">

                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Cita</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Enlace meet</th>
                                <!-- <th scope="col">Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $dat) { ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['paciente'] ?> </td>
                                    <td><?php echo $dat['doctor'] ?></td>
                                    <td><?php echo $dat['fecha'] ?></td>
                                    <td><?php echo $dat['hora'] ?></td>
                                    <td><?php echo $dat['sintomas'] ?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    
    <br> <br>
    <!--Your website html code here -->
    </div>

    <!-- addfriend code -->
    <!-- chat html code -->

    <script src="js/mainx.js"></script> 

    <main>
        <div class="footer-text">
        <p>&copy; Vid19 - 2021 | Todos los derechos reservados.</p>
        </div>
    </main>

            <script src="../js/script.js"></script>
            <script src="../js/app.js"></script>
    </body>
</html>