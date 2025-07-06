<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Calificaciones</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(to bottom right, #e1f5fe, #b3e5fc);
        }

        .module-container {
            margin: 0 auto;
            margin-top: 200px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            padding: 30px;
            text-align: center;
            border-top: 6px solid #0288d1;
        }

        .module-title {
            color: #0288d1;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 30px;
        }

        .action-button {
            padding: 16px 24px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
        }

        .primary-button {
            background-color: #0288d1;
            box-shadow: 0 4px 6px rgba(2, 136, 209, 0.3);
        }

        .primary-button:hover {
            background-color: #0277bd;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(2, 136, 209, 0.4);
        }

        .secondary-button {
            background-color: #00796b;
            box-shadow: 0 4px 6px rgba(0, 121, 107, 0.3);
        }

        .secondary-button:hover {
            background-color: #00695c;
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(0, 121, 107, 0.4);
        }

        .button-icon {
            margin-right: 10px;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <div class="module-container">
                    <h1 class="module-title">Módulo de Calificaciones: Registrar calificaciones</h1>

                    <div class="buttons-container">
                        <a href="/registrar-primaria" class="action-button primary-button">
                            <i class="fas fa-pencil-alt button-icon"></i>
                            Registrar calificación primaria
                        </a>

                        <a href="../Desarrollo/calificacion_secundaria.php" class="action-button secondary-button">
                            <i class="fas fa-graduation-cap button-icon"></i>
                            Registrar calificación secundaria
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>