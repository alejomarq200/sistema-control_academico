<?php
require_once "../../Configuration/Configuration.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'cargar_aulas') {
        try {

            $idgrado = $_POST['idgrado'];
            $anio = $_POST['anio'];

            // Obtener capacidad del aula
            $stmt1 = $pdo->prepare("SELECT capacidad FROM aulas WHERE id_grado = :id_grado AND anio_escolar = :anio_escolar");
            $stmt1->bindValue(':id_grado', $idgrado, PDO::PARAM_STR);
            $stmt1->bindValue(':anio_escolar', $anio, PDO::PARAM_STR);
            $stmt1->execute();
            $capacidad = $stmt1->fetchColumn(); // devuelve solo el valor

            // Obtener cantidad de inscritos
            $stmt2 = $pdo->prepare("SELECT COUNT(DISTINCT id_estudiante) 
                                    FROM inscripciones 
                                    WHERE grado = :grado 
                                    AND anio_escolar = :anio_escolar");
            $stmt2->bindValue(':grado', $idgrado, PDO::PARAM_STR);
            $stmt2->bindValue(':anio_escolar', $anio, PDO::PARAM_STR);
            $stmt2->execute();
            $cantidad = $stmt2->fetchColumn();

            // Enviar como texto simple: "cantidad / capacidad"
            echo "Cantidad Actual Estudiantes: ". $cantidad . " / " . "Capacidad por Grado: ". $capacidad;

        } catch (PDOException $e) {
            echo "Error al cargar la capacidad del aula";
        }
    }
}

