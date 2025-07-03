  document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("form-RegisterMateria").addEventListener("submit", function (event) {
                event.preventDefault(); // Prevenir el envío del formulario

                let isSubmitting = true;
                var nombre = document.getElementById("nombreCreateM").value.trim();
                var nivelMateria = document.getElementById("nivelCreateM").value.trim();
                const regexName = /^[A-Za-zÑñÁÉÍÓÚÜáéíóúü\s\.,'-]+$/;

                // Limpiar errores previos
                document.getElementById("nombreErrorCreateM").textContent = "";
                document.getElementById("nivelErrorCreateM").textContent = "";

                if (!nombre) {
                    document.getElementById("nombreErrorCreateM").textContent = "El nombre de la materia es obligatorio";
                    isSubmitting = false;
                } else if (!regexName.test(nombre)) {
                    document.getElementById("nombreErrorCreateM").textContent = "Formato inválido: Ingrese solo letras con espacios";
                    isSubmitting = false;
                }

                if (!nivelMateria || nivelMateria == "Seleccionar") {
                    document.getElementById("nivelErrorCreateM").textContent = "Seleccione un nivel de materia correcto";
                    isSubmitting = false;
                }

                if (isSubmitting) {
                    $.ajax({
                        url: "../AJAX/AJAX_Materias/searchNombreMateria.php",
                        type: "POST",
                        data: $("#form-RegisterMateria").serialize(),
                        success: function (resultado) {
                            //Mostramos mensajesde AJAX devueltos
                            $("#nombreErrorCreateM").html(resultado);

                            var errores = document.getElementById("nombreErrorCreateM").textContent;

                            if (errores.trim() === "") {
                                $("#form-RegisterMateria")[0].submit(); // Enviar formulario una sola vez
                            } else {
                                console.log("Error en la validación: ", errores);
                                isSubmitting = false; // Restablecer bandera
                            }
                        },
                        //Controlamos error de AJAX
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", status, error);
                            isSubmitting = false;
                        }
                    });
                }
            });

            // Función para limpiar el formulario
            function limpiarFormulario() {
                document.getElementById("form-RegisterMateria").reset();
                document.getElementById("nombreErrorCreateM").textContent = "";
                document.getElementById("nivelErrorCreateM").textContent = "";
            }

            // Limpiar al cargar la página
            limpiarFormulario();
        });