<?php
header('Content-Type: application/json');
require_once "../../Configuration/Configuration.php";

try {
    // Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido', 405);
    }

    // Verificar acción
    if (!isset($_POST['action']) || $_POST['action'] !== 'consultar_horario') {
        throw new Exception('Acción no especificada', 400);
    }

    // Validar parámetros requeridos
    $camposRequeridos = ['anio_escolar', 'id_grado'];
    foreach ($camposRequeridos as $campo) {
        if (!isset($_POST[$campo])) {
            throw new Exception("Campo requerido faltante: $campo", 400);
        }
    }

    // Consulta para obtener el horario
    $stmt = $pdo->prepare("
        SELECT 
            h.id_horario,
            h.id_grado,
            h.id_aula,
            h.id_materia,
            h.id_profesor,
            h.dia_semana,
            h.hora_inicio,
            h.hora_fin,
            h.anio_escolar,
            m.nombre AS nombre_materia,
            p.nombre AS nombre_profesor,
            a.nombre AS nombre_aula
        FROM horarios h
        LEFT JOIN materias m ON h.id_materia = m.id_materia
        LEFT JOIN profesores p ON h.id_profesor = p.id_profesor
        LEFT JOIN aulas a ON h.id_aula = a.id_aula
        WHERE h.id_grado = :id_grado
        AND h.anio_escolar = :anio_escolar
        ORDER BY h.dia_semana, h.hora_inicio
    ");

    $stmt->execute([
        ':id_grado' => $_POST['id_grado'],
        ':anio_escolar' => $_POST['anio_escolar']
    ]);

    $horario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($horario)) {
        echo json_encode([
            'estado' => 'vacio',
            'mensaje' => 'No se encontró horario para los parámetros seleccionados',
            'datos' => []
        ]);
    } else {
        echo json_encode([
            'estado' => 'exito',
            'mensaje' => 'Horario cargado correctamente',
            'datos' => $horario
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        'estado' => 'error',
        'mensaje' => 'Error en la base de datos: ' . $e->getMessage(),
        'codigo' => $e->getCode()
    ]);
} catch (Exception $e) {
    echo json_encode([
        'estado' => 'error',
        'mensaje' => $e->getMessage(),
        'codigo' => $e->getCode()
    ]);
}