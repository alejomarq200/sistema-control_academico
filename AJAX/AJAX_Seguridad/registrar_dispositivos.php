<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
include("../../Configuration/Configuration.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$input = json_decode(file_get_contents("php://input"), true);
$device_id = trim($input['device_id'] ?? '');
$user_id   = $_SESSION['id_user'];

if (!$device_id || !$user_id) {
    echo json_encode(["status" => "error", "msg" => "Datos incompletos"]);
    exit;
}

// Usa Secure solo si es HTTPS
$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
);
$cookieSecure = $isHttps;
$cookieName = 'device_token';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=Proyecto;charset=utf8mb4", "root", "12345678", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // 1) Intento por fingerprint actual
    $stmt = $pdo->prepare("SELECT id, token FROM dispositivos WHERE user_id = ? AND device_id = ? LIMIT 1");
    $stmt->execute([$user_id, $device_id]);
    $row = $stmt->fetch();

    if ($row) {
        $token = $row['token'];
        if (!isset($_COOKIE[$cookieName]) || $_COOKIE[$cookieName] !== $token) {
            setcookie($cookieName, $token, time() + 86400 * 30, "/", "", $cookieSecure, true);
        }
        $pdo->prepare("UPDATE dispositivos SET last_seen = NOW() WHERE id = ?")->execute([$row['id']]);
        echo json_encode(["status" => "ok", "source" => "se encontró el dispositivo registrado"]);
        exit;
    }

    // 2) Intento por token en cookie
    if (!empty($_COOKIE[$cookieName])) {
        $cookieToken = $_COOKIE[$cookieName];
        $stmt = $pdo->prepare("SELECT id, token FROM dispositivos WHERE user_id = ? AND token = ? LIMIT 1");
        $stmt->execute([$user_id, $cookieToken]);
        $row = $stmt->fetch();

        if ($row) {
            echo json_encode(["status" => "ok", "source" => "se encontró el dispositivo registrado"]);
            exit;
        }
    }

    // 3) Si no existe, registrar dispositivo
    $newToken = bin2hex(random_bytes(32)); // token seguro
    $stmt = $pdo->prepare("INSERT INTO dispositivos (user_id, device_id, token, last_seen) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$user_id, $device_id, $newToken]);

    setcookie($cookieName, $newToken, time() + 86400 * 30, "/", "", $cookieSecure, true);

    echo json_encode(["status" => "ok", "source" => "new_device_registered"]);
    exit;

} catch (Throwable $e) {
    echo json_encode(["status" => "error", "msg" => $e->getMessage()]);
}
