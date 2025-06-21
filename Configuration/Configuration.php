<html>

<head>
    <!-- Alerts Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

</html>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "Proyecto";


//Variable de conexión
$dsn = 'mysql:host=' . $host . '; dbname=' . $db;
//Instanciamos PDO
$pdo = new PDO($dsn, $user, $pass);

