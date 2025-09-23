<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalAsignarProfesor.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
    <div class="modal fade" id="modalAsignarMateriaAGrado" tabindex="-1"
        aria-labelledby="modalLabelmodalAsignarMateriaAGrado" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-asignarMateriaAGrado" action="../controller_php/controller_AsignarMateriaAGrado.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelmodalAsignarMateriaAGrado">Registrar asignatura a grado
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nivelMateriaxGrado" class="form-label">Nivel:</label>
                            <input type="text" class="form-control" id="nivelMateriaxGrado" name="nivelMateriaxGrado">
                            <span class="error" id="error-nivelMateriaGrado"></span>
                        </div>
                        <div class="mb-3">
                            <label for="nombreMateriaxGrado" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreMateriaxGrado" name="nombreMateriaxGrado">
                            <span class="error" id="error-nombreMateriaGrado"></span>
                        </div>
                        <div class="mb-3">
                            <label for="grado" class="form-label">Grado:</label>
                            <select name="grado" id="grado" class="form-select">
                                <option value="Seleccionar">Seleccionar</option>
                            </select>
                            <span class="error" id="error-grado"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Asignar</button>
                        <button type="button" class="btn btn-secondary" id="cerrar"
                            data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("modalAsignarMateriaAGrado");
        const formulario = document.getElementById('form-asignarMateriaAGrado');

        // Al abrir la modal: setear nombre/id y limpiar selects anteriores
        modal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const nombre = button.getAttribute("data-nombre-materia");
            const nivel = button.getAttribute("data-nivel-materia");

            document.getElementById("nombreMateriaxGrado").value = nombre;
            document.getElementById("nivelMateriaxGrado").value = nivel;

            const selectGrado = document.getElementById('grado');

            // Limpiar grado y asignaturas (UI + Select2)

            // Cargar grados del profesor (rellena selectGrado)
            cargarGradosProfesor();
        });

        formulario.addEventListener('submit', function (e) {
            e.preventDefault();

            // Array principal con valores y referencias
            // let campos = [
            //     {
            //         nombre: 'nombre materia',
            //         validaciones: [
            //             {
            //                 // Nueva referencia para accesos específicos (tipo, valor almacenado, errores)
            //                 tipo: 'requerido',
            //                 valor: document.getElementById("nombreMateriaxGrado").value.trim(),
            //                 // Uso de error para mejor manipulación (dinámica) de los campos a partir de su ID
            //                 error: 'error-nombreMateriaGrado'
            //             }
            //         ]
            //     },
            //     {
            //         nombre: 'nivel',
            //         validaciones: [
            //             {
            //                 tipo: 'requerido',
            //                 valor: document.getElementById("nivelMateriaxGrado").value.trim(),
            //                 error: 'error-nivelMateriaGrado'
            //             }
            //         ]
            //     },
            //     {
            //         nombre: 'grado',
            //         validaciones: [
            //             {
            //                 tipo: 'requerido',
            //                 valor: document.getElementById("grado").value.trim(),
            //                 error: 'error-grado'
            //             }
            //         ]
            //     }
            // ];

            let validar = true;
            // Acceder a los valores del primer array
            // campos.forEach(campo => {
            // // Acceder a los valores del segundo array (clave)
            //     campo.validaciones.forEach(validacion => {
            //         // Declarción de elemento HTML para mostrar mensajes
            //         const spanError = document.getElementById(validacion.error);

            //         if (validacion.tipo == 'requerido' && !validacion.valor) {
            //             spanError.innerHTML = `Atención se encuentra vacio el campo ${campo.nombre}`;
            //             validar = false;
            //         } else if (validacion.tipo = 'requerido' && !validacion.valor || validacion.tipo == 'requerido' && validacion.valor == 'Seleccionar') {
            //             spanError.innerHTML = `Atención seleccione un valor correcto para ${campo.nombre}`;
            //             validar = false;
            //         } else {
            //             // Limpiamos errores para envío
            //             spanError.innerHTML = '';
            //         }
            //     });
            // });
            
            // Envío posterior a validación de campos y cambio de estado
            if (validar) {
                formulario.submit();
            }

        });

        // Validación (si la asignatura se asignó al grado previamente) **PENDIENTE**
        function poseeAsignaturas(idProfesor, grado) {
            const selectElement = document.getElementById("asignatura[]");
            const selectedValues = Array.from(selectElement.selectedOptions).map(option => option.value);
            const errorAsignatura = document.getElementById('error-asignatura');
            const formulario = document.getElementById('form-asignarProfesorGrado');

            fetch("../AJAX/AJAX_Profesores/profesorPoseeAsignaturas.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idProfesor: idProfesor, idMateria: selectedValues, idGrado: grado })
            })
                .then(response => response.json()) // leer como texto para poder inspeccionar errores HTML
                .then(data => {

                    if (data.status === "error") {
                        errorAsignatura.textContent = data.mensaje + ' ' + data.nombre.join(', ') + '. Verifique.';
                    } else {
                        //Enviar en caso de no haber error
                        formulario.submit();
                    }
                })
                .catch(error => {
                    console.error("Error en fetch:", error);
                });
        }

        function cargarGradosProfesor() {
            $.ajax({
                url: "../AJAX/AJAX_Inscripcion/searchGradosInscr.php",
                type: "POST",
                data: {
                    action: 'cargar_grados'
                }, // Enviamos una acción específica
                success: function (resultado) {
                    $("#grado").html('<option value="Seleccionar" selected>Seleccionar</option>' + resultado);
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                    $("#grado").html('<option value="Error">Error al cargar grados</option>');
                }
            });
        }

        modal.addEventListener("hidden.bs.modal", function () {
            // Resetear el select de grado
            document.getElementById('grado').innerHTML = "";

            // Resetear el select múltiple con Select2
            document.getElementById('error-nombreMateriaGrado').textContent = "";
            document.getElementById('error-nivelMateriaGrado').textContent = "";
            document.getElementById('error-grado').textContent = "";
        });
    });
</script>