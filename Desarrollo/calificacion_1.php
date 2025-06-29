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
    <title>Registrar Calificaciones</title>
    <style>
        /* Contenedor principal */
        .contenedor-calificaciones {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        /* Estilo para el input de número */
        .input-calificaciones {
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            width: 120px;
            transition: border-color 0.15s ease-in-out;
        }

        .input-calificaciones:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .input-anioEscolar {
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            width: 200px;
            transition: border-color 0.15s ease-in-out;
        }

        .input-anioEscolar:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Estilo para el botón */
        .btn-agregar {
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.15s ease-in-out;
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

        .btn-agregar:hover {
            background-color: #218838;
        }

        /* Estilo para el select de lapsos */
        .select-lapso {
            padding: 8px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            cursor: pointer;
            min-width: 150px;
        }

        .select-lapso:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Estilo para las opciones */
        .select-lapso option {
            padding: 8px;
        }

        /* Versión responsive para pantallas pequeñas */
        @media (max-width: 576px) {
            .contenedor-calificaciones {
                flex-direction: column;
                align-items: flex-start;
            }

            .input-calificaciones,
            .btn-agregar,
            .select-lapso {
                width: 100%;
            }
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
            include("../Configuration/functions_php/functionsCRUDProfesor.php");
            include("../Configuration/functions_php/functionsCRUDMaterias.php");
            include("../Layout/mensajes.php");
            include("../Configuration/Configuration.php");

            // Obtener el grado_id desde el formulario
            $grado_id = $_POST['gradoCalificacion'];

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
                <h5>Seleccione un estudiante</h5>
                <div class="contenedor-calificaciones">
                    <form action="../Desarrollo/calificacion.php" method="POST">
                        <input type="hidden" name="gradoCalificacion" id="gradoCalificacion"
                            value="<?php echo $grado_id; ?>">
                        <button type="submit" class="back">Volver</button>
                    </form>
                </div>
            </div>

            <div class="custom-table-Calificacion">
                <table class="table table-hover" id="tablaEstudiantes">
                    <thead>
                        <tr style="height: 60px;">
                            <th>Cédula Estudiante</th>
                            <th>Nombre Estudiante</th>
                            <th>Apellido Estudiante</th>
                            <th>Promedio</th>
                            <!-- Columnas dinámicas se agregarán aquí -->
                            <th class="acciones-col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    if ($grado_id) {
                        $estudiantes = estudiantexNota($pdo, $grado_id);

                        if (!empty($estudiantes)) {
                            foreach ($estudiantes as $estudiante) {
                                ?>
                                <tr data-estudiante-id="<?php echo $estudiante['id']; ?>">
                                    <td><?php echo htmlspecialchars($estudiante['cedula_est'] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($estudiante['nombres_est']); ?></td>
                                    <td><?php echo htmlspecialchars($estudiante['apellidos_est']); ?></td>
                                    <!-- COLUMNA PROMEDIO -->
                                    <td><?php echo isset($estudiante['promedio_calificacion']) ? number_format($estudiante['promedio_calificacion'], 2) : 'N/A'; ?></td>                <!-- Columnas dinámicas se agregarán aquí -->
                                    <td>
                                        <form action="calificacion_2.php" method="POST">
                                        <input type="hidden" name="idEstudiante" id="idEstudiante" value="<?php echo $estudiante['id']; ?>">
                                        <input type="hidden" name="gradoCalificacion" id="gradoCalificacion" value="<?php echo $grado_id;?>">                                                   
                                        <button type="submit" class="btn btn-success btn-guardar">
                                        Seleccionar <i class="bi bi-arrow-right-square"></i> 
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron estudiantes inscritos en este grado.</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No se ha seleccionado un grado válido.</td></tr>";
                    }
                ?>
                    </tbody>
                </table>
            </div>

            <!-- JavaScript para manejar las columnas dinámicas --> 
            <script src="../js/filtrarLupa.js"></script>
          </main>
    </main>
</html>