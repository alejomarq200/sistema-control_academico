function eliminarUsuarios(button) {
                        let titulo = "¿Desea eliminar el registro del usuario seleccionado?";

                        const swalWithBootstrapButtons = Swal.mixin({
                            customClass: {
                                confirmButton: "btn btn-success",
                                cancelButton: "btn btn-danger"
                            },
                            buttonsStyling: false
                        });
                        swalWithBootstrapButtons.fire({
                            title: titulo,
                            text: "La eliminación de un usuario afectará el historial de acciones que realizó de manera definitiva",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Sí, eliminar!",
                            cancelButtonText: "No, cancelar!",
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                swalWithBootstrapButtons.fire({
                                    title: "Acción procesada con éxito",
                                    text: "La información de la materia se eliminó correctamente.",
                                    icon: "success"
                                }).then(() => {

                                    var url = "../AJAX/AJAX_Usuarios/deleteUsuarios.php";
                                    // Obtiene el data-id del botón que se hizo clic
                                    var miVariable = $(button).data("id");

                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: {
                                            variable: miVariable
                                        },
                                        success: function (data) {
                                            location.href = "search_user.php";
                                        },
                                        error: function (xhr, status, error) {
                                            console.error("Error:", error);
                                        }
                                    });
                                });
                            } else if (
                                /* Read more about handling dismissals below */
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire({
                                    title: "Acción cancelada",
                                    text: "Se deshizo la acción de editar",
                                    icon: "error"
                                });
                            }
                        });
                    }
