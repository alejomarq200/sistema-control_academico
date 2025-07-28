<?php
include("../Configuration/Configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificamos si es para cargar los grados
    if (isset($_POST['action']) && $_POST['action'] === 'cargar_grados') {
        $nivel = $_POST['nivel'];
        try {
            $stmt = $pdo->prepare("SELECT id, id_grado FROM grados WHERE categoria_grado = :categoria_grado");
            $stmt->bindValue(':categoria_grado', $nivel, PDO::PARAM_STR);
            $stmt->execute();

            $options = '';
            if ($stmt->rowCount() > 0) {
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $options .= '<option value="' . htmlspecialchars($fila["id"]) . '">' . 
                                htmlspecialchars($fila["id_grado"]) . '</option>';
                }
            } else {
                $options = '<option value="Error">No hay grados disponibles</option>';
            }
            echo $options;
            
        } catch (PDOException $e) {
            echo '<option value="Error">Error al cargar grados</option>';
        }
    }
}
?>