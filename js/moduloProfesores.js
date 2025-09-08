$(document).ready(function () {
    var table = $('#tablaxProfesor').DataTable({
        "dom": '<"top"<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>>rt<"bottom"<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>><"clear">',
        "language": {
            "decimal": "",
            "emptyTable": "No hay datos disponibles en la tabla",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activar para ordenar columna ascendente",
                "sortDescending": ": activar para ordenar columna descendente"
            }
        },

        "initComplete": function (settings, json) {
            // Añadir icono de lupa al buscador
            $('.dataTables_filter label').prepend('<i class="bi bi-search" style="margin-right: 8px;"></i>');

            // Añadir icono al select de registros por página
            $('.dataTables_length label').append('<i class="bi bi-list-ol" style="margin-left: 8px;"></i>');
        }
    });

    $('#estado_aulas').on('change', function () {
        const valor = $(this).val();

        if (!valor) {
            table.column(4).search('').draw();
            return;
        }

        table.column(4).search('^' + valor + '$', true, false).draw();
    });

    $('#grado_aulas').on('change', function () {
        const valor = $(this).val();
        console.log('Valor seleccionado:', valor);

        if (!valor) {
            table.column(2).search('').draw();
            return;
        }

        table.column(2).search('^' + valor + '$', true, false).draw();
    });
});

function cargarGrados() {
    $.ajax({
        url: "../AJAX/AJAX_Aulas/searchGradosFiltros.php",
        type: "POST",
        data: {
            action: 'cargar_grados'
        }, // Enviamos una acción específica
        success: function (resultado) {
            $("#grado_aulas").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
            $("#grado_aulas").html('<option value="Error">Error al cargar grados</option>');
        }
    });
}

cargarGrados();
let recargar = document.getElementById('recargar');

recargar.addEventListener('click', function () {
    window.location.href = "search_profesor.php";
})


function confirmDeleteProfesor(button) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-danger ms-2",
            cancelButton: "btn btn-secondary"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "¿Eliminar profesor?",
        text: "Esta acción no se puede deshacer y afectará los registros relacionados",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirmar eliminación",
        cancelButtonText: "Cancelar",
        reverseButtons: true,
        focusCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            const profesorId = $(button).data("id");
            deleteMateria(profesorId);
        }
    });
}

function deleteMateria(profesorId) {
    $.ajax({
        type: "POST",
        url: "../AJAX/AJAX_Profesores/DeleteProfesores.php",
        data: {
            id_profesor: profesorId
        },
        dataType: "json"
    })
        .done(function (response) {
            if (response.success) {
                Swal.fire({
                    title: response.title,
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    location.href = "search_profesor.php";
                });
            } else {
                Swal.fire({
                    title: response.title,
                    text: response.message,
                    icon: response.icon || "error"
                });
            }
        })
        .fail(function (xhr) {
            Swal.fire({
                title: "Error",
                text: "Ocurrió un error al procesar la solicitud",
                icon: "error"
            });
            console.error("Error:", xhr.responseText);
        });
}