<?php

    include 'conexion_be.php';    

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    $pass = hash('sha512', $pass); //encriptacion de contraseña

    $query = "INSERT INTO usuarios(nombre, correo, usuario, contrasena)
              VALUES('$nombre', '$correo', '$usuario', '$pass')";

    //verificar que no se repita correos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
            <script>
                alert("Correo ya registrado");
                window.location = "../login.php";
            </script>  
        ';
        exit();
    }

    //verificar que no se repita usuarios
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios where usuario = '$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
            <script>
                alert("Usuario ya registrado");
                window.location = "../login.php";
            </script>  
        ';
         exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("usuario registrado");
                window.location = "../login.php";
            </script>    
        ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, usuario no registrado");
            window.location = "../login.php";
        </script>    
    ';
    }

    mysqli_close($conexion);


?>