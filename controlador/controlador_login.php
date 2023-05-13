<?php  
session_start();
if (!empty($_POST["btningresar"])){
    if (!empty($_POST["correo"]) and !empty($_POST["password"])){
        $correo=$_POST["correo"];
        $password=md5($_POST["password"]);
        $sql=$conexion->query(" SELECT * FROM usuario WHERE correo= '$correo' AND password= '$password' ");
        if ($datos = $sql->fetch_object()){
            $fetch = mysqli_fetch_assoc($sql);
            $status = $datos->status;
            $rol = $datos->id_rol;
            if($status == 'verificado'){
                $_SESSION["id"]=$datos->id;
                $_SESSION["nombres"]=$datos->nombres;
                $_SESSION["apellidos"]=$datos->apellidos;
                $_SESSION["correo"]=$datos->correo;
                $_SESSION["password"]=$datos->password;
                $_SESSION["id_rol"]=$datos->id_rol;
                $_SESSION["id_rol_nom"] = $_SESSION["id_rol"];
                switch ($_SESSION["id_rol_nom"]) {
                    case 1:
                        $_SESSION["id_rol_nom"] = 'Administrador';
                        break;
                    
                    case 2:
                        $_SESSION["id_rol_nom"] = 'Usuario';
                        break;
                }
                $_SESSION["fch_registro"]=$datos->fch_registro;
                $_SESSION["descripcion"]=$datos->descripcion;
                if (!empty($_SESSION["descripcion"])) {
                    $_SESSION["descripcion"]=$datos->descripcion;
                }else{
                    $_SESSION["descripcion"] = "Nada que mostrar aqui";
                }
                $fch_entero = strtotime($_SESSION["fch_registro"]);
                $anio = date("Y", $fch_entero);
                $mes = date("m", $fch_entero);
                $dia = date("d", $fch_entero);
                $_SESSION["anio"]=$anio;
                $_SESSION["mes"]=$mes;

                switch ($_SESSION["mes"]) {
                    case 1:
                        $_SESSION["mes"] = 'Enero';
                        break;
                    case 2:
                        $_SESSION["mes"] = 'Febrero';
                        break;
                    case 3:
                        $_SESSION["mes"] = 'Marzo';
                        break;
                    case 4:
                        $_SESSION["mes"] = 'Abril';
                        break;
                    case 5:
                        $_SESSION["mes"] = 'Mayo';
                        break;
                    case 6:
                        $_SESSION["mes"] = 'Junio';
                        break;
                    case 7:
                        $_SESSION["mes"] = 'Julio';
                        break;
                    case 8:
                        $_SESSION["mes"] = 'Agosto';
                        break;
                    case 9:
                        $_SESSION["mes"] = 'Setiembre';
                        break;
                    case 10:
                        $_SESSION["mes"] = 'Octubre';
                        break;
                    case 11:
                        $_SESSION["mes"] = 'Noviembre';
                        break;
                    case 12:
                        $_SESSION["mes"] = 'Diciembre';
                        break;
                }

                $_SESSION["dia"]=$dia;
                
                if($rol==1){
                    header('location: vistas/admin/adminPerfil.php');
                }
                    else if($rol==2){
                        header('location:  vistas/user/perfil.php');
                    }
              }else{
                if($status == 'baneado'){
                    echo "<div class='error'>Su cuenta ha sido suspendida por infringir las normas</div>";
                } else {
                    echo "<div class='error'>Cuenta no ha sido verificada</div>";
                header('location: vistas/user/verificacion.php');
                }               
              }

        } else {
            echo "<div class='error'>Usuario o Contraseña incorrectos</div>";
        }
    } else {
        echo "<div class='error'>Los campos están vacios</div>";

    }
}
?>