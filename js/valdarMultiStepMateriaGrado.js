  var form1 = document.getElementById("form1-grados");
                var form2 = document.getElementById("form2-grados");
                var back1 = document.getElementById("back1");
                var progress = document.getElementById("progress-grados");

                // Mostrar el primer formulario al cargar la página
                form1.classList.add("active");
                progress.style.width = "50.00%";

                document.addEventListener("click", function (event) {
                    if (event.target.classList.contains("next1")) {
                        var button = event.target;
                        var id = button.getAttribute("data-id");
                        var nombre = button.getAttribute("data-nombre");

                        document.getElementById("categoriaGrado").value = id;
                        document.getElementById("materiasxGrado").value = nombre;

                        form1.classList.remove("active");
                        form2.classList.add("active");
                        progress.style.width = "100.00%";
                        CategoriaMateria();
                    }
                });

                back1.onclick = function () {
                    const errorElements = document.querySelectorAll("#form2-grados .errorFormMultiPr");
                    errorElements.forEach((el) => {
                        el.textContent = "";
                    });
                    form2.classList.remove("active");
                    form1.classList.add("active");
                    progress.style.width = "50.00%";

                    document.getElementById("categoriaGrado").value = "";
                    document.getElementById("nombreGrado").value = "Seleccionar";
                };

                function buscarGradodeMaterias() {
                    $.ajax({
                        url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
                        type: "POST",
                        data: $("#form2-grados").serialize(),
                        success: function (resultado) {
                            $("#nombreGrado").html(resultado);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                        }
                    });
                }

                function validarExisteMateria() {
                    $.ajax({
                        type: "POST",
                        url: "../AJAX/AJAX_Materias/searchNombreMateriaG.php",
                        data: $("#form2-grados").serialize(),
                        success: function (data) {
                            $("#errorNombreGrado").html(data);

                            var errores = document.getElementById("errorNombreGrado").textContent;

                            if (errores.trim() === "") {
                                document.getElementById("form2-grados").submit();
                            } else {
                                console.log("Error en la validación: ", errores);
                            }
                        },
                    });
                }

                document.addEventListener("DOMContentLoaded", function () {
                    document.getElementById("form2-grados").addEventListener("submit", function (event) {
                        event.preventDefault();
                        const errorElements = document.querySelectorAll(".errorFormMultiPr");
                        errorElements.forEach((el) => {
                            el.textContent = "";
                        });

                        const regexName = /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
                        let isValid = true;

                        let id = document.getElementById("categoriaGrado").value.trim();
                        let nombre = document.getElementById("nombreGrado").value.trim();
                        let grado = document.getElementById("materiasxGrado").value.trim();

                        if (!id) {
                            isValid = false;
                            document.getElementById("errorCategoriaGrado").textContent = "El campo nivel del grado es obligatorio";
                        } else if (!regexName.test(id)) {
                            isValid = false;
                            document.getElementById("errorCategoriaGrado").textContent = "Formato inválido: Ingrese solo letras con espacios";
                        }

                        if (!nombre) {
                            isValid = false;
                            document.getElementById("errorNombreGrado").textContent = "El campo nombre del grado es obligatorio";
                        }

                        if (!grado) {
                            isValid = false;
                            document.getElementById("errorMateriaPG").textContent = "El campo materia es obligatorio";
                        } else if (grado == "Seleccionar") {
                            isValid = false;
                            document.getElementById("errorMateriaPG").textContent = "Seleccione una materia";
                        }

                        if (isValid) {
                            validarExisteMateria();
                        }
                    });

                    // Resetear modal al abrir
                    document.getElementById('btn-modal-grados').addEventListener('change', function () {
                        if (this.checked) {
                            form2.classList.remove("active");
                            form1.classList.add("active");
                            progress.style.width = "50.00%";

                            const errorElements = document.querySelectorAll(".errorFormMultiPr");
                            errorElements.forEach((el) => {
                                el.textContent = "";
                            });

                            document.getElementById("categoriaGrado").value = "";
                            document.getElementById("nombreGrado").value = "Seleccionar";
                            document.getElementById("materiasxGrado").innerHTML = '<option value="Seleccionar">Seleccionar</option>';
                        }
                    });
                });