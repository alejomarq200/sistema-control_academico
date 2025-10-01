<?php
include("../Configuration/functions_php/functionsCRUDGrados.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Guardamos valores en el array
    $array =
        [
            // Establecemos nombrs y reglas de validación
            'id' => [
                'valor' => $_POST['idMateriaxGrado'],
                'tipo' => true,
                'ejemplo' => 'Ej: 110, 120, 130, etc',
                'patron' => 'number'
            ],
            'nivel' => [
                'valor' => $_POST['nivelMateriaxGrado'],
                'tipo' => true,
                'ejemplo' => 'Ej: Primaria o Secundarias',
                'patron' => 'text'
            ],
            'nombre' => [
                'valor' => $_POST['nombreMateriaxGrado'],
                'tipo' => true,
                'ejemplo' => 'Ej: Ciencias, educación física, etc',
                'patron' => 'text'
            ],
            'grado' => [
                'valor' => $_POST['grado'],
                'tipo' => true,
                'ejemplo' => 'Ej: 1er grado, 2do grado, 1er año, 2do año',
                'patron' => 'number'
            ],
        ];

    // Inicializamos variables para errores y validación 
    $errores = [];
    $validar = true;

    // Iteramos sobre campos y reglas de validación
    foreach ($array as $key => $value) {
        // Validación de campos vacíos
        if (empty($value['valor']) && $value['tipo']) {
            $errores[] = 'El campo ' . $key . ' se encuentra vacío ';
            // Cambio de estado para evitar continuar
            $validar = false;
            // Validación de selección correcta (control de selects)
        } else if ($value['patron'] == 'number' && !preg_match("/^[0-9]{1,9}$/", $value['valor'])) {
            $errores[] = 'Formato inválido: Admite valores como:  ' . $value['ejemplo'];
            $validar = false;
        } else if ($value['patron'] == 'text' && !preg_match("/^[A-Za-zÑñÁÉÍÓÚÜáéíóúü\s\.,'-]+$/", $value['valor'])) {
            $errores[] = 'Formato inválido: Admite valores como:  ' . $value['ejemplo'];
            $validar = false;
        } else if ($value['valor'] == 'Seleccionar') {
            $errores[] = 'Seleccione un valor correcto para ' . $key;
            $validar = false;
        }
    }

    // Mostrar errores si los hay
    if (!$validar) {
        foreach ($errores as $error) {
            echo "<br>" . $error . "</br>";
        }
    } else {
        // Verificamos si la asignatura ya se encuentra asignada al grado
        $existente = existeProfesorGrado($pdo, $_POST['idMateriaxGrado'], $_POST['grado']);
        if ($existente) {
            $_SESSION['mensaje'] = 'La asignatura ya se encuentra asignada a este grado. ';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header('Location: ../Desarrollo/consultar_materiaDeGrados.php');
            exit();
        } else {
            // Si no existe, procedemos a registrar la asignatura al grado
            $regProfesorGrado = registrarAsignaturaGrado($pdo, $_POST['grado'], $_POST['idMateriaxGrado']);

            if ($regProfesorGrado) {
                // Mensaje si se insertó correctamente
                $_SESSION['mensaje'] = 'Asignatura asignada al grado correctamente';
                $_SESSION['icono'] = 'success';
                $_SESSION['titulo'] = 'Éxito';
                header('Location: ../Desarrollo/consultar_materiaDeGrados.php');
                exit();
            } else {
                // Se muestra un error al asignar la asignatura al grado";
                $_SESSION['mensaje'] = 'Error al asignar la asignatura al grado';
                $_SESSION['icono'] = 'error';
                $_SESSION['titulo'] = 'Error';
                header('Location: ../Desarrollo/consultar_materiaDeGrados.php');
                exit();
            }
        }
    }
}