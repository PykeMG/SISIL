<?php
include("../../modelo/conexion.php");
$curso = '';
$ciclo= '';
$pdfs= '';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM syllabus WHERE id_syllabus =$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $curso = $row['curso'];
            $ciclos = $row['ciclo'];
            $pdfs = $row['nombre'];
    }
}


if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $curso= $_POST['curso'];
  $ciclo = $_POST['ciclo'];

  $pdf=$_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="../../pdf/".$pdf;
  
  $size = 1024;

  if(isset($_FILES['pdf']) && $pdf_type == 'application/pdf'){
    if ($pdf_size < ($size * 2024)) {
        
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        $sql="UPDATE syllabus set curso = '$curso', ciclo = '$ciclo', nombre = '$pdf' WHERE id_syllabus=$id";
        $query=mysqli_query($conexion,$sql);

        if($query){       
            $_SESSION['message'] = 'Actualizado correctamente';
            $_SESSION['message_type'] = 'success';
            header('Location: adminSyllabus.php');
        }else{
            $_SESSION['message'] = 'Se produjo un error al actualizar el archivo';
            $_SESSION['message_type'] = 'danger';
            header('Location: adminSyllabus.php');
        } 

    }else{
        $_SESSION['message'] = 'Tamaño del archivo no debe superar los 2MB';
        $_SESSION['message_type'] = 'danger';
        header('Location: adminSyllabus.php');
    }

    }else if(isset($_FILES['pdf']) && $pdf_type != 'application/pdf'){
        $_SESSION['message'] = 'Solo se permiten archivos .pdf';
        $_SESSION['message_type'] = 'danger';
        header('Location: adminSyllabus.php');
        
    }

    header('Location: adminSyllabus.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../Styles/style.css">
    <link rel="stylesheet" href="../../Styles/style_bar.css">
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

    <?php
        include('../../modelo/conexion.php');
    ?>

    <div class="m-80">
    <main class="container py-5">
        <div class="container p-4">
        <div class="row">
            <div class="col-md-5 mx-auto">
            <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="form-floating row_col col">
                                <select class="form-select" aria-label="<?php echo $curso; ?>" name="curso">
                                                    <option selected><?php echo $curso; ?></option>
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
                            <select class="form-select" aria-label="<?php echo $ciclos; ?>" name="ciclo">
                                                <option selected><?php echo $ciclos; ?></option>
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
                        <label for="formFileMultiple" class="form-label">Peso máximo 2MB</label>
                        <input class="form-control" type="file" id="pdf" name="pdf"  value="<?php echo $pdfs; ?>">
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="update" class="btn btn-primary py-3 btn-block col-12" value="Actualizar">
                    </div>
                    <div class="mb-3">
                        <a href="adminSyllabus.php" class="btn btn-primary py-3 col-12"  >Cancelar</a>

                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </main>
    </div>
