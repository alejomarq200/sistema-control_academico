<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos generales para la modal */
        #ModalFormDisableM .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: #f8f9fa;
            /* Fondo claro */
        }

        /* Estilos para el botón de cerrar */
        #ModalFormDisableM .btn-close {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.2rem;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        #ModalFormDisableM .btn-close:hover {
            opacity: 1;
        }

        /* Estilos para el área del formulario */
        #ModalFormDisableM .form-area {
            padding: 1.5rem;
            /* Reducir el padding */
        }

        #ModalFormDisableM .form-area h1 {
            font-size: 1.5rem;
            /* Tamaño de fuente un poco más pequeño */
            font-weight: 600;
            color: #000000;
            margin-bottom: 1rem;
            /* Reducir el margen inferior */
        }

        /* Estilos para las etiquetas */
        #ModalFormDisableM .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 0.25rem;
            /* Reducir el margen inferior */
            font-size: 0.9rem;
            /* Tamaño de fuente más pequeño */
            text-align: left;
            /* Alinear el texto a la izquierda */
            display: block;
            /* Asegurar que el label ocupe toda la línea */
            width: 100%;
            /* Ocupar el ancho completo */
        }

        /* Estilos para los inputs */
        #ModalFormDisableM .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 0.5rem;
            /* Reducir el padding */
            font-size: 0.9rem;
            /* Tamaño de fuente más pequeño */
            color: #000000;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 0.5rem;
            /* Reducir el margen inferior */
        }

        #ModalFormDisableM .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        /* Estilos para los mensajes de error */
        #ModalFormDisableM .error {
            text-align: left;
            /* Alinear el texto a la izquierda */
            padding-left: 0;
            /* Asegurar que no haya padding a la izquierda */
            color: red;
            font-size: 0.85rem;
            /* Tamaño de fuente más pequeño */
            margin-top: 0.1rem;
            /* Reducir el margen superior */
            margin-bottom: 0.5rem;
            /* Reducir el margen inferior */
            display: none;
            /* Ocultar inicialmente */
        }

        /* Estilos para el botón de enviar */
        #ModalFormDisableM .btn-light {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            /* Reducir el padding */
            font-size: 0.9rem;
            /* Tamaño de fuente más pequeño */
            font-weight: 500;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 0.5rem;
            /* Reducir el margen superior */
        }

        #ModalFormDisableM .btn-light:hover {
            background-color: #0056b3;
        }

        /* Estilos para el modal-body */
        #ModalFormDisableM .modal-body {
            padding: 0;
            /* Eliminar el padding predeterminado */
        }

        /* Estilos para el modal-dialog */
        #ModalFormDisableM .modal-dialog {
            max-width: 500px;
            /* Ancho máximo de la modal */
        }

        /* Estilos para el fondo de la modal */
        #ModalFormDisableM .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .input {
            border: none;
            border-color: white;
            color: white;
            background-color: white
        }

        .input:focus {
            outline: none;
        }

        .input::selection {
            background-color: white;
        }

        @media (max-width: 600px) {
            .form-area {
                padding: 1.5em;
            }

            .form-area h1 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="modal fade" id="ModalFormDisableM" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Inhabilitar Materia</h1>
                        <form action="../controller_php/controller_DisableMaterias.php" method="POST"
                            id="form-DisableM">
                            <div class="mb-1">
                                <input type="text" name="idDisableM" id="idDisableM" class="input" hidden>
                            </div>
                            <div class="mb-1">
                                <label for="nombreDisableM" class="form-label">Nombre de la materia</label>
                                <input type="text" class="form-control" name="nombreDisableM" id="nombreDisableM"
                                    disabled>
                            </div>
                            <div class="mb-1">
                                <label for="nivelDisableM" class="form-label">Nivel de la materia</label>
                                <select name="nivelDisableM" id="nivelDisableM" class="form-control" disabled>
                                    <option value="Seleccionar">Seleccinar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
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
        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("ModalFormDisableM");

            modal.addEventListener("show.bs.modal", function (event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener los valores de los atributos `data-*`data-idguia
                var IDGUIA = button.getAttribute("data-id");
                var nombreMateria = button.getAttribute("data-nombre");
                var nivelMateria = button.getAttribute("data-nivel");

                // Asignar valores a los campos del formulario
                document.getElementById("idDisableM").value = IDGUIA;
                document.getElementById("nombreDisableM").value = nombreMateria;
                document.getElementById("nivelDisableM").value = nivelMateria;
                });
            });
        document
            .getElementById("form-DisableM")
            .addEventListener("submit", function (event) {
                event.preventDefault(); // Prevenir el envío del formulario

                // Limpiar errores previos
                const errorElements = document.querySelectorAll(".error");
                const formulario = document.getElementById("form-DisableM");
                errorElements.forEach((el) => (el.textContent = ""));

                // Obtener valores
                let idguia = document.getElementById("idDisableM").value.trim();

                const regexIdGuia = /^[0-9]{1,9}$/;

                let isValid = true;

                // Validamos campos para mandar imagen receptivo
                if (!idguia) {
                    isValid = false;
                } else if (!regexIdGuia.test(idguia)) {
                    isValid = false;
                }

                if (isValid) {
                    let titulo = "¿Desea inhabilitar la asignatura seleccionada?";

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: titulo,
                        text: "Si inhabilita una asignatura no podrá realizar ninguna acción de asginar profesor o grados con ella",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, inhabilitar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons.fire({
                                title: "Acción procesada con éxito",
                                text: "Se inhabilitó correctamente la asignatura seleccionado",
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
            .getElementById("ModalFormDisableM")
            .addEventListener("hidden.bs.modal", function () {
                // Ocultar todos los mensajes de error
                let errors = document.querySelectorAll(".error");
                errors.forEach(function (error) {
                    error.style.display = "none";
                });

                // Limpiar los campos del formulario
                document.getElementById("form-DisableM").reset();
            });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>