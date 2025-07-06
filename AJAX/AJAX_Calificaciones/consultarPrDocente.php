<?php
include("../../Configuration/Configuration.php");

if (isset($_POST['docente'])) {
       $idProfesor = $_POST['docente'];

       try {
           // Consulta con JOIN para obtener el nombre de la materia
           $stmt = $pdo->prepare("SELECT pmg.id_materia, m.nombre FROM profesor_materia_grado pmg JOIN materias m ON pmg.id_materia = m.id_materia WHERE id_profesor = :id_profesor");
           $stmt->bindValue(':id_profesor', $idProfesor);
           $stmt->execute();

           if ($stmt->rowCount() > 0) {
               echo '<option value="Seleccionar">Seleccionar</option>';
               while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   echo '<option value="' . htmlspecialchars($fila["id_materia"]) . '">' 
                        . htmlspecialchars($fila["nombre"]) . '</option>';
               }
           } else {
               echo '<option value="Error grado asignado">Asignatura sin docente asignado</option>';
           }
       } catch (PDOException $e) {
           echo '<option value="Error en la consulta">Error en la consulta: ' . htmlspecialchars($e->getMessage()) . '</option>';
       }
    }