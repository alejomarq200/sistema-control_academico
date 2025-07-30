<?php
//error_reporting(0);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../Configuration/Configuration.php");
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
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
            $mail = new PHPMailer(true);

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
            $mail->setFrom('davidbrr18@gmail.com', 'Colegio Prados del Norte');
            $mail->addAddress($variablesFormEmail[0], $result['nombre'] . " " . $result['apellido']);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Recuperar contraseña';
            $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña, por favor, visita la página de <a href="localhost/Desarrollo_tesis/Inicio/new_password.php">Recuperación de contraseña</a>';

            $mail->send();

            /* Creamos una variable de sesión para manipularla */
            $_SESSION['id'] = $result['cedula'];
            $_SESSION['user_email'] = $result['correo'];
            $_SESSION['user_name'] = $result['nombre'] . " " . $result['apellido'];
            
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Procesar los errores del formulario
    $mensajes = [];
    $validar = true;
    $patronEmail = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";

    /* Validación de campos vacios o formato erróneo */

    $variablesFormEmail = array(trim($_POST['email_recovery']), trim($_POST['email_recovery']));

    if (empty($variablesFormEmail[0])) {
        $validar = false;
        $mensajes[] = 'Campo vacio email';
    } else if (!preg_match($patronEmail, $variablesFormEmail[0])) {
        $validar = false;
        $mensajes[] = 'Formato de email incorrecto';
    }

    if (empty($variablesFormEmail[1])) {
        $validar = false;
        $mensajes[] = 'Campo vacio confirm email';
    } else if (!preg_match($patronEmail, $variablesFormEmail[1])) {
        $validar = false;
        $mensajes[] = 'Formato de email incorrecto';
    }

    /* Si validar es verdadero se procesa el envío del código al correo */
   if ($validar) {
    if ($variablesFormEmail[0] == $variablesFormEmail[1]) {
        if (enviarEmailConfirm($pdo, $variablesFormEmail)) {
            // Asegurarse que las variables de sesión estén establecidas
            session_write_close(); // Guarda los datos de sesión antes de redirigir
            header("Location: ../Inicio/Logear.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'El correo registrado no existe y/o está inactivo';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            session_write_close();
            header("Location: ../Inicio/recovery_pass.php");
            exit();
        }
    }
}
}
