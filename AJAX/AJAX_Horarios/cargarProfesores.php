<?php
require_once "../../Configuration/Configuration.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos metodo para proceder a cargar profesor
    if (isset($_POST['action']) && $_POST['action'] === 'cargar_profesores') {
        try {
            $stmt = $pdo->prepare("SELECT p.nombre, p.id_profesor, pmg.id_profesor 
                                  FROM profesores p
                                  INNER JOIN profesor_materia_grado pmg
                                  ON p.id_profesor = pmg.id_profesor WHERE id_grado = :id_grado AND id_materia = :id_materia");
            $stmt->bindValue(':id_grado', $_POST['idgrado'], PDO::PARAM_STR);
            $stmt->bindValue(':id_materia', $_POST['materia'], PDO::PARAM_STR);
            $stmt->execute();

            $options = '';
            if ($stmt->rowCount() > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options .= '<option value="' . htmlspecialchars($fila["id_profesor"]) . '">' . 
                                htmlspecialchars($fila["nombre"]) . '</option>';
                }
            } else {
                $options = '<option value="Error">No hay profesor disponibles</option>';
            }
            echo $options;
            
        } catch (PDOException $e) {
            echo '<option value="Error">Error al cargar profesor</option>';
        }
    }
}
?>