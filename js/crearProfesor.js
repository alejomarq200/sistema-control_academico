   document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("ModalFormP");
            var form = document.getElementById("form-RegisterProfesor");
            var isSubmitting = false; // Flag para controlar doble envío

            const regexDni = /^[0-9]{7,9}$/;
            const regexName = /^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/;
            const regexPhone = /^[0-9]{7}$/;

            function limpiarErrores() {
                document
                    .querySelectorAll(".erroresCreateP")
                    .forEach((el) => (el.textContent = ""));
                document.getElementById("cedulaCreateP").value = "";
                document.getElementById("nombreCreateP").value = "";
                document.getElementById("telefonoCreateP").value = "";
                document.getElementById("nivelProfesor").value = "Seleccionar";
            }

            function validarCampos() {
                let isValid = true;

                let id = document.getElementById("cedulaCreateP").value.trim();
                let nombre = document.getElementById("nombreCreateP").value.trim();
                let telefono = document.getElementById("telefonoCreateP").value.trim();
                let nivelProfesor = document.getElementById("nivelProfesor").value.trim();

                if (!id) {
                    document.getElementById("cedulaErrorCreateP").textContent =
                        "Cedula es obligatorio";
                    isValid = false;
                } else if (!regexDni.test(id)) {
                    document.getElementById("cedulaErrorCreateP").textContent =
                        "Formato inválido: Ingrese un mínimo de 7 digitos numéricos";
                    isValid = false;
                } else {
                    document.getElementById("cedulaErrorCreateP").textContent = "";
                }

                if (!nombre) {
                    document.getElementById("nombreErrorCreateP").textContent =
                        "Nombre es obligatorio";
                    isValid = false;
                } else if (!regexName.test(nombre)) {
                    document.getElementById("nombreErrorCreateP").textContent =
                        "Formato inválido: Ingrese solo letras con espacios";
                    isValid = false;
                } else {
                    document.getElementById("nombreErrorCreateP").textContent = "";
                }

                if (!telefono) {
                    document.getElementById("telefonoErrorCreateP").textContent =
                        "Telefono es obligatorio";
                    isValid = false;
                } else if (!regexPhone.test(telefono)) {
                    document.getElementById("telefonoErrorCreateP").textContent =
                        "Formato inválido: Ingrese 7 dígitos numéricos";
                    isValid = false;
                } else {
                    document.getElementById("telefonoErrorCreateP").textContent = "";
                }

                if (nivelProfesor != "Primaria" && nivelProfesor != "Secundaria") {
                    document.getElementById("nivelProfesorErrorCreateP").textContent = "Seleccione un nivel de profesor correcto";
                    isValid = false;
                } else {
                    document.getElementById("nivelProfesorErrorCreateP").textContent = "";
                }

                return isValid;
            }

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                if (isSubmitting) return; // 👈 Bloquea si ya se está enviando

                if (validarCampos()) {
                    isSubmitting = true; // 👈 Marca como en proceso

                    $.ajax({
                        url: "../AJAX/AJAX_Profesores/SearchDniPr.php",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function (resultado) {
                            var errores = resultado.split("|||");
                            $("#cedulaErrorCreateP").html(errores[0]);
                            $("#telefonoErrorCreateP").html(errores[1]);

                            if ($("#cedulaErrorCreateP").text().trim() === "" &&
                                $("#telefonoErrorCreateP").text().trim() === "") {
                                form.submit(); // ✅ Envío final solo una vez
                            } else {
                                isSubmitting = false; // ❗ Permitir nuevo intento si hay error
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:");
                            console.error("Status:", status);
                            console.error("Error:", error);
                            console.error("Respuesta del servidor:", xhr.responseText);
                            isSubmitting = false; // ❗ Reintento posible en caso de fallo AJAX
                        },
                    });
                }
            });

            modal.addEventListener("show.bs.modal", function () {
                limpiarErrores();
            });
        });