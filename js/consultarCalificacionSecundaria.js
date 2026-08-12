$(document).ready(function () {
  $('.search-box input[type="text"]').on("keyup input", function () {
    /* Get input value on change */
    var inputVal = $(this).val();
    var resultDropdown = $(this).siblings(".result");
    if (inputVal.length) {
      $.get("backend-search.php", {
        term: inputVal,
      }).done(function (data) {
        // Display the returned data in browser
        resultDropdown.html(data);
      });
    } else {
      resultDropdown.empty();
    }
  });

  // Set search input value on click of result item
  $(document).on("click", ".result p", function () {
    $(this)
      .parents(".search-box")
      .find('input[type="text"]')
      .val($(this).text());
    $(this).parent(".result").empty();
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Calcular y asignar el año escolar
  const añoActual = new Date().getFullYear();
  $("#anio_escolar").val(`${añoActual}-${añoActual + 1}`);

  // Cambia el nombre de la función alert para evitar conflictos
  contarFilasTbody();

  compararValores();
  const form = document.getElementById("infoEstudiante");
  const searchInput = document.querySelector(
    'input[name="busquedaEstudiante"]',
  );
  const requiredSelects = [
    document.querySelector('select[name="nombreGrado"]'),
    document.querySelector('select[name="docente"]'),
    document.querySelector('select[name="materias"]'),
  ];

  // Controlar campos requeridos según búsqueda
  searchInput.addEventListener("input", function () {
    const hasSearch = this.value.trim() !== "";
    requiredSelects.forEach((select) => {
      select.required = hasSearch;
    });
  });

  // Validar envío del formulario
  form.addEventListener("submit", function (e) {
    const hasSearch = searchInput.value.trim() !== "";
    const missingRequired = requiredSelects.some((select) => !select.value);

    if (hasSearch && missingRequired) {
      e.preventDefault();
      alert(
        "Cuando buscas por nombre de estudiante, debes seleccionar grado, docente y materia",
      );
      return false;
    }

    // Validación mínima para consulta general
    if (!hasSearch && missingRequired) {
      e.preventDefault();
      alert(
        "Para consultar el listado completo, debes seleccionar grado, docente y materia",
      );
      return false;
    }
  });
});

function compararValores() {
  const contador =
    parseInt(document.getElementById("contador").value.trim()) || 0;
  const totalMaterias =
    parseInt(document.getElementById("totalMaterias").value.trim()) || 0;

  const total = (document.getElementById("total").value = totalMaterias * 3);
}

function contarFilasTbody() {
  const tabla = document.getElementById("calificaciones-table");
  const tbody = tabla.getElementsByTagName("tbody")[0];
  const numeroFilasTbody = tbody.rows.length;
  document.getElementById("contador").value = numeroFilasTbody;
}

// Asignar el valor al input
document.getElementById("anio_escolar").value = añoEscolar;

function buscarGradodeMaterias() {
  const categoriaGrado = document.getElementById("categoriaGrado").value.trim();
  $.ajax({
    url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
    type: "POST",
    data: $("#infoEstudiante").serialize(),
    success: function (resultado) {
      $("#nombreGrado").html(resultado);
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
    },
  });
}

function cargarSelectMateriasxProfesor() {
  $.ajax({
    type: "POST",
    url: "../AJAX/AJAX_Calificaciones/consultarPrCalificacion.php",
    data: $("#infoEstudiante").serialize(),
    success: function (resultado) {
      $("#docente").html(resultado);
      cargarProfesorxGrado();
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
    },
  });
}

function cargarProfesorxGrado() {
  $.ajax({
    type: "POST",
    url: "../AJAX/AJAX_Calificaciones/consultarPrDocente.php",
    data: $("#infoEstudiante").serialize(),
    success: function (resultado) {
      $("#materias").html(resultado);
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
    },
  });
}
