<!-- Modal para Constancia de Estudio -->
<div class="modal fade" id="modalConstanciaEstudio" tabindex="-1" aria-labelledby="modalConstanciaEstudioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalConstanciaEstudioLabel">Generar Constancia de Estudio</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="selectGrado" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativo" name="nivelEducativo" onchange="cargarGrados()">
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="selectGrado" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGrado" name="gradosS">
                            <option value="" selected>Seleccionar</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="selectAnio" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnio" name="anioS">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                    </div>
                </div>

                <div id="tablaEstudiantesContainer">
                    <!-- Aquí se cargará la tabla dinámica -->
                    <div class="alert alert-info">Seleccione un grado y año escolar para mostrar los estudiantes</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGenerarConstancias" class="btn btn-primary" disabled>
                    <i class="bi bi-download me-2"></i>Generar Constancias Seleccionadas
                </button>
            </div>
        </div>
    </div>
</div>