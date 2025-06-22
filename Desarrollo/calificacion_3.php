<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Consultar Calificaciones</title>
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
                <h1 class="my-3" id="titulo">Módulo de Calificaciones</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Filtro con lupa (a la derecha) -->
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                        <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                    </div>
                </div>
                <div class="custom-table">
                    <?php
                    include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                    $datos = obtenerCalificacionesAgrupadas($pdo);
                    $calificaciones = $datos['calificaciones'];
                    $maxCalifs = $datos['max_califs'];
                    ?>
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Año</th>
                                <th>Grado</th>
                                <th>Lapso</th>
                                <th>Profesor</th>
                                <th>Materia</th>
                                <th>Estudiante</th>
                                <!-- Columnas dinámicas para calificaciones -->
                                <?php for ($i = 1; $i <= $maxCalifs; $i++): ?>
                                    <th>C<?= $i ?></th>
                                <?php endfor; ?>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($calificaciones)): ?>
                                <?php foreach ($calificaciones as $calif): ?>
                                    <tr>
                                        <td><?= $calif['año_escolar'] ?></td>
                                        <td><?= $calif['id_grado'] ?></td>
                                        <td><?= $calif['lapso_academico'] ?></td>
                                        <td><?= $calif['id_profesor'] ?></td>
                                        <td><?= $calif['id_materia'] ?></td>
                                        <td><?= $calif['id_estudiante'] ?></td>

                                        <!-- Mostrar calificaciones -->
                                        <?php foreach ($calif['calificaciones'] as $nota): ?>
                                            <td><?= $nota ?></td>
                                        <?php endforeach; ?>

                                        <!-- Rellenar celdas vacías -->
                                        <?php for ($i = count($calif['calificaciones']); $i < $maxCalifs; $i++): ?>
                                            <td>-</td>
                                        <?php endfor; ?>

                                        <td><strong><?= $calif['total_calificacion'] ?></strong></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary"
                                                data-est="<?= $calif['id_estudiante'] ?>"
                                                data-mat="<?= $calif['id_materia'] ?>">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger"
                                                data-est="<?= $calif['id_estudiante'] ?>"
                                                data-mat="<?= $calif['id_materia'] ?>">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="<?= 6 + $maxCalifs + 2 ?>" class="text-center py-3">
                                        No hay calificaciones registradas
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                </main>
                <script src="../js/filtrarLupa.js"></script>
</body>
</div>
</main>

</html>