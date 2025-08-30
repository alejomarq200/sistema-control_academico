<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barra Lateral</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        ::after,
        ::before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: linear-gradient(rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.12)), url('../imgs/FONDO 4.jpg');
            background-size: cover;
            height: 100vh;
            align-items: center;
            justify-content: center;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
        }

        /* Estilos para el logo del sidebar */
        .sidebar-logo {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
            padding: 0 1rem;
        }

        .sidebar-logo img {
            transition: all 0.3s ease;
        }

        .sidebar-logo img:hover {
            transform: scale(1.05);
        }

        /* Cuando el sidebar está contraído */
        .sidebar-collapsed .sidebar-logo {
            padding: 0;
        }

        .sidebar-collapsed .sidebar-logo img {
            max-height: 40px !important;
        }

        .main {
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        #sidebar {
            width: 65px;
            min-width: 65px;
            z-index: 1000;
            transition: all .25s ease-in-out;
            background-color: #0e2238;
            display: flex;
            flex-direction: column;
        }

        #sidebar.expand {
            width: 230px;
            min-width: 230px;
        }

        .toggle-btn {
            background-color: transparent;
            cursor: pointer;
            border: 0;
            padding: 1rem 1.5rem;
        }

        .toggle-btn i {
            font-size: 1.5rem;
            color: #FFF;
        }

        .sidebar-logo {
            margin: auto 0;
        }

        .sidebar-logo a {
            color: #FFF;
            font-size: 1.15rem;
            font-weight: 600;
        }

        #sidebar:not(.expand) .sidebar-logo,
        #sidebar:not(.expand) a.sidebar-link span {
            display: none;
        }

        .sidebar-nav {
            padding: 2rem 0;
            flex: 1 1 auto;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #FFF;
            display: block;
            font-size: 12px;
            white-space: nowrap;
            border-left: 3px solid transparent;
        }

        .sidebar-link i {
            font-size: 20px;
            margin-right: .75rem;
        }

        a.sidebar-link:hover {
            background-color: rgba(255, 255, 255, .075);
            border-left: 3px solid #3b7ddd;
        }

        .sidebar-item {
            position: relative;
        }

        #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
            position: absolute;
            top: 0;
            left: 70px;
            background-color: #0e2238;
            padding: 0;
            min-width: 15rem;
            display: none;
        }

        #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
            display: block;
            max-height: 15em;
            width: 100%;
            opacity: 1;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        /* Estilos adicionales para submenús */
        .sidebar-dropdown {
            padding-left: 0;
        }

        .sidebar-dropdown .sidebar-link {
            padding-left: 2.5rem;
            font-size: 0.85rem;
        }

        #sidebar.expand .sidebar-dropdown {
            background-color: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="bi bi-chevron-double-right"></i>
                </button>
            </div>

            <!-- Logo del sidebar -->
            <div class="sidebar-logo text-center py-3">
                <a href="#">
                    <img src="../imgs/LOGO.jpg" alt="Logo del Colegio" class="img-fluid" style="max-height: 85px;">
                </a>
            </div>
            <a href="dashboard.php" class="sidebar-link collapsed">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <ul class="sidebar-nav">
                <!-- Menú de Registro con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#registro"
                        aria-expanded="false" aria-controls="registro">
                        <i class="bi bi-file-earmark-plus-fill"></i>
                        <span>Registro</span>
                    </a>
                    <ul id="registro" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="new_aula.php" class="sidebar-link">
                                <i class="fi fi-sr-door-open"></i>
                                <span>Nueva Aula</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="new_horario.php" class="sidebar-link">
                                <i class="fi fi-br-time-check"></i>
                                <span>Nuevo Horario</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inscripcion.php" class="sidebar-link">
                                <i class="bi bi-person-plus"></i>
                                <span>Nuevo Estudiante</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="new_profesor.php" class="sidebar-link">
                                <i class="bi bi-person-plus"></i>
                                <span>Nuevo Profesor</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="new_materia.php" class="sidebar-link">
                                <i class="bi bi-journal-plus"></i>
                                <span>Nueva Materia</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="new_calificacion.php" class="sidebar-link">
                                <i class="bi bi-bookmark-plus"></i>
                                <span>Nueva Calificación</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="new_actividad.php" class="sidebar-link">
                                <i class="fi fi-rr-task-checklist"></i>
                                <span>Nueva Actividad</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Gestión con submenú -->
                <?php
                if ($_SESSION['rol'] == 1 && $_SESSION['estado'] == 2) {

                ?>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#gestion"
                            aria-expanded="false" aria-controls="gestion">
                            <i class="bi bi-clipboard2-data-fill"></i>
                            <span>Gestión</span>
                        </a>
                        <ul id="gestion" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="search_inscripcion.php" class="sidebar-link">
                                    <i class="fi fi-br-file-spreadsheet"></i>
                                    <span>Inscripciones</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_aula.php" class="sidebar-link">
                                    <i class="fi fi-tr-security-gate"></i>
                                    <span>Aulas</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_estudiantes.php" class="sidebar-link">
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Estudiantes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_profesor.php" class="sidebar-link">
                                    <i class="bi bi-person-square"></i>
                                    <span>Profesores</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#materias-submenu" aria-expanded="false"
                                    aria-controls="materias-submenu">
                                    <i class="fas fa-book"></i>
                                    <span>Materias</span>
                                </a>
                                <ul id="materias-submenu" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a href="search_materia.php" class="sidebar-link">
                                            <i class="bi bi-search"></i>
                                            <span>Buscar Materias</span>
                                        </a>
                                    </li>
                                    <!-- Aquí agregamos el sub-submenú -->
                                    <li class="sidebar-item">
                                        <a href="materia_pendiente.php" class="sidebar-link">
                                            <img src="hora.png" alt="Icono hora">
                                            <span>Materias Pendientes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_grado.php" class="sidebar-link">
                                    <i class="fi fi-rr-degree-credential"></i>
                                    <span>Grados</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_calificacion.php" class="sidebar-link">
                                    <i class="fas fa-spell-check"></i>
                                    <span>Calificaciones</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_actividad.php" class="sidebar-link">
                                    <i class="fi fi-sr-list-check"></i>
                                    <span>Actividades</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_representantes.php" class="sidebar-link">
                                    <i class="bi bi-person-raised-hand"></i>
                                    <span>Representantes</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="search_c_pago.php" class="sidebar-link">
                                    <i class="bi bi-person-rolodex"></i>
                                    <span>Contactos de Pago</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php  } ?>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#reportes"
                        aria-expanded="false" aria-controls="reportes">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Reportes</span>
                    </a>
                    <ul id="reportes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="descargarCalificaciones.php" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte de Calificaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="descargarConstancias.php" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte de Constancias</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte Notas Certificadas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="descargarPlanillaInscr.php" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte de Inscripciones</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a href="reportesSistema.php" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reportes del Sistema</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Mantenimiento con submenú -->
                <?php
                if ($_SESSION['rol'] == 1 && $_SESSION['estado'] == 2) {

                ?>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#mantenimiento"
                            aria-expanded="false" aria-controls="mantenimiento">
                            <i class="bi bi-gear-fill"></i>
                            <span>Mantenimiento</span>
                        </a>
                        <ul id="mantenimiento" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="search_user.php" class="sidebar-link">
                                    <i class="bi bi-people-fill"></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="auditoria.php" class="sidebar-link">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Auditoría</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="mantenimiento.php" class="sidebar-link">
                                    <i class="bi bi-database-check"></i>
                                    <span>Base de Datos</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="dispositivos.php" class="sidebar-link">
                                    <i class="fi fi-bs-devices"></i>
                                    <span>Dispositivos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php  } ?>
                <!-- Menú de Ayuda con submenú -->
                <li class="sidebar-item">
                    <a href="moduloManuales.php" class="sidebar-link">
                        <i class="bi bi-question-circle-fill"></i>
                        <span>Ayuda</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="../Configuration/Logout.php" class="sidebar-link">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center">
                <h1></h1>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        // Script para el funcionamiento del sidebar
        const toggleBtn = document.querySelector(".toggle-btn");
        const sidebar = document.querySelector("#sidebar");

        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("expand");
        });
    </script>
</body>

</html>