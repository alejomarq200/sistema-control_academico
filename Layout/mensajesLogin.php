<?php
function mensajeSesion($mensaje, $icono, $titulo, $redireccion)
{
?>
    <script>
        Swal.fire({
            title: "<?php echo $titulo; ?>",
            text: "<?php echo $mensaje; ?>",
            icon: "<?php echo $icono; ?>",
            backdrop: false,
            position: "top-end",
            toast: true,
            showConfirmButton: false,
            timer: 4500,
            willClose: () => {
                window.location.href = "<?php echo $redireccion; ?>";
            }
        });
    </script>
<?php
}

// Verificar primero si existe el parámetro GET
if (isset($_GET['ref']) && $_GET['ref'] == 'error') {
    mensajeSesion('Los campos no pueden estar vacios. Verifique', 'error', 'Error', '../Inicio/Logear.php');
} else if(isset($_GET['ref']) && $_GET['ref'] == 'undefined'){
    mensajeSesion('Las credenciales no existen. Verifique.', 'error', 'Error', '../Inicio/Logear.php');
} else if (isset($_GET['ref']) && $_GET['ref'] == 'inactive') {
    mensajeSesion('El usuario se encuentra inactivo.', 'error', 'Error', '../Inicio/Logear.php');
} else if (isset($_GET['ref']) && $_GET['ref'] == 'active') {
    mensajeSesion('El usuario tiene una sesión activa en otro dispositivo. Verifique.', 'warning', 'Atención', '../Inicio/Logear.php');
} else  if (isset($_GET['ref']) && $_GET['ref'] == 'logout')  {
    mensajeSesion('Su sesión se cerró con éxito', 'success', 'Éxito', '../Inicio/Logear.php');
} else  if (isset($_GET['ref']) && $_GET['ref'] == 'session_success')  {
    mensajeSesion('Se recuperó con éxito su sesión', 'success', 'Sesión recuperada', '../Inicio/Logear.php');
} else  if (isset($_GET['ref']) && $_GET['ref'] == 'session_error')  {
    mensajeSesion('Su sesión no se recuperó porque no tiene sesión activa', 'error', 'La sesión no se recuperó', '../Inicio/Logear.php');
} 

?>