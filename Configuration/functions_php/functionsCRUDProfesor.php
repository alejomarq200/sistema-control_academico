<?php
include("../Configuration/Configuration.php");
function consultarProfesorCRUD($pdo)
{
    try {
        $stmt = $pdo->prepare("
            SELECT 
                p.id_profesor,
                p.cedula,
                p.nombre,
                p.nivel_grado,
                p.telefono,
                p.estado,
                g.categoria_grado,
                g.id_grado
            FROM profesores p
            INNER JOIN profesor_grado pg ON p.id_profesor = pg.id_profesor
            INNER JOIN grados g ON pg.id_grado = g.id
            ORDER BY p.id_profesor
        ");
        $stmt->execute();

        $profesores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profesores ?: [];
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function enlistarProfesoresxGrado($pdo)
{
    try {
        $stmt = $pdo->prepare(
            "SELECT 
                profesor_grado.id_profesor,
                profesores.nombre, 
                profesores.cedula,
                GROUP_CONCAT(DISTINCT grados.id_grado ORDER BY grados.id_grado SEPARATOR ', ') as grados
            FROM profesor_grado
            INNER JOIN grados ON profesor_grado.id_grado = grados.id
            INNER JOIN profesores ON profesor_grado.id_profesor = profesores.id_profesor
            GROUP BY profesor_grado.id_profesor"
        );
        $stmt->execute();

        $profesores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profesores ?: [];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return [];
    }
}

/* FUNCIÓN DE INSERTAR PROFESORES */
function insertarProfesor($pdo, $variablesModalCreateP)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO profesores (cedula, nombre, nivel_grado, telefono, estado) VALUES (:cedula, :nombre, :nivel_grado, :telefono, :estado)");
        $stmt->bindValue('cedula', $variablesModalCreateP[0] . $variablesModalCreateP[1]);
        $stmt->bindValue('nombre', $variablesModalCreateP[2]);
        $stmt->bindValue('nivel_grado', $variablesModalCreateP[5]);
        $stmt->bindValue('telefono', $variablesModalCreateP[3] . $variablesModalCreateP[4]);
        $stmt->bindValue('estado', 2);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {

            $_SESSION['mensaje'] = 'Profesor registrado exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/new_profesor.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function editarProfesor($pdo, $variablesModalEditP)
{
    try {
        $stmt = $pdo->prepare("UPDATE profesores SET cedula	=:cedula, nombre=:nombre, nivel_grado=:nivel_grado, telefono=:telefono WHERE id_profesor=:id_profesor");

        $stmt->bindValue(':cedula', $variablesModalEditP[0]);
        $stmt->bindValue(':nombre', $variablesModalEditP[1]);
        $stmt->bindValue(':nivel_grado', $variablesModalEditP[4]);
        $stmt->bindValue(':telefono', $variablesModalEditP[2]);
        $stmt->bindValue(':id_profesor', $variablesModalEditP[3]);
        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = 'Información del profesor editado exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_profesor.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'La acción no se procesó porque no se notaron cambios en los campos. Verifique.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/search_profesor.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage(); // Corregido el nombre del método
    }
}

function inhabilitarProfesor($pdo, $idGuia)
{
    $stmt = $pdo->prepare("UPDATE profesores SET estado=:estado WHERE id_profesor=:id_profesor");
    $stmt->bindValue(':estado', 1);
    $stmt->bindValue(':id_profesor', $idGuia);
    $stmt->execute();

    // Verificar si se encontró algún registro
    if ($stmt->rowCount() > 0) {
        $_SESSION['mensaje'] = 'Profesor inhabilitado con éxito.';
        $_SESSION['icono'] = 'success';
        $_SESSION['titulo'] = 'Éxito';
        header("Location: ../Desarrollo/search_profesor.php");
        exit();
    } else {
        $_SESSION['mensaje'] = 'La acción no se proceso porque el profesor ya estaba inhhabilitado.';
        $_SESSION['icono'] = 'error';
        $_SESSION['titulo'] = 'Error';
        header("Location: ../Desarrollo/search_profesor.php");
        exit();
    }
}

function habilitarProfesor($pdo, $idGuia)
{
    try {
        $stmt = $pdo->prepare("UPDATE profesores SET estado=:estado WHERE id_profesor=:id_profesor");
        $stmt->bindValue(':estado', 2);
        $stmt->bindValue(':id_profesor', $idGuia);
        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = 'Profesor habilitado con éxito.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Éxito';
            header("Location: ../Desarrollo/search_profesor.php");
            exit();
        } else {
            $_SESSION['mensaje'] = 'La acción no se proceso porque el profesor ya estaba habilitado.';
            $_SESSION['icono'] = 'error';
            $_SESSION['titulo'] = 'Error';
            header("Location: ../Desarrollo/search_profesor.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getMessage(); // Corregido el nombre del método
    }
}

function consultarProfesoresActivosConMaterias($pdo)
{
    try {
        // Consulta SQL con JOIN para obtener la información completa de profesores activos
        $sql = "SELECT 
                    p.id_profesor,
                    p.cedula,
                    p.nombre,
                    p.telefono,
                    p.estado,
                    GROUP_CONCAT(DISTINCT pmg.id_grado ORDER BY pmg.id_grado SEPARATOR ', ') AS grados,
                    GROUP_CONCAT(DISTINCT pmg.id_materia ORDER BY pmg.id_materia SEPARATOR ', ') AS materias
                FROM 
                    profesores p
                LEFT JOIN 
                    profesor_materia_grado pmg ON p.id_profesor = pmg.id_profesor
                WHERE 
                    p.estado = 2  -- Solo profesores activos
                GROUP BY 
                    p.id_profesor, p.cedula, p.nombre, p.telefono, p.estado
                ORDER BY 
                    p.nombre";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $profesores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($profesores) > 0) {
            return $profesores;
        } else {
            return [];
        }
    } catch (PDOException $e) {
        error_log('Error en consultarProfesoresActivosConMaterias: ' . $e->getMessage());
        return [];
    }
}

function retornarIdProfesor($pdo, array $arreglo)
{
    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id_profesor FROM profesores WHERE cedula = :cedula");
        $stmt->bindValue(':cedula', $arreglo[0]);
        $stmt->execute();

        // Obtenemos el resultado (solo la columna id_materia)
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si hay resultados, devolvemos el id_materia, sino null
        return $resultado ? $resultado['id_profesor'] : null;
    } catch (PDOException $e) {
        // Manejo de errores (puedes personalizarlo)
        error_log("Error en retornarIdMateria: " . $e->getMessage());
        return null;
    }
}

function gestionarProfesor($pdo, array $arregloPr)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO profesor_materia_grado (id_profesor, id_materia, id_grado) VALUES (:id_profesor, :id_materia, :id_grado)");
        $stmt->bindValue(':id_profesor', $arregloPr[0]);
        $stmt->bindValue(':id_materia', $arregloPr[4]);
        $stmt->bindValue(':id_grado', $arregloPr[3]);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {

            $_SESSION['mensaje'] = 'Profesor registrado exitosamente.';
            $_SESSION['icono'] = 'success';
            $_SESSION['titulo'] = 'Success';
            header("Location: ../Desarrollo/search_profesor.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}
function obtenerProfesoresAsignados($pdo)
{
    $query =
        "SELECT p.cedula, p.nombre, p.nivel_grado,
     COALESCE(GROUP_CONCAT(DISTINCT m.nombre ORDER BY m.nombre SEPARATOR ', '), 'No asignado') AS materias_asignados,
     COALESCE(GROUP_CONCAT(DISTINCT g.id_grado ORDER BY g.id_grado SEPARATOR ', '), 'No asignado') AS grados_asignados
     FROM profesores p
     LEFT JOIN profesor_materia_grado pmg ON p.id_profesor = pmg.id_profesor
     LEFT JOIN materias m ON pmg.id_materia = m.id_materia
     LEFT JOIN grados g ON pmg.id_grado = g.id
     WHERE p.estado = 2
     GROUP BY p.id_profesor, p.cedula, p.nombre, p.nivel_grado
     ORDER BY p.nombre ASC";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error al obtener profesores asignados: " . $e->getMessage());
        return [];
    }
}

function enlistar($pdo, $grado_id)
{
    $sql = "SELECT p.cedula, p.nombre, m.nombre AS materia_nombre
    FROM profesor_materia_grado pmg
    JOIN profesores p ON pmg.id_profesor = p.id_profesor
    JOIN materias m ON pmg.id_materia = m.id_materia
    WHERE pmg.id_grado = :grado_id
    AND p.estado = 2"; // 2 = Activo

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':grado_id', $grado_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function estudiantexNota($pdo, $grado_id)
{
    $sql = "SELECT e.id, e.cedula_est, e.nombres_est, e.apellidos_est, 
                   AVG(c.total_calificacion) as promedio_calificacion
            FROM estudiantes e
            LEFT JOIN calificaciones c ON e.id = c.id_estudiante
            WHERE e.grado_est = :grado_est
            GROUP BY e.id, e.cedula_est, e.nombres_est, e.apellidos_est
            ORDER BY e.apellidos_est, e.nombres_est";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':grado_est', $grado_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function retornarNombreProfesor($pdo, array $profesor)
{
    try {
        // Verificar que el rol exista en el array del usuario
        if (!isset($profesor['id_profesor'])) {
            return 'IdMateria no definido';
        }

        $stmt = $pdo->prepare("SELECT nombre FROM profesores WHERE id_profesor = :id_profesor");
        $stmt->bindValue(':id_profesor', $profesor['id_profesor']);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado ? $resultado['nombre'] : 'Estado no encontrado';
    } catch (PDOException $e) {
        error_log("Error en retornarNombreEst: " . $e->getMessage());
        return 'Error al obtener rol';
    }
}
