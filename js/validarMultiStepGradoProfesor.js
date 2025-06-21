  document.getElementById("form2-gradosP").addEventListener("submit", function (event) {
                    event.preventDefault(); // Siempre prevenir el envío por defecto

                    // Limpiar errores previos
                    clearErrors();

                    // Validación inicial del lado del cliente
                    if (validateForm()) {
                    validarExisteGradoProfesor();
                    }
                });

                // Función para limpiar todos los mensajes de error
                function clearErrors() {
                    document.querySelectorAll("#form2-gradosP .error-custom").forEach(el => {
                        el.textContent = "";
                    });
                }

                // Validación del lado del cliente
                function validateForm() {
                    let isValid = true;
                    let cedulaProfesor = document.getElementById("cedulaProfesor-custom").value.trim();
                    let nombreProfesor = document.getElementById("nombreProfesor-custom").value.trim();
                    let categoria = document.getElementById("categoriaGrado-custom").value;
                    let nombreGrado = document.getElementById("grado-custom").value;

                    const regexDni = /^[V|E|J|P][0-9]{7,9}$/;
                    const regexName = /^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/;

                    // Validación de cédula
                    if (!cedulaProfesor) {
                        document.getElementById("errorCedulaPr-custom").textContent = "Campo cédula obligatorio";
                        isValid = false;
                    } else if (!regexDni.test(cedulaProfesor)) {
                        document.getElementById("errorCedulaPr-custom").textContent = "Formato de cédula inválido";
                        isValid = false;
                    }

                    // Validación de nombre
                    if (!nombreProfesor) {
                        document.getElementById("errorNombrPr-custom").textContent = "Campo nombre obligatorio";
                        isValid = false;
                    } else if (!regexName.test(nombreProfesor)) {
                        document.getElementById("errorNombrPr-custom").textContent = "Nombre inválido (mínimo 3 caracteres)";
                        isValid = false;
                    }

                    // Validación de categoría
                    if (!categoria || categoria === "No asignado") {
                        document.getElementById("errorCategoriaGrado-custom").textContent = "El nivel del grado es obligatorio";
                        isValid = false;
                    }

                    // Validación de grado
                    if (!nombreGrado || nombreGrado === "No asignado" || nombreGrado === "Seleccionar" || nombreGrado === "Error grado asignado") {
                        document.getElementById("errorGrado-custom").textContent = "Seleccione un grado válido";
                        isValid = false;
                    }

                    return isValid;
                }

                function validarExisteGradoProfesor() {
                    $.ajax({
                        type: "POST",
                        url: "../AJAX/SearchExisteGradoProfesor.php",
                        data: $("#form2-gradosP").serialize(),
                        success: function (data) {
                            // Insertar la respuesta del servidor en el elemento e_dni
                            $("#errorGrado-custom").html(data);

                            // Obtener el contenido del div "e_dni"
                            var errores = document.getElementById("errorGrado-custom").textContent;

                            if (errores.trim() === "") {
                                document.getElementById("form2-gradosP").submit();
                            } else {
                                console.log("Error en la validación: ", errores);
                            }
                        },
                    });
                }

                // Resto de tu código original (manejo de los formularios, botones, etc.)
                var form1Custom = document.getElementById("form1-gradosP");
                var form2Custom = document.getElementById("form2-gradosP");
                var back1Custom = document.getElementById("back1-custom");
                var progressCustom = document.getElementById("progress");

                // Mostrar el primer formulario al inicio
                form1Custom.classList.add("active");
                progressCustom.style.width = "50%";

                function CategoriaGrado() {
                    $.ajax({
                        url: "../AJAX/SearchGradoyCategoriaPr.php",
                        type: "POST",
                        data: $("#form2-gradosP").serialize(),
                        success: function (resultado) {
                            $("#grado-custom").html(resultado);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                        }
                    });
                }

                // Manejar clic en los botones next1-custom
                document.addEventListener("click", function (event) {
                    if (event.target.classList.contains("next1-custom")) {
                        var button = event.target;
                        var id = button.getAttribute("data-id-custom");
                        var nombre = button.getAttribute("data-nombre-custom");
                        var cedulaProfesor = button.getAttribute("data-cedula-Profesor");
                        var nombreProfesor = button.getAttribute("data-nombre-Profesor");

                        document.getElementById("cedulaProfesor-custom").value = cedulaProfesor;
                        document.getElementById("nombreProfesor-custom").value = nombreProfesor;
                        document.getElementById("categoriaGrado-custom").value = id;
                        document.getElementById("grado-custom").value = nombre;

                        form1Custom.classList.remove("active");
                        form2Custom.classList.add("active");
                        progressCustom.style.width = "100%";

                        CategoriaGrado();
                    }
                });

                // Manejar clic en el botón volver
                back1Custom.onclick = function () {
                    form2Custom.classList.remove("active");
                    form1Custom.classList.add("active");
                    progressCustom.style.width = "50%";

                    // Limpiar errores
                    clearErrors();
                };

                // Resetear modal al abrir
                document.getElementById('btn-modal-gradosP').addEventListener('change', function () {
                    if (this.checked) {
                        form2Custom.classList.remove("active");
                        form1Custom.classList.add("active");
                        progressCustom.style.width = "50%";

                        // Limpiar campos y errores
                        document.getElementById("categoriaGrado-custom").value = "No asignado";
                        document.getElementById("grado-custom").value = "No asignado";
                        clearErrors();
                    }
                });