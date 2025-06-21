<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../controller_php/Phpmailer/Exception.php';
require '../controller_php/Phpmailer/PHPMailer.php';
require '../controller_php/Phpmailer/SMTP.php';

include("../Configuration/Configuration.php");
include("Location: ../Layout/mensajes.php");

function recoveryPass($pdo, $variablesFormRecovery){

    $stmt= $pdo->prepare("UPDATE users SET contrasena=:contrasena WHERE cedula=:cedula");
    $stmt->bindValue(':contrasena', $variablesFormRecovery[0]);    
    $stmt->bindValue(':cedula', $variablesFormRecovery[2]);    
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $_SESSION['mensaje'] = 'Contraseña actualizada con éxito';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';

        header("Location: ../Layout/mensaje_recovery.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'Error al actualizar la contraseña. Verifique';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';

        header("Location: ../Inicio/Logear.php");
        exit();
    }
}

  function enviarEmailConfirm($pdo, $variablesFormEmail){

    $stmt = $pdo->prepare("SELECT * FROM users WHERE correo = :correo AND id_estado = 2");
            $stmt->bindValue(':correo', $variablesFormEmail[0]);
            $stmt->execute();

            // Verificar si se encontró algún registro
            if ($stmt->rowCount() > 0) {

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'davidbrr18@gmail.com';                     //SMTP username
                    $mail->Password   = 'gmwdorvqpsmamllk';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('davidbrr18@gmail.com', 'Usuario Prueba');
                    $mail->addAddress($variablesFormEmail[0], $result['nombre'] . " " . $result['apellido']);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Recuperar contraseña';
                    $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="localhost/Desarrollo_tesis/Inicio/new_password.php">Recuperación de contraseña</a>';

                    $mail->send();

                    /* Creamos una variable de sesión para manipularla  */
                    $_SESSION['id'] = $result['cedula'];
                    return true;

                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    return false;
                    
                }
            } else {
                
                return false;
            }
} 