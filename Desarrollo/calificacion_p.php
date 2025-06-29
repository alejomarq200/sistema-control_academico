<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .contenedor-calificaciones {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .back {
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.15s ease-in-out;
        }

        .back:hover {
            background-color: #218838;
            color: white;
        }

        .custom-table-Calificacion {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #dee2e6;
        }

        .custom-table-Calificacion thead {
            background-color: rgb(37, 64, 90);
            color: #fff;
        }

        .custom-table-Calificacion th,
        .custom-table-Calificacion td {
            padding: 2rem;
            vertical-align: middle;
            border-color: #dee2e6;
        }

        .custom-table-Calificacion tbody tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .custom-table-Calificacion tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }
    </style>
    <title>Registrar Calificaciones</title>

</head>

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
            // Obtener el grado_id desde algún parámetro (GET, POST, etc.)
            $grado_id = $_GET['ref']; // Ejemplo con valor por defecto 1
            ?>
            <h1 class="my-3" id="titulo">Módulo de Calificaciones</h1>

            <div class="d-flex justify-content-between align-items-center">
                <!-- Filtro con lupa (a la derecha) -->
                <div class="filtro-container d-flex align-items-center">
                    <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                    <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                </div>
            </div>
            <div>
                <h5>Seleccione un profesor</h5>
                <div class="contenedor-calificaciones">
                    <form action="../Desarrollo/search_calificacion.php" method="POST">
                        <input type="hidden" name="profesorC" id="profesorC" value="<?php echo $grado_id; ?>">
                        <button type="submit" class="back">Volver</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="custom-table-Calificacion">
            <table class="table table-hover">
                <thead>
                    <tr style="height: 60px;">
                        <th>Cédula Profesor</th>
                        <th>Nombre Profesor</th>
                        <th>Materia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../Configuration/functions_php/functionsCRUDProfesor.php");

                    $profesoresMaterias = enlistar($pdo, $grado_id);

                    if (!empty($profesoresMaterias)) {
                        foreach ($profesoresMaterias as $pm) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($pm['cedula']); ?></td>
                                <td><?php echo htmlspecialchars($pm['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($pm['materia_nombre']); ?></td>
                                <td>
                                    <form action="calificacion_p_1.php" method="POST">
                                        <input type="hidden" name="grado" name="grado" value="<?php echo $grado_id; ?>">
                                        <input type="hidden" name="profesor" value="<?php echo $pm['cedula']; ?>">
                                        <input type="hidden" name="materia" value="<?php echo $pm['materia_nombre']; ?>">
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="bi bi-arrow-right-circle"></i> Registrar calificaciones
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron profesores con materias asignadas para este grado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </main>
        </main>
        <script src="../js/filtrarLupa.js"></script>

</html>