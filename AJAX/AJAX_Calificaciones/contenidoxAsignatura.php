<?php
include("../../Configuration/Configuration.php");

if (isset($_POST['materias'])) {
    $contenido = $_POST['materias'];

    try {
        // DISTINCT para diferenciar la columna repetida en la base de datos
        $stmt = $pdo->prepare("SELECT DISTINCT (tipo_contenido) FROM actividades WHERE id_materia = :id_materia");
        $stmt->bindValue(':id_materia', $contenido);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<option value="Seleccionar">Seleccionar</option>';
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . htmlspecialchars($fila["tipo_contenido"]) . '">'
                    . htmlspecialchars($fila["tipo_contenido"]) . '</option>';
            }
        } else {
            echo '<option value="Error grado asignado">Asignatura sin docente asignado</option>';
        }
    } catch (PDOException $e) {
        echo '<option value="Error en la consulta">Error en la consulta: ' . htmlspecialchars($e->getMessage()) . '</option>';
    }
}