<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controller PHP - INSCRIPCION</title>
</head>
<?php
session_start();
include("../Layout/mensajes.php");
include("../Configuration/Configuration.php");
include("../Configuration/functions_php/functionsInscripcion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    error_reporting(0);
    // Procesar los erroes del formulario
    $mensajes = [];

    /* Bandera para validar si hay errores  */
    $validar = true;
    $representante = true;

    /* PATRONES BACKEND */
    $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
    $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
    $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
    $patronFecha = "/^\d{4}-\d{2}-\d{2}$/";
    $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
    $patronEdad = "/^[0-9]{1,2}$/";
    $patronGenero = "/^(M|F)$/i";
    $turno = "/^(Mañana)$/i";
    $trabaja = "/^(Sí|No)$/i";
    $patronTexto = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";


    $variablesInscripcionEst = array
    (
        trim($_POST['cedulaEst']),
        trim($_POST['nombresEst']),
        trim($_POST['apellidosEst']),
        trim($_POST['f_nacimientoEst']),
        trim($_POST['edadEst']),
        trim($_POST['sexoEst']),
        trim($_POST['direccionEst']),
        trim($_POST['lugarNacEst']),
        trim($_POST['colegioAntEst']),
        trim($_POST['nivelacionEst']),
        trim($_POST['explicacionEst']),
        trim($_POST['motivoREst']),
        trim($_POST['turnoEst']),
        trim($_POST['gradoEst']),
        trim($_POST['vacunasEst']),
        trim($_POST['enfermedadEst']),
        trim($_POST['problemasRespEst']),
        trim($_POST['alergiasEst'])
    );

    $madre = "M";

    $variablesInscripcionRepr = array
    (
        trim($_POST['cedula' . $madre]),
        trim($_POST['nombres' . $madre]),
        trim($_POST['apellidos' . $madre]),
        trim($_POST['f_nacimiento' . $madre]),
        trim($_POST['email' . $madre]),
        trim($_POST['direccion' . $madre]),
        trim($_POST['n_telefono' . $madre]),
        trim($_POST['graoInst' . $madre]),
        trim($_POST['profesion' . $madre]),
        trim($_POST['trabaja' . $madre]),
        trim($_POST['nombreEmpresa' . $madre]),
        trim($_POST['tlfnEmepresa' . $madre]),
        trim($_POST['direccionEmpresa' . $madre])
    );

    $padre = "P";
    $variablesInscripcionReprP = array
    (
        trim($_POST['cedula' . $padre]),
        trim($_POST['nombres' . $padre]),
        trim($_POST['apellidos' . $padre]),
        trim($_POST['f_nacimiento' . $padre]),
        trim($_POST['email' . $padre]),
        trim($_POST['direccion' . $padre]),
        trim($_POST['n_telefono' . $padre]),
        trim($_POST['graoInst' . $padre]),
        trim($_POST['profesion' . $padre]),
        trim($_POST['trabaja' . $padre]),
        trim($_POST['nombreEmpresa' . $padre]),
        trim($_POST['tlfnEmepresa' . $padre]),
        trim($_POST['direccionEmpresa' . $padre])
    );

    $variablesInscripcionContacto = array
    (
        trim($_POST['cedulaC']),
        trim($_POST['nombresC']),
        trim($_POST['apellidosC']),
        trim($_POST['direccionC']),
        trim($_POST['telefonoC']),
        trim($_POST['correoC']),
        trim($_POST['graoInstC']),
        trim($_POST['profesionC']),
        trim($_POST['trabajaC']),
        trim($_POST['nombreEmpresaC']),
        trim($_POST['tlfnEmepresaC']),
        trim($_POST['direccionEmpresaC']),
    );

    /* VALIDACIÓN ESTUDIANTE */
    function validarCamposEstudiante($variablesInscripcionEst)
    {
        $mensajes = [];
        $valido = true;

        // Patrones
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronFecha = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/"; // o usa el que prefieras
        $patronEdad = "/^[0-9]{1,2}$/";
        $patronGenero = "/^(M|F)$/i";
        $turno = "/^(Mañana)$/i";
        $patronTexto = "/^.{10,}$/"; // mínimo 10 caracteres

        // Validaciones
        if (!empty($_POST['checkDniEst'])) {
            if (empty($variablesInscripcionEst[0]) || !preg_match($patronCedula, $variablesInscripcionEst[0])) {
                $mensajes[] = "Cédula inválida o vacía.";
                $valido = false;
            }
        }

        if (empty($variablesInscripcionEst[1]) || !preg_match($patronNombre, $variablesInscripcionEst[1])) {
            $mensajes[] = "Nombre inválido o vacío.";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[2]) || !preg_match($patronNombre, $variablesInscripcionEst[2])) {
            $mensajes[] = "Apellido inválido o vacío.";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[3]) || !preg_match($patronFecha, $variablesInscripcionEst[3])) {
            $mensajes[] = "Fecha de nacimiento inválida o vacía.";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[4]) || !preg_match($patronEdad, $variablesInscripcionEst[4])) {
            $mensajes[] = "Edad inválida o vacía.";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[5]) || !preg_match($patronGenero, $variablesInscripcionEst[5])) {
            $mensajes[] = "Sexo inválido o vacío.";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[6]) || !preg_match($patronTexto, $variablesInscripcionEst[6])) {
            $mensajes[] = "El campo de direccionEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[7]) || !preg_match($patronTexto, $variablesInscripcionEst[7])) {
            $mensajes[] = "El campo de lugarNacEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[8]) || !preg_match($patronTexto, $variablesInscripcionEst[8])) {
            $mensajes[] = "El campo de colegioAntEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[9]) || !preg_match($patronTexto, $variablesInscripcionEst[9])) {
            $mensajes[] = "El campo de nivelacionEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[10]) || !preg_match($patronTexto, $variablesInscripcionEst[10])) {
            $mensajes[] = "El campo de explicacionEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[11]) || !preg_match($patronTexto, $variablesInscripcionEst[11])) {
            $mensajes[] = "El campo de motivoREst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[12]) || !preg_match($turno, $variablesInscripcionEst[12])) {
            $mensajes[] = "El campo de turnoEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[13])) {
            $mensajes[] = "El campo de gradoEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[14]) || !preg_match($patronTexto, $variablesInscripcionEst[14])) {
            $mensajes[] = "El campo de vacunasEst es obligatorio";
            $valido = false;
        }

        if (empty($variablesInscripcionEst[15]) || !preg_match($patronTexto, $variablesInscripcionEst[15])) {
            $mensajes[] = "El campo de enfermedadEst es obligatorio";
            $valido = false;
        }

        // Validación de campos condicionales
        if (!empty($_POST['check'])) {
            if (empty($variablesInscripcionEst[16]) || !preg_match($patronTexto, $variablesInscripcionEst[16])) {
                $mensajes[] = "Problema respiratorio inválido o vacío.";
                $valido = false;
            }
        }

        if (!empty($_POST["check1"])) {
            if (empty($variablesInscripcionEst[17]) || !preg_match($patronTexto, $variablesInscripcionEst[17])) {
                $mensajes[] = "Alergia inválida o vacía.";
                $valido = false;
            }
        }

        return [
            'valido' => $valido,
            'errores' => $mensajes
        ];
    }
    /* FINALIZA VALIDACIÓN DE CAMPOS ESTUDIANTES */


    /* VALIDACIÓN DE CAMPOS REPRESENTANTE MADRE */
    function validarCamposMadre(array $variablesInscripcionRepr)
    {
        /* PATRONES BACKEND */
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
        $patronFecha = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
        $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
        $trabaja = "/^(Sí|No)$/i";
        $patronTexto = "/^.{10,}$/";

        $mensajes = [];
        $validar = true;

        // Cedula
        if (empty($variablesInscripcionRepr[0]) || !preg_match($patronCedula, $variablesInscripcionRepr[0])) {
            $mensajes[] = "Campo cédula madre vacio o formato inválido.";
            $validar = false;
        }

        // Nombres
        if (empty($variablesInscripcionRepr[1]) || !preg_match($patronNombre, $variablesInscripcionRepr[1])) {
            $mensajes[] = "El campo de nombres madre vacio o formato inválido.";
            $validar = false;
        }

        // Apellidos
        if (empty($variablesInscripcionRepr[2]) || !preg_match($patronNombre, $variablesInscripcionRepr[2])) {
            $mensajes[] = "El campo de apellidos madre vacio o formato inválido.";
            $validar = false;
        }

        // Fecha de nacimiento
        if (empty($variablesInscripcionRepr[3]) || !preg_match($patronFecha, $variablesInscripcionRepr[3])) {
            $mensajes[] = "El campo de fecha de nacimiento madre vacio o formato inválido.";
            $validar = false;
        }

        // Email
        if (empty($variablesInscripcionRepr[4]) || !preg_match($patronEmail, $variablesInscripcionRepr[4])) {
            $mensajes[] = "El campo de correo electrónico madre vacio o formato inválido.";
            $validar = false;
        }

        // Dirección
        if (empty($variablesInscripcionRepr[5]) || !preg_match($patronTexto, $variablesInscripcionRepr[5])) {
            $mensajes[] = "El campo de dirección madre vacio o formato inválido.";
            $validar = false;
        }

        // Teléfono
        if (empty($variablesInscripcionRepr[6]) || !preg_match($patronTelefono, $variablesInscripcionRepr[6])) {
            $mensajes[] = "El campo de teléfono madre vacio o formato inválido.";
            $validar = false;
        }

        // Grado de instrucción
        if (empty($variablesInscripcionRepr[7]) || !preg_match($patronTexto, $variablesInscripcionRepr[7])) {
            $mensajes[] = "El campo de grado de instrucción madre vacio o formato inválido.";
            $validar = false;
        }

        // Profesión
        if (empty($variablesInscripcionRepr[8]) || !preg_match($patronTexto, $variablesInscripcionRepr[8])) {
            $mensajes[] = "El campo de profesión madre o formato inválido.";
            $validar = false;
        }
        // Trabaja
        if (empty($variablesInscripcionRepr[9]) || !preg_match($trabaja, $variablesInscripcionRepr[9])) {
            $mensajes[] = "El campo de si trabaja la madre vacio o formato inválido.";
            $validar = false;
        }

        // Si trabaja, validar datos laborales
        if ($variablesInscripcionRepr[9] === "Sí") {

            // Nombre de empresa
            if (empty($variablesInscripcionRepr[10]) || !preg_match($patronTexto, $variablesInscripcionRepr[10])) {
                $mensajes[] = "El campo de nombre de empresa vaco o formato inválido.";
                $validar = false;
            }

            // Teléfono empresa
            if (empty($variablesInscripcionRepr[11]) || !preg_match($patronTelefono, $variablesInscripcionRepr[11])) {
                $mensajes[] = "El campo de teléfono madre vacio o formato inválido.";
                $validar = false;
            }
            // Dirección empresa
            if (empty($variablesInscripcionRepr[12]) || !preg_match($patronTexto, $variablesInscripcionRepr[12])) {
                $mensajes[] = "El campo de dirección madre vacio o formato inválido.";
                $validar = false;
            }
        } else {
            // Si no trabaja, vaciar campos de empresa
            $variablesInscripcionRepr[10] = null;
            $variablesInscripcionRepr[11] = null;
            $variablesInscripcionRepr[12] = null;
        }

        return [
            'valido' => $validar,
            'errores' => $mensajes
        ];
    }
    /* FINALIZA VALIDACIÓN DE CAMPOS MADRE */

    // VALIDACIÓN DE CAMPOS REPRESENTANTE PADRE 
    function validarCamposPadre(array $variablesInscripcionReprP)
    {
        // PATRONES BACKEND
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
        $patronFecha = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
        $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
        $trabaja = "/^(Sí|No)$/i";
        $patronTexto = "/^.{10,}$/";

        // Procesar los erroes del formulario
        $mensajes = [];

        // Bandera para validar si hay errores
        $validar = true;

        if (empty($variablesInscripcionReprP[0]) || !preg_match($patronCedula, $variablesInscripcionReprP[0])) {
            $mensajes[] = "El campo de cedula padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[1]) || !preg_match($patronNombre, $variablesInscripcionReprP[1])) {
            $mensajes[] = "El campo de nombres padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[2]) || !preg_match($patronNombre, $variablesInscripcionReprP[2])) {
            $mensajes[] = "El campo de apellidos padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[3]) || !preg_match($patronFecha, $variablesInscripcionReprP[3])) {
            $mensajes[] = "El campo de f_nacimiento padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[4]) || !preg_match($patronEmail, $variablesInscripcionReprP[4])) {
            $mensajes[] = "El campo de email padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[5]) || !preg_match($patronTexto, $variablesInscripcionReprP[5])) {
            $mensajes[] = "El campo de direccion padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[6]) || !preg_match($patronTelefono, $variablesInscripcionReprP[6])) {
            $mensajes[] = "El campo de n_telefono padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[7]) || !preg_match($patronTexto, $variablesInscripcionReprP[7])) {
            $mensajes[] = "El campo de graoInst padre vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[8]) || !preg_match($patronTexto, $variablesInscripcionReprP[8])) {
            $mensajes[] = "El campo de profesion padre vacio o formato inválido";
            $validar = false;
        }

        if ($variablesInscripcionReprP[9] === "No") {
            $variablesInscripcionReprP[10] = null;
            $variablesInscripcionReprP[11] = null;
            $variablesInscripcionReprP[12] = null;
        } else {
            if (empty($variablesInscripcionReprP[9]) || !preg_match($trabaja, $variablesInscripcionReprP[9])) {
                $mensajes[] = "El campo de trabaja padre vacio o formato inválido";
                $validar = false;
            }

            if (empty($variablesInscripcionReprP[10]) || !preg_match($patronTexto, $variablesInscripcionReprP[10])) {
                $mensajes[] = "El campo de nombreEmpresa padre vacio o formato inválido";
                $validar = false;
            }

            if (empty($variablesInscripcionReprP[11]) || !preg_match($patronTelefono, $variablesInscripcionReprP[11])) {
                $mensajes[] = "El campo de tlfnEmepresa padre vacio o formato inválido";
                $validar = false;
            }


            if (empty($variablesInscripcionReprP[12]) || !preg_match($patronTexto, $variablesInscripcionReprP[12])) {
                $mensajes[] = "El campo de direccionEmpresa padre vacio o formato inválido";
                $validar = false;
            }
        }
        return [
            'valido' => $validar,
            'errores' => $mensajes
        ];
    }

    //FINALIZA VALIDACIÓN DE CAMPOS REPRESENTANTE PADRE

    function validarCamposContacto(array $variablesInscripcionContacto)
    {
        // PATRONES BACKEND 
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
        $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
        $trabaja = "/^(Sí|No)$/i";
        $patronTexto = "/^.{10,}$/";

        // Procesar los erroes del formulario
        $mensajes = [];

        // Bandera para validar si hay errores 
        $validar = true;

        if (empty($variablesInscripcionContacto[0]) || !preg_match($patronCedula, $variablesInscripcionContacto[0])) {
            $mensajes[] = "El campo de cedula contacto vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[1]) || !preg_match($patronNombre, $variablesInscripcionContacto[1])) {
            $mensajes[] = "El campo de nombres contacto vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[2]) || !preg_match($patronNombre, $variablesInscripcionContacto[2])) {
            $mensajes[] = "El campo de apellidos contacto vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[3]) || !preg_match($patronTexto, $variablesInscripcionContacto[3])) {
            $mensajes[] = "El campo de direccion contacto vacio o formato inválido";
            $validar = false;
        }
        if (empty($variablesInscripcionContacto[4]) || !preg_match($patronTelefono, $variablesInscripcionContacto[4])) {
            $mensajes[] = "El campo de telefono contacto vacio o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[5]) || !preg_match($patronEmail, $variablesInscripcionContacto[5])) {
            $mensajes[] = "El campo de correo contacto o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[6]) || !preg_match($patronTexto, $variablesInscripcionContacto[6])) {
            $mensajes[] = "El campo de graoInst contacto o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[7]) || !preg_match($patronTexto, $variablesInscripcionContacto[7])) {
            $mensajes[] = "El campo de profesion contacto o formato inválido";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[8]) || !preg_match($trabaja, $variablesInscripcionContacto[8])) {
            $mensajes[] = "El campo de trabaja contacto o formato inválido";
            $validar = false;
        }

        if ($variablesInscripcionContacto[8] === "No") {
            $variablesInscripcionContacto[9] = null;
            $variablesInscripcionContacto[10] = null;
            $variablesInscripcionContacto[11] = null;
        } else {
            if (empty($variablesInscripcionContacto[8]) || !preg_match($trabaja, $variablesInscripcionContacto[8])) {
                $mensajes[] = "El campo de trabaja contacto o formato inválido";
                $validar = false;
            }

            if (empty($variablesInscripcionContacto[9]) || !preg_match($patronTexto, $variablesInscripcionContacto[9])) {
                $mensajes[] = "El campo de nombreEmpresa contacto o formato inválido";
                $validar = false;
            }


            if (empty($variablesInscripcionContacto[10]) || !preg_match($patronTelefono, $variablesInscripcionContacto[10])) {
                $mensajes[] = "El campo de tlfnEmepresa contacto o formato inválido";
                $validar = false;
            }


            if (empty($variablesInscripcionContacto[11]) || !preg_match($patronTexto, $variablesInscripcionContacto[11])) {
                $mensajes[] = "El campo de direccionEmpresa contacto o formato inválido";
                $validar = false;
            }
        }
        return [
            'valido' => $validar,
            'errores' => $mensajes
        ];
    }

    $resultadoEstudiante = validarCamposEstudiante($variablesInscripcionEst);
    $resultadoMadre = validarCamposMadre($variablesInscripcionRepr);
    $resultadoPadre = validarCamposPadre($variablesInscripcionReprP);
    $resultadoContacto = validarCamposContacto($variablesInscripcionContacto);

    if ($resultadoEstudiante['valido'] && $resultadoMadre['valido'] && $resultadoPadre['valido'] && $resultadoContacto['valido']) {
        // ✅ Todo válido
        echo "Formulario válido. Puedes continuar con el registro.";
    } else {
        // ❌ Mostrar errores por separado
        if (!$resultadoEstudiante['valido']) {
            echo "Errores en los datos del estudiante:<br>";
            foreach ($resultadoEstudiante['errores'] as $error) {
                echo "- " . $error . "<br>";
            }
        }

        if (!$resultadoMadre['valido']) {
            echo "<br>Errores en los datos de la madre:<br>";
            foreach ($resultadoMadre['errores'] as $error) {
                echo "- " . $error . "<br>";
            }
        }

        if (!$resultadoPadre['valido']) {
            echo "<br>Errores en los datos de la padre:<br>";
            foreach ($resultadoPadre['errores'] as $error) {
                echo "- " . $error . "<br>";
            }
        }

        if (!$resultadoContacto['valido']) {
            echo "<br>Errores en los datos del contacto:<br>";
            foreach ($resultadoContacto['errores'] as $error) {
                echo "- " . $error . "<br>";
            }
        }
    }

    // VALIDACIÓN DE QUÉ PADRES SE VAN A REGISTRAR
    function retornarCampos($pdo, array $estData, array $madreData, array $padreData, array $contactoData)
    {
        // Validación
        $valEst = validarCamposEstudiante($estData);
        $valMadre = validarCamposMadre($madreData);
        $valPadre = validarCamposPadre($padreData);
        $valContacto = validarCamposContacto($contactoData);

        // Fecha y año escolar
        $fecha = date("Y-m-d");
        $añoEscolar = $_POST['anioEscolar'];

        // Inserta o retorna ID del estudiante
        $idEst = retornarIdEstudiante($pdo, $estData);
        if (!$idEst && $valEst['valido']) {
            $idEst = insertarEstudiantes($pdo, $estData);
        }

        // Inserta o retorna ID del contacto
        $idContacto = retornarIdContacto($pdo, $contactoData);
        if (!$idContacto && $valContacto['valido']) {
            $idContacto = insertarConctactoPago($pdo, $contactoData);
        }

        // Casos:
        $tieneMadre = !empty($_POST['madreSi']);
        $tienePadre = !empty($_POST['padreSi']);
        $hayRepresentante = !empty($_POST['representante']);

        // === CASO MADRE Y PADRE ===
        if ($tieneMadre && $tienePadre && $hayRepresentante) {
            $idMadre = retornarIdRepresentante($pdo, $madreData);
            if (!$idMadre && $valMadre['valido']) {
                $idMadre = insertarRepresentante($pdo, $madreData);
            }

            $idPadre = retornarIdRepresentante($pdo, $padreData);
            if (!$idPadre && $valPadre['valido']) {
                $idPadre = insertarRepresentante($pdo, $padreData);
            }

            if ($idEst && $idMadre && $idPadre && $idContacto) {
                $dataInscripcionMadre = [$idEst, $idMadre, $añoEscolar, $fecha, $idContacto];
                $dataInscripcionPadre = [$idEst, $idPadre, $añoEscolar, $fecha, $idContacto];

                if (
                    insertarInscripcion($pdo, $dataInscripcionMadre, $estData) &&
                    insertarInscripcion($pdo, $dataInscripcionPadre, $estData)
                ) {
                    $_SESSION['mensaje'] = 'Inscripción del estudiante exitosa';
                    header("Location: ../Desarrollo/inscripcion.php");
                    exit();
                }
            }
        }

        // === CASO SOLO MADRE ===
        elseif ($tieneMadre && !$tienePadre && $hayRepresentante) {
            $idMadre = retornarIdRepresentante($pdo, $madreData);
            if (!$idMadre && $valMadre['valido']) {
                $idMadre = insertarRepresentante($pdo, $madreData);
            }

            if ($idEst && $idMadre && $idContacto) {
                $dataInscripcion = [$idEst, $idMadre, $añoEscolar, $fecha, $idContacto];

                if (insertarInscripcion($pdo, $dataInscripcion, $estData)) {
                    $_SESSION['mensaje'] = 'Inscripción del estudiante exitosa';
                    header("Location: ../Desarrollo/inscripcion.php");
                    exit();
                }
            }
        }

        // === CASO SOLO PADRE ===
        elseif (!$tieneMadre && $tienePadre && $hayRepresentante) {
            $idPadre = retornarIdRepresentante($pdo, $padreData);
            if (!$idPadre && $valPadre['valido']) {
                $idPadre = insertarRepresentante($pdo, $padreData);
            }

            if ($idEst && $idPadre && $idContacto) {
                $dataInscripcion = [$idEst, $idPadre, $añoEscolar, $fecha, $idContacto];

                if (insertarInscripcion($pdo, $dataInscripcion, $estData)) {
                    $_SESSION['mensaje'] = 'Inscripción del estudiante exitosa';
                    header("Location: ../Desarrollo/inscripcion.php");
                    exit();
                }
            }
        }

        // === ERRORES DE VALIDACIÓN ===
        echo "<strong>Se encontraron errores en el formulario:</strong><br>";

        if (!$valEst['valido']) {
            echo "Estudiante:<br>";
            foreach ($valEst['errores'] as $err)
                echo "- $err<br>";
        }

        if ($tieneMadre && !$valMadre['valido']) {
            echo "Madre:<br>";
            foreach ($valMadre['errores'] as $err)
                echo "- $err<br>";
        }

        if ($tienePadre && !$valPadre['valido']) {
            echo "Padre:<br>";
            foreach ($valPadre['errores'] as $err)
                echo "- $err<br>";
        }

        if (!$valContacto['valido']) {
            echo "Contacto de Pago:<br>";
            foreach ($valContacto['errores'] as $err)
                echo "- $err<br>";
        }
    }

    retornarCampos($pdo, $variablesInscripcionEst, $variablesInscripcionRepr, $variablesInscripcionReprP, $variablesInscripcionContacto);
}
