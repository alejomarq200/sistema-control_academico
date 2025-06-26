<?php
include("../../Configuration/Configuration.php");

function enlistar($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM profesor_materia_grado");
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

if (isset($_POST['grado_id'])) {
    $grado_id = $_POST['grado_id'];
    $relaciones = enlistar($pdo);

    if (!empty($relaciones)) {
        foreach ($relaciones as $rel) {

            echo "<tbody>
            <tr>
                        <td>" . htmlspecialchars($rel['id_profesor']) . "</td>
                        </tr>
                </tbody>";

        }
    } else {
        echo "<tr><td colspan='4'>No se encontraron relaciones para este grado.</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>Parámetro de grado no recibido.</td></tr>";
}