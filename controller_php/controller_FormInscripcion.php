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


    /* VALIDACIÓN DE CAMPOS ESTUDIANTES */
    function validarCamposEstudiante($variablesInscripcionEst)
    {
        /* Bandera para validar si hay errores  */
        $validar = true;

        /* PATRONES BACKEND */
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
        $patronFecha = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
        $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
        $patronEdad = "/^[0-9]{1,2}$/";
        $patronGenero = "/^(M|F)$/i";
        $turno = "/^(Mañana)$/i";
        $trabaja = "/^(Sí|No)$/i";
        $patronTexto = "/^.{10,}$/";

        if (!empty($_POST['checkDniEst'])) {

            if (empty($variablesInscripcionEst[0])) {
                $mensajes[] = "El campo de cedulaEst es obligatorio";
                $validar = false;
            } else if (!preg_match($patronCedula, $variablesInscripcionEst[0])) {
                $mensajes[] = "Formato inválido cedulaEst";
                $validar = false;
            }
        } else {
            $variablesInscripcionEst[0] = null;
        }

        if (empty($variablesInscripcionEst[1])) {
            $mensajes[] = "El campo de nombresEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionEst[1])) {
            $mensajes[] = "Formato inválido Nombres Est";
            $validar = false;
        }

        if (empty($variablesInscripcionEst[2])) {
            $mensajes[] = "El campo de apellidosEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionEst[2])) {
            $mensajes[] = "Formato inválido Apellidos Est";
            $validar = false;
        }

        if (empty($variablesInscripcionEst[3])) {
            $mensajes[] = "El campo de f_nacimientoEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronFecha, $variablesInscripcionEst[3])) {
            $mensajes[] = "Formato inválido fecha de nacimientoEst";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[4])) {
            $mensajes[] = "El campo de edadEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronEdad, $variablesInscripcionEst[4])) {
            $mensajes[] = "Formato inválido edad Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[5])) {
            $mensajes[] = "El campo de sexo Est es obligatorio";
            $validar = false;
        } else if (!preg_match($patronGenero, $variablesInscripcionEst[5])) {
            $mensajes[] = "Formato inválido sexo Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[6])) {
            $mensajes[] = "El campo de direccionEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[6])) {
            $mensajes[] = "Formato inválido dirección Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[7])) {
            $mensajes[] = "El campo de lugarNacEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[7])) {
            $mensajes[] = "Formato inválido lugar nacimiento Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[8])) {
            $mensajes[] = "El campo de colegioAntEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[8])) {
            $mensajes[] = "Formato inválido colegio antrior Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[9])) {
            $mensajes[] = "El campo de nivelacionEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[9])) {
            $mensajes[] = "Formato inválido nivelación Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[10])) {
            $mensajes[] = "El campo de explicacionEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[10])) {
            $mensajes[] = "Formato inválido explicacion Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[11])) {
            $mensajes[] = "El campo de motivoREst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[11])) {
            $mensajes[] = "Formato inválido motivo retiro Est";
            $validar = false;
        }

        if (empty($variablesInscripcionEst[12])) {
            $mensajes[] = "El campo de turnoEst es obligatorio";
            $validar = false;
        } else if (!preg_match($turno, $variablesInscripcionEst[12])) {
            $mensajes[] = "Formato inválido turno Est";
            $validar = false;
        }

        if (empty($variablesInscripcionEst[13])) {
            $mensajes[] = "El campo de gradoEst es obligatorio";
            $validar = false;
        }

        if (empty($variablesInscripcionEst[14])) {
            $mensajes[] = "El campo de vacunasEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[14])) {
            $mensajes[] = "Formato inválido vacuna Est";
            $validar = false;
        }
        if (empty($variablesInscripcionEst[15])) {
            $mensajes[] = "El campo de enfermedadEst es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionEst[15])) {
            $mensajes[] = "Formato inválido enfermedad Est";
            $validar = false;
        }

        if (!empty($_POST['check'])) {
            if (empty($variablesInscripcionEst[16])) {
                $mensajes[] = "El campo de problemasRespEst es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionEst[16])) {
                $mensajes[] = "Formato inválido problema respiratorio Est";
                $validar = false;
            }
        } else {
            $variablesInscripcionEst[16] = null;
        }

        if (!empty($_POST["check1"])) {
            if (empty($variablesInscripcionEst[17])) {
                $mensajes[] = "El campo de alergiasEst es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionEst[17])) {
                $mensajes[] = "Formato inválido alergia Est";
                $validar = false;
            }
        } else {
            $variablesInscripcionEst[17] = null;
        }
        return $validar;
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

        // Procesar los erroes del formulario
        $mensajes = [];

        /* Bandera para validar si hay errores  */
        $validar = true;

        if (empty($variablesInscripcionRepr[0])) {
            $mensajes[] = "El campo de cedulaM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronCedula, $variablesInscripcionRepr[0])) {
            $mensajes[] = "Formato inválido cedulaM";
            $validar = false;
        }

        if (empty($variablesInscripcionRepr[1])) {
            $mensajes[] = "El campo de nombresM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionRepr[1])) {
            $mensajes[] = "Formato inválido nombresM";
            $validar = false;
        }

        if (empty($variablesInscripcionRepr[2])) {
            $mensajes[] = "El campo de apellidosM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionRepr[2])) {
            $mensajes[] = "Formato inválido apellidosM";
            $validar = false;
        }

        if (empty($variablesInscripcionRepr[3])) {
            $mensajes[] = "El campo de f_nacimientoM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronFecha, $variablesInscripcionRepr[3])) {
            $mensajes[] = "Formato inválido f_nacimientoM";
            $validar = false;
        }
        if (empty($variablesInscripcionRepr[4])) {
            $mensajes[] = "El campo de emailM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronEmail, $variablesInscripcionRepr[4])) {
            $mensajes[] = "Formato inválido emailM";
            $validar = false;
        }
        if (empty($variablesInscripcionRepr[5])) {
            $mensajes[] = "El campo de direccionM Est es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionRepr[5])) {
            $mensajes[] = "Formato inválido direccionM";
            $validar = false;
        }
        if (empty($variablesInscripcionRepr[6])) {
            $mensajes[] = "El campo de n_telefonoM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTelefono, $variablesInscripcionRepr[6])) {
            $mensajes[] = "Formato inválido n_telefonoM";
            $validar = false;
        }
        if (empty($variablesInscripcionRepr[7])) {
            $mensajes[] = "El campo de graoInstM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionRepr[7])) {
            $mensajes[] = "Formato inválido graoInstM";
            $validar = false;
        }
        if (empty($variablesInscripcionRepr[8])) {
            $mensajes[] = "El campo de profesionM es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionRepr[8])) {
            $mensajes[] = "Formato inválido profesionM";
            $validar = false;
        }

        if ($variablesInscripcionRepr[9] === "No") {
            $variablesInscripcionRepr[10] = null;
            $variablesInscripcionRepr[11] = null;
            $variablesInscripcionRepr[12] = null;

        } else {
            if (empty($variablesInscripcionRepr[9])) {
                $mensajes[] = "El campo de trabajaM es obligatorio";
                $validar = false;
            } else if (!preg_match($trabaja, $variablesInscripcionRepr[9])) {
                $mensajes[] = "Formato inválido trabajaM";
                $validar = false;
            }
            if (empty($variablesInscripcionRepr[10])) {
                $mensajes[] = "El campo de nombreEmpresaM es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionRepr[10])) {
                $mensajes[] = "Formato inválido nombreEmpresaM";
                $validar = false;
            }
            if (empty($variablesInscripcionRepr[11])) {
                $mensajes[] = "El campo de tlfnEmepresaM es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTelefono, $variablesInscripcionRepr[11])) {
                $mensajes[] = "Formato inválido tlfnEmepresaM";
                $validar = false;
            }

            if (empty($variablesInscripcionRepr[12])) {
                $mensajes[] = "El campo de direccionEmpresaM es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionRepr[12])) {
                $mensajes[] = "Formato inválido direccionEmpresaM";
                $validar = false;
            }
        }

        return $validar;
    }

    /* FINALIZA VALIDACIÓN DE CAMPOS MADRE */

    /* VALIDACIÓN DE CAMPOS REPRESENTANTE PADRE */
    function validarCamposPadre(array $variablesInscripcionReprP)
    {
        /* PATRONES BACKEND */
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
        $patronFecha = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
        $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
        $trabaja = "/^(Sí|No)$/i";
        $patronTexto = "/^.{10,}$/";

        // Procesar los erroes del formulario
        $mensajes = [];

        /* Bandera para validar si hay errores  */
        $validar = true;

        if (empty($variablesInscripcionReprP[0])) {
            $mensajes[] = "El campo de cedulaP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronCedula, $variablesInscripcionReprP[0])) {
            $mensajes[] = "Formato inválido cedulaP";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[1])) {
            $mensajes[] = "El campo de nombresP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionReprP[1])) {
            $mensajes[] = "Formato inválido nombresP";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[2])) {
            $mensajes[] = "El campo de apellidosP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionReprP[2])) {
            $mensajes[] = "Formato inválido apellidosP";
            $validar = false;
        }

        if (empty($variablesInscripcionReprP[3])) {
            $mensajes[] = "El campo de f_nacimientoP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronFecha, $variablesInscripcionReprP[3])) {
            $mensajes[] = "Formato inválido f_nacimientoP";
            $validar = false;
        }
        if (empty($variablesInscripcionReprP[4])) {
            $mensajes[] = "El campo de emailP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronEmail, $variablesInscripcionReprP[4])) {
            $mensajes[] = "Formato inválido emailP";
            $validar = false;
        }
        if (empty($variablesInscripcionReprP[5])) {
            $mensajes[] = "El campo de direccionP Est es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionReprP[5])) {
            $mensajes[] = "Formato inválido direccionP";
            $validar = false;
        }
        if (empty($variablesInscripcionReprP[6])) {
            $mensajes[] = "El campo de n_telefonoP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTelefono, $variablesInscripcionReprP[6])) {
            $mensajes[] = "Formato inválido n_telefonoP";
            $validar = false;
        }
        if (empty($variablesInscripcionReprP[7])) {
            $mensajes[] = "El campo de graoInstP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionReprP[7])) {
            $mensajes[] = "Formato inválido graoInstP";
            $validar = false;
        }
        if (empty($variablesInscripcionReprP[8])) {
            $mensajes[] = "El campo de profesionP es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionReprP[8])) {
            $mensajes[] = "Formato inválido profesionP";
            $validar = false;
        }

        if ($variablesInscripcionReprP[9] === "No") {
            $variablesInscripcionReprP[10] = null;
            $variablesInscripcionReprP[11] = null;
            $variablesInscripcionReprP[12] = null;
        } else {
            if (empty($variablesInscripcionReprP[9])) {
                $mensajes[] = "El campo de trabajaP es obligatorio";
                $validar = false;
            } else if (!preg_match($trabaja, $variablesInscripcionReprP[9])) {
                $mensajes[] = "Formato inválido trabajaP";
                $validar = false;
            }
            if (empty($variablesInscripcionReprP[10])) {
                $mensajes[] = "El campo de nombreEmpresaP es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionReprP[10])) {
                $mensajes[] = "Formato inválido nombreEmpresaP";
                $validar = false;
            }
            if (empty($variablesInscripcionReprP[11])) {
                $mensajes[] = "El campo de tlfnEmepresaP es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTelefono, $variablesInscripcionReprP[11])) {
                $mensajes[] = "Formato inválido tlfnEmepresaP";
                $validar = false;
            }

            if (empty($variablesInscripcionReprP[12])) {
                $mensajes[] = "El campo de direccionEmpresaP es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionReprP[12])) {
                $mensajes[] = "Formato inválido direccionEmpresaP";
                $validar = false;
            }
        }

        return $validar;
    }
    /* FINALIZA VALIDACIÓN DE CAMPOS REPRESENTANTE PADRE */

    function validarCamposContacto(array $variablesInscripcionContacto)
    {
        /* PATRONES BACKEND */
        $patronCedula = "/^[V|E|J|P][0-9]{7,9}$/";
        $patronNombre = "/^[A-Za-zÑñÁÉÍÓÚáéíóú\s'-]+$/";
        $patronEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
        $patronTelefono = "/^(0414|0424|0412|0416|0426)[0-9]{7}$/";
        $trabaja = "/^(Sí|No)$/i";
        $patronTexto = "/^.{10,}$/";

        // Procesar los erroes del formulario
        $mensajes = [];

        /* Bandera para validar si hay errores  */
        $validar = true;

        if (empty($variablesInscripcionContacto[0])) {
            $mensajes[] = "El campo de cedulaC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronCedula, $variablesInscripcionContacto[0])) {
            $mensajes[] = "Formato inválido cedulaC";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[1])) {
            $mensajes[] = "El campo de nombresC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionContacto[1])) {
            $mensajes[] = "Formato inválido nombresC";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[2])) {
            $mensajes[] = "El campo de apellidosC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronNombre, $variablesInscripcionContacto[2])) {
            $mensajes[] = "Formato inválido apellidosC";
            $validar = false;
        }

        if (empty($variablesInscripcionContacto[3])) {
            $mensajes[] = "El campo de direccionC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionContacto[3])) {
            $mensajes[] = "Formato inválido direccionC";
            $validar = false;
        }
        if (empty($variablesInscripcionContacto[4])) {
            $mensajes[] = "El campo de telefonoC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTelefono, $variablesInscripcionContacto[4])) {
            $mensajes[] = "Formato inválido telefonoC";
            $validar = false;
        }
        if (empty($variablesInscripcionContacto[5])) {
            $mensajes[] = "El campo de correoC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronEmail, $variablesInscripcionContacto[5])) {
            $mensajes[] = "Formato inválido correoC";
            $validar = false;
        }
        if (empty($variablesInscripcionContacto[6])) {
            $mensajes[] = "El campo de graoInstC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionContacto[6])) {
            $mensajes[] = "Formato inválido graoInstC";
            $validar = false;
        }
        if (empty($variablesInscripcionContacto[7])) {
            $mensajes[] = "El campo de profesionC es obligatorio";
            $validar = false;
        } else if (!preg_match($patronTexto, $variablesInscripcionContacto[7])) {
            $mensajes[] = "Formato inválido profesionC";
            $validar = false;
        }
        if (empty($variablesInscripcionContacto[8])) {
            $mensajes[] = "El campo de trabajaC es obligatorio";
            $validar = false;
        } else if (!preg_match($trabaja, $variablesInscripcionContacto[8])) {
            $mensajes[] = "Formato inválido trabajaC";
            $validar = false;
        }

        if ($variablesInscripcionContacto[8] === "No") {
            $variablesInscripcionContacto[9] = null;
            $variablesInscripcionContacto[10] = null;
            $variablesInscripcionContacto[11] = null;


        } else {
            if (empty($variablesInscripcionContacto[8])) {
                $mensajes[] = "El campo de trabajaP es obligatorio";
                $validar = false;
            } else if (!preg_match($trabaja, $variablesInscripcionContacto[8])) {
                $mensajes[] = "Formato inválido trabajaP";
                $validar = false;
            }
            if (empty($variablesInscripcionContacto[9])) {
                $mensajes[] = "El campo de nombreEmpresaC es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionContacto[9])) {
                $mensajes[] = "Formato inválido nombreEmpresaC";
                $validar = false;
            }

            if (empty($variablesInscripcionContacto[10])) {
                $mensajes[] = "El campo de tlfnEmepresaC es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTelefono, $variablesInscripcionContacto[10])) {
                $mensajes[] = "Formato inválido tlfnEmepresaC";
                $validar = false;
            }

            if (empty($variablesInscripcionContacto[11])) {
                $mensajes[] = "El campo de direccionEmpresaC es obligatorio";
                $validar = false;
            } else if (!preg_match($patronTexto, $variablesInscripcionContacto[11])) {
                $mensajes[] = "Formato inválido direccionEmpresaC";
                $validar = false;
            }
        }


        return $validar;
    }

    /* VALIDACIÓN DE QUÉ PADRES SE VAN A REGISTRAR */
    function retornarCampos($pdo, array $variablesInscripcionEst, array $variablesInscripcionRepr, array $variablesInscripcionReprP, array $variablesInscripcionContacto)
    {
        $retornar = false;
        // Caso 1: Ambos padres
        if (!empty($_POST['madreSi']) && !empty($_POST['padreSi']) && !empty($_POST['representante'])) {
            if (
                validarCamposEstudiante($variablesInscripcionEst) && validarCamposMadre($variablesInscripcionRepr)
                && validarCamposPadre($variablesInscripcionReprP) && validarCamposContacto($variablesInscripcionContacto)
            ) {
                if (
                    insertarEstudiantes($pdo, $variablesInscripcionEst) && insertarRepresentante($pdo, $variablesInscripcionRepr)
                    && insertarRepresentante($pdo, $variablesInscripcionReprP) && insertarConctactoPago($pdo, $variablesInscripcionContacto)
                ) {
                    $retornar = true;
                }
            } else {
                $retornar = false;
            }
            //Caso 2: Madre
        } else if (!empty($_POST['madreSi']) && empty($_POST['padreSi']) && !empty($_POST['representante'])) {
            if (validarCamposEstudiante($variablesInscripcionEst) && validarCamposMadre($variablesInscripcionRepr) && validarCamposContacto($variablesInscripcionContacto)) {
                if (insertarEstudiantes($pdo, $variablesInscripcionEst) && insertarRepresentante($pdo, $variablesInscripcionRepr) && insertarConctactoPago($pdo, $variablesInscripcionContacto)) {
                    $retornar = true;
                }
            } else {
                $retornar = false;
            }
            //Caso3: Padre
        } else if (empty($_POST['madreSi']) && !empty($_POST['padreSi']) && !empty($_POST['representante'])) {
            if (validarCamposEstudiante($variablesInscripcionEst) && validarCamposPadre($variablesInscripcionReprP) && validarCamposContacto($variablesInscripcionContacto)) {
                if (insertarEstudiantes($pdo, $variablesInscripcionEst) && insertarRepresentante($pdo, $variablesInscripcionReprP) && insertarConctactoPago($pdo, $variablesInscripcionContacto)) {
                    $retornar = true;
                }
            } else {
                $retornar = false;
            }
        } else {
            $retornar = false;
        }
        return $retornar;
    }

    $fecha = date("d-m-Y"); // Crea la fecha en un formato específico
    $añoEscolar = $_POST['anioEscolar'];

    
    function insertarPlanilla($pdo, $dataInscripcion, $dataInscripcionP, $variablesInscripcionEst)
    {
        $retornar = false;
        // Caso 1: Ambos padres
        if (!empty($_POST['madreSi']) && !empty($_POST['padreSi']) && !empty($_POST['representante'])) {
            if (insertarInscripcion($pdo, $dataInscripcion, $variablesInscripcionEst) && insertarInscripcion($pdo, $dataInscripcionP, $variablesInscripcionEst)) {
                $retornar = true;
            } else {
                $retornar = false;
            }
            //Caso 2: Madre
        } else if (!empty($_POST['madreSi']) && empty($_POST['padreSi']) && !empty($_POST['representante'])) {
            if (insertarInscripcion($pdo, $dataInscripcion, $variablesInscripcionEst)) {
                $retornar = true;
            } else {
                $retornar = false;
            }
            //Caso3: Padre
        } else if (empty($_POST['madreSi']) && !empty($_POST['padreSi']) && !empty($_POST['representante'])) {
            if (insertarInscripcion($pdo, $dataInscripcionP, $variablesInscripcionEst)) {
                $retornar = true;
            } else {
                $retornar = false;
            }
        }
        return $retornar;
    }

    if (retornarCampos($pdo, $variablesInscripcionEst, $variablesInscripcionRepr, $variablesInscripcionReprP, $variablesInscripcionContacto)) {
        // Solo después de insertar los datos, recuperamos los IDs.
        $idReprM = retornarIdRepresentante($pdo, $variablesInscripcionRepr);
        $idReprP = retornarIdRepresentante($pdo, $variablesInscripcionReprP);
        $idEst = retornarIdEstudiante($pdo, $variablesInscripcionEst);
        $idContacto = retornarIdContacto($pdo, $variablesInscripcionContacto);

        $dataInscripcion = array($idEst, $idReprM, $añoEscolar, $fecha, $idContacto);
        $dataInscripcionP = array($idEst, $idReprP, $añoEscolar, $fecha, $idContacto);

        if (insertarPlanilla($pdo, $dataInscripcion, $dataInscripcionP, $variablesInscripcionEst)) {
            $_SESSION['mensaje'] = 'Inscripción del estudiante exitosa';
            header("Location: ../Desarrollo/inscripcion.php");
            exit();
        }
    }

}
