<div class="modal fade" id="modalReporteUsuarios" tabindex="-1" aria-labelledby="modalReporteUsuariosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="../reportes/reporteUsuariosFiltrado.php" method="POST">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalReporteUsuariosLabel">Filtros para Reporte de Usuarios</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <label for="RolU" class="form-label">Roles:</label>
                        <select class="form-select" id="RolU" name="RolU">
                            <option value="" selected>Seleccionar</option>
                            <option value="1" selected>Administrador</option>
                            <option value="2" selected>Usuario</option>
                        </select>
                        <label for="estadoU" class="form-label">Estado:</label>
                        <select class="form-select" id="estadoU" name="estadoU" required>
                            <option value="" selected>Seleccionar</option>
                            <option value="2">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-download me-2"></i>Consultar Reporte
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>