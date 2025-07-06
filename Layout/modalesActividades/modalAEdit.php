<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesMaterias/modalEditM.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesActividades/modalCrearA.css">
</head>
<body>
    <div class="modal fade" id="ModalFormAEdit" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Actividades</h1>
                        <form action="../controller_php/controller_EditActividad.php" method="POST"
                            id="form-EditActividad">
                            <div class="mb-1">
                                <input type="text" name="idEditA" id="idEditA" class="input" hidden>
                            </div>
                            <div class="mb-1">
                                <label for="nombreGradoEdit" class="form-label">Nombre del Grado</label>
                                <input type="text" class="form-control" name="nombreGradoEdit" id="nombreGradoEdit"
                                    readonly>
                            </div>
                            <p class="errorAEdit" id="nombreGradoEditError"></p>
                            <div class="mb-1">
                                <label for="nombreAsigEdit" class="form-label">Nombre de la Asignatura</label>
                                <input type="text" class="form-control" name="nombreAsigEdit" id="nombreAsigEdit"
                                    readonly>
                            </div>
                            <p class="errorAEdit" id="nombreAsigEditError"></p>
                            <div class="mb-1">
                                <label for="nombreProfesorEdit" class="form-label">Nombre del profesor</label>
                                <input type="text" class="form-control" name="nombreProfesorEdit"
                                    id="nombreProfesorEdit" readonly>
                            </div>
                            <p class="errorAEdit" id="nombreProfesorEditError"></p>

                            <div class="mb-1">
                                <label for="contenidoEdit" class="form-label">Contenido</label>
                                <textarea name="contenidoEdit" id="contenidoEdit" class="styled-textarea"
                                    placeholder="Ingrese la descripción de la actividad" maxlength="200"
                                    oninput="contarCaracteres()"></textarea>
                                <span class="char-counter"><span id="contador">0</span>/200</span>
                            </div>
                            <p class="errorAEdit" id="contenidoEditError"></p>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/editarActividad.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>