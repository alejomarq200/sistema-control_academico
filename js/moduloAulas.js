$(document).ready(function () {
    var table = $('#tablaxAulas').DataTable({
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
            $('.dataTables_filter label').prepend('<i class="bi bi-search" style="margin-right: 8px;"></i>');
            $('.dataTables_length label').append('<i class="bi bi-list-ol" style="margin-left: 8px;"></i>');
        }
    });

    $('#estado_aulas').on('change', function () {
        const valor = $(this).val();

        if (!valor) {
            table.column(3).search('').draw();
            return;
        }

        table.column(3).search('^' + valor + '$', true, false).draw();
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
    window.location.href = "search_aula.php";
})