<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesAulas/disableAula.css">
</head>
<body>
    <div class="modal fade" id="ModalFormDisableA" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Habiltar Aula</h1>
                        <form action="../controller_php/controller_DisableAula.php" method="POST" id="form-DisableAula">
                            <div class="mb-1">
                                <input type="text" name="idDisableAula"  class="input" id="idDisableAula" readonly>
                            </div>
                            <div class="mb-1">
                                <label for="nombreDisableAula" class="form-label">Nombre del Aula</label>
                                <input type="text" class="form-control" name="nombreDisableAula" id="nombreDisableAula" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="capacidaDisableAula" class="form-label">Capacidad del Aula</label>
                                <input type="text" class="form-control" name="capacidadDisableAula" id="capacidadDisableAula" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="gradoDisableAula" class="form-label">Grado</label>
                                <select name="gradoDisableAula" id="gradoDisableAula" class="form-select" disabled>
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
                            <div class="mb-1">
                                <label for="estadoDisableAula" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estadoDisableAula" id="estadoDisableAula" disabled>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Inhabilitar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/validarDisableAula.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>