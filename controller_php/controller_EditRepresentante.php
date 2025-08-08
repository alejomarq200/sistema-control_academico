<?php
session_start();

include("../Configuration/functions_php/functionsCRUDRepresentantes.php");
include("../Layout/mensajes.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function validarCampos($data, $reglas)
    {
        $errores = [];

        foreach ($reglas as $campo => $reglaCampo) {
            $valor = trim($data[$campo] ?? '');

            // Campo requerido
            if (in_array('requerido', $reglaCampo) && $valor === '') {
                $errores[$campo] = 'Este campo es obligatorio.';
                continue;
            }

            // Validación por tipo
            foreach ($reglaCampo as $regla) {
                if ($valor === '')
                    continue; // Evitar más validaciones si está vacío y no es requerido

                if ($regla === 'entero' && !ctype_digit($valor)) {
                    $errores[$campo] = 'Debe ser un número entero.';
                }

                if ($regla === 'texto' && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $valor)) {
                    $errores[$campo] = 'Debe contener solo letras.';
                }

                if ($regla === 'fecha' && !preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $valor)) {
                    $errores[$campo] = 'Formato de fecha inválido. (Ej: 2024-06-12)';
                }

                if ($regla === 'regexCedula' && !preg_match('/^[V|E][0-9]{7,9}$/', $valor)) {
                    $errores[$campo] = 'Error en el formato de la cédula. Ej: (V o E V12345678)';
                }

                if ($regla === 'correo' && !preg_match('/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/', $valor)) {
                    $errores[$campo] = 'Error en el formato del correo.';
                }

                if ($regla === 'telefono' && !preg_match('/^(0414|0424|0412|0416|0426)[0-9]{7}$/', $valor)) {
                    $errores[$campo] = 'Error en el formato del teléfono';
                }

                if ($regla === 'direccion' && !preg_match('/^.{10,}$/', $valor)) {
                    $errores[$campo] = 'Admite un mínimo de 10 digitos';
                }
            }
        }

        return $errores;
    }

    // Ejemplo de uso
    $reglas = [
        'id' => ['requerido', 'entero'],
        'cedula' => ['requerido', 'regexCedula'],
        'apellidos' => ['requerido', 'texto'],
        'nombres' => ['requerido', 'texto'],
        'fecha_nac' => ['requerido', 'fecha'],
        'correo' => ['requerido', 'correo'],
        'direccion' => ['requerido', 'direccion'],
        'nro_telefono' => ['requerido', 'telefono'],
        'grado_inst' => ['requerido'],
        'profesion' => ['requerido'],
        'trabaja' => ['requerido'],
        'nombre_empr' => ['no requerido'],
        'telefono_empr' => ['no requerido', 'telefono'],
        'direccion_empr' => ['no requerido']
    ];

    $errores = validarCampos($_POST, $reglas);

    if (!empty($errores)) {
        // Retornar errores como JSON si es una petición AJAX
        echo json_encode(['status' => 'error', 'errores' => $errores]);
        exit;
    }

    // Si pasa validación continuar con la lógica de guardado

    $array = array(
        $_POST['id'],
        $_POST['cedula'],
        $_POST['nombres'],
        $_POST['apellidos'],
        $_POST['fecha_nac'],
        $_POST['correo'],
        $_POST['direccion'],
        $_POST['nro_telefono'],
        $_POST['grado_inst'],
        $_POST['profesion'],
        $_POST['trabaja'],
        $_POST['nombre_empr'],
        $_POST['telefono_empr'],
        $_POST['direccion_empr'],
    );

    if (editarRepresentante($pdo, $array)) {
        $_SESSION['mensaje'] = 'La información del representante se modificó correctamente.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';
        header("Location: ../Desarrollo/search_representantes.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La información del representante no se modificó.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_representantes.php");
        exit();
    }
}
