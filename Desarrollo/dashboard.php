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
    <title>Dasboard</title>
    <style>
        .dashboard-content {
            max-width: 1400px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .dashboard-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .dashboard-section:hover {
            transform: translateY(-5px);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f0f4f8;
        }

        .section-header h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
        }

        .section-header h2 i {
            margin-right: 0.5rem;
        }

        .section-indicator {
            width: 40px;
            height: 6px;
            border-radius: 10px;
        }

        .primary-bg {
            background: linear-gradient(90deg, #4f46e5, #818cf8);
        }

        .secondary-bg {
            background: linear-gradient(90deg, #7c3aed, #a78bfa);
        }

        .card-container {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .modern-card {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .modern-card:hover {
            transform: translateX(6px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .blue-gradient .card-icon {
            background: linear-gradient(135deg, #4f46e5, #818cf8);
        }

        .green-gradient .card-icon {
            background: linear-gradient(135deg, #059669, #34d399);
        }

        .orange-gradient .card-icon {
            background: linear-gradient(135deg, #d97706, #fbbf24);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            min-width: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
            font-size: 1.2rem;
        }

        .card-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-content h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 0.1rem;
        }

        .card-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.5px;
        }

        .card-progress {
            display: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .dashboard-content {
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-content {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            body {
                padding: 1rem;
            }

            .modern-card {
                padding: 0.875rem 1rem;
            }

            .card-value {
                font-size: 1.5rem;
            }

            .card-icon {
                width: 45px;
                height: 45px;
                min-width: 45px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .card-content {
                flex-wrap: wrap;
                gap: 0.25rem;
            }

            .card-content h3 {
                font-size: 0.8rem;
            }

            .card-value {
                font-size: 1.25rem;
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
    include("menu_1.php");
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
                            <h2><i class="fas fa-school"></i>Nivel Primario</h2>
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