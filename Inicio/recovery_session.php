<?php
error_reporting(0);
session_start();
include("../Configuration/Configuration.php");
include("../Layout/mensajes.php");
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../css/recuperar_session.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
        }

        #btn:disabled {
            background-color: #cccccc;
            /* Grey background */
            color: #666666;
            /* Darker grey text */
            border: 1px solid #999999;
            /* Grey border */
            opacity: 0.7;
            /* Reduce opacity to visually indicate disabled state */
            cursor: not-allowed;
            /* Change cursor to "not-allowed" */
        }
    </style>
    <title>Recuperar sesión</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div class="logo-container">
                    <img src="../imgs/LOGO.jpg" alt="Logo de la organización" class="logo">
                </div>
                <span class="title">Recuperar sesión</span>
                <form action="../controller_php/controller_RecoverySession.php" method="POST" id="form-recoverySession"
                    autocomplete="off">
                    <div class="input-field">
                        <input type="email" name="email_recovery_session" id="email_recovery_session" placeholder="Ingrese su email" />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <p class="error" id="email_error"></p> <!-- Error para el primer campo -->

                    <div class="input-field">
                        <input type="password" name="pwd_recovery_session" id="pwd_recovery_session"
                            placeholder="Confirme su contraseña" disabled />
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <p class="error" id="pwd_error"></p> <!-- Error para el segundo campo -->
                    <div class="button-container">
                        <input type="button" class="btn" onclick="location.href='Logear.php'" value="Volver" />
                        <input type="submit" class="btn" id="btn" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Limpiar errores previos
        document.getElementById('email_error').textContent = '';
        document.getElementById('pwd_error').textContent = '';

        // Obtener valores
        const pwd = document.getElementById('pwd_recovery_session').value.trim();
        let isValid = true;
        const regexEmail = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

        const inputs = document.querySelectorAll('input[type="email"]');
        // Validar en tiempo real
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                // Si estamos en el campo de repetir contraseña, validar también contra la nueva
                if (this.id === 'email_recovery_session') {
                    validarInput(input);
                }
            });
        });


        function validarInput(input) {
            const emailValue = input.value.trim(); // Elimina espacios en blanco
            const pwd = document.getElementById('pwd_recovery_session');
            const mensajeError = document.getElementById('email_error');

            if (!emailValue) {
                document.getElementById('email_error').textContent = 'El campo email no puede estar vacío';
            } else if (!regexEmail.test(emailValue)) {
                document.getElementById('email_error').textContent = 'Formato incorrecto';
            } else {
                //VALIDACIÓN CON FETCH
                document.getElementById('email_error').textContent = '';
                fetch("../AJAX/AJAX_Usuarios/recuperarSesion.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            email: emailValue
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status && data.status.success) {
                            pwd.disabled = false;
                            mensajeError.textContent = ''; // Limpia cualquier error previo
                        } else if (data.status && data.status.error) {
                            mensajeError.textContent = data.status.error;
                            pwd.disabled = true;
                        } else {
                            mensajeError.textContent = 'Respuesta inesperada del servidor';
                            pwd.disabled = true;
                        }
                    });
            }
        }

        document.getElementById('form-recoverySession').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            const email = document.getElementById('email_recovery_session').value.trim();
            const pwd = document.getElementById('pwd_recovery_session').value.trim();
            const mensajeError = document.getElementById('pwd_error');
            const btn = document.getElementById('btn');

            fetch("../AJAX/AJAX_Usuarios/validarContrasenaSession.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        email: email,
                        password: pwd
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status && data.status.success) {
                        mensajeError.textContent = '';
                        mostrarMensaje();
                    } else if (data.status && data.status.error) {
                        mensajeError.textContent = data.status.error;
                    } else {
                        mensajeError.textContent = 'Respuesta inesperada del servidor';
                    }
                });

            function mostrarMensaje() {
                Swal.fire({
                    title: '¡Atención!',
                    html: `Su sesión se reiniciará en todos los dispositivos vinculados`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Continuar',
                    cancelButtonText: 'Cancelar',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return new Promise((resolve) => {
                            // Temporizador de 3 segundos antes de enviar
                            setTimeout(() => {
                                resolve();
                            }, 2000);
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mostrar mensaje de carga
                        Swal.fire({
                            title: 'Procesando...',
                            html: 'Se está reiniciando su sesión',
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                            willClose: () => {
                                // Enviar el formulario después de la alerta
                                document.getElementById('form-recoverySession').submit();

                            }
                        });
                    }
                });
            }
        });
    </script>
</body>

</html>