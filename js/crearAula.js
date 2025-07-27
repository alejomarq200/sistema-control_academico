 document.addEventListener("DOMContentLoaded", function() {
            // Obtener el año actual
            const añoActual = new Date().getFullYear();
            // Calcular el año siguiente
            const añoSiguiente = añoActual + 1;
            // Formatear como "2024-2025"
            const añoEscolar = `${añoActual}-${añoSiguiente}`;

            // Asignar el valor al input
            document.getElementById('anioAula').value = añoEscolar;

            function cargarGrados() {
                $.ajax({
                    url: "../AJAX/AJAX_Inscripcion/searchGradosInscr.php",
                    type: "POST",
                    data: {
                        action: 'cargar_grados'
                    }, // Enviamos una acción específica
                    success: function(resultado) {
                        $("#gradoAula").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX:", error);
                        $("#gradoAula").html('<option value="Error">Error al cargar grados</option>');
                    }
                });
            }
            cargarGrados();
            document.getElementById("form-RegisterAula").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevenir el envío del formulario

                let isSubmitting = true;
                // Obtener valores de los campos
                const formuluario = document.getElementById("form-RegisterAula");
                var anioAula = document.getElementById("anioAula").value.trim();
                var nombreAula = document.getElementById("nombreAula").value.trim();
                var capacidadAula = document.getElementById("capacidadAula").value.trim();
                var gradoAula = document.getElementById("gradoAula").value.trim();
                const regexName = /^[A-Za-zÁ-Úá-úñÑ\s]+\s\d+$/u;

                // Validar campos
                if (!anioAula) {
                    document.getElementById("anioErrorCreateA").textContent = "El año del aula es obligatorio";
                    isSubmitting = false;
                }

                if (!nombreAula) {
                    document.getElementById("nombreErrorCreateA").textContent = "El nombre del aula es obligatorio";
                    isSubmitting = false;
                } else if (!regexName.test(nombreAula)) {
                    document.getElementById("nombreErrorCreateA").textContent = "Formato inválido: Ingrese solo letras y un espacio seguido de un número";
                    isSubmitting = false;
                } else {
                    document.getElementById("nombreErrorCreateA").textContent = ""; // Limpiar error si es válido
                }

                if (capacidadAula && isNaN(capacidadAula)) {
                    document.getElementById("capacidadErrorCreateA").textContent = "La capacidad del aula debe ser un número";
                    isSubmitting = false;
                } else if (!capacidadAula) {
                    document.getElementById("capacidadErrorCreateA").textContent = "La capacidad del aula es obligatoria";
                    isSubmitting = false;
                } else {
                    document.getElementById("capacidadErrorCreateA").textContent = ""; // Limpiar error si es válido
                }
                if (!gradoAula || gradoAula === "Seleccionar") {
                    document.getElementById("gradoErrorCreateA").textContent = "El grado del aula es obligatorio";
                    isSubmitting = false;
                } else {
                    document.getElementById("gradoErrorCreateA").textContent = ""; // Limpiar error si es válido    
                }

                if (isSubmitting) {
                    // Limpiar al cargar la página
                    $.ajax({
                        url: "../AJAX/AJAX_Aulas/searchNombreAula.php",
                        type: "POST",
                        data: $("#form-RegisterAula").serialize(),
                        success: function(resultado) {
                            var errores = resultado.split("|||");
                            $("#nombreErrorCreateA").html(errores[0]);
                            $("#gradoErrorCreateA").html(errores[1]);

                            if ($("#nombreErrorCreateA").text().trim() === "" &&
                                $("#gradoErrorCreateA").text().trim() === "") {
                                formuluario.submit(); // ✅ Envío final solo una vez
                            } else {
                                console.log("Error en la validación: ", errores);
                            }
                        },
                        //Controlamos error de AJAX
                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", status, error);
                            isSubmitting = false;
                        }
                    });
                    limpiarFormulario();
                }
            });

            // Función para limpiar el formulario
            function limpiarFormulario() {
                // Limpiar errores previos
                document.getElementById("anioErrorCreateA").textContent = "";
                document.getElementById("nombreErrorCreateA").textContent = "";
                document.getElementById("capacidadErrorCreateA").textContent = "";
                document.getElementById("gradoErrorCreateA").textContent = "";
            }
        });