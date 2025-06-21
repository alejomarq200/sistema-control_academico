<?php
session_start();

// Verifica si hay un mensaje
if(isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    $titulo = $_SESSION['titulo'];

    // Destruir la sesión después de mostrar el mensaje
    session_unset();
    session_destroy();
} else {
    // Si no hay mensaje, redirigir a la página de inicio
    header("Location: ../Inicio/Logear.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <script>
    Swal.fire({
        position: "top-center",
        icon: "<?php echo $icono; ?>",
        title: "<?php echo $titulo; ?>",
        text: "<?php echo $mensaje; ?>",
        showConfirmButton: false,
        timer: 2500
    }).then(() => {
        window.location.href = "../Inicio/Logear.php"; // Redirigir después de mostrar el mensaje
    });
    </script>
</body>

</html>