<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../../Configuration/Configuration.php");

header('Content-Type: text/html; charset=utf-8');

$grado = $_POST['gradosS'] ?? null;
$anioEscolar = $_POST['anioS'] ?? null;

try {
    if (!$grado || !$anioEscolar) {
        throw new Exception('No se especificó grado y/o año escolar');
    }

    // Consulta mejorada con JOIN para todos los datos relevantes
    $sql = "SELECT DISTINCT
                e.id, 
                e.cedula_est, 
                e.nombres_est, 
                e.apellidos_est, 
                i.anio_escolar, 
                g.categoria_grado AS nombre_grado
            FROM inscripciones i
            INNER JOIN estudiantes e ON i.id_estudiante = e.id
            INNER JOIN grados g ON i.grado = g.id
            WHERE i.grado = :grado AND i.anio_escolar = :anioEscolar
            ORDER BY e.apellidos_est, e.nombres_est";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':grado', $grado, PDO::PARAM_INT);
    $stmt->bindParam(':anioEscolar', $anioEscolar, PDO::PARAM_STR);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($estudiantes)) {
        echo '<div class="alert alert-info">No se encontraron estudiantes para este grado y año escolar</div>';
        exit;
    }

    // Construir tabla HTML
    $html = '<div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Año Escolar</th>
                            <th>Grado</th>
                            <th class="text-center">Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>';

    foreach ($estudiantes as $estudiante) {
        $html .= '<tr>
                    <td>' . htmlspecialchars($estudiante['cedula_est']) . '</td>
                    <td>' . htmlspecialchars($estudiante['nombres_est']) . '</td>
                    <td>' . htmlspecialchars($estudiante['apellidos_est']) . '</td>
                    <td>' . htmlspecialchars($estudiante['anio_escolar']) . '</td>
                    <td>' . htmlspecialchars($estudiante['nombre_grado']) . '</td>
                    <td class="text-center">
                        <input type="checkbox" class="form-check-input planilla-check1" 
                               name="planillas_seleccionadas_retiro[]" 
                               value="' . htmlspecialchars($estudiante['id']) . '">
                    </td>
                </tr>';
    }

    $html .= '</tbody></table></div>';

    echo $html;
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
}
?>