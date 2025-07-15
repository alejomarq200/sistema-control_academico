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
    <link rel="stylesheet" href="../css/moduloMaterias.css">
    <title>Consultar Materias</title>
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
                <h1 class="my-3" id="titulo">Módulo de Asignaturas</h1>
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
                                <i class="bi bi-check-circle"></i> Estado
                            </label>
                            <select id="filtroEstado" class="form-select filter-select">
                                <option value="">Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="custom-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre de la asignatura</th>
                                <th scope="col" style="display:none;">Nivel de la asignatura</th>
                                <th scope="col" style="display: none;">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/functions_php/functionsCRUDMaterias.php");
                            include("../Layout/modalesMaterias/modalMEdit.php");
                            include("../Layout/modalesMaterias/modalMDisable.php");
                            include("../Layout/modalesMaterias/modalMEnable.php");
                            $materias = consultarMateriasCRUD($pdo); // Obtener los usuarios
                            
                            if (!empty($materias)) {
                                foreach ($materias as $materia) { // Iterar sobre cada usuario
                                    if ($materia['id_estado'] == 1) {
                                        $materia['id_estado'] = 'Inactivo';
                                    } elseif ($materia['id_estado'] == 2) {
                                        $materia['id_estado'] = 'Activo';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo ($materia['nombre']); ?></td>
                                        <td style="display:none;"><?php echo ($materia['nivel_materia']); ?></td>
                                        <td style="display: none;"><?php echo ($materia['id_estado']); ?></td>

                                        <td>
                                            <a href="#ModalFormMEdit" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormMEdit" data-id="<?php echo $materia['id_materia']; ?>"
                                                data-nombre="<?php echo $materia['nombre']; ?>"
                                                data-nivel="<?php echo $materia['nivel_materia']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormEnableM"
                                                data-id="<?php echo $materia['id_materia']; ?>"
                                                data-nombre="<?php echo $materia['nombre']; ?>"
                                                data-nivel="<?php echo $materia['nivel_materia']; ?>">
                                                <i class='bx  bx-check-circle'></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalFormDisableM"
                                                data-id="<?php echo $materia['id_materia']; ?>"
                                                data-nombre="<?php echo $materia['nombre']; ?>"
                                                data-nivel="<?php echo $materia['nivel_materia']; ?>">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?php echo $materia['id_materia']; ?>" onclick="myFunction(this)">
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
                <script src="../js/validarDeleteMaterias.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</div>
<script>
    document.getElementById('filtroNivel').addEventListener('change', function () {
        const nivelSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const nivelGrado = fila.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (nivelSeleccionado === '' || nivelGrado === nivelSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    document.getElementById('filtroEstado').addEventListener('change', function () {
        const nivelSeleccionado = this.value.toLowerCase();
        const filas = document.querySelectorAll('table tbody tr');

        filas.forEach(fila => {
            const nivelEstado = fila.querySelector('td:nth-child(3)').textContent.toLowerCase();

            if (nivelSeleccionado === '' || nivelEstado === nivelSeleccionado) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    });
</script>

</html>