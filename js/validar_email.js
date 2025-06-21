document.getElementById('LoginForm').addEventListener('submit', function (event) {
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
        document.getElementById('emailError').textContent = 'Formato de email incorrecto';
        isValid = false;
    }

    // Validar el segundo campo de email
    if (!email_confirm) {
        document.getElementById('emailError_confirm').textContent = 'Confirmar email es obligatorio';
        isValid = false;
    } else if (!regexEmail.test(email_confirm)) {
        document.getElementById('emailError_confirm').textContent = 'Formato de email incorrecto';
        isValid = false;
    }

    // Si ambos campos son válidos, verificar que los emails coincidan
    if (isValid) {
        if (email !== email_confirm) {
            document.getElementById('emailError_confirm').textContent = 'Los correos no coinciden';
            isValid = false;
        } else {
            // Si todo está bien, enviar el formulario
            document.getElementById('LoginForm').submit();
        }
    }
});