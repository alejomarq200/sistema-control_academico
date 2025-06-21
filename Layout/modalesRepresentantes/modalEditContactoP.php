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
<div class="modal fade" id="formModalContactoP" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Información Contacto Pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller_php/controller_EditRepresentante" method="POST" id="formEditRepresentante">
                    <div class="row">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="idContacto" name="idContacto" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedulaContacto" name="cedulaContacto">
                                <p class="error" id="cedulaContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo3" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidosContacto" name="apellidosContacto">
                                <p class="error" id="apellidosContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombresContacto" name="nombresContacto">
                                <p class="error" id="nombresContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="correoContacto" name="correoContacto">
                                <p class="error" id="correoContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccionContacto" name="direccionContacto">
                                <p class="error" id="direccionContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Número telefónico</label>
                                <input type="text" class="form-control" id="nro_telefonoContacto"
                                    name="nro_telefonoContacto">
                                <p class="error" id="nro_telefonoContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Grado Instrucción</label>
                                <input type="text" class="form-control" id="grado_instContacto"
                                    name="grado_instContacto">
                                <p class="error" id="grado_instContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Profesión</label>
                                <input type="text" class="form-control" id="profesionContacto" name="profesionContacto">
                                <p class="error" id="profesionContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Trabaja</label>
                                <input type="text" class="form-control" id="trabajaContacto" name="trabajaContacto">
                                <p class="error" id="trabajaContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Dirección Empresa</label>
                                <input type="text" class="form-control" id="direccion_emprContacto"
                                    name="direccion_emprContacto">
                                <p class="error" id="direccion_emprContacto_RprError"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Nombre Empresa</label>
                                <input type="text" class="form-control" id="nombre_emprContacto"
                                    name="nombre_emprContacto">
                                <p class="error" id="nombre_emprContacto_RprError"></p>
                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Telefono Empresa</label>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("formModalContactoP");
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
                regex: /^[V|E|J|P][0-9]{7,9}$/i,
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
                regex: /^\d{4}-\d{2}-\d{2}$/,
                errorMsg: "Formato fecha inválido (AAAA-MM-DD)"
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
                regex: /^(Si|No)$/i,
                errorMsg: "Seleccione Si o No"
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

        // Cargar datos originales al abrir el modal
        modal.addEventListener("show.bs.modal", function (event) {
            var button = event.relatedTarget;

            originalValues = {
                id: button.getAttribute('data-id'),
                cedula: button.getAttribute('data-cedula'),
                nombres: button.getAttribute('data-nombres'),
                apellidos: button.getAttribute('data-apellidos'),
                direccion: button.getAttribute('data-direccion'),
                telefono: button.getAttribute('data-telefono'),
                correo: button.getAttribute('data-correo'),
                grado_inst: button.getAttribute('data-grado_inst'),
                profesion: button.getAttribute('data-profesion'),
                trabaja: button.getAttribute('data-trabaja'),
                nombre_empresa: button.getAttribute('data-nombre_empresa'),
                telefono_empresa: button.getAttribute('data-telefono_empresa'),
                direccion_empresa: button.getAttribute('data-direccion_empresa')

            };

            // Asignar valores a los campos del formulario
            document.getElementById("idContacto").value = originalValues.id;
            document.getElementById("cedulaContacto").value = originalValues.cedula;
            document.getElementById("apellidosContacto").value = originalValues.apellidos;
            document.getElementById("nombresContacto").value = originalValues.nombres;
            document.getElementById("correoContacto").value = originalValues.correo;
            document.getElementById("direccionContacto").value = originalValues.direccion;
            document.getElementById("nro_telefonoContacto").value = originalValues.telefono;
            document.getElementById("grado_instContacto").value = originalValues.grado_inst;
            document.getElementById("profesionContacto").value = originalValues.profesion;
            document.getElementById("nombre_emprContacto").value = originalValues.nombre_empresa;
            document.getElementById("trabajaContacto").value = originalValues.trabaja;
            document.getElementById("direccion_emprContacto").value = originalValues.direccion_empresa;
            document.getElementById("telefono_emprContacto").value = originalValues.telefono_empresa;

        });

        // Limpiar mensajes de error
        /*    function limpiarErrores() {
                document.querySelectorAll(".error").forEach(el => el.textContent = "");
            }
    
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
                    telefono:telefonoActual !== originalValues.nro_telefono
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
                                if(cambios.telefono) $("#nro_telefono_RprError").html(errores[2]);
    
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
            }*/
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