<?php
$error = array();
if (!empty($_POST["btnregistrar"])){
    if (!empty($_POST['nombres']) and !empty($_POST['apellidos']) and !empty($_POST['correo']) and !empty($_POST['password'])){
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $correo=$_POST['correo'];
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);
        $code = rand(999999, 111111);
        $status = "pendiente";
        date_default_timezone_set("America/Lima");
        $fch_registro = date('Y-m-d H:i:s');
        if($password !== $cpassword){
          $error['password'] = "1";
          echo "<div class='error'>Contraseñas no coinciden</div>";;
        }
        
        if (count($error) === 0){
          $sql=$conexion->query("SELECT COUNT(*) AS 'total' FROM usuario WHERE correo= '$correo' ");
        if ($sql->fetch_object()->total > 0){
            echo "<div class='error'>El correo ya se encuentra registrado!</div>";
        } else {
            
          $registro=$conexion->query("INSERT INTO usuario(nombres, apellidos, correo, password, code, status, fch_registro)VALUES('$nombres', '$apellidos', '$correo', '$password', '$code', '$status', '$fch_registro')");
          if ($registro==true){
            $subject = "Correo de Confirmación";
            $message = "Hola $nombres $apellidos, gracias por registrarte en SISIL, tu siguiente paso es ingresar el codigo de verificacion!
            tu código de verificación es: $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($correo, $subject, $message, $sender)){
              echo "<div class='success'>Se ha enviado un correo electronico de confirmación.</div>";
              
              ?>
                  <script>
                  setTimeout(() => {
                    window.history.replaceState(null, null, window.location.href= 'verificacion.php'); 
                  }, 3000);
                  </script>   
              <?php 
              exit();
            }
          }else{
            echo "<div class='error'>Error en el registro</div>";
          }

        }
        }

    }else{
        echo "<div class='error'>Los campos están vacios</div>";
    } ?>
    <script>
    setTimeout(() => {
       window.history.replaceState(null, null, window.location.pathname); 
    }, 5000);
    </script>   
<?php }
?>
