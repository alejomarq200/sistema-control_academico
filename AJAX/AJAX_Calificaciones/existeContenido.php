<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    // Verifica si existe el campo y no está vacío

     if(!empty($_POST['contenidoEdit'])) {
        $validar = true;
        $contenido = $_POST['contenidoEdit'];
     }

        if($validar) { 
        try {
            //Validar si existe el registro en la columnas
            $stmt = $pdo->prepare("SELECT * FROM actividades WHERE contenido= :contenido");
            $stmt->bindValue(':contenido', $contenido);

            $stmt->execute();
    
            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if($stmt->rowCount() > 0){
                $mensaje = "Existe una actividad con el mismo nombre registrado. Verifique";
            } else {
                $mensaje = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            $mensaje = ""; // En caso de error, asumimos que la validación falla
        }
     }
    echo $mensaje;
}