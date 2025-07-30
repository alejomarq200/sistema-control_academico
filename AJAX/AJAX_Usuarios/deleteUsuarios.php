<?php
session_start();
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['variable'])) { 
        $resultado = $_POST['variable'];
       try {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindValue(':id', $resultado);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['mensaje'] = 'Éxito al eliminar el usuario seleccionada.';
                $_SESSION['icono'] = 'success';
                $_SESSION['titulo'] = 'Success';
            }
        } catch (PDOException $e) {
        }  
       echo $resulado;
    } else {
        echo "Error: No se recibió la variable.";
    }
}
