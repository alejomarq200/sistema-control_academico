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
    <link rel="stylesheet" href="../css/tablaGGrados.css">
    <title>Consultar Calificaciones</title>
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
            <h1 class="my-3" id="titulo">Módulo de Calificaciones: Consultar Calificación</h1>

            <div class="d-flex justify-content-between align-items-center">
                <!-- Filtro con lupa (a la derecha) -->
                <div class="filtro-container d-flex align-items-center">
                    <input type="text" id="txtFiltarr" class="filtro-input form-control" placeholder="Buscar...">
                    <span class="lupa-icon ms-2">&#128269;</span> <!-- Icono de lupa -->
                </div>
            </div>
            <div style="margin-bottom: 15px;">
                <h5>Seleccione un grado</h5>
            </div>
            <div class="custom-table-gradosP">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre del grado</th>
                            <th scope="col">Nivel del grado</th>
                            <th scope="col">Acciones</th>
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
                                    <td>
                                        <form action="calificacion_1.php" method="POST" id="formPrueba">
                                            <input type="text" name="gradoCalificacion" id="gradoCalificacion"
                                                value="<?php echo $grado['id'] ?>" hidden>
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="bi bi-arrow-right-circle"></i>
                                            </button>
                                        </form>
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
            </main>
            <script src="../js/filtrarLupa.js"></script>

</html>