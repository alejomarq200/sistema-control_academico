            <!-- Modal -->
            <div class="modal fade" id="formModalVer" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Formulario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="idVer" name="idVer" hidden>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="campo1" class="form-label">Cédula</label>
                                            <input type="text" class="form-control" id="cedulaVer" name="cedulaVer">
                                        </div>
                                        <div class="mb-3">
                                            <label for="campo3" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidosVer" name="apellidosVer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="campo2" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="nombresVer" name="nombresVer">
                                        </div>
                                        <div class="mb-3">
                                            <label for="campo4" class="form-label">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" id="fecha_nacVer" name="fecha_nacVer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="campo1" class="form-label">Correo</label>
                                            <input type="text" class="form-control" id="correoVer" name="correoVer">
                                        </div>
                                        <div class="mb-3">
                                            <label for="campo2" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="direccionVer" name="direccionVer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="campo1" class="form-label">Número telefónico</label>
                                            <input type="text" class="form-control" id="nro_telefonoVer"
                                                name="nro_telefonoVer">
                                        </div>
                                        <div class="mb-3">
                                            <label for="campo2" class="form-label">Grado Instrucción</label>
                                            <input type="text" class="form-control" id="grado_instVer" name="grado_instVer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="campo1" class="form-label">Profesión</label>
                                            <input type="text" class="form-control" id="profesionVer" name="profesionVer">
                                        </div>
                                         <div class="mb-3">
                                            <label for="campo1" class="form-label">Nombre Empresa</label>
                                            <input type="text" class="form-control" id="nombre_emprVer" name="nombre_emprVer">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="mb-3">
                                            <label for="campo2" class="form-label">Trabaja</label>
                                            <input type="text" class="form-control" id="trabajaVer" name="trabajaVer">
                                        </div>
                                        <div class="mb-3">
                                            <label for="campo2" class="form-label">Telefono Empresa</label>
                                            <input type="text" class="form-control" id="telefono_emprVer"
                                                name="telefono_emprVer">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="campo2" class="form-label">Dirección Empresa</label>
                                        <input type="text" class="form-control" id="direccion_emprVer"
                                            name="direccion_emprVer">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" style="width: 100%;"><i class="bi bi-download"></i>Descargar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("formModalVer");
            // Almacenaremos los valores originales aquí
            var originalValues = {};

            modal.addEventListener("show.bs.modal", function (event) {
                // Añadido el parámetro event
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    id: button.getAttribute('data-id'),
                    cedula: button.getAttribute('data-cedula'),
                    nombres: button.getAttribute('data-nombres'),
                    apellidos: button.getAttribute('data-apellidos'),
                    fecha_nac: button.getAttribute('data-fecha_nac'),
                    correo: button.getAttribute('data-correo'),
                    direccion: button.getAttribute('data-direccion'),
                    telefono: button.getAttribute('data-nro_telefono'),
                    grado_inst: button.getAttribute('data-grado_inst'),
                    profesion: button.getAttribute('data-profesion'),
                    trabaja: button.getAttribute('data-trabaja'),
                    n_empresa: button.getAttribute('data-nombre_empr'),
                    t_empresa: button.getAttribute('data-telefono_empr'),
                    d_empresa: button.getAttribute('data-direccion_empr'),
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idVer").value = originalValues.id;
                document.getElementById("cedulaVer").value = originalValues.cedula;
                document.getElementById("nombresVer").value = originalValues.nombres;
                document.getElementById("apellidosVer").value = originalValues.apellidos;
                document.getElementById("fecha_nacVer").value = originalValues.fecha_nac;
                document.getElementById("correoVer").value = originalValues.correo;
                document.getElementById("direccionVer").value = originalValues.direccion;
                document.getElementById("nro_telefonoVer").value = originalValues.telefono;
                document.getElementById("grado_instVer").value = originalValues.grado_inst;
                document.getElementById("profesionVer").value = originalValues.profesion;
                document.getElementById("trabajaVer").value = originalValues.trabaja;
                document.getElementById("nombre_emprVer").value = originalValues.n_empresa;
                document.getElementById("telefono_emprVer").value = originalValues.t_empresa;
                document.getElementById("direccion_emprVer").value = originalValues.d_empresa;
            });
 });
    </script>