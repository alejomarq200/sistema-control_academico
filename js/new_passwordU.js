const pwShowHide = document.querySelectorAll(".showHidePw, .showHidePassw"); // Selecciona ambos iconos

        // Función para alternar la visibilidad de la contraseña
        pwShowHide.forEach((eyeIcon) => {
            eyeIcon.addEventListener("click", () => {
                // Obtener el campo de contraseña asociado al icono clickeado
                const pwField = eyeIcon.parentElement.querySelector("input[type='password'], input[type='text']");

                // Alternar entre mostrar y ocultar la contraseña
                if (pwField.type === "password") {
                    pwField.type = "text";
                    eyeIcon.classList.replace("uil-eye-slash", "uil-eye"); // Cambiar ícono a "ojo abierto"
                } else {
                    pwField.type = "password";
                    eyeIcon.classList.replace("uil-eye", "uil-eye-slash"); // Cambiar ícono a "ojo cerrado"
                }
            });
        });

        document.getElementById('newPassword').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Limpiar errores previos
            document.getElementById('pwError').textContent = '';
            document.getElementById('pwError_confirm').textContent = '';

            // Obtener valores
            const password = document.getElementById('password').value.trim();
            const password_confirm = document.getElementById('pass_confirm').value.trim();
            let isValid = true;

            /* 1 dígito, 1 letra minúscula, 1 letra mayúscula, 1 caracter especial entre 6 y 20 */
            const regexPw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-+.]).{6,20}$/;

            // Validar el primer campo de email
            if (!password) {
                document.getElementById('pwError').textContent = 'Contraseña es obligatorio';
                isValid = false;
            } else if (!regexPw.test(password)) {
                document.getElementById('pwError').textContent = 'Formato inválido: Ingrese de 8 a 16 digitos con minúsculas, mayúsculas, caracter especiales y números';
                isValid = false;
            }

            // Validar el segundo campo de email
            if (!password_confirm) {
                document.getElementById('pwError_confirm').textContent = 'Confirmar contraseña es obligatorio';
                isValid = false;
            } else if (!regexPw.test(password_confirm)) {
                document.getElementById('pwError_confirm').textContent = 'Formato inválido: Ingrese de 8 a 16 digitos con minúsculas, mayúsculas, caracter especiales y números';
                isValid = false;
            }

            // Si ambos campos son válidos, verificar que los emails coincidan
            if (isValid) {
                if (password !== password_confirm) {
                    document.getElementById('pwError_confirm').textContent = 'Las contraseñas no coinciden';
                    isValid = false;
                } else {
                    // Si todo está bien, enviar el formulario
                    Swal.fire({
                        title: '¡Atención!',
                        html: `Su contraseña se actualizó con éxito. Será redireccionado al Login para su inicio de sesión.`,
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonText: 'Continuar',
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
                                title: 'Redireccionando...',
                                timer: 1000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                willClose: () => {
                                    // Enviar el formulario después de la alerta
                                    document.getElementById('newPassword').submit();
                                }
                            });
                        }
                    });
                }
            }
        });