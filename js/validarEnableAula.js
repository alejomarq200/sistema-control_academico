       document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("ModalFormEnableA");

            modal.addEventListener("show.bs.modal", function(event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    idguia: button.getAttribute("data-id"),
                    nombre: button.getAttribute("data-nombre"),
                    capacidad: button.getAttribute("data-capacidad"),
                    grado: button.getAttribute("data-id_grado"),
                    estado: button.getAttribute("data-estado")
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idEnableAula").value = originalValues.idguia;
                document.getElementById("nombreAulaEnable").value = originalValues.nombre;
                document.getElementById("capacidadAulaEnable").value = originalValues.capacidad;
                document.getElementById("gradoAulaEnable").value = originalValues.grado;
                document.getElementById("estadoAulaEnable").value = originalValues.estado;

            });
        });
        document
            .getElementById("form-EnableAula")
            .addEventListener("submit", function (event) {
                event.preventDefault(); // Prevenir el envío del formulario

                // Limpiar errores previos
                const formulario = document.getElementById("form-EnableAula");

                // Obtener valores
                let idguia = document.getElementById("idEnableAula").value.trim();

                const regexIdGuia = /^[0-9]{1,9}$/;

                let isValid = true;

                // Validamos campos para mandar imagen receptivo
                if (!idguia) {
                    isValid = false;
                } else if (!regexIdGuia.test(idguia)) {
                    isValid = false;
                }

                if (isValid) {
                    let titulo = "¿Desea habilitar el aula seleccionada?";

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: titulo,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, habilitar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire({
                                title: "Acción procesada con éxito",
                                text: "Se habilitó correctamente el aula seleccionada",
                                icon: "success"
                            }).then(() => {
                                formulario.submit();
                            });
                        } else if (
                            /* Read more about handling dismissals below */
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
            .getElementById("ModalFormEnableA")
            .addEventListener("hidden.bs.modal", function () {
                
                // Limpiar los campos del formulario
                document.getElementById("form-EnableAula").reset();
            });