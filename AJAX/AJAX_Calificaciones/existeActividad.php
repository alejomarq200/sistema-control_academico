<?php 
include("../../Configuration/functions_php/functioncsCRUDActividades.php");
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    if(isset($_POST['actividad']) && $_POST['actividad'] !== "Seleccionar" ||
      isset($_POST['asignatura']) && $_POST['asignatura'] !== "Seleccionar" ||
      isset($_POST['gradoActividad']) && $_POST['gradoActividad'] !== "Seleccionar") {
        
        $ajaxAct = 
        array( trim($_POST['actividad']), trim($_POST['asignatura']), trim($_POST['gradoActividad']));
        
        if(existeActividad($pdo, $ajaxAct)) {
            $mensaje = "La actividad a registrar ya existe en el grado y asignatura seleccionada";
        } else {
            $mensaje = "";
        }
    } else {
        $mensaje = "Alguno de los campo se encuentran vacios";
    }
echo $mensaje;
} 
?>