<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=proyecto", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
try {
    if(isset($_REQUEST["term"])) {
        $term = $_REQUEST["term"] . '%';
        
        // Determinar si el término es probablemente una cédula (empieza con V/E/J/P y números)
        $isCedula = preg_match('/^[VEJP][0-9]/i', $_REQUEST["term"]);
        
        // Consulta SQL dinámica
        $sql = "SELECT * FROM estudiantes WHERE ";
        
        if ($isCedula) {
            $sql .= "cedula_est LIKE :term";
        } else {
            $sql .= "(nombres_est LIKE :term OR apellidos_est LIKE :term)";
        }
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":term", $term);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            while($row = $stmt->fetch()) {
                // Mostrar información más completa
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
} catch(PDOException $e) {
    die("ERROR: No se pudo ejecutar la consulta. " . $e->getMessage());
}

unset($stmt);
unset($pdo);