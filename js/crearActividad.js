document.addEventListener("DOMContentLoaded", function () {
            buscarGradoxNivel();
            document.getElementById("form-RegisterActividad").addEventListener("submit", function (event) {
                event.preventDefault(); // Prevenir el envío del formulario

                let isSubmitting = true;
                var gradoActividad = document.getElementById("gradoActividad").value.trim();
                var profesorActividad = document.getElementById("profesorActividad").value.trim();
                var asignatura = document.getElementById("asignatura").value.trim();
                var actividad = document.getElementById("actividad").value.trim();

                const regexName = /^[A-Za-zÑñÁÉÍÓÚÜáéíóúü\s\.,'-]+$/;

                if (!gradoActividad || gradoActividad == "Seleccionar") {
                    document.getElementById("ErrorGradoActividad").textContent = "El grado de la actividad es obligatorio";
                    isSubmitting = false;
                } else {
                    document.getElementById("ErrorGradoActividad").textContent = "";
                }

                if (!asignatura || asignatura == "Seleccionar") {
                    document.getElementById("ErrorAsignatura").textContent = "Seleccione una asignatura correcta";
                    isSubmitting = false;
                } else {
                    document.getElementById("ErrorAsignatura").textContent = "";
                }

                if (!actividad) {
                    document.getElementById("ErrorActividad").textContent = "La actividad se encuentra vacia";
                    isSubmitting = false;
                } else {
                    document.getElementById("ErrorActividad").textContent = "";
                }

                if (!profesorActividad || profesorActividad == "Seleccionar") {
                    document.getElementById("ErrorProfesorActividad").textContent = "El profesor se encuentra vacio";
                    isSubmitting = false;
                } else {
                    document.getElementById("ErrorProfesorActividad").textContent = "";
                }

                if (isSubmitting) {
                   $.ajax({
                        url: "../AJAX/AJAX_Calificaciones/existeActividad.php",
                        type: "POST",
                        data: $("#form-RegisterActividad").serialize(),
                        success: function (resultado) {
                            //Mostramos mensajesde AJAX devueltos
                            $("#ErrorActividad").html(resultado);

                            var errores = document.getElementById("ErrorActividad").textContent;

                            if (errores.trim() === "") {
                               $("#form-RegisterActividad").submit(); 
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
                document.getElementById("form-RegisterActividad").reset();
            }

            // Limpiar al cargar la página
            limpiarFormulario();
        });

        function contarCaracteres() {
            const textarea = document.getElementById('actividad');
            const contador = document.getElementById('contador');
            const charCounter = contador.parentElement;
            const caracteres = textarea.value.length;

            contador.textContent = caracteres;

            // Cambiar colores según se acerca al límite
            charCounter.classList.remove('warning', 'error');

            if (caracteres > 180) {
                charCounter.classList.add('warning');
            }

            if (caracteres >= 200) {
                charCounter.classList.add('error');
            }
        }

        function buscarGradoxNivel() {
            $.ajax({
                url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
                type: "POST",
                data: $("#form-RegisterActividad").serialize(),
                success: function (resultado) {
                    $("#gradoActividad").html(resultado);
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        }

        function cargarSelectMateriasxProfesor() {
            $.ajax({
                type: "POST",
                url: "../AJAX/AJAX_Calificaciones/consultarPrCalificacion.php",
                data: $("#form-RegisterActividad").serialize(),
                success: function (resultado) {
                    $("#profesorActividad").html(resultado);
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        }

        function cargarProfesorxGrado() {
            $.ajax({
                type: "POST",
                url: "../AJAX/AJAX_Calificaciones/consultarPrDocente.php",
                data: $("#form-RegisterActividad").serialize(),
                success: function (resultado) {
                    $("#asignatura").html(resultado);
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        }