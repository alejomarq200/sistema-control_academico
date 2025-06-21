<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modales/modalCreateUser.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .errores {
            text-align: left;
            padding-left: 0;
            color: red;
            font-size: 0.85rem;
            margin-top: 0.1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="modal fade" id="ModalForm" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="form-area">
                        <h1 class="text-center">Agregar Usuario</h1>
                        <form action="../controller_php/controller_CreateUser.php" method="POST" id="form-RegisterUser">
                            <div class="column">
                                <div class="select-box">
                                    <select id="dniPrefix" name="type_dni">
                                        <option value="V">V</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="mb-1 input-box">
                                    <label for="cedula" class="form-label">Cédula</label>
                                    <input type="number" class="form-control" name="cedulaCreate" id="cedulaCreate">
                                </div>
                            </div>
                            <p class="errores" id="cedulaErrorCreate"></p>

                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombreCreate" id="nombreCreate">
                            </div>
                            <p class="errores" id="nombreErrorCreate"></p>
                            <div class="mb-1">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="emailCreate" id="emailCreate">
                                <div class="errores" id="e_correoU"></div>
                                <p class="errores" id="emailErrorCreate"></p>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenaCreate" id="contrasenaCreate">
                                <p class="errores" id="contrasenaErrorCreate"></p>
                            </div>
                            <div class="column">
                                <div class="select-box">
                                    <select id="dniPrefix" name="type_tlfn">
                                        <option value="0412">0412</option>
                                        <option value="0414">0414</option>
                                        <option value="0424">0424</option>
                                        <option value="0416">0416</option>
                                        <option value="0426">0426</option>
                                    </select>
                                </div>
                                <div class="mb-1 input-box">
                                    <label for="cedula" class="form-label">Telefono</label>
                                    <input type="number" class="form-control" name="telefonoCreate" id="telefonoCreate">
                                </div>
                            </div>
                            <p class="errores" id="telefonoErrorCreate"></p>
                            <div class="mb-2">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="rolCreate" id="rolCreate">
                                    <option value="Seleccionar" selected>Selecionar</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                                <p class="errores" id="rolErrorCreate"></p>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/validarCreateUsuario.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>