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
    <title>SISIL | Recuperar</title>
</head>
<body>
    <div class="container login">
        <div class="left">
            <img src="../../img/Recurso 4.png" alt="" class="banner">
            <img src="../../img/Recurso 1.png" alt="" class="iphone">
        </div>
        <div class="rigth">
            <form action="#" class="login-form" method="post" action="">
                <h1>Recupera tu cuenta</h1>
                <?php 
                  include "../../modelo/conexion.php";
                  include "../../controlador/controlador_update_password.php";
                ?>
                <div class="textb">
                  <input type="text" required name="code">
                  <div class="placeholder">Ingresar código de verificación</div>
                </div>

                <button class="btn fas fa-arrow-right" name="btnverificar" value="verificar codigo" disabled></button>
                <a href="../../login.php">Volver</a>
              </form>
        </div>
    </div>

    <!-- script -->
    <script>
      var fields = document.querySelectorAll(".textb input");
      var btn = document.querySelector(".btn");
      function check(){
        if(fields[0].value != "")
          btn.disabled = false;
        else
          btn.disabled = true;  
    }

    fields[0].addEventListener("keyup",check);

      </script>
</body>
</html>