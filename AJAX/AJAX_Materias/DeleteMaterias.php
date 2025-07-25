<?php
session_start();
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['variable'])) { // Asegurarse que la variable esté definida
        $resultado = $_POST['variable'];
        try {
            $stmt = $pdo->prepare("DELETE FROM materias WHERE id_materia = :id_materia");

            $stmt->bindValue(':id_materia', $resultado);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['mensaje'] = 'Éxito al eliminar la materia seleccionada.';
                $_SESSION['icono'] = 'success';
                $_SESSION['titulo'] = 'Success';
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        echo $resulado;
    } else {
        echo "Error: No se recibió la variable.";
    }
}
