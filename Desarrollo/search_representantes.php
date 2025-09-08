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

                            $representantes = consultarRepresentantes($pdo); // Obtener los representantes

                            if (!empty($representantes)) {
                                foreach ($representantes as $representante) { // Iterar sobre cada usuario
                            ?>
                                    <tr>
                                        <td><?= htmlspecialchars($representante['cedula']); ?></td>
                                        <td><?= htmlspecialchars($representante['nombres']); ?>
                                        <td><?= htmlspecialchars($representante['apellidos']); ?></td>
                                        <td><?= htmlspecialchars($representante['correo']); ?>
                                        <td><?= htmlspecialchars($representante['direccion']); ?></td>
                                        <td><?= htmlspecialchars($representante['nro_telefono']); ?></td>
                                        <td>
                                            <a href="#formModal" class="btn btn-dark" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#formModal"
                                                data-id="<?= htmlspecialchars($representante['id']); ?>"
                                                data-cedula="<?= htmlspecialchars($representante['cedula']); ?>"
                                                data-nombres="<?= htmlspecialchars($representante['nombres']); ?>"
                                                data-apellidos="<?= htmlspecialchars($representante['apellidos']); ?>"
                                                data-fecha_nac="<?= htmlspecialchars($representante['fecha_nac']); ?>"
                                                data-correo="<?= htmlspecialchars($representante['correo']); ?>"
                                                data-direccion="<?= htmlspecialchars($representante['direccion']); ?>"
                                                data-nro_telefono="<?= htmlspecialchars($representante['nro_telefono']); ?>"
                                                data-grado_inst="<?= htmlspecialchars($representante['grado_inst']); ?>"
                                                data-profesion="<?= htmlspecialchars($representante['profesion']); ?>"
                                                data-trabaja="<?= htmlspecialchars($representante['trabaja']); ?>"
                                                data-nombre_empr="<?= htmlspecialchars($representante['nombre_empr']); ?>"
                                                data-telefono_empr="<?= htmlspecialchars($representante['telefono_empr']); ?>"
                                                data-direccion_empr="<?= htmlspecialchars($representante['direccion_empr']); ?>">
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
    <script src="../js/moduloRepresentantes.js"></script>
</body>

</html>