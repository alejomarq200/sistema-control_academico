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
    <style>
        /* Estilos modernos para el dashboard */
        .dashboard-container {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .modern-dashboard {
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e6ed;
        }

        .dashboard-header h1 {
            font-size: 28px;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-refresh {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn-refresh:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .dashboard-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .section-header {
            padding: 15px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e0e6ed;
        }

        .section-header h2 {
            font-size: 20px;
            color: #34495e;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .section-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .primary-bg {
            background-color: #3498db;
        }

        .secondary-bg {
            background-color: #9b59b6;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .modern-card {
            border-radius: 8px;
            padding: 20px;
            color: white;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .blue-gradient {
            background: linear-gradient(135deg, #0e5c91ff 0%, #2980b9 100%);
        }

        .green-gradient {
            background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
        }

        .orange-gradient {
            background: linear-gradient(135deg, #b7b91eff 0%, #d4d115ff 100%);
        }

        .card-icon {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-content h3 {
            font-size: 16px;
            margin: 0 0 5px 0;
            font-weight: 500;
            opacity: 0.9;
        }

        .card-value {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 15px 0;
        }

        .card-progress {
            background: rgba(255, 255, 255, 0.2);
            height: 4px;
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background: white;
            border-radius: 2px;
        }

        /* Efecto de onda decorativa */
        .modern-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 70%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .modern-card:hover::after {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: 1fr;
            }

            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>

    </style>
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
                <div class="mb-4" style="max-width: 600px; margin: left; background-color:#F5F5F5; border-radius:15px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); ">
                    <h1><i class="fas fa-tachometer-alt"></i> Panel de Control</h1>
                    <div class="mx-auto" style="height: 48; width: 100px; background: linear-gradient(to right, #05357cff, #6c757d, #0d6efd);"></div>
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