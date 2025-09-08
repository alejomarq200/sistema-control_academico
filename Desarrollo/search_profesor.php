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
    <link href="https://cdn.lineicons.com/5.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/modulos/moduloProfesorG.css">
    <title>Consultar Profesores</title>
</head>

<body>
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
                <div class="mb-4"
                    style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Profesores</h1>
                    <p class="lead text-muted">Gestione y administre la información de los Profesores</p>
                </div>
                <div class="filters-container">
                    <!-- FILTROS CON DISEÑO MODERNO -->
                    <div class="filters-wrapper">
                        <!-- Filtro de Nivel Académico -->
                        <div class="filter-group">
                            <label for="filtroGenero" class="filter-label">
                                <i class='bx bx-check-circle'></i>Estado
                            </label>
                            <select name="estado_aulas" id="estado_aulas" class="form-select filter-select">
                                <option value="Seleccionar">Seleccionar</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <!-- Filtro de Grado con estilo mejorado -->
                        <div class="filter-group">
                            <label for="filtroGenero" class="filter-label">
                                <i class="bi bi-book-half"></i> Grado Académico
                            </label>
                            <select name="grado_aulas" id="grado_aulas" class="form-select filter-select">

                            </select>
                        </div>
                        <div class="filter-group">
                            <label for="recargar" class="filter-label">
                                Limpiar
                            </label>
                            <button
                                style="padding: 6px 12px; border:none; background-color: #86b7fe; border-radius:12px; color:white;"
                                id="recargar"><i class="fi fi-br-rotate-right"></i></button>
                        </div>

                    </div>
                </div>
                <div style="margin-bottom: 8px;">
                    <a class="boton-modal-gestionPr">
                        <label for="btn-modal-gestionPr">
                            Gestionar Profesores
                            <i class="bi bi-plus-circle-dotted"></i>
                        </label>
                    </a>
                </div>
                <div class="container-table">
                    <div class="custom-table">
                        <table id="tablaxProfesor" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Nombres</th>
                                    <th>Grado</th>
                                    <th scope="col">Número de Teléfono</th>
                                    <th>Estado</th>
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
                                            <td><?php echo ($profesor['id_grado']); ?></td>
                                            <td><?php echo ($profesor['telefono']); ?></td>
                                            <td><?php echo ($profesor['estado']); ?></td>
                                            <td>
                                                <a href="#ModalFormPEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                    style="font-size: 15px;" data-bs-target="#ModalFormPEdit"
                                                    data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                    data-id="<?php echo $profesor['cedula']; ?>"
                                                    data-nombre="<?php echo $profesor['nombre']; ?>"
                                                    data-telefono="<?php echo $profesor['telefono']; ?>"
                                                    data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                    style="font-size: 15px;" data-bs-target="#ModalFormPEnable"
                                                    data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                    data-id="<?php echo $profesor['cedula']; ?>"
                                                    data-nombre="<?php echo $profesor['nombre']; ?>"
                                                    data-telefono="<?php echo $profesor['telefono']; ?>"
                                                    data-estado="<?php echo $profesor['estado']; ?>"
                                                    data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                    <i class='bx  bx-check-circle'></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    style="font-size: 15px;" data-bs-target="#ModalFormPDisable"
                                                    data-idguia="<?php echo $profesor['id_profesor']; ?>"
                                                    data-id="<?php echo $profesor['cedula']; ?>"
                                                    data-nombre="<?php echo $profesor['nombre']; ?>"
                                                    data-telefono="<?php echo $profesor['telefono']; ?>"
                                                    data-estado="<?php echo $profesor['estado']; ?>"
                                                    data-nivelProfesor="<?php echo $profesor['nivel_grado'] ?>">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                                <button type="button" class="btn btn-secondary" style="font-size: 15px;"
                                                    data-id="<?php echo $profesor['id_profesor']; ?>"
                                                    onclick="confirmDeleteProfesor(this)">
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
                </div>
            </div>
        </div>
    </div>
</body>
<!--Ventana Modal-->
<input type="checkbox" id="btn-modal-gestionPr">
<div class="container-modal-gestionPr">
    <div class="content-modal-gestionPr">
        <h2> Gestionar Profesores</h2>
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
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
    </script>
<!-- DATATABLES -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
</script>
<!-- BOOTSTRAP -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
</script>
<script src="../js/moduloProfesores.js"></script>
<!--Fin de Ventana Modal-->
<script src="../js/multiStepProfMatYGrado.js"></script>

</html>