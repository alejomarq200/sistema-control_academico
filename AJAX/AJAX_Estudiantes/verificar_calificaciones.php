<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

$id_estudiante = $_POST['id_estudiante'] ?? null;
$id_grado = $_POST['id_grado'] ?? null;

if (!$id_estudiante || !$id_grado || $id_grado < 1 || $id_grado > 6) {
    echo json_encode(['error' => 'Datos inválidos']);
    exit;
}

try {
    // 1. Obtener todas las actividades del grado
    $stmtActividades = $pdo->prepare("
        SELECT a.id_actividad, a.id_materia, m.nombre AS nombre_materia
        FROM actividades a
        JOIN materias m ON a.id_materia = m.id_materia
        WHERE a.id_grado = :id_grado AND a.id_estado = 2
    ");
    $stmtActividades->execute([':id_grado' => $id_grado]);
    $actividades = $stmtActividades->fetchAll(PDO::FETCH_ASSOC);

    // 2. Obtener calificaciones del estudiante
    $stmtCalificaciones = $pdo->prepare("
        SELECT c.id_materia, COUNT(c.id) AS calificaciones_count, AVG(c.calificacion) AS promedio_materia
        FROM calificaciones c
        WHERE c.id_estudiante = :id_estudiante AND c.id_grado = :id_grado
        GROUP BY c.id_materia
    ");
    $stmtCalificaciones->execute([
        ':id_estudiante' => $id_estudiante,
        ':id_grado' => $id_grado
    ]);
    $calificaciones = $stmtCalificaciones->fetchAll(PDO::FETCH_ASSOC);

    // 3. Verificar materias con actividades faltantes
    $materiasPendientes = [];
    $promedios = [];
    $todasAprobadas = true;

    // Agrupar actividades por materia
    $actividadesPorMateria = [];
    foreach ($actividades as $actividad) {
        $id_materia = $actividad['id_materia'];
        if (!isset($actividadesPorMateria[$id_materia])) {
            $actividadesPorMateria[$id_materia] = [
                'nombre_materia' => $actividad['nombre_materia'],
                'total_actividades' => 0
            ];
        }
        $actividadesPorMateria[$id_materia]['total_actividades']++;
    }

    // Verificar cada materia
    foreach ($actividadesPorMateria as $id_materia => $materia) {
        $calificacionMateria = array_filter($calificaciones, function ($c) use ($id_materia) {
            return $c['id_materia'] == $id_materia;
        });

        $calificacionMateria = reset($calificacionMateria);

        if (!$calificacionMateria || $calificacionMateria['calificaciones_count'] < $materia['total_actividades']) {
            $todasAprobadas = false;
            $materiasPendientes[] = [
                'id_materia' => $id_materia,
                'nombre_materia' => $materia['nombre_materia'],
                'actividades_faltantes' => $materia['total_actividades'] - ($calificacionMateria['calificaciones_count'] ?? 0)
            ];
        } else {
            $promedios[$id_materia] = (float)$calificacionMateria['promedio_materia'];
        }
    }

    // 4. Determinar respuesta
    if ($todasAprobadas && !empty($promedios)) {
        // Calcular promedio general
        $nuevoGrado = $id_grado + 1;

        // Actualizar grado del estudiante
        $stmtUpdate = $pdo->prepare("
            UPDATE estudiantes SET grado_est = :nuevo_grado WHERE id = :id_estudiante
        ");
        $stmtUpdate->execute([
            ':nuevo_grado' => $nuevoGrado,
            ':id_estudiante' => $id_estudiante
        ]);

        // Consulta para obtener el nuevo grado
        $nuevo_grado = $id_grado + 1;

        $stmt = $pdo->prepare('SELECT id_grado FROM grados WHERE id = :id');
        $stmt->bindValue(':id', $nuevo_grado, PDO::PARAM_INT); // Cambiado a PARAM_INT
        $stmt->execute();

        if (!$stmt->rowCount()) {
            throw new Exception('Grado no encontrado');
        }

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $nuevoGrado = $resultado['id_grado'];

        // Asegurarse que no hay salida antes del JSON
        ob_clean();

        echo json_encode([
            'estado' => 'promovido',
            'nuevo_grado' => $nuevoGrado
        ]);
        exit;
    } else {
        echo json_encode([
            'estado' => 'pendiente',
            'materias_pendientes' => $materiasPendientes
        ]);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
}
