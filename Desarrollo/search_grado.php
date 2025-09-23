<?php
session_start();
error_reporting(0);


include("../Configuration/functions_php/functionsCRUDUser.php");
validarRolyAccesoAdmin($_SESSION['rol'], $_SESSION['estado'], 'Desarrollo/dashboard.php');
?>
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
    <link rel="stylesheet" href="../css/moduloGGrados.css">
    <title>Consultar Grados</title>
</head>
<!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
<div class="wrapper">
    <?php
    include("menu.php");
    ?>
    <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
    <div class="main p-3">
        <div class="text-center">
            <?php
            include("../Layout/mensajes.php");
            /* CUERPO DEL MENÚ */
            ?>

            <!-- Título principal con estilo mejorado -->
            <div class="mb-4" style="max-width: 800px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Grados</h1>
                <p class="lead text-muted">Gestione y administre la información de las asignaturas y profesores de acuerdo al grado</p>
            </div>

            <div class="filters-container">
                <!-- FILTROS CON DISEÑO MODERNO -->
                <div class="filters-wrapper">
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
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
                </div>
            </div>
            <div style="margin-bottom: 15px;">
                <!-- Botón de Agregar Usuarios (a la izquierda) -->
                <a class="boton-modal-grados" id="modulo_ProfesoresDeGrados">
                    <label for="btn-modal-grados">
                        Asignar materias a grados
                        <i class="bi bi-plus-circle-dotted"></i>
                    </label>
                </a>
                <!-- Botón de Agregar Usuarios (a la izquierda) -->
                <a class="boton-modal-gradosP">
                    <label for="btn-modal-gradosP">
                        Asignar profesor a grados
                        <i class="bi bi-plus-circle-dotted"></i>
                    </label>
                </a>

            </div>
            <div class="custom-table-gradosP">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del grado</th>
                            <th scope="col">Nivel del grado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../Configuration/functions_php/functionsCRUDGrados.php");

                        $grados = consultarGradosCRUD($pdo); // Obtener los usuarios

                        if (!empty($grados)) {
                            foreach ($grados as $grado) { // Iterar sobre cada usuario
                        ?>
                                <tr>
                                    <td><?php echo ($grado['id_grado']); ?></td>
                                    <td><?php echo ($grado['categoria_grado']); ?>
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

            <body>
                <!--Ventana Modal-->
                <!-- GESTIONAR PROFESOR_GRADO -->
                <input type="checkbox" id="btn-modal-gradosP">
                <div class="container-modal-gradosP">
                    <div class="content-modal-gradosP">
                        <h2>Asignar Profesores a Grados</h2>
                        <div class="container">
                            <form id="form1-gradosP">
                                <table id="tabla-general-gradosP">
                                    <thead>
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre Profesor</th>
                                            <th>Nivel del Grado</th>
                                            <th>Grado(s)</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $profesoresConGrados = listarProfesoresConGrados($pdo);

                                        if (!empty($profesoresConGrados)) {
                                            foreach ($profesoresConGrados as $profesor) {
                                        ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($profesor['cedula']); ?></td>
                                                    <td><?php echo htmlspecialchars($profesor['nombre']); ?></td>
                                                    <td><?php echo htmlspecialchars($profesor['nivel_grado']); ?></td>
                                                    <td><?php echo htmlspecialchars($profesor['nombre_grados']); ?></td>
                                                    <td>
                                                        <button type="button" class="next1-custom"
                                                            data-cedula-Profesor="<?php echo htmlspecialchars($profesor['cedula']); ?>"
                                                            data-nombre-Profesor="<?php echo htmlspecialchars($profesor['nombre']); ?>"
                                                            data-id-custom="<?php echo htmlspecialchars($profesor['nivel_grado']); ?>"
                                                            data-nombre-custom="<?php echo htmlspecialchars($profesor['nombre_grados']); ?>">
                                                            <i class="bi bi-arrow-right-circle"></i> Detalles
                                                        </button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No se encontraron profesores registrados.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </form>
                            <form method="POST" action="../controller_php/controller_FormMultiStepGradoPr.php"
                                id="form2-gradosP">
                                <h3>Información del Profesor</h3>
                                <div class="input-container">
                                    <label for="cedulaProfesor-custom">Cédula del Profesor:</label>
                                    <input type="text" name="cedulaProfesor-custom" id="cedulaProfesor-custom" readonly>
                                    <span class="error-custom" id="errorCedulaPr-custom"></span>
                                </div>
                                <div class="input-container">
                                    <label for="nombreProfesor-custom">Nombre del Profesor:</label>
                                    <input type="text" name="nombreProfesor-custom" id="nombreProfesor-custom" readonly>
                                    <span class="error-custom" id="errorNombrPr-custom"></span>
                                </div>
                                <div class="input-container">
                                    <label for="categoriaGrado-custom">Nivel del
                                        Grado:</label>
                                    <input type="text" name="categoriaGrado-custom" id="categoriaGrado-custom" readonly>
                                    <span class="error-custom" id="errorCategoriaGrado-custom"></span>
                                </div>
                                <label for="grado-custom" class="labelSelect-custom">Nombre del Grado:</label>
                                <select class="selectGrado-custom" name="grado-custom" id="grado-custom">
                                    <option value="No asignado">No asignado</option>
                                </select>
                                <span class="error-custom" id="errorGrado-custom"></span>
                                <div class="btn-box-custom">
                                    <button type="button" id="back1-custom">Volver</button>
                                    <button type="submit">Registrar</button>
                                </div>
                            </form>
                            <div class="step-row">
                                <div id="progress"></div>
                                <div class="step-col"><small>Primer paso</small></div>
                                <div class="step-col"><small>Segundo paso</small></div>
                            </div>
                        </div>
                        <div class="btn-cerrar-gradosP">
                            <label for="btn-modal-gradosP">Cerrar</label>
                        </div>
                    </div>
                    <label for="btn-modal-gradosP" class="cerrar-modal-gradosP"></label>
                </div>
                <!--Fin de Ventana Modal-->

                <!--Ventana Modal-->
                <!-- GESTIONAR MATERIAS_GRADOS -->
                <input type="checkbox" id="btn-modal-grados">
                <div class="container-modal-grados">
                    <div class="content-modal-grados">
                        <h2>Asignar Materias a Grados</h2>
                        <div class="container">
                            <form id="form1-grados">
                                <table id="tabla-general-grados">
                                    <thead>
                                        <tr>
                                            <th>Materia(s)</th>
                                            <th>Nivel</th>
                                            <th>Grado(s) Asignado(s)</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $materiasYGrados = consultarMateriasConGrados($pdo);
                                        if (!empty($materiasYGrados)):
                                            foreach ($materiasYGrados as $materia):
                                        ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($materia['nombre_materia']) ?></td>
                                                    <td><?= htmlspecialchars($materia['nivel_materia']) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($materia['grados_asignados'] === 'No asignado') {
                                                            echo '<span class="text-muted">No asignado</span>';
                                                        } else {
                                                            echo htmlspecialchars($materia['grados_asignados']);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="next1"
                                                            data-id-materia="<?= htmlspecialchars($materia['id_materia']) ?>"
                                                            data-nivel="<?= htmlspecialchars($materia['nivel_materia']) ?>"
                                                            data-nombre="<?= htmlspecialchars($materia['nombre_materia']) ?>"
                                                            data-grados="<?= htmlspecialchars($materia['grados_asignados']) ?>">
                                                            <i class="bi bi-arrow-right-circle"></i> Detalles
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        else:
                                            ?>
                                            <tr>
                                                <td colspan="4" class="text-center">No se encontraron materias registradas.
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                            </form>
                            <form method="POST" action="../controller_php/controller_FormMultiStepGrado.php"
                                id="form2-grados">
                                <h3>Información de la Asignatura</h3>
                                <label for="materiasxGrado" class="labelSelect">Asignaturas:</label>
                                <input type="text" name="materiasxGrado" id="materiasxGrado" readonly>
                                <p class="errorFormMultiPr" id="errorMateriaPG"></p>
                                <label for="categoriaGrado" class="labelSelect">Nivel de la Asignatura:</label>
                                <input type="text" name="categoriaGrado" id="categoriaGrado" readonly>
                                <p class="errorFormMultiPr" id="errorCategoriaGrado"></p>
                                <label for="nombreGrado" class="labelSelect">Nombre del Grado:</label>
                                <div class="contenedor-select">
                                    <select class="selectCategoriaxGrado-custom" name="nombreGrado" id="nombreGrado"
                                        onfocus="buscarGradodeMaterias()">
                                        <option value="Seleccionar">Seleccionar</option>
                                    </select>
                                </div>
                                <p class="errorFormMultiPr" id="errorNombreGrado"></p>
                                <div class="btn-box">
                                    <button type="button" id="back1">Volver</button>
                                    <button type="submit">Registrar</button>
                                </div>
                            </form>
                            <div class="step-row-grados">
                                <div id="progress-grados"></div>
                                <div class="step-col-grados"><small>Primer paso</small></div>
                                <div class="step-col-grados"><small>Segundo paso</small></div>
                            </div>
                        </div>
                        <div class="btn-cerrar-grados">
                            <label for="btn-modal-grados">Cerrar</label>
                        </div>
                    </div>
                    <label for="btn-modal-grados" class="cerrar-modal-grados"></label>
                </div>
                <!--Fin de Ventana Modal-->
            </body>
            <script>
                const moduloGrados = document.getElementById('modulo_ProfesoresDeGrados');
                moduloGrados.addEventListener('click', function () {
                    window.location.href = "consultar_materiaDeGrados.php";
                })

                document.getElementById('filtroNivel').addEventListener('change', function() {
                    const nivelSeleccionado = this.value.toLowerCase();
                    const filas = document.querySelectorAll('table tbody tr');

                    filas.forEach(fila => {
                        // Cambiar de nth-child(1) a nth-child(2) para obtener el nivel del grado
                        const nivelGrado = fila.querySelector('td:nth-child(2)').textContent.toLowerCase();

                        if (nivelSeleccionado === '' || nivelGrado.includes(nivelSeleccionado)) {
                            fila.style.display = '';
                        } else {
                            fila.style.display = 'none';
                        }
                    });
                });

                document.getElementById('txtFiltarr').addEventListener('input', function() {
                    const filtro = this.value.toLowerCase(); // Texto del filtro en minúsculas
                    const filas = document.querySelectorAll('tbody tr'); // Todas las filas de la tabla

                    filas.forEach(fila => {
                        const textoFila = fila.textContent.toLowerCase(); // Texto de la fila en minúsculas
                        if (textoFila.includes(filtro)) {
                            fila.style.display = ''; // Muestra la fila si coincide
                        } else {
                            fila.style.display = 'none'; // Oculta la fila si no coincide
                        }
                    });
                });

                var form1 = document.getElementById("form1-grados");
                var form2 = document.getElementById("form2-grados");
                var back1 = document.getElementById("back1");
                var progress = document.getElementById("progress-grados");

                // Mostrar el primer formulario al cargar la página
                form1.classList.add("active");
                progress.style.width = "50.00%";

                document.addEventListener("click", function(event) {
                    if (event.target.classList.contains("next1")) {
                        var button = event.target;
                        var id = button.getAttribute("data-nivel");
                        var nombre = button.getAttribute("data-nombre");

                        document.getElementById("categoriaGrado").value = id;
                        document.getElementById("materiasxGrado").value = nombre;

                        form1.classList.remove("active");
                        form2.classList.add("active");
                        progress.style.width = "100.00%";
                    }
                });

                back1.onclick = function() {
                    const errorElements = document.querySelectorAll("#form2-grados .errorFormMultiPr");
                    errorElements.forEach((el) => {
                        el.textContent = "";
                    });
                    form2.classList.remove("active");
                    form1.classList.add("active");
                    progress.style.width = "50.00%";

                    document.getElementById("categoriaGrado").value = "";
                    document.getElementById("nombreGrado").value = "Seleccionar";
                };

                function buscarGradodeMaterias() {
                    $.ajax({
                        url: "../AJAX/AJAX_Grados/searchGradoxMateria.php",
                        type: "POST",
                        data: $("#form2-grados").serialize(),
                        success: function(resultado) {
                            $("#nombreGrado").html(resultado);
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                        }
                    });
                }

                function validarExisteMateria() {
                    $.ajax({
                        type: "POST",
                        url: "../AJAX/AJAX_Materias/searchNombreMateriaG.php",
                        data: $("#form2-grados").serialize(),
                        success: function(data) {
                            $("#errorNombreGrado").html(data);

                            var errores = document.getElementById("errorNombreGrado").textContent;

                            if (errores.trim() === "") {
                                document.getElementById("form2-grados").submit();
                            } else {
                                console.log("Error en la validación: ", errores);
                            }
                        },
                    });
                }

                document.addEventListener("DOMContentLoaded", function() {
                    document.getElementById("form2-grados").addEventListener("submit", function(event) {
                        event.preventDefault();
                        const errorElements = document.querySelectorAll(".errorFormMultiPr");
                        errorElements.forEach((el) => {
                            el.textContent = "";
                        });

                        const regexName = /^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/;
                        let isValid = true;

                        let nombre = document.getElementById("materiasxGrado").value.trim();
                        let nivelGrado = document.getElementById("categoriaGrado").value.trim();
                        let grado = document.getElementById("nombreGrado").value.trim();

                        if (!nombre) {
                            isValid = false;
                            document.getElementById("errorMateriaPG").textContent =
                                "Campo nombre de la materia es obligatorio";
                        } else if (!regexName.test(nombre)) {
                            isValid = false;
                            document.getElementById("errorMateriaPG").textContent =
                                "Formato inválido: Admite solo letras con espacios";
                        }

                        if (!nivelGrado) {
                            isValid = false;
                            document.getElementById("errorCategoriaGrado").textContent =
                                "Campo nombre nivel del grado es obligatorio";
                        } else if (nivelGrado != "Primaria" && nivelGrado != "Secundaria") {
                            isValid = false;
                            document.getElementById("errorCategoriaGrado").textContent =
                                "Seleccione un nivel del grado correcto";
                        }

                        if (!grado || grado == "Seleccionar") {
                            isValid = false;
                            document.getElementById("errorNombreGrado").textContent =
                                "Seleccione un grado correcto";
                        }

                        if (isValid) {
                            validarExisteMateria();
                        }
                    });

                    // Resetear modal al abrir
                    document.getElementById('btn-modal-grados').addEventListener('change', function() {
                        if (this.checked) {
                            form2.classList.remove("active");
                            form1.classList.add("active");
                            progress.style.width = "50.00%";

                            const errorElements = document.querySelectorAll(".errorFormMultiPr");
                            errorElements.forEach((el) => {
                                el.textContent = "";
                            });

                            document.getElementById("categoriaGrado").value = "";
                            document.getElementById("nombreGrado").value = "Seleccionar";
                            document.getElementById("materiasxGrado").innerHTML =
                                '<option value="Seleccionar">Seleccionar</option>';
                        }
                    });
                });
            </script>
            <script src="../js/validarMultiStepGradoProfesor.js"></script>
        </div>
        </main>

</html>