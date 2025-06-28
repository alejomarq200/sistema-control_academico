<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Consultar Calificaciones</title>
    <style>
        /* Contenedor principal */
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

        /* Contenedor principal */
        .tabla-calificaciones-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        /* Contenedor responsive para la tabla */
        .table-responsive {
            overflow-x: auto;
            margin-bottom: 15px;
        }

        /* Estilos generales de la tabla */
        .calificaciones-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Encabezado de la tabla */
        .calificaciones-table thead {
            background-color: #0e2238;

            color: white;
        }

        .calificaciones-table th {
            padding: 12px 8px;
            text-align: center;
            vertical-align: middle;
            font-weight: 500;
            border: 1px solid #dee2e6;
        }

        .calificacion-header {
            min-width: 40px;
        }

        .total-header {
            background-color: rgb(37, 64, 90);

        }

        /* Cuerpo de la tabla */
        .calificaciones-table td {
            padding: 10px 8px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .calificaciones-table tbody tr {
            transition: all 0.3s ease;
        }

        .calificaciones-table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .calificaciones-table tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Celdas específicas */
        .profesor-cell,
        .materia-cell,
        .estudiante-cell {
            text-align: left;
            padding-left: 12px;
        }

        .estudiante-cell strong {
            font-weight: 600;
        }

        /* Estilos para notas */
        .nota-cell {
            font-weight: 500;
        }

        .nota-baja {
            color: #e74c3c;
            font-weight: bold;
        }

        .nota-alta {
            color: #2ecc71;
        }

        .nota-vacia {
            color: #95a5a6;
        }

        .total-cell {
            font-weight: bold;
            background-color: #f1f8fe;
        }

        /* Botón de editar */
        .btn-editar {
            background: none;
            border: 1px solid #3498db;
            color: #3498db;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-editar:hover {
            background-color: #3498db;
            color: white;
            transform: scale(1.05);
        }

        /* Fila sin datos */
        .no-data-row td {
            padding: 2rem 0;
            text-align: center;
            color: #7f8c8d;
        }

        .no-data-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .no-data-content i {
            font-size: 1.5rem;
            color: #bdc3c7;
        }

        .no-data-content p {
            margin: 0;
            font-size: 0.95rem;
        }

        /* Footer de la tabla */
        .calificaciones-table tfoot {
            background-color: #f8f9fa;
        }

        .tfoot-content {
            display: flex;
            justify-content: flex-end;
            padding: 10px 0;
        }

        /* Botón de descargar */
        .btn-descargar {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-descargar:hover {
            background-color: #219653;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-descargar i {
            font-size: 1rem;
        }
    </style>
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
                <div class="contenedor-calificaciones">
                    <form action="../Desarrollo/calificacion_1.php" method="POST">
                        <input type="hidden" name="gradoCalificacion" id="gradoCalificacion"
                            value="<?php echo $_POST['gradoCalificacion'] ?>">
                        <button type="submit" class="back">Volver</button>
                    </form>
                </div>
                <div class="custom-table">
                    <?php
                    include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
                    include("../Configuration/functions_php/functionsCRUDMaterias.php");
                    include("../Configuration/functions_php/functionsCRUDProfesor.php");
                    include("../Layout/modalesCalificaciones/modallDescargarC.php");
                    // Obtener el ID del estudiante desde POST o GET
                    $idEstudiante = $_POST['idEstudiante'] ?? $_GET['idEstudiante'] ?? null;

                    // Obtener el ID del grado si es necesario
                    $idGrado = $_POST['gradoCalificacion'];

                    // Obtener las calificaciones
                    $datos = obtenerCalificacionesAgrupadas($pdo, $idEstudiante/* $idGrado*/);
                    $calificaciones = $datos['calificaciones'];
                    $maxCalifs = $datos['max_califs'];
                    function retornarNombreGrado($pdo, array $grado)
                    {
                        try {
                            // Verificar que el rol exista en el array del usuario
                            if (!isset($grado['id_grado'])) {
                                return 'IdGrado no definido';
                            }

                            $stmt = $pdo->prepare("SELECT id_grado FROM grados WHERE id = :id");
                            $stmt->bindValue(':id', $grado['id_grado']);
                            $stmt->execute();

                            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                            return $resultado ? $resultado['id_grado'] : 'Grado no encontrado';
                        } catch (PDOException $e) {
                            error_log("Error en retornarNombreEst: " . $e->getMessage());
                            return 'Error al obtener rol';
                        }
                    }

                    ?>

                    <input type="hidden" name="idEstudiante" value="<?= htmlspecialchars($idEstudiante ?? '') ?>">
                    <div class="tabla-calificaciones-container">
                        <div class="table-responsive">
                            <table class="calificaciones-table">
                                <thead>
                                    <tr>
                                        <th>Año</th>
                                        <th>Grado</th>
                                        <th>Lapso</th>
                                        <th>Profesor</th>
                                        <th>Materia</th>
                                        <th>Estudiante</th>
                                        <?php for ($i = 1; $i <= $maxCalifs; $i++): ?>
                                            <th class="calificacion-header">C<?= $i ?></th>
                                        <?php endfor; ?>
                                        <th class="total-header">Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($calificaciones)): ?>
                                        <?php foreach ($calificaciones as $calif): ?>
                                            <tr>
                                                <td><?= $calif['año_escolar'] ?></td>
                                                <td><?= retornarNombreGrado($pdo, $calif); ?><input type="hidden" id="grado"
                                                        name="grado" value="<?= $calif['id_grado'] ?>"></td>
                                                <td><?= $calif['lapso_academico'] ?></td>
                                                <td class="profesor-cell">
                                                    <?= retornarNombreProfesor($pdo, $calif); ?>
                                                    <input type="hidden" id="profesor" name="profesor"
                                                        value="<?= $calif['id_profesor'] ?>">
                                                </td>
                                                <td class="materia-cell">
                                                    <?= $materia = retornarNombreMateria($pdo, $calif); ?>
                                                    <input type="hidden" name="materia" id="materia"
                                                        value="<?= $calif['id_materia'] ?>">
                                                </td>
                                                <td class="estudiante-cell">
                                                    <strong><?= $idEst = retornarNombreEstudiante($pdo, $calif); ?></strong>
                                                    <input type="hidden" id="idEstudante" name="idEstudiante"
                                                        value="<?= $calif['id_estudiante'] ?>">
                                                </td>
                                                <?php foreach ($calif['calificaciones'] as $nota): ?>
                                                    <td class="nota-cell <?= ($nota['valor'] < 10) ? 'nota-baja' : 'nota-alta' ?>">
                                                        <span data-id="<?= $nota['id'] ?>"><?= $nota['valor'] ?></span>
                                                    </td>
                                                <?php endforeach; ?>
                                                <?php for ($i = count($calif['calificaciones']); $i < $maxCalifs; $i++): ?>
                                                    <td class="nota-vacia">-</td>
                                                <?php endfor; ?>
                                                <td class="total-cell"><?= $calif['total_calificacion'] ?></td>
                                                <td class="acciones-cell">
                                                    <button class="btn-editar" data-est="<?= $calif['id_estudiante'] ?>"
                                                        data-mat="<?= $calif['id_materia'] ?>"
                                                        data-ids='<?= json_encode(array_column($calif["calificaciones"], "id")) ?>'
                                                        data-valores='<?= json_encode(array_column($calif["calificaciones"], "valor")) ?>'>
                                                        <i class="bi bi-pencil"></i> Editar
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr class="no-data-row">
                                            <td colspan="<?= 6 + $maxCalifs + 2 ?>">
                                                <div class="no-data-content">
                                                    <i class="bi bi-exclamation-circle-fill"></i>
                                                    <p>No hay calificaciones registradas</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="<?= 6 + $maxCalifs + 2 ?>">
                                            <div class="tfoot-content">
                                                <button class="btn-descargar" data-bs-toggle="modal"
                                                    data-bs-target="#formModalDescargarC">
                                                    <i class="bi bi-download"></i> Descargar Reporte
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </main>
                    <script src="../js/filtrarLupa.js"></script>
</body>
</div>
</main>
<!-- Modal -->
<style>
    .error {
        text-align: left;
        padding-left: 0;
        color: red;
        font-size: 0.85rem;
        margin-top: 0.1rem;
        margin-bottom: 0.5rem;
    }
</style>

<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEditarCalificacion" class="modal-content">
            <!-- Eliminé el action y method del form ya que usamos fetch -->
            <div class="modal-header">
                <h5 class="modal-title">Editar Calificaciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="contenedorCalificaciones">
                <!-- Aquí se cargan dinámicamente los campos -->
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div class="promedio-container">
                        <strong>Promedio:</strong>
                        <input type="number" id="promedioCalculado" class="form-control d-inline-block ms-2"
                            style="width: 80px;" readonly>
                        <input type="hidden" name="total_calificacion" id="totalCalificacion">
                    </div>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
    <script>
        document.querySelectorAll('.btn-editar').forEach(button => {
            button.addEventListener('click', function () {
                const ids = JSON.parse(this.dataset.ids);
                const valores = JSON.parse(this.dataset.valores);

                const contenedor = document.getElementById('contenedorCalificaciones');
                contenedor.innerHTML = '';

                ids.forEach((id, index) => {
                    const div = document.createElement('div');
                    div.classList.add('mb-2');
                    div.innerHTML = `
                    <input type="hidden" name="id_calif[]" value="${id}">
                    <label>Calificación ${index + 1}:</label>
                    <input type="number" name="valor_calif[]" value="${valores[index]}" 
                           class="form-control calificacion-input" min="0" max="20" required>
                `;
                    contenedor.appendChild(div);
                });

                // Calcular promedio inicial
                calcularPromedio();

                const modal = new bootstrap.Modal(document.getElementById('modalEditar'));
                modal.show();
            });
        });

        // Escuchar cambios en los inputs de calificación
        document.addEventListener('input', function (e) {
            if (e.target.classList.contains('calificacion-input')) {
                calcularPromedio();
            }
        });

        function calcularPromedio() {
            const inputs = document.querySelectorAll('.calificacion-input');
            let suma = 0;
            let contador = 0;

            inputs.forEach(input => {
                const value = parseFloat(input.value);
                if (!isNaN(value) && value >= 0 && value <= 20) {
                    suma += value;
                    contador++;
                }
            });

            const promedio = contador > 0 ? (suma / contador) : 0;
            const promedioRedondeado = Math.round(promedio * 100) / 100; // Redondear a 2 decimales

            document.getElementById('promedioCalculado').value = promedioRedondeado;
            document.getElementById('totalCalificacion').value = promedioRedondeado;
        }


        document.getElementById('formEditarCalificacion').addEventListener('submit', async function (e) {
            e.preventDefault();

            // Validación básica
            const inputs = document.querySelectorAll('input[name="valor_calif[]"]');
            let valid = true;

            inputs.forEach(input => {
                const value = parseFloat(input.value);
                if (isNaN(value) || value < 0 || value > 20) {
                    input.classList.add('is-invalid');
                    valid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!valid) {
                alert('Por favor ingrese calificaciones válidas (0-20)');
                return;
            }

            try {
                const formData = new FormData(this);

                // Agregar cualquier dato adicional que necesites
                formData.append('action', 'editar_calificaciones');

                const response = await fetch('../AJAX/AJAX_Calificaciones/editarCalificacion.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Error en la respuesta del servidor');
                }

                if (data.success) {
                    Swal.fire({
                        title: '¡Éxito!',
                        text: data.message || 'Calificaciones actualizadas correctamente',
                        icon: 'success'
                    }).then(() => {
                        // Cerrar el modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditar'));
                        modal.hide();
                        // Recargar la página
                        location.reload();
                    });
                } else {
                    throw new Error(data.message || 'Error al actualizar las calificaciones');
                }
            } catch (error) {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error',
                    text: error.message,
                    icon: 'error'
                });
            }
        });
    </script>