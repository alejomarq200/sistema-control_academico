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
    <div class="modal fade" id="modalAsignarProfesor" tabindex="-1" aria-labelledby="modalLabelmodalAsignarProfesor"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="form-asignarProfesorGrado" action="../controller_php/controller_AsignarProfesorAGrado.php"
                    method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelmodalAsignarProfesor">Registrar profesor a grado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="idProfesorAsig" name="idProfesorAsig" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="nombreProfesorAsig" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreProfesorAsig" name="nombreProfesorAsig"
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label for="grado" class="form-label">Grado:</label>
                            <select name="grado" id="grado" class="form-select">
                                <option value>Seleccionar</option>
                            </select>
                            <span class="error" id="error-grado"></span>
                        </div>
                        <div class="mb-3">
                            <label for="asignatura[]" class="form-label">Seleccione la asignatura:</label>
                            <select class="js-select2" multiple="multiple" id="asignatura[]" name="asignatura[]">
                            </select>
                            <span class="error" id="error-asignatura"></span>
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
    function formatOption(option) {
        if (!option.id) return option.text;
        const icon = $(option.element).data('icon');
        const badge = $(option.element).data('badge');
        return $(`<span><i class="fa ${icon}"></i> ${option.text} </span>`);
    }

    // Inicializa Select2 UNA sola vez (si no lo has inicializado antes)
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Selecciona opciones...",
        allowClear: true,
        templateResult: formatOption,
        templateSelection: formatOption,
        width: '100%',
        dropdownParent: $('#modalAsignarProfesor') // 👈 Esto es clave
    });

    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("modalAsignarProfesor");
        const formulario = document.getElementById('form-asignarProfesorGrado');
        const selectGrado = document.getElementById('grado');
        const selectAsignatura = document.querySelector('[name="asignatura[]"]');


        // Al abrir la modal: setear nombre/id y limpiar selects anteriores
        modal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute("data-id");
            const nombre = button.getAttribute("data-nombre");

            document.getElementById("nombreProfesorAsig").value = nombre;
            document.getElementById("idProfesorAsig").value = id;

            // Limpiar grado y asignaturas (UI + Select2)
            selectGrado.innerHTML = "";
            $(selectAsignatura).empty().val(null).trigger('change');

            // Limpiar errores
            document.getElementById('error-grado').textContent = "";
            document.getElementById('error-asignatura').textContent = "";

            // Cargar grados del profesor (rellena selectGrado)
            cargarGradosProfesor(id);
        });

        // Añadir listener DE CAMBIO al select de grado UNA sola vez
        selectGrado.addEventListener('focus', function () {
            const idGrado = this.value;
            // Siempre limpiar asignaturas antes de cargar nuevas
            $(selectAsignatura).empty().val(null).trigger('change');

            if (idGrado) {
                cargarAsignaturasGrado(idGrado);
            }
        });

        formulario.addEventListener('submit', function (e) {
            e.preventDefault();

            let id = document.getElementById('idProfesorAsig').value.trim();
            let grado = document.getElementById('grado').value.trim();
            let asignatura = document.querySelector('[name="asignatura[]"]').value.trim();
            let validar = true;

            if (!grado && grado != 'Seleccionar') {
                document.getElementById('error-grado').textContent = "El campo grado es obligaotorio";
                validar = false;
            } else {
                document.getElementById('error-grado').textContent = "";
            }

            if (!asignatura) {
                document.getElementById('error-asignatura').textContent = "El campo asignatura es obligaotorio";
                validar = false;
            } else {
                document.getElementById('error-asignatura').textContent = "";
            }

            if (validar) {
                poseeAsignaturas(id, grado);
            }
        });

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


        function cargarGradosProfesor(idProfesor) {
            selectGrado.innerHTML = ""; // limpiar

            fetch("../AJAX/AJAX_Profesores/cargarSelectGradoDeProfesor.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idProfesor: idProfesor })
            })
                .then(response => response.json())
                .then(data => {
                    data.forEach(item => {
                        const opt = new Option(item.grado, item.id_grado, false, false);
                        selectGrado.appendChild(opt);
                    });

                    // Si quieres seleccionar un valor por defecto puedes hacerlo aquí
                })
                .catch(error => {
                    console.error('Error al cargar grados:', error);
                });
        }

        function cargarAsignaturasGrado(idGrado) {
            // Asegúrate de limpiar antes de añadir
            $(selectAsignatura).empty().val(null).trigger('change');

            fetch("../AJAX/AJAX_Profesores/cargarSelectAsignaturaGrados.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idGrado: idGrado })
            })
                .then(response => response.json())
                .then(data => {
                    // data debe ser array de { id_materia, nombre_materia }
                    data.forEach(item => {
                        const option = new Option(item.nombre_materia, item.id_materia, false, false);
                        option.dataset.icon = "fa-book"; // para tu templateResult
                        selectAsignatura.appendChild(option);
                    });

                    // refrescar Select2 (importante)
                    $(selectAsignatura).trigger('change');
                })
                .catch(error => {
                    console.error('Error al cargar las asignaturas:', error);
                    document.getElementById('error-asignatura').textContent = 'No se pudieron cargar las asignaturas.';
                });
        }

        modal.addEventListener("hidden.bs.modal", function () {
            // Resetear el select de grado
            document.getElementById('grado').innerHTML = "";

            // Resetear el select múltiple con Select2
            const selectAsignatura = document.querySelector('[name="asignatura[]"]');
            $(selectAsignatura).val(null).trigger('change'); // 👈 limpia el valor
            selectAsignatura.innerHTML = ""; // 👈 limpia las opciones cargadas

            // Limpiar mensajes de error también si quieres
            document.getElementById('error-grado').textContent = "";
            document.getElementById('error-asignatura').textContent = "";
        });
    });
</script>