<!-- Modal para Auditoria PDF -->
<div class="modal fade" id="modalAuditoriaPDF" tabindex="-1" aria-labelledby="modalAuditoriaPDFLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:#6c757d;">
                <h5 class="modal-title" id="modalAuditorPDFiaLabel">Reporte de Auditoría</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../reportes/emitirReporteAuditoria.php" method="POST">
                <div class="modal-body">
                    <div class="row mb-4">
                        <!-- Columna izquierda - Filtros principales -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="selectUsuarioAuditoria" class="form-label">Usuario:</label>
                                <select class="form-select" id="selectUsuarioAuditoria" name="usuarioAuditoria">

                                    <!-- Opciones se llenarán dinámicamente -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="selectTablaAuditoria" class="form-label">Tabla afectada:</label>
                                <select class="form-select" id="selectTablaAuditoria" name="tablaAuditoria">

                                    <!-- Opciones se llenarán dinámicamente -->
                                </select>
                            </div>
                        </div>

                        <!-- Columna derecha - Filtros de fecha -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="selectOperacionAuditoria" class="form-label">Tipo de operación:</label>
                                <select class="form-select" id="selectOperacionAuditoria" name="operacionAuditoria">
                                    <option value="" selected>Todas las operaciones</option>
                                    <option value="INSERT">Creación</option>
                                    <option value="UPDATE">Actualización</option>
                                    <option value="DELETE">Eliminación</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fechaInicioAuditoria" class="form-label">Fecha desde:</label>
                                    <input type="date" class="form-control" id="fechaInicioAuditoria" name="fechaInicioAuditoria">
                                </div>
                                <div class="col-md-6">
                                    <label for="fechaFinAuditoria" class="form-label">Fecha hasta:</label>
                                    <input type="date" class="form-control" id="fechaFinAuditoria" name="fechaFinAuditoria">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botón para aplicar filtros -->
                    <div class="text-center mb-8">
                        <button type="submit" id="btnConsulta" class="btn btn-success" style="width: 50%; background-color:#6c757d;">
                            <i class="fi fi-rr-file-pdf"></i>Emitir Reporte
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cerrar" data-bs-dismiss="modal">Cerrar</button>
                </div>
        </div>
        </form>
    </div>
</div>
<script src="../js/modalesAuditoria.js"></script>
