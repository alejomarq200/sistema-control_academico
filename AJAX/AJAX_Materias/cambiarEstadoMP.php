<?php
session_start();
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['idEstudiante'])) { // Asegurarse que la variable esté definida
        $resultado = $_POST['idEstudiante'];
       try {
        //Ejecutar update
            $stmt = $pdo->prepare("UPDATE materias_pendientes SET estado = :estado WHERE id_estudiante = :id_estudiante");
            $stmt->bindValue(':estado', 'repetida');
            $stmt->bindValue(':id_estudiante', $resultado, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['mensaje'] = 'Éxito al cambiar el estado de la materia pendiente.';
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
