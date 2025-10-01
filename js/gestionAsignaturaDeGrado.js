function modalEliminarAsignaturaDeGrado(button) {
    let idGrado = button.getAttribute("data-grado");

    let titulo = "¿Desea eliminar la asignatura asignado al grado?";

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: titulo,
        text: `La eliminación de la asignatura en el grado afectará el historial de acciones que realizó de manera definitiva`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarAsignaturaDeGrado(idGrado);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Acción cancelada",
                text: "Se deshizo la acción de eliminar",
                icon: "error"
            });
        }
    });
}

function eliminarAsignaturaDeGrado(idGrado) {
    const formulario = document.getElementById('form-cargarAsignaturaxGradoDelte');
    const idAsignatura = document.getElementById('idAsignatura').value;

    fetch("../AJAX/AJAX_Grados/eliminarAsignaturaDeGrado.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            idAsignatura: idAsignatura,
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

function cargarAsignaturaDeGrados(idAsignatura) {
    fetch("../AJAX/AJAX_Grados/retornarAsignaturasxGrados.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            idAsignatura: idAsignatura
        })
    })
        .then(response => response.json())
        .then(data => {
            var temp = "";

            data.records.forEach((x) => {
                temp += "<tr>";
                temp += "<td>" + x.id_grado + "</td>";
                temp += "<td>";
                // CORREGIDO: Agregar comillas simples alrededor del valor data-grado
                temp += "<button type='button' class='btn-action btn-eliminar' data-grado='" + x.id + "' onclick='modalEliminarAsignaturaDeGrado(this)'>ELIMINAR</button>";
                temp += "</td>";
                temp += "</tr>";
            });

            document.getElementById("data_delete").innerHTML = temp;
        })
        .catch(error => {
            console.error('Error al cargar grados:', error);
            document.getElementById("data").innerHTML = "<tr><td colspan='2' style='text-align: center; color: #666;'>Error al cargar los datos</td></tr>";
        });
}

document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("modalAsignaturaxGradoDelte");

    modal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute("data-id-materia");
        var nombre = button.getAttribute("data-nombre-materia");

        document.getElementById("idAsignatura").value = id;
        document.getElementById("nombreAsignatura").value = nombre;

        const idAsignatura = document.getElementById('idAsignatura').value;
        cargarAsignaturaDeGrados(idAsignatura);
    });
});