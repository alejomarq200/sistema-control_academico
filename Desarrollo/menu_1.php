<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Moderno</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- FlatIcons -->
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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>

    <style>
        :root {
            /* Colores para cada sección principal */
            --color-dashboard: #4F46E5;
            --color-registro: #062659;
            --color-gestion: #a99fd1;
            --color-reportes: #EF85C5;
            --color-mantenimiento: #DC2626;
            --color-ayuda: #0891B2;
            --color-footer: #6B7280;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ========== SIDEBAR ========== */
        #sidebar {
            min-width: 280px;
            max-width: 280px;
            background: #ffffff;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            padding: 0;
            height: 100vh;
            position: sticky;
            top: 0;
            overflow-y: auto;
            border-right: 1px solid #f0f0f0;
        }

        /* Sidebar colapsado usando tu clase "expand" */
        #sidebar:not(.expand) {
            min-width: 70px;
            max-width: 70px;
        }

        #sidebar:not(.expand) .sidebar-logo img {
            max-height: 45px;
        }

        #sidebar:not(.expand) .sidebar-link span {
            display: none;
        }

        #sidebar:not(.expand) .sidebar-dropdown {
            display: none !important;
        }

        #sidebar:not(.expand) .sidebar-item .sidebar-link {
            justify-content: center;
            padding: 0.7rem 0.5rem;
        }

        #sidebar:not(.expand) .sidebar-link i,
        #sidebar:not(.expand) .sidebar-link .fi {
            font-size: 1.3rem;
            margin: 0;
        }

        #sidebar:not(.expand) .sidebar-footer .sidebar-link span {
            display: none;
        }

        /* Toggle button cuando está colapsado */
        #sidebar:not(.expand) .toggle-btn i {
            transform: rotate(180deg);
        }

        #sidebar::-webkit-scrollbar {
            width: 4px;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        /* ========== TOGGLE BUTTON ========== */
        .d-flex {
            display: flex;
            justify-content: flex-end;
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .toggle-btn {
            background: transparent;
            border: none;
            font-size: 1.2rem;
            color: #6b7280;
            transition: 0.3s ease;
            padding: 0.25rem 0.5rem;
            cursor: pointer;
            border-radius: 6px;
        }

        .toggle-btn:hover {
            background: #f3f4f6;
            color: #1f2937;
        }

        #sidebar:not(.expand) .toggle-btn {
            transform: rotate(180deg);
        }

        .sidebar-logo {
            padding: 0.5rem 1.5rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            text-align: center;
            transition: all 0.3s ease;
        }

        .sidebar-logo img {
            max-height: 80px;
            width: auto;
            transition: all 0.3s ease;
        }

        /* ========== LINKS DEL SIDEBAR ========== */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 1.25rem;
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            background: transparent;
            border-radius: 0;
            white-space: nowrap;
        }

        .sidebar-link i,
        .sidebar-link .fi {
            font-size: 1.15rem;
            min-width: 24px;
            text-align: center;
        }

        .sidebar-link:hover {
            background: #f9fafb;
            color: #1f2937;
        }

        .sidebar-link.active {
            background: #f3f4f6;
            color: #1f2937;
            border-left-color: #4F46E5;
        }

        /* ========== ESTILOS POR SECCIÓN (PADRES) ========== */
        /* Dashboard */
        .sidebar-item.dashboard-parent>.sidebar-link {
            color: var(--color-dashboard);
            font-weight: 600;
        }

        .sidebar-item.dashboard-parent>.sidebar-link:hover {
            background: #EEF2FF;
        }

        .sidebar-item.dashboard-parent>.sidebar-link.active {
            border-left-color: var(--color-dashboard);
            background: #EEF2FF;
        }

        /* Registro */
        .sidebar-item.registro-parent>.sidebar-link {
            color: var(--color-registro);
            font-weight: 600;
        }

        .sidebar-item.registro-parent>.sidebar-link:hover {
            background: #ECFDF5;
        }

        .sidebar-item.registro-parent>.sidebar-link.active {
            border-left-color: var(--color-registro);
            background: #ECFDF5;
        }

        .sidebar-item.registro-parent .sidebar-dropdown .sidebar-link {
            color: #065F46;
        }

        .sidebar-item.registro-parent .sidebar-dropdown .sidebar-link:hover {
            background: #D1FAE5;
        }

        /* Gestión */
        .sidebar-item.gestion-parent>.sidebar-link {
            color: var(--color-gestion);
            font-weight: 600;
        }

        .sidebar-item.gestion-parent>.sidebar-link:hover {
            background: #FFFBEB;
        }

        .sidebar-item.gestion-parent>.sidebar-link.active {
            border-left-color: var(--color-gestion);
            background: #FFFBEB;
        }

        .sidebar-item.gestion-parent .sidebar-dropdown .sidebar-link {
            color: #92400E;
        }

        .sidebar-item.gestion-parent .sidebar-dropdown .sidebar-link:hover {
            background: #FEF3C7;
        }

        /* Reportes */
        .sidebar-item.reportes-parent>.sidebar-link {
            color: var(--color-reportes);
            font-weight: 600;
        }

        .sidebar-item.reportes-parent>.sidebar-link:hover {
            background: #F5F3FF;
        }

        .sidebar-item.reportes-parent>.sidebar-link.active {
            border-left-color: var(--color-reportes);
            background: #F5F3FF;
        }

        .sidebar-item.reportes-parent .sidebar-dropdown .sidebar-link {
            color: #5B21B6;
        }

        .sidebar-item.reportes-parent .sidebar-dropdown .sidebar-link:hover {
            background: #EDE9FE;
        }

        /* Mantenimiento */
        .sidebar-item.mantenimiento-parent>.sidebar-link {
            color: var(--color-mantenimiento);
            font-weight: 600;
        }

        .sidebar-item.mantenimiento-parent>.sidebar-link:hover {
            background: #FEF2F2;
        }

        .sidebar-item.mantenimiento-parent>.sidebar-link.active {
            border-left-color: var(--color-mantenimiento);
            background: #FEF2F2;
        }

        .sidebar-item.mantenimiento-parent .sidebar-dropdown .sidebar-link {
            color: #991B1B;
        }

        .sidebar-item.mantenimiento-parent .sidebar-dropdown .sidebar-link:hover {
            background: #FEE2E2;
        }

        /* Ayuda */
        .sidebar-item.ayuda-parent>.sidebar-link {
            color: var(--color-ayuda);
            font-weight: 600;
        }

        .sidebar-item.ayuda-parent>.sidebar-link:hover {
            background: #ECFEFF;
        }

        .sidebar-item.ayuda-parent>.sidebar-link.active {
            border-left-color: var(--color-ayuda);
            background: #ECFEFF;
        }

        /* ========== SUBMENÚS ========== */
        .sidebar-dropdown {
            padding-left: 1.5rem;
            background: transparent;
        }

        .sidebar-dropdown .sidebar-link {
            font-weight: 400;
            font-size: 0.85rem;
            padding: 0.45rem 1rem;
            border-left: 2px solid transparent;
            color: #6b7280;
        }

        .sidebar-dropdown .sidebar-link:hover {
            border-left-color: #d1d5db;
        }

        .sidebar-dropdown .sidebar-link i,
        .sidebar-dropdown .sidebar-link .fi {
            font-size: 0.9rem;
            min-width: 20px;
        }

        .sidebar-dropdown .sidebar-dropdown {
            padding-left: 1.5rem;
        }

        .sidebar-dropdown .sidebar-dropdown .sidebar-link {
            font-size: 0.8rem;
            padding: 0.35rem 1rem;
        }

        /* ========== FOOTER ========== */
        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid #f3f4f6;
            padding: 0.5rem 0;
        }

        .sidebar-footer .sidebar-link {
            color: var(--color-footer);
        }

        .sidebar-footer .sidebar-link:hover {
            background: #F3F4F6;
            color: #374151;
        }

        /* ========== MAIN CONTENT ========== */
        .main {
            flex: 1;
            padding: 2rem;
            transition: all 0.3s ease;
            background-image: linear-gradient(rgba(255, 255, 255, 0.18), rgba(255, 255, 255, 0.12)), url('../imgs/main.png');

        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            #sidebar {
                min-width: 240px;
                max-width: 240px;
            }

            #sidebar:not(.expand) {
                min-width: 60px;
                max-width: 60px;
            }
        }

        @media (max-width: 576px) {
            #sidebar {
                min-width: 100%;
                max-width: 100%;
                height: auto;
                position: relative;
            }

            #sidebar:not(.expand) {
                min-width: 100%;
                max-width: 100%;
            }

            .wrapper {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
 <?php
    // error_reporting(0);
    session_start();
    ?>

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

            <!-- ===== DASHBOARD ===== -->
            <ul class="sidebar-nav list-unstyled">
                <li class="sidebar-item dashboard-parent">
                    <a href="dashboard.php" class="sidebar-link">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- ===== REGISTRO ===== -->
                <li class="sidebar-item registro-parent">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#registro"
                        aria-expanded="false" aria-controls="registro">
                        <img src="../imgs/STUDENT.png" alt="Icono de Cerrar Sesión" style="width: 36px; height: 32px;">

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
                        <li class="sidebar-item">
                            <a href="new_user.php" class="sidebar-link">
                                <i class="fi fi-ss-user-add"></i>
                                <span>Nuevo Usuario</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- ===== GESTIÓN ===== -->
                <li class="sidebar-item gestion-parent">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#gestion"
                        aria-expanded="false" aria-controls="gestion">
                        <img src="../imgs/GESTION.jpeg" alt="Icono de Cerrar Sesión" style="width: 36px; height: 32px;">
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
                                <li class="sidebar-item">
                                    <a href="materia_pendiente.php" class="sidebar-link">
                                        <img src="hora.png" alt="Icono hora" style="width: 16px; height: 16px;">
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


                <!-- ===== REPORTES ===== -->
                <li class="sidebar-item reportes-parent">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#reportes"
                        aria-expanded="false" aria-controls="reportes">
                        <img src="../imgs/REPORT.png" alt="Icono de Cerrar Sesión" style="width: 32px; height: 32px;">
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

                <!-- ===== MANTENIMIENTO ===== -->
                    <li class="sidebar-item mantenimiento-parent">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#mantenimiento"
                            aria-expanded="false" aria-controls="mantenimiento">
                                              <img src="../imgs/CONFIG.jpeg" alt="Icono de Cerrar Sesión" style="width: 38px; height: 32px;">

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
                                <a href="contrasena.php" class="sidebar-link">
                                    <i class="fi fi-sr-user-key"></i>
                                    <span>Contraseña</span>
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
                            <?php if ($_SESSION['rol'] == 3 && $_SESSION['estado'] == 2): ?>
                                <li class="sidebar-item">
                                    <a href="dispositivos.php" class="sidebar-link">
                                        <i class="fi fi-bs-devices"></i>
                                        <span>Dispositivos</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>

                <!-- ===== AYUDA ===== -->
                <li class="sidebar-item ayuda-parent">
                    <a href="moduloManuales.php" class="sidebar-link">
                                                                      <img src="../imgs/help.jpeg" alt="Icono de Cerrar Sesión" style="width: 38px; height: 32px;">

                        <span>Ayuda</span>
                    </a>
                </li>
            </ul>

            <!-- ===== FOOTER ===== -->
            <div class="sidebar-footer">
                <a href="../Configuration/Logout.php" class="sidebar-link">
                    <img src="../imgs/EXIT.png" alt="Icono de Cerrar Sesión" style="width: 32px; height: 32px;">
                    <!-- <i class="bi bi-box-arrow-left"></i> -->
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ===== TOGGLE DEL SIDEBAR =====
        const toggleBtn = document.querySelector(".toggle-btn");
        const sidebar = document.querySelector("#sidebar");

        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("expand");
        });

        // ===== RESALTAR ELEMENTO ACTIVO =====
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const links = document.querySelectorAll('.sidebar-link');

            links.forEach(link => {
                const href = link.getAttribute('href');
                if (href && href !== '#' && currentPath.includes(href)) {
                    link.classList.add('active');
                    // Expandir el padre si está colapsado
                    const parentCollapse = link.closest('.collapse');
                    if (parentCollapse) {
                        const bsCollapse = bootstrap.Collapse.getInstance(parentCollapse);
                        if (bsCollapse) {
                            bsCollapse.show();
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>