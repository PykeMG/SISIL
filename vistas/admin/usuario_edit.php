<?php
include("../../modelo/conexion.php");


if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuario WHERE id =$id";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $status = $row['status'];
    }
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
            <?php
                include "../../modelo/conexion.php";
                include "../../controlador/controlador_update_password.php";
            ?>
            <form action="?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">                       
                        <div class=" form-floating mb-3">
                            <input type="text" class="form-control" value="<?=
                                         $nombres
                                        ?>"  disabled>
                            <label for="floatingInputI">Nombres</label>
                        </div>
                    </div>    
                    <div class="row mb-3">
                    <div class=" form-floating mb-3">
                            <input type="text" class="form-control" value="<?=
                                         $apellidos
                                        ?>"  disabled>
                            <label for="floatingInputI">Nombres</label>
                        </div>
                    </div>  
                    <div class="row mb-3">
                        <div class="form-floating row_col col">
                            <select class="form-select" aria-label="<?php echo $status; ?>" name="status">
                            <option value="baneado">baneado</option>
                            <option value="verificado">verificado</option>
                          </select>
                        <label for="floatingSelect">Estado</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="submit" name="update_user" class="btn btn-primary py-3 btn-block col-12" value="Actualizar">
                    </div>
                    <div class="mb-3">
                        <a href="usuarios.php" class="btn btn-primary py-3 col-12">Cancelar</a>

                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </main>
    </div>
