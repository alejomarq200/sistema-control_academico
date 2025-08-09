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
                    let titulo = "¿Desea inhabilitar al profesor seleccionado?";

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
                                        text: "Se inhabilitó correctamente al profesor seleccionado",
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