<!-- Modal para Constancia de Retiro -->
<div class="modal fade" id="modalConstanciaRetiro" tabindex="-1" aria-labelledby="modalConstanciaRetiroLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalConstanciaRetiroLabel">Generar Constancia de Retiro</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="nivelEducativoRetiro" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoRetiro" name="nivelEducativoRetiro" onchange="cargarGradosRetiro()">
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="selectGradoRetiro" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGradoRetiro" name="selectGradoRetiro">
                            <option value="" selected>Seleccionar</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="selectAnioRetiro" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnioRetiro" name="selectAnioRetiro">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                    </div>
                </div>

                <div id="tablaEstudiantesContainerRetiro">
                    <!-- Aquí se cargará la tabla dinámica -->
                    <div class="alert alert-info">Seleccione un grado y año escolar para mostrar los estudiantes</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGenerarConstanciasRetiro" class="btn btn-danger" disabled>
                    <i class="bi bi-download me-2"></i>Generar Constancias Seleccionadas
                </button>
            </div>
        </div>
    </div>
</div>