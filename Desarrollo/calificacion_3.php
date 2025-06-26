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
                    $idEstudiante = isset($_POST['idEstudiante']) ? $_POST['idEstudiante'] : null;
                    $datos = obtenerCalificacionesAgrupadas($pdo, $idEstudiante);
                    $calificaciones = $datos['calificaciones'];
                    $maxCalifs = $datos['max_califs'];
                    ?>

                    <input type="hidden" name="idEstudiante" value="<?= htmlspecialchars($idEstudiante ?? '') ?>">

                    <table class="table table-bordered table-striped table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Año</th>
                                <th>Grado</th>
                                <th>Lapso</th>
                                <th>Profesor</th>
                                <th>Materia</th>
                                <th>Estudiante</th>
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

                                        <?php foreach ($calif['calificaciones'] as $nota): ?>
                                            <td><span data-id="<?= $nota['id'] ?>"><?= $nota['valor'] ?></span></td>
                                        <?php endforeach; ?>

                                        <?php for ($i = count($calif['calificaciones']); $i < $maxCalifs; $i++): ?>
                                            <td>-</td>
                                        <?php endfor; ?>

                                        <td><strong><?= $calif['total_calificacion'] ?></strong></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary btn-editar"
                                                data-est="<?= $calif['id_estudiante'] ?>" data-mat="<?= $calif['id_materia'] ?>"
                                                data-ids='<?= json_encode(array_column($calif["calificaciones"], "id")) ?>'
                                                data-valores='<?= json_encode(array_column($calif["calificaciones"], "valor")) ?>'>
                                                <i class="bi bi-pencil"></i>
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
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</form>

<script>
    document.querySelectorAll('.btn-editar').forEach(button => {
        button.addEventListener('click', function() {
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
                           class="form-control" min="0" max="20" required>
                `;
                contenedor.appendChild(div);
            });

            const modal = new bootstrap.Modal(document.getElementById('modalEditar'));
            modal.show();
        });
    });
    
    document.getElementById('formEditarCalificacion').addEventListener('submit', async function(e) {
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