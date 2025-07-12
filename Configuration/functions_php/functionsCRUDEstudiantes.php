<?php
include("../Configuration/Configuration.php");

function consultarEstudiantes($pdo)
{
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

function obtenerCalificacionesAgrupadas($pdo, $idEstudiante = null)
{
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

        $sql .= " ORDER BY id_estudiante, id_materia, lapso_academico, id";

        $stmt = $pdo->prepare($sql);

        if ($idEstudiante !== null) {
            $stmt->bindParam(':idEstudiante', $idEstudiante, PDO::PARAM_INT);
        }

        $stmt->execute();
        $calificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $agrupadas = [];
        $maxCalifs = 0;

        foreach ($calificaciones as $calif) {
            // Clave única por estudiante, materia y lapso
            $key = $calif['id_estudiante'] . '_' . $calif['id_materia'] . '_' . $calif['lapso_academico'];

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

            // Actualizar el máximo de calificaciones por grupo
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

function materiasPorGrado($pdo, $grado_id)
{
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) AS total_materias FROM grado_materia WHERE id_grado = :id_grado");
        $stmt->bindValue(':id_grado', $grado_id);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total_materias'];
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function obtenerValorUnico($pdo, $tabla, $columna, $columnaWhere, $valorWhere)
{
    try {
        // Validar nombres de tabla y columnas (solo caracteres permitidos en SQL)
        if (
            !preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $tabla) ||
            !preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $columna) ||
            !preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $columnaWhere)
        ) {
            throw new InvalidArgumentException("Nombres de tabla o columna no válidos");
        }

        $stmt = $pdo->prepare("SELECT `$columna` FROM `$tabla` WHERE `$columnaWhere` = :valor");
        $stmt->bindParam(':valor', $valorWhere);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado[$columna] ?? null; // Mejor retornar null que un string genérico

    } catch (PDOException $e) {
        error_log("Error en obtenerValorUnico [Tabla: $tabla, Col: $columna]: " . $e->getMessage());
        return null;
    } catch (InvalidArgumentException $e) {
        error_log("Error de validación: " . $e->getMessage());
        return null;
    }
}