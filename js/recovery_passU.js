  document.getElementById('recoveryForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario

            // Limpiar errores previos
            document.getElementById('emailError').textContent = '';
            document.getElementById('emailError_confirm').textContent = '';

            // Obtener valores
            const email = document.getElementById('email_recovery').value.trim();
            const email_confirm = document.getElementById('email_recovery_confirm').value.trim();
            let isValid = true;
            const regexEmail = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

            // Validar el primer campo de email
            if (!email) {
                document.getElementById('emailError').textContent = 'Email es obligatorio';
                isValid = false;
            } else if (!regexEmail.test(email)) {
                document.getElementById('emailError').textContent = 'Formato de email incorrecto: Ej: usuario@gmail.com';
                isValid = false;
            }

            // Validar el segundo campo de email
            if (!email_confirm) {
                document.getElementById('emailError_confirm').textContent = 'Confirmar email es obligatorio';
                isValid = false;
            } else if (!regexEmail.test(email_confirm)) {
                document.getElementById('emailError_confirm').textContent = 'Formato de email incorrecto: Ej: usuario@gmail.com';
                isValid = false;
            }

            // Si ambos campos son válidos, verificar que los emails coincidan
            if (isValid) {
                if (email !== email_confirm) {
                    document.getElementById('emailError_confirm').textContent = 'Los correos no coinciden';
                    isValid = false;
                } else {
                    Swal.fire({
                        title: '¡Atención!',
                        html: `Se enviará información a <strong>${email}</strong> sobre la actualización de contraseña.`,
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
                                html: 'Estamos enviando la información a tu correo',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                willClose: () => {
                                    // Enviar el formulario después de la alerta
                                    document.getElementById('recoveryForm').submit();
                                }
                            });
                        }
                    });
                }
            }
        });