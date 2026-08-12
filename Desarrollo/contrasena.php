<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/modalesProfesor/regProfesor.css">
    <style>
        :root {
            --color-primario: #2c3e50;
            --color-secundario: rgb(30, 93, 134);
            --color-accento: rgb(247, 252, 0);
            --color-fondo: #ecf0f1;
            --color-texto: #2c3e50;
            --color-borde: #bdc3c7;
            --color-btn: rgb(122, 156, 179);
            --color-btn-blue: #00ABE1;
            --color-bordes: #aedfe4;
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* aedfe4 */
            border-left: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-bottom: 5px solid var(--color-bordes);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--color-bordes), var(--color-bordes));
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            font-weight: 600;
            background: linear-gradient(135deg,
                    var(--color-btn-blue),
                    var(--color-btn-blue));
            color: white;
            border: none;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .form-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            /* aedfe4 */
            border-left: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-right: 5px solid var(--color-bordes);
            border-bottom: 5px solid var(--color-bordes);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--color-bordes), var(--color-bordes));
        }
    </style>
</head>

<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
    <div class="wrapper">
        <?php
        error_reporting(0);
        session_start();
        include("menu_1.php");
        ?>
        <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA  -->
        <div class="main p-3">
            <div class="text-center">
                <?php
                include("../Layout/mensajes.php");
                /* CUERPO DEL MENÚ */
                ?>
                <div class="container">
                    <div class="form-container">
                        <div class="education-icon">
                            <i class="fa-solid fa-key"></i>
                        </div>
                        <h1 class="form-title">Actualice su contraseña</h1>
                        <form action="../controller_php/controller_CreateProfesor.php" method="POST"
                            id="form-UdpdatePwd">

                            <div class="mb-4">
                                <label for="contrasena_act" class="form-label"><i class="fas fa-user"></i> Contraseña actual</label>
                                <input type="password" class="form-control" name="contrasena_act" id="contrasena_act"
                                    placeholder="Ingrese su contraseña actual">
                                <p class="error" id="error-contrasena_act"></p>
                            </div>

                            <div class="mb-4">
                                <label for="contrasena_act" class="form-label"><i class="fas fa-user"></i> Nueva contraseña</label>
                                <input type="password" class="form-control" name="contrasena_nuevo" id="contrasena_nuevo"
                                    placeholder="Ingrese su nueva contraseña">
                                <p class="error" id="error-contrasena_nuevo"></p>
                            </div>

                            <div class="mb-4">
                                <label for="contrasena_act" class="form-label"><i class="fas fa-user"></i> Repita la contraseña</label>
                                <input type="password" class="form-control" name="contrasena_repeat" id="contrasena_repeat"
                                    placeholder="Repita su nueva contraseña">
                                <p class="error" id="error-contrasena_repeat"></p>
                            </div>

                            <button type="submit" class="btn btn-submit">
                                <i class="fa-solid fa-pen-to-square"></i> Actualizar
                            </button>
                            <div class="success-message" id="successMessage">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../js/actulizarContrasena.js"></script>
</html>