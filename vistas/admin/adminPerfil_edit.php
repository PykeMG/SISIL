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
<section>
    <?php
        require('../../layout/admin/side_bar_admin.php');
    ?>
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
            <div class="container py-2">
                <div class="layout-user bg-w">   
                    <?php 
                    include "../../modelo/conexion.php";
                    include "../../controlador/controlador_update_password.php";
                    ?>   
                    <div>
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nombres" value="<?=
                                        $_SESSION["nombres"]
                                        ?>">
                            <label class="form-label">Nombres</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="apellidos" value="<?=
                                        $_SESSION["apellidos"]
                                        ?>">
                            <label class="form-label">Apellidos</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="correo" value="<?=
                                        $_SESSION["correo"]
                                        ?>" disabled>
                            <label class="form-label">Correo Electronico</label>
                        </div>
                        <div class=" form-floating mb-3">
                            <textarea type="text" class="form-control" name="descripcion" minlength="10" maxlength="100"><?=
                                        $_SESSION["descripcion"]
                                        ?></textarea>
                            <label for="floatingInputI">Descripción</label>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="btncambiaperfil" 
                            class="btn btn-primary py-3 col-12"value="Actualizar " >
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