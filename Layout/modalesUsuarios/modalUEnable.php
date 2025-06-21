<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modales/modal3.css">
</head>
<body>
    <div class="modal fade" id="ModalForm3" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Habilitar Usuario</h1>
                        <form action="../controller_php/controller_EnableUser.php" method="POST" id="form-RegisterUser3">
                            <input type="text" name="idguiaEnable" id="idguiaEnable" class="input" hidden>
                            <div class="mb-1">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="cedulaEnable" id="cedulaEnable" disabled>
                            </div>

                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombreEnable" id="nombreEnable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="emailEnable" id="emailEnable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenaEnable" id="contrasenaEnable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefonoEnable" id="telefonoEnable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="estadoEnable"
                                    id="estadoEnable" disabled>
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="rolEnable"
                                    id="rolEnable" disabled>
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Habilitar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/validarEnableUsuario.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>