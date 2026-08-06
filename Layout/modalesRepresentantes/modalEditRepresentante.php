<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Información Representante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller_php/controller_EditRepresentante.php" method="POST"
                    id="formEditRepresentante">
                    <div class="row">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="id" name="id" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula">
                                <p class="error" id="cedula_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo3" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos">
                                <p class="error" id="apellidos_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombres" name="nombres">
                                <p class="error" id="nombres_RprError"></p>
                            </div>

                            <div class="mb-3">
                                <label for="campo4" class="form-label">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" id="fecha_nac" name="fecha_nac">
                                <p class="error" id="fecha_nac_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="correo" name="correo">
                                <p class="error" id="correo_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion">
                                <p class="error" id="direccion_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Número telefónico</label>
                                <input type="text" class="form-control" id="nro_telefono" name="nro_telefono">
                                <p class="error" id="nro_telefono_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Grado Instrucción</label>
                                <input type="text" class="form-control" id="grado_inst" name="grado_inst">
                                <p class="error" id="grado_inst_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Profesión</label>
                                <input type="text" class="form-control" id="profesion" name="profesion">
                                <p class="error" id="profesion_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Nombre Empresa</label>
                                <input type="text" class="form-control" id="nombre_empr" name="nombre_empr">
                                <p class="error" id="nombre_empr_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Trabaja</label>
                                <input type="text" class="form-control" id="trabaja" name="trabaja">
                                <p class="error" id="trabaja_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Telefono Empresa</label>
                                <input type="text" class="form-control" id="telefono_empr" name="telefono_empr">
                                <p class="error" id="telefono_empr_RprError"></p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="campo2" class="form-label">Dirección Empresa</label>
                            <input type="text" class="form-control" id="direccion_empr" name="direccion_empr">
                            <p class="error" id="direccion_empr_RprError"></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 100%;">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../js/validarEditRepresentante.js"></script>