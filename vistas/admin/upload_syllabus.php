<?php
include("../../modelo/conexion.php");
$curso = '';
$ciclo= '';
$pdfs= '';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM syllabus_tmp WHERE id_syllabus =$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $curso = $row['curso'];
            $ciclo = $row['ciclo'];
            $nrc = $row['NRC'];
            $nombre = $row['nombre'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../Styles/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
            header('location: login.php');
        }
    ?>

    <?php
        require('../../layout/admin/side_bar_admin.php');
        ?>

    <div class="m-80">
    <main class="container py-5">
        <div class="container p-4">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <div class="card card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <?php 
                    include "../../modelo/conexion.php";
                    include "../../controlador/controlador_syllabus.php";
                    ?> 

                    <div class="mb-3">
                        <h2>Subir Syllabus</h2>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                                <input type="text" name="curso" id="curso" class="form-control" value="<?=
                                        $curso
                                        ?>">
                                <label class="form-label">Curso</label>
                        </div>
                    </div>  <!--Curso-->  
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                                <input type="text" name="nrc" id="curso" class="form-control" value="<?=
                                        $nrc
                                        ?>">
                                <label class="form-label">NRC</label>
                        </div>
                    </div>  <!--nrc--> 
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                                <input type="text" name="ciclo" id="curso" class="form-control" value="<?=
                                        $ciclo
                                        ?>">
                                <label class="form-label">Ciclo</label>
                        </div>
                    </div>  <!--ciclo--> 
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                                <input type="text" name="nombre" id="curso" class="form-control" value="<?=
                                        $nombre
                                        ?>">
                                <label class="form-label">Nombre</label>
                        </div>
                    </div>  <!--nombre--> 
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Peso máximo 2MB</label>
                        <input class="form-control" type="file" id="pdf" name="pdf"  value="<?php echo $pdfs; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" name="upload_syllabus" class="btn btn-primary py-3 btn-block col-12" value="Subir a BD Principal">
                    </div>
                    <div class="mb-3">
                        <a href="syllabus_tmp.php" class="btn btn-primary py-3 col-12"  >Cancelar</a>

                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </main>
    </div>
