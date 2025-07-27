<?php
require_once "../../Configuration/Configuration.php";
header('Content-Type: application/json');


try {
    // Verificar método POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido', 405);
    }

    // Verificar acción
    if (!isset($_POST['action']) || $_POST['action'] !== 'guardar_horario') {
        throw new Exception('Acción no especificada', 400);
    }

    // Obtener y decodificar datos
    if (!isset($_POST['datos'])) {
        throw new Exception('Datos del horario no recibidos', 400);
    }

    $datosHorario = json_decode($_POST['datos'], true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Error al decodificar JSON: ' . json_last_error_msg(), 400);
    }

    // Validar datos básicos
    $camposRequeridos = ['anio_escolar', 'nivel_educativo', 'id_grado', 'clases'];
    foreach ($camposRequeridos as $campo) {
        if (!isset($datosHorario[$campo]) || empty($datosHorario[$campo])) {
            throw new Exception("Campo requerido faltante: $campo", 400);
        }
    }

    // Iniciar transacción
    $pdo->beginTransaction();

    // Insertar cada clase del horario
    $stmtInsertar = $pdo->prepare("INSERT INTO horarios 
                                  (id_grado, id_aula, id_materia, id_profesor, 
                                   dia_semana, hora_inicio, hora_fin, anio_escolar) 
                                  VALUES 
                                  (:id_grado, :id_aula, :id_materia, :id_profesor, 
                                   :dia_semana, :hora_inicio, :hora_fin, :anio_escolar)");

    $clasesInsertadas = 0;
    foreach ($datosHorario['clases'] as $clase) {
        $stmtInsertar->execute([
            ':id_grado' => $datosHorario['id_grado'],
            ':id_aula' => $clase['id_aula'],
            ':id_materia' => $clase['id_materia'],
            ':id_profesor' => $clase['id_profesor'],
            ':dia_semana' => $clase['dia_semana'],
            ':hora_inicio' => $clase['hora_inicio'],
            ':hora_fin' => $clase['hora_fin'],
            ':anio_escolar' => $datosHorario['anio_escolar'],
        ]);
        $clasesInsertadas++;
    }

    // Confirmar transacción
    $pdo->commit();

    echo json_encode([
        'estado' => 'exito',
        'mensaje' => "Horario guardado correctamente. $clasesInsertadas clases insertadas.",
        'clases_insertadas' => $clasesInsertadas
    ]);

} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo json_encode([
        'estado' => 'error',
        'mensaje' => 'Error en la base de datos: ' . $e->getMessage(),
        'codigo' => $e->getCode()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    die(json_encode([
        'estado' => 'error',
        'mensaje' => $e->getMessage(),
        'codigo' => $e->getCode()
    ]));
}
