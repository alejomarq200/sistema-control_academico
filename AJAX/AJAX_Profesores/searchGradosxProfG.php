<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");
include("../../Configuration/functions_php/functionsCRUDProfesor.php");
/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    function retornarIdProfesor($pdo, $variable)
    {

        try {
            // Preparamos la consulta para obtener solo id_materia
            $stmt = $pdo->prepare("SELECT id_profesor FROM profesores WHERE cedula = :cedula");
            $stmt->bindValue(':cedula', $variable);
            $stmt->execute();

            // Obtenemos el resultado (solo la columna id_materia)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si hay resultados, devolvemos el id_materia, sino null
            return $resultado ? $resultado['id_profesor'] : null;
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizarlo)
            error_log("Error en retornarIdMateria: " . $e->getMessage());
            return null;
        }
    }
    function retornarNombreMateriaxProfesor($pdo, $idGradoDeProfesor)
    {
        try {
            // Preparamos la consulta para obtener solo id_materia
            $stmt = $pdo->prepare("SELECT id_grado FROM grados WHERE id = :id");
            $stmt->bindValue(':id', $idGradoDeProfesor);
            $stmt->execute();

            // Obtenemos el resultado (solo la columna id_materia)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si hay resultados, devolvemos el id_materia, sino null
            return $resultado ? $resultado['id_grado'] : null;

        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizarlo)
            error_log("Error en retornarIdMateria: " . $e->getMessage());
            return null;
        }
    }

   if (isset($_POST['cedulaProfesorG'])) {
    $idProfesor = retornarIdProfesor($pdo, $_POST['cedulaProfesorG']);

    try {
        $stmt = $pdo->prepare("SELECT id_grado FROM profesor_grado WHERE id_profesor = :id_profesor");
        $stmt->bindValue(':id_profesor', $idProfesor);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<option value="Seleccionar">Seleccionar</option>';
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nombreGrado = retornarNombreMateriaxProfesor($pdo, $fila['id_grado']);
                echo '<option value="' . $fila["id_grado"] . '">' . htmlspecialchars($nombreGrado) . '</option>';
            }
        } else {
            echo '<option value="Error grado asignado">Categoria sin grado asignados</option>';
        }
    } catch (PDOException $e) {
        echo '<option value="Error en la consulta">Error en la consulta</option>';
    }
}


}
