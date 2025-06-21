<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/tableUser.css">
    <title>Consultar Usuarios</title>
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
                <h1 class="my-3" id="titulo">Módulo de Usuarios</h1>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Filtro con lupa (a la derecha) -->
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                        <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                    </div>
                    <!-- Botón de Agregar Usuarios (a la izquierda) -->
                    <a href="#ModalForm" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalForm">
                        Agregar Usuarios
                        <i class="bi bi-person-plus-fill"></i>
                    </a>
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
                            include("../Layout/modalesUsuarios/modalUCreate.php");
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
                    document.getElementById('txtFiltarr').addEventListener('input', function () {
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