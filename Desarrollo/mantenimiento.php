<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Consultar Grados</title>
</head>

<!-- DIV PARA TRABAJAR CON EL MENÚ Y EL FORMULARIO RESPECTIVO  -->
<div class="wrapper">
    <?php

    session_start();
    include("menu.php");

    ?>
    <!-- CUERPO DEL HTML ESPACIO PARA TRABAJAR YA INCLUIDA LA BARRA -->
    <div class="main p-3">
        <div class="text-center">
            <h1>Administración de la Base de Datos</h1>

            <!-- Contenedor flex para alinear los dos divs -->
            <div style="display: flex; justify-content: space-between; max-width: 60%; margin: 0 auto;">

                <!-- Div izquierdo (original) -->
                <form action="../controller_php/controlador_Mantenimiento.php" method="post">
                    <div
                        style="background-color:#FFF4A3; width: 200px; border-radius: 15px; border: 1px solid gray; padding: 20px;">
                        <button type="submit" id="backup_btn" name="backup_btn"
                            style="background: none; border: none; cursor: pointer;">
                            <i class="bi bi-plus-lg" style="font-size: 80px;"></i>
                        </button>
                        <p style="margin-top: 10px;">Generar Backup</p>
                    </div>
                </form>

                <!-- Div derecho (nuevo, estilo similar pero diferente color) -->
                <?php
                if (!empty($response)) {
                    ?>
                    <div class="response <?php echo $response["type"]; ?>">
                        <?php echo nl2br($response["message"]); ?>
                    </div>
                    <?php
                }
                ?>
                <form method="post" action="" enctype="multipart/form-data" id="frm-restore">
                    <div class="form-row">
                        <div
                            style="background-color:#D8BFD8; width: 200px; border-radius: 15px; border: 1px solid gray; padding: 20px;">
                            <i class="bi bi-database" style="font-size: 80px;"></i>
                            <input type="file" name="backup_file" class="input-file"
                                style="background: none; border: none; cursor: pointer;" />
                            <div>
            <input type="submit" name="restore" value="Restore"
                class="btn-action" />
        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "Proyecto");
    if (!empty($_FILES)) {
        // Validating SQL file type by extensions
        if (
            !in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
                "sql"
            ))
        ) {
            $response = array(
                "type" => "error",
                "message" => "Invalid File Type"
            );
        } else {
            if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
                move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
                $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
            }
        }
    }

    function restoreMysqlDB($filePath, $conn)
    {
        $sql = '';
        $error = '';

        if (file_exists($filePath)) {
            $lines = file($filePath);

            foreach ($lines as $line) {

                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }

                $sql .= $line;

                if (substr(trim($line), -1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        $error .= mysqli_error($conn) . "\n";
                    }
                    $sql = '';
                }
            } // end foreach
    
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
            exec('rm ' . $filePath);
        } // end if file exists
    
        return $response;
    }
    ?>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
        });


    </script>

</html>