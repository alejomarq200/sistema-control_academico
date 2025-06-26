<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "Proyecto";


//Variable de conexión
$dsn = 'mysql:host=' . $host . '; dbname=' . $db;
//Instanciamos PDO
$pdo = new PDO($dsn, $user, $pass);

