<?php
session_start();

include("../Configuration/functions_php/functionsCRUDEstudiantes.php");
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

                if ($regla === 'sexo' && !in_array(strtoupper($valor), ['M', 'F'])) {
                    $errores[$campo] = 'Debe ser "M" o "F".';
                }
            }
        }

        return $errores;
    }

    // Ejemplo de uso
    $reglas = [
        'idEst' => ['requerido', 'entero'],
        'cedula_est' => ['no requerido'],
        'apellidos_est' => ['requerido', 'texto'],
        'nombres_est' => ['requerido', 'texto'],
        'sexo' => ['requerido', 'sexo'],
        'f_nacimiento_est' => ['requerido', 'fecha'],
        'edad_est' => ['requerido', 'entero'],
        'direccion_est' => ['requerido'],
        'lugar_nac_est' => ['requerido'],
        'colegio_ant_est' => ['requerido'],
        'motivo_ret_est' => ['requerido'],
        'nivelacion_est' => ['requerido'],
        'explicacion_est' => ['requerido'],
        'grado_est' => ['requerido'],
        'turno_est' => ['requerido'],
        'problem_resp_est' => ['no requerido'],
        'alergias_est' => ['no requerido'],
        'vacunas_est' => ['no requerido'],
        'enfermedad_est' => ['no requerido'],
    ];

    $errores = validarCampos($_POST, $reglas);

    if (!empty($errores)) {
        // Retornar errores como JSON si es una petición AJAX
        echo json_encode(['status' => 'error', 'errores' => $errores]);
        exit;
    }

    // Si pasa validación, puedes continuar con la lógica de guardado
    $array = array(
        $_POST['idEst'],
        $_POST['cedula_est'],
        $_POST['nombres_est'],
        $_POST['apellidos_est'],
        $_POST['sexo'],
        $_POST['f_nacimiento_est'],
        $_POST['edad_est'],
        $_POST['direccion_est'],
        $_POST['lugar_nac_est'],
        $_POST['colegio_ant_est'],
        $_POST['motivo_ret_est'],
        $_POST['nivelacion_est'],
        $_POST['explicacion_est'],
        $_POST['grado_est'],
        $_POST['turno_est'],
        $_POST['problem_resp_est'],
        $_POST['alergias_est'],
        $_POST['vacunas_est'],
        $_POST['enfermedad_est']
    );

    if (editarEstudiante($pdo, $array)) {
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
    }
}