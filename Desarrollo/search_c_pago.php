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
    <title>Consultar Contacto de Pago</title>
    <link rel="stylesheet" href="../css/modulos/moduloCPago.css">
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
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Contacto de Pago</h1>
                    <p class="lead text-muted">Gestione y administre la información del contacto de pago</p>
                </div>
                <div class="container-table">
                    <table id="tablaxCPago" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Número de Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include("../Configuration/functions_php/functionsCRUDRepresentantes.php");
                            include("../Layout/modalesRepresentantes/modalEditContactoP.php");

                            $contactoPago = consultarContactoPago($pdo); // Obtener los usuarios

                            if (!empty($contactoPago)) {
                                foreach ($contactoPago as $cPago) { // Iterar sobre cada usuario

                            ?>
                                    <tr>
                                        <td><?php echo ($cPago['cedula']); ?></td>
                                        <td><?php echo ($cPago['nombres']); ?></td>
                                        <td><?php echo ($cPago['apellidos']); ?></td>
                                        <td><?php echo ($cPago['telefono']); ?></td>
                                        <td><?php echo ($cPago['correo']); ?></td>
                                        <td>
                                            <a href="#formModalContactoP" class="btn btn-dark" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#formModalContactoP"
                                                data-id="<?php echo $cPago['id']; ?>"
                                                data-cedula="<?php echo $cPago['cedula']; ?>"
                                                data-nombres="<?php echo $cPago['nombres']; ?>"
                                                data-apellidos="<?php echo $cPago['apellidos']; ?>"
                                                data-correo="<?php echo $cPago['correo'] ?>"
                                                data-direccion="<?php echo $cPago['direccion'] ?>"
                                                data-telefono="<?php echo $cPago['telefono'] ?>"
                                                data-grado_inst="<?php echo $cPago['grado_inst'] ?>"
                                                data-profesion="<?php echo $cPago['profesion'] ?>"
                                                data-trabaja="<?php echo $cPago['trabaja'] ?>"
                                                data-nombre_empresa="<?php echo $cPago['nombre_empresa'] ?>"
                                                data-telefono_empresa="<?php echo $cPago['telefono_empresa'] ?>"
                                                data-direccion_empresa="<?php echo $cPago['direccion_empresa'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger" style="font-size: 15px;">
                                                <i class="bi bi-download"></i>
                                            </button>
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
            $('#tablaxCPago').DataTable({
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