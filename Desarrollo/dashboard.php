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
    <title>Inscripción</title>
    <link rel="stylesheet" href="../css/dashboard.css">
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
        <div class="dashboard-container">
            <?php include("../Layout/mensajes.php"); ?>

            <main class="modern-dashboard">
                <?php include("../Configuration/Configuration.php"); ?>

                <!-- Función PHP (se mantiene igual) -->
                <?php
                function retornarTotalRegistros($pdo, $alias, $tabla, $columWhere, $parametro, $retornar)
                {
                    try {
                        $stmt = $pdo->prepare("SELECT COUNT(*) as $alias FROM $tabla WHERE $columWhere = :$columWhere");
                        $stmt->bindValue(":$columWhere", $parametro, PDO::PARAM_STR);
                        $stmt->execute();
                        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                        $retornar = $resultado[$alias];
                        return $retornar;
                    } catch (PDOException $e) {
                        error_log($e->getMessage());
                    }
                }

                function retornarTotalRegistrosRango($pdo, $alias, $tabla, $columWhere, $btwen1, $btwen2, $retornar)
                {
                    try {
                        $stmt = $pdo->prepare("SELECT COUNT(*) as $alias FROM $tabla WHERE $columWhere BETWEEN $btwen1 AND $btwen2");
                        $stmt->execute();
                        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                        $retornar = $resultado[$alias];
                        return $retornar;
                    } catch (PDOException $e) {
                        error_log($e->getMessage());
                    }
                }
                ?>

                <!-- Encabezado mejorado -->
                <div class="mb-4" style="max-width: 600px; margin: left; background: linear-gradient(to right, #f0f6ffff, #e2f1ffff, #c5d9f7ff); border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1><i class="fas fa-tachometer-alt"></i> Panel de Control</h1>
                </div>


                <!-- Sección de resumen -->
                <div class="dashboard-content">
                    <!-- Primaria -->
                    <section class="dashboard-section">
                        <div class="section-header">
                            <h2><i class="fas fa-school"></i> Nivel Primario</h2>
                            <div class="section-indicator primary-bg"></div>
                        </div>

                        <div class="card-container">
                            <!-- Tarjeta Alumnos -->
                            <div class="modern-card blue-gradient">
                                <div class="card-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-content">
                                    <h3>Alumnos</h3>
                                    <p class="card-value"><?= htmlspecialchars(retornarTotalRegistrosRango($pdo, 'total_primaria', 'estudiantes', 'grado_est', 1, 6, 'totales')); ?></p>
                                    <div class="card-progress">
                                        <div class="progress-bar" style="width: 75%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta Profesores -->
                            <div class="modern-card green-gradient">
                                <div class="card-icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <div class="card-content">
                                    <h3>Profesores</h3>
                                    <p class="card-value"><?= htmlspecialchars(retornarTotalRegistros($pdo, 'total', 'profesores', 'nivel_grado', 'Primaria', 'totalProf')); ?></p>
                                    <div class="card-progress">
                                        <div class="progress-bar" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta Asignaturas -->
                            <div class="modern-card orange-gradient">
                                <div class="card-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="card-content">
                                    <h3>Asignaturas</h3>
                                    <p class="card-value"><?= htmlspecialchars(retornarTotalRegistros($pdo, 'total', 'materias', 'nivel_materia', 'Primaria', 'totalMateria')); ?></p>
                                    <div class="card-progress">
                                        <div class="progress-bar" style="width: 45%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Secundaria -->
                    <section class="dashboard-section">
                        <div class="section-header">
                            <h2><i class="fas fa-graduation-cap"></i> Nivel Secundario</h2>
                            <div class="section-indicator secondary-bg"></div>
                        </div>

                        <div class="card-container">
                            <!-- Tarjeta Alumnos -->
                            <div class="modern-card blue-gradient">
                                <div class="card-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="card-content">
                                    <h3>Alumnos</h3>
                                    <p class="card-value"><?= htmlspecialchars(retornarTotalRegistrosRango($pdo, 'total_primaria', 'estudiantes', 'grado_est', 7, 11, 'totales')); ?></p>
                                    <div class="card-progress">
                                        <div class="progress-bar" style="width: 65%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta Profesores -->
                            <div class="modern-card green-gradient">
                                <div class="card-icon">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <div class="card-content">
                                    <h3>Profesores</h3>
                                    <p class="card-value"><?= htmlspecialchars(retornarTotalRegistros($pdo, 'total', 'profesores', 'nivel_grado', 'Secundaria', 'totalProf')); ?></p>
                                    <div class="card-progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta Asignaturas -->
                            <div class="modern-card orange-gradient">
                                <div class="card-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="card-content">
                                    <h3>Asignaturas</h3>
                                    <p class="card-value"><?= htmlspecialchars(retornarTotalRegistros($pdo, 'total', 'materias', 'nivel_materia', 'Secundaria', 'totalMateria')); ?></p>
                                    <div class="card-progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</div>
</html>