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
<section>
    <?php
        require('../../layout/usuario/side_bar.php');
    ?>
    <div class="menu">
    <li class="tooltip_content">
        <a href="perfil.php"><span class="material-symbols-outlined">
        account_circle
        </span></a>
          <span class="tooltip">Perfil</span>
      </li>
      <li class="tooltip_content">
        <a href="perfil_edit.php"><span class="material-symbols-outlined">
        manage_accounts
        </span></a>
          <span class="tooltip">Editar Perfil</span>
      </li>
      <li class="tooltip_content">
        <a href="upload_user.php"><span class="material-symbols-outlined">
            view_list
        </span></a>
          <span class="tooltip">Aportes</span>
      </li>
      <li class="tooltip_content">
        <a href="../../controlador/controlador_cerrar_sesion.php"><span class="material-symbols-outlined">
          logout
          </span></a>
          <span class="tooltip">Cerrar Sesión</span>
      </li>
    </div>
    <div class="container p_sisil">           
    <div class="home">
            <div class="container">
                <div class="layout-user_edit bg-w">   
                    <?php 
                    include "../../modelo/conexion.php";
                    include "../../controlador/controlador_update_password.php";
                    ?>   
                    <div>
                    <form action="" method="POST">
                        <div class="mb-3 title">
                            <h2>Editar perfil</h2>
                        </div>
                        <div class="txtb mb-3">
                            <input type="text" class="input" name="nombres" value="<?=
                                        $_SESSION["nombres"]
                                        ?>">
                            <div class="placeholder_a">Nombres</div>
                        </div>
                        <div class="txtb mb-3">
                            <input type="text" class="input" name="apellidos" value="<?=
                                        $_SESSION["apellidos"]
                                        ?>">
                            <div class="placeholder_a">Apellidos</div>
                        </div>
                        <div class="txtb mb-3">
                            <input type="text" class="input active" name="correo" value="<?=
                                        $_SESSION["correo"]
                                        ?>" disabled>
                            <label class="placeholder_a">Correo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control input_textarea" minlength="10" maxlength="100"><?=
                                        $_SESSION["descripcion"]
                                        ?></textarea>
                            <label class="floatingTextarea2">Descripcion</label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="btncambiaperfil" 
                            class="btn btn-primary py-3 col-12"value="Actualizar " >
                        </div>
                    </form>
                    <form action="" method="POST" class="mt-5">
                        <div class="mb-3 title">
                            <h2>Cambiar Contraseña</h2>
                        </div>
                        <div class="txtb mb-3">
                            <input type="password" class="input" name="password">
                            <div class="placeholder_a">Contraseña</div>
                        </div>
                        <div class="txtb mb-3">
                            <input type="password" class="input" name="cpassword">
                            <div class="placeholder_a">Repetir Contraseña</div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="btncambiapass" 
                            class="btn btn-primary py-3 col-12"value="Actualizar Contraseña" >
                        </div>
                    </form>
                    </div>
                </div><!--card-->    
            </div>
    </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>