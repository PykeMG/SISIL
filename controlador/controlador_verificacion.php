<?php  
session_start();
if (!empty($_POST["btningresar"])){
    if (!empty($_POST["code"])){
        $code=$_POST["code"];
        $check=$conexion->query(" SELECT * FROM usuario WHERE code= '$code'");
        if ($datos = $check->fetch_object()){
            $code_val = $datos->code;
            $code = 0;
            $status = 'verificado';
            $sql=$conexion->query(" UPDATE usuario SET code = $code, status = '$status' WHERE code = $code_val");
            echo "<div class='success'>Cuenta verificada correctamente, redireccionando...</div>";
            ?>
                  <script>
                  setTimeout(() => {
                    window.history.replaceState(null, null, window.location.href= '../../login.php'); 
                  }, 3000);
                  </script>   
              <?php 
            exit();
        } else {
            echo "<div class='error'>Codigo incorrecto</div>";
        }
    } else {
        echo "<div class='error'>Los campos están vacios</div>";

    }
}
?>