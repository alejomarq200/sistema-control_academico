<?php 
session_start();
session_destroy();
header("Location: ../Inicio/Logear.php");
?>