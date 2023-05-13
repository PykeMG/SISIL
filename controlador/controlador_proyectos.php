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

  $archivo=$_FILES['archivo']['name'];
  $archivo_type=$_FILES['archivo']['type'];
  $archivo_size=$_FILES['archivo']['size'];
  $archivo_tem_loc=$_FILES['archivo']['tmp_name'];
  $archivo_store="../../archivo/".$archivo;
  
  $size = 10024;

            
  if(isset($_FILES['archivo']) ){
    if ($archivo_size < ($size * 20024)) {
        
        move_uploaded_file($archivo_tem_loc,$archivo_store);
        $sql="INSERT INTO proyecto(curso, ciclo, nombre, NRC, fch_registro, id_usuario, administrador) values('$curso','$ciclo','$archivo', '$nrc', '$fch_registro', '$id_usuario', '$administrador')";
        $query=mysqli_query($conexion,$sql);

        if($query){       
          
          header('location: adminProyectos_upload.php');
          echo "<div class='success'> Se almacenó el archivo correctamente </div>";
        }else{
          echo  "<div class='alert alert-danger'>Se produjo un error al enviar el archivo</div>";
          header('location: adminProyectos_upload.php');    
      } 

    }else{
      echo  "<div class='alert alert-danger'>Tamaño del archivo no debe superar los 2MB</div>";
      header('location: adminProyectos_upload.php');
    }

    }else if(isset($_FILES['archivo'])){
      echo  "<div class='alert alert-danger'>Solo se permiten archivos .pdf </div>";
      header('location: adminProyectos_upload.php');
  }

}
?>
