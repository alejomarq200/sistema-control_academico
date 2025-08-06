<div class="modal fade" id="modalReporteHorarios" tabindex="-1" aria-labelledby="modalReporteHorariosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../reportes/reportesHorarios.php" method="POST">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="modalReporteHorariosLabel">Filtros para Reporte de Horarios</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <label for="nivelEducativoHorario" class="form-label">Nivel del Grado:</label>
                        <select class="form-select" id="nivelEducativoHorario" name="nivelEducativoHorario" onchange="cargarGrados('nivelEducativoHorario', 'selectGradoHorario')" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                        </select>
                        <label for="selectGradoHorario" class="form-label">Grado:</label>
                        <select class="form-select" id="selectGradoHorario" name="selectGradoHorario" required>
                            <option value="" selected>Seleccionar</option>
                        </select>
                        <label for="selectAnioHorario" class="form-label">Año Escolar:</label>
                        <select class="form-select" id="selectAnioHorario" name="selectAnioHorario" required>
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026" selected>2025-2026</option>
                        </select>
                        <label for="selectAnioHorario" class="form-label">Cantidad de Horarios a Emitir:</label>
                        <input type="number" class="form-control" name="cantidadReportes" id="cantidadReportes" min="1" value="1" max="30" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-download me-2"></i>Consultar Reporte
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>