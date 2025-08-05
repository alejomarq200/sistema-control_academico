<div class="modal fade" id="modalReporteAulas" tabindex="-1" aria-labelledby="modalReporteAulasLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../reportes/reportesAula.php" method="POST">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalReporteAulasLabel">Filtros para Reporte de Aulas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <label for="nivelEducativo" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativo" name="nivelEducativo" onchange="cargarGrados('nivelEducativo', 'selectGrado')" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="2">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                        <label for="selectGrado" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGrado" name="selectGrado" required>
                            <option value="" selected>Seleccionar</option>
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