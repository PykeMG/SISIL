<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISIL | Home</title>
    
</head>
<body>
    <?php
        session_start();
        if (empty($_SESSION["nombres"]) and empty($_SESSION["apellidos"])) {
            header('location: ../../login.php');
        }
    ?>

    <?php
        require('../../layout/usuario/side_bar.php');
    ?>
    <section>
    <div class="menu">
      <li class="tooltip_content">
        <a href="../../controlador/controlador_cerrar_sesion.php"><span class="material-symbols-outlined">
          logout
          </span></a>
          <span class="tooltip">Cerrar Sesión</span>
      </li>
    </div>
    <div class="container_sisil">
            
    <div class="home">
            <div class="py-5">
                <h2>Bienvenidos</h2>  
            </div>
            <div class="banner">
              <img src="../../img/banner.jpg" alt="" class="banner_img">
            </div>
            <div class="title_home">
                <h2>Explora nuestras categorias pensadas para ti</h2>  
            </div>
            <div class="icons">
              <div class="row_icons">
                <a href=""><span class="material-symbols-outlined">
                  description
                  </span>
                <p>Syllabus</p>
                </a>
                <a href="">
                <span class="material-symbols-outlined">
                    picture_as_pdf
                    </span>
                    <p>Examenes</p>
                </a>
                <a href="">
                <span class="material-symbols-outlined">
                  folder_zip
                  </span>
                  <p>Proyectos</p>
                </a>
              </div>
            </div>
    </div>
    </div>
</section>


    <script src="../../layout/js/script.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>