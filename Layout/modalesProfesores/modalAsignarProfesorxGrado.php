<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalAsignarProfesor.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
    <div class="modal fade" id="modalAsignarProfesorxGrado" tabindex="-1"
        aria-labelledby="modalLablemodalAsignarProfesorxGrado" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-asignarProfesorxGrado"
                    action="../controller_php/controller_AsignarProfesorxGrado.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLablemodalAsignarProfesorxGrado">Registrar profesor a grado
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="idProfesorxGrado" name="idProfesorxGrado">
                        </div>
                        <div class="mb-3">
                            <label for="cedulaProfesorxGrado" class="form-label">Cédula:</label>
                            <input type="text" class="form-control" id="cedulaProfesorxGrado"
                                name="cedulaProfesorxGrado" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nombreProfesorxGrado" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreProfesorxGrado"
                                name="nombreProfesorxGrado" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nivelxProfesor" class="form-label">Nivel:</label>
                            <input name="nivelxProfesor" id="nivelxProfesor" class="form-control" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="gradosxProfesor" class="form-label">Grados:</label>
                            <select name="gradosxProfesor" id="gradosxProfesor" class="form-select">
                                <option value="Seleccionar">Seleccionar</option>
                            </select>
                        </div>
                        <span class="error" id="error-profesorxGrado"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Asignar</button>
                        <button type="button" class="btn btn-secondary" id="cerrar"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("modalAsignarProfesorxGrado");
        const formulario = document.getElementById('form-asignarProfesorxGrado');

        // Al abrir la modal: setear nombre/id y limpiar selects anteriores
        modal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute("data-id-profesor");
            const cedula = button.getAttribute("data-cedula-profesor");
            const nombre = button.getAttribute("data-nombre-profesor");
            const nivel = button.getAttribute("data-nivel-profesor");

            document.getElementById("idProfesorxGrado").value = id;
            document.getElementById("cedulaProfesorxGrado").value = cedula;
            document.getElementById("nombreProfesorxGrado").value = nombre;
            document.getElementById("nivelxProfesor").value = nivel;

            // Limpiar errores
            document.getElementById('error-profesorxGrado').textContent = "";

            // Cargar grados del profesor (rellena selectGrado)
            cargarGradosProfesor();
        });

        formulario.addEventListener('submit', function (e) {
            e.preventDefault();

            // Obtener campos
            let id = document.getElementById('idProfesorxGrado').value.trim();
            let grados = document.getElementById('gradosxProfesor').value;

            // Declarar flag
            let validar = true;

            // Validacion sencilla
            if (!id) {
                validar = false;
            } 
          
            if (grados == 'Seleccionar') {
                document.getElementById('error-profesorxGrado').textContent = "El campo grado es obligatorio";
                validar = false;
            } else {
                document.getElementById('error-profesorxGrado').textContent = "";
            }

            if (validar) {
               poseeGrados(id, grados);
            }
        });

        function poseeGrados(idProfesor, grado) {
            const errorGrado = document.getElementById('error-profesorxGrado');
            const formulario = document.getElementById('form-asignarProfesorxGrado');

            fetch("../AJAX/AJAX_Profesores/SearchExisteGradoProfesor.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idProfesor: idProfesor, idGrado: grado })
            })
                .then(response => response.json()) // leer como texto para poder inspeccionar errores HTML
                .then(data => {

                    if (data.status === "error") {
                        errorGrado.textContent = data.mensaje + '. Verifique.';
                    } else {
                        //Enviar en caso de no haber error
                        formulario.submit();
                    }
                })
                .catch(error => {
                    console.error("Error en fetch:", error);
                });
        }

         function cargarGradosProfesor() {
            $.ajax({
                url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
                type: "POST",
                data: {
                    action: 'cargar_grados',
                    nivelEducativo: $("#nivelxProfesor").val()
                },
                success: function (resultado) {
                    console.log("Respuesta del servidor:", resultado); // Para depuración
                    $("#gradosxProfesor").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                    $("#gradosxProfesor").html('<option value="Error">Error al cargar grados</option>');
                }
            });
        }

        modal.addEventListener("hidden.bs.modal", function () {
            // Resetear el select de grado
            document.getElementById('gradosxProfesor').innerHTML = "";

            // Limpiar mensajes de error también si quieres
            document.getElementById('error-profesorxGrado').textContent = "";
        });
    });
</script>