<?php
include("../Configuration/Configuration.php");

function consultarEstudiantes($pdo) {
    try {
        $stmt = $pdo->prepare("
            SELECT e.*, g.id_grado 
            FROM estudiantes e
            INNER JOIN grados g ON e.grado_est = g.id
        ");
        $stmt->execute();

        $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $estudiantes ?: [];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function editarEstudiante($pdo, array $data)
{
    try {
        $stmt = $pdo->prepare("UPDATE estudiantes SET 
                cedula_est = :cedula_est,
                nombres_est = :nombres_est,
                apellidos_est = :apellidos_est,
                sexo = :sexo,
                f_nacimiento_est = :f_nacimiento_est,
                edad_est = :edad_est,
                direccion_est = :direccion_est,
                lugar_nac_est = :lugar_nac_est,
                colegio_ant_est = :colegio_ant_est,
                motivo_ret_est = :motivo_ret_est,
                nivelacion_est = :nivelacion_est,
                explicacion_est = :explicacion_est,
                grado_est = :grado_est,
                turno_est = :turno_est,
                problem_resp_est = :problem_resp_est,
                alergias_est = :alergias_est,
                vacunas_est = :vacunas_est,
                enfermedad_est = :enfermedad_est
                WHERE id = :id
        ");

        $stmt->bindValue(':cedula_est', $data[1]);
        $stmt->bindValue(':nombres_est', $data[2]);
        $stmt->bindValue(':apellidos_est', $data[3]);
        $stmt->bindValue(':sexo', $data[4]);
        $stmt->bindValue(':f_nacimiento_est', $data[5]);
        $stmt->bindValue(':edad_est', $data[6]);
        $stmt->bindValue(':direccion_est', $data[7]);
        $stmt->bindValue(':lugar_nac_est', $data[8]);
        $stmt->bindValue(':colegio_ant_est', $data[9]);
        $stmt->bindValue(':motivo_ret_est', $data[10]);
        $stmt->bindValue(':nivelacion_est', $data[11]);
        $stmt->bindValue(':explicacion_est', $data[12]);
        $stmt->bindValue(':grado_est', $data[13]);
        $stmt->bindValue(':turno_est', $data[14]);
        $stmt->bindValue(':problem_resp_est', $data[15]);
        $stmt->bindValue(':alergias_est', $data[16]);
        $stmt->bindValue(':vacunas_est', $data[17]);
        $stmt->bindValue(':enfermedad_est', $data[18]);
        $stmt->bindValue(':id', $data[0]);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false; // Si no se modificó ninguna fila
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function obtenerCalificacionesAgrupadas($pdo, $idEstudiante = null) {
    try {
        $sql = "
            SELECT 
                id,
                año_escolar,
                id_grado,
                lapso_academico,
                id_profesor,
                id_materia,
                id_estudiante,
                calificacion,
                total_calificacion
            FROM calificaciones
        ";

        if ($idEstudiante !== null) {
            $sql .= " WHERE id_estudiante = :idEstudiante";
        }

        $sql .= " ORDER BY id_estudiante, id_materia, id";

        $stmt = $pdo->prepare($sql);

        if ($idEstudiante !== null) {
            $stmt->bindParam(':idEstudiante', $idEstudiante, PDO::PARAM_INT);
        }

        $stmt->execute();
        $calificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $agrupadas = [];
        $maxCalifs = 0;

        foreach ($calificaciones as $calif) {
            $key = $calif['id_estudiante'].'_'.$calif['id_materia'];

            if (!isset($agrupadas[$key])) {
                $agrupadas[$key] = [
                    'año_escolar' => $calif['año_escolar'],
                    'id_grado' => $calif['id_grado'],
                    'lapso_academico' => $calif['lapso_academico'],
                    'id_profesor' => $calif['id_profesor'],
                    'id_materia' => $calif['id_materia'],
                    'id_estudiante' => $calif['id_estudiante'],
                    'calificaciones' => [],
                    'total_calificacion' => $calif['total_calificacion']
                ];
            }

            $agrupadas[$key]['calificaciones'][] = [
                'id' => $calif['id'],
                'valor' => $calif['calificacion']
            ];

            $maxCalifs = max($maxCalifs, count($agrupadas[$key]['calificaciones']));
        }

        return [
            'calificaciones' => array_values($agrupadas),
            'max_califs' => $maxCalifs
        ];

    } catch (PDOException $e) {
        error_log("Error al obtener calificaciones: " . $e->getMessage());
        return ['calificaciones' => [], 'max_califs' => 0];
    }
}


function retornarNombreEstudiante($pdo, array $estudiante)
{
    try {
        // Verificar que el rol exista en el array del usuario
        if (!isset($estudiante['id_estudiante'])) {
            return 'IdEst no definido';
        }

        $stmt = $pdo->prepare("SELECT nombres_est  FROM estudiantes WHERE id = :id");
        $stmt->bindValue(':id', $estudiante['id_estudiante']);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado['nombres_est'] : 'Estado no encontrado';
    } catch (PDOException $e) {
        error_log("Error en retornarNombreEst: " . $e->getMessage());
        return 'Error al obtener rol';
    }
}