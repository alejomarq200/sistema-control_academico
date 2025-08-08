<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "12345678";
$db = "Proyecto";


//Variable de conexión
$dsn = 'mysql:host=' . $host . '; dbname=' . $db;
//Instanciamos PDO
$pdo = new PDO($dsn, $user, $pass);
if (isset($_SESSION['correo'])) {
    $usuario = $_SESSION['correo'];
    $pdo->exec("SET @usuario_actual = '" . $usuario . "'");
    //echo $usuario;
}
