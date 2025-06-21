<?php
include("../Configuration/Configuration.php");
include("../Configuration/functions_php/functionsCRUDMaterias.php");

/* ASGINAMOS MATERIA A PARTIR DEL GRADO SELECCIONADO */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['categoriaGrado'])) {
        $nivelMateria = $_POST['categoriaGrado'];
        if ($nivelMateria != "Seleccionar") {

            try {
                // Consulta con JOIN
                $stmt = $pdo->prepare("SELECT id_materia, nombre FROM materias WHERE nivel_materia = :nivel_materia");
                $stmt->bindValue(':nivel_materia', $nivelMateria);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo '<option value="Seleccionar">Seleccionar</option>';
                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Usamos el id_materia para el value y el nombre para el texto del option
                        echo '<option value="' . $fila["id_materia"] . '">' . htmlspecialchars($fila["nombre"]) . '</option>';
                    }
                } else {
                    echo '<option value="No hay materias disponibles">No hay materias disponibles</option>';
                }
            } catch (PDOException $e) {
                echo '<option value="Error en la consulta">Error en la consulta</option>';
            }
        } else {
            echo '<option value="Seleccionar">Seleccionar</option>';
        }
    }
}
