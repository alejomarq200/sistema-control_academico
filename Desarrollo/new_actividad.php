<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesActividades/regActividad.css">
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <div class="container">
                    <div class="form-container">
                        <div class="education-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h1 class="form-title">Registro de Actividades</h1>
                        <form action="../controller_php/controller_CreateActividad.php" method="POST"
                            id="form-RegisterActividad">
                            <div class="mb-4">
                                <input type="hidden" name="categoriaGrado" id="categoriaGrado" value="Primaria"
                                    style="display: none;" readonly>
                                <label for="gradoActividad" class="form-label"><i class="fas fa-layer-group"></i> Grado
                                    de la actividad</label>
                                <select class="form-select" name="gradoActividad" id="gradoActividad"
                                    onchange="cargarSelectMateriasxProfesor()">
                                    <option value="Seleccionar">Seleccionar</option>
                                </select>
                                <p class="error1" id="ErrorGradoActividad"></p>
                            </div>
                            <div class="mb-4">
                                <label for="profesorActividad" class="form-label"><i class="bi bi-person-square"></i>
                                    Nombre del
                                    Profesor</label>
                                <select class="form-select" name="profesorActividad" id="profesorActividad"
                                    onchange="cargarProfesorxGrado()">
                                    <option value="Seleccionar" selected>Seleccione un Profesor...</option>
                                </select>
                                <p class="error1" id="ErrorProfesorActividad"></p>
                            </div>
                            <div class="mb-4">
                                <label for="asignatura" class="form-label"><i class="fas fa-font"></i> </i> Nombre
                                    de la
                                    Asignatura</label>
                                <select class="form-select" name="asignatura" id="asignatura">
                                    <option value="Seleccionar" selected>Seleccione una asignatura...</option>
                                </select>
                                <p class="error1" id="ErrorAsignatura"></p>
                            </div>
                            <div class="textarea-container">
                                <textarea name="actividad" id="actividad" class="styled-textarea"
                                    placeholder="Ingrese la descripción de la actividad" maxlength="200"
                                    oninput="contarCaracteres()"></textarea>
                                <div class="textarea-footer">
                                    <span class="error1" id="ErrorActividad"></span>
                                    <span class="char-counter"><span id="contador">0</span>/200</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-plus-circle"></i> Registrar Activdad
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
<script>
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
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>