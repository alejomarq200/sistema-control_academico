<!-- Modal Calificaciones Primaria -->
<div class="modal fade" id="modalDescargarEstudiantes" tabindex="-1" aria-labelledby="modalLabelEstudiantes" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"><!-- ../ajax/cargar_estudiantes.php -->
            <form id="formEstudiantes" action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEstudiantes">Descargar Calificaciones de Estudiantes: Primaria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="anioModal" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioModal" name="anioModal" placeholder="Ej. 2024-2025">
                    </div>
                    <div class="mb-3">
                        <label for="gradoModal" class="form-label">Grado:</label>
                        <select class="form-select" name="gradoModal" id="gradoModal" required>
                            <option value>Seleccionar grado</option>
                            <option value="1">1er Grado</option>
                            <option value="2">2do Grado</option>
                            <option value="3">3er Grado</option>
                            <option value="4">4to Grado</option>
                            <option value="5">5to Grado</option>
                            <option value="6">6to Grado</option>
                        </select>
                    </div>
                    <div id="tabla-estudiantes-container">
                        <!-- Aquí se cargará la tabla de estudiantes -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">Seleccione un grado para cargar estudiantes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnDescargarSeleccionados">
                        <i class="bi bi-download"></i> Descargar
                    </button>
                    <button type="button" class="btn btn-secondary" id="cerrar-calif-primaria" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('cerrar-calif-primaria').addEventListener("click", function(e) {
        window.location.href = "descargarCalificaciones.php";
    });
</script>