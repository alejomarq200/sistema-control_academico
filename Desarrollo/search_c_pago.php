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
    <link rel="stylesheet" href="../css/modalesProfesor/tablaGestionPr.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Consultar Contacto de Pago</title>
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
                <h1 class="my-3" id="titulo">Módulo de Contacto de Pago</h1>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <!-- Filtro con lupa (a la derecha) -->
                    <div class="filtro-container d-flex align-items-center">
                        <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                        <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                    </div>
                    <!--Fin de Boton-->
                </div>
                <div class="custom-table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Número de Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include("../Configuration/functions_php/functionsCRUDRepresentantes.php");
                            include("../Layout/modalesRepresentantes/modalEditContactoP.php");

                            $contactoPago = consultarContactoPago($pdo); // Obtener los usuarios
                            
                            if (!empty($contactoPago)) {
                                foreach ($contactoPago as $cPago) { // Iterar sobre cada usuario

                                    ?>
                                    <tr>
                                        <td><?php echo ($cPago['cedula']); ?></td>
                                        <td><?php echo ($cPago['nombres']); ?></td>
                                        <td><?php echo ($cPago['apellidos']); ?></td>
                                        <td><?php echo ($cPago['telefono']); ?></td>
                                        <td><?php echo ($cPago['correo']); ?></td>
                                        <td>
                                            <a href="#formModalContactoP" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#formModalContactoP"
                                                data-id="<?php echo $cPago['id']; ?>"
                                                data-cedula="<?php echo $cPago['cedula']; ?>"
                                                data-nombres="<?php echo $cPago['nombres']; ?>"
                                                data-apellidos="<?php echo $cPago['apellidos']; ?>"
                                                data-correo="<?php echo $cPago['correo'] ?>"
                                                data-direccion="<?php echo $cPago['direccion'] ?>"
                                                data-telefono="<?php echo $cPago['telefono'] ?>"
                                                data-grado_inst="<?php echo $cPago['grado_inst'] ?>"
                                                data-profesion="<?php echo $cPago['profesion'] ?>"
                                                data-trabaja="<?php echo $cPago['trabaja'] ?>"
                                                data-nombre_empresa="<?php echo $cPago['nombre_empresa'] ?>"
                                                data-telefono_empresa="<?php echo $cPago['telefono_empresa'] ?>"
                                                data-direccion_empresa="<?php echo $cPago['direccion_empresa'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                             <button type="button" class="btn btn-danger">
                                            <i class="bi bi-download"></i>
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
</body>
</div>
</main>

</html>