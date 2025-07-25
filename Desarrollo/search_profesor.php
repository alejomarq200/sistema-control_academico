<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/moduloProfesores.css">
    <title>Consultar Profesores</title>
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
                <h1 class="my-3" id="titulo">Módulo de Profesores</h1>
                <div class="filters-container">
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <div class="filtro-container d-flex align-items-center">
                            <input type="text" id="txtFiltarr" class="filtro-input form-control"
                                placeholder="Buscar...">
                            <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                        </div>
                        <!-- Filtro de Nivel Académico -->
                        <div class="filter-group">
                            <label for="filtroNivel" class="filter-label">
                                <i class="bi bi-book-half"></i> Nivel Académico
                            </label>
                            <select id="filtroNivel" class="form-select filter-select">
                                <option value="">Todos los niveles</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                            </select>

                        </div>
                        <div class="filter-group">
                            <label for="filtroEstado" class="filter-label">
                                <i class="bi bi-gender-ambiguous"></i> Estado
                            </label>
                            <select id="filtroEstado" class="form-select filter-select">
                                <option value="">Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 15px;">
                    <a class="boton-modal-gestionPr">
                        <label for="btn-modal-gestionPr">
                            Gestionar Profesores
                            <i class="bi bi-plus-circle-dotted"></i>
                        </label>
                    </a>
                </div>
                <div class="custom-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col" style="display: none;">Nivel del Grado</th>
                                <th scope="col">Número de Teléfono</th>
                                <th scope="col" style="display: none;">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include("../Configuration/functions_php/functionsCRUDProfesor.php");
                            include("../Layout/modalesProfesores/modalPEdit.php");
                            include("../Layout/modalesProfesores/modalPEnable.php");
                            include("../Layout/modalesProfesores/modalPDisable.php");

                            $profesores = consultarProfesorCRUD($pdo); // Obtener los usuarios
                            
                            if (!empty($profesores)) {
                                foreach ($profesores as $profesor) { // Iterar sobre cada usuario
                            
                                    // Mapear id_estado a su valor correspondiente
                                    if ($profesor['estado'] == 1) {
                                        $profesor['estado'] = 'Inactivo';
                                    } elseif ($profesor['estado'] == 2) {
                                        $profesor['estado'] = 'Activo';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo ($profesor['cedula']); ?></td>
                                        <td><?php echo ($profesor['nombre']); ?></td>
                                        <td style="display: none;"><?php echo ($profesor['nivel_grado']); ?></td>
                                        <td><?php echo ($profesor['telefono']); ?></td>
                                        <td style="display: none;"><?php echo ($profesor['estado']); ?></td>
                                        <td>
                                            <a href="#ModalFormPEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormPEdit"
                                                data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                data-id="<?php echo $profesor['cedula']; ?>"
                                                data-nombre="<?php echo $profesor['nombre']; ?>"
                                                data-telefono="<?php echo $profesor['telefono']; ?>"
                                                data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormPEnable"
                                                data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                data-id="<?php echo $profesor['cedula']; ?>"
                                                data-nombre="<?php echo $profesor['nombre']; ?>"
                                                data-telefono="<?php echo $profesor['telefono']; ?>"
                                                data-estado="<?php echo $profesor['estado']; ?>"
                                                data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                <i class='bx  bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormPDisable"
                                                data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                data-id="<?php echo $profesor['cedula']; ?>"
                                                data-nombre="<?php echo $profesor['nombre']; ?>"
                                                data-telefono="<?php echo $profesor['telefono']; ?>"
                                                data-estado="<?php echo $profesor['estado']; ?>"
                                                data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?php echo $profesor['id_profesor']; ?>"
                                                onclick="eliminarProfesor(this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='8'>No se encontraron usuarios.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </main>
            </div>
        </div>
    </div>
</body>
<!--Ventana Modal-->
<input type="checkbox" id="btn-modal-gestionPr">
<div class="container-modal-gestionPr">
    <div class="content-modal-gestionPr">
        <h2>Gestión de Grados</h2>
        <div class="container">
            <form id="form1-gestionPr">
                <table id="tabla-general">
                    <thead>
                        <tr style="height: 60px;">
                            <th>Cédula Profesor</th>
                            <th>Nombre Profesor</th>
                            <th>Nivel de Grado</th>
                            <th>Materias(s)</th>
                            <th>Grado(s)</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $profesoresAsignados = obtenerProfesoresAsignados($pdo);

                        if (!empty($profesoresAsignados)) {
                            foreach ($profesoresAsignados as $profesor) {
                                //$nombreMateria = retornarMateriasEnTabla($pdo, $profesor);
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($profesor['cedula']); ?></td>
                                    <td><?php echo htmlspecialchars($profesor['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($profesor['nivel_grado']); ?></td>
                                    <td><?php echo htmlspecialchars($profesor['materias_asignados']); ?></td>
                                    <td><?php echo htmlspecialchars($profesor['grados_asignados']); ?></td>
                                    <td>
                                        <button type="button" class="next1-gestionPr"
                                            data-cedula="<?php echo htmlspecialchars($profesor['cedula']); ?>"
                                            data-nombre="<?php echo htmlspecialchars($profesor['nombre']); ?>"
                                            data-grado="<?php echo htmlspecialchars($profesor['grados_asignados']); ?>"
                                            data-nivelProfesor="<?php echo htmlspecialchars($profesor['nivel_grado']); ?>">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='6'>No se encontraron profesores activos.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <form method="POST" action="../controller_php/controller_FormMultiStepGestionPr.php" id="form2-gestionPr">
                <h3>Información del Grado</h3>
                <label for="cedulaProfesorG" class="labelGrados">Cédula del Profesor:</label>
                <input type="text" name="cedulaProfesorG" id="cedulaProfesorG" style="margin-bottom: -30px;" readonly>
                <p class="errorFormMultiPr" id="errorCedulaProfesorG"></p>
                <label for="nombreProfesorG" class="labelGrados">Nombre del Profesor:</label>
                <input type="text" name="nombreProfesorG" id="nombreProfesorG" style="margin-bottom: -30px;" readonly>
                <p class="errorFormMultiPr" id="errorProfesorG"></p>
                <label for="nivelProfesorG" class="labelGrados">Nivel del Profesor:</label>
                <input type="text" name="nivelProfesorG" id="nivelProfesorG" style="margin-bottom: -30px;" readonly>
                <p class="errorFormMultiPr" id="errornivelProfesorG"></p>
                <label for="gradosG" class="labelGrados">Grado(s):</label>
                <select name="gradosG" id="gradosG" class="selectGrados" onchange="cargarSelectMateriasxProfesor()">
                    <option value="Seleccionar" selected>Seleccionar</option>
                </select>
                <p class="errorFormMultiPr" id="errorGradosG"></p>
                <label for="materiasG" class="labelGrados">Materia(s):</label>
                <select name="materiasG" id="materiasG" class="selectGrados">
                    <option value="No asignado" selected>No asignado</option>
                </select>
                <p class="errorFormMultiPr" id="errorMateriasG"></p>
                <div class="btn-box">
                    <button type="button" id="back1-gestionPr">Volver</button>
                    <button type="submit">Registrar</button>
                </div>
            </form>
            <div class="step-row-gestionPr">
                <div id="progress-gestionPr"></div>
                <div class="step-col-gestionPr"><small>Primer paso</small></div>
                <div class="step-col-gestionPr"><small>Segundo paso</small></div>
            </div>
        </div>
        <div class="btn-cerrar-gestionPr">
            <label for="btn-modal-gestionPr">Cerrar</label>
        </div>
    </div>
    <label for="btn-modal-gestionPr" class="cerrar-modal-gestionPr"></label>
</div>
<!--Fin de Ventana Modal-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form1 = document.getElementById("form1-gestionPr");
        var form2 = document.getElementById("form2-gestionPr");
        var back1 = document.getElementById("back1-gestionPr");
        var progress = document.getElementById("progress-gestionPr");

        // Mostrar el primer formulario al cargar la página
        if (form1 && form2 && back1 && progress) {
            form1.classList.add("active");
            progress.style.width = "50.00%";

            // Delegación de eventos para botones dinámicos
            document.addEventListener("click", function (event) {
                if (event.target.closest(".next1-gestionPr")) {

                    var button = event.target.closest(".next1-gestionPr");

                    var cedula = button.getAttribute("data-cedula");
                    var nombre = button.getAttribute("data-nombre");
                    var nivelPr = button.getAttribute("data-nivelProfesor");

                    document.getElementById("cedulaProfesorG").value = cedula;
                    document.getElementById("nombreProfesorG").value = nombre;
                    document.getElementById("nivelProfesorG").value = nivelPr;

                    form1.classList.remove("active");
                    form2.classList.add("active");
                    progress.style.width = "100.00%";
                    cargarSelectGrados();
                }
            });
            back1.onclick = function () {
                const errorElements = document.querySelectorAll("#form2-gestionPr .errorFormMultiPr");
                errorElements.forEach((el) => {
                    el.textContent = "";
                });
                form2.classList.remove("active");
                form1.classList.add("active");
                progress.style.width = "50.00%";
            };
        } else {
            console.error("No se encontraron todos los elementos necesarios");
        }
    });

    function cargarSelectGrados() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Profesores/searchGradosxProfG.php",
            data: $("#form2-gestionPr").serialize(),
            success: function (data) {
                $("#gradosG").html(data);

            },
        });
    }

    function cargarSelectMateriasxProfesor() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Profesores/searchMateriasxProfesor.php",
            data: $("#form2-gestionPr").serialize(),
            success: function (data) {
                $("#materiasG").html(data);
            },
        });
    }

    function validarExisteProfesorG() {
        $.ajax({
            type: "POST",
            url: "../AJAX/AJAX_Profesores/searchExisteProfesorG.php",
            data: $("#form2-gestionPr").serialize(),
            success: function (data) {
                $("#errorMateriasG").html(data);
                var errores = document.getElementById("errorMateriasG").textContent;

                if (errores.trim() === "") {
                    document.getElementById("form2-gestionPr").submit();
                } else {
                    console.log("Error en la validación: ", errores);
                }
            },
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("form2-gestionPr").addEventListener("submit", function (event) {
            event.preventDefault();
            const errorElements = document.querySelectorAll(".errorFormMultiPr");
            errorElements.forEach((el) => {
                el.textContent = "";
            });

            const regexName = /^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/;
            let isValid = true;

            let cedula = document.getElementById("cedulaProfesorG").value.trim();
            let nombre = document.getElementById("nombreProfesorG").value.trim();
            let nivel = document.getElementById("nivelProfesorG").value.trim();
            let grado = document.getElementById("gradosG").value.trim();
            let materia = document.getElementById("materiasG").value.trim();

            if (grado == "Seleccionar" || grado == "No asignado") {
                isValid = false;
                document.getElementById("errorGradosG").textContent = "Seleccione un grado del profesor correcto";
            }

            if (materia == "Seleccionar" || materia == "No asignado") {
                isValid = false;
                document.getElementById("errorMateriasG").textContent = "Seleccione una materia del profesor correcto";
            }

            if (isValid) {
                //document.getElementById("form2-gestionPr").submit();
                validarExisteProfesorG();
            }
        });

        // Resetear modal al abrir
        document.getElementById('btn-modal-gestionPr').addEventListener('change', function () {
            if (this.checked) {
                form2.classList.remove("active");
                form1.classList.add("active");
                progress.style.width = "50.00%";

                const errorElements = document.querySelectorAll(".errorFormMultiPr");
                errorElements.forEach((el) => {
                    el.textContent = "";
                });
            }
        });
    });
</script>
<script src="../js/moduloProfesor.js"></script>

</html>