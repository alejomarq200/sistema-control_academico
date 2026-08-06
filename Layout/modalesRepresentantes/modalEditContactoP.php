<!-- Modal -->

<div class="modal fade" id="formModalContactoP" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Información Contacto Pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller_php/controller_EditContactoP.php" method="POST" id="formEditContacto">
                    <div class="row">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="idContacto" name="idContacto" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cedulaContacto" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedulaContacto" name="cedulaContacto">
                                <p class="error" id="cedulaContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="apellidosContacto" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidosContacto" name="apellidosContacto">
                                <p class="error" id="apellidosContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombresContacto" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombresContacto" name="nombresContacto">
                                <p class="error" id="nombresContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="direccionContacto" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccionContacto" name="direccionContacto">
                                <p class="error" id="direccionContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="correoContacto" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="correoContacto" name="correoContacto">
                                <p class="error" id="correoContacto_RprError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="nro_telefonoContacto" class="form-label">Número telefónico</label>
                                <input type="text" class="form-control" id="nro_telefonoContacto"
                                    name="nro_telefonoContacto">
                                <p class="error" id="nro_telefonoContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="grado_instContacto" class="form-label">Grado Instrucción</label>
                                <input type="text" class="form-control" id="grado_instContacto"
                                    name="grado_instContacto">
                                <p class="error" id="grado_instContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="profesionContacto" class="form-label">Profesión</label>
                                <input type="text" class="form-control" id="profesionContacto" name="profesionContacto">
                                <p class="error" id="profesionContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="trabajaContacto" class="form-label">Trabaja</label>
                                <input type="text" class="form-control" id="trabajaContacto" name="trabajaContacto">
                                <p class="error" id="trabajaContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="direccion_emprContacto" class="form-label">Dirección Empresa</label>
                                <input type="text" class="form-control" id="direccion_emprContacto"
                                    name="direccion_emprContacto">
                                <p class="error" id="direccion_emprContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre_emprContacto" class="form-label">Nombre Empresa</label>
                                <input type="text" class="form-control" id="nombre_emprContacto"
                                    name="nombre_emprContacto">
                                <p class="error" id="nombre_emprContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="telefono_emprContacto" class="form-label">Telefono Empresa</label>
                                <input type="text" class="form-control" id="telefono_emprContacto"
                                    name="telefono_emprContacto">
                                <p class="error" id="telefono_emprContacto_RprError"></p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" style="width: 100%;">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../js/validarEditContactoP.js"></script>