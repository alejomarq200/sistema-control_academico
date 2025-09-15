<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalGestionProfesor.css">
</head>
<body>
<div class="modal fade" id="modalProfesorGradoGestion" tabindex="-1" aria-labelledby="modalLabelProfesorGradoG"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-cargarProfesorGrado" action="#" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelProfesorGradoG">Administre el grado del profesor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="idProfesor" name="idProfesor" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="anioModal" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombreProfesor" name="nombreProfesor" disabled>
                    </div>
                    <div id="tabla-profesorGestion-container">
                        <!-- Aquí se cargará la tabla de profesores -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Grado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="../js/validarGestionProfesorGrado.js"></script>