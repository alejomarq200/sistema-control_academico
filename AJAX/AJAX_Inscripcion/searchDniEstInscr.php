<?php
include("../../Configuration/Configuration.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    $mensaje = "";

    if (!empty($_POST['cedulaEst']) && !empty($_POST['anioEscolar'])) {
        $dniEst = $_POST['cedulaEst'];
        $anio = $_POST['anioEscolar'];

        try {
            //Validar id de estudiante
            $stmt1 = $pdo->prepare("SELECT id FROM estudiantes WHERE cedula_est = :cedula_est");
            $stmt1->bindValue(':cedula_est', $dniEst);
            $stmt1->execute();

            if ($stmt1->rowCount() > 0) {
                $resultado = $stmt1->fetch(PDO::FETCH_ASSOC);
                $idEstudiante = $resultado['id'];

                $stmt = $pdo->prepare("SELECT id_estudiante FROM inscripciones WHERE id_estudiante = :id_estudiante AND anio_escolar = :anio_escolar");
                $stmt->bindValue(':id_estudiante', $idEstudiante, PDO::PARAM_INT);
                $stmt->bindValue(':anio_escolar', $anio, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $mensaje = '<span style="color:red;">Existe un registro del estudiante en el mismo año escolar. Verifique.</span>';
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    echo $mensaje;
}
