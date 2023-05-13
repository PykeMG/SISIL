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

  $pdf=$_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="../../pdf/".$pdf;
  
  $size = 1024;

            
  if(isset($_FILES['pdf']) && $pdf_type == 'application/pdf'){
    if ($pdf_size < ($size * 2024)) {
        
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        $sql="INSERT INTO syllabus(curso, ciclo, nombre, NRC, fch_registro, id_usuario, administrador) values('$curso','$ciclo','$pdf', '$nrc', '$fch_registro', '$id_usuario', '$administrador')";
        $query=mysqli_query($conexion,$sql);

        if($query){       
          
          header('location: adminSyllabus.php');
          echo "<div class='success'> Se almacenó el archivo correctamente </div>";
        }else{
          echo  "<div class='alert alert-danger'>Se produjo un error al enviar el archivo</div>";
          header('location: adminSyllabus.php');    
      } 

    }else{
      echo  "<div class='alert alert-danger'>Tamaño del archivo no debe superar los 2MB</div>";
      header('location: adminSyllabus.php');
    }

    }else if(isset($_FILES['pdf']) && $pdf_type != 'application/pdf'){
      echo  "<div class='alert alert-danger'>Solo se permiten archivos .pdf </div>";
      header('location: adminSyllabus.php');
  }

}
if (!empty($_POST["btnregistrar"])){
  $nrc = $_POST['nrc'];  
  $curso = $_POST['curso'];
  $ciclo = $_POST['ciclo'];
  $id_usuario_up = $_SESSION['id'];
  $estado = 0;
  date_default_timezone_set("America/Lima");
  $fch_subida = date('Y-m-d H:i:s');

  $pdf=$_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="../../pdf_tmp/".$pdf;
  
  $size = 1024;

            
  if(isset($_FILES['pdf']) && $pdf_type == 'application/pdf'){
    if ($pdf_size < ($size * 2024)) {
        
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        $sql="INSERT INTO syllabus_tmp(curso, ciclo, nombre, NRC, fch_subida, estado, id_usuario_up) values('$curso','$ciclo','$pdf', '$nrc', '$fch_subida', '$estado', '$id_usuario_up')";
        $query=mysqli_query($conexion,$sql);

        if($query){       
          
          header('location: syllabus.php');
          echo "<div class='success'> Se almacenó el archivo correctamente </div>";
        }else{
          echo  "<div class='alert alert-danger'>Se produjo un error al enviar el archivo</div>";
          header('location: syllabus.php');    
      } 

    }else{
      echo  "<div class='alert alert-danger'>Tamaño del archivo no debe superar los 2MB</div>";
      header('location: syllabus.php');
    }

    }else if(isset($_FILES['pdf']) && $pdf_type != 'application/pdf'){
      echo  "<div class='alert alert-danger'>Solo se permiten archivos .pdf </div>";
      header('location: syllabus.php');
  }

}


if (isset($_POST['upload_syllabus'])) {
  $id = $_GET['id'];
  $curso= $_POST['curso'];
  $ciclo = $_POST['ciclo'];
  $nrc = $_POST['nrc'];
  $id_usuario = $_SESSION['id'];
  $nombres = $_SESSION['nombres'];
  $apellidos = $_SESSION['apellidos'];
  $administrador = $nombres. " ". $apellidos;
  date_default_timezone_set("America/Lima");
  $fch_registro = date('Y-m-d H:i:s');

  $pdf=$_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="../../pdf/".$pdf;
  
  $size = 1024;

  if(isset($_FILES['pdf']) && $pdf_type == 'application/pdf'){
    if ($pdf_size < ($size * 2024)) {
        
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        $sql="INSERT INTO syllabus(curso, ciclo, nombre, NRC, fch_registro, id_usuario, administrador) values('$curso','$ciclo','$pdf', '$nrc', '$fch_registro', '$id_usuario', '$administrador')";
        $query=mysqli_query($conexion,$sql);

        if($query){       
            $_SESSION['message'] = 'Actualizado correctamente';
            $_SESSION['message_type'] = 'success';

            $sql_2="UPDATE syllabus_tmp SET id_usuario = '$id_usuario', administrador = '$administrador', estado = 1,fch_actualizacion = '$fch_registro' WHERE id_syllabus = $id";
            $query=mysqli_query($conexion,$sql_2);
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
