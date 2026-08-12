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
    <link rel="stylesheet" href="../css/sidebar.css">
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
                            <a href="descargarNCertificadas.php" class="sidebar-link">
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