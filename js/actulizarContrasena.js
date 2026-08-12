document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("form-UdpdatePwd");
  const inputs = document.querySelectorAll('input[type="password"]');
  const successMessage = document.getElementById("successMessage");

  // Validar en tiempo real
  inputs.forEach((input) => {
    input.addEventListener("input", function () {
      validarInput(this);
      // Si estamos en el campo de repetir contraseña, validar también contra la nueva
      if (this.id === "contrasena_repeat") {
        validarConfirmacion();
      }
    });

    input.addEventListener("blur", function () {
      validarInput(this);
      if (this.id === "contrasena_repeat") {
        validarConfirmacion();
      }
    });
  });

  // Validar formulario al enviar
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    let formularioValido = true;

    inputs.forEach((input) => {
      if (!validarInput(input)) {
        formularioValido = false;
      }
    });

    // Validar confirmación de contraseña
    if (!validarConfirmacion()) {
      formularioValido = false;
    }

    if (formularioValido) {
      validarContrasena();
    }
  });

  function validarContrasena() {
    const contrasenaAct = document.getElementById("contrasena_act").value;
    const contrasenaNueva = document.getElementById("contrasena_nuevo").value;
    const mensaje = document.getElementById("successMessage");
    if (!contrasenaAct) {
      console.error("La nueva contraseña no puede estar vacia 🚫");
      return;
    }

    fetch("../AJAX/AJAX_Seguridad/validarContraseña.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        contrasena: contrasenaAct,
        contrasenaNueva: contrasenaNueva,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        mensaje.style.display = "block";

        if (data.success) {
          mensaje.style.color = "green";
          mensaje.innerHTML = `<i class="fas fa-check-circle" style="color:green;"></i> ${data.success}`;
          setTimeout(function () {
            mensaje.style.display = "none";
            form.reset();
          }, 2000);
        } else {
          mensaje.style.color = "red";
          mensaje.innerHTML = `<i class="fas fa-check-circle" style="color:red;"></i> ${data.error}`;
        }
      });
  }

  function validarInput(input) {
    const errorElement = document.getElementById(`error-${input.id}`);
    let valido = true;
    let mensaje = "";

    // Remover clases previas
    input.classList.remove("valid-field", "invalid-field");

    // Validar según el campo
    switch (input.id) {
      case "contrasena_act":
        if (input.value.trim() === "") {
          mensaje = "La contraseña actual es requerida";
          valido = false;
        } else if (input.value.length < 6) {
          mensaje = "La contraseña debe tener al menos 6 caracteres";
          valido = false;
        }
        break;

      case "contrasena_nuevo":
        if (input.value.trim() === "") {
          mensaje = "La nueva contraseña es requerida";
          valido = false;
        } else if (input.value.length < 8) {
          mensaje = "La nueva contraseña debe tener al menos 8 caracteres";
          valido = false;
        } else if (
          !/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/.test(
            input.value,
          )
        ) {
          mensaje = "Debe contener mayúsculas, minúsculas y números";
          valido = false;
        }
        break;

      case "contrasena_repeat":
        // La validación de confirmación se hace en otra función
        return validarConfirmacion();
    }

    // Aplicar estilos y mensajes
    if (!valido && input.value.trim() !== "") {
      input.classList.add("invalid-field");
      errorElement.textContent = mensaje;
    } else if (valido && input.value.trim() !== "") {
      input.classList.add("valid-field");
      errorElement.textContent = "";
    } else {
      errorElement.textContent = "";
    }

    return valido;
  }

  function validarConfirmacion() {
    const nuevaContrasena = document.getElementById("contrasena_nuevo");
    const repetirContrasena = document.getElementById("contrasena_repeat");
    const errorElement = document.getElementById("error-contrasena_repeat");

    // Remover clases previas
    repetirContrasena.classList.remove("valid-field", "invalid-field");

    if (repetirContrasena.value.trim() === "") {
      errorElement.textContent = "";
      return false;
    }

    if (nuevaContrasena.value !== repetirContrasena.value) {
      errorElement.textContent = "Las contraseñas no coinciden";
      repetirContrasena.classList.add("invalid-field");
      return false;
    } else {
      errorElement.textContent = "";
      repetirContrasena.classList.add("valid-field");
      return true;
    }
  }
});
