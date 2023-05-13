<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
        <a href="proyectos.php"><span class="material-symbols-outlined">
        list
        </span></a>
        <span class="tooltip">Lista</span>
      </li>
      <li class="tooltip_content">
        <a href="proyectos_upload.php"><span class="material-symbols-outlined">
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
    </div><!--menu-->
    <div class="container p_sisil">
    <div class="home">
        <div class="center-table">
            <div class="form_up">
                <div class="bg-w">
                    <form  name="formulario" id="formulario" action="" method="post" enctype="multipart/form-data">
                        <?php
                        require('../../controlador/enviarSyllabus.php');
                        ?>
                        <div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?=
                                                        $_SESSION["nombres"]." ".$_SESSION["apellidos"]
                                                        ?>"  disabled>
                                    <label for="floatingInputI">Nombre Completos</label>
                                </div>
                        </div>
                        <div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="correo" name="correo" value="<?=
                                                    $_SESSION["correo"]
                                                    ?>"  disabled>
                                <label for="floatingInputI">Correo</label>
                            </div>
                        </div>  
                        <div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="NRC del curso" name="nrc" id="nrc">
                                                    <option selected>NRC del curso</option>
                                                    <?php   
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
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Nombre del curso" name="curso">
                                                    <option selected>Curso</option>
                                                    <?php             
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
                        <div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Ciclo del curso" name="ciclo">
                                                    <option selected>Ciclo</option>
                                                    <?php   
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
                        <div class=" form-floating mb-3">
                            <textarea type="text" class="form-control" name="descripcion" minlength="10" maxlength="100"></textarea>
                            <label for="floatingInputI">Descripción</label>
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Peso máximo 10MB</label>
                            <input class="form-control" type="file" name="my_file" id="formFileMultiple" multiple>
                            </div>

                        <div class="mb-3">
                                    <button type="submit" class="btn btn-primary py-3 col-12" name="btnregistrarproyecto" value="registro" name="registro"> Subir proyecto</button>
                            </div>
                    </form> 
                </div>
            </div>  
        </div>
    </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>               
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>