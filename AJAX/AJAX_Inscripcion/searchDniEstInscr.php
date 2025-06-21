<?php
include("../../Configuration/Configuration.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = null;
    $validar = false;

    // Verifica si existe el campo y no está vacío
    $patronCedula = "/^[V|E][0-9]{7,9}$/";

    if (!empty($_POST['cedulaEst'])) {
        $dniEst = $_POST['cedulaEst'];

        try {
            $stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE cedula_est = :cedula_est");
            $stmt->bindValue(':cedula_est', $dniEst);
            $stmt->execute();

            // Retornar true si no existe (validación pasa), false si existe (validación falla)
            if ($stmt->rowCount() > 0) {
                $mensaje = '<span id="cedulaEstFeedback" style="color:red;">  Existe un registro del estudiante. Verifique</span>';
            } else {
                $mensaje = "";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    echo $mensaje;
}