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
   <link rel="stylesheet" href="../css/recuperar_pass.css">
    <title>Recuperar contraseña</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div class="logo-container">
                    <img src="../imgs/LOGO.jpg" alt="Logo de la organización" class="logo">
                </div>
                <span class="title">Recuperar contraseña</span>
                <form action="../controller_php/controller_recovery_pass.php" method="POST" id="recoveryForm"
                    autocomplete="off">
                    <div class="input-field">
                        <input type="email" name="email_recovery" id="email_recovery" placeholder="Ingrese su email" />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <p class="error" id="emailError"></p> <!-- Error para el primer campo -->

                    <div class="input-field">
                        <input type="email" name="email_recovery_confirm" id="email_recovery_confirm"
                            placeholder="Confirme su email" />
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <p class="error" id="emailError_confirm"></p> <!-- Error para el segundo campo -->
                    <div class="button-container">
                        <input type="button" class="btn" onclick="location.href='Logear.php'" value="Volver" />
                        <input type="submit" class="btn" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/recovery_passU.js"></script>
</body>
</html>