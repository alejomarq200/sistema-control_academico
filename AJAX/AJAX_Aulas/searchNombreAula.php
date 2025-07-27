<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = ['', ''];
    $validar = false;

    // Verifica si existe el campo y no está vacío

    if (!empty($_POST['nombreAula'])) {
        $validar = true;
        $nombreAula = $_POST['nombreAula'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM aulas WHERE nombre = :nombre");
            $stmt->bindValue(':nombre', $nombreAula);
            $stmt->execute();

            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if ($stmt->rowCount() > 0) {
                $errores[0] = "Existe un Aula con el mismo nombre. Verifique";
            } else {
                $errores[0] = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $errores[0] = ""; // En caso de error, asumimos que la validación falla
        }
    }

    if (!empty($_POST['gradoAula'])) {
        $validar = true;
        $gradoAula = $_POST['gradoAula'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM aulas WHERE id_grado = :grado");
            $stmt->bindValue(':grado', $gradoAula);
            $stmt->execute();

            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if ($stmt->rowCount() > 0) {
                $errores[1] = "El máximo de Aulas por grado es igual a 1. Verifique";
            } else {
                $errores[1] = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $errores[1] = ""; // En caso de error, asumimos que la validación falla
        }
    }

   
    echo implode('|||', $errores);
    exit;
}
