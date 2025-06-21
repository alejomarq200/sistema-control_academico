document.getElementById('LoginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevenir el envío del formulario
    
    // Limpiar errores previos
    const errorElements = document.querySelectorAll('.error');
    const formulario = document.getElementById('LoginForm');
    errorElements.forEach(el => el.textContent = '');
  
    // Obtener valores
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    let isValid = true;
  
    // Validamos campos para mandar imagen receptivo
    if (!email) {
      document.getElementById('emailError').textContent = 'Email es obligatorio';
      isValid = false;
    }
  
    if (!password) {
      document.getElementById('passwordError').textContent = 'Contraseña es obligatoria';
      isValid = false;
    }
  
    // Si todo es válido, enviar los datos
    if (isValid) {
      formulario.submit();
    }
  });
  
