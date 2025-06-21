<?php
session_start();

include("../Configuration/functions_php/functionsCRUDRepresentantes.php");
include("../Layout/mensajes.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function validarCamposCPago($data, $reglas)
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

                if ($regla === 'fecha' && !DateTime::createFromFormat('Y-m-d', $valor)) {
                    $errores[$campo] = 'Formato de fecha inválido. (Ej: 2024-06-12)';
                }

                if ($regla === 'sexo' && !in_array(strtoupper($valor), ['M', 'F'])) {
                    $errores[$campo] = 'Debe ser "M" o "F".';
                }

                 if ($regla === 'regexCedula' && !preg_match('/^[V|E][0-9]{7,9}$/', $valor)) {
                    $errores[$campo] = 'Error en el formato de la cédula. Ej: (V o E V12345678)';
                }
            }
        }

        return $errores;
    }

    // Ejemplo de uso
    $reglas = [
        'idContacto' => ['requerido', 'entero'],
        'cedulaContacto' => ['requerido', 'regexCedula'],
        'apellidosContacto' => ['requerido', 'texto'],
        'nombresContacto' => ['requerido', 'texto'],
        'correoContacto' => ['requerido', 'correo'],
        'direccionContacto' => ['requerido', 'text'],
        'nro_telefonoContacto' => ['requerido', 'telefono'],
        'grado_instContacto' => ['requerido'],
        'profesionContacto' => ['requerido'],
        'trabajaContacto' => ['requerido'],
        'direccion_emprContacto' => ['no requerido'],
        'nombre_emprContacto' => ['no requerido'],
        'telefono_emprContacto' => ['no requerido']
    ];

    $errores = validarCamposCPago($_POST, $reglas);

    if (!empty($errores)) {
        // Retornar errores como JSON si es una petición AJAX
        echo json_encode(['status' => 'error', 'errores' => $errores]);
        exit;
    }

    // Si pasa validación, puedes continuar con la lógica de guardado
    $array = array(
        $_POST['idContacto'],
        $_POST['cedulaContacto'],
        $_POST['nombresContacto'],
        $_POST['apellidosContacto'],
        $_POST['direccionContacto'],
        $_POST['nro_telefonoContacto'],
        $_POST['correoContacto'],
        $_POST['grado_instContacto'],
        $_POST['profesionContacto'],
        $_POST['trabajaContacto'],
        $_POST['direccion_emprContacto'],
        $_POST['nombre_emprContacto'],
        $_POST['telefono_emprContacto']
    );

    if(editarContacto($pdo , $array)) {
        header("Location: ../Desarrollo/search_c_pago.php");
        exit();
    }
   /* if (editarEstudiante($pdo, $array)) {
        $_SESSION['mensaje'] = 'La información del estudiante se modificó correctamente.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Success';
        header("Location: ../Desarrollo/search_estudiantes.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La información del estudiante no se modificó.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_estudiantes.php");
        exit();
    }*/
}