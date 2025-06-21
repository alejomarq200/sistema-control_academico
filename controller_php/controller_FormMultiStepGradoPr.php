<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - REGISTER PROFESOR</title>
    <link rel="stylesheet" href="../css/alerts.css">
</head>

<?php
include("../Configuration/Configuration.php");

include("../Layout/mensajes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $modalMultiStep = array(
        trim($_POST['cedulaProfesor-custom']),
        trim($_POST['nombreProfesor-custom']),
        trim($_POST['categoriaGrado-custom']),
        trim($_POST['grado-custom'])
    );

    $validar = true;

    // Procesar los datos del formulario
    $mensajes = [];

    /* Patrones para validar campos */
    $patronDni = "/^[V|E|J|P][0-9]{7,9}$/";

    /* Regex sólo letras con mínimo 2 caracteres por primer y segundo nombre: Nombre*/
    $patronName = "/^[A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}(?: [A-Za-zñÑáéíóúÁÉÍÓÚ]{2,})?$/";

    if (empty($modalMultiStep[0])) {
        $mensajes[] = "Campo cédula profesor vacio";
        $validar = false;
    } elseif (!preg_match($patronDni, $modalMultiStep[0])) {
        $mensajes[] = 'Formato inválido: Ingrese de 7 a 8 númericos y una letra al principio V o E';
        $validar = false;
    }

    if (empty($modalMultiStep[1])) {
        $mensajes[] = "Campo nombre profesor vacio";
        $validar = false;
    } elseif (!preg_match($patronName, $modalMultiStep[1])) {
        $mensajes[] = 'Formato inválido: Ingrese solo letras con espacios';
        $validar = false;
    }

    if (empty($modalMultiStep[2])) {
        $mensajes[] = "Seleccione un nivel de grado correcto";
        $validar = false;
    } elseif ($modalMultiStep[2] != "Primaria" && $modalMultiStep[2] != "Secundaria") {
        $mensajes[] = "Seleccione un nivel de grado correcto";
        $validar = false;
    }

    if (empty($modalMultiStep[3])) {
        $mensajes[] = "Seleccione un grado correcto";
        $validar = false;
    } elseif ($modalMultiStep[3] == "No asignado" || $modalMultiStep[3] == "Seleccionar" || $modalMultiStep[3] == "Error grado asignado") {
        $mensajes[] = "Seleccione una correcto correcta";
        $validar = false;
    }



    function gestionarProfesor($pdo, $modalMultiStep)
    {
        try {
            $stmt = $pdo->prepare("INSERT INTO profesor_grado (id_profesor,	id_grado) VALUES (:id_profesor, :id_grado)");
            $stmt->bindValue('id_profesor', $modalMultiStep[0]);
            $stmt->bindValue('id_grado', $modalMultiStep[3]);
            $stmt->execute();

            // Verificar si se encontró algún registro
            if ($stmt->rowCount() > 0) {
                $_SESSION['mensaje'] = 'Profesor asignado exitosamente.';
                $_SESSION['icono'] = 'success';
                $_SESSION['titulo'] = 'Success';
                header("Location: ../Desarrollo/search_grado.php");
            }
        } catch (PDOException $e) {
            echo $e->getmessage();
        }
    }
    function retornarIdProfesor($pdo, array $arreglo)
    {
        try {
            // Preparamos la consulta para obtener solo id_materia
            $stmt = $pdo->prepare("SELECT id_profesor FROM profesores WHERE cedula = :cedula");
            $stmt->bindValue(':cedula', $arreglo[0]);
            $stmt->execute();

            // Obtenemos el resultado (solo la columna id_materia)
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si hay resultados, devolvemos el id_materia, sino null
            return $resultado ? $resultado['id_profesor'] : null;
        } catch (PDOException $e) {
            // Manejo de errores (puedes personalizarlo)
            error_log("Error en retornarIdMateria: " . $e->getMessage());
            return null;
        }
    }

    if ($validar) {
        $modalMultiStep[0] = retornarIdProfesor($pdo, $modalMultiStep);

        gestionarProfesor($pdo, $modalMultiStep);
    } else {
        foreach ($mensajes as $error) {
            echo $error . "<br>";
        }
    }
}
