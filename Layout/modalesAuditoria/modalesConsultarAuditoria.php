<!-- Modal para Auditoria -->
<div class="modal fade" id="modalAuditoria" tabindex="-1" aria-labelledby="modalAuditoriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:#062659 ;">
                <h5 class="modal-title" id="modalAuditoriaLabel">Consultar de Auditoría</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <!-- Columna izquierda - Filtros principales -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="selectUsuario" class="form-label">Usuario:</label>
                            <select class="form-select" id="selectUsuario" name="usuario">
                                <option value="" selected>Todos los usuarios</option>

                                <!-- Opciones se llenarán dinámicamente -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="selectTabla" class="form-label">Tabla afectada:</label>
                            <select class="form-select" id="selectTabla" name="tabla">

                                <!-- Opciones se llenarán dinámicamente -->
                            </select>
                        </div>
                    </div>

                    <!-- Columna derecha - Filtros de fecha -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="selectOperacion" class="form-label">Tipo de operación:</label>
                            <select class="form-select" id="selectOperacion" name="operacion">
                                <option value="" selected>Todas las operaciones</option>
                                <option value="INSERT">Creación</option>
                                <option value="UPDATE">Actualización</option>
                                <option value="DELETE">Eliminación</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="fechaInicio" class="form-label">Fecha desde:</label>
                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                            </div>
                            <div class="col-md-6">
                                <label for="fechaFin" class="form-label">Fecha hasta:</label>
                                <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botón para aplicar filtros -->
                <div class="text-center mb-4">
                    <button type="button" id="btnAplicarFiltros" class="btn btn-primary" style="background-color:#062659 ;">
                        <i class="bi bi-funnel me-2"></i>Aplicar Filtros
                    </button>
                </div>

                <!-- Tabla de resultados -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header text-white" style="background-color:#062659 ;">
                        <h5 class="mb-0">Registros de Auditoría</h5>
                    </div>
                    <div class="card-body p-0">
                        <!-- Contenedor con scroll vertical -->
                        <div style="max-height: 500px; overflow-y: auto;">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0" id="tablaAuditoria">
                                    <thead class="table-dark" style="position: sticky; top: 0; z-index: 1;">
                                        <tr>
                                            <th>Fecha/Hora</th>
                                            <th>Tabla</th>
                                            <th>Operación</th>
                                            <th>Valores Ant</th>
                                            <th>Valores Nuevos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Datos se cargarán dinámicamente -->
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="bi bi-funnel fs-4"></i>
                                                    <p class="mt-2">Aplique los filtros para ver los registros de auditoría</p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="cerrar" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/modalesAuditoria.js"></script>