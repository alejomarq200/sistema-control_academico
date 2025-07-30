<?php
require_once "../../Configuration/Configuration.php";
header('Content-Type: text/plain'); 

if (isset($_POST['action']) && $_POST['action'] === 'validar_horario') {
    try {
        $stmt = $pdo->prepare("SELECT id_grado FROM horarios WHERE id_grado = :id_grado LIMIT 1");
        $stmt->bindParam(':id_grado', $_POST['grado'], PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo 'El horario ya existe para este grado.';
        } else {
            echo ''; // Devolver cadena vacía si no existe
        }
    } catch (PDOException $e) {
        echo 'Error al verificar horarios: ' . $e->getMessage();
    }
} else {
    echo 'Acción no válida';
}