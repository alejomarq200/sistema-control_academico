<?php
include("../Configuration/Configuration.php");
function restoreMysqlDB($filePath, PDO $pdo)
{
    $sql = '';
    $error = '';

    if (file_exists($filePath)) {
        $lines = file($filePath);

        foreach ($lines as $line) {
            // Ignorar comentarios del script SQL
            if (substr(trim($line), 0, 2) == '--' || trim($line) == '') {
                continue;
            }

            $sql .= $line;

            // Ejecutar consulta cuando la línea termina en punto y coma
            if (substr(trim($line), -1) == ';') {
                try {
                    $pdo->exec($sql);
                } catch (PDOException $e) {
                    $error .= $e->getMessage() . "\n";
                }
                $sql = '';
            }
        }

        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }

        // Eliminar el archivo después de restaurar
        exec('rm ' . escapeshellarg($filePath));
    } else {
        $response = array(
            "type" => "error",
            "message" => "SQL file not found."
        );
    }

    return $response;
}