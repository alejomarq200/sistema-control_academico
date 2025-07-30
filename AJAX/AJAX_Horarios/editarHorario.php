<?php
require_once "../../Configuration/Configuration.php";

if ($_POST['action'] === 'guardar_edicion') {
    $horarioJson = $_POST['horario'];
    $horario = json_decode($horarioJson, true);

    try {
        $pdo->beginTransaction();

        //Editar horario con referencia del id guardado en cada card
        foreach ($horario as $clase) {
            if (isset($clase['id_horario']) || !empty($clase['id_horario'])) {
                 // Actualizar clase existente
                $stmt = $pdo->prepare("UPDATE horarios SET 
                    id_grado = ?, id_aula = ?, id_materia = ?, id_profesor = ?,
                    dia_semana = ?, hora_inicio = ?, hora_fin = ?, anio_escolar = ?
                    WHERE id_horario = ?");

                $stmt->execute([
                    $clase['id_grado'],
                    $clase['id_aula'],
                    $clase['id_materia'],
                    $clase['id_profesor'],
                    $clase['dia_semana'],
                    $clase['hora_inicio'],
                    $clase['hora_fin'],
                    $clase['anio_escolar'],
                    $clase['id_horario']
                ]);
            } 
        }

        $pdo->commit();

        echo json_encode([
            'estado' => 'exito',
            'mensaje' => 'Horario actualizado correctamente'
        ]);
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode([
            'estado' => 'error',
            'mensaje' => 'Error al guardar horario: ' . $e->getMessage()
        ]);
    }
}
