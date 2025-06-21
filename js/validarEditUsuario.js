document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("ModalForm1");
    // Almacenaremos los valores originales aquí
    var originalValues = {};
    
    modal.addEventListener("show.bs.modal", function(event) { // Añadido el parámetro event
        var button = event.relatedTarget; // Botón que activó el modal
        
        // Obtener y almacenar los valores originales
        originalValues = {
            IDGUIA: button.getAttribute("data-idguia"),
            id: button.getAttribute("data-id"),
            nombre: button.getAttribute("data-nombre"),
            correo: button.getAttribute("data-correo"),
            contrasena: button.getAttribute("data-contrasena"),
            telefono: button.getAttribute("data-telefono"),
            rol: button.getAttribute("data-rol")
        };

        // Asignar valores a los campos del formulario
        document.getElementById("rolEdit").value = originalValues.rol;
        document.getElementById("idguiaEdit").value = originalValues.IDGUIA;
        document.getElementById("cedulaEdit").value = originalValues.id;
        document.getElementById("nombreEdit").value = originalValues.nombre;
        document.getElementById("emailEdit").value = originalValues.correo;
        document.getElementById("contrasenaEdit").value = originalValues.contrasena;
        document.getElementById("telefonoEdit").value = originalValues.telefono;
        
        limpiarErrores();
    });

    var form = document.getElementById("form-RegisterUser1");
    var isSubmitting = false;

    function limpiarErrores() {
        document.querySelectorAll(".erroresEdit").forEach(el => el.textContent = "");
    }

    function validarCampos() {
        let isValid = true;
        limpiarErrores();

        const regexIdguia = /^[0-9]{1,9}$/;
        const regexDni = /^[V|E|J|P][0-9]{7,9}$/;
        const regexName = /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
        const regexEmail = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
        const regexPhone = /^(0414|0424|0412|0416|0426)[0-9]{7}$/;
        const regexPw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/;

        let idguia = document.getElementById("idguiaEdit").value.trim();
        let id = document.getElementById("cedulaEdit").value.trim();
        let nombre = document.getElementById("nombreEdit").value.trim();
        let email = document.getElementById("emailEdit").value.trim();
        let contrasena = document.getElementById("contrasenaEdit").value.trim();
        let telefono = document.getElementById("telefonoEdit").value.trim();
        let rol = document.getElementById("rolEdit").value.trim();

        // Validaciones (igual que las tuyas)
        if (!idguia || !regexIdguia.test(idguia)) {
            isValid = false;
        }

        if (!id) {
            document.getElementById("cedulaErrorEdit").textContent = "Cedula es obligatorio";
            isValid = false;
        } else if (!regexDni.test(id)) {
            document.getElementById('cedulaErrorEdit').textContent = 'Formato inválido: Ingrese un mínimo de 7 digitos numéricos';
            isValid = false;
        }

        if (!nombre) {
            document.getElementById("nombreErrorEdit").textContent = "Nombre es obligatorio";
            isValid = false;
        } else if (!regexName.test(nombre)) {
            document.getElementById('nombreErrorEdit').textContent = 'Formato inválido: Ingrese solo letras con espacios';
            isValid = false;
        }

        if (!email) {
            document.getElementById("emailErrorEdit").textContent = "Email es obligatorio";
            isValid = false;
        } else if (!regexEmail.test(email)) {
            document.getElementById('emailErrorEdit').textContent = 'Formato inválido: Ingrese solo letras seguido de @ ej: gmail, hotmail';
            isValid = false;
        }

        if (!contrasena) {
            document.getElementById("contrasenaErrorEdit").textContent = "Contrasena es obligatorio";
            isValid = false;
        } else if (!regexPw.test(contrasena)) {
            document.getElementById('contrasenaErrorEdit').textContent = 'Formato inválido: Ingrese de 8 a 16 dígitos con minúsculas, mayúsculas, caracteres especiales y números';
            isValid = false;
        }

        if (!telefono) {
            document.getElementById("telefonoErrorEdit").textContent = "Telefono es obligatorio";
            isValid = false;
        } else if (!regexPhone.test(telefono)) {
            document.getElementById('telefonoErrorEdit').textContent = 'Formato inválido: Ingrese 0416-0426-0414-0424 ó 0412 y 7 números';
            isValid = false;
        }

        if (rol === "Seleccionar") {
            document.getElementById("rolErrorEdit").textContent = "Seleccione un rol";
            isValid = false;
        }

        return isValid;
    }

    function hayCambiosEnCamposCriticos() {
        // Obtener valores actuales del formulario
        const idActual = document.getElementById("cedulaEdit").value.trim();
        const emailActual = document.getElementById("emailEdit").value.trim();
        const telefonoActual = document.getElementById("telefonoEdit").value.trim();

        // Comparar con los valores originales
        const cambios = {
            id: idActual !== originalValues.id,
            email: emailActual !== originalValues.correo,
            telefono: telefonoActual !== originalValues.telefono
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
        const hayCambiosCriticos = cambios.id || cambios.email || cambios.telefono;

        if (!hayCambiosCriticos) {
            // No hay cambios en campos críticos - enviar directamente
            mostrarConfirmacion();
        } else {
            // Hay cambios en campos críticos - validar con AJAX
            isSubmitting = true;

            // Limpiar errores previos
            limpiarErrores();

            $.ajax({
                url: "../AJAX/AJAX_Usuarios/searchDniUserEdit.php",
                type: "POST",
                data: $(form).serialize(),
                success: function(resultado) {
                    var errores = resultado.split('|||');

                    // Mostrar errores solo para los campos que cambiaron
                    if (cambios.id) $("#cedulaErrorEdit").html(errores[0]);
                    if (cambios.email) $("#emailErrorEdit").html(errores[1]);
                    if (cambios.telefono) $("#telefonoErrorEdit").html(errores[2]);

                    // Verificar si no hay errores en los campos que cambiaron
                    const sinErrores =
                        (!cambios.id || $("#cedulaErrorEdit").text().trim() === "") &&
                        (!cambios.email || $("#emailErrorEdit").text().trim() === "") &&
                        (!cambios.telefono || $("#telefonoErrorEdit").text().trim() === "");

                    if (sinErrores) {
                        mostrarConfirmacion();
                    } else {
                        isSubmitting = false;
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                    isSubmitting = false;
                }
            });
        }
    });

    function mostrarConfirmacion() {
        let titulo = "¿Desea editar la información del usuario?";

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
            confirmButtonText: "Sí, editar!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Acción procesada con éxito",
                    text: "La información del usuario se editó correctamente.",
                    icon: "success"
                }).then(() => {
                    form.submit();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Acción cancelada",
                    text: "Se deshizo la acción de editar",
                    icon: "error"
                });
                isSubmitting = false;
            }
        });
    }
});