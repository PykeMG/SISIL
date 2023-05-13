<?php
$error = array();
//recover_password.php
if (!empty($_POST["btnbuscar"])){
    if (!empty($_POST['correo'])){
        $correo=$_POST['correo'];
        $code = rand(999999, 111111);        
        if (count($error) === 0){
          $sql=$conexion->query("SELECT COUNT(*) AS 'total' FROM usuario WHERE correo= '$correo' ");
        if ($sql->fetch_object()->total > 0){         
          $actualizar=$conexion->query("UPDATE usuario SET code = '$code' WHERE correo='$correo' ");
          if($actualizar == true){
              $subject = "Correo de Recuperación de contraseña";
              $message = "Para recuperar tu contraseña, por favor introduce el siguiente codigo de verificación: $code";
              $sender = "From: syllabus.sisil@gmail.com";
              if(mail($correo, $subject, $message, $sender)){
                echo "<div class='success'>Se ha enviado un correo electronico de verificacion.</div>";
                ?>
                  <script>
                  setTimeout(() => {
                    window.history.replaceState(null, null, window.location.href= 'verificacion_password.php'); 
                  }, 5000);
                  </script>   
              <?php 
              }
          }
        } else {
          echo "<div class='error mb-3'>El correo no se encuentra registrado</div>";          
        }
        }        
    }else{
        echo "<div class='error mb-3'>Los campos están vacios</div>";
    } ?>  
<?php }
//verificacion_password.php
if (!empty($_POST["btnverificar"])){
  if (!empty($_POST["code"])){
      $code=$_POST["code"];
      $check=$conexion->query(" SELECT * FROM usuario WHERE code= '$code'");
      if ($datos = $check->fetch_object()){
          $code_val = $datos->code;
          $correo = $datos->correo;
          $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $shfl = str_shuffle($comb);
          $pwd = substr($shfl,0,16);
          $password=md5($pwd);
          $actualizar=$conexion->query("UPDATE usuario SET password = '$password' WHERE code='$code' ");
          if($actualizar == true){
              $subject = "Correo de Recuperación de contraseña";
              $message = "Su contraseña temporal es: $pwd";
              $sender = "From: syllabus.sisil@gmail.com";
              if(mail($correo, $subject, $message, $sender)){
                echo "<div class='success'>Se ha enviado un correo electronico con una nueva contraseña temporal.</div>";
                $code = 0;
                $sql=$conexion->query(" UPDATE usuario SET code = $code");
                ?>
                  <script>
                  setTimeout(() => {
                    window.history.replaceState(null, null, window.location.href= '../../login.php'); 
                  }, 5000);
                  </script>   
              <?php 
              }
          }
      } else {
          echo "<div class='error mb-3'>Codigo incorrecto</div>";
      }
  } else {
      echo "<div class='error mb-3'>Los campos están vacios</div>";
  }
}
//perfil.php
if (!empty($_POST["btncambiapass"])){
  if (!empty($_POST["password"]) and !empty($_POST["cpassword"])){
  $password= md5($_POST["password"]);
  $cpassword= md5($_POST["cpassword"]);
  $id= $_SESSION["id"];
  if($password !== $cpassword){
    $error['password'] = "1";
    echo "<div class='error mb-3'>Contraseñas no coinciden</div>";;
  } 
  if (count($error) === 0){
    $registro=$conexion->query("UPDATE usuario SET password = '$password' WHERE id='$id' ");

    if ($registro==true){
      echo "<div class='success mb-3'> Contraseña actualizada correctamente!</div>";
    }else{
      echo "<div class='error mb-3'>Error en el registro</div>";
    } 
  }
  } else {
      echo "<div class='error mb-3'>Los campos están vacios</div>";
  }
}
if (!empty($_POST["btncambiaperfil"])){
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $descripcion = $_POST["descripcion"];
  $id= $_SESSION["id"];

    $descripcion_update=$conexion->query("UPDATE usuario SET descripcion = '$descripcion', nombres = '$nombres', apellidos = '$apellidos' WHERE id='$id' ");

    if ($descripcion_update==true){
      echo "<div class='success mb-3'>Los cambios haran efecto en su siguiente inicio de sesión</div>";
      
    }else{
      echo "<div class='error mb-3'>Error en el registro</div>";
    } 

}

//update status
if (!empty($_POST["update_user"])){
  $id = $_GET['id'];
  $status= $_POST['status'];
  date_default_timezone_set("America/Lima");
  $fch_actualizacion = date('Y-m-d H:i:s');
  $nombres = $_SESSION['nombres'];
  $apellidos = $_SESSION['apellidos'];
  $administrador = $nombres. " ". $apellidos;

  $registro=$conexion->query("UPDATE usuario SET status = '$status', fch_actualizacion = '$fch_actualizacion', administrador = '$administrador' WHERE id='$id' ");

  header('Location: usuarios.php');
}
?>