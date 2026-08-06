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
    <link rel="stylesheet" href="../css/modulos/moduloGrados.css">
     
    <style>
      
    </style>
    <title>Consultar Grados</title>
</head>
<!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
<div class="wrapper">
    <?php
    include("menu_1.php");
    ?>
    <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
    <div class="main p-3">
        <div class="text-center">
            <?php
            include("../Layout/mensajes.php");
            /* CUERPO DEL MENÚ */
            ?>

            <!-- Título principal con estilo mejorado -->
            <div class="mb-4" style="max-width: 800px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Módulo de Grados</h1>
                <p class="lead text-muted">Gestione y administre la información de las asignaturas y profesores de acuerdo al grado</p>
            </div>


            <div style="margin-bottom: 15px;">
                <!-- Botón de Agregar Usuarios (a la izquierda) -->
                <a class="boton-modal-gradosP" id="modulo_AsignaturaDeGrados">
                    <label for="btn-modal-grados">
                        Asignar materias a grados
                        <i class="bi bi-plus-circle-dotted"></i>
                    </label>
                </a>
                <!-- Botón de Agregar Usuarios (a la izquierda) -->
                <a class="boton-modal-gradosP" id="modulo_ProfesoresDeGrados">
                    <label for="btn-modal-gradosP">
                        Asignar profesor a grados
                        <i class="bi bi-plus-circle-dotted"></i>
                    </label>
                </a>

            </div>
            <div class="custom-table-gradosP">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="color:white;">Nombre del grado</th>
                            <th scope="col" style="color:white;">Nivel del grado</th>
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

            <script>
                const moduloGrados = document.getElementById('modulo_AsignaturaDeGrados');
                moduloGrados.addEventListener('click', function() {
                    window.location.href = "consultar_materiaDeGrados.php";
                })

                const moduloProfesor = document.getElementById('modulo_ProfesoresDeGrados');
                moduloProfesor.addEventListener('click', function() {
                    window.location.href = "consultar_profesorDeGrados.php";
                })
            </script>
        </div>
        </main>

</html>