<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function retornarNombreMateriaxGrado($pdo, $idMateriadeGrado)
    {
        try {
            // Preparamos la consulta para obtener solo id_materia
            $stmt = $pdo->prepare("SELECT nombre FROM materias WHERE id_materia = :id_materia");
            $stmt->bindValue(':id_materia', $idMateriadeGrado);
            $stmt->execute();

            // Obtenemos el resultado (solo la columna id_materia)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si hay resultados, devolvemos el id_materia, sino null
            return $resultado ? $resultado['nombre'] : null;

        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizarlo)
            error_log("Error en retornarIdMateria: " . $e->getMessage());
            return null;
        }
    }

    if (isset($_POST['gradosG'])) {
        $idGrado = $_POST['gradosG'];
        
        try {
            $stmt = $pdo->prepare("SELECT id_materia FROM grado_materia WHERE id_grado = :id_grado");
            $stmt->bindValue(':id_grado', $idGrado);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<option value="Seleccionar">Seleccionar</option>';
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $nombreMateria = retornarNombreMateriaxGrado($pdo, $fila["id_materia"]);
                    echo '<option value="' . $fila["id_materia"] . '">' . htmlspecialchars($nombreMateria) . '</option>';
                }
            } else {
                echo '<option value="Error grado asignado">Categoria sin grado asignados</option>';
            }
        } catch (PDOException $e) {
            echo '<option value="Error en la consulta">Error en la consulta</option>';
        }
        /*   */
    }
}
