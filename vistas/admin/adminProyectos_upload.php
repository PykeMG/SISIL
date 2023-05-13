<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../Styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
        require('../../layout/admin/side_bar_admin.php');
        ?>
    <?php
        include('../../modelo/conexion.php');

        $tmp = array();
        $res = array();

        $sel = $conexion->query("SELECT * FROM proyecto");
        while ($row = $sel->fetch_assoc()) {
            $tmp = $row;
        array_push($res, $tmp);
        }
    ?>
  <section>
    <div class="menu">
    <li class="tooltip_content">
        <a href="adminProyectos.php"><span class="material-symbols-outlined">
        list
        </span></a>
        <span class="tooltip">Lista</span>
      </li>
      <li class="tooltip_content">
        <a href="adminProyectos_upload.php"><span class="material-symbols-outlined">
        add
        </span></a>
        <span class="tooltip">Haz tu aporte!</span>
      </li>
      <li class="tooltip_content">
        <a href="../../controlador/controlador_cerrar_sesion.php"><span class="material-symbols-outlined">
          logout
          </span></a>
          <span class="tooltip">Cerrar Sesión</span>
      </li>
    </div>
    <!-- Menu -->
    <div class="container p_sisil">
    <div class="home">
        <div class="center-table">
          <div>
            <div class="form_up">             
              <!-- ADD TASK FORM -->
              <div class="bg-w">
                <form action="" method="POST" enctype="multipart/form-data">
                  <?php
                    include "../../modelo/conexion.php";
                    include "../../controlador/controlador_proyectos.php"
                  ?>
                    <div class="row mb-3">
                        <div class="form-floating row_col col">
                            <select class="form-select" aria-label="NRC del curso" name="nrc" id="nrc">
                                                <option selected>NRC del curso</option>
                                                <?php
                                                    include("../../modelo/conexion.php");    
                                                    $nrc = "SELECT * FROM curso";
                                                    $resultado = mysqli_query($conexion,$nrc);
                                                    
                                                    while ($valores = mysqli_fetch_array($resultado)){
                                                        $nrc = $valores['nrc_curso'];

                                                        ?>
                                                        <option value="<?php echo $nrc; ?>"><?php echo $nrc; ?></option>
                                                        <?php
                                                    }
                                                ?>
                            </select>
                            <label for="floatingSelect">NRC</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-floating row_col col">
                                <select class="form-select" aria-label="Nombre del curso" name="curso">
                                    <option selected>Curso</option>
                                                    <?php
                                                        include("../../modelo/conexion.php");  
                                                        
                                                        $cursos = "SELECT nom_curso FROM curso";
                                                        $resultado = mysqli_query($conexion,$cursos);
                                                        
                                                        while ($valores = mysqli_fetch_array($resultado)){
                                                            $nom_curso = $valores['nom_curso'];

                                                            ?>
                                                            <option value="<?php echo $nom_curso; ?>"><?php echo $nom_curso; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                </select>
                                <label for="floatingSelect">Curso</label>
                        </div>
                    </div>    
                    <div class="row mb-3">
                        <div class="form-floating row_col col">
                            <select class="form-select" aria-label="Ciclo del curso" name="ciclo">
                                                <option selected>Ciclo</option>
                                                <?php
                                                    include("../../modelo/conexion.php"); 
                                                    $ciclo = "SELECT * FROM ciclo";
                                                    $resultado = mysqli_query($conexion,$ciclo);
                                                    
                                                    while ($valores = mysqli_fetch_array($resultado)){
                                                        $id = $valores['id_ciclo'];
                                                        $nombre = $valores['ciclo'];

                                                        ?>
                                                        <option value="<?php echo $nombre; ?>"><?php echo $nombre; ?></option>
                                                        <?php
                                                    }
                                                ?>
                            </select>
                        <label for="floatingSelect">Ciclo</label>
                        </div>
                    </div>  
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Peso máximo 10MB</label>
                        <input class="form-control" type="file" id="archivo" name="archivo" required>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="save_task" class="btn btn-primary py-3 col-12  btn-block" value="Almacenar">
                        </div>
                </form>
              </div><!--bg-white-->
            </div>
          </div>
        </div>
    

    </div>
    </div>
    
</section>

    <script src="../../layout/js/script.js"></script>	
    <script>
        var fields = document.querySelectorAll(".form-floating select");
      var btn = document.querySelector(".btn");
      function check(){
        if(fields[2].value != "")
          btn.disabled = false;
        else
          btn.disabled = true;  
    }

    fields[2].addEventListener("keyup",check);
    </script>

    <!-- JavaScript Bundle with Popper -->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>               
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</body>
</html>




