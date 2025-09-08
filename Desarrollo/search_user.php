<?php
session_start();
error_reporting(0);


include("../Configuration/functions_php/functionsCRUDUser.php");
validarRolyAccesoAdmin($_SESSION['rol'], $_SESSION['estado'], 'Desarrollo/dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/modulos/moduloUsuarios.css">
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
                <!-- Título principal con estilo mejorado -->
                <div class="mb-4" style="max-width: 500px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Usuarios</h1>
                    <p class="lead text-muted">Gestione y administre la información de los usuarios</p>
                </div>
                <div class="container-table">
                    <table id="tablax" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                            <a href="#ModalForm1" class="btn btn-dark" data-bs-toggle="modal" style="font-size: 15px;"
                                                data-bs-target="#ModalForm1" data-id="<?php echo $usuario['cedula']; ?>"
                                                data-nombre="<?php echo $usuario['nombres']; ?>"
                                                data-correo="<?php echo $usuario['correo']; ?>"
                                                data-contrasena="<?php echo $usuario['contrasena']; ?>"
                                                data-telefono="<?php echo $usuario['telefono']; ?>"
                                                data-rol="<?php echo $usuario['id_rol']; ?>"
                                                data-idguia="<?php echo $usuario['id']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" style="font-size: 15px;"
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
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" style="font-size: 15px;"
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
                                            <button type="button" class="btn btn-secondary" style="font-size: 15px;"
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
            </div>
        </div>
    </div>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
    </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="../js/validarDeleteUsuarios.js"></script>
    <script src="../js/moduloUsuarios.js"></script>
</body>

</html>