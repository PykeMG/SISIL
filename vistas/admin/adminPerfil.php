<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <title>SISIL | Home</title>
    <script type="text/javascript">
        $(window).on("load",function(){
            $(".loader-container").fadeOut(2000);
        });
    </script>   
</head>
<body>
    <?php
        session_start();
        if (empty($_SESSION["nombres"]) and empty($_SESSION["apellidos"])) {
            header('location: ../../login.php');
        }
    ?>
    <?php
      require('../../layout/usuario/loader.php');
    ?>
    <?php
        require('../../layout/admin/side_bar_admin.php');
    ?>
<section>
    
    <div class="menu">
    <li class="tooltip_content">
        <a href="adminPerfil.php"><span class="material-symbols-outlined">
        account_circle
        </span></a>
          <span class="tooltip">Perfil</span>
      </li>
      <li class="tooltip_content">
        <a href="adminPerfil_edit.php"><span class="material-symbols-outlined">
        manage_accounts
        </span></a>
          <span class="tooltip">Editar Perfil</span>
      </li>
      <li class="tooltip_content">
        <a href="../../controlador/controlador_cerrar_sesion.php"><span class="material-symbols-outlined">
          logout
          </span></a>
          <span class="tooltip">Cerrar Sesión</span>
      </li>
    </div>
    <div class="container">           
    <div class="home">
                <div class="layout-user bg-w">
                    <div class="title">
                        <h2>Perfil de <?=$_SESSION["id_rol_nom"]?></h2>                     
                    </div>    
                    <?php 
                    include "../../modelo/conexion.php";
                    include "../../controlador/controlador_update_password.php";
                    ?>   
                    <div class="perfil">
                    <h1>Nombres y Apellidos</h1>
                        <h2><?= $_SESSION["nombres"]." ". $_SESSION["apellidos"]?></h2>
                    </div>
                    <div class="perfil">
                    <h1>Descripción</h1>
                        <h2><?= $_SESSION["descripcion"]?></h2>
                    </div>
                    <div class="perfil">
                    <h1>Correo electronico</h1>
                        <h2><?= $_SESSION["correo"]?></h2>
                    </div>
                    <div class="perfil">
                        <h2> Miembro desde el <?= 
                        $_SESSION["dia"]
                        ?> de <?= 
                        $_SESSION["mes"]
                        ?> del <?= 
                        $_SESSION["anio"]
                        ?></h2>
                    </div>
                </div><!--card-->  
                  
    </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>