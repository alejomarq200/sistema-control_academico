<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel="stylesheet" href="../css/tableUser.css">
    <title>Consultar Usuarios</title>
    <style>
        .filtro-container {
            background-color: #fff;
            border-radius: 6px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .filtro-container:hover {
            border-color: #aaa;
        }

        .filtro-input {
            border: none;
            box-shadow: none;
            padding: 5px;
        }

        .filtro-input:focus {
            outline: none;
        }

        .lupa-icon {
            cursor: pointer;
            color: #666;
            font-size: 16px;
        }

        .filter-group {
            margin-bottom: 0;
            /* Elimina el margen inferior para alinear mejor */
        }

        .filter-label {
            font-size: 0.85rem;
            color: #555;
            margin-bottom: 3px;
            display: block;
        }

        .filter-select {
            border-radius: 6px;
            padding: 6px 12px;
            border: 1px solid #ddd;
        }

        .filters-container {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin: 2rem auto;
            max-width: 1200px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .filters-wrapper {
            display: flex;
            gap: 1.5rem;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #495057;
            font-size: 0.9rem;
        }

        .filter-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.65rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
        }

        .filter-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
            outline: none;
        }

        /* Efecto hover para los selects */
        .filter-select:hover {
            border-color: #adb5bd;
        }

        /* Iconos */
        .bi {
            margin-right: 8px;
            font-size: 1.1em;
            vertical-align: middle;
        }
    </style>
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
                <div class="filters-container">
                    <h1 class="my-3" id="titulo">Módulo de Usuarios</h1>
                    <!-- FILTROS CON DISEÑO MODERNO -->
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
                               <i class="bi fi fi-bs-users-alt"></i>Rol
                            </label>
                            <select id="filtroNivel" class="form-select filter-select">
                                <option value="">Todos los Roles</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Usuarios">Usuarios</option>
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
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../Configuration/functions_php/functionsCRUDUser.php");
                            include("../Layout/modalesUsuarios/modalUEdit.php");
                            include("../Layout/modalesUsuarios/modalUDisable.php");
                            include("../Layout/modalesUsuarios/modalUEnable.php");

                            $usuarios = consultarUsuariosCRUD($pdo); // Obtener los usuarios

                            if (!empty($usuarios)) {
                                foreach ($usuarios as $usuario) { // Iterar sobre cada usuario
                                    // Mapear id_estado a su valor correspondiente
                                    if ($usuario['id_estado'] == 1) {
                                        $usuario['id_estado'] = 'Inactivo';
                                    } elseif ($usuario['id_estado'] == 2) {
                                        $usuario['id_estado'] = 'Activo';
                                    }

                                    // Mapear id_rol a su valor correspondiente
                                    if ($usuario['id_rol'] == 1) {
                                        $usuario['id_rol'] = 'Administrador';
                                    } elseif ($usuario['id_rol'] == 2) {
                                        $usuario['id_rol'] = 'Usuario';
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo ($usuario['cedula']); ?></td>
                                        <td><?php echo ($usuario['nombres']); ?></td>
                                        <td><?php echo ($usuario['correo']); ?></td>
                                        <td><?php echo ($usuario['telefono']); ?></td>
                                        <td><?php echo ($usuario['id_estado']); ?></td>
                                        <td><?php echo ($usuario['id_rol']); ?></td>
                                        <td>
                                            <a href="#ModalForm1" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#ModalForm1" data-id="<?php echo $usuario['cedula']; ?>"
                                                data-nombre="<?php echo $usuario['nombres']; ?>"
                                                data-correo="<?php echo $usuario['correo']; ?>"
                                                data-contrasena="<?php echo $usuario['contrasena']; ?>"
                                                data-telefono="<?php echo $usuario['telefono']; ?>"
                                                data-rol="<?php echo $usuario['id_rol']; ?>"
                                                data-idguia="<?php echo $usuario['id']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#ModalForm3" data-id="<?php echo $usuario['cedula']; ?>"
                                                data-nombre="<?php echo $usuario['nombres']; ?>"
                                                data-correo="<?php echo $usuario['correo']; ?>"
                                                data-contrasena="<?php echo $usuario['contrasena']; ?>"
                                                data-telefono="<?php echo $usuario['telefono']; ?>"
                                                data-estado="<?php echo $usuario['id_estado']; ?>"
                                                data-rol="<?php echo $usuario['id_rol']; ?>"
                                                data-idguia="<?php echo $usuario['id']; ?>">
                                                <i class="bi bi-person-fill-check"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#ModalForm2" data-id="<?php echo $usuario['cedula']; ?>"
                                                data-nombre="<?php echo $usuario['nombres']; ?>"
                                                data-correo="<?php echo $usuario['correo']; ?>"
                                                data-contrasena="<?php echo $usuario['contrasena']; ?>"
                                                data-telefono="<?php echo $usuario['telefono']; ?>"
                                                data-estado="<?php echo $usuario['id_estado']; ?>"
                                                data-rol="<?php echo $usuario['id_rol']; ?>"
                                                data-idguia="<?php echo $usuario['id']; ?>">
                                                <i class="bi bi-person-fill-lock"></i>
                                            </button>
                                            <button type="button" class="btn btn-secondary"
                                                data-id="<?php echo $usuario['id']; ?>" onclick="eliminarUsuarios(this)">
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
                <script src="../js/validarDeleteUsuarios.js"></script>
                <script>
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
                </script>
</body>
</div>
</main>

</html>