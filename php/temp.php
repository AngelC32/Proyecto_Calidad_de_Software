<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['PASSWORD'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user'] = $result['username'];
            $_SESSION['user_rol'] = $result['role'];           //tipo de usuario

            if($_SESSION['user_rol'] == "paciente")
                header("location: ../package/index.php");
            if($_SESSION['user_rol'] == "doctor")
                header("location: ../package/doctor.php");    
            if($_SESSION['user_rol'] == "admin")
                header("location: ../package/admin.php");
            echo '<p class="success">Congratulations, you are logged in!</p>';
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>