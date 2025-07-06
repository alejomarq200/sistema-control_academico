<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['nombreGrado'])) {
        $idGrado = $_POST['nombreGrado'];

        try {
            // Consulta con JOIN para obtener el nombre de la materia
            $stmt = $pdo->prepare("
            SELECT pg.id_profesor, p.nombre , p.id_profesor
            FROM profesor_grado pg
            JOIN profesores p ON pg.id_profesor = p.id_profesor
            WHERE pg.id_grado = :id_grado
            ORDER BY p.nombre
        ");
            $stmt->bindValue(':id_grado', $idGrado);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<option value="Seleccionar">Seleccionar</option>';
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . htmlspecialchars($fila["id_profesor"]) . '">'
                        . htmlspecialchars($fila["nombre"]) . '</option>';
                }
            } else {
                echo '<option value="Error grado asignado">Docente sin asignaturas asignadas</option>';
            }
        } catch (PDOException $e) {
            echo '<option value="Error en la consulta">Error en la consulta: ' . htmlspecialchars($e->getMessage()) . '</option>';
        }
    }
 }
