<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../Configuration/Configuration.php");

header('Content-Type: text/html; charset=utf-8');

// Obtener parámetros (solo necesitamos grados ahora)
$grado1 = $_POST['grado1'] ?? null;
$grado2 = $_POST['grado2'] ?? '';

try {
    // Validar parámetro obligatorio
    if (!$grado1) {
        throw new Exception('Debe especificar al menos un grado');
    }

    // Construir rango de grados
    $grados = [$grado1];
    if (!empty($grado2)) {
        $grados[] = $grado2;
    }
    $placeholders = implode(',', array_fill(0, count($grados), '?'));

    // Consulta  para secundaria
    $sql = "SELECT 
                e.id, 
                e.cedula_est, 
                e.nombres_est, 
                e.apellidos_est,
                GROUP_CONCAT(
                    DISTINCT CONCAT(c.id_grado, '° Año') 
                    ORDER BY c.id_grado SEPARATOR ' / '
                ) AS grados
            FROM calificaciones c
            INNER JOIN estudiantes e ON c.id_estudiante = e.id
            WHERE c.id_grado IN ($placeholders)
            AND c.lapso_academico IN ('1er lapso', '2do lapso', '3er lapso')
            GROUP BY e.id, e.cedula_est, e.nombres_est, e.apellidos_est
            ORDER BY e.apellidos_est, e.nombres_est";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($grados);
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($estudiantes)) {
        echo '<tr>
                <td colspan="5" class="text-center text-muted">
                    <i class="bi bi-info-circle-fill"></i>
                    No se encontraron estudiantes en los grados especificados
                </td>
              </tr>';
        exit;
    }

    // Construir tabla HTML
    $html = '';
    $contador = 1;

    foreach ($estudiantes as $estudiante) {
        $html .= '<tr>
                    <td>' . $contador++ . '</td>
                    <td>' . htmlspecialchars($estudiante['cedula_est']) . '</td>
                    <td>' . htmlspecialchars($estudiante['nombres_est'] . ' ' . htmlspecialchars($estudiante['apellidos_est'])) . '</td>
                    <td>' . htmlspecialchars($estudiante['grados']) . '</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" 
                                onclick="seleccionarEstudiante(' . $estudiante['id'] . ', \'' .
                                htmlspecialchars($estudiante['nombres_est'] . ' ' . htmlspecialchars($estudiante['apellidos_est'])) . '\', \'' .
                                htmlspecialchars($estudiante['grados']) . '\')">
                            <i class="bi bi-check-lg"></i> Seleccionar
                        </button>
                    </td>
                </tr>';
    }

    echo $html;
} catch (Exception $e) {
    echo '<tr>
            <td colspan="5" class="text-center text-danger">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Error: ' . htmlspecialchars($e->getMessage()) . '
            </td>
          </tr>';
}
