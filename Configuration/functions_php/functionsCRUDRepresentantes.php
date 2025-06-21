<?php
include("../Configuration/Configuration.php");

function consultarRepresentantes($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM representantes");
        $stmt->execute();

        // Obtener todos los registros
        $representantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro
        if (count($representantes) > 0) {
            return $representantes; // Devuelve todos los usuarios
        } else {
            return []; // Devuelve un array vacío si no hay registros
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function consultarContactoPago($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM contacto_pago");
        $stmt->execute();

        // Obtener todos los registros
        $contactoPago = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún registro
        if (count($contactoPago) > 0) {
            return $contactoPago; // Devuelve todos los usuarios
        } else {
            return []; // Devuelve un array vacío si no hay registros
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function editarRepresentante($pdo, array $data)
{
    try {
        $stmt = $pdo->prepare(
        "UPDATE representantes SET
        cedula = :cedula,
        nombres = :nombres,
        apellidos = :apellidos,
        fecha_nac = :fecha_nac,
        correo = :correo,
        direccion = :direccion,
        nro_telefono = :nro_telefono,
        grado_inst = :grado_inst,
        profesion = :profesion,
        trabaja = :trabaja,
        nombre_empr = :nombre_empr,
        telefono_empr = :telefono_empr,
        direccion_empr = :direccion_empr 
        WHERE id = :id");

        $stmt->bindValue(':cedula', $data[1]);
        $stmt->bindValue(':nombres', $data[2]);
        $stmt->bindValue(':apellidos', $data[3]);
        $stmt->bindValue(':fecha_nac', $data[4]);
        $stmt->bindValue(':correo', $data[5]);
        $stmt->bindValue(':direccion', $data[6]);
        $stmt->bindValue(':nro_telefono', $data[7]);
        $stmt->bindValue(':grado_inst', $data[8]);
        $stmt->bindValue(':profesion', $data[9]);
        $stmt->bindValue(':trabaja', $data[10]);
        $stmt->bindValue(':nombre_empr', $data[11]);
        $stmt->bindValue(':telefono_empr', $data[12]);
        $stmt->bindValue(':direccion_empr', $data[13]);
        $stmt->bindValue(':id', $data[0]);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false; // Si no se modificó ninguna fila
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

