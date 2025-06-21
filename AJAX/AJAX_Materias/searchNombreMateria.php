<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    // Verifica si existe el campo y no está vacío
   
    if(!empty($_POST['nombreCreateM'])) {
        $validar = true;
        $nombreMateria = $_POST['nombreCreateM'];
     }

     if(!empty($_POST['nivelCreateM'])) {
        $validar = true;
        $nivelMateria = $_POST['nivelCreateM'];
     }

        if($validar) { 
        try {
            $stmt = $pdo->prepare("SELECT * FROM materias WHERE nombre= :nombre AND nivel_materia = :nivel_materia");
            $stmt->bindValue(':nombre', $nombreMateria);
            $stmt->bindValue(':nivel_materia', $nivelMateria);

            $stmt->execute();
    
            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if($stmt->rowCount() > 0){
                $mensaje = "Existe una asignatura con el mismo nombre y nivel de materia registrada. Verifique";
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