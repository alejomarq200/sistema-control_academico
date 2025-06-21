<?php
include("../Configuration/Configuration.php");
include("../Configuration/validate_user.php");

session_start();
valid_sesion($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../css/newPassword.css" />
    <title>Restablecer contraseña</title>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form recovery">
                <span class="title">Restablecer contraseña</span>

                <form action="../controller_php/controller_reset_password.php" method="POST" id="recoveryForm" autocomplete="off">
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
                        <input type="submit" value="Actualizar"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
     <script src="../js/vaidar_newPassw.js"></script> 
</body>

</html>