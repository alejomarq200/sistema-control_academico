<?php
include("../../Configuration/functions_php/functioncsCRUDActividades.php");
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mensaje = null;
    //Validar que campos a manipular no estén en el formato erróneo
    if (
        isset($_POST['gradoActividad']) && $_POST['gradoActividad'] !== "Seleccionar" ||
        isset($_POST['profesorActividad']) && $_POST['profesorActividad'] !== "Seleccionar" ||
        isset($_POST['asignatura']) && $_POST['asignatura'] !== "Seleccionar" || isset($_POST['añoEscolar']) ||
        isset($_POST['actividad']) && isset($_POST['tipoContenido'])
    ) {

        $ajaxAct = array
        (
        trim($_POST['actividad']), //0
        trim($_POST['asignatura']), //1
        trim($_POST['gradoActividad']), //2
        trim($_POST['tipoContenido']), //3
        trim($_POST['añoEscolar']), //4
        trim($_POST['profesorActividad']), //5
        trim($_POST['tipoContenido']) //6
        );

        if (existeActividad($pdo, $ajaxAct)) {
            $mensaje = "La actividad a registrar ya existe en el grado, asignatura y año escolar seleccionada";
        } else {
            $mensaje = "";
        }
    } else {
        $mensaje = "Alguno de los campo se encuentran vacios";
    }
    echo $mensaje;
}
?>