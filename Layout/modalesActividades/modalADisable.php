<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesActividades/modalDisableA.css">
</head>
<body>
    <div class="modal fade" id="ModalFormDisableA" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Inhabilitar Actividad</h1>
                        <form action="../controller_php/controller_DisableActividad.php" method="POST"
                            id="form-DisableA">
                            <div class="mb-1">
                                <input type="text" name="idDisableA" id="idDisableA" class="input" hidden>
                            </div>
                            <div class="mb-1">
                                <label for="gradoActividadA" class="form-label">Nombre del Grado</label>
                                <input type="text" class="form-control" name="gradoActividadA" id="gradoActividadA"
                                    readonly>
                            </div>
                           <div class="mb-1">
                                <label for="nombreActividadA" class="form-label">Nombre de la Asignatura</label>
                                <input type="text" class="form-control" name="nombreActividadA" id="nombreActividadA"
                                    readonly>
                            </div>
                           <div class="mb-1">
                                <label for="nombreProfesorA" class="form-label">Nombre del profesor</label>
                                <input type="text" class="form-control" name="nombreProfesorA" id="nombreProfesorA"
                                    readonly>
                            </div>
                            <div class="mb-1">
                                <label for="contenidoActividadA" class="form-label">Contenido</label>
                                <textarea name="contenidoActividadA" id="contenidoActividadA" class="styled-textarea"
                                    placeholder="Ingrese la descripción de la actividad" maxlength="200" readonly></textarea>
                                <span class="char-counter"><span id="contador">0</span>/200</span>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Inhabilitar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("ModalFormDisableA");

            modal.addEventListener("show.bs.modal", function (event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    IDGUIA: button.getAttribute("data-id"),
                    nombreG: button.getAttribute("data-nombreG"),
                    nombreM: button.getAttribute("data-nombreM"),
                    nombreP: button.getAttribute("data-nombreP"),
                    contenido: button.getAttribute("data-contenido"),
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idDisableA").value = originalValues.IDGUIA;
                document.getElementById("gradoActividadA").value = originalValues.nombreG;
                document.getElementById("nombreActividadA").value = originalValues.nombreM;
                document.getElementById("nombreProfesorA").value = originalValues.nombreP;
                document.getElementById("contenidoActividadA").value = originalValues.contenido;
            });
        });

        document
            .getElementById("form-DisableA")
            .addEventListener("submit", function (event) {
                event.preventDefault(); // Prevenir el envío del formulario

                // Limpiar errores previos
                const errorElements = document.querySelectorAll(".error");
                const formulario = document.getElementById("form-DisableA");
                errorElements.forEach((el) => (el.textContent = ""));

                // Obtener valores
                let idguia = document.getElementById("idDisableA").value.trim();

                const regexIdGuia = /^[0-9]{1,9}$/;

                let isValid = true;

                // Validamos campos para mandar imagen receptivo
                if (!idguia) {
                    isValid = false;
                } else if (!regexIdGuia.test(idguia)) {
                    isValid = false;
                }

                if (isValid) {
                    let titulo = "¿Desea inhabilitar la actividad seleccionada?";

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: titulo,
                        text: "Si inhabilita una activdad no podrá realizar ninguna acción de asginar grados con ella",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, inhabilitar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire({
                                title: "Acción procesada con éxito",
                                text: "Se inhabilitó correctamente la actividad seleccionado",
                                icon: "success"
                            }).then(() => {
                                formulario.submit();
                            });
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire({
                                title: "Acción cancelada",
                                text: "Se deshizo la acción con éxito",
                                icon: "error"
                            });
                        }
                    });

                }
            });

        // Ocultar mensajes de error y limpiar el formulario al cerrar la modal
        document
            .getElementById("ModalFormDisableA")
            .addEventListener("hidden.bs.modal", function () {
                // Ocultar todos los mensajes de error
                let errors = document.querySelectorAll(".error");
                errors.forEach(function (error) {
                    error.style.display = "none";
                });

                // Limpiar los campos del formulario
                document.getElementById("form-DisableA").reset();
            });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>