<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['categoriaGrado'])) {
        $categoria = $_POST['categoriaGrado'];
        if ($categoria == "Primaria" || $categoria == "Secundaria") {
            try {
                // Consulta SQL
                $stmt = $pdo->prepare("SELECT id, id_grado FROM grados WHERE categoria_grado = :categoria_grado");
                // Ejecutar la consulta
                $stmt->bindValue(':categoria_grado', $categoria);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo '<option value="Seleccionar">Seleccionar</option>';
                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Usamos el id_materia para el value y el nombre para el texto del option
                        echo '<option value="' . $fila["id"] . '">' . htmlspecialchars($fila["id_grado"]) . '</option>';
                    }
                } else {
                    echo '<option value="Error grado asignado">Categoria sin grado asignados</option>';
                }
            } catch (PDOException $e) {
                echo '<option value="Error en la consulta">Error en la consulta</option>';
            }
        } else {
            echo '<option value="Seleccionar">Seleccionar</option>';
        }
    } 
}
