document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("ModalForm3");

  modal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget; // Botón que activó el modal

    // Obtener los valores de los atributos `data-*`data-idguia
    var IDGUIA = button.getAttribute("data-idguia");
    var id = button.getAttribute("data-id");
    var nombre = button.getAttribute("data-nombre");
    var correo = button.getAttribute("data-correo");
    var contrasena = button.getAttribute("data-contrasena");
    var telefono = button.getAttribute("data-telefono");
    var estado = button.getAttribute("data-estado");
    var rol = button.getAttribute("data-rol");

    // Asignar valores a los campos del formulario
    document.getElementById("idguiaEnable").value = IDGUIA;
    document.getElementById("cedulaEnable").value = id;
    document.getElementById("nombreEnable").value = nombre;
    document.getElementById("emailEnable").value = correo;
    document.getElementById("contrasenaEnable").value = contrasena;
    document.getElementById("telefonoEnable").value = telefono;
    document.getElementById("estadoEnable").value = estado;
    document.getElementById("rolEnable").value = rol;
  });
});
document
  .getElementById("form-RegisterUser3")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Limpiar errores previos
    const errorElements = document.querySelectorAll(".error");
    const formulario = document.getElementById("form-RegisterUser3");
    errorElements.forEach((el) => (el.textContent = ""));

    // Obtener valores
    let idguia = document.getElementById("idguiaEnable").value.trim();

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
  .getElementById("ModalForm3")
  .addEventListener("hidden.bs.modal", function () {
    // Ocultar todos los mensajes de error
    let errors = document.querySelectorAll(".error");
    errors.forEach(function (error) {
      error.style.display = "none";
    });

    // Limpiar los campos del formulario
    document.getElementById("form-RegisterUser3").reset();
  });
