<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalConsultaProfesorAsign.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
    <div class="modal fade" id="modalConsultarProfesorxGrado" tabindex="-1"
        aria-labelledby="modalLabelmodalConsultarProfesorxGrado" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelmodalConsultarProfesorxGrado">Registrar profesor a grado
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div id="tabla-profesorConsulta-container">
                        <!-- Aquí se cargará la tabla de profesores -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Grado</th>
                                    <th>Asignaturas</th>
                                </tr>
                            </thead>
                            <tbody id="data_consulta">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cerrar" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("modalConsultarProfesorxGrado");

        // Al abrir la modal: setear nombre/id y limpiar selects anteriores
        modal.addEventListener("show.bs.modal", function (event) {

            // Cargar grados del profesor (rellena selectGrado)
            cargarConsultaDeProfesores();
        });

        function cargarConsultaDeProfesores() {
            fetch("../AJAX/AJAX_Profesores/enlistarConsultaProfesorxGrado.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(response => response.json())
                .then(data => {
                  console.log(data);
                    var temp = "";

                    data.records.forEach((x) => {
                        temp += "<tr>";
                        temp += "<td>" + x.nombre_profesor + "</td>";
                          temp += "<td>" + x.nombre_grado + "</td>";
                          temp += "<td>" + x.nombre_materia + "</td>";
                        temp += "</tr>";
                    });

                    document.getElementById("data_consulta").innerHTML = temp;
                })
                .catch(error => {
                    console.error('Error al cargar grados:', error);
                    document.getElementById("data").innerHTML = "<tr><td colspan='2' style='text-align: center; color: #666;'>Error al cargar los datos</td></tr>";
                });
        }


        modal.addEventListener("hidden.bs.modal", function () {
        });
    });
</script>