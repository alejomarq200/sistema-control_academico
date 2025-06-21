<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalPDisable.css">
</head>

<body>
    <div class="modal fade" id="ModalFormPDisable" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Inhabilitar Profesor</h1>
                        <form action="../controller_php/controller_DisableProfesor.php" method="POST" id="form-DisableProfesor">
                            <input type="text" name="idguiaPDisable" id="idguiaPDisable" class="input" hidden>
                            <div class="mb-1">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="cedulaPDisable" id="cedulaPDisable" disabled>
                            </div>

                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombrePDisable" id="nombrePDisable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefonoPDisable" id="telefonoPDisable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="estadoPDisable"
                                    id="estadoPDisable" disabled>
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
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
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("ModalFormPDisable");

            modal.addEventListener("show.bs.modal", function(event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener los valores de los atributos `data-*`data-idguia
                var IDGUIA = button.getAttribute("data-idguia");
                var id = button.getAttribute("data-id");
                var nombre = button.getAttribute("data-nombre");
                var telefono = button.getAttribute("data-telefono");
                var estado = button.getAttribute("data-estado");

                // Asignar valores a los campos del formulario
                document.getElementById("idguiaPDisable").value = IDGUIA;
                document.getElementById("cedulaPDisable").value = id;
                document.getElementById("nombrePDisable").value = nombre;
                document.getElementById("telefonoPDisable").value = telefono;
                document.getElementById("estadoPDisable").value = estado;
            });
        });
        document
            .getElementById("form-DisableProfesor")
            .addEventListener("submit", function(event) {
                event.preventDefault(); // Prevenir el envío del formulario

                // Limpiar errores previos
                const errorElements = document.querySelectorAll(".error");
                const formulario = document.getElementById("form-DisableProfesor");
                errorElements.forEach((el) => (el.textContent = ""));

                // Obtener valores
                let idguia = document.getElementById("idguiaPDisable").value.trim();

                const regexIdGuia = /^[0-9]{1,9}$/;

                let isValid = true;

                // Validamos campos para mandar imagen receptivo
                if (!idguia) {
                    isValid = false;
                } else if (!regexIdGuia.test(idguia)) {
                    isValid = false;
                }

                if (isValid) {
                    let titulo = "¿Desea habilitar al usuario seleccionado?";

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger",
                        },
                        buttonsStyling: false,
                    });
                    swalWithBootstrapButtons
                        .fire({
                            title: titulo,
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Sí, habilitar!",
                            cancelButtonText: "No, cancelar!",
                            reverseButtons: true,
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                swalWithBootstrapButtons
                                    .fire({
                                        title: "Acción procesada con éxito",
                                        text: "Se habilitó correctamente al usuario seleccionado",
                                        icon: "success",
                                    })
                                    .then(() => {
                                        formulario.submit();
                                    });
                            } else if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire({
                                    title: "Acción cancelada",
                                    text: "Se deshizo la acción con éxito",
                                    icon: "error",
                                });
                            }
                        });
                }
            });

        // Ocultar mensajes de error y limpiar el formulario al cerrar la modal
        document
            .getElementById("ModalFormPDisable")
            .addEventListener("hidden.bs.modal", function() {
                // Ocultar todos los mensajes de error
                let errors = document.querySelectorAll(".error");
                errors.forEach(function(error) {
                    error.style.display = "none";
                });

                // Limpiar los campos del formulario
                document.getElementById("form-DisableProfesor").reset();
            });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>