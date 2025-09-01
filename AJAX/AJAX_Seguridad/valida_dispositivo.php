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
$user_id   = (int)($input['user_id'] ?? 0);

if (!$device_id || !$user_id) {
    echo json_encode(["status" => "error", "msg" => "Datos incompletos"]);
    exit;
}

// Usa Secure solo si es HTTPS (en localhost HTTP no envía la cookie si Secure=true)
$isHttps = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
);

$cookieSecure = $isHttps; // en dev HTTP será false
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
        echo json_encode(["status" => "ok", "source" => "match_by_fingerprint"]);
        exit;
    }

    // 2) No encontró por fingerprint: intento por token en cookie (mismo equipo, fingerprint rotó)
    if (!empty($_COOKIE[$cookieName])) {
        $cookieToken = $_COOKIE[$cookieName];

        $stmt = $pdo->prepare("SELECT id, token FROM dispositivos WHERE user_id = ? AND token = ? LIMIT 1");
        $stmt->execute([$user_id, $cookieToken]);
        $row = $stmt->fetch();

        if ($row) {
            // Actualiza fingerprint a la versión nueva y refresca last_seen
            $upd = $pdo->prepare("UPDATE dispositivos SET device_id = ?, last_seen = NOW() WHERE id = ?");
            $upd->execute([$device_id, $row['id']]);

            // Asegura cookie presente (por si cambió el flag Secure/ambiente)
            setcookie($cookieName, $row['token'], time() + 86400 * 30, "/", "", $cookieSecure, true);

            echo json_encode(["status" => "ok", "source" => "match_by_cookie_token"]);
            exit;
        }
    }

    // 3) No hay match por fingerprint ni por cookie → registro nuevo
    //   $newToken = bin2hex(random_bytes(16));
    //   $ins = $pdo->prepare("INSERT INTO dispositivos (user_id, device_id, token, descripcion, last_seen)
    //                         VALUES (?, ?, ?, ?, NOW())");
    //   $ins->execute([$user_id, $device_id, $newToken, "Dispositivo nuevo"]);

    //   setcookie($cookieName, $newToken, time() + 86400*30, "/", "", $cookieSecure, true);

    //   echo json_encode(["status" => "ok", "source" => "new_device", "msg" => "Dispositivo registrado"]);

} catch (Throwable $e) {
    // Captura PDOException y cualquier error
    echo json_encode(["status" => "error", "msg" => $e->getMessage()]);
}
