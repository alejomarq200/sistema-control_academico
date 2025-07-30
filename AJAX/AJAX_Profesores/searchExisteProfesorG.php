<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    // Verifica si existe el campo y no está vacío
    $valoresGestionPr = array(trim($_POST['cedulaProfesorG']), trim($_POST['gradosG']), trim($_POST['materiasG']));
    if (!empty($valoresGestionPr[0])) {
        $validar = true;
    }

    if (!empty($valoresGestionPr[1])) {
        $validar = true;
    }

    if (!empty($valoresGestionPr[2])) {
        $validar = true;
    }

    function retornarIdProfesor($pdo, array $arreglo)
    {
        try {
            // Preparar la consulta para obtener solo id_materia
            $stmt = $pdo->prepare("SELECT id_profesor FROM profesores WHERE cedula = :cedula");
            $stmt->bindValue(':cedula', $arreglo[0]);
            $stmt->execute();

            // Obtener el resultado (solo la columna id_materia)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si hay resultados null
            return $resultado ? $resultado['id_profesor'] : null;
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizarlo)
            error_log("Error en retornarIdMateria: " . $e->getMessage());
            return null;
        }
    }


    if ($validar) {

        $idProfesor = retornarIdProfesor($pdo, $valoresGestionPr);
        
        try {
            $stmt = $pdo->prepare("SELECT * FROM profesor_materia_grado WHERE id_profesor = :id_profesor AND id_materia = :id_materia AND id_grado =:id_grado");
            $stmt->bindValue(':id_profesor', $idProfesor);
            $stmt->bindValue(':id_materia', $valoresGestionPr[2]);
            $stmt->bindValue(':id_grado', $valoresGestionPr[1]);
            $stmt->execute();

            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if ($stmt->rowCount() > 0) {
                $mensaje = "Existe una profesor con el mismo grado y materia asignada. Verifique";
            } else {
                $mensaje = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $mensaje = ""; // En caso de error, asumimos que la validación falla
        }
    }
    echo $mensaje;
}