<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalPEdit.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .erroresEditPr {
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
    <div class="modal fade" id="ModalFormPEdit" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Profesor</h1>
                        <form action="../controller_php/controller_EditProfesor.php" method="POST"
                            id="form-ProfesorEdit">
                            <input type="text" name="idguiaEditP" class="input" id="idguiaEditP" hidden>
                            <div class="mb-1">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="cedulaEditP" id="cedulaEditP">
                                <p class="erroresEditPr" id="cedulaErrorEditP"></p>
                            </div>
                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombreEditP" id="nombreEditP">
                            </div>
                            <p class="erroresEditPr" id="nombreErrorEditP"></p>
                            <div class="mb-1">
                                <label for="text" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefonoEditP" id="telefonoEditP">
                                <p class="erroresEditPr" id="telefonoErrorEditP"></p>
                            </div>
                              <label for="nivelEditPr" class="form-label">Nivel del Profesor:</label>
                            <select class="form-control" name="nivelEditPr" id="nivelEditPr">
                                <option value="Seleccionar" selected>Seleccionar</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                            </select>
                            <p class="erroresEditPr" id="nivelPrErrorEditP"></p>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!--  -->
 <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById("ModalFormPEdit");
            // Almacenaremos los valores originales aquí
            var originalValues = {};

            modal.addEventListener("show.bs.modal", function (event) {
                // Añadido el parámetro event
                var button = event.relatedTarget; // Botón que activó el modal

                // Obtener y almacenar los valores originales
                originalValues = {
                    IDGUIA: button.getAttribute("data-idguia"),
                    id: button.getAttribute("data-id"),
                    nombre: button.getAttribute("data-nombre"),
                    telefono: button.getAttribute("data-telefono"),
                    nivelProfesor: button.getAttribute("data-nivelProfesor")
                };

                // Asignar valores a los campos del formulario
                document.getElementById("idguiaEditP").value = originalValues.IDGUIA;
                document.getElementById("cedulaEditP").value = originalValues.id;
                document.getElementById("nombreEditP").value = originalValues.nombre;
                document.getElementById("telefonoEditP").value = originalValues.telefono;
                document.getElementById("nivelEditPr").value = originalValues.nivelProfesor;

                limpiarErrores();
            });

            var form = document.getElementById("form-ProfesorEdit");
            var isSubmitting = false;

            function limpiarErrores() {
                document
                    .querySelectorAll(".erroresEditPr")
                    .forEach((el) => (el.textContent = ""));
            }

            function validarCampos() {
                let isValid = true;
                limpiarErrores();

                const regexIdguia = /^[0-9]{1,9}$/;
                const regexDni = /^[V|E|J|P][0-9]{7,9}$/;
                const regexName =
                    /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
                const regexPhone = /^(0414|0424|0412|0416|0426)[0-9]{7}$/;

                let idguia = document.getElementById("idguiaEditP").value.trim();
                let id = document.getElementById("cedulaEditP").value.trim();
                let nombre = document.getElementById("nombreEditP").value.trim();
                let telefono = document.getElementById("telefonoEditP").value.trim();
                let nivelProfesor = document.getElementById("nivelEditPr").value.trim();

                // Validaciones (igual que las tuyas)
                if (!idguia || !regexIdguia.test(idguia)) {
                    isValid = false;
                }

                if (!id) {
                    document.getElementById("cedulaErrorEditP").textContent = "Cedula es obligatorio";
                    isValid = false;
                } else if (!regexDni.test(id)) {
                    document.getElementById("cedulaErrorEditP").textContent = "Formato inválido: Ingrese un mínimo de 7 digitos numéricos";
                    isValid = false;
                } else {
                    document.getElementById("cedulaErrorEditP").textContent = "";
                }

                if (!nombre) {
                    document.getElementById("nombreErrorEditP").textContent = "Nombre es obligatorio";
                    isValid = false;
                } else if (!regexName.test(nombre)) {
                    document.getElementById("nombreErrorEditP").textContent = "Formato inválido: Ingrese solo letras con espacios";
                    isValid = false;
                } else {
                    document.getElementById("nombreErrorEditP").textContent = "";
                }

                if (!telefono) {
                    document.getElementById("telefonoErrorEditP").textContent = "Telefono es obligatorio";
                    isValid = false;
                } else if (!regexPhone.test(telefono)) {
                    document.getElementById("telefonoErrorEditP").textContent = "Formato inválido: Ingrese 0416-0426-0414-0424 ó 0412 y 7 números";
                    isValid = false;
                } else {
                    document.getElementById("telefonoErrorEditP").textContent = "";
                }

                if(nivelProfesor  != "Primaria" && nivelProfesor != "Secundaria") {
                    document.getElementById("nivelPrErrorEditP").textContent = "Seleccione un nivel de grado correcto";
                    isValid = false;
                }
                return isValid;
            }

            function hayCambiosEnCamposCriticos() {
                // Obtener valores actuales del formulario
                const idActual = document.getElementById("cedulaEditP").value.trim();
                const telefonoActual = document.getElementById("telefonoEditP").value.trim();

                // Comparar con los valores originales
                const cambios = {
                    id: idActual !== originalValues.id,
                    telefono: telefonoActual !== originalValues.telefono,
                };

                return cambios;
            }

            form.addEventListener("submit", function (event) {
                event.preventDefault();
                if (isSubmitting) return;

                if (!validarCampos()) {
                    return; // Si hay errores de validación, no continuar
                }

                // Verificar si hay cambios en campos críticos
                const cambios = hayCambiosEnCamposCriticos();
                const hayCambiosCriticos = cambios.id || cambios.telefono;

                if (!hayCambiosCriticos) {
                    // No hay cambios en campos críticos - enviar directamente
                    mostrarConfirmacion();
                } else {
                    // Hay cambios en campos críticos - validar con AJAX
                    isSubmitting = true;

                    // Limpiar errores previos
                    limpiarErrores();

                    $.ajax({
                        url: "../AJAX/AJAX_Profesores/SearchDniPrEdit.php",
                        type: "POST",
                        data: $(form).serialize(),
                        success: function (resultado) {
                            var errores = resultado.split("|||");

                            // Mostrar errores solo para los campos que cambiaron
                            if (cambios.id) $("#cedulaErrorEditP").html(errores[0]);
                            if (cambios.telefono) $("#telefonoErrorEditP").html(errores[1]);

                            // Verificar si no hay errores en los campos que cambiaron
                            const sinErrores =
                                (!cambios.id || $("#cedulaErrorEditP").text().trim() === "") &&
                                (!cambios.telefono || $("#telefonoErrorEditP").text().trim() === "");

                            if (sinErrores) {
                                mostrarConfirmacion();
                            } else {
                                isSubmitting = false;
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                            isSubmitting = false;
                        },
                    });
                }
            });

            function mostrarConfirmacion() {
                let titulo = "¿Desea editar la información del usuario?";

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
                        confirmButtonText: "Sí, editar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            swalWithBootstrapButtons
                                .fire({
                                    title: "Acción procesada con éxito",
                                    text: "La información del usuario se editó correctamente.",
                                    icon: "success",
                                })
                                .then(() => {
                                    form.submit();
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
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>