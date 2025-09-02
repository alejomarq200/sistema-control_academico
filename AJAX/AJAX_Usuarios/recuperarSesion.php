<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
include("../../Configuration/Configuration.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$input = json_decode(file_get_contents("php://input"), true);
$email = trim($input['email'] ?? '');

if (!$email) {
    echo json_encode(["status" => ["error" => "El campo email no puede estar vacío"]]);
    exit;
}
try {
    $stmtEmail = $pdo->prepare('SELECT correo FROM users WHERE correo = :correo');
    $stmtEmail->bindValue(':correo', $email, PDO::PARAM_STR);
    $stmtEmail->execute();

    if ($stmtEmail->rowCount() > 0) {
        echo json_encode(["status" => ["success" => "Se encontró el correo"]]);
    } else {
        echo json_encode(["status" => ["error" => "No encontró el correo"]]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => ["error" => $e->getMessage()]]);
}
