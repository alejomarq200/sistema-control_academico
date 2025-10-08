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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modulos/modulosProfesorGestion.css">
    <title>Consultar Profesores por Grados</title>
    <style>
        .container {
            width: 90%;
            max-width: 500px;
            border-radius: 20px;
            padding: 30px;
            position: relative;
            margin-top: 80px;
        }

        .back-button-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .back-button {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
            margin-right: 80px;
        }

        .back-button i {
            margin-right: 8px;
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.6);
            background: linear-gradient(135deg, #ff5252, #ff7b7b);
        }

        .back-button:active {
            transform: translateY(1px);
        }

        .back-button:hover i {
            transform: translateX(-3px);
        }
    </style>
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
                /* CUERPO DEL MENÚ */
                include("../Layout/mensajes.php");
                include("../Layout/modalesProfesores/modalAsignarProfesorxGrado.php");
                include("../Layout/modalesProfesores/modalProfesorxGradoDelete.php");
                ?>
                <!-- Título principal con estilo mejorado -->
                <div class="mb-4"
                    style="max-width: 600px; margin: 0 auto; background-color:#F5F5F5; border-radius:15px; padding: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1 class="display-5 fw-bold" style='color: rgb(37, 64, 90);'>Consultar Profesores por Grados</h1>
                    <p class="lead text-muted">Gestione y administre la información de los profesores asignadas a los
                        grados</p>
                </div>
                <div class="container">
                    <div class="back-button-container">
                        <button class="back-button" id="btn-volver">
                            <i class="fas fa-arrow-left"></i> VOLVER
                        </button>
                    </div>
                </div>
                <div class="container-table">
                    <div class="custom-table">
                        <table id="tablaxProfesorGestion" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Cédula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Nivel de Grado</th>
                                    <th>Grado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include("../Configuration/functions_php/functionsCRUDProfesor.php");

                                $profesores = enlistarProfesoresxGrado($pdo); // Obtener los usuarios
                                
                                if (!empty($profesores)) {
                                    foreach ($profesores as $profesor) { // Iterar sobre cada usuario
                                        ?>
                                        <tr>
                                            <td><?= htmlspecialchars($profesor['cedula']); ?></td>
                                            <td><?= htmlspecialchars($profesor['nombre']); ?></td>
                                            <td><?= htmlspecialchars($profesor['nivel_grado']); ?></td>
                                            <td><?= htmlspecialchars($profesor['grados']); ?></td>
                                            <td>
                                                <button href="#modalAsignarProfesorxGrado" class="btn btn-secondary"
                                                    data-bs-toggle="modal" data-bs-toggle="modal"
                                                    data-bs-target="#modalAsignarProfesorxGrado" style="font-size: 15px;"
                                                    data-id-profesor="<?= htmlspecialchars($profesor['id_profesor']); ?>"
                                                    data-cedula-profesor="<?= htmlspecialchars($profesor['cedula']); ?>"
                                                    data-nombre-profesor="<?= htmlspecialchars($profesor['nombre']); ?>"
                                                    data-nivel-profesor="<?= htmlspecialchars($profesor['nivel_grado']); ?>">
                                                    <i class="bi bi-plus-circle-dotted"></i>
                                                </button>

                                                <button href="#modalProfesorxGradoDelete" class="btn btn-danger"
                                                    data-bs-toggle="modal" data-bs-toggle="modal"
                                                    data-bs-target="#modalProfesorxGradoDelete" style="font-size: 15px;"
                                                    data-id-profesor="<?= htmlspecialchars($profesor['id_profesor']); ?>"
                                                    data-cedula-profesor="<?= htmlspecialchars($profesor['cedula']); ?>"
                                                    data-nombre-profesor="<?= htmlspecialchars($profesor['nombre']); ?>"
                                                    data-nivel-profesor="<?= htmlspecialchars($profesor['nivel_grado']); ?>">
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

<script>
    const btn = document.getElementById('btn-volver');
    btn.addEventListener('click', function () {
        window.location.href = "search_grado.php"
    });
</script>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
    </script>

<!-- DATATABLES -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<!-- BOOTSTRAP -->
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

</html>