<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo'
        <script>
            alert("Usuario no existe, verifique los datos");
            window.location = "../login.php";
        </script>  
    ';
    exit();
    } else {
        if (password_verify($password, $result['pass'])){    //verifica en la base de datos
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user'] = $result['username'];
            $_SESSION['user_rol'] = $result['role'];           //tipo de usuario

            header("location: ../package/index.php");
            exit();
            //echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            //echo '<p class="error">Username password combination is wrong!</p>';
            echo'
            <script>
                alert("verifique los datos");
                window.location = "../login.php";
            </script>  
            ';
            exit();
        }
    }
}
 
?>