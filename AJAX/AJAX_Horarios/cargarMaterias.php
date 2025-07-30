<?php
require_once "../../Configuration/Configuration.php";

header('Content-Type: text/plain'); 
try {
    // Verifica si el request es POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método no permitido');
    }

    // Verifica los parámetros
    if (!isset($_POST['idgrado'])) {
        throw new Exception('Parámetro idgrado faltante');
    }

    $id_grado = trim($_POST['idgrado']);


    if ($id_grado === '') {
        throw new Exception('El ID de grado está vacío');
    }

    if (!is_numeric($id_grado)) {
        throw new Exception('ID de grado no es numérico. Valor recibido: ' . $id_grado);
    }

    // Definir parametro para mejor manejo
    $stmt = $pdo->prepare("SELECT m.nombre, m.id_materia, pmg.id_materia 
                                  FROM materias m
                                  INNER JOIN profesor_materia_grado pmg
                                  ON m.id_materia = pmg.id_materia WHERE id_grado = :id_grado");
    $stmt->bindValue(':id_grado', (int)$id_grado, PDO::PARAM_INT);
    $stmt->execute();

    $options = '';
    if ($stmt->rowCount() > 0) {
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $options .= '<option value="' . htmlspecialchars($fila["id_materia"]) . '">' .
                htmlspecialchars($fila["nombre"]) . '</option>';
        }
    } else {
        $options = '<option value="">No hay materias para este grado</option>';
    }
    echo $options;
} catch (PDOException $e) {
    echo '<option value="">Error en base de datos: ' . htmlspecialchars($e->getMessage()) . '</option>';
} catch (Exception $e) {
    echo '<option value="">Error: ' . htmlspecialchars($e->getMessage()) . '</option>';
}
