<!DOCTYPE html>
<!--
/* SISTEMA : Syllabus ISIL
/* SUBSISTEMA : Syllabus ISIL
/* NOMBRE : index.html
/* DESCRIPCIÓN : Barra de menu principal.
/* AUTOR : Jose Sanchez Tenaud ' SCRUM Master'
/* FECHA CREACIÓN : 23-11-2022
/* ------------------------------------------------------------------------*/
/* FECHA          EMPLEADO                    MODIFICACIÓN                       	 
/* ------------------------------------------------------------------------*/
-->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="../../Styles/style.css">
  <title>Document</title>
</head>
<body>
  <header>
    <nav>
      <img src="../../img/LOGO.png" alt="" class="logo">
      <ul>
        <li><a href="adminHome.php">Home</a></li>
        <li><a href="adminSyllabus.php">Syllabus</a></li>
        <li><a href="adminProyectos.php">Proyectos</a></li>
        <li><a href="adminExamenes.php">Examenes</a></li>
        <li><a href="usuarios.php">Usuarios</a></li>
      </ul>
      <ul>
        <li><a href="adminPerfil.php">
                            <?=
                                $_SESSION["nombres"]."  ".$_SESSION["apellidos"]
                            ?>
        </a></li>
      </ul>
    </nav>
  </header>
</body>
</html>