<!-- Modal Calificaciones Secundaria -->
<div class="modal fade" id="modalDescargarEstudiantesSecundaria" tabindex="-1" aria-labelledby="modalLabelEstudiantes" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"><!-- ../ajax/cargar_estudiantes.php -->
            <form id="formEstudiantesSecundaria" action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEstudiantes">Descargar Calificación de Estudiantes: Secundaria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="anioModalSecundaria" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioModalSecundaria" name="anioModalSecundaria" placeholder="Ej. 2024-2025">
                    </div>
                    <div class="mb-3">
                        <label for="lapsoModalSecundaria" class="form-label">Lapso Académico</label>
                        <select class="form-select" name="lapsoModalSecundaria" id="lapsoModalSecundaria" required>
                            <option value>Seleccionar</option>
                            <option value="1er lapso">1er lapso</option>
                            <option value="2do lapso">2do lapso</option>
                            <option value="3er lapso">3ero lapso</option>
                            <option value="All">Todos los lapsos</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gradoModalSecundaria" class="form-label">Grado:</label>
                        <select class="form-select" name="gradoModalSecundaria" id="gradoModalSecundaria" required>
                            <option value>Seleccionar grado</option>
                            <option value="7">1er año</option>
                            <option value="8">2do año</option>
                            <option value="9">3er año</option>
                            <option value="10">4to año</option>
                            <option value="11">5to año</option>
                        </select>
                    </div>
                    <div id="tabla-estudiantes-container-Secundaria">
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
                    <button type="button" class="btn btn-secondary" id="cerrar-calif-secundaria" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('cerrar-calif-secundaria').addEventListener("click", function(e) {
        window.location.href = "descargarCalificaciones.php";
    });
</script>