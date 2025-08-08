<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesUsuarios//modalUEdit.css">
</head>
<body>
    <div class="modal fade" id="ModalForm1" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Editar Usuario</h1>
                        <form action="../controller_php/controller_EditUser.php" method="POST" id="form-RegisterUser1">
                            <input type="text" name="idguiaEdit" class="input" id="idguiaEdit" hidden>
                            <div class="mb-1">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="cedulaEdit" id="cedulaEdit">
                                <p class="erroresEdit" id="cedulaErrorEdit"></p>
                            </div>

                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombreEdit" id="nombreEdit">
                            </div>
                            <p class="erroresEdit" id="nombreErrorEdit"></p>
                            <div class="mb-1">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="emailEdit" id="emailEdit">
                                <p class="erroresEdit" id="emailErrorEdit"></p>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenaEdit" id="contrasenaEdit">
                                <p class="erroresEdit" id="contrasenaErrorEdit"></p>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefonoEdit" id="telefonoEdit">
                                <p class="erroresEdit" id="telefonoErrorEdit"></p>
                            </div>
                            <div class="mb-1">
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="estadoEdit" id="estadoEdit" hidden>
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                                <p class="erroresEdit" id="estadoErrorEdit"></p>
                            </div>

                            <div class="mb-2">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="rolEdit" id="rolEdit">
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                                <p class="erroresEdit" id="rolErrorEdit"></p>
                                <p id="log"></p>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/validarEditUsuario.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>