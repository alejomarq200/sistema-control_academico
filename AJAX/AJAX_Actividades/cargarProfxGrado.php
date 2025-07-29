<?php
require_once "../../Configuration/Configuration.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos si es para cargar los grados
    if (isset($_POST['action']) && $_POST['action'] === 'cargar_profesores') {
        try {
           // Consulta para obtener el id de la materia
            $stmt = $pdo->prepare('SELECT id_materia FROM materias WHERE nombre = :nombre');
            $stmt->bindValue(':nombre', $_POST['materia'], PDO::PARAM_STR);
            $stmt->execute();
            $resultadoMateria = $stmt->fetch(PDO::FETCH_ASSOC);

            // Validar si se encontró la materia
            if (!$resultadoMateria) {
                throw new Exception("No se encontró la materia especificada");
            }

            // Consulta para obtener profesores
            $stmt = $pdo->prepare("SELECT p.nombre, p.id_profesor, pmg.id_profesor 
                          FROM profesores p
                          INNER JOIN profesor_materia_grado pmg
                          ON p.id_profesor = pmg.id_profesor 
                          WHERE pmg.id_grado = :id_grado AND pmg.id_materia = :id_materia");
            $stmt->bindValue(':id_grado', $_POST['idgrado'], PDO::PARAM_INT);
            $stmt->bindValue(':id_materia', $resultadoMateria['id_materia'], PDO::PARAM_INT);
            $stmt->execute();

            $options = '';
            if ($stmt->rowCount() > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options .= '<option value="' . htmlspecialchars($fila["id_profesor"]) . '">' .
                        htmlspecialchars($fila["nombre"]) . '</option>';
                }
            } else {
                $options = '<option value="">No hay profesores disponibles para esta combinación</option>';
            }
            echo $options;
        } catch (PDOException $e) {
            error_log("Error en cargarProfesores: " . $e->getMessage());
            echo '<option value="">Error al cargar profesores</option>';
        } catch (Exception $e) {
            error_log("Validación fallida en cargarProfesores: " . $e->getMessage());
            echo '<option value="">' . htmlspecialchars($e->getMessage()) . '</option>';
        }
    }
}
