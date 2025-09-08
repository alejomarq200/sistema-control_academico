<?php
include("../../Configuration/Configuration.php");

header('Content-Type: application/json');

$id_estudiante = $_POST['id_estudiante'] ?? null;
$grado_actual = $_POST['id_grado'] ?? null;

if (!$id_estudiante || !$grado_actual) {
    echo json_encode(['error' => 'Datos inválidos']);
    exit;
}

try {
    // 1. Verificar grado válido
    $grados_validos = ['1er año', '2do año', '3er año', '4to año', '5to año'];
    if (!in_array($grado_actual, $grados_validos)) {
        echo json_encode(['error' => 'Grado no válido para secundaria']);
        exit;
    }

    // 2. Obtener materias del grado
    $stmtMaterias = $pdo->prepare("
        SELECT pmg.id_materia, m.nombre AS nombre_materia
        FROM profesor_materia_grado pmg
        JOIN materias m ON pmg.id_materia = m.id_materia
        WHERE pmg.id_grado = (
            SELECT id FROM grados WHERE id_grado = :grado_actual
        )
    ");
    $stmtMaterias->execute([':grado_actual' => $grado_actual]);
    $materias_grado = $stmtMaterias->fetchAll(PDO::FETCH_ASSOC);

    if (empty($materias_grado)) {
        echo json_encode(['error' => 'No se encontraron materias para este grado']);
        exit;
    }

    // 3. Verificar calificaciones
    $materias_con_calificaciones_pendientes = [];
    $materias_pendientes_academicamente = [];
    $materias_aprobadas = [];
    
    foreach ($materias_grado as $materia) {
        $id_materia = $materia['id_materia'];
        
        // Verificar calificaciones por lapso
        $stmtLapsos = $pdo->prepare("
            SELECT 
                lapso_academico,
                COUNT(id) AS total_calificaciones,
                AVG(calificacion) AS promedio_lapso
            FROM calificaciones
            WHERE 
                id_estudiante = :id_estudiante AND 
                id_materia = :id_materia AND
                id_grado = (SELECT id FROM grados WHERE id_grado = :grado_actual)
            GROUP BY lapso_academico
        ");
        $stmtLapsos->execute([
            ':id_estudiante' => $id_estudiante,
            ':id_materia' => $id_materia,
            ':grado_actual' => $grado_actual
        ]);
        $lapsos = $stmtLapsos->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si tiene los 3 lapsos completos
        if (count($lapsos) < 3) {
            $materias_con_calificaciones_pendientes[] = [
                'id_materia' => $id_materia,
                'nombre_materia' => $materia['nombre_materia'],
                'motivo' => 'Faltan calificaciones en uno o más lapsos'
            ];
            continue;
        }

        // Calcular promedio final
        $suma_promedios = 0;
        foreach ($lapsos as $lapso) {
            $suma_promedios += $lapso['promedio_lapso'];
        }
        $promedio_final = $suma_promedios / 3;

        if ($promedio_final < 10) {
            $materias_pendientes_academicamente[] = [
                'id_materia' => $id_materia,
                'nombre_materia' => $materia['nombre_materia'],
                'promedio_final' => round($promedio_final, 2),
                'motivo' => 'Promedio insuficiente'
            ];
        } else {
            $materias_aprobadas[] = [
                'id_materia' => $id_materia,
                'nombre_materia' => $materia['nombre_materia'],
                'promedio_final' => round($promedio_final, 2)
            ];
        }
    }

    // 4. Verificar materias pendientes registradas en el sistema
    $stmtMateriasPendientes = $pdo->prepare("
        SELECT mp.id_materia, m.nombre AS nombre_materia
        FROM materias_pendientes mp
        JOIN materias m ON mp.id_materia = m.id_materia
        WHERE mp.id_estudiante = :id_estudiante 
        AND mp.id_grado = (SELECT id FROM grados WHERE id_grado = :grado_actual)
    ");
    $stmtMateriasPendientes->execute([
        ':id_estudiante' => $id_estudiante,
        ':grado_actual' => $grado_actual
    ]);
    $materias_pendientes_registradas = $stmtMateriasPendientes->fetchAll(PDO::FETCH_ASSOC);

    // 5. Determinar si puede ser promovido
    $bloqueo_calificaciones = !empty($materias_con_calificaciones_pendientes);
    $bloqueo_academico = count($materias_pendientes_academicamente) > 1;
    $bloqueo_registros = !empty($materias_pendientes_registradas) > 2;

    $puede_ser_promovido = !$bloqueo_calificaciones && !$bloqueo_academico && !$bloqueo_registros;

    if ($puede_ser_promovido) {
        // Determinar siguiente grado
        $siguiente_grado = '';
        switch ($grado_actual) {
            case '1er año': $siguiente_grado = '2do año'; break;
            case '2do año': $siguiente_grado = '3er año'; break;
            case '3er año': $siguiente_grado = '4to año'; break;
            case '4to año': $siguiente_grado = '5to año'; break;
            case '5to año': $siguiente_grado = 'Graduado'; break;
        }

        // Actualizar grado del estudiante
        $stmtUpdate = $pdo->prepare("
            UPDATE estudiantes 
            SET grado_est = (SELECT id FROM grados WHERE id_grado = :siguiente_grado)
            WHERE id = :id_estudiante
        ");
        $stmtUpdate->execute([
            ':siguiente_grado' => $siguiente_grado,
            ':id_estudiante' => $id_estudiante
        ]);

        echo json_encode([
            'estado' => 'promovido',
            'nuevo_grado' => $siguiente_grado,
            'materias_aprobadas' => $materias_aprobadas,
            'materias_con_calificaciones_pendientes' => $materias_con_calificaciones_pendientes,
            'materias_pendientes_academicamente' => $materias_pendientes_academicamente,
            'materias_pendientes_registradas' => $materias_pendientes_registradas
        ]);
    } else {
        $motivos = [];
        if ($bloqueo_calificaciones) $motivos[] = 'Materias con calificaciones pendientes';
        if ($bloqueo_academico) $motivos[] = 'Más de 2 materias pendientes académicamente';
        if ($bloqueo_registros) $motivos[] = 'Materias pendientes registradas en el sistema';

        echo json_encode([
            'estado' => 'pendiente',
            'motivos' => $motivos,
            'materias_aprobadas' => $materias_aprobadas,
            'materias_con_calificaciones_pendientes' => $materias_con_calificaciones_pendientes,
            'materias_pendientes_academicamente' => $materias_pendientes_academicamente,
            'materias_pendientes_registradas' => $materias_pendientes_registradas
        ]);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error en la base de datos: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}