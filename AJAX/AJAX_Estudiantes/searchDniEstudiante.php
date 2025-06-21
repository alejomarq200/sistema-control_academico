<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    // Verifica si existe el campo y no está vacío
   
    if(!empty($_POST['cedula_est'])) {
        $validar = true;
        $dniEstudiante = $_POST['cedula_est'];
     }

        if($validar) { 
        try {
            $stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE cedula_est = :cedula_est");
            $stmt->bindValue(':cedula_est', $dniEstudiante);
            $stmt->execute();
            
            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if($stmt->rowCount() > 0){
                $mensaje = "Existe un estudiante con la misma cédula. Verifique";
            } else {
                $mensaje = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }
    echo $mensaje;
}