function modalEliminarProfesorDeGrado(button) {
    let idGrado = button.getAttribute("data-grado");

    let titulo = "¿Desea eliminar el profesor asignado al grado?";

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: titulo,
        text: `La eliminación del profesor en el grado afectará el historial de acciones que realizó de manera definitiva`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarProfesorDeGrado(idGrado);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Acción cancelada",
                text: "Se deshizo la acción de eliminar",
                icon: "error"
            });
        }
    });
}

function eliminarProfesorDeGrado(idGrado) {
    const formulario = document.getElementById('form-cargarProfesorxGradoDelete');
    const idProfesor = document.getElementById('idProfesor').value;

    fetch("../AJAX/AJAX_Profesores/eliminarProfesorDeGrado.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            idProfesor: idProfesor,
            idGrado: idGrado
        })
    })
        .then(response => response.json())
        .then(data => {

            if (data.status === "success") {
                Swal.fire({
                    title: "Éxito",
                    text: data.message,
                    icon: "success",
                    timer: 2000,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    formulario.submit();
                });
            } else if (data.status === "error") {
                Swal.fire({
                    title: "Error",
                    text: data.message,
                    icon: "error"
                });
            } else {
                // Respuesta inesperada
                Swal.fire({
                    title: "Error",
                    text: "Respuesta inesperada del servidor",
                    icon: "error"
                });
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            Swal.fire({
                title: "Error de conexión",
                text: "No se pudo conectar con el servidor",
                icon: "error"
            });
        });
}

function cargarProfesorDeGrados(idProfesor) {
    fetch("../AJAX/AJAX_Profesores/retornarProfesorxGrados.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            idProfesor: idProfesor
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos:', data); // Para debug

            var temp = "";

            if (data.records && data.records.length > 0) {
                data.records.forEach((x) => {
                    temp += "<tr>";
                    temp += "<td>" + (x.nombre_grado || x.id_grado || 'N/A') + "</td>";
                    temp += "<td>";
                    temp += "<button type='button' class='btn-action btn-eliminar' data-grado='" + x.id + "' onclick='modalEliminarProfesorDeGrado(this)'>ELIMINAR</button>";
                    temp += "</td>";
                    temp += "</tr>";
                });
            } else {
                temp = "<tr><td colspan='2' style='text-align: center; color: #666;'>No hay profesores asignados a este grado</td></tr>";
            }

            document.getElementById("data_delete").innerHTML = temp;
        })
        .catch(error => {
            console.error('Error al cargar grados:', error);
            document.getElementById("data_delete").innerHTML = "<tr><td colspan='2' style='text-align: center; color: #666;'>Error al cargar los datos</td></tr>";
        });
}

document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("modalProfesorxGradoDelete");

    modal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute("data-id-profesor");
        var nombre = button.getAttribute("data-nombre-profesor");

        document.getElementById("idProfesor").value = id;
        document.getElementById("nombreProfesor").value = nombre;

        const idProfesor = document.getElementById('idProfesor').value;
        cargarProfesorDeGrados(idProfesor);
    });
});