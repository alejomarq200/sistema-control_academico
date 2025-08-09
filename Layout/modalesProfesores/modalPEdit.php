<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesProfesor/modalPEditar.css">
</head>
<body>
    <div class="modal fade" id="ModalFormPEdit" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Profesor</h1>
                        <form action="../controller_php/controller_EditProfesor.php" method="POST"
                            id="form-ProfesorEdit">
                            <input type="text" name="idguiaEditP" class="input" id="idguiaEditP" hidden>
                            <div class="mb-1">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="cedulaEditP" id="cedulaEditP">
                                <p class="erroresEditPr" id="cedulaErrorEditP"></p>
                            </div>
                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombreEditP" id="nombreEditP">
                            </div>
                            <p class="erroresEditPr" id="nombreErrorEditP"></p>
                            <div class="mb-1">
                                <label for="text" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefonoEditP" id="telefonoEditP">
                                <p class="erroresEditPr" id="telefonoErrorEditP"></p>
                            </div>
                            <label for="nivelEditPr" class="form-label">Nivel del Profesor:</label>
                            <select class="form-control" name="nivelEditPr" id="nivelEditPr">
                                <option value="Seleccionar" selected>Seleccionar</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                            </select>
                            <p class="erroresEditPr" id="nivelPrErrorEditP"></p>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
    <script src="../js/validarEditarProfesor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>