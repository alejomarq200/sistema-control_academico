<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Actividades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel="stylesheet" href="../css/modalesActividades/regActividad.css">
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: rgb(30, 93, 134);
            --color-accento: rgb(247, 252, 0);
            --color-fondo: #ecf0f1;
            --color-texto: #2c3e50;
            --color-borde: #bdc3c7;
            --color-btn: rgb(122, 156, 179);
            --color-btn-blue: #00ABE1;
            --color-bordes: #aedfe4;
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* aedfe4 */
            border-left: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-bottom: 5px solid var(--color-bordes);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--color-bordes), var(--color-bordes));
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            font-weight: 600;
            background: linear-gradient(135deg,
                    var(--color-btn-blue),
                    var(--color-btn-blue));
            color: white;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* aedfe4 */
            border-left: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-bottom: 5px solid var(--color-bordes);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--color-bordes), var(--color-bordes));
        }
    </style>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu_1.php");
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
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="anioEscolar" name="anioEscolar" readonly>
                        </div>
                        <h1 class="form-title">Registro de Actividades</h1>
                        <form action="../controller_php/controller_CreateActividad.php" method="POST"
                            id="form-RegisterActividad">
                            <input type="hidden" name="añoEscolar" id="añoEscolar">
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
                            <div class="mb-4">
                                <label for="tipoContenido" class="form-label"><i class="fi fi-bs-overview"></i>
                                    Tipo de Contenido</label>
                                <input type="text" name="tipoContenido" id="tipoContenido" class="form-control" placeholder="Describa el tipo de contenido">
                                <p class="error1" id="ErrortipoContenido"></p>
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
                            <button type="submit" class="btn btn-submit" style="color:black;">
                                <i class="fas fa-plus-circle" style="color:black;"></i> Registrar Activdad
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