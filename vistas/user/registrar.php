<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>SISIL | Registrarse</title>
</head>
<body>
    <div class="container login">
        <div class="left">
            <img src="../../img/Recurso 4.png" alt="" class="banner">
            <img src="../../img/Recurso 1.png" alt="" class="iphone">
        </div>
        <div class="rigth">
            <form action="#" class="login-form" method="post" action="">
                <h1>Registrarse</h1>
                <?php
                  include "../../modelo/conexion.php";
                  include "../../controlador/controlador_registro_usuario.php"
                ?>
                <div class="textb">
                  <input type="text" required name="nombres">
                  <div class="placeholder">Nombres</div>
                </div>

                <div class="textb">
                  <input type="text" required name="apellidos">
                  <div class="placeholder">Apellidos</div>
                </div>

                <div class="textb">
                  <input type="email" required name="correo">
                  <div class="placeholder">Correo electronico</div>
                </div>
            
                <div class="textb">
                  <input type="password" required name="password">
                  <div class="placeholder">Contraseña</div>
                  <div class="show-password fas fa-eye-slash"></div>
                </div>
            
                <div class="textb">
                  <input type="password" required name="cpassword">
                  <div class="placeholder">Confirmar contraseña</div>
                </div>

                <button class="btn fas fa-arrow-right" name="btnregistrar" value="registro" disabled></button>
                <a href="login.php">¿Ya estas registrado?</a>
              </form>
        </div>
    </div>

    <!-- script -->
    <script>
        var fields = document.querySelectorAll(".textb input");
        var btn = document.querySelector(".btn");
        function check(){
          if(fields[0].value != "" && fields[1].value != "" && fields[2].value != "" && fields[3].value != "" && fields[4].value != "")
            btn.disabled = false;
          else
            btn.disabled = true;  
        }
    
        fields[0].addEventListener("keyup",check);
        fields[1].addEventListener("keyup",check);
        fields[2].addEventListener("keyup",check);
        fields[3].addEventListener("keyup",check);
        fields[4].addEventListener("keyup",check);
        
        document.querySelector(".show-password").addEventListener("click",function(){
          if(this.classList[2] == "fa-eye-slash"){
            this.classList.remove("fa-eye-slash");
            this.classList.add("fa-eye");
            fields[3].type = "text";
            fields[4].type = "text";
          }else{
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
            fields[3].type = "password";
            fields[4].type = "password";
          }
        });

      </script>
</body>
</html>