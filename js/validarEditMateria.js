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
          nombre: button.getAttribute("data-nombre")
      };

      // Asignar valores a los campos del formulario
      document.getElementById("idEditM").value = originalValues.IDGUIA;
      document.getElementById("nombreEditM").value = originalValues.nombre;

      limpiarErrores();
  });

  function limpiarErrores() {
      document.querySelectorAll(".errorMEdit").forEach(el => el.textContent = "");
  }

  function validarCampos() {
      let isValid = true;
      limpiarErrores();

      const regexName = /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
      const regexIdguia = /^[0-9]{1,9}$/;

      let idguia = document.getElementById("idEditM").value.trim();
      let nombre = document.getElementById("nombreEditM").value.trim();

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

      return isValid;
  }

  function hayCambiosEnCamposCriticos() {
      // Obtener valores actuales del formulario
      const nombreActual = document.getElementById("nombreEditM").value.trim();

      // Comparar con los valores originales
      const cambios = {
          nombre: nombreActual !== originalValues.nombre
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
      const hayCambiosCriticos = cambios.nombre;

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
                  $("#nombreErrorEditM").html(resultado);

                  var errores = document.getElementById("nombreErrorEditM").textContent;

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