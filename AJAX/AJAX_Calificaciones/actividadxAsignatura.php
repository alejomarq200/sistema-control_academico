<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['materias'])) {

        try {
            // Consulta con JOIN para obtener el nombre de la materia
            $stmt = $pdo->prepare("SELECT id_actividad, contenido FROM actividades WHERE id_materia = :id_materia");
            $stmt->bindValue(':id_materia', $_POST['materias'], PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<option value="Seleccionar">Seleccionar</option>';
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . htmlspecialchars($fila["id_actividad"]) . '">'
                        . htmlspecialchars($fila["contenido"]) . '</option>';
                }
            } else {
                echo '<option value="Error grado asignado">Asignatura sin docente asignado</option>';
            }
        } catch (PDOException $e) {
            echo '<option value="Error en la consulta">Error en la consulta: ' . htmlspecialchars($e->getMessage()) . '</option>';
        }
    }
}
