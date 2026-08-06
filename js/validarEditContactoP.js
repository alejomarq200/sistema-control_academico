    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("formModalContactoP");
        var originalValues = {};
        var isSubmitting = false;

        // Corrige el objeto validationRules para que coincida con los IDs del HTML
        const validationRules = {
            idContacto: {
                required: true,
                regex: /^[0-9]{1,9}$/,
                errorMsg: "ID inválido"
            },
            cedulaContacto: {
                required: true,
                regex: /^[V|E][0-9]{7,9}$/i,
                errorMsg: "Formato cédula inválido (Ej: V12345678)"
            },
            nombresContacto: {
                required: true,
                regex: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,}$/,
                errorMsg: "Mínimo 3 letras, solo caracteres alfabéticos"
            },
            apellidosContacto: {
                required: true,
                regex: /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]{3,}$/,
                errorMsg: "Mínimo 3 letras, solo caracteres alfabéticos"
            },
            correoContacto: {
                required: true,
                regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                errorMsg: "Formato de correo inválido"
            },
            direccionContacto: {
                required: true,
                regex: /^.{10,}$/,
                errorMsg: "Mínimo 10 caracteres"
            },
            nro_telefonoContacto: {
                required: true,
                regex: /^(0414|0424|0412|0416|0426)[0-9]{7}$/,
                errorMsg: "Número telefónico inválido (11 dígitos)"
            },
            grado_instContacto: {
                required: true,
                regex: /^.{3,}$/,
                errorMsg: "Mínimo 3 caracteres"
            },
            profesionContacto: {
                required: true,
                regex: /^.{3,}$/,
                errorMsg: "Mínimo 3 caracteres"
            },
            trabajaContacto: {
                required: true,
                regex: /^(Sí|Si|No)$/i,
                errorMsg: "Seleccione Sí o No"
            },
            nombre_emprContacto: {
                required: function () {
                    return document.getElementById('trabajaContacto').value.trim().toLowerCase() === 'si';
                },
                regex: /^.{3,50}$/,
                errorMsg: "Mínimo 3, máximo 50 caracteres"
            },
            telefono_emprContacto: {
                required: function () {
                    return document.getElementById('trabajaContacto').value.trim().toLowerCase() === 'si';
                },
                regex: /^(0414|0424|0412|0416|0426)[0-9]{7}$/,
                errorMsg: "Número telefónico inválido (11 dígitos)"
            },
            direccion_emprContacto: {
                required: function () {
                    return document.getElementById('trabajaContacto').value.trim().toLowerCase() === 'si';
                },
                regex: /^.{3,50}$/,
                errorMsg: "Mínimo 3, máximo 50 caracteres"
            }
        };

        // Cargar datos originales al abrir el modal

        modal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            // Obtener valores desde data-attributes
            const cedula = button.getAttribute('data-cedula') || '';
            const telefono = button.getAttribute('data-telefono') || '';

            // Guardar los valores originales en la variable global
            originalValues = {
                cedula: cedula.trim(),
                nro_telefono: telefono.trim()
            };

            // Asignar a los campos del formulario
            document.getElementById("idContacto").value = button.getAttribute('data-id');
            document.getElementById("cedulaContacto").value = cedula;
            document.getElementById("apellidosContacto").value = button.getAttribute('data-apellidos') || '';
            document.getElementById("nombresContacto").value = button.getAttribute('data-nombres') || '';
            document.getElementById("direccionContacto").value = button.getAttribute('data-direccion') || '';
            document.getElementById("correoContacto").value = button.getAttribute('data-correo') || '';
            document.getElementById("nro_telefonoContacto").value = telefono;
            document.getElementById("grado_instContacto").value = button.getAttribute('data-grado_inst') || '';
            document.getElementById("profesionContacto").value = button.getAttribute('data-profesion') || '';
            document.getElementById("nombre_emprContacto").value = button.getAttribute('data-nombre_empresa') || '';
            document.getElementById("trabajaContacto").value = button.getAttribute('data-trabaja') || '';
            document.getElementById("direccion_emprContacto").value = button.getAttribute('data-direccion_empresa') || '';
            document.getElementById("telefono_emprContacto").value = button.getAttribute('data-telefono_empresa') || '';
        });



        // Limpiar mensajes de error
        function limpiarErrores() {
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

        var form = document.querySelector("#formEditContacto");

        // Modifica la función validarFormulario para manejar campos condicionales
        function validarFormulario() {
            limpiarErrores();
            let isValid = true;

            Object.keys(validationRules).forEach(fieldId => {
                const rule = validationRules[fieldId];
                const isRequired = typeof rule.required === 'function' ? rule.required() : rule.required;

                // Solo validar si es requerido o si tiene valor
                const fieldValue = document.getElementById(fieldId)?.value.trim();
                if (isRequired || fieldValue) {
                    if (!validarCampo(fieldId)) {
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        // Función para verificar cambios en campos críticos
        function hayCambiosEnCamposCriticos() {
            const cedulaActual = document.getElementById("cedulaContacto").value.trim();
            const telefonoActual = document.getElementById("nro_telefonoContacto").value.trim();

            const cambios = {
                cedula: cedulaActual !== originalValues.cedula,
                telefono: telefonoActual !== originalValues.nro_telefono
            };

            return cambios;
        }

        // Limpiar campos y errores cuando el modal se oculta
        modal.addEventListener('hidden.bs.modal', function () {
            // Limpiar campos del formulario
            document.getElementById('formEditContacto').reset();

            // Limpiar mensajes de error
            limpiarErrores();
        });

        // Función para limpiar errores
        function limpiarErrores() {
            document.querySelectorAll(".error").forEach(el => el.textContent = "");
        }

        // Actualiza el evento submit
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            if (isSubmitting) return;

            isSubmitting = true;

            if (!validarFormulario()) {
                isSubmitting = false;
                return;
            }
            // Verificar si hay cambios en campos críticos
            const cambios = hayCambiosEnCamposCriticos();
            const hayCambiosCriticos = cambios.cedula || cambios.telefono;

            if (!hayCambiosCriticos) {
                // No hay cambios en campos críticos - enviar directamente
                mostrarConfirmacion();
            } else {
                // Hay cambios en campos críticos - validar con AJAX
                isSubmitting = true;

                $.ajax({
                    url: "../AJAX/AJAX_Representantes/searchInfoContactoPago.php",
                    type: "POST",
                    data: $(form).serialize(),
                    success: function (resultado) {
                        const errores = resultado.split('|||');

                        // Mostrar errores solo para los campos que cambiaron
                        if (cambios.cedula) $("#cedulaContacto_RprError").html(errores[0]);
                        if (cambios.telefono) $("#nro_telefonoContacto_RprError").html(errores[1]);

                        // Verificar si no hay errores en los campos que cambiaron
                        const sinErrores =
                            (!cambios.cedula || $("#cedulaContacto_RprError").text().trim() === "") &&
                            (!cambios.telefono || $("#nro_telefonoContacto_RprError").text().trim() === "");

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

        function mostrarConfirmacion() {
            let titulo = "¿Desea editar la información del contacto?";

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
                        text: "La información del contacto se editó correctamente.",
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