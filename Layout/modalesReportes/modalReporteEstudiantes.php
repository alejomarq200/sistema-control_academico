<div class="modal fade" id="modalReporteEst" tabindex="-1" aria-labelledby="modalReporteEstLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../reportes/reportesEstudiantes.php" method="POST">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalReporteEstLabel">Filtros para Reporte de Estudiantes</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <label for="nivelEducativoEst" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoEst" name="nivelEducativoEst" onchange="cargarGrados('nivelEducativoEst', 'selectGradoEst')" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                          <label for="selectGradoEst" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGradoEst" name="selectGradoEst" required>
                            <option value="" selected>Seleccionar</option>
                        </select>
                        <label for="generoEst" class="form-label">Género:</label>
                        <select class="form-select" id="generoEst" name="generoEst" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="M" selected>M</option>
                            <option value="F" selected>F</option>
                        </select>
                        <label for="selectAnio" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnio" name="selectAnio" required>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-download me-2"></i>Consultar Reporte
                    </button>
                </div>
        </div>
        </form>
    </div>
</div>