<div class="modal fade" id="modalReporteProfesores" tabindex="-1" aria-labelledby="modalReporteProfesoresLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../reportes/reportesProfesores.php" method="POST">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalReporteProfesoresLabel">Filtros para Reporte de Profesres</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <label for="nivelEducativoPr" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoPr" name="nivelEducativoPr" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-select" id="estadoPr" name="estadoPr" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="2">Activo</option>
                            <option value="1">Inactivo</option>
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