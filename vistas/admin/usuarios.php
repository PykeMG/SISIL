<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../Styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
            header('location: ../../login.php');
        }
    ?>
    <?php
        require('../../layout/admin/side_bar_admin.php');
    ?>
    <?php
        include('../../modelo/conexion.php');
        $tmp = array();
        $res = array();
        $sel = $conexion->query("SELECT * FROM usuario");
        while ($row = $sel->fetch_assoc()) {
            $tmp = $row;
        array_push($res, $tmp);
        }
    ?>
  <section>
    <div class="menu">
    <li class="tooltip_content">
        <a href="adminSyllabus.php"><span class="material-symbols-outlined">
        list
        </span></a>
        <span class="tooltip">Lista</span>
      </li>
      <li class="tooltip_content">
        <a href="adminSyllabus_upload.php"><span class="material-symbols-outlined">
        add
        </span></a>
        <span class="tooltip">Haz tu aporte!</span>
      </li>
      <li class="tooltip_content">
        <a href="../../controlador/controlador_cerrar_sesion.php"><span class="material-symbols-outlined">
          logout
          </span></a>
          <span class="tooltip">Cerrar Sesión</span>
      </li>
    </div>
    <!-- Menu -->
    <div class="container">
      <div class="home position-relative">
        <div class="container center-table">
          <div>
            <div class="col-md-12 bg-w">
              <table id="myTable" class="table table-striped table-light table-bordered">
                <thead class="table-dark">
                      <tr>
                      <th scope="col" class="text-center">Nombres</th>
                      <th scope="col" class="text-center">Apellidos</th>
                      <th scope="col" class="text-center">Correo</th>
                      <th scope="col" class="text-center">Estado</th>
                      <th scope="col" class="text-center">Cargo</th>
                      <th scope="col" class="text-center">Acciones</th>
                      </tr>
                </thead>
                <tbody>
                      <?php foreach ($res as $val) { ?>
                          <tr>
                              <td class="text-center"><?php echo $val['nombres'] ?></td>
                              <td class="text-center"><?php echo $val['apellidos'] ?></td>
                              <td class="text-center"><?php echo $val['correo'] ?></td>
                              <td class="text-center"><?php 
                              echo $val['status'] ?></td>
                              <td class="text-center"><?php 
                              if($val['id_rol']==1){
                                $cargo = 'Administrador';
                              } else {
                                $cargo = 'Estudiante';
                              }
                              echo  $cargo ?></td>
                              <td class="text-center">
                                <a href="usuario_edit.php?id=<?php echo $val['id']?>" class="btn btn-secondary">
                                  <i class="fa-solid fa-pen"></i>
                                </a>
                              </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div> 
      </div><!-- </div> home -->
    </div>
</section>
    <script src="../../layout/js/script.js"></script>	
    <script>
        var fields = document.querySelectorAll(".form-floating select");
      var btn = document.querySelector(".btn");
      function check(){
        if(fields[2].value != "")
          btn.disabled = false;
        else
          btn.disabled = true;  
    }
    fields[2].addEventListener("keyup",check);
    </script>
    <script>
        function openModelPDF(nombre) {
        $('#modalPdf').modal('show');
        $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/sisil7/pdf/'; ?>'+nombre);
        }
    </script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>               
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
      $('#myTable').DataTable({
        responsive: true,
        autoWidth: false,

        "language":{
              "processing": "Procesando...",
              "lengthMenu": "Mostrar _MENU_ registros",
              "zeroRecords": "No se encontraron resultados",
              "emptyTable": "Ningún dato disponible en esta tabla",
              "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
              "infoFiltered": "(filtrado de un total de _MAX_ registros)",
              "search": "Buscar:",
              "infoThousands": ",",
              "loadingRecords": "Cargando...",
              "paginate": {
                  "first": "Primero",
                  "last": "Último",
                  "next": "Siguiente",
                  "previous": "Anterior"
              },
              "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
        }
      });
  } );
</script>
</body>
</html>




