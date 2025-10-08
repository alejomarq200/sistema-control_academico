<?php
include("../Configuration/functions_php/functionsCRUDProfesor.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Guardamos valores en el array
    $array =
        [
            'idProfesor' => $_POST['idProfesorxGrado'],
            'gradoProfesor' => $_POST['gradosxProfesor']
        ];

    $validar = true;
    $errores = [];

    // Validación de campos vacíos
    if (empty($array['idProfesor'])) {
        $errores[] = 'El id del profesor se encuentra vacío';
        $validar = false;
    }

    if (empty($array['gradoProfesor'])) {
        $errores[] = 'El grado del profesor se encuentra vacío';
        $validar = false;
    }

    if ($validar) {
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM `profesor_grado` WHERE id_profesor = :id_profesor AND id_grado = :id_grado');
        $stmt->bindValue(':id_profesor', $array['idProfesor'], PDO::PARAM_INT);
        $stmt->bindValue(':id_grado', $array['gradoProfesor'], PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // Mensaje de error en caso de
            $_SESSION['mensaje'] = 'Atención, el profesor posee un registro en el grado seleccionado';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header('Location: ../Desarrollo/consultar_profesorDeGrados.php');
            exit();
        }

        $registrar = registrarProfesorxGrado($pdo, $array);

        if ($registrar) {

            $_SESSION['mensaje'] = 'Se asignó con éxito el profesor al grado';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Éxito';
            header('Location: ../Desarrollo/consultar_profesorDeGrados.php');

            exit();
        }
    }

} else {
    foreach ($errores as $error) {
        echo "<br>" . $error . "</br>";
    }
}