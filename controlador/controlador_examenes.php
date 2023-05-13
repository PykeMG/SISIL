<?php
$error = array();
if (!empty($_POST["save_task"])){
  $nrc = $_POST['nrc'];  
  $curso = $_POST['curso'];
  $ciclo = $_POST['ciclo'];
  $id_usuario = $_SESSION['id'];
  $nombres = $_SESSION['nombres'];
  $apellidos = $_SESSION['apellidos'];
  $administrador = $nombres. " ". $apellidos;
  date_default_timezone_set("America/Lima");
  $fch_registro = date('Y-m-d H:i:s');

  $examenes=$_FILES['examenes']['name'];
  $examenes_type=$_FILES['examenes']['type'];
  $examenes_size=$_FILES['examenes']['size'];
  $examenes_tem_loc=$_FILES['examenes']['tmp_name'];
  $examenes_store="../../examenes/".$examenes;
  
  $size = 1024;

            
  if(isset($_FILES['examenes']) && $examenes_type == 'application/pdf'){
    if ($examenes_size < ($size * 2024)) {
        
        move_uploaded_file($examenes_tem_loc,$examenes_store);
        $sql="INSERT INTO examenes(curso, ciclo, nombre, NRC, fch_registro, id_usuario, administrador) values('$curso','$ciclo','$examenes', '$nrc', '$fch_registro', '$id_usuario', '$administrador')";
        $query=mysqli_query($conexion,$sql);

        if($query){       
          
          header('location: adminExamenes_upload.php');
          echo "<div class='success'> Se almacenó el archivo correctamente </div>";
        }else{
          echo  "<div class='alert alert-danger'>Se produjo un error al enviar el Examen</div>";
          header('location: adminExamenes_upload.php');    
      } 

    }else{
      echo  "<div class='alert alert-danger'>Tamaño del archivo no debe superar los 2MB</div>";
      header('location: adminExamenes_upload.php');
    }

    }else if(isset($_FILES['pdf']) && $pdf_type != 'application/pdf'){
      echo  "<div class='alert alert-danger'>Solo se permiten archivos .pdf </div>";
      header('location: adminExamenes_upload.php');
  }

}
?>
