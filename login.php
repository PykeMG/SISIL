<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>SISIL | Ingresar</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(window).on("load",function(){
            $(".loader-container").fadeOut(2000);
        });
    </script>
</head>
<body>
    <?php
      require('layout/usuario/loader.php');
    ?>
    <div class="container login">
        <div class="left">
            <img src="img/Recurso 4.png" alt="" class="banner">
            <img src="img/Recurso 1.png" alt="" class="iphone">
        </div>
        <div class="rigth">
            <form action="#" class="login-form" method="post" action="">
                <h1>Ingresar</h1>
                <?php 
                  include "modelo/conexion.php";
                  include "controlador/controlador_login.php";
                ?>
                <div class="textb">
                  <input type="email" required name="correo">
                  <div class="placeholder">Correo electronico</div>
                </div>
            
                <div class="textb">
                  <input type="password" required name="password">
                  <div class="placeholder">Contraseña</div>
                  <div class="show-password fas fa-eye-slash"></div>
                </div>
            
                <button type="submit" class="btn fas fa-arrow-right" name="btningresar" disabled value="ingresar"></button>
                <a href="vistas/user/recover_password.php">¿No te acuerdas tu contraseña?</a>
                <a href="vistas/user/registrar.php">Registrate</a>
              </form>
        </div>
    </div>

    <!-- script -->
    <script>
        var fields = document.querySelectorAll(".textb input");
        var btn = document.querySelector(".btn");
        function check(){
          if(fields[0].value != "" && fields[1].value != "")
            btn.disabled = false;
          else
            btn.disabled = true;  
        }
    
        fields[0].addEventListener("keyup",check);
        fields[1].addEventListener("keyup",check);
    
        document.querySelector(".show-password").addEventListener("click",function(){
          if(this.classList[2] == "fa-eye-slash"){
            this.classList.remove("fa-eye-slash");
            this.classList.add("fa-eye");
            fields[1].type = "text";
          }else{
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
            fields[1].type = "password";
          }
        });
      </script>
</body>
</html>