<?php
header('Content-Type: application/json');
include("../../Configuration/Configuration.php");
$response = [
    'valido' => false,
    'errores' => [
        'nombre' => '',
        'capacidad' => '',
        'grado' => ''
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nombreAula']) || empty($_POST['gradoAula']) || empty($_POST['capacidadAula'])) {
        $response['errores']['nombre'] = !empty($_POST['nombreAula']) ? '' : 'El nombre del aula es requerido';
        $response['errores']['capacidad'] = !empty($_POST['capacidadAula']) ? '' : 'La capacidad es requerida';
        echo json_encode($response);
        exit;
    }

    try {
        $nombre = trim($_POST['nombreAula']);
        $grado = $_POST['gradoAula'];
        $capacidad = $_POST['capacidadAula'];

        // Originales enviados desde JS
        $originalNombre = $_POST['original_nombre'] ?? '';
        $originalCapacidad = $_POST['original_capacidad'] ?? '';

        // Validar el grado
        $stmtGrado = $pdo->prepare("SELECT id FROM grados WHERE id_grado = :id_grado");
        $stmtGrado->bindValue(':id_grado', $grado, PDO::PARAM_STR);
        $stmtGrado->execute();
        $grado = $stmtGrado->fetch(PDO::FETCH_ASSOC);

        if (!$grado) {
            $response['errores']['grado'] = 'Grado no válido';
            echo json_encode($response);
            exit;
        }

        // Validar capacidad solo si cambió
        if ($capacidad !== $originalCapacidad) {
            $stmtCapacidad = $pdo->prepare("SELECT capacidad FROM aulas WHERE id_grado = :id_grado LIMIT 1");
            $stmtCapacidad->bindValue(':id_grado', $grado['id'], PDO::PARAM_INT);
            $stmtCapacidad->execute();
            $aulaExistente = $stmtCapacidad->fetch(PDO::FETCH_ASSOC);

            if ($aulaExistente && $aulaExistente['capacidad'] != $capacidad) {
                $response['errores']['capacidad'] = 'La capacidad ingresada (' . $capacidad . ') es distinta a la ya asignada (' . $aulaExistente['capacidad'] . ')';
            }
        }

        // Validar nombre solo si cambió
        if ($nombre !== $originalNombre) {
            $stmtNombre = $pdo->prepare("SELECT nombre FROM aulas WHERE nombre = :nombre LIMIT 1");
            $stmtNombre->bindValue(':nombre', $nombre, PDO::PARAM_STR);
            $stmtNombre->execute();

            if ($stmtNombre->rowCount() > 0) {
                $response['errores']['nombre'] = 'El nombre del aula ya existe';
            }
        }

        if (empty($response['errores']['nombre']) && empty($response['errores']['capacidad']) && empty($response['errores']['grado'])) {
            $response['valido'] = true;
        }
    } catch (PDOException $e) {
        $response['error'] = "Error en la base de datos: " . $e->getMessage();
    }
} else {
    $response['error'] = "Método no permitido";
}

echo json_encode($response);
exit;
