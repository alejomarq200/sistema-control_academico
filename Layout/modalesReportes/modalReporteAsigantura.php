<div class="modal fade" id="modalReporteAsignaturas" tabindex="-1" aria-labelledby="modalReporteAsignaturasLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../reportes/reportesAsignaturas.php" method="POST">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalReporteAsignaturasLabel">Filtros para Reporte de Asignaturas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <label for="nivelEducativoAsig" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoAsig" name="nivelEducativoAsig" onchange="cargarGrados('nivelEducativoAsig', 'selectGradoAsig')" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="estadoAsig" class="form-label">Estado:</label>
                        <select class="form-select" id="estadoAsig" name="estadoAsig" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="2">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-download me-2"></i>Consultar Reporte
                    </button>
                </div>
        </div>
        </form>
    </div>
</div>