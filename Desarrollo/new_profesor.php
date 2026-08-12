<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="../css/modalesProfesor/regProfesor.css"> -->
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

        body {
            background-color: var(--color-fondo);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--color-texto);
            background-image: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                url('https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
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

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: var(--color-primario);
            font-weight: 700;
            position: relative;
            padding-bottom: 5px;
        }

        .form-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--color-secundario), var(--color-accento));
            border-radius: 3px;
        }

        .form-label {
            font-weight: 600;
            color: var(--color-primario);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            color: var(--color-secundario);
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 2px solid var(--color-borde);
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--color-secundario);
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .erroresCreateP {
            text-align: left;
            padding-left: 0;
            color: red;
            font-size: 0.85rem;
            margin-top: 0.1rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .column {
            display: flex;
            align-items: flex-end;
            gap: 15px;
        }

        .select-box {
            min-width: 100px;
        }

        .input-box {
            flex-grow: 1;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .education-icon {
            text-align: center;
            font-size: 2.5rem;
            color: var(--color-secundario);
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .column {
                flex-direction: column;
                align-items: stretch;
            }

            .select-box {
                width: 100%;
            }
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
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h1 class="form-title">Registro de Profesores</h1>
                        <form action="../controller_php/controller_CreateProfesor.php" method="POST"
                            id="form-RegisterProfesor">
                            <div class="mb-4">
                                <div class="column">
                                    <div class="select-box">
                                        <label for="dniPrefixP" class="form-label"><i class="fas fa-id-card"></i>
                                            Tipo</label>
                                        <select class="form-select" id="dniPrefixP" name="type_dniP">
                                            <option value="V" selected>V</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label for="cedulaCreateP" class="form-label"><i
                                                class="fas fa-id-badge"></i> Cédula</label>
                                        <input type="number" class="form-control" name="cedulaCreateP"
                                            id="cedulaCreateP" placeholder="Ej: 12345678">
                                    </div>
                                </div>
                                <p class="erroresCreateP" id="cedulaErrorCreateP"></p>
                            </div>

                            <div class="mb-4">
                                <label for="nombreCreateP" class="form-label"><i class="fas fa-user"></i> Nombre
                                    Completo</label>
                                <input type="text" class="form-control" name="nombreCreateP" id="nombreCreateP"
                                    placeholder="Ej: María Rodríguez">
                                <p class="erroresCreateP" id="nombreErrorCreateP"></p>
                            </div>

                            <div class="mb-4">
                                <div class="column">
                                    <div class="select-box">
                                        <label for="dniPrefixP" class="form-label"><i class="fas fa-mobile-alt"></i>
                                            Código</label>
                                        <select class="form-select" id="dniPrefixP" name="type_tlfnP">
                                            <option value="0412" selected>0412</option>
                                            <option value="0414">0414</option>
                                            <option value="0424">0424</option>
                                            <option value="0416">0416</option>
                                            <option value="0426">0426</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label for="telefonoCreateP" class="form-label"><i class="fas fa-phone"></i>
                                            Teléfono</label>
                                        <input type="number" class="form-control" name="telefonoCreateP"
                                            id="telefonoCreateP" placeholder="Ej: 1234567">
                                    </div>
                                </div>
                                <p class="erroresCreateP" id="telefonoErrorCreateP"></p>
                            </div>

                            <div class="mb-4">
                                <label for="nivelProfesor" class="form-label"><i class="fas fa-graduation-cap"></i>
                                    Nivel del Profesor</label>
                                <select class="form-select" name="nivelProfesor" id="nivelProfesor">
                                    <option value="Seleccionar" selected>Seleccione un nivel...</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                </select>
                                <p class="erroresCreateP" id="nivelProfesorErrorCreateP"></p>
                            </div>

                            <button type="submit" class="btn btn-submit" style="color:black;">
                                <i class="fas fa-user-plus" style="color:black;"></i> Registrar Profesor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/crearProfesores.js"></script>
</body>

</html>