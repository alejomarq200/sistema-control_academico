 function confirmDeleteMateria(button) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-danger ms-2",
                cancelButton: "btn btn-secondary"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "¿Eliminar materia?",
            text: "Esta acción no se puede deshacer y afectará los registros relacionados",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar eliminación",
            cancelButtonText: "Cancelar",
            reverseButtons: true,
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                const materiaId = $(button).data("id");
                deleteMateria(materiaId);
            }
        });
    }

    function deleteMateria(materiaId) {
        $.ajax({
                type: "POST",
                url: "../AJAX/AJAX_Materias/DeleteMaterias.php",
                data: {
                    id_materia: materiaId
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
                        location.href = "search_materia.php";
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