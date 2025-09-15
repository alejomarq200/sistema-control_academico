<?php
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = true;

    $multiStepGradoPr = array(
        htmlspecialchars($_POST['cedulaProfesor-custom']),
        htmlspecialchars($_POST['grado-custom'])
    );

    function reronarIdProfesor($pdo, $multiStepGradoPr)
    {

        try {
            // Preparar la consulta para obtener solo id_materia
            $stmt = $pdo->prepare("SELECT id_profesor FROM profesores WHERE cedula = :cedula");
            $stmt->bindValue(':cedula', $multiStepGradoPr[0]);
            $stmt->execute();

            // obtener el resultado (solo la columna id_materia)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si hay resultados, devolvemos null
            return $resultado ? $resultado['id_profesor'] : null;
        } catch (PDOException $e) {
            error_log("Error en retornarIdMateria: " . $e->getMessage());
            return null;
        }
    }

    function validarProfesorGrado($pdo, $multiStepGradoPr, $idProfesor)
    {
        try {
            $stmt = $pdo->prepare("SELECT * FROM profesor_grado WHERE id_profesor = :id_profesor AND id_grado = :id_grado");
            $stmt->bindValue(':id_profesor', $idProfesor);
            $stmt->bindValue(':id_grado', $multiStepGradoPr[1]);
            $stmt->execute();

            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; // En caso de error, asumimos que la validación falla
        }
    }

    if (empty($multiStepGradoPr[0])) {
        $validar = false;
    }

    if (empty($multiStepGradoPr[1])) {
        $validar = false;
    }

    // Si todas las validaciones pasaron
    if ($validar) {
        $idProfesor = reronarIdProfesor($pdo,$multiStepGradoPr);
        if (!empty($idProfesor)) {
            if (validarProfesorGrado($pdo, $multiStepGradoPr, $idProfesor)) {
                $mensaje = "El profesor ya ha sido asignado al grado. Verifique";
            } else {
                $mensaje = "";
            }
        }
    } else {
        $mensaje = "Rellene los campos correctamente";
    }

    echo $mensaje;
}
