<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sidebar With Bootstrap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        ::after,
        ::before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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

        .main {
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
            background-color: #fafbfe;
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
            font-size: 0.9rem;
            white-space: nowrap;
            border-left: 3px solid transparent;
        }

        .sidebar-link i {
            font-size: 1.1rem;
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
                <div class="sidebar-logo">
                    <a href="#">CodzSword</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="inscripcion.php" class="sidebar-link">
                        <i class="bi bi-file-person-fill"></i>
                        <span>Inscripción</span>
                    </a>
                </li>

                <!-- Menú de Estudiantes con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#estudiantes"
                        aria-expanded="false" aria-controls="estudiantes">
                        <i class="fas fa-user-graduate"></i>
                        <span>Estudiantes</span>
                    </a>
                    <ul id="estudiantes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="search_estudiantes.php" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inscripcion.php" class="sidebar-link">
                                <i class="bi bi-person-plus"></i>
                                <span>Nuevo Estudiante</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Representantes con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#representantes" aria-expanded="false" aria-controls="representantes">
                        <i class="bi bi-person-raised-hand"></i>
                        <span>Representantes</span>
                    </a>
                    <ul id="representantes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="search_representantes.php" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a href="search_c_pago.php" class="sidebar-link">
                                <i class="bi bi-person-rolodex"></i>
                                <span>Contacto Pago</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Calificaciones con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#calificaciones" aria-expanded="false" aria-controls="calificaciones">
                        <i class="fas fa-spell-check"></i>
                        <span>Calificaciones</span>
                    </a>
                    <ul id="calificaciones" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="search_calificacion.php" class="sidebar-link">
                                <i class="bi bi-journal-text"></i>
                                <span>Registrar</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Grados con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#grados"
                        aria-expanded="false" aria-controls="grados">
                        <i class="fi fi-rr-degree-credential"></i>
                        <span>Grados</span>
                    </a>
                    <ul id="grados" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="search_grado.php" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar Grados</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Profesores con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#profesores"
                        aria-expanded="false" aria-controls="profesores">
                        <i class="bi bi-person-square"></i>
                        <span>Profesores</span>
                    </a>
                    <ul id="profesores" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="search_profesor.php" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar Profesores</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Materias con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#materias"
                        aria-expanded="false" aria-controls="materias">
                        <i class="fas fa-book"></i>
                        <span>Materias</span>
                    </a>
                    <ul id="materias" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="search_materia.php" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar Materias</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Usuarios con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#usuarios"
                        aria-expanded="false" aria-controls="usuarios">
                        <i class="bi bi-people-fill"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul id="usuarios" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="search_user.php" class="sidebar-link">
                                <i class="bi bi-search"></i>
                                <span>Consultar Usuarios</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menú de Reportes con submenú -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#reportes"
                        aria-expanded="false" aria-controls="reportes">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Reportes</span>
                    </a>
                    <ul id="reportes" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte de Estudiantes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte de Calificaciones</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-file-earmark-bar-graph"></i>
                                <span>Reporte de Asistencia</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="mantenimiento.php" class="sidebar-link">
                        <i class="bi bi-gear-fill"></i>
                        <span>Mantenimiento</span>
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
            <div class="text-center"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        // Script para el funcionamiento del sidebar
        const toggleBtn = document.querySelector(".toggle-btn");
        const sidebar = document.querySelector("#sidebar");

        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("expand");
        });
    </script>
</body>

</html>