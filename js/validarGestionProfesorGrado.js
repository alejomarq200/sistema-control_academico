function modalEliminarGradoDeProfesor(button) {
    var idGrado = button.getAttribute("data-grado");

    let titulo = "¿Desea eliminar el grado asignado al profesor?";

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: titulo,
        text: `La eliminación del grado afectará el historial de acciones que realizó de manera definitiva`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            eliminarGradoDeProfesor(idGrado);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: "Acción cancelada",
                text: "Se deshizo la acción de eliminar",
                icon: "error"
            });
        }
    });
}

function eliminarGradoDeProfesor(idGrado) {
    const formulario = document.getElementById('form-cargarProfesorGrado');
    const idProfesor = document.getElementById('idProfesor').value;

    fetch("../AJAX/AJAX_Profesores/eliminarGradoDeProfesor.php", {
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

function cargarGradosProfesor(idProfesor) {
    fetch("../AJAX/AJAX_Profesores/retornarGradosProfesores.php", {
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
            var temp = "";

            data.records.forEach((x) => {
                temp += "<tr>";
                temp += "<td>" + x.id_grado + "</td>";
                temp += "<td>";
                // CORREGIDO: Agregar comillas simples alrededor del valor data-grado
                temp += "<button type='button' class='btn-action btn-eliminar' data-grado='" + x.id + "' onclick='modalEliminarGradoDeProfesor(this)'>ELIMINAR</button>";
                temp += "</td>";
                temp += "</tr>";
            });

            document.getElementById("data").innerHTML = temp;
        })
        .catch(error => {
            console.error('Error al cargar grados:', error);
            document.getElementById("data").innerHTML = "<tr><td colspan='2' style='text-align: center; color: #666;'>Error al cargar los datos</td></tr>";
        });
}

document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("modalProfesorGradoGestion");

    modal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute("data-id");
        var nombre = button.getAttribute("data-nombre");

        document.getElementById("nombreProfesor").value = nombre;
        document.getElementById("idProfesor").value = id;

        const idProfesor = document.getElementById('idProfesor').value;
        cargarGradosProfesor(idProfesor);
    });
});