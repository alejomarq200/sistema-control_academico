<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesMaterias/modalEditM.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesAulas/editAulas.css">
</head>

<body>
    <div class="modal fade" id="ModalFormEditaAula" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Aulas</h1>
                        <form action="../controller_php/contoller_EditAula.php" method="POST" id="form-EditAula">
                            <div class="mb-1">
                                <input type="text" name="idEditAula" class="input" id="idEditAula">
                            </div>
                            <div class="mb-1">
                                <label for="nombreAula" class="form-label">Nombre del Aula</label>
                                <input type="text" class="form-control" name="nombreAula" id="nombreAula">
                            </div>
                            <p class="errorAulaEdit" id="nombreErrorAula"></p>
                            <div class="mb-1">
                                <label for="capacidadAula" class="form-label">Capacidad del Aula</label>
                                <input type="text" class="form-control" name="capacidadAula" id="capacidadAula" min="1" max="30">
                            </div>
                            <p class="errorAulaEdit" id="capacidadErrorAula"></p>
                            <div class="mb-1">
                                <label for="gradoAula" class="form-label">Grado</label>
                                <select name="gradoAula" id="gradoAula" class="form-select">
                                    <option value="Seleccionar">Seleccionar</option>
                                    <option value="1er grado">1er grado</option>
                                    <option value="2do grado">2do grado</option>
                                    <option value="3er grado">3er grado</option>
                                    <option value="4to grado">4to grado</option>
                                    <option value="5to grado">5to grado</option>
                                    <option value="6to grado">6to grado</option>
                                    <option value="1er año">1er año</option>
                                    <option value="2do año">2do año</option>
                                    <option value="3er año">3er año</option>
                                    <option value="4to año">4to año</option>
                                    <option value="5to año">5to año</option>
                                </select>
                            </div>
                            <p class="errorAulaEdit" id="gradoErrorAula"></p>
                            <div class="mb-1">
                                <label for="estadoAula" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estadoAula" id="estadoAula" disabled>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/validarEditAulas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>