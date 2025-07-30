<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = ['', ''];
    $validar = false;

    // Verifica si existe el campo y no está vacío

    if (!empty($_POST['nombreAula'])) {
        $validar = true;
        $nombreAula = $_POST['nombreAula'];
        $grado = $_POST['gradoAula'];
        $capacidad = $_POST['capacidadAula'];

        try {
            $stmtCapacidad = $pdo->prepare("SELECT capacidad FROM aulas WHERE id_grado = :id_grado");
            $stmtCapacidad->bindValue(':id_grado', $grado);
            $stmtCapacidad->execute();
            $resultado = $stmtCapacidad->fetch(PDO::FETCH_ASSOC);
            if ($stmtCapacidad->rowCount() > 0) {
                if ($capacidad != $resultado['capacidad']) {
                   $errores[1] = 'La capacidad ingresada es distinta a la registrada en un aula del mismo grado (' . $resultado['capacidad'] . '). Verifique';
                }
            } else {
                $errores[1] = "";
            }

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
            $errores[0] = ""; // En caso de error la validación falla
        }
    }

    echo implode('|||', $errores);
    exit;
}
