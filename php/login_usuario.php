<?php

    session_start();    

    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' 
    and contrasena= '$contrasena' ");
    
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['correo'] = $correo;
        header("location: package/src/html/index.html");
        exit();
    }else{
        echo'
            <script>
                alert("Usuario no existe, verifique los datos");
                window.location = "../login.php";
            </script>  
        ';
        exit();
    }

    ?>