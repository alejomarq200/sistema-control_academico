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
        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            min-height: 20px;
        }

        .success-message {
            /* color: #198754;*/
            font-weight: 500;
            text-align: center;
            margin-top: 20px;
            display: none;
        }

        .error-message {
            color: #dc3545;
            font-weight: 500;
            text-align: center;
            margin-top: 20px;
            display: none;
        }

        .valid-field {
            border-color: #198754 !important;
        }

        .invalid-field {
            border-color: #dc3545 !important;
        }
    </style>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-UdpdatePwd');
            const inputs = document.querySelectorAll('input[type="password"]');
            const successMessage = document.getElementById('successMessage');

            // Validar en tiempo real
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    validarInput(this);
                    // Si estamos en el campo de repetir contraseña, validar también contra la nueva
                    if (this.id === 'contrasena_repeat') {
                        validarConfirmacion();
                    }
                });

                input.addEventListener('blur', function() {
                    validarInput(this);
                    if (this.id === 'contrasena_repeat') {
                        validarConfirmacion();
                    }
                });
            });

            // Validar formulario al enviar
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                let formularioValido = true;

                inputs.forEach(input => {
                    if (!validarInput(input)) {
                        formularioValido = false;
                    }
                });

                // Validar confirmación de contraseña
                if (!validarConfirmacion()) {
                    formularioValido = false;
                }

                if (formularioValido) {
                    // Simular envío exitoso
                    validarContrasena();
                    // successMessage.style.display = 'block';
                    // setTimeout(() => {
                    //     successMessage.style.display = 'none';
                    //     form.reset();
                    //     inputs.forEach(input => {
                    //         input.classList.remove('valid-field', 'invalid-field');
                    //     });
                    // }, 3000);
                }
            });

            function validarContrasena() {
                const contrasenaAct = document.getElementById('contrasena_act').value;
                const contrasenaNueva = document.getElementById('contrasena_nuevo').value;
                const mensaje = document.getElementById('successMessage')
                if (!contrasenaAct) {
                    console.error("La nueva contraseña no puede estar vacia 🚫");
                    return;
                }

                fetch("../AJAX/AJAX_Seguridad/validarContraseña.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            contrasena: contrasenaAct,
                            contrasenaNueva: contrasenaNueva
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        mensaje.style.display = 'block';

                        if (data.success) {
                            mensaje.style.color = 'green';
                            mensaje.innerHTML = `<i class="fas fa-check-circle" style="color:green;"></i> ${data.success}`;
                            setTimeout(function() {
                                mensaje.style.display = 'none';
                                form.reset();
                            }, 2000);
                        } else {
                            mensaje.style.color = 'red';
                            mensaje.innerHTML = `<i class="fas fa-check-circle" style="color:red;"></i> ${data.error}`;
                        }
                    });
            }

            function validarInput(input) {
                const errorElement = document.getElementById(`error-${input.id}`);
                let valido = true;
                let mensaje = '';

                // Remover clases previas
                input.classList.remove('valid-field', 'invalid-field');

                // Validar según el campo
                switch (input.id) {
                    case 'contrasena_act':
                        if (input.value.trim() === '') {
                            mensaje = 'La contraseña actual es requerida';
                            valido = false;
                        } else if (input.value.length < 6) {
                            mensaje = 'La contraseña debe tener al menos 6 caracteres';
                            valido = false;
                        }
                        break;

                    case 'contrasena_nuevo':
                        if (input.value.trim() === '') {
                            mensaje = 'La nueva contraseña es requerida';
                            valido = false;
                        } else if (input.value.length < 8) {
                            mensaje = 'La nueva contraseña debe tener al menos 8 caracteres';
                            valido = false;
                        } else if (!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/.test(input.value)) {
                            mensaje = 'Debe contener mayúsculas, minúsculas y números';
                            valido = false;
                        }
                        break;

                    case 'contrasena_repeat':
                        // La validación de confirmación se hace en otra función
                        return validarConfirmacion();
                }

                // Aplicar estilos y mensajes
                if (!valido && input.value.trim() !== '') {
                    input.classList.add('invalid-field');
                    errorElement.textContent = mensaje;
                } else if (valido && input.value.trim() !== '') {
                    input.classList.add('valid-field');
                    errorElement.textContent = '';
                } else {
                    errorElement.textContent = '';
                }

                return valido;
            }

            function validarConfirmacion() {
                const nuevaContrasena = document.getElementById('contrasena_nuevo');
                const repetirContrasena = document.getElementById('contrasena_repeat');
                const errorElement = document.getElementById('error-contrasena_repeat');

                // Remover clases previas
                repetirContrasena.classList.remove('valid-field', 'invalid-field');

                if (repetirContrasena.value.trim() === '') {
                    errorElement.textContent = '';
                    return false;
                }

                if (nuevaContrasena.value !== repetirContrasena.value) {
                    errorElement.textContent = 'Las contraseñas no coinciden';
                    repetirContrasena.classList.add('invalid-field');
                    return false;
                } else {
                    errorElement.textContent = '';
                    repetirContrasena.classList.add('valid-field');
                    return true;
                }
            }
        });
    </script>
</body>

</html>