<?php
error_reporting(0);
session_start();
include("../Configuration/Configuration.php");
include("../Layout/mensajes.php");
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
  <link rel="stylesheet" href="../css/login.css">
  <title>Iniciar sesión</title>
</head>
<body>
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
            <input type="email" name="email" id="email" placeholder="Ingrese su correo" />
            <i class="uil uil-envelope icon"></i>
          </div>
          <p class="error" id="emailError"></p>
          <div class="input-field">
            <input type="password" name="password" id="password" class="password" placeholder="Ingrese su contraseña" />
            <i class="uil uil-lock icon"></i>
          </div>
          <p class="error" id="passwordError"></p>
          <div class="checkbox-text">
            <a href="../Inicio/recovery_pass.php" class="text">¿Olvidó su contraseña?</a>
          </div>
          <div class="input-field button">
            <input type="submit" name="Enviar" value="Enviar">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--  -->
  <script src="../js/validar_login.js"></script>
</body>

</html>