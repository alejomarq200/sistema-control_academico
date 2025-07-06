<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modalesActividades/regActividad.css">
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
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h1 class="form-title">Registro de Actividades</h1>
                        <form action="../controller_php/controller_CreateActividad.php" method="POST"
                            id="form-RegisterActividad">
                            <div class="mb-4">
                                <input type="hidden" name="categoriaGrado" id="categoriaGrado" value="Primaria"
                                    style="display: none;" readonly>
                                <label for="gradoActividad" class="form-label"><i class="fas fa-layer-group"></i> Grado
                                    de la actividad</label>
                                <select class="form-select" name="gradoActividad" id="gradoActividad"
                                    onchange="cargarSelectMateriasxProfesor()">
                                    <option value="Seleccionar">Seleccionar</option>
                                </select>
                                <p class="error1" id="ErrorGradoActividad"></p>
                            </div>
                            <div class="mb-4">
                                <label for="profesorActividad" class="form-label"><i class="bi bi-person-square"></i>
                                    Nombre del
                                    Profesor</label>
                                <select class="form-select" name="profesorActividad" id="profesorActividad"
                                    onchange="cargarProfesorxGrado()">
                                    <option value="Seleccionar" selected>Seleccione un Profesor...</option>
                                </select>
                                <p class="error1" id="ErrorProfesorActividad"></p>
                            </div>
                            <div class="mb-4">
                                <label for="asignatura" class="form-label"><i class="fas fa-font"></i> </i> Nombre
                                    de la
                                    Asignatura</label>
                                <select class="form-select" name="asignatura" id="asignatura">
                                    <option value="Seleccionar" selected>Seleccione una asignatura...</option>
                                </select>
                                <p class="error1" id="ErrorAsignatura"></p>
                            </div>
                            <div class="textarea-container">
                                <textarea name="actividad" id="actividad" class="styled-textarea"
                                    placeholder="Ingrese la descripción de la actividad" maxlength="200"
                                    oninput="contarCaracteres()"></textarea>
                                <div class="textarea-footer">
                                    <span class="error1" id="ErrorActividad"></span>
                                    <span class="char-counter"><span id="contador">0</span>/200</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-plus-circle"></i> Registrar Activdad
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
    <script src="../js/crearActividad.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>