<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesMaterias/modalEditM.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        /* Estilos para los mensajes de error */
        #ModalFormMEdit .errorMEdit {
            text-align: left;
            padding-left: 0;
            color: red;
            font-size: 0.85rem;
            margin-top: 0.1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="ModalFormMEdit" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Materias</h1>
                        <form action="../controller_php/controller_EditMateria.php" method="POST" id="form-EditMateria">
                            <div class="mb-1">
                                <input type="text" name="idEditM" class="input" id="idEditM" hidden>
                            </div>
                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre de la materia</label>
                                <input type="text" class="form-control" name="nombreEditM" id="nombreEditM">
                            </div>
                            <p class="errorMEdit" id="nombreErrorEditM"></p>
                            <div class="mb-1">
                                <label for="nivelEditM" class="form-label">Nivel de la materia</label>
                                <select name="nivelEditM" id="nivelEditM" class="form-control">
                                    <option value="Seleccionar">Seleccinar</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                            </div>
                            <p class="errorMEdit" id="nivelErrorEditM"></p>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("ModalFormMEdit");
            var originalValues = {}; // Almacenará los valores originales
            var form = document.getElementById("form-EditMateria");
            var isSubmitting = false; // Variable para controlar envíos múltiples

            modal.addEventListener("show.bs.modal", function(event) {
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    IDGUIA: button.getAttribute("data-id"),
                    nombre: button.getAttribute("data-nombre"),
                    nivel: button.getAttribute("data-nivel")
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idEditM").value = originalValues.IDGUIA;
                document.getElementById("nombreEditM").value = originalValues.nombre;
                document.getElementById("nivelEditM").value = originalValues.nivel;

                limpiarErrores();
            });

            function limpiarErrores() {
                document.querySelectorAll(".errorMEdit").forEach(el => el.textContent = "");
            }

            function validarCampos() {
                let isValid = true;
                limpiarErrores();

               const regexName = /^[A-Za-zÑñÁÉÍÓÚÜáéíóúü\s\.,'-]+$/;
                const regexIdguia = /^[0-9]{1,9}$/;

                let idguia = document.getElementById("idEditM").value.trim();
                let nombre = document.getElementById("nombreEditM").value.trim();
                let nivel = document.getElementById("nivelEditM").value.trim();

                // Validación de IDGUIA
                if (!idguia || !regexIdguia.test(idguia)) {
                    isValid = false;
                }

                // Validación de nombre
                if (!nombre) {
                    document.getElementById("nombreErrorEditM").textContent = "El nombre de la materia es obligatorio";
                    isValid = false;
                } else if (!regexName.test(nombre)) {
                    document.getElementById("nombreErrorEditM").textContent = "Formato inválido: Ingrese solo letras con espacios";
                    isValid = false;
                }
                  // Validación de IDGUIA
                  if (!nivel) {
                    document.getElementById("nivelErrorEditM").textContent = "Campo nivel de materia obligatorio";
                    isValid = false;
                }else if (nivel != "Primaria" && nivel != "Secundaria"){
                    isValid = false;
                    document.getElementById("nivelErrorEditM").textContent = "Seleccione un nivel de materia correcto";
                 }

                return isValid;
            }

            function hayCambiosEnCamposCriticos() {
                // Obtener valores actuales del formulario
                const nombreActual = document.getElementById("nombreEditM").value.trim();
                const nivelMateriaActual = document.getElementById("nivelEditM").value.trim();

                // Comparar con los valores originales
                const cambios = {
                    nombre: nombreActual !== originalValues.nombre,
                    nivelMateria: nivelMateriaActual !== originalValues.nivel
                };

                return cambios;
            }

            form.addEventListener("submit", function(event) {
                event.preventDefault();
                if (isSubmitting) return;

                if (!validarCampos()) {
                    return; // Si hay errores de validación, no continuar
                }

                // Verificar si hay cambios en campos críticos
                const cambios = hayCambiosEnCamposCriticos();
                const hayCambiosCriticos = cambios.nombre || cambios.nivelMateria;

                if (!hayCambiosCriticos) {
                    // No hay cambios en campos críticos - mostrar confirmación directamente
                    mostrarConfirmacion();
                } else {
                    // Hay cambios en campos críticos - validar con AJAX
                    isSubmitting = true;

                    $.ajax({
                        url: "../AJAX/AJAX_Materias/searchNombreMEdit.php",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function(resultado) {
                            $("#nivelErrorEditM").html(resultado);

                            var errores = document.getElementById("nivelErrorEditM").textContent;

                            if (errores.trim() === "") {
                                mostrarConfirmacion();
                            } else {
                                console.log("Error en la validación: ", errores);
                                isSubmitting = false;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", status, error);
                            isSubmitting = false;
                        }
                    }); 
                }
            });

            function mostrarConfirmacion() {
                let titulo = "¿Desea editar la materia seleccionada?";

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                    },
                    buttonsStyling: false,
                });

                swalWithBootstrapButtons.fire({
                    title: titulo,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, editar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Usar AJAX para enviar el formulario
                        $.ajax({
                            url: form.action, // Asegúrate de que el formulario tenga el atributo action
                            type: "POST",
                            data: $(form).serialize(),
                            success: function(response) {
                                swalWithBootstrapButtons.fire({
                                    title: "Acción procesada con éxito",
                                    text: "La información de la materia se editó correctamente.",
                                    icon: "success",
                                }).then(() => {
                                    // Recargar la página o redireccionar
                                    form.submit();
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error("Error al enviar el formulario:", error);
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Ocurrió un error al procesar la solicitud",
                                    icon: "error"
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Acción cancelada",
                            text: "Se deshizo la acción de editar",
                            icon: "error",
                        });
                        isSubmitting = false;
                    }
                });
            }

            // Ocultar mensajes de error y limpiar el formulario al cerrar la modal
            modal.addEventListener("hidden.bs.modal", function() {
                limpiarErrores();
                form.reset();
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>