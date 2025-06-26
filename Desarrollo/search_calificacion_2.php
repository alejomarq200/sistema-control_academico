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
            $grado_id = $_POST['grado'];

            //Obtenemos id profesor
            $array = array($_POST['profesor'], $_POST['materia']);
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
                    <form action="../Desarrollo/search_calificacion_1.php" method="POST">
                        <input type="hidden" name="profesorCalificacion" id="profesorCalificacion"
                            value="<?php echo retornarIdProfesor($pdo, $array); ?>">
                        <input type="hidden" name="materiaCalificacion" id="materiaCalificacion"
                            value="<?php echo $variable = retornarIdMateria($pdo, $array) ?>">
                        <input type="hidden" name="gradoCalificacion" id="gradoCalificacion"
                            value="<?php echo $grado_id; ?>">
                        <button type="submit" class="back">Volver</button>
                    </form>
                    <label for="numCalificaciones">Cantidad de calificaciones:</label>
                    <input type="number" id="numCalificaciones" class="input-calificaciones" min="1" max="10" value="1"
                        placeholder="N° calificaciones">
                    <button id="btnAgregarColumnas" class="btn-agregar">Agregar</button>
                    <select class="select-lapso" id="selectLapso">
                        <option value="1er Lapso">1er Lapso</option>
                        <option value="1er Lapso">2do Lapso</option>
                        <option value="1er Lapso">3er Lapso</option>
                    </select>
                    <label for="anioEscolar">Año escolar</label> <input type="text" id="anioEscolar" name="anioEscolar"
                        class="input-anioEscolar" readonly>
                </div>
            </div>

            <div class="custom-table-Calificacion">
                <table class="table table-hover" id="tablaEstudiantes">
                    <thead>
                        <tr style="height: 60px;">
                            <th>Cédula Estudiante</th>
                            <th>Nombre Estudiante</th>
                            <th>Apellido Estudiante</th>
                            <th>Total</th>
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
                                        <td class="total">0.00</td>
                                        <!-- Columnas dinámicas se agregarán aquí -->
                                        <td>
                                            <button type="button" class="btn btn-success btn-guardar">
                                                <i class="bi bi-save"></i> Guardar
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>No se encontraron estudiantes inscritos en este grado.</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se ha seleccionado un grado válido.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- JavaScript para manejar las columnas dinámicas -->
            <script>
                // Obtener el año actual
                const añoActual = new Date().getFullYear();
                // Calcular el año siguiente
                const añoSiguiente = añoActual + 1;
                // Formatear como "2024-2025"
                const añoEscolar = `${añoActual}-${añoSiguiente}`;

                // Asignar el valor al input
                document.getElementById('anioEscolar').value = añoEscolar;
                $(document).ready(function () {
                    // Función para agregar columnas
                    $('#btnAgregarColumnas').click(function () {
                        const numCalificaciones = $('#numCalificaciones').val();

                        // Limpiar solo las columnas de calificación (usando una clase específica)
                        $('#tablaEstudiantes thead tr th.calificacion-col').remove();
                        $('#tablaEstudiantes tbody tr td.calificacion-col').remove();

                        // Agregar encabezados de columnas (de izquierda a derecha)
                        let headers = '';
                        for (let i = 1; i <= numCalificaciones; i++) {
                            headers += `<th class="calificacion-col">Calif. ${i}</th>`;
                        }

                        // Insertar después del encabezado "Total" (4ta columna)
                        $('#tablaEstudiantes thead tr th:nth-child(4)').after(headers);

                        // Agregar inputs en cada fila (de izquierda a derecha)
                        $('#tablaEstudiantes tbody tr').each(function () {
                            const $tr = $(this);
                            // Encontrar la celda "Total" (4ta columna)
                            const $totalCell = $tr.find('td:nth-child(4)');
                            // Encontrar la celda "Acciones" (última columna)
                            const $actionsCell = $tr.find('td:last');

                            // Eliminar cualquier columna de calificación existente
                            $tr.find('td.calificacion-col').remove();

                            // Crear nuevas celdas de calificación
                            let inputs = '';
                            for (let i = 1; i <= numCalificaciones; i++) {
                                inputs += `<td class="calificacion-col">
                            <input type="number" class="form-control calificacion" 
                                   min="0" max="20" step="0.01" data-indice="${i}">
                          </td>`;
                            }

                            // Insertar las nuevas celdas antes de la columna Acciones
                            $actionsCell.before(inputs);
                        });
                    });

                    // Calcular total cuando cambia una calificación
                    $(document).on('input', '.calificacion', function () {
                        const $tr = $(this).closest('tr');
                        let sum = 0;
                        let count = 0;

                        $tr.find('.calificacion').each(function () {
                            const value = parseFloat($(this).val()) || 0;
                            sum += value;
                            count++;
                        });

                        const promedio = count > 0 ? (sum / count).toFixed(2) : '0.00';
                        $tr.find('.total').text(promedio);
                    });

                    // Guardar calificaciones
                    $(document).on('click', '.btn-guardar', function () {
                        const $tr = $(this).closest('tr');
                        const estudianteId = $tr.data('estudiante-id');
                        const lapso = $('#selectLapso').val();
                        const añoEscolar = $('#anioEscolar').val();
                        const gradoId = $('#gradoCalificacion').val();
                        const profesorId = $('#profesorCalificacion').val();
                        const materiaId = $('#materiaCalificacion').val();

                        const calificaciones = [];
                        $tr.find('.calificacion').each(function () {
                            calificaciones.push($(this).val() || 0);
                        });

                        const total = $tr.find('.total').text();

                        if (calificaciones.length === 0) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Advertencia',
                                text: 'No hay calificaciones para guardar',
                                confirmButtonColor: '#3085d6'
                            });
                            return;
                        }

                        const formData = new FormData();
                        formData.append('estudiante_id', estudianteId);
                        formData.append('grado_id', gradoId);
                        formData.append('lapso_academico', lapso);
                        formData.append('anioEscolar', añoEscolar);
                        formData.append('profesor_id', profesorId);
                        formData.append('total_calificacion', total);
                        formData.append('materia_id', materiaId);

                        calificaciones.forEach((calif, index) => {
                            formData.append(`calificaciones[${index}]`, calif);
                        });

                        $.ajax({
                            url: "../AJAX/AJAX_Calificaciones/guardarCalificacion.php",
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            dataType: 'json',
                            beforeSend: function () {
                                // Mostrar loader mientras se procesa
                                Swal.fire({
                                    title: 'Procesando',
                                    html: 'Guardando calificaciones...',
                                    allowOutsideClick: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                            },
                            success: function (response) {
                                Swal.close(); // Cerrar el loader

                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Éxito',
                                        text: response.message,
                                        confirmButtonColor: '#28a745',
                                        timer: 2000,
                                        timerProgressBar: true
                                    });
                                } else if (response.error) {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Advertencia',
                                        text: response.message,
                                        confirmButtonColor: '#ffc107'
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Información',
                                        text: response.message,
                                        confirmButtonColor: '#17a2b8'
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.close(); // Cerrar el loader
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Ocurrió un error: ' + (xhr.responseJSON?.message || xhr.responseText || error),
                                    confirmButtonColor: '#dc3545'
                                });
                            }
                        });
                    });
                });
            </script>
            <script src="../js/filtrarLupa.js"></script>
            </main>
            </main>

</html>