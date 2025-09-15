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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modulos/moduloProfesores.css">
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
                    <a class="boton-modal-gestionPr" id="btn-gestionar">
                        <label for="btn-modal-gestionPr">
                            Consultar Profesores Asignados
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
<script>
    const btnGestion = document.getElementById('btn-gestionar');

    btnGestion.addEventListener('click', function () {
        window.location.href = "gestion_profesores.php";
    })

</script>

</html>