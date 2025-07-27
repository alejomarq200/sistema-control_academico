<?php
header('Content-Type: application/json'); // Especificamos que la respuesta será JSON
include("../../Configuration/Configuration.php");

$response = [
    'error' => '',
    'valido' => true
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nombreAula'])) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM aulas WHERE nombre = :nombre");
            $stmt->bindValue(':nombre', $_POST['nombreAula']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $response['error'] = "Existe un Aula con el mismo nombre. Verifique";
                $response['valido'] = false;
            }
        } catch (PDOException $e) {
            $response['error'] = "Error en la base de datos: " . $e->getMessage();
            $response['valido'] = false;
        }
    } else {
        $response['error'] = "El nombre del aula es requerido";
        $response['valido'] = false;
    }
} else {
    $response['error'] = "Método no permitido";
    $response['valido'] = false;
}

echo json_encode($response);
?>