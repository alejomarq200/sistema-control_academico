<!-- Modal Planillas de Inscripcion "Primaria - Secundaria" -->
<div class="modal fade" id="modalDescargarPlanillaP" tabindex="-1" aria-labelledby="modalLabelPlanilla" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formPlanillaP" action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelEstudiantes">Descargar Planillas de Inscripción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="anioP" class="form-label">Año Escolar</label>
                        <input type="text" class="form-control" id="anioP" name="anioP" placeholder="Ej. 2024-2025">
                    </div>
                    <div class="mb-3">
                        <label for="gradosP" class="form-label">Grado:</label>
                        <select class="form-select" name="gradosP" id="gradosP">
                            <option value>Seleccionar grado</option>
                            <option value="1">1er grado</option>
                            <option value="2">2do grado</option>
                            <option value="3">3er grado</option>
                            <option value="4">4to grado</option>
                            <option value="5">5to grado</option>
                            <option value="6">6to grado</option>
                        </select>
                    </div>
                    <div id="tabla-planilla-container">
                        <!-- Aquí se cargará la tabla de estudiantes -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-center">Seleccione un grado para cargar estudiantes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnDescargarSeleccionados">
                        <i class="bi bi-download"></i> Descargar
                    </button>
                    <button type="button" class="btn btn-secondary" id="cerrar-primaria" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('cerrar-primaria').addEventListener("click", function(e) {
        window.location.href = "descargarPlanillaInscr.php";
    });
</script>