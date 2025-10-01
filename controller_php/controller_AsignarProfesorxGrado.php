<?php
include("../Configuration/functions_php/functionsCRUDProfesor.php");
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Guardamos valores en el array
    $array =
        [
            'idProfesor' => $_POST['idProfesorAsig'],
            'gradoProfesor' => $_POST['grado']
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
        // Igualación de array para manipular
        $asignaturas = $_POST['asignatura'];

        // Obtenemos las asignaturas por id_profesor
        $stmt = $pdo->prepare('SELECT id_materia FROM profesor_materia_grado WHERE id_profesor = :id_profesor AND id_grado = :id_grado');
        $stmt->bindValue(':id_profesor', $array['idProfesor'], PDO::PARAM_INT);
        $stmt->bindValue(':id_grado', $array['gradoProfesor'], PDO::PARAM_INT);
        $stmt->execute();

        $materiasProfesor = $stmt->fetchAll(PDO::FETCH_COLUMN) ?: [];

        //Convertimos nuestro array a un tipo de dato que necesitemos
        $materiasProfesor = array_map('strval', $materiasProfesor);

        // //Identificar coincidencias
        $coincidencias = array_values(array_intersect($asignaturas, $materiasProfesor));

        if (!empty($coincidencias)) {
            // Devuelve las materias que ya posee el profesor
            $resultados = [];

            //Iteramos sobre coincidencias para retornar el nombre de las mismas
            for ($i = 0; $i < count($coincidencias); $i++) {
                $stmtAsign = $pdo->prepare('SELECT nombre FROM materias WHERE id_materia = :id_materia');
                $stmtAsign->bindValue(':id_materia', $coincidencias[$i], PDO::PARAM_INT);
                $stmtAsign->execute();

                if ($stmtAsign->rowCount() > 0) {
                    $materia = $stmtAsign->fetch(PDO::FETCH_ASSOC);
                    $resultados[] = $materia['nombre'];
                }
            }
            $resultados;
        }

        if (!empty($coincidencias)) {

            // Conversión de array a string para mostrar visualmente  en alerta
            $results = implode(', ', $resultados);

            $_SESSION['mensaje'] = 'Atención, el profesor posee asignaturas en el grado seleccionado: ' . $results;
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header('Location: ../Desarrollo/gestion_profesores.php');
            exit();

        } else {
            // Si la asignatura no se asignó al profesor, se insertará
            if (isset($_POST['asignatura'])) {
                $valores = $_POST['asignatura'];
                foreach ($valores as $key) {
                    $asignar = asignarProfesorMateriaYGrado($pdo, $array, $key);
                }
                if ($asignar) {
                    $_SESSION['mensaje'] = 'Se asignó con éxito el profesor al grado y la asignatura';
                    $_SESSION['icono'] = 'success';
                    $_SESSION['titulo'] = 'Éxito';
                    header('Location: ../Desarrollo/gestion_profesores.php');
                    exit();
                }
            }
        }
    } else {
        foreach ($errores as $error) {
            echo "<br>" . $error . "</br>";
        }
    }
}