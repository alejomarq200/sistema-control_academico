<?php
session_start();
error_reporting(0);


include("../Configuration/functions_php/functionsCRUDUser.php");
validarRolyAccesoAdmin($_SESSION['rol'], $_SESSION['estado'], 'Desarrollo/dashboard.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- DATATABLES -->
    <!--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <title>Consultar Reresentantes</title>
    <link rel="stylesheet" href="../css/modulos/moduloRepresentantes.css">
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();

        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <!-- Título principal con estilo mejorado -->
                <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Representantes</h1>
                    <p class="lead text-muted">Gestione y administre la información de los representantes</p>
                </div>
                <div class="container-table">
                    <table id="tablaxRepresentante" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Número de teléfono</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/functions_php/functionsCRUDRepresentantes.php");
                            include("../Layout/modalesRepresentantes/modalEditRepresentante.php");
                            include("../Layout/modalesRepresentantes/modalVerRepresentante.php");

                            $representantes = consultarRepresentantes($pdo); // Obtener los representantes

                            if (!empty($representantes)) {
                                foreach ($representantes as $representante) { // Iterar sobre cada usuario
                            ?>
                                    <tr>
                                        <td><?php echo ($representante['cedula']); ?></td>
                                        <td><?php echo ($representante['nombres']); ?>
                                        <td><?php echo ($representante['apellidos']); ?></td>
                                        <td><?php echo ($representante['correo']); ?>
                                        <td><?php echo ($representante['direccion']); ?></td>
                                        <td><?php echo ($representante['nro_telefono']); ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#formModalVer"
                                                data-id="<?php echo $representante['id']; ?>"
                                                data-cedula="<?php echo $representante['cedula']; ?>"
                                                data-nombres="<?php echo $representante['nombres']; ?>"
                                                data-apellidos="<?php echo $representante['apellidos']; ?>"
                                                data-fecha_nac="<?php echo $representante['fecha_nac']; ?>"
                                                data-correo="<?php echo $representante['correo'] ?>"
                                                data-direccion="<?php echo $representante['direccion']; ?>"
                                                data-nro_telefono="<?php echo $representante['nro_telefono']; ?>"
                                                data-grado_inst="<?php echo $representante['grado_inst']; ?>"
                                                data-profesion="<?php echo $representante['profesion']; ?>"
                                                data-trabaja="<?php echo $representante['trabaja']; ?>"
                                                data-nombre_empr="<?php echo $representante['nombre_empr'] ?>"
                                                data-telefono_empr="<?php echo $representante['telefono_empr'] ?>"
                                                data-direccion_empr="<?php echo $representante['direccion_empr'] ?>">
                                                <i class="bi bi-eye-fill"></i>
                                            </button>
                                            <a href="#formModal" class="btn btn-dark" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#formModal"
                                                data-id="<?php echo $representante['id']; ?>"
                                                data-cedula="<?php echo $representante['cedula']; ?>"
                                                data-nombres="<?php echo $representante['nombres']; ?>"
                                                data-apellidos="<?php echo $representante['apellidos']; ?>"
                                                data-fecha_nac="<?php echo $representante['fecha_nac']; ?>"
                                                data-correo="<?php echo $representante['correo'] ?>"
                                                data-direccion="<?php echo $representante['direccion']; ?>"
                                                data-nro_telefono="<?php echo $representante['nro_telefono']; ?>"
                                                data-grado_inst="<?php echo $representante['grado_inst']; ?>"
                                                data-profesion="<?php echo $representante['profesion']; ?>"
                                                data-trabaja="<?php echo $representante['trabaja']; ?>"
                                                data-nombre_empr="<?php echo $representante['nombre_empr'] ?>"
                                                data-telefono_empr="<?php echo $representante['telefono_empr'] ?>"
                                                data-direccion_empr="<?php echo $representante['direccion_empr'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron usuarios.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="../js/validarDeleteUsuarios.js"></script>

    <script>
        $(document).ready(function() {
            $('#tablaxRepresentante').DataTable({
                "dom": '<"top"<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>>rt<"bottom"<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>><"clear">',
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron registros coincidentes",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar para ordenar columna ascendente",
                        "sortDescending": ": activar para ordenar columna descendente"
                    }
                },

                "initComplete": function(settings, json) {
                    // Añadir icono de lupa al buscador
                    $('.dataTables_filter label').prepend('<i class="bi bi-search" style="margin-right: 8px;"></i>');

                    // Añadir icono al select de registros por página
                    $('.dataTables_length label').append('<i class="bi bi-list-ol" style="margin-left: 8px;"></i>');
                }
            });
        });
    </script>
</body>

</html>