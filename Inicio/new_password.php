<?php
include("../Configuration/Configuration.php");
session_start();

// Verifica si la sesión existe
if (!isset($_SESSION['id'])) {
    // Redirige si no hay sesión válida
    header("Location: ../Inicio/recovery_pass.php");
    exit();
}
//echo $_SESSION['id'];
// Debug (solo para desarrollo)
error_log("Session ID: " . $_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../css/new_passwordU.css">
    <title>Restablecer contraseña</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form recovery">
                <div class="logo-container">
                    <img src="../imgs/LOGO.jpg" alt="Logo de la organización" class="logo">
                </div>
                <span class="title">Restablecer contraseña</span>
                <form action="../controller_php/controller_reset_password.php" method="POST" id="newPassword" autocomplete="off">
                    <input type="hidden" name="idGuiaU" id="idGuiaU" value="<?= htmlspecialchars($_SESSION['id']) ?>">
                    <div class="input-field">
                        <input type="password" class="password" id="password" name="password" placeholder="Ingrese su contraseña" />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <p class="error" id="pwError"></p>
                    <div class="input-field">
                        <input type="password" class="password" id="pass_confirm" name="password_confirm" placeholder="Confirme la contraseña" />
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePassw"></i>
                    </div>
                    <p class="error" id="pwError_confirm"></p>
                    <div class="input-field button">
                        <input type="submit" value="Actualizar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="../js/new_passwordU.js"></script>
</body>
</html>