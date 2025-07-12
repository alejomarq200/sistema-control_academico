<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/tablaActividades.css">
    <title>Consultar Actividades</title>
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
                <h1 class="my-3" id="titulo">Módulo de Actividades</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Filtro con lupa (a la derecha) -->
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                        <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                    </div>
                </div>
                <div class="custom-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Grado</th>
                                <th scope="col">Nombre de la asignatura</th>
                                <th scope="col">Nombre del Profesor</th>
                                <th scope="col">Actividad</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/Configuration.php");
                            include("../Configuration/functions_php/functioncsCRUDActividades.php");
                            include("../Layout/modalesActividades/modalAEdit.php");
                            include("../Layout/modalesActividades/modalADisable.php");
                            include("../Layout/modalesActividades/modalAEnable.php");
                            
                            $actividades = consultarActividadesCRUD($pdo);

                            if (!empty($actividades)) {
                                foreach ($actividades as $actividad) {
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($actividad['nombre_grado']) ?></td>
                                        <td><?= htmlspecialchars($actividad['nombre_materia']) ?></td>
                                        <td><?= htmlspecialchars($actividad['nombre_profesor']) ?></td>
                                        <td><?= htmlspecialchars($actividad['contenido']) ?></td>
                                        <td><?= htmlspecialchars($actividad['estado']) ?></td>

                                        <td>
                                            <a href="#ModalFormAEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormAEdit" 
                                                data-id="<?=htmlspecialchars($actividad['id_actividad'])  ?>"
                                                data-nombreG="<?=  htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormEnableA"
                                                data-id="<?=htmlspecialchars($actividad['id_actividad'])  ?>"
                                                data-nombreG="<?=  htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class='bx bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormDisableA" 
                                                data-id="<?=htmlspecialchars($actividad['id_actividad'])  ?>"
                                                data-nombreG="<?=  htmlspecialchars($actividad['nombre_grado']) ?>"
                                                data-nombreM="<?= htmlspecialchars($actividad['nombre_materia']) ?>"
                                                data-nombreP="<?= htmlspecialchars($actividad['nombre_profesor']) ?>"
                                                data-contenido="<?= htmlspecialchars($actividad['contenido']) ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?= $actividad['id_actividad'] ?>" onclick="myFunction(this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='5'>No se encontraron actividades.</td></tr>";
                            } ?>
                        </tbody>
                    </table>
                </div>
                </main>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</div>
</html>