<?php
include("../Configuration/functions_php/functionsLogear.php");
// $variable = obtenerAccesos($pdo);
// echo $variable;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Alerts Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <!-- ===== CSS ===== -->
  <title>Iniciar sesión</title>
  <style>
    /* ===== Google Font Import - Poformsins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      position: relative;
      background-image: linear-gradient(rgba(255, 255, 255, 0.21), rgba(255, 255, 255, 0.33)), url('../imgs/FONDO 4.jpg');
      background-size: cover;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
    }

    .container {
      position: relative;
      max-width: 550px;
      width: 100%;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      margin: 0 20px;
    }

    .container .forms {
      display: flex;
      align-items: center;
      height: 650px;
      width: 200%;
      transition: height 0.2s ease;
    }


    .container .form {
      width: 50%;
      padding: 30px;
      background-color: #fff;
      transition: margin-left 0.18s ease;
    }

    .container.active .login {
      margin-left: -50%;
      opacity: 0;
      transition: margin-left 0.18s ease, opacity 0.15s ease;
    }

    .container .signup {
      opacity: 0;
      transition: opacity 0.09s ease;
    }

    .container.active .signup {
      opacity: 1;
      transition: opacity 0.2s ease;
    }

    .container.active .forms {
      height: 600px;
    }

    .container .form .title {
      position: relative;
      font-size: 27px;
      font-weight: 600;
    }

    .form .title::before {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      background-color: #0e2238;
      border-radius: 25px;
    }

    .form .input-field {
      position: relative;
      height: 50px;
      width: 100%;
      margin-top: 30px;
    }

    .input-field input {
      position: absolute;
      height: 100%;
      width: 100%;
      padding: 0 35px;
      border: none;
      outline: none;
      font-size: 16px;
      border-bottom: 2px solid #ccc;
      border-top: 2px solid transparent;
      transition: all 0.2s ease;
    }

    .input-field input:is(:focus, :valid) {
      border-bottom-color: #0e2238;
    }

    .input-field i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 23px;
      transition: all 0.2s ease;
    }

    .input-field input:is(:focus, :valid)~i {
      color: #0e2238;
    }

    .input-field i.icon {
      left: 0;
    }

    .form .checkbox-text {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 20px;
    }

    .checkbox-text .checkbox-content {
      display: flex;
      align-items: center;
    }

    .checkbox-content input {
      margin-right: 10px;
      accent-color: #0e2238;
    }

    .form .text {
      color: #333;
      font-size: 14px;
    }

    .form a.text {
      color: #0e2238;
      text-decoration: none;
    }

    .form a:hover {
      text-decoration: underline;
    }

    .form .button {
      margin-top: 35px;
    }

    .form .button input {
      border: none;
      color: #fff;
      font-size: 17px;
      font-weight: 500;
      letter-spacing: 1px;
      border-radius: 6px;
      background-color: #0e2238;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .error {
      color: red;
      font-size: 14px;
    }

    .button input:hover {
      background-color: #0e2238;
    }

    .form .login-signup {
      margin-top: 30px;
      text-align: center;
    }

    /* Estilos para el logo */
    .logo-container {
      text-align: center;
      margin-bottom: 25px;
    }

    .logo {
      max-width: 150px;
      height: auto;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <?php
  error_reporting(0);
  include("../Layout/mensajesLogin.php");
  ?>
  <div class="container">
    <div class="forms">
      <div class="form login">
        <!-- Sección del logo -->
        <div class="logo-container">
          <img src="../imgs/LOGO.jpg" alt="Logo de la organización" class="logo">
        </div>
        <span class="title">Iniciar Sesión</span>
        <form action="../controller_php/controller_login.php" method="POST" id="LoginForm" autocomplete="off">
          <div class="input-field">
            <input type="text" name="email" id="email" placeholder="Ingrese su correo" />
            <i class="uil uil-envelope icon"></i>
          </div>
          <p class="error" id="emailError"></p>
          <div class="input-field">
            <input type="password" name="password" id="password" class="password" placeholder="Ingrese su contraseña" />
            <i class="uil uil-lock icon"></i>
          </div>
          <p class="error" id="passwordError"></p>
          <div class="checkbox-text">
            <a href="../Inicio/recovery_session.php" class="text">¿Sesión activa? Recupere aquí</a>
            <a href="../Inicio/recovery_pass.php" class="text">¿Olvidó su contraseña?</a>
          </div>
          <div class="input-field button">
            <input type="submit" name="Enviar" value="Enviar">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.getElementById('LoginForm').addEventListener('submit', function(event) {
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
  </script>
</body>

</html>