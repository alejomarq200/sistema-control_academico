<?php
function consultarInscripcionesUnificadas($pdo)
{
    $sql = "SELECT 
                i.id_estudiante,
                e.nombres_est,
                e.apellidos_est,
                e.cedula_est,
                e.edad_est,
                e.sexo,
                e.grado_est AS grado_estudiante,
                g.categoria_grado,
                g.id_grado,
                i.anio_escolar,
                i.fecha_inscripcion,
                r.nombres AS rep_nombre,
                r.apellidos AS rep_apellido,
                r.id AS rep_id
            FROM inscripciones i
            LEFT JOIN estudiantes e ON i.id_estudiante = e.id
            LEFT JOIN representantes r ON i.id_representante = r.id
            LEFT JOIN grados g ON i.grado = g.id
            ORDER BY i.id_estudiante";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Agrupamos por estudiante
    $resultados = [];
    foreach ($rows as $row) {
        $id_est = $row['id_estudiante'];
        if (!isset($resultados[$id_est])) {
            $resultados[$id_est] = [
                'id_estudiante' => $row['id_estudiante'],
                'nombres_est' => $row['nombres_est'],
                'apellidos_est' => $row['apellidos_est'],
                'cedula_est' => $row['cedula_est'],
                'edad_est' => $row['edad_est'],
                'sexo' => $row['sexo'],
                'grado' => $row['id_grado'],
                'anio_escolar' => $row['anio_escolar'],
                'fecha_inscripcion' => $row['fecha_inscripcion'],
                'representante1' => $row['rep_nombre'] . ' ' . $row['rep_apellido'],
                'representante2' => '', // por ahora vacío
                'grado_estudiante' => $row['grado_estudiante'],
            ];
        } else {
            // Asignar segundo representante si existe
            $resultados[$id_est]['representante2'] = $row['rep_nombre'] . ' ' . $row['rep_apellido'];
        }
    }

    return array_values($resultados); // Reindexar el array
}

function cargarAniosEscolares($pdo)
{
    $stmt = $pdo->query("SELECT DISTINCT anio_escolar FROM inscripciones");

    if ($stmt && $stmt->rowCount() > 0) {
        echo '<option value="">Todos los años escolares</option>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $anio = htmlspecialchars($row['anio_escolar']);
            echo "<option value=\"$anio\">$anio</option>";
        }
    } else {
        echo '<option value="">No hay años escolares</option>';
    }
}
