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
            .done(function(response) {
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
            .fail(function(xhr) {
                Swal.fire({
                    title: "Error",
                    text: "Ocurrió un error al procesar la solicitud",
                    icon: "error"
                });
                console.error("Error:", xhr.responseText);
            });
    }

    document.getElementById('filtroNivel').addEventListener('change', function() {
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

    document.getElementById('filtroEstado').addEventListener('change', function() {
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