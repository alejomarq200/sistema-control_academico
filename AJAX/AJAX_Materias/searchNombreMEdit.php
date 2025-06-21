<?php
include("../../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    $patronIdGuia = "/^[0-9]{1,9}$/";

    // Verifica si existe el campo y no está vacío
   if(!empty(trim($_POST['idEditM'])) || !preg_match($patronIdGuia, $_POST['idEditM']) ) {
     $validar = true;
   }

    if(!empty($_POST['nombreEditM'])) {
        $validar = true;
        $nombreMateria = $_POST['nombreEditM'];
     }

     if($validar) { 
        try {
            $stmt = $pdo->prepare("SELECT * FROM materias WHERE nombre= :nombre");
            $stmt->bindValue(':nombre', $nombreMateria);
            $stmt->execute();
    
            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if($stmt->rowCount() > 0){
                $mensaje = "Existe una asignatura con el mismo nombre de materia. Verifique";
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