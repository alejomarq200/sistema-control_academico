<?php
error_reporting(0);
include("../../Configuration/Configuration.php");
$grado = $_POST['gradoModal'] ?? null;
$anioEscolar = $_POST['anioModal'] ?? null;

try {
    if (!$grado) {
        throw new Exception('No se especificó el grado');
    }

    $sql = "SELECT id, cedula_est, nombres_est, apellidos_est 
            FROM estudiantes 
            WHERE grado_est = :grado";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':grado', $grado, PDO::PARAM_INT);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT id_profesor FROM profesor_materia_grado WHERE id_grado = :id_grado";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id_grado', $grado, PDO::PARAM_INT);
    $stmt->execute();
    $resultProfesor = $stmt->fetch(PDO::FETCH_ASSOC);
    $resultProfesor['id_profesor'];

    // Devolver HTML directamente
    if (empty($estudiantes)) {
        echo '<div class="alert alert-info">No se encontraron estudiantes para este grado</div>';
    } else {
        echo '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>';
        echo '<input type="hidden" id="idProfesorGlobal" value="' . htmlspecialchars($resultProfesor['id_profesor']) . '">';

        foreach ($estudiantes as $estudiante) {
            echo '<tr>
                    <td>'.htmlspecialchars($estudiante['cedula_est']).'</td>
                    <td>'.htmlspecialchars($estudiante['nombres_est']).'</td>
                    <td>'.htmlspecialchars($estudiante['apellidos_est']).'</td>
                    <td class="text-center">
                        <input type="checkbox" class="form-check-input estudiante-check" 
                               data-id="'.htmlspecialchars($estudiante['id']).'">
                    </td>
                  </tr>';
        }
        
        echo '</tbody></table>';
    }

} catch (Exception $e) {
    echo '<div class="alert alert-danger">Error: '.htmlspecialchars($e->getMessage()).'</div>';
}