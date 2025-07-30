<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

try {
    if (isset($_REQUEST["term"])) {
        $term = $_REQUEST["term"] . '%';

        // Determinar si el término es probablemente una cédula
        $isCedula = preg_match('/^[VEJP][0-9]/i', $_REQUEST["term"]);

        // Inicia SQL base
        $sql = "SELECT * FROM estudiantes WHERE ";

        // Agregar condiciones correctamente encapsuladas
        if ($isCedula) {
            $sql .= "(cedula_est LIKE :term)";
        } else {
            $sql .= "(nombres_est LIKE :term OR apellidos_est LIKE :term)";
        }

        // Filtro adicional: solo grados del 1 al 6
        $sql .= " AND grado_est BETWEEN 1 AND 6";

        // Preparar y ejecutar
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":term", $term);
        $stmt->execute();

        // Verificar resultados
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                echo "<p>";
                echo "<strong>" . htmlspecialchars($row["cedula_est"]) . "</strong> - ";
                echo htmlspecialchars($row["nombres_est"]) . " ";
                echo htmlspecialchars($row["apellidos_est"]);
                echo "</p>";
            }
        } else {
            echo "<p>No se encontraron coincidencias</p>";
        }
    }
} catch (PDOException $e) {
    die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
}


unset($stmt);
unset($pdo);