<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenedor Principal - Gestión Académica</title>
    <!-- Iconos (Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos generales del contenedor principal */
        .main-content {
            margin-left: 300px;
            padding: 10px;
            background: #f5f5f5;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Barra superior */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }


        /* DATOS DEL DASHBOARD */
        .summary-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-info h3 {
            margin: 0;
            color: #555;
            font-size: 1rem;
        }

        .card-info p {
            margin: 5px 0 0;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        /* Tabla */
        .recent-students {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Contenedor Principal (sin sidebar) -->
    <main class="main-content">
        <?php
        include("../Configuration/Configuration.php");
        function retornarTotalRegistros($pdo, $alias, $tabla, $columWhere, $parametro, $retornar)
        {
            try {
                $stmt = $pdo->prepare("SELECT COUNT(*) as $alias FROM $tabla WHERE $columWhere = :$columWhere");
                $stmt->bindValue(":$columWhere", $parametro, PDO::PARAM_STR);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC); // SOLO UNA FILA
                $retornar = $resultado[$alias];

                return $retornar;
            } catch (PDOException $e) {
                error_log($e->getMessage());
            }
        }
        ?>
        <!-- Barra Superior -->
        <header class="top-bar">
            <h1>Dashboard</h1>
        </header>

        <!-- Cards de Resumen -->
        <h3>Información Primaria</h3>
        <section class="summary-cards">
            <div class="card">
                <div class="card-icon" style="background: #e3f2fd;">
                    <i class="fas fa-users" style="color: #2196f3;"></i>
                </div>
                <div class="card-info">
                    <h3>Alumnos</h3>
                    <p><?=
                        $infoPrimaria = retornarTotalRegistros($pdo, 'total', 'estudiantes', 'grado_est', 1, 'totalEst');
                        htmlspecialchars($infoPrimaria);?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon" style="background: #e8f5e9;">
                    <i class="fas fa-chalkboard-teacher" style="color: #4caf50;"></i>
                </div>
                <div class="card-info">
                    <h3>Profesores</h3>
                    <p><?= $infoPPrimaria = retornarTotalRegistros($pdo, 'total', 'profesores', 'nivel_grado', 'Primaria', 'totalProf');
                        htmlspecialchars($infoPPrimaria);
                    ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon" style="background: #fff3e0;">
                    <i class="fas fa-book" style="color: #ff9800;"></i>
                </div>
                <div class="card-info">
                    <h3>Asignaturas</h3>
                    <p><?= $infoMPrimaria = retornarTotalRegistros($pdo, 'total', 'materias', 'nivel_materia', 'Primaria', 'totalMateria');
                        htmlspecialchars($infoMPrimaria);
                    ?></p>
                </div>
            </div>
        </section>
        <h3>Información Secundaria</h3>
        <section class="summary-cards">
            <div class="card">
                <div class="card-icon" style="background: #e3f2fd;">
                    <i class="fas fa-users" style="color: #2196f3;"></i>
                </div>
                <div class="card-info">
                    <h3>Alumnos</h3>
                    <p><?=
                        $infoSecundaria = retornarTotalRegistros($pdo, 'total', 'estudiantes', 'grado_est', 7, 'totalEst');
                        htmlspecialchars($infoSecundaria);?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon" style="background: #e8f5e9;">
                    <i class="fas fa-chalkboard-teacher" style="color: #4caf50;"></i>
                </div>
                <div class="card-info">
                    <h3>Profesores</h3>
                    <p><?= $infoPSecundaria = retornarTotalRegistros($pdo, 'total', 'profesores', 'nivel_grado', 'Secundaria', 'totalProf');
                        htmlspecialchars($infoPSecundaria);
                    ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-icon" style="background: #fff3e0;">
                    <i class="fas fa-book" style="color: #ff9800;"></i>
                </div>
                <div class="card-info">
                    <h3>Asignaturas</h3>
                   <p><?= $infoMSecundaria = retornarTotalRegistros($pdo, 'total', 'materias', 'nivel_materia', 'Secundaria', 'totalMateria');
                        htmlspecialchars($infoMSecundaria);
                    ?></p>
                </div>
            </div>
        </section>
        <!-- Tabla de Alumnos -->
        <section class="recent-students">

        </section>
    </main>
</body>

</html>