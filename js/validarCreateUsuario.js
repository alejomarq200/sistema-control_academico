document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("ModalForm");
    var form = document.getElementById("form-RegisterUser");
    var isSubmitting = false; // Flag para controlar doble envío

    const regexDni = /^[0-9]{7,9}$/;
    const regexName = /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
    const regexEmail = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
    const regexPw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/;
    const regexPhone = /^[0-9]{7}$/;

    function limpiarErrores() {
        document.querySelectorAll(".errores").forEach(el => el.textContent = "");
        document.getElementById("cedulaCreate").value = "";
        document.getElementById("nombreCreate").value = "";
        document.getElementById("emailCreate").value = "";
        document.getElementById("contrasenaCreate").value = "";
        document.getElementById("telefonoCreate").value = "";
        document.getElementById("rolCreate").value = "Seleccionar";
    }

    function validarCampos() {
        let isValid = true;

        let id = document.getElementById("cedulaCreate").value.trim();
        let nombre = document.getElementById("nombreCreate").value.trim();
        let email = document.getElementById("emailCreate").value.trim();
        let contrasena = document.getElementById("contrasenaCreate").value.trim();
        let telefono = document.getElementById("telefonoCreate").value.trim();
        let rol = document.getElementById("rolCreate").value.trim();

        if (!id) {
            document.getElementById("cedulaErrorCreate").textContent = "Cedula es obligatorio";
            isValid = false;
        } else if (!regexDni.test(id)) {
            document.getElementById('cedulaErrorCreate').textContent = 'Formato inválido: Ingrese un mínimo de 7 digitos numéricos';
            isValid = false;
        } else {
            document.getElementById("cedulaErrorCreate").textContent = "";
        }

        if (!nombre) {
            document.getElementById("nombreErrorCreate").textContent = "Nombre es obligatorio";
            isValid = false;
        } else if (!regexName.test(nombre)) {
            document.getElementById('nombreErrorCreate').textContent = 'Formato inválido: Ingrese solo letras con espacios';
            isValid = false;
        } else {
            document.getElementById("nombreErrorCreate").textContent = "";
        }

        if (!email) {
            document.getElementById("emailErrorCreate").textContent = "Email es obligatorio";
            isValid = false;
        } else if (!regexEmail.test(email)) {
            document.getElementById('emailErrorCreate').textContent = 'Formato inválido: Ingrese solo letras seguido de @ ej: gmail, hotmail';
            isValid = false;
        } else {
            document.getElementById("emailErrorCreate").textContent = "";
        }

        if (!contrasena) {
            document.getElementById("contrasenaErrorCreate").textContent = "Contrasena es obligatorio";
            isValid = false;
        } else if (!regexPw.test(contrasena)) {
            document.getElementById('contrasenaErrorCreate').textContent = 'Formato inválido: Ingrese de 8 a 16 dígitos con minúsculas, mayúsculas, caracteres especiales y números';
            isValid = false;
        } else {
            document.getElementById("contrasenaErrorCreate").textContent = "";
        }

        if (!telefono) {
            document.getElementById("telefonoErrorCreate").textContent = "Telefono es obligatorio";
            isValid = false;
        } else if (!regexPhone.test(telefono)) {
            document.getElementById('telefonoErrorCreate').textContent = 'Formato inválido: Ingrese 7 dígitos numéricos';
            isValid = false;
        } else {
            document.getElementById("telefonoErrorCreate").textContent = "";
        }

        if (rol === "Seleccionar") {
            document.getElementById("rolErrorCreate").textContent = "Seleccione un rol";
            isValid = false;
        } else {
            document.getElementById("rolErrorCreate").textContent = "";
        }

        return isValid;
    }

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        if (isSubmitting) return; // 👈 Bloquea si ya se está enviando

        if (validarCampos()) {
            isSubmitting = true; // 👈 Marca como en proceso

            $.ajax({
                url: "../AJAX/AJAX_Usuarios/searchDniUser.php",
                type: "POST",
                data: $(form).serialize(),
                success: function(resultado) {
                    var errores = resultado.split('|||');
                    $("#cedulaErrorCreate").html(errores[0]);
                    $("#emailErrorCreate").html(errores[1]);
                    $("#telefonoErrorCreate").html(errores[2]);


                    if ($("#cedulaErrorCreate").text().trim() === "" &&
                        $("#emailErrorCreate").text().trim() === "" &&
                        $("#telefonoErrorCreate").text().trim() === "") {
                        form.submit(); // ✅ Envío final solo una vez
                    } else {
                        isSubmitting = false; // ❗ Permitir nuevo intento si hay error
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:");
                    console.error("Status:", status);
                    console.error("Error:", error);
                    console.error("Respuesta del servidor:", xhr.responseText);
                    isSubmitting = false; // ❗ Reintento posible en caso de fallo AJAX
                }
            });
        }
    });

    modal.addEventListener("show.bs.modal", function() {
        limpiarErrores();
    });
});