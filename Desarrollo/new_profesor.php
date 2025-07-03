<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/modalesProfesor/regProfesor.css">
</head>
<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                    <div class="container">
                        <div class="form-container">
                            <div class="education-icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <h1 class="form-title">Registro de Profesores</h1>
                            <form action="../controller_php/controller_CreateProfesor.php" method="POST"
                                id="form-RegisterProfesor">
                                <div class="mb-4">
                                    <div class="column">
                                        <div class="select-box">
                                            <label for="dniPrefixP" class="form-label"><i class="fas fa-id-card"></i>
                                                Tipo</label>
                                            <select class="form-select" id="dniPrefixP" name="type_dniP">
                                                <option value="V" selected>V</option>
                                                <option value="E">E</option>
                                            </select>
                                        </div>
                                        <div class="input-box">
                                            <label for="cedulaCreateP" class="form-label"><i
                                                    class="fas fa-id-badge"></i> Cédula</label>
                                            <input type="number" class="form-control" name="cedulaCreateP"
                                                id="cedulaCreateP" placeholder="Ej: 12345678">
                                        </div>
                                    </div>
                                    <p class="erroresCreateP" id="cedulaErrorCreateP"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="nombreCreateP" class="form-label"><i class="fas fa-user"></i> Nombre
                                        Completo</label>
                                    <input type="text" class="form-control" name="nombreCreateP" id="nombreCreateP"
                                        placeholder="Ej: María Rodríguez">
                                    <p class="erroresCreateP" id="nombreErrorCreateP"></p>
                                </div>

                                <div class="mb-4">
                                    <div class="column">
                                        <div class="select-box">
                                            <label for="dniPrefixP" class="form-label"><i class="fas fa-mobile-alt"></i>
                                                Código</label>
                                            <select class="form-select" id="dniPrefixP" name="type_tlfnP">
                                                <option value="0412" selected>0412</option>
                                                <option value="0414">0414</option>
                                                <option value="0424">0424</option>
                                                <option value="0416">0416</option>
                                                <option value="0426">0426</option>
                                            </select>
                                        </div>
                                        <div class="input-box">
                                            <label for="telefonoCreateP" class="form-label"><i class="fas fa-phone"></i>
                                                Teléfono</label>
                                            <input type="number" class="form-control" name="telefonoCreateP"
                                                id="telefonoCreateP" placeholder="Ej: 1234567">
                                        </div>
                                    </div>
                                    <p class="erroresCreateP" id="telefonoErrorCreateP"></p>
                                </div>

                                <div class="mb-4">
                                    <label for="nivelProfesor" class="form-label"><i class="fas fa-graduation-cap"></i>
                                        Nivel del Profesor</label>
                                    <select class="form-select" name="nivelProfesor" id="nivelProfesor">
                                        <option value="Seleccionar" selected>Seleccione un nivel...</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                    </select>
                                    <p class="erroresCreateP" id="nivelProfesorErrorCreateP"></p>
                                </div>

                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-user-plus"></i> Registrar Profesor
                                </button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="../js/crearProfesor.js"></script>
</body>
</html>