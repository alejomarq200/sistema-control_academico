<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/modales/regUsuario.css">
 </head>
<body>
    <!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
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
                <div class="container">
                    <div class="form-container">
                        <div class="education-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h1 class="form-title">Registro de Usuarios</h1>
                        <form action="../controller_php/controller_CreateUser.php" method="POST" id="form-RegisterUser">
                            <div class="mb-3">
                                <div class="column">
                                    <div class="select-box">
                                        <label for="dniPrefix" class="form-label"><i class="fas fa-id-card"></i>
                                            Tipo</label>
                                        <select class="form-select" id="dniPrefix" name="type_dni">
                                            <option value="V" selected>V</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label for="cedulaCreate" class="form-label"><i class="fas fa-id-badge"></i>
                                            Cédula</label>
                                        <input type="number" class="form-control" name="cedulaCreate" id="cedulaCreate"
                                            placeholder="Ej: 12345678">
                                    </div>
                                </div>
                                <p class="errores" id="cedulaErrorCreate"></p>
                            </div>
                            <div class="mb-3">
                                <label for="nombreCreate" class="form-label"><i class="fas fa-user"></i> Nombre
                                    Completo</label>
                                <input type="text" class="form-control" name="nombreCreate" id="nombreCreate"
                                    placeholder="Ej: Juan Pérez">
                                <p class="errores" id="nombreErrorCreate"></p>
                            </div>

                            <div class="mb-3">
                                <label for="emailCreate" class="form-label"><i class="fas fa-envelope"></i> Correo
                                    electrónico</label>
                                <input type="email" class="form-control" name="emailCreate" id="emailCreate"
                                    placeholder="Ej: usuario@ejemplo.com">
                                <p class="errores" id="emailErrorCreate"></p>
                                <div class="errores" id="e_correoU"></div>
                            </div>
                            <div class="mb-3 password-field-container">
                                <label for="contrasenaCreate" class="form-label"><i class="fas fa-lock"></i>
                                    Contraseña</label>
                                <div style="position: relative; margin-bottom:20px;">
                                    <input type="password" class="form-control" name="contrasenaCreate"
                                        id="contrasenaCreate" placeholder="Mínimo 8 caracteres">
                                    <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                                </div>
                                    <p class="errores" id="contrasenaErrorCreate"></p>
                            </div>
                            <div class="mb-3">
                                <div class="column">
                                    <div class="select-box">
                                        <label for="dniPrefix" class="form-label"><i class="fas fa-mobile-alt"></i>
                                            Código</label>
                                        <select class="form-select" id="dniPrefix" name="type_tlfn">
                                            <option value="0412" selected>0412</option>
                                            <option value="0414">0414</option>
                                            <option value="0424">0424</option>
                                            <option value="0416">0416</option>
                                            <option value="0426">0426</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label for="telefonoCreate" class="form-label"><i class="fas fa-phone"></i>
                                            Teléfono</label>
                                        <input type="number" class="form-control" name="telefonoCreate"
                                            id="telefonoCreate" placeholder="Ej: 1234567">
                                    </div>
                                </div>
                                <p class="errores" id="telefonoErrorCreate"></p>
                            </div>

                            <div class="mb-4">
                                <label for="rolCreate" class="form-label"><i class="fas fa-user-tag"></i> Rol</label>
                                <select class="form-select" name="rolCreate" id="rolCreate">
                                    <option value="Seleccionar" selected>Seleccione un rol...</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                                <p class="errores" id="rolErrorCreate"></p>
                            </div>

                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-save"></i> Registrar Usuario
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
    <script src="../js/crearUsuario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>