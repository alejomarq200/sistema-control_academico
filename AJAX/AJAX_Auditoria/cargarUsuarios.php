<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'cargar_usuarios') {
        try {
            // Consulta SQL
            $stmt = $pdo->prepare("SELECT id, correo FROM users");
            // Retornmos valor
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Usamos el id_materia para el value y el nombre para el texto del option
                    echo '<option value="' . $fila["correo"] . '">' . htmlspecialchars($fila["correo"]) . '</option>';
                }
            } else {
                echo '<option value="Error usuarios">No existen usuarios</option>';
            }
        } catch (PDOException $e) {
            echo '<option value="Error en la consulta">Error en la consulta</option>';
        }
    } else {
        echo '<option value="Seleccionar">Seleccionar</option>';
    }
}
