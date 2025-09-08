$(document).ready(function () {
        var table = $('#tablaxInscripcion').DataTable({
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

        $('#genero').on('change', function () {
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
                table.column(4).search('').draw();
                return;
            }

            table.column(4).search('^' + valor + '$', true, false).draw();
        });
    });
    function mostrarModalCarga() {
        document.getElementById('modalCarga').style.display = 'flex';
    }

    function ocultarModalCarga() {
        document.getElementById('modalCarga').style.display = 'none';
    }

    function descargarPlanillaInscripcion() {
        mostrarModalCarga();
        const button = event.target.closest('button');
        const id = button.getAttribute('data-id-est');
        // Simula el tiempo de descarga real (ej: PDF generado en backend)
        setTimeout(() => {
            ocultarModalCarga();
            alert("📄 La planilla de inscripción se ha descargado exitosamente.\n¡Gracias por confiar en nuestra institución educativa!");

            // Aquí puedes activar la descarga real si usas un enlace
            window.location.href = "../reportes/reportePlanillaInscripcionI.php?id=" + id;
        }, 2500); // tiempo simulado en milisegundos
    }

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

    document.addEventListener('DOMContentLoaded', () => {

        cargarGrados();
        let recargar = document.getElementById('recargar');

        recargar.addEventListener('click', function () {
            window.location.href = "search_inscripcion.php";
        })
    });