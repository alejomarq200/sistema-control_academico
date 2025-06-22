<!-- Modal -->
<style>
    .error {
        text-align: left;
        padding-left: 0;
        color: red;
        font-size: 0.85rem;
        margin-top: 0.1rem;
        margin-bottom: 0.5rem;
    }
</style>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("formModal");
        var originalValues = {};
        var isSubmitting = false;

        // Configuración de validación para cada campo
        const validationRules = {
            id: {
                required: true,
                regex: /^[0-9]{1,9}$/,
                errorMsg: "ID inválido"
            },
            cedula: {
                required: true,
                regex: /^[V|E][0-9]{7,9}$/i,
                errorMsg: "Formato cédula inválido (Ej: V12345678)"
            },
            nombres: {
                required: true,
                regex: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,}$/,
                errorMsg: "Mínimo 3 letras, solo caracteres alfabéticos"
            },
            apellidos: {
                required: true,
                regex: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,}$/,
                errorMsg: "Mínimo 3 letras, solo caracteres alfabéticos"
            },
            fecha_nac: {
                required: true,
                regex: /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/,
                errorMsg: "Formato fecha inválido (DD-MM-YYYY)"
            },
            correo: {
                required: true,
                regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                errorMsg: "Formato de correo inválido"
            },
            direccion: {
                required: true,
                regex: /^.{10,}$/,
                errorMsg: "Mínimo 10 caracteres"
            },
            nro_telefono: {
                required: true,
                regex: /^(0414|0424|0412|0416|0426)[0-9]{7}$/,
                errorMsg: "Número telefónico inválido (11 dígitos)"
            },
            grado_inst: {
                required: true,
                regex: /^.{3,}$/,
                errorMsg: "Mínimo 3 caracteres"
            },
            profesion: {
                required: true,
                regex: /^.{3,}$/,
                errorMsg: "Mínimo 3 caracteres"
            },
            trabaja: {
                required: true,
                regex: /^(Sí|No)$/i,
                errorMsg: "Seleccione Sí o No"
            },
            nombre_empr: {
                required: false,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            telefono_empr: {
                required: false,
                regex: /^(0414|0424|0412|0416|0426)[0-9]{7}$/,
                errorMsg: "Número telefónico inválido (11 dígitos)"
            },
            direccion_empr: {
                required: false,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            }
        };

        function limpiarErrores() {
            document.querySelectorAll(".error").forEach(el => el.textContent = "");
        }

        // Limpiar campos y errores cuando el modal se oculta
        modal.addEventListener('hidden.bs.modal', function () {
            // Limpiar campos del formulario
            document.getElementById('formEditRepresentante').reset();

            // Limpiar mensajes de error
            limpiarErrores();
        });

        // Cargar datos originales al abrir el modal
        modal.addEventListener("show.bs.modal", function (event) {
            var button = event.relatedTarget;

            originalValues = {
                id: button.getAttribute('data-id'),
                cedula: button.getAttribute('data-cedula'),
                nombres: button.getAttribute('data-nombres'),
                apellidos: button.getAttribute('data-apellidos'),
                fecha_nac: button.getAttribute('data-fecha_nac'),
                correo: button.getAttribute('data-correo'),
                direccion: button.getAttribute('data-direccion'),
                nro_telefono: button.getAttribute('data-nro_telefono'),
                grado_inst: button.getAttribute('data-grado_inst'),
                profesion: button.getAttribute('data-profesion'),
                trabaja: button.getAttribute('data-trabaja'),
                nombre_empr: button.getAttribute('data-nombre_empr'),
                telefono_empr: button.getAttribute('data-telefono_empr'),
                direccion_empr: button.getAttribute('data-direccion_empr')
            };

            // Asignar valores a los campos
            Object.keys(originalValues).forEach(key => {
                const field = document.getElementById(key);
                if (field) field.value = originalValues[key] || '';
            });
        });

        // Validar un campo individual
        function validarCampo(fieldId) {
            const rule = validationRules[fieldId];
            if (!rule) return true; // Si no hay regla, se considera válido

            const field = document.getElementById(fieldId);
            if (!field) return true; // Si no existe el campo, se considera válido

            const value = field.value.trim();
            const errorElement = document.getElementById(`${fieldId}_RprError`);

            // Validar campo requerido
            const isRequired = typeof rule.required === 'function' ? rule.required() : rule.required;
            if (isRequired && !value) {
                if (errorElement) errorElement.textContent = "Este campo es requerido";
                return false;
            }

            // Si no es requerido y está vacío, es válido
            if (!isRequired && !value) return true;

            // Validar con regex si existe
            if (rule.regex && !rule.regex.test(value)) {
                if (errorElement) errorElement.textContent = rule.errorMsg;
                return false;
            }

            // Si pasa todas las validaciones
            if (errorElement) errorElement.textContent = "";
            return true;
        }

        // Validar todo el formulario
        function validarFormulario() {
            limpiarErrores();
            let isValid = true;

            Object.keys(validationRules).forEach(fieldId => {
                if (!validarCampo(fieldId)) {
                    isValid = false;
                }
            });

            if (!isValid) {
                isSubmitting = false; // Restablecer si hay errores
            }

            return isValid;
        }

        // Manejar envío del formulario
        var form = document.querySelector("#formEditRepresentante");
        // Función para verificar cambios en campos críticos
        function hayCambiosEnCamposCriticos() {
            // Obtener valores actuales del formulario
            const cedulaActual = document.getElementById("cedula").value.trim();
            const correoActual = document.getElementById("correo").value.trim();
            const telefonoActual = document.getElementById("nro_telefono").value.trim();

            // Comparar con los valores originales
            const cambios = {
                cedula: cedulaActual !== originalValues.cedula,
                correo: correoActual !== originalValues.correo,
                telefono: telefonoActual !== originalValues.nro_telefono
            };
            return cambios;
        }

        // Manejar envío del formulario
        if (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault();
                if (isSubmitting) return;

                if (!validarFormulario()) {
                    isSubmitting = false;
                    return;
                }

                // Verificar si hay cambios en campos críticos
                const cambios = hayCambiosEnCamposCriticos();
                const hayCambiosCriticos = cambios.cedula || cambios.correo || cambios.telefono;

                if (!hayCambiosCriticos) {
                    // No hay cambios en campos críticos - enviar directamente
                    mostrarConfirmacion();
                } else {
                    // Hay cambios en campos críticos - validar con AJAX
                    isSubmitting = true;

                    $.ajax({
                        url: "../AJAX/AJAX_Representantes/searchInfoRepresentante.php",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function (resultado) {
                            const errores = resultado.split('|||');

                            // Mostrar errores solo para los campos que cambiaron
                            if (cambios.cedula) $("#cedula_RprError").html(errores[0]);
                            if (cambios.correo) $("#correo_RprError").html(errores[1]);
                            if (cambios.telefono) $("#nro_telefono_RprError").html(errores[2]);

                            // Verificar si no hay errores en los campos que cambiaron
                            const sinErrores =
                                (!cambios.cedula || $("#cedula_RprError").text().trim() === "") &&
                                (!cambios.correo || $("#correo_RprError").text().trim() === "") &&
                                (!cambios.telefono || $("#nro_telefono_RprError").text().trim() === "");

                            if (sinErrores) {
                                mostrarConfirmacion();
                            } else {
                                isSubmitting = false;
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                            isSubmitting = false;
                        }
                    });
                }
            });
        }
        function mostrarConfirmacion() {
            let titulo = "¿Desea editar la información del representante?";

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: titulo,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, editar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Acción procesada con éxito",
                        text: "La información del representante se editó correctamente.",
                        icon: "success"
                    }).then(() => {
                        form.submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Acción cancelada",
                        text: "Se deshizo la acción de editar",
                        icon: "error"
                    });
                    isSubmitting = false;
                }
            });
        }
    });
</script>