<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Styles/style.css">
    <link rel="stylesheet" href="Styles/style_bar.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
         require('../../layout/usuario/side_bar.php');
    ?>

        
    <?php
        include('../../modelo/conexion.php');
        $id_usuario_up = $_SESSION["id"];
        $tmp = array();
        $res = array();
        // SELECT A.nombre, A.curso, A.ciclo, A.NRC, A.estado , B.nombres, B.apellidos from syllabus_tmp A inner join usuario B on A.id_usuario_up = B.id
        $sel = $conexion->query("SELECT * FROM syllabus_tmp A inner join usuario B on A.id_usuario_up = B.id WHERE B.id = '$id_usuario_up'");
        while ($row = $sel->fetch_assoc()) {
            $tmp = $row;
        array_push($res, $tmp);
        }
    ?>
    <section>
    <div class="menu">
    <li class="tooltip_content">
        <a href="perfil.php"><span class="material-symbols-outlined">
        account_circle
        </span></a>
          <span class="tooltip">Perfil</span>
      </li>
      <li class="tooltip_content">
        <a href="perfil_edit.php"><span class="material-symbols-outlined">
        manage_accounts
        </span></a>
          <span class="tooltip">Editar Perfil</span>
      </li>
      <li class="tooltip_content">
        <a href="upload_user.php"><span class="material-symbols-outlined">
            view_list
        </span></a>
          <span class="tooltip">Aportes</span>
      </li>
      <li class="tooltip_content">
        <a href="../../controlador/controlador_cerrar_sesion.php"><span class="material-symbols-outlined">
          logout
          </span></a>
          <span class="tooltip">Cerrar Sesión</span>
      </li>
    </div>
    <div class="container p_sisil">
    <div>
        <div class="home">
        <div class="container bg-w">
            <table id="syllabus" class="table table-striped table-light table-bordered">
                <thead class="table-dark">
                    <tr>
                    <th scope="col" class="text-center">NRC</th>
                    <th scope="col" class="text-center">Curso</th>
                    <th scope="col" class="text-center">Ciclo</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Ver</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($res as $val) { ?>
                        <tr>
                            <td class="text-center"><?php echo $val['NRC'] ?> </td>
                            <td class="text-center"><?php echo $val['curso'] ?></td>
                            <td class="text-center"><?php echo $val['ciclo'] ?></td>
                            <td class="text-center"><?php 
                                if ($val['estado'] == 0){
                                    $val['estado'] = "Pendiente";
                                } else {
                                    $val['estado'] = "Aceptado";
                                }
                            echo $val['estado'] ?></td>
                            <td class="text-center">
                                <button onclick="openModelPDF('<?php echo $val['nombre'] ?>')" class="btn btn-primary" type="button"><i class="fa-solid fa-eye"></i></button>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div><!--container-->
    
    
    <!--- Modal -->
    <div class="modal fade modal-xl" id="modalPdf" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="700px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    </div>
</section>


    <script>
            function openModelPDF(nombre) {
        $('#modalPdf').modal('show');
        $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/sisil7/pdf_tmp/'; ?>'+nombre);
    }
    </script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>               
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
      $('#syllabus').DataTable({
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
