<?php
include("../Configuration/functions_php/functionsCRUDProfesor.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Guardamos valores en el array
    $array =
        [
            // Establecemos nombrs y reglas de validación
            'nivel' => [
                'valor' => $_POST['nivelMateriaxGrado'],
                'tipo' => true,
                'ejemplo' => 'Ej: Primaria o Secundarias'
            ],
            'nombre' => [
                'valor' => $_POST['nombreMateriaxGrado'],
                'tipo' => true,
                'ejemplo' => 'Ej: Ciencias, educación física, etc'
            ],
            'grado' => [
                'valor' => $_POST['grado'],
                'tipo' => true,
                'ejemplo' => 'Ej: 1er grado, 2do grado, 1er año, 2do año'
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
    }
}