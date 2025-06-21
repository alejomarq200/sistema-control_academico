var form1 = document.getElementById("form1");
var form2 = document.getElementById("form2");
var back1 = document.getElementById("back1");
var next2 = document.getElementById("next2");
var progress = document.getElementById("progress");

// Mostrar el primer formulario al cargar la página
form1.classList.add("active");
progress.style.width = "50.00%"; // Asignamos valor al primer paso

// Usar event delegation para manejar los clics en los botones con la clase "next1"
document.addEventListener("click", function (event) {
  if (event.target.classList.contains("next1")) {
    // Obtener el botón que se ha clickeado
    var button = event.target;

    // Obtener los valores de los atributos `data-*`
    var id = button.getAttribute("data-id");
    var cedula = button.getAttribute("data-cedula");
    var nombre = button.getAttribute("data-nombre");

    // Asignar los valores a los campos del formulario
    document.getElementById("idguiaProfesor").value = id;
    document.getElementById("cedulaP").value = cedula;
    document.getElementById("nombreP").value = nombre;

    document.getElementById("categoria").value = "Seleccionar";
    document.getElementById("grados").value = "Seleccionar";
    document.getElementById("materias").value = "Seleccionar";

    // Cambiar al siguiente formulario
    form1.classList.remove("active");
    form2.classList.add("active");
    progress.style.width = "100.00%"; // Segundo paso
  }
});

back1.onclick = function () {
  // Limpiar mensajes de error
  const errorElements = document.querySelectorAll("#form2 .errorFormMultiPr");

  errorElements.forEach((el) => {
    el.textContent = ""; // Limpiar el contenido del mensaje de error
  });

  // Cambiar al formulario 1
  form2.classList.remove("active");
  form1.classList.add("active");
  progress.style.width = "50.00%"; // Ajustar la barra de progreso
};

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("form2").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevenir el envío del formulario
    // Limpiar errores previos
    const errorElements = document.querySelectorAll(".errorFormMultiPr");
    errorElements.forEach((el) => {
      el.textContent = "";
    });

    // Obtener valores
    let idGuia = document.getElementById("idguiaProfesor").value.trim();
    let cedula = document.getElementById("cedulaP").value.trim();
    let nombre = document.getElementById("nombreP").value.trim();
    let grado = document.getElementById("grados").value.trim();
    let materia = document.getElementById("materias").value.trim();
    let categoria = document.getElementById("categoria").value.trim();

    // Expresiones regulares
    const regexName =
      /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
    const regexDni = /^[V|E|J|P][0-9]{7,9}$/;
    const regexIdguia = /^[0-9]{1,9}$/;

    let isValid = true;

    // Validación ID Guía
    if (!idGuia || !regexIdguia.test(idGuia)) {
      isValid = false;
    }

    // Validación Cédula
    if (!cedula) {
      document.getElementById("errorCedulaPG").textContent =
        "El campo cédula es obligatorio";
      isValid = false;
    } else if (!regexDni.test(cedula)) {
      document.getElementById("errorCedulaPG").textContent =
        "Formato inválido en la cédula";
      isValid = false;
    } else {
      document.getElementById("errorCedulaPG").textContent = "";
    }

    // Validación Nombre
    if (!nombre || !regexName.test(nombre)) {
      document.getElementById("errorNombrePG").textContent =
        "Formato inválido: Ingrese solo letras con espacios";
      isValid = false;
    } else {
      document.getElementById("errorNombrePG").textContent = "";
    }

    // Validación Categoría (NUEVA VALIDACIÓN)
    if (categoria == "Seleccionar") {
      document.getElementById("errorCategoria").textContent =
        "Seleccione una categoría";
      isValid = false;
    } else {
      document.getElementById("errorCategoria").textContent = "";
    }

    // Validación Grado (MEJORADA)
    if (!grado) {
      document.getElementById("errorGrado").textContent = "Campo vacio";
      isValid = false;
    } else if (grado == "Seleccionar" || grado == "Error grado asignado") {
      document.getElementById("errorGrado").textContent =
        "Seleccione una categoria correcta";
      isValid = false;
    } else {
      document.getElementById("errorGrado").textContent = "";
    }

    // Validación Materia
    if (
      !materia ||
      materia == "Seleccionar" ||
      materia == "Seleccione un grado" ||
      materia == "No hay materias disponibles"
    ) {
      document.getElementById("errorMateriaPG").textContent =
        "Seleccione una materia válida";
      isValid = false;
    } else {
      document.getElementById("errorMateriaPG").textContent = "";
    }

    // Enviar datos si todo es válido
    if (isValid) {
      validarDni();
    }
  });
});



function validarMateriadeGrado() {
  $.ajax({
    url: "../AJAX/SearchMateria.php", // Asegúrate de que esta URL sea correcta
    type: "POST",
    data: $("#form2").serialize(),
    success: function (resultado) {
      // Aquí manejas la respuesta del servidor
      $("#materias").html(resultado); // Actualiza el select de materias con la respuesta
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:");
      console.error("Status:", status);
      console.error("Error:", error);
      console.error("Respuesta del servidor:", xhr.responseText);
    },
  });
}

function validarCategoriadeGrado() {
  $.ajax({
    url: "../AJAX/SearchGradoPr.php", // Asegúrate de que esta URL sea correcta
    type: "POST",
    data: $("#form2").serialize(),
    success: function (resultado) {
      // Aquí manejas la respuesta del servidor
      $("#grados").html(resultado); // Actualiza el select de materias con la respuesta
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:");
      console.error("Status:", status);
      console.error("Error:", error);
      console.error("Respuesta del servidor:", xhr.responseText);
    },
  });
}
