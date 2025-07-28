<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../../Configuration/Configuration.php");

header('Content-Type: text/html; charset=utf-8'); // Asegurar el tipo de contenido

$grado = $_POST['gradosS'] ?? null;
$anioEscolar = $_POST['anioS'] ?? null;

try {
    if (!$grado || !$anioEscolar) {
        throw new Exception('No se especificó grado y/o año escolar');
    }

    // Consulta con JOIN para traer datos de inscripciones con estudiante
    $sql = "SELECT DISTINCT e.id, e.cedula_est, e.nombres_est, e.apellidos_est, i.anio_escolar, i.grado
FROM inscripciones i
INNER JOIN estudiantes e ON i.id_estudiante = e.id
WHERE i.grado = :grado AND i.anio_escolar = :anioEscolar";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':grado', $grado, PDO::PARAM_INT);
    $stmt->bindParam(':anioEscolar', $anioEscolar, PDO::PARAM_STR);
    $stmt->execute();
    $planillas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($planillas)) {
        echo '<div class="alert alert-info">No se encontraron planillas de inscripción para este grado y año escolar</div>';
        exit;
    }

    // Construir la tabla HTML
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

    foreach ($planillas as $planilla) {
        $html .= '<tr>
    <td>' . htmlspecialchars($planilla['cedula_est']) . '</td>
    <td>' . htmlspecialchars($planilla['nombres_est']) . '</td>
    <td>' . htmlspecialchars($planilla['apellidos_est']) . '</td>
    <td>' . htmlspecialchars($planilla['anio_escolar']) . '</td>
    <td>' . htmlspecialchars($planilla['grado']) . '° Grado</td>
    <td class="text-center">
        <input type="checkbox" class="form-check-input planilla-check" 
               name="planillas_seleccionadas[]" 
               value="' . htmlspecialchars($planilla['id']) . '">
    </td>
</tr>';
    }

    $html .= '</tbody></table></div>';

    echo $html;
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
}
