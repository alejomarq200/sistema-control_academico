<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modalesUsuarios/modalUDisable.css">
</head>
<body>
    <div class="modal fade" id="ModalForm2" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-area">
                        <h1 class="text-center">Inhabilitar Usuario</h1>
                        <form action="../controller_php/controller_DisableUser.php" method="POST" id="form-RegisterUser2">
                            <input type="text" name="idguiaDelete" id="idguiaDisable" class="input" hidden>
                            <div class="mb-1">
                                <label for="cedula" class="form-label">Cédula</label>
                                <input type="text" class="form-control" name="cedulaDisable" id="cedulaDisable" disabled>
                            </div>

                            <div class="mb-1">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombreDisable" id="nombreDisable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="emailDisable" id="emailDisable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="contrasenaDisable" id="contrasenaDisable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="contrasena" class="form-label">Telefono</label>
                                <input type="text" class="form-control" name="telefonoDisable" id="telefonoDisable" disabled>
                            </div>
                            <div class="mb-1">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="estadoDisable"
                                    id="estadoDisable" disabled>
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select form-select-mb" aria-label=".form-select-sm example" name="rolDisable"
                                    id="rolDisable" disabled>
                                    <option value="Seleccionar">Selecionar</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Usuario">Usuario</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-light mt-2">Inhabilitar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SCRIPT-->
    <script src="../js/validarDisableUsuario.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>