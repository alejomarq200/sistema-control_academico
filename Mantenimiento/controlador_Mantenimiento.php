<?php
// Configuración de la base de datos
$host = "localhost";
$username = "root";
$password = "12345678";
$database_name = "Proyecto";

try {
    // Conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$database_name;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Obtener todas las tablas de la base de datos
    $tables = array();
    $stmt = $conn->query("SHOW TABLES");
    
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $tables[] = $row[0];
    }
    
    $sqlScript = "";
    foreach ($tables as $table) {
        // Preparar script SQL para la estructura de la tabla
        $stmt = $conn->query("SHOW CREATE TABLE $table");
        $row = $stmt->fetch(PDO::FETCH_NUM);
        
        $sqlScript .= "\n\n" . $row[1] . ";\n\n";
        
        // Preparar script SQL para los datos de cada tabla
        $stmt = $conn->query("SELECT * FROM $table");
        $columnCount = $stmt->columnCount();
        
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $sqlScript .= "INSERT INTO $table VALUES(";
            for ($j = 0; $j < $columnCount; $j++) {
                if (isset($row[$j])) {
                    // Escapar comillas y caracteres especiales
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n", "\\n", $row[$j]);
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= 'NULL';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
        $sqlScript .= "\n";
    }
    
    if (!empty($sqlScript)) {
        // Nombre del archivo de backup
        $backup_file_name = $database_name . '_backup_' . date('d-m-Y_H-i-s') . '.sql';
        
        // Guardar el script SQL en un archivo temporal
        file_put_contents($backup_file_name, $sqlScript);
        
        // Descargar el archivo de backup
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        
        readfile($backup_file_name);
        
        // Eliminar el archivo temporal
        unlink($backup_file_name);
        exit;
    }
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>