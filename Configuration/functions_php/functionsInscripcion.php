<?php
include("../Configuration/Configuration.php");
function insertarEstudiantes($pdo, array $data)
{
    try {
        $stmt = $pdo->prepare
        ("INSERT INTO estudiantes (cedula_est, nombres_est, apellidos_est, sexo, f_nacimiento_est, edad_est, 
        direccion_est, lugar_nac_est, colegio_ant_est, motivo_ret_est, nivelacion_est, explicacion_est, grado_est,
        turno_est, problem_resp_est, alergias_est, vacunas_est, enfermedad_est) 
        VALUES (:cedula_est, :nombres_est, :apellidos_est, :sexo, :f_nacimiento_est, :edad_est, 
        :direccion_est, :lugar_nac_est, :colegio_ant_est, :motivo_ret_est, :nivelacion_est, :explicacion_est, :grado_est,
        :turno_est, :problem_resp_est, :alergias_est, :vacunas_est, :enfermedad_est)");

        $stmt->bindValue(':cedula_est', $data[0]);
        $stmt->bindValue(':nombres_est', $data[1]);
        $stmt->bindValue(':apellidos_est', $data[2]);
        $stmt->bindValue(':sexo', $data[5]);
        $stmt->bindValue(':f_nacimiento_est', $data[3]);
        $stmt->bindValue(':edad_est', $data[4]);
        $stmt->bindValue(':direccion_est', $data[6]);
        $stmt->bindValue(':lugar_nac_est', $data[7]);
        $stmt->bindValue(':colegio_ant_est', $data[8]);
        $stmt->bindValue(':motivo_ret_est', $data[11]);
        $stmt->bindValue(':nivelacion_est', $data[9]);
        $stmt->bindValue(':explicacion_est', $data[10]);
        $stmt->bindValue(':grado_est', $data[13]);
        $stmt->bindValue(':turno_est', $data[12]);
        $stmt->bindValue(':problem_resp_est', $data[16]);
        $stmt->bindValue(':alergias_est', $data[17]);
        $stmt->bindValue(':vacunas_est', $data[14]);
        $stmt->bindValue(':enfermedad_est', $data[15]);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function insertarRepresentante($pdo, array $dataRepr)
{
    try {
        $stmt = $pdo->prepare
        ("INSERT INTO representantes (cedula, nombres, apellidos, fecha_nac, correo, direccion,
        nro_telefono, grado_inst, profesion, trabaja, nombre_empr, telefono_empr, direccion_empr) 
        VALUES (:cedula, :nombres, :apellidos, :fecha_nac, :correo, :direccion, :nro_telefono, 
        :grado_inst, :profesion, :trabaja, :nombre_empr, :telefono_empr, :direccion_empr)");

        $stmt->bindValue(':cedula', $dataRepr[0]);
        $stmt->bindValue(':nombres', $dataRepr[1]);
        $stmt->bindValue(':apellidos', $dataRepr[2]);
        $stmt->bindValue(':fecha_nac', $dataRepr[3]);
        $stmt->bindValue(':correo', $dataRepr[4]);
        $stmt->bindValue(':direccion', $dataRepr[5]);
        $stmt->bindValue(':nro_telefono', $dataRepr[6]);
        $stmt->bindValue(':grado_inst', $dataRepr[7]);
        $stmt->bindValue(':profesion', $dataRepr[8]);
        $stmt->bindValue(':trabaja', $dataRepr[9]);
        $stmt->bindValue(':nombre_empr', $dataRepr[10]);
        $stmt->bindValue(':telefono_empr', $dataRepr[11]);
        $stmt->bindValue(':direccion_empr', $dataRepr[12]);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
}

function insertarConctactoPago($pdo, array $dataContacto) {
    try { 
        
    $stmt = $pdo->prepare
        ("INSERT INTO contacto_pago 
        (cedula, nombres, apellidos, direccion, telefono,
        correo, grado_inst, profesion, trabaja, nombre_empresa,
        telefono_empresa, direccion_empresa) 
        VALUES (:cedula, :nombres, :apellidos, :direccion, :telefono, :correo, :grado_inst, 
        :profesion, :trabaja, :nombre_empresa, :telefono_empresa, :direccion_empresa)");

        $stmt->bindValue(':cedula', $dataContacto[0]);
        $stmt->bindValue(':nombres', $dataContacto[1]);
        $stmt->bindValue(':apellidos', $dataContacto[2]);
        $stmt->bindValue(':direccion', $dataContacto[3]);
        $stmt->bindValue(':telefono', $dataContacto[4]);
        $stmt->bindValue(':correo', $dataContacto[5]);
        $stmt->bindValue(':grado_inst', $dataContacto[6]);
        $stmt->bindValue(':profesion', $dataContacto[7]);
        $stmt->bindValue(':trabaja', $dataContacto[8]);
        $stmt->bindValue(':nombre_empresa', $dataContacto[9]);
        $stmt->bindValue(':telefono_empresa', $dataContacto[10]);
        $stmt->bindValue(':direccion_empresa', $dataContacto[11]);

        $stmt->execute();

        // Verificar si se encontró algún registro
        if ($stmt->rowCount() > 0) {
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getmessage();

    }
}

function insertarInscripcion($pdo, array $dataInscripcion, array $variablesInscripcionEst) {
    try {
        $sql = "INSERT INTO inscripciones (id_estudiante, id_representante, anio_escolar, grado, fecha_inscripcion, responsable_pago) 
                VALUES (:id_estudiante, :id_representante, :anio_escolar, :grado, :fecha_inscripcion, :responsable_pago)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue(':id_estudiante', $dataInscripcion[0]);
        $stmt->bindValue(':id_representante', $dataInscripcion[1]);
        $stmt->bindValue(':anio_escolar', $dataInscripcion[2]);
        $stmt->bindValue(':grado', $variablesInscripcionEst[13]);
        $stmt->bindValue(':fecha_inscripcion', $dataInscripcion[3]);
        $stmt->bindValue(':responsable_pago', $dataInscripcion[4]);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        // Para depuración, puedes mostrar el error (en producción quita esto)
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function retornarIdEstudiante($pdo, array $idEstudiante)
{

    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id FROM estudiantes WHERE cedula_est = :cedula_est");
        $stmt->bindValue(':cedula_est', $idEstudiante[0]);
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

function retornarIdRepresentante($pdo, array $idRepresentante)
{

    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id FROM representantes WHERE cedula = :cedula");
        $stmt->bindValue(':cedula', $idRepresentante[0]);
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

function retornarIdContacto($pdo, array $idContacto)
{

    try {
        // Preparamos la consulta para obtener solo id_materia
        $stmt = $pdo->prepare("SELECT id FROM contacto_pago WHERE cedula = :cedula");
        $stmt->bindValue(':cedula', $idContacto[0]);
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

