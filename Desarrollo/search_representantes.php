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
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../css/moduloRepresentantes.css">
    <title>Consultar Representantes</title>
</head>

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
             <div class="mb-4" style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
            <h1 class="my-3" id="titulo">Módulo de Representantes: Consultar Información</h1>

                    <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
                </div>

            <div class="d-flex justify-content-between align-items-center">
                <!-- Filtro con lupa (a la derecha) -->
                <div class="filtro-container d-flex align-items-center">
                    <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                    <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                </div>
            </div>
            <div class="custom-table-Representantes">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Número de teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("../Configuration/functions_php/functionsCRUDRepresentantes.php");
                        include("../Layout/modalesRepresentantes/modalEditRepresentante.php");
                        include("../Layout/modalesRepresentantes/modalVerRepresentante.php");

                        $representantes = consultarRepresentantes($pdo); // Obtener los representantes
                        
                        if (!empty($representantes)) {
                            foreach ($representantes as $representante) { // Iterar sobre cada usuario
                                ?>
                                <tr>
                                    <td><?php echo ($representante['cedula']); ?></td>
                                    <td><?php echo ($representante['nombres']); ?>
                                    <td><?php echo ($representante['apellidos']); ?></td>
                                    <td><?php echo ($representante['correo']); ?>
                                    <td><?php echo ($representante['direccion']); ?></td>
                                    <td><?php echo ($representante['nro_telefono']); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#formModalVer"
                                            data-id="<?php echo $representante['id']; ?>"
                                            data-cedula="<?php echo $representante['cedula']; ?>"
                                            data-nombres="<?php echo $representante['nombres']; ?>"
                                            data-apellidos="<?php echo $representante['apellidos']; ?>"
                                            data-fecha_nac="<?php echo $representante['fecha_nac']; ?>"
                                            data-correo="<?php echo $representante['correo'] ?>"
                                            data-direccion="<?php echo $representante['direccion']; ?>"
                                            data-nro_telefono="<?php echo $representante['nro_telefono']; ?>"
                                            data-grado_inst="<?php echo $representante['grado_inst']; ?>"
                                            data-profesion="<?php echo $representante['profesion']; ?>"
                                            data-trabaja="<?php echo $representante['trabaja']; ?>"
                                            data-nombre_empr="<?php echo $representante['nombre_empr'] ?>"
                                            data-telefono_empr="<?php echo $representante['telefono_empr'] ?>"
                                            data-direccion_empr="<?php echo $representante['direccion_empr'] ?>">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <a href="#formModal" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#formModal"
                                            data-id="<?php echo $representante['id']; ?>"
                                            data-cedula="<?php echo $representante['cedula']; ?>"
                                            data-nombres="<?php echo $representante['nombres']; ?>"
                                            data-apellidos="<?php echo $representante['apellidos']; ?>"
                                            data-fecha_nac="<?php echo $representante['fecha_nac']; ?>"
                                            data-correo="<?php echo $representante['correo'] ?>"
                                            data-direccion="<?php echo $representante['direccion']; ?>"
                                            data-nro_telefono="<?php echo $representante['nro_telefono']; ?>"
                                            data-grado_inst="<?php echo $representante['grado_inst']; ?>"
                                            data-profesion="<?php echo $representante['profesion']; ?>"
                                            data-trabaja="<?php echo $representante['trabaja']; ?>"
                                            data-nombre_empr="<?php echo $representante['nombre_empr'] ?>"
                                            data-telefono_empr="<?php echo $representante['telefono_empr'] ?>"
                                            data-direccion_empr="<?php echo $representante['direccion_empr'] ?>">                                 
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
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
</html>