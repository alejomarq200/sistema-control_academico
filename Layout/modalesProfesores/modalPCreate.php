<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesProfesor/modalP.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .erroresCreateP {
            text-align: left;
            padding-left: 0;
            color: red;
            font-size: 0.85rem;
            margin-top: 0.1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="ModalFormP" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="form-area">
                        <h1 class="text-center">Agregar Profesor</h1>
                        <form action="../controller_php/controller_CreateProfesor.php" method="POST"
                            id="form-RegisterProfesor">
                            <div class="column">
                                <div class="select-box">
                                    <select id="dniPrefixP" name="type_dniP">
                                        <option value="V" selected>V</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="mb-1 input-box">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <input type="number" class="form-control" name="cedulaCreateP" id="cedulaCreateP">
                                </div>
                            </div>
                            <p class="erroresCreateP" id="cedulaErrorCreateP"></p>

                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombreCreateP" id="nombreCreateP">
                            </div>
                            <p class="erroresCreateP" id="nombreErrorCreateP"></p>
                            <div class="column">
                                <div class="select-box">
                                    <select id="dniPrefixP" name="type_tlfnP">
                                        <option value="0412" selected>0412</option>
                                        <option value="0414">0414</option>
                                        <option value="0424">0424</option>
                                        <option value="0416">0416</option>
                                        <option value="0426">0426</option>
                                    </select>
                                </div>
                                <div class="mb-1 input-box">
                                    <label for="cedula" class="form-label">Telefono</label>
                                    <input type="number" class="form-control" name="telefonoCreateP"
                                        id="telefonoCreateP">
                                </div>
                            </div>
                            <p class="erroresCreateP" id="telefonoErrorCreateP"></p>
                            <label for="nivelProfersor" class="form-label">Nivel del Profesor:</label>
                            <select class="form-control" name="nivelProfesor" id="nivelProfesor">
                                <option value="Seleccionar" selected>Seleccionar</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                            </select>
                            <p class="erroresCreateP" id="nivelProfesorErrorCreateP"></p>
                            <button type="submit" class="btn btn-light mt-2">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/validarCrearProfesor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>