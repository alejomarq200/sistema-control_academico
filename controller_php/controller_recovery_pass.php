<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../Configuration/Configuration.php"); // Este archivo ya maneja session_start()

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Phpmailer/Exception.php';
require '../Phpmailer/PHPMailer.php';
require '../Phpmailer/SMTP.php';

function enviarEmailConfirm($pdo, array $variablesFormEmail)
{
    try {
        $stmt = $pdo->prepare("SELECT correo, cedula, nombres FROM users WHERE correo = :correo");
        $stmt->bindValue(":correo", $variablesFormEmail[1], PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Usar fetch() en lugar de fetchAll()
            
            $mail = new PHPMailer(true);

            // Configuración del servidor
            $mail->SMTPDebug = 0;  // Cambia a 2 para ver detalles
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'intt8379m@gmail.com';
            // ¡IMPORTANTE! Usar contraseña de aplicación de Gmail
            $mail->Password   = 'lckq mdjg doqv gahi';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Destinatarios
            $mail->setFrom('intt8379m@gmail.com', 'Colegio Prados del Norte');
            $mail->addAddress($variablesFormEmail[1], $result['nombres']);

            // Contenido
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de Contraseña - Colegio Prados del Norte';
            $mail->Body    = '
                <html>
                <body>
                    <h2>Recuperación de Contraseña</h2>
                    <p>Hola ' . htmlspecialchars($result['nombres']) . ',</p>
                    <p>Hemos recibido una solicitud para recuperar tu contraseña.</p>
                    <p>Por favor, haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                    <p><a href="http://localhost/Desarrollo_tesis/Inicio/new_password.php">Restablecer Contraseña</a></p>
                    <p>Si no solicitaste este cambio, ignora este mensaje.</p>
                    <br>
                    <p>Saludos,<br>Colegio Prados del Norte</p>
                </body>
                </html>
            ';
            
            $mail->AltBody = "Recuperación de Contraseña\n\nHola {$result['nombres']},\n\nHemos recibido una solicitud para recuperar tu contraseña.\n\nPara restablecer tu contraseña, visita: http://localhost/Desarrollo_tesis/Inicio/new_password.php?email={$variablesFormEmail[1]}\n\nSi no solicitaste este cambio, ignora este mensaje.\n\nSaludos,\nColegio Prados del Norte";

            $mail->send();

            $_SESSION['user_email'] = $variablesFormEmail[1];
            $_SESSION['id'] = $result['cedula'];
            $_SESSION['user_name'] = $result['nombres'];
            
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        error_log("Error en envío de email: " . $e->getMessage());
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mensajes = [];
    $validar = true;
    $patronEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";

    $email = trim($_POST['email_recovery']);
    $confirmEmail = trim($_POST['email_recovery']);

    // Validaciones
    if (empty($email)) {
        $validar = false;
        $mensajes[] = 'Campo email vacío';
    } elseif (!preg_match($patronEmail, $email)) {
        $validar = false;
        $mensajes[] = 'Formato de email incorrecto';
    }

    if ($validar && $email == $confirmEmail) {
        if (enviarEmailConfirm($pdo, [$email, $confirmEmail])) {
            $_SESSION['mensaje'] = 'Correo de recuperación enviado exitosamente';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Éxito';
            header("Location: ../Inicio/Logear.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'El correo registrado no existe y/o está inactivo';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Inicio/recovery_pass.php");
            exit();
        }
    } else {
        $_SESSION['mensaje'] = 'Los correos no coinciden o son inválidos';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Inicio/recovery_pass.php");
        exit();
    }
}
?>