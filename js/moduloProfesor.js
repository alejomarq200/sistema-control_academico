   document.getElementById('filtroNivel').addEventListener('change', function () {
        const nivelSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const nivelGrado = fila.querySelector('td:nth-child(3)').textContent.toLowerCase();

            if (nivelSeleccionado === '' || nivelGrado === nivelSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    document.getElementById('filtroEstado').addEventListener('change', function () {
        const nivelSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const nivelEstado = fila.querySelector('td:nth-child(5)').textContent.toLowerCase();

            if (nivelSeleccionado === '' || nivelEstado === nivelSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    function eliminarProfesor(button) {
        let titulo = "¿Desea eliminar al profesor seleccionado?";

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: titulo,
            text: "La eliminación de una profesor afectará los registros que se relacionan a él de manera definitiva",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar!",
            cancelButtonText: "No, cancelar!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    title: "Acción procesada con éxito",
                    text: "La información del profesor se eliminó correctamente.",
                    icon: "success"
                }).then(() => {

                    var url = "../AJAX/AJAX_Profesores/DeleteProfesores.php";
                    // Obtiene el data-id del botón que se hizo clic
                    var miVariable = $(button).data("id");

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            variable: miVariable
                        },
                        success: function (data) {
                            location.href = "search_profesor.php";
                        },
                        error: function (xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire({
                    title: "Acción cancelada",
                    text: "Se deshizo la acción de editar",
                    icon: "error"
                });
            }
        });
    }

    document.getElementById('txtFiltarr').addEventListener('input', function () {
        const filtro = this.value.toLowerCase(); // Texto del filtro en minúsculas
        const filas = document.querySelectorAll('tbody tr'); // Todas las filas de la tabla

        filas.forEach(fila => {
            const textoFila = fila.textContent.toLowerCase(); // Texto de la fila en minúsculas
            if (textoFila.includes(filtro)) {
                fila.style.display = ''; // Muestra la fila si coincide
            } else {
                fila.style.display = 'none'; // Oculta la fila si no coincide
            }
        });
    });