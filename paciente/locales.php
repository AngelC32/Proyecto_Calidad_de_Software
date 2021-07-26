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
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1gF2RY8n5StvqMhBo-AfYFqUag4RvkwLv" width=100% height="740"></iframe>
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

        <!-- soporte con whatsapp -->
      <footer>
        <div id='whatsapp-chat' class='hide'>
        <div class='header-chat'>
        <div class='head-home'><h3>Vid-19</h3>
            <div class='info-avatar'><img src='https://sistemadecotizaciones.files.wordpress.com/2020/08/supportmale.png'/></div>
            
        </div>
        
        <div class='get-new'>
            <div id='get-label'>Soporte</div>
            <div id='get-nama'>Servicio al cliente</div>
            
        </div>
        </div>
        
        <div class='start-chat'>
        <div class='first-msg'><span>¡Hola! ¿Qué puedo hacer por ti?</span></div>
        <div class='blanter-msg'><textarea id='chat-input' placeholder='Escribe un mensaje' maxlength='120' row='1'></textarea>
        <a href='#' onclick="enviar_mensaje();" id='send-it'>Enviar</a></div></div>
        <div id='get-number'>+51929875234</div><a class='close-chat' onclick="cerrar_chat();" href='#'>×</a>
        </div>
        
        
        <a class='blantershow-chat' onclick="mostrar_chat();" href='#' title='Show Chat'><svg width="20" viewBox="0 0 24 24"><defs/><path fill="#eceff1" d="M20.5 3.4A12.1 12.1 0 0012 0 12 12 0 001.7 17.8L0 24l6.3-1.7c2.8 1.5 5 1.4 5.8 1.5a12 12 0 008.4-20.3z"/><path fill="#4caf50" d="M12 21.8c-3.1 0-5.2-1.6-5.4-1.6l-3.7 1 1-3.7-.3-.4A9.9 9.9 0 012.1 12a10 10 0 0117-7 9.9 9.9 0 01-7 16.9z"/><path fill="#fafafa" d="M17.5 14.3c-.3 0-1.8-.8-2-.9-.7-.2-.5 0-1.7 1.3-.1.2-.3.2-.6.1s-1.3-.5-2.4-1.5a9 9 0 01-1.7-2c-.3-.6.4-.6 1-1.7l-.1-.5-1-2.2c-.2-.6-.4-.5-.6-.5-.6 0-1 0-1.4.3-1.6 1.8-1.2 3.6.2 5.6 2.7 3.5 4.2 4.2 6.8 5 .7.3 1.4.3 1.9.2.6 0 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.3-.6-.4z"/></svg> 
        Chatea con nosotros</a>
        
        <style>
        a:link,
        a:visited {
            color: #444;
            text-decoration: none;
            transition: all 0.4s ease-in-out;
        }
        
        
        /* CSS Whatsapp Chat */
        #whatsapp-chat {
            position: fixed;
            background: #fff;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
            bottom: 90px;
            right: 30px;
            overflow: hidden;
            z-index: 99;
            animation-name: showchat;
            animation-duration: 1s;
            transform: scale(1);
        }
        
        a.blantershow-chat {
            /*   background: #009688; */
            background: #fff;
            color: #404040;
            position: fixed;
            display: flex;
            font-weight: 400;
            justify-content: space-between;
            z-index: 98;
            bottom: 25px;
            right: 30px;
            font-size: 15px;
            padding: 10px 20px;
            border-radius: 30px;
            box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);
        }
        
        a.blantershow-chat svg {
            transform: scale(1.2);
            margin: 0 10px 0 0;
        }
        
        .header-chat {
            background: #095e54;
            color: #fff;
            padding: 20px;
        }
        .header-chat h3 {
            margin: 0 0 10px;
        }
        .header-chat p {
            font-size: 14px;
            line-height: 1.7;
            margin: 0;
        }
        .info-avatar {
            position: relative;
        }
        .info-avatar img {
            border-radius: 100%;
            width: 50px;
            float: left;
            margin: 0 10px 0 0;
        }
        .info-avatar:before {
            content: "\f232";
            z-index: 1;
            font-family: "Font Awesome 5 Brands";
            background: #23ab23;
            color: #fff;
            padding: 4px 5px;
            border-radius: 100%;
            position: absolute;
            top: 30px;
            left: 30px;
        }
        
        .info-chat span {
            display: block;
        }
        #get-label,
        span.chat-label {
            font-size: 12px;
            color: #888;
        }
        #get-nama,
        span.chat-nama {
            margin: 5px 0 0;
            font-size: 15px;
            font-weight: 700;
            color: #222;
        }
        #get-label,
        #get-nama {
            color: #fff;
        }
        span.my-number {
            display: none;
        }
        .blanter-msg {
            color: #444;
            padding: 20px;
            font-size: 12.5px;
            text-align: center;
            border-top: 1px solid #ddd;
        }
        textarea#chat-input {
            border: none;
            font-family: "Arial", sans-serif;
            width: 100%;
            height: 20px;
            outline: none;
            resize: none;
        }
        a#send-it {
            color: #555;
            width: 40px;
            margin: -5px 0 0 5px;
            font-weight: 700;
            padding: 8px;
            background: #eee;
            border-radius: 10px;
        }
        .first-msg {
            background: #f5f5f5;
            padding: 30px;
            text-align: center;
        }
        .first-msg span {
            background: #e2e2e2;
            color: #222;
            font-size: 14.2px;
            line-height: 1.7;
            border-radius: 10px;
            padding: 15px 20px;
            display: inline-block;
        }
        .start-chat .blanter-msg {
            display: flex;
        }
        #get-number {
            display: none;
        }
        a.close-chat {
            position: absolute;
            top: 5px;
            right: 15px;
            color: #fff;
            font-size: 30px;
        }
        @keyframes showhide {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
        }
        @keyframes showchat {
            from {
                transform: scale(0);
                opacity: 0;
            }
        }
        @media screen and (max-width: 480px) {
            #whatsapp-chat {
                width: auto;
                left: 5%;
                right: 5%;
                font-size: 80%;
            }
        }
        .hide {
            display: none;
            animation-name: showhide;
            animation-duration: 1.5s;
            transform: scale(1);
            opacity: 1;
        }
        .show {
            display: block;
            animation-name: showhide;
            animation-duration: 1.5s;
            transform: scale(1);
            opacity: 1;
        }
        
        
        </style>
        
        <script>
        
        function enviar_mensaje(){
        var a = document.getElementById("chat-input");
            if ("" != a.value) {
                var b = document.getElementById("get-number").innerHTML,c = document.getElementById("chat-input").value, d = "https://web.whatsapp.com/send", e = b,  f = "&text=" + c;
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) var d = "whatsapp://send";  var g = d + "?phone=" + e + f;  window.open(g, "_blank");
            }
        }
        
        const whatsapp_chat =document.getElementById("whatsapp-chat");
        
        function cerrar_chat(){
            whatsapp_chat.classList.add("hide");
            whatsapp_chat.classList.remove("show");
            
        }
        
        function mostrar_chat(){
            whatsapp_chat.classList.add("show");
            whatsapp_chat.classList.remove("hide");
        }
        </script>
    </footer>

            <script src="js/script.js"></script>
            <script src="js/app.js"></script>
    </body>
</html>