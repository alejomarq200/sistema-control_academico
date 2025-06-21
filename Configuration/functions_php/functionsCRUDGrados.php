<?php
include("../Configuration/Configuration.php");

function consultarGradosCRUD($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM grados");
        $stmt->execute();

        // Obtener todos los registros
        $grados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro
        if (count($grados) > 0) {
            return $grados; // Devuelve todos los usuarios
        } else {
            return []; // Devuelve un array vacío si no hay registros
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function consultarGradosConMaterias($pdo) {
    $sql = "SELECT 
                g.id,
                g.id_grado AS nombre_grado,
                g.IFNULL(GROUP_CONCAT(m.nombre SEPARATOR ', '), 'Sin materias asignadas') AS materias_asignadas
            FROM categoria_grado,
                
                grados g
            LEFT JOIN 
                grado_materia gm ON g.id = gm.id_grado
            LEFT JOIN 
                materias m ON gm.id_materia = m.id_materia
            GROUP BY 
                g.id, g.id_grado, g.categoria_grado
            ORDER BY 
                g.categoria_grado, g.id_grado";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function listarProfesoresConGrados($pdo) {
    $sql = "SELECT 
                p.id_profesor,
                p.cedula,
                p.nombre,
                p.nivel_grado,
                p.telefono,
                p.estado,
                COALESCE(GROUP_CONCAT(DISTINCT g.id_grado ORDER BY g.id SEPARATOR ', '), 'No asignado') AS nombre_grados
            FROM 
                profesores p
            LEFT JOIN 
                profesor_grado pg ON p.id_profesor = pg.id_profesor
            LEFT JOIN 
                grados g ON pg.id_grado = g.id
            WHERE 
                p.estado = 2
            GROUP BY 
                p.id_profesor, p.cedula, p.nombre, p.nivel_grado, p.telefono, p.estado
            ORDER BY 
                p.nivel_grado, p.nombre";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



function validarExisteMateriaG($pdo, $gradoMateria, $nombreMateria)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM grado_materia WHERE id_grado = :id_grado AND id_materia= :id_materia");
        $stmt->bindValue(':id_grado', $gradoMateria);
        $stmt->bindValue(':id_materia', $nombreMateria);
        $stmt->execute();

        // Retornar true si no existe (validación pasa), false si existe (validación falla)
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function retornarIdGrado($pdo, $gradoMateria)
{

    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id FROM grados WHERE id_grado = :id_grado");
        $stmt->bindValue(':id_grado', $gradoMateria);
        $stmt->execute();

        // Obtenemos el resultado (solo la columna id_materia)
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si hay resultados, devolvemos el id_materia, sino null
        return $resultado ? $resultado['id'] : null;
    } catch (PDOException $e) {
        // Manejo de errores (puedes personalizarlo)
        error_log("Error en retornarIdMateria: " . $e->getMessage());
        return null;
    }
}

function consultarMateriasConGrados($pdo) {
    $query = "SELECT 
        m.id_materia, 
        m.nombre AS nombre_materia, 
        m.nivel_materia, 
        GROUP_CONCAT(DISTINCT g.id_grado ORDER BY g.id SEPARATOR ', ') AS grados_asignados,
        COUNT(DISTINCT gm.id_grado) AS total_asignaciones
    FROM 
        materias m
    LEFT JOIN 
        grado_materia gm ON m.id_materia = gm.id_materia
    LEFT JOIN 
        grados g ON gm.id_grado = g.id
    WHERE 
        m.id_estado = 2
    GROUP BY 
        m.id_materia, m.nombre, m.nivel_materia
    ORDER BY 
        m.nivel_materia, m.nombre
    ";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $resultados = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $grados = $row['total_asignaciones'] > 0 ? $row['grados_asignados'] : 'No asignado';
        $resultados[] = [
            'id_materia' => $row['id_materia'],
            'nombre_materia' => $row['nombre_materia'],
            'nivel_materia' => $row['nivel_materia'],
            'grados_asignados' => $grados
        ];
    }
    return $resultados;
}
