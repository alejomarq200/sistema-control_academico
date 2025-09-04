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
$user_id = $input['usuario'];
$nombre_equipo = $input['nombre_equipo'];
$dpto_equipo = $input['dpto_equipo'];


if (!$device_id || !$user_id || !$nombre_equipo || !$dpto_equipo) {
    echo json_encode(["status" => "error", "msg" => "Datos incompletos"]);
    exit;
}

$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
);
$cookieSecure = $isHttps;
$cookieName = 'device_token';

try {

    // 1. Validar si el usuario existe
    $stmtUser = $pdo->prepare("SELECT user_id FROM dispositivos WHERE user_id = ? LIMIT 1");
    $stmtUser->execute([$user_id]);
    $userExists = $stmtUser->fetch();

    if (!$userExists) {
        // 2. Si no existe, registrar dispositivo
        $newToken = bin2hex(random_bytes(32)); // token seguro
        $stmt = $pdo->prepare("INSERT INTO `dispositivos`(`user_id`, `nombre_equipo`, `dpto_equipo`, `device_id`, `token`, `fecha_registro`, `last_seen`) 
                               VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->execute([$user_id, $nombre_equipo, $dpto_equipo, $device_id, $newToken]);

        setcookie($cookieName, $newToken, time() + 86400 * 30, "/", "", $cookieSecure, true);

        echo json_encode(["status" => "ok", "source" => "new_device_registered"]);
        exit;
    } else {
        echo json_encode(["status" => "error", "source" => "exist_user"]);
        exit;
    }

    // 3. Buscar dispositivo por fingerprint
    $stmt = $pdo->prepare("SELECT id, token FROM dispositivos WHERE user_id = ? AND device_id = ? LIMIT 1");
    $stmt->execute([$user_id, $device_id]);
    $row = $stmt->fetch();

    if ($row) {
        $token = $row['token'];
        if (!isset($_COOKIE[$cookieName]) || $_COOKIE[$cookieName] !== $token) {
            setcookie($cookieName, $token, time() + 86400 * 30, "/", "", $cookieSecure, true);
        }
        $pdo->prepare("UPDATE dispositivos SET last_seen = NOW() WHERE id = ?")->execute([$row['id']]);
        echo json_encode(["status" => "ok", "source" => "exist_device"]);
        exit;
    }

    // 4. Validar por token en cookie
    if (!empty($_COOKIE[$cookieName])) {
        $cookieToken = $_COOKIE[$cookieName];
        $stmt = $pdo->prepare("SELECT id, token FROM dispositivos WHERE user_id = ? AND token = ? LIMIT 1");
        $stmt->execute([$user_id, $cookieToken]);
        $row = $stmt->fetch();

        if ($row) {
            echo json_encode(["status" => "ok", "source" => "exist_device"]);
            exit;
        }
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "msg" => "Error de conexión"]);
    exit;
}
