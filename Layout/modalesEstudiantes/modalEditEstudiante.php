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
<div class="modal fade" id="formModalEditEst" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Información Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../controller_php/controlador_EditEstudiante.php" method="POST" id="formEditEstudiante">
                    <div class="row">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="idEst" name="idEst" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="cedula_est" name="cedula_est">
                                <p class="error" id="cedula_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo3" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos_est" name="apellidos_est">
                                <p class="error" id="apellidos_estError"></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombres_est" name="nombres_est">
                                <p class="error" id="nombres_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Sexo</label>
                                <input type="text" class="form-control" id="sexo" name="sexo">
                                <p class="error" id="sexoError"></p>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo4" class="form-label">Fecha de Nacimiento</label>
                                <input type="text" class="form-control" id="f_nacimiento_est" name="f_nacimiento_est">
                                <p class="error" id="f_nacimiento_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Edad</label>
                                <input type="text" class="form-control" id="edad_est" name="edad_est">
                                <p class="error" id="edad_estError"></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion_est" name="direccion_est">
                                <p class="error" id="direccion_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Lugar de nacimiento</label>
                                <input type="text" class="form-control" id="lugar_nac_est" name="lugar_nac_est">
                                <p class="error" id="lugar_nac_estError"></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Colegio Anterior</label>
                                <input type="text" class="form-control" id="colegio_ant_est" name="colegio_ant_est">
                                <p class="error" id="colegio_ant_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo1" class="form-label">Motivo de Retiro</label>
                                <input type="text" class="form-control" id="motivo_ret_est" name="motivo_ret_est">
                                <p class="error" id="motivo_ret_estError"></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Nivelación</label>
                                <input type="text" class="form-control" id="nivelacion_est" name="nivelacion_est">
                                <p class="error" id="nivelacion_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Explicación</label>
                                <input type="text" class="form-control" id="explicacion_est" name="explicacion_est">
                                <p class="error" id="explicacion_estError"></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Grado</label>
                                <input type="text" class="form-control" id="grado_est" name="grado_est">
                                <p class="error" id="grado_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Turno</label>
                                <input type="text" class="form-control" id="turno_est" name="turno_est">
                                <p class="error" id="turno_estError"></p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Problemas Respiratorios</label>
                                <input type="text" class="form-control" id="problem_resp_est" name="problem_resp_est">
                                <p class="error" id="problem_resp_estError"></p>

                            </div>
                            <div class="mb-3">
                                <label for="campo2" class="form-label">Alergias</label>
                                <input type="text" class="form-control" id="alergias_est" name="alergias_est">
                                <p class="" id="Erroralergias_est"></p>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="campo2" class="form-label">Vacunas</label>
                            <input type="text" class="form-control" id="vacunas_est" name="vacunas_est">
                            <p class="error" id="vacunas_estError"></p>

                        </div>
                        <div class="mb-3">
                            <label for="campo2" class="form-label">Enfermedades</label>
                            <input type="text" class="form-control" id="enfermedad_est" name="enfermedad_est">
                            <p class="error" id="enfermedad_estError"></p>

                        </div>
                        <button type="submit" class="btn btn-success" style="width: 100%;">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("formModalEditEst");
        var originalValues = {};
        var isSubmitting = false;

        // Configuración de validación para cada campo
        const validationRules = {
            idEst: {
                required: true,
                regex: /^[0-9]{1,9}$/,
                errorMsg: "ID inválido"
            },
            cedula_est: {
                required: false,
                //REGEX  VALIDAR CASOS PRIMARIA UNA O MÁS LETRAS (ARTIFICAL) ANTES DE NÚMEROS
                regex: /^[a-zA-Z]+\d+$/,
                errorMsg: "Formato cédula inválido (Ej: V12345678)"
            },
            nombres_est: {
                required: true,
                regex: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,}$/,
                errorMsg: "Mínimo 3 letras, solo caracteres alfabéticos"
            },
            apellidos_est: {
                required: true,
                regex: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,}$/,
                errorMsg: "Mínimo 3 letras, solo caracteres alfabéticos"
            },
            sexo: {
                required: true,
                regex: /^(M|F)$/i,
                errorMsg: "Seleccione una opción válida (M|F)"
            },
            f_nacimiento_est: {
                required: true,
                regex: /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/,
                errorMsg: "Formato fecha inválido (DD-MM-AAAA)"
            },
            edad_est: {
                required: true,
                regex: /^[0-9]{1,2}$/,
                errorMsg: "Edad inválida (1-100)"
            },
            direccion_est: {
                required: true,
                regex: /^.{10,}$/,
                errorMsg: "Mínimo 10 caracteres"
            },
            lugar_nac_est: {
                required: true,
                regex: /^.{5,}$/,
                errorMsg: "Mínimo 5 caracteres"
            },
            colegio_ant_est: {
                required: true,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            motivo_ret_est: {
                required: true,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            nivelacion_est: {
                required: true,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            explicacion_est: {
                required: true,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres",
            },
            grado_est: {
                required: true,
                regex: /[a-zA-Z0-9]/,
                errorMsg: "Grado inválido"
            },
            turno_est: {
                required: true,
                regex: /^(Mañana)$/i,
                errorMsg: "Seleccione Mañana"
            },
            problem_resp_est: {
                required: false,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            alergias_est: {
                required: false,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            vacunas_est: {
                required: false,
                regex: /^.{0,50}$/,
                errorMsg: "Máximo 50 caracteres"
            },
            enfermedad_est: {
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
                cedula_est: button.getAttribute('data-cedula_est'),
                nombres_est: button.getAttribute('data-nombres_est'),
                apellidos_est: button.getAttribute('data-apellidos_est'),
                sexo: button.getAttribute('data-sexo'),
                f_nacimiento_est: button.getAttribute('data-f_nacimiento_est'),
                edad_est: button.getAttribute('data-edad_est'),
                direccion_est: button.getAttribute('data-direccion_est'),
                lugar_nac_est: button.getAttribute('data-lugar_nac_est'),
                colegio_ant_est: button.getAttribute('data-colegio_ant_est'),
                motivo_ret_est: button.getAttribute('data-motivo_ret_est'),
                nivelacion_est: button.getAttribute('data-nivelacion_est'),
                explicacion_est: button.getAttribute('data-explicacion_est'),
                grado_est: button.getAttribute('data-grado_est'),
                turno_est: button.getAttribute('data-turno_est'),
                problem_resp_est: button.getAttribute('data-problem_resp_est'),
                alergias_est: button.getAttribute('data-alergias_est'),
                vacunas_est: button.getAttribute('data-vacunas_est'),
                enfermedad_est: button.getAttribute('data-enfermedad_est')
            };

            // Asignar valores a los campos
            Object.keys(originalValues).forEach(key => {
                const field = document.getElementById(key === 'id' ? 'idEst' : key);
                if (field) field.value = originalValues[key] || '';
            });
        });

         function limpiarErrores() {
            document.querySelectorAll(".error").forEach(el => el.textContent = "");
        }

        // Limpiar campos y errores cuando el modal se oculta
        modal.addEventListener('hidden.bs.modal', function () {
            // Limpiar campos del formulario
            document.getElementById('formEditEstudiante').reset();

            // Limpiar mensajes de error
            limpiarErrores();
        });


        // Validar un campo individual
        function validarCampo(fieldId) {
            const rule = validationRules[fieldId];
            if (!rule) return true; // Si no hay regla, se considera válido

            const field = document.getElementById(fieldId);
            if (!field) return true; // Si no existe el campo, se considera válido

            const value = field.value.trim();
            const errorElement = document.getElementById(`${fieldId}Error`);

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
        var form = document.getElementById("formEditEstudiante");
        if (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault();

                if (!validarFormulario()) {
                    isSubmitting = false; // Restablecer si la validación falla
                    return;
                } else {
                    if (!isSubmitting) {
                        isSubmitting = true;

                        // Obtener el valor actual y el original de la cédula
                        const currentCedula = document.getElementById("cedula_est").value.trim();
                        const originalCedula = originalValues.cedula_est || '';

                        // Solo validar si la cédula ha cambiado
                        if (currentCedula !== originalCedula) {
                            $.ajax({
                                url: "../AJAX/AJAX_Estudiantes/searchDniEstudiante.php",
                                type: "POST",
                                data: $("#formEditEstudiante").serialize(),
                                success: function (resultado) {
                                    $("#cedula_estError").html(resultado);

                                    var errores = document.getElementById("cedula_estError").textContent;

                                    if (errores.trim() === "") {
                                        mostrarConfirmacion();
                                    } else {
                                        console.log("Error en la validación: ", errores);
                                        isSubmitting = false; // Restablecer bandera
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error("Error en la solicitud AJAX:", status, error);
                                    isSubmitting = false;
                                }
                            });
                        } else {
                            // Si la cédula no ha cambiado, enviar el formulario directamente
                            mostrarConfirmacion();
                        }
                    }
                }
            });
        }

        function mostrarConfirmacion() {
            let titulo = "¿Desea editar la información del estudiante?";

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
                        text: "La información del estudiante se editó correctamente.",
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