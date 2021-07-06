<?php
    
    include 'config.php';
    session_start();

    if(isset($_SESSION['user'])){
        
        session_destroy();

        header("location: ../login.html");
        
    }else{
        //no existe la sesion
        header("location: ../login.html");
        
    }

?>