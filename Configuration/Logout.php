<?php 
session_start();
include("../Configuration/Configuration.php");
include("../Configuration/functions_php/functionsLogear.php");
cerrarSesion($pdo, '../Inicio/Logear.php?ref=logout', $_SESSION['correo']);
?>