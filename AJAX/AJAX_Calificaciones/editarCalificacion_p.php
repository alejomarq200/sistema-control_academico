<?php

include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estudianteId = $_POST['estudiante_id'];
    $gradoId = $_POST['grado_id'];
    $materiaId = $_POST['materia_id'];
    $profesorId = $_POST['profesor_id'];
    $calificaciones = $_POST['calificaciones'] ?? [];

    try {
        //Edución de calificación de modal para primaria
        foreach ($calificaciones as $idCalif => $datos) {
            $valor = $datos['valor'];

            $sql = "UPDATE calificaciones 
                    SET calificacion = ?
                    WHERE id = ? AND id_estudiante = ? AND id_materia = ? AND id_grado = ? AND id_profesor = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$valor, $idCalif, $estudianteId, $materiaId, $gradoId, $profesorId]);
        }

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
