<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    if (!empty($_POST['categoriaGrado'])) {
        $validar = true;
        $categoria = $_POST['categoriaGrado'];
    }

    if (!empty($_POST['nombreGrado'])) {
        $validar = true;
        $grado = $_POST['nombreGrado'];
    }

       if (!empty($_POST['materiasxGrado'])) {
        $validar = true;
        $materiaDeGrado = $_POST['materiasxGrado'];
    }

    if ($validar) {

        $materiaDeGrado = retornarMateria($pdo, $materiaDeGrado);
    
        if (validarExisteMateriaG($pdo, $grado, $materiaDeGrado)) {
            $mensaje = "La materia ya está registrada en el grado. Verifique";
        } else {
            $mensaje = "";
        }

    }
    echo $mensaje;
}

//Funciones incorporadas para validación de materias
function validarExisteMateriaG($pdo, $grado, $materiaDeGrado)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM grado_materia WHERE id_grado = :id_grado AND id_materia= :id_materia");
        $stmt->bindValue(':id_grado', $grado);
        $stmt->bindValue(':id_materia', $materiaDeGrado);
        $stmt->execute();

        // Retornar true si no existe (validación pasa), false si existe (validación falla)
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//Retornar id directo
function retornarMateria($pdo, $materiaDeGrado) {
    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id_materia FROM materias WHERE nombre = :nombre");
        $stmt->bindValue(':nombre', $materiaDeGrado);
        $stmt->execute();

        // Obtenemos el resultado (solo la columna id_materia)
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si hay resultados, devolvemos el id_materia, sino null
        return $resultado ? $resultado['id_materia'] : null;
        
    } catch (PDOException $e) {
        // Manejo de errores (puedes personalizarlo)
        error_log("Error en retornarIdMateria: " . $e->getMessage());
        return null;
    }
}