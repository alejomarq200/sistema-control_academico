function cargarGrados() {
  $.ajax({
    url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
    type: "POST",
    data: {
      action: "cargar_grados",
      nivelEducativo: $("#nivelEducativo").val(),
    }, // Enviamos una acción específica
    success: function (resultado) {
      $("#selectGrado").html(
        '<option value="Seleccionar" selected>Seleccionar</option>' + resultado,
      );
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
      $("#selectGrado").html(
        '<option value="Error">Error al cargar grados</option>',
      );
    },
  });
}

function cargarGradosRetiro() {
  $.ajax({
    url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
    type: "POST",
    data: {
      action: "cargar_grados",
      nivelEducativo: $("#nivelEducativoRetiro").val(),
    },
    success: function (resultado) {
      console.log("Respuesta del servidor:", resultado); // Para depuración
      $("#selectGradoRetiro").html(
        '<option value="Seleccionar" selected>Seleccionar</option>' + resultado,
      );
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
      $("#selectGradoRetiro").html(
        '<option value="Error">Error al cargar grados</option>',
      );
    },
  });
}

function cargarGradosProsecusión() {
  $.ajax({
    url: "../AJAX/AJAX_Horarios/cargarHorarios.php",
    type: "POST",
    data: {
      action: "cargar_grados",
      nivelEducativo: $("#nivelEducativoProsecusion").val(),
    },
    success: function (resultado) {
      console.log("Respuesta del servidor:", resultado); // Para depuración
      $("#selectGradoProsecusion").html(
        '<option value="Seleccionar" selected>Seleccionar</option>' + resultado,
      );
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
      $("#selectGradoProsecusion").html(
        '<option value="Error">Error al cargar grados</option>',
      );
    },
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const modalConstancia = document.getElementById("modalConstanciaEstudio");
  // Cuando se abre la modal
  modalConstancia.addEventListener("shown.bs.modal", function () {});
  $(document).ready(function () {
    // Cargar estudiantes cuando cambien los selects
    $("#selectGrado, #selectAnio").change(function () {
      const grado = $("#selectGrado").val();
      const anio = $("#selectAnio").val();

      if (grado && anio) {
        cargarEstudiantes(grado, anio);
      }
    });

    // Habilitar/deshabilitar botón de generar según selección
    $(document).on("change", ".planilla-check", function () {
      const haySeleccionados = $(".planilla-check:checked").length > 0;
      $("#btnGenerarConstancias").prop("disabled", !haySeleccionados);
    });

    // Función para cargar estudiantes
    function cargarEstudiantes(grado, anio) {
      $.ajax({
        url: "../AJAX/AJAX_Estudiantes/cargar_estudiantes_constancia.php",
        type: "POST",
        data: {
          gradosS: grado,
          anioS: anio,
        },
        beforeSend: function () {
          $("#tablaEstudiantesContainer").html(
            '<div class="text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>',
          );
        },
        success: function (response) {
          $("#tablaEstudiantesContainer").html(response);
        },
        error: function (xhr, status, error) {
          $("#tablaEstudiantesContainer").html(
            '<div class="alert alert-danger">Error al cargar estudiantes: ' +
              error +
              "</div>",
          );
        },
      });
    }

    // En tu modal donde seleccionas los estudiantes
    $("#btnGenerarConstancias").click(function () {
      const seleccionados = $(".planilla-check:checked")
        .map(function () {
          return $(this).val();
        })
        .get();

      if (seleccionados.length > 0) {
        // Pasar los IDs como parámetro en la URL
        window.open(
          `../reportes/generar_constancia_estudio.php?ids=${seleccionados.join(",")}`,
          "_blank",
        );
      }
    });
  });

  //CARGAMOS MODAL CONSTANCIAS RETIRO
  $(document).ready(function () {
    // Cargar estudiantes cuando cambien los selects
    $("#selectGradoRetiro, #selectAnioRetiro").change(function () {
      const grado = $("#selectGradoRetiro").val();
      const anio = $("#selectAnioRetiro").val();

      if (grado && anio) {
        cargarEstudiantes(grado, anio);
      }
    });

    // Habilitar/deshabilitar botón de generar según selección
    $(document).on("change", ".planilla-check1", function () {
      const haySeleccionados = $(".planilla-check1:checked").length > 0;
      $("#btnGenerarConstanciasRetiro").prop("disabled", !haySeleccionados);
    });

    // Función para cargar estudiantes
    function cargarEstudiantes(grado, anio) {
      $.ajax({
        url: "../AJAX/AJAX_Estudiantes/cargar_estudiantes_constancia_retiro.php",
        type: "POST",
        data: {
          gradosS: grado,
          anioS: anio,
        },
        beforeSend: function () {
          $("#tablaEstudiantesContainerRetiro").html(
            '<div class="text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>',
          );
        },
        success: function (response) {
          $("#tablaEstudiantesContainerRetiro").html(response);
        },
        error: function (xhr, status, error) {
          $("#tablaEstudiantesContainerRetiro").html(
            '<div class="alert alert-danger">Error al cargar estudiantes: ' +
              error +
              "</div>",
          );
        },
      });
    }

    // En tu modal donde seleccionas los estudiantes
    $("#btnGenerarConstanciasRetiro").click(function () {
      const seleccionados = $(".planilla-check1:checked")
        .map(function () {
          return $(this).val();
        })
        .get();

      if (seleccionados.length > 0) {
        // Pasar los IDs como parámetro en la URL
        window.open(
          `../reportes/generar_constancia_retiro.php?ids=${seleccionados.join(",")}`,
          "_blank",
        );
      }
    });
  });

  //CARGAMOS MODAL CONSTANCIAS PROSECUSIÓN
  $(document).ready(function () {
    // Cargar estudiantes cuando cambien los selects
    $("#selectGradoProsecusion, #selectAnioProsecucion").change(function () {
      const grado = $("#selectGradoProsecusion").val();
      const anio = $("#selectAnioProsecucion").val();

      if (grado && anio) {
        cargarEstudiantes(grado, anio);
      }
    });

    // Habilitar/deshabilitar botón de generar según selección
    $(document).on("change", ".planilla-check2", function () {
      const haySeleccionados = $(".planilla-check2:checked").length > 0;
      $("#btnGenerarConstanciasProsecusion").prop(
        "disabled",
        !haySeleccionados,
      );
    });

    // Función para cargar estudiantes
    function cargarEstudiantes(grado, anio) {
      $.ajax({
        url: "../AJAX/AJAX_Estudiantes/cargar_estudiantes_constancia_prosecusion.php",
        type: "POST",
        data: {
          gradosS: grado,
          anioS: anio,
        },
        beforeSend: function () {
          $("#tablaEstudiantesContaineriProsecucion").html(
            '<div class="text-center my-4"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div></div>',
          );
        },
        success: function (response) {
          $("#tablaEstudiantesContaineriProsecucion").html(response);
        },
        error: function (xhr, status, error) {
          $("#tablaEstudiantesContaineriProsecucion").html(
            '<div class="alert alert-danger">Error al cargar estudiantes: ' +
              error +
              "</div>",
          );
        },
      });
    }

    // En tu modal donde seleccionas los estudiantes
    $("#btnGenerarConstanciasProsecusion").click(function () {
      const seleccionados = $(".planilla-check2:checked")
        .map(function () {
          return $(this).val();
        })
        .get();

      if (seleccionados.length > 0) {
        // Pasar los IDs como parámetro en la URL
        window.open(
          `../reportes/gnerar_constancia_prosecusion.php?ids=${seleccionados.join(",")}`,
          "_blank",
        );
      }
    });
  });
});
