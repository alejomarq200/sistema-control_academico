CREATE TABLE `auditoria` (
  `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `tabla_afectada` varchar(50) NOT NULL,
  `operacion` varchar(10) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `valores_anteriores` text DEFAULT NULL,
  `valores_nuevos` text DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DELIMITER //
CREATE TRIGGER actividades_after_insert
AFTER INSERT ON actividades
FOR EACH ROW
BEGIN
 DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('actividades', 'INSERT', NEW.id_actividad, 
            CONCAT('{anio_escolar:"', NEW.anio_escolar, '", tipo_contenido:"', NEW.tipo_contenido, 
                  '", contenido:"', NEW.contenido, '", id_materia:', NEW.id_materia, 
                  ', id_grado:', NEW.id_grado, ', id_profesor:', NEW.id_profesor, 
                  ', id_estado:', NEW.id_estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER actividades_after_update
AFTER UPDATE ON actividades
FOR EACH ROW
BEGIN
    DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('actividades', 'UPDATE', NEW.id_actividad, 
            CONCAT('{anio_escolar:"', OLD.anio_escolar, '", tipo_contenido:"', OLD.tipo_contenido, 
                  '", contenido:"', OLD.contenido, '", id_materia:', OLD.id_materia, 
                  ', id_grado:', OLD.id_grado, ', id_profesor:', OLD.id_profesor, 
                  ', id_estado:', OLD.id_estado, '}'),
            CONCAT('{anio_escolar:"', NEW.anio_escolar, '", tipo_contenido:"', NEW.tipo_contenido, 
                  '", contenido:"', NEW.contenido, '", id_materia:', NEW.id_materia, 
                  ', id_grado:', NEW.id_grado, ', id_profesor:', NEW.id_profesor, 
                  ', id_estado:', NEW.id_estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER actividades_after_delete
AFTER DELETE ON actividades
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('actividades', 'DELETE', OLD.id_actividad, 
            CONCAT('{anio_escolar:"', OLD.anio_escolar, '", tipo_contenido:"', OLD.tipo_contenido, 
                  '", contenido:"', OLD.contenido, '", id_materia:', OLD.id_materia, 
                  ', id_grado:', OLD.id_grado, ', id_profesor:', OLD.id_profesor, 
                  ', id_estado:', OLD.id_estado, '}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER aulas_after_insert
AFTER INSERT ON aulas
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('aulas', 'INSERT', NEW.id_aula, 
            CONCAT('{nombre:"', NEW.nombre, '", capacidad:', NEW.capacidad, 
                  ', id_grado:', NEW.id_grado, ', anio_escolar:"', NEW.anio_escolar, 
                  '", estado:', NEW.estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER aulas_after_update
AFTER UPDATE ON aulas
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('aulas', 'UPDATE', NEW.id_aula, 
            CONCAT('{nombre:"', OLD.nombre, '", capacidad:', OLD.capacidad, 
                  ', id_grado:', OLD.id_grado, ', anio_escolar:"', OLD.anio_escolar, 
                  '", estado:', OLD.estado, '}'),
            CONCAT('{nombre:"', NEW.nombre, '", capacidad:', NEW.capacidad, 
                  ', id_grado:', NEW.id_grado, ', anio_escolar:"', NEW.anio_escolar, 
                  '", estado:', NEW.estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER aulas_after_delete
AFTER DELETE ON aulas
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('aulas', 'DELETE', OLD.id_aula, 
            CONCAT('{nombre:"', OLD.nombre, '", capacidad:', OLD.capacidad, 
                  ', id_grado:', OLD.id_grado, ', anio_escolar:"', OLD.anio_escolar, 
                  '", estado:', OLD.estado, '}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER calificaciones_after_insert
AFTER INSERT ON calificaciones
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('calificaciones', 'INSERT', NEW.id, 
            CONCAT('{anio_escolar:"', NEW.anio_escolar, '", id_grado:', NEW.id_grado, 
                  ', lapso_academico:"', NEW.lapso_academico, '", id_profesor:', NEW.id_profesor, 
                  ', id_materia:', NEW.id_materia, ', id_estudiante:', NEW.id_estudiante, 
                  ', calificacion:"', NEW.calificacion, '", actividad:', IFNULL(NEW.actividad, 'NULL'), 
                  ', tipo_actividad:"', IFNULL(NEW.tipo_actividad, 'NULL'), '", promedio:', IFNULL(NEW.promedio, 'NULL'), '}'),
            usuario_operacion);
END //

CREATE TRIGGER calificaciones_after_update
AFTER UPDATE ON calificaciones
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('calificaciones', 'UPDATE', NEW.id, 
            CONCAT('{anio_escolar:"', OLD.anio_escolar, '", id_grado:', OLD.id_grado, 
                  ', lapso_academico:"', OLD.lapso_academico, '", id_profesor:', OLD.id_profesor, 
                  ', id_materia:', OLD.id_materia, ', id_estudiante:', OLD.id_estudiante, 
                  ', calificacion:"', OLD.calificacion, '", actividad:', IFNULL(OLD.actividad, 'NULL'), 
                  ', tipo_actividad:"', IFNULL(OLD.tipo_actividad, 'NULL'), '", promedio:', IFNULL(OLD.promedio, 'NULL'), '}'),
            CONCAT('{anio_escolar:"', NEW.anio_escolar, '", id_grado:', NEW.id_grado, 
                  ', lapso_academico:"', NEW.lapso_academico, '", id_profesor:', NEW.id_profesor, 
                  ', id_materia:', NEW.id_materia, ', id_estudiante:', NEW.id_estudiante, 
                  ', calificacion:"', NEW.calificacion, '", actividad:', IFNULL(NEW.actividad, 'NULL'), 
                  ', tipo_actividad:"', IFNULL(NEW.tipo_actividad, 'NULL'), '", promedio:', IFNULL(NEW.promedio, 'NULL'), '}'),
           usuario_operacion);
END //

CREATE TRIGGER calificaciones_after_delete
AFTER DELETE ON calificaciones
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('calificaciones', 'DELETE', OLD.id, 
            CONCAT('{anio_escolar:"', OLD.anio_escolar, '", id_grado:', OLD.id_grado, 
                  ', lapso_academico:"', OLD.lapso_academico, '", id_profesor:', OLD.id_profesor, 
                  ', id_materia:', OLD.id_materia, ', id_estudiante:', OLD.id_estudiante, 
                  ', calificacion:"', OLD.calificacion, '", actividad:', IFNULL(OLD.actividad, 'NULL'), 
                  ', tipo_actividad:"', IFNULL(OLD.tipo_actividad, 'NULL'), '", promedio:', IFNULL(OLD.promedio, 'NULL'), '}'),
           usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER contacto_pago_after_insert
AFTER INSERT ON contacto_pago
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('contacto_pago', 'INSERT', NEW.id, 
            CONCAT('{cedula:"', NEW.cedula, '", nombres:"', NEW.nombres, 
                  '", apellidos:"', NEW.apellidos, '", direccion:"', NEW.direccion, 
                  '", telefono:"', NEW.telefono, '", correo:"', NEW.correo, 
                  '", grado_inst:"', NEW.grado_inst, '", profesion:"', NEW.profesion, 
                  '", trabaja:"', NEW.trabaja, '", nombre_empresa:"', NEW.nombre_empresa, 
                  '", telefono_empresa:"', NEW.telefono_empresa, '", direccion_empresa:"', NEW.direccion_empresa, '"}'),
            usuario_operacion);
END //

CREATE TRIGGER contacto_pago_after_update
AFTER UPDATE ON contacto_pago
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('contacto_pago', 'UPDATE', NEW.id, 
            CONCAT('{cedula:"', OLD.cedula, '", nombres:"', OLD.nombres, 
                  '", apellidos:"', OLD.apellidos, '", direccion:"', OLD.direccion, 
                  '", telefono:"', OLD.telefono, '", correo:"', OLD.correo, 
                  '", grado_inst:"', OLD.grado_inst, '", profesion:"', OLD.profesion, 
                  '", trabaja:"', OLD.trabaja, '", nombre_empresa:"', OLD.nombre_empresa, 
                  '", telefono_empresa:"', OLD.telefono_empresa, '", direccion_empresa:"', OLD.direccion_empresa, '"}'),
            CONCAT('{cedula:"', NEW.cedula, '", nombres:"', NEW.nombres, 
                  '", apellidos:"', NEW.apellidos, '", direccion:"', NEW.direccion, 
                  '", telefono:"', NEW.telefono, '", correo:"', NEW.correo, 
                  '", grado_inst:"', NEW.grado_inst, '", profesion:"', NEW.profesion, 
                  '", trabaja:"', NEW.trabaja, '", nombre_empresa:"', NEW.nombre_empresa, 
                  '", telefono_empresa:"', NEW.telefono_empresa, '", direccion_empresa:"', NEW.direccion_empresa, '"}'),
           usuario_operacion);
END //

CREATE TRIGGER contacto_pago_after_delete
AFTER DELETE ON contacto_pago
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('contacto_pago', 'DELETE', OLD.id, 
            CONCAT('{cedula:"', OLD.cedula, '", nombres:"', OLD.nombres, 
                  '", apellidos:"', OLD.apellidos, '", direccion:"', OLD.direccion, 
                  '", telefono:"', OLD.telefono, '", correo:"', OLD.correo, 
                  '", grado_inst:"', OLD.grado_inst, '", profesion:"', OLD.profesion, 
                  '", trabaja:"', OLD.trabaja, '", nombre_empresa:"', OLD.nombre_empresa, 
                  '", telefono_empresa:"', OLD.telefono_empresa, '", direccion_empresa:"', OLD.direccion_empresa, '"}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER estado_after_insert
AFTER INSERT ON estado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('estado', 'INSERT', NEW.id_estado, 
            CONCAT('{estado:"', IFNULL(NEW.estado, 'NULL'), '"}'),
            usuario_operacion);
END //

CREATE TRIGGER estado_after_update
AFTER UPDATE ON estado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('estado', 'UPDATE', NEW.id_estado, 
            CONCAT('{estado:"', IFNULL(OLD.estado, 'NULL'), '"}'),
            CONCAT('{estado:"', IFNULL(NEW.estado, 'NULL'), '"}'),
            usuario_operacion);
END //

CREATE TRIGGER estado_after_delete
AFTER DELETE ON estado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('estado', 'DELETE', OLD.id_estado, 
            CONCAT('{estado:"', IFNULL(OLD.estado, 'NULL'), '"}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER estudiantes_after_insert
AFTER INSERT ON estudiantes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('estudiantes', 'INSERT', NEW.id, 
            CONCAT('{cedula_est:"', IFNULL(NEW.cedula_est, 'NULL'), '", nombres_est:"', NEW.nombres_est, 
                  '", apellidos_est:"', NEW.apellidos_est, '", sexo:"', NEW.sexo, 
                  '", f_nacimiento_est:"', NEW.f_nacimiento_est, '", edad_est:', NEW.edad_est, 
                  ', direccion_est:"', NEW.direccion_est, '", lugar_nac_est:"', NEW.lugar_nac_est, 
                  '", colegio_ant_est:"', NEW.colegio_ant_est, '", motivo_ret_est:"', NEW.motivo_ret_est, 
                  '", nivelacion_est:"', NEW.nivelacion_est, '", explicacion_est:"', NEW.explicacion_est, 
                  '", grado_est:', NEW.grado_est, ', turno_est:"', NEW.turno_est, 
                  '", problem_resp_est:"', IFNULL(NEW.problem_resp_est, 'NULL'), 
                  '", alergias_est:"', IFNULL(NEW.alergias_est, 'NULL'), 
                  '", vacunas_est:"', NEW.vacunas_est, '", enfermedad_est:"', NEW.enfermedad_est, '"}'),
            usuario_operacion);
END //

CREATE TRIGGER estudiantes_after_update
AFTER UPDATE ON estudiantes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('estudiantes', 'UPDATE', NEW.id, 
            CONCAT('{cedula_est:"', IFNULL(OLD.cedula_est, 'NULL'), '", nombres_est:"', OLD.nombres_est, 
                  '", apellidos_est:"', OLD.apellidos_est, '", sexo:"', OLD.sexo, 
                  '", f_nacimiento_est:"', OLD.f_nacimiento_est, '", edad_est:', OLD.edad_est, 
                  ', direccion_est:"', OLD.direccion_est, '", lugar_nac_est:"', OLD.lugar_nac_est, 
                  '", colegio_ant_est:"', OLD.colegio_ant_est, '", motivo_ret_est:"', OLD.motivo_ret_est, 
                  '", nivelacion_est:"', OLD.nivelacion_est, '", explicacion_est:"', OLD.explicacion_est, 
                  '", grado_est:', OLD.grado_est, ', turno_est:"', OLD.turno_est, 
                  '", problem_resp_est:"', IFNULL(OLD.problem_resp_est, 'NULL'), 
                  '", alergias_est:"', IFNULL(OLD.alergias_est, 'NULL'), 
                  '", vacunas_est:"', OLD.vacunas_est, '", enfermedad_est:"', OLD.enfermedad_est, '"}'),
            CONCAT('{cedula_est:"', IFNULL(NEW.cedula_est, 'NULL'), '", nombres_est:"', NEW.nombres_est, 
                  '", apellidos_est:"', NEW.apellidos_est, '", sexo:"', NEW.sexo, 
                  '", f_nacimiento_est:"', NEW.f_nacimiento_est, '", edad_est:', NEW.edad_est, 
                  ', direccion_est:"', NEW.direccion_est, '", lugar_nac_est:"', NEW.lugar_nac_est, 
                  '", colegio_ant_est:"', NEW.colegio_ant_est, '", motivo_ret_est:"', NEW.motivo_ret_est, 
                  '", nivelacion_est:"', NEW.nivelacion_est, '", explicacion_est:"', NEW.explicacion_est, 
                  '", grado_est:', NEW.grado_est, ', turno_est:"', NEW.turno_est, 
                  '", problem_resp_est:"', IFNULL(NEW.problem_resp_est, 'NULL'), 
                  '", alergias_est:"', IFNULL(NEW.alergias_est, 'NULL'), 
                  '", vacunas_est:"', NEW.vacunas_est, '", enfermedad_est:"', NEW.enfermedad_est, '"}'),
             usuario_operacion);
END //

CREATE TRIGGER estudiantes_after_delete
AFTER DELETE ON estudiantes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('estudiantes', 'DELETE', OLD.id, 
            CONCAT('{cedula_est:"', IFNULL(OLD.cedula_est, 'NULL'), '", nombres_est:"', OLD.nombres_est, 
                  '", apellidos_est:"', OLD.apellidos_est, '", sexo:"', OLD.sexo, 
                  '", f_nacimiento_est:"', OLD.f_nacimiento_est, '", edad_est:', OLD.edad_est, 
                  ', direccion_est:"', OLD.direccion_est, '", lugar_nac_est:"', OLD.lugar_nac_est, 
                  '", colegio_ant_est:"', OLD.colegio_ant_est, '", motivo_ret_est:"', OLD.motivo_ret_est, 
                  '", nivelacion_est:"', OLD.nivelacion_est, '", explicacion_est:"', OLD.explicacion_est, 
                  '", grado_est:', OLD.grado_est, ', turno_est:"', OLD.turno_est, 
                  '", problem_resp_est:"', IFNULL(OLD.problem_resp_est, 'NULL'), 
                  '", alergias_est:"', IFNULL(OLD.alergias_est, 'NULL'), 
                  '", vacunas_est:"', OLD.vacunas_est, '", enfermedad_est:"', OLD.enfermedad_est, '"}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER grados_after_insert
AFTER INSERT ON grados
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('grados', 'INSERT', NEW.id, 
            CONCAT('{categoria_grado:"', NEW.categoria_grado, '", id_grado:"', NEW.id_grado, '"}'),
            usuario_operacion);
END //

CREATE TRIGGER grados_after_update
AFTER UPDATE ON grados
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('grados', 'UPDATE', NEW.id, 
            CONCAT('{categoria_grado:"', OLD.categoria_grado, '", id_grado:"', OLD.id_grado, '"}'),
            CONCAT('{categoria_grado:"', NEW.categoria_grado, '", id_grado:"', NEW.id_grado, '"}'),
             usuario_operacion);
END //

CREATE TRIGGER grados_after_delete
AFTER DELETE ON grados
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('grados', 'DELETE', OLD.id, 
            CONCAT('{categoria_grado:"', OLD.categoria_grado, '", id_grado:"', OLD.id_grado, '"}'),
            usuario_operacion());
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER grado_materia_after_insert
AFTER INSERT ON grado_materia
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('grado_materia', 'INSERT', NEW.id, 
            CONCAT('{id_grado:', NEW.id_grado, ', id_materia:', NEW.id_materia, '}'),
            usuario_operacion);
END //

CREATE TRIGGER grado_materia_after_update
AFTER UPDATE ON grado_materia
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('grado_materia', 'UPDATE', NEW.id, 
            CONCAT('{id_grado:', OLD.id_grado, ', id_materia:', OLD.id_materia, '}'),
            CONCAT('{id_grado:', NEW.id_grado, ', id_materia:', NEW.id_materia, '}'),
            usuario_operacion);
END //

CREATE TRIGGER grado_materia_after_delete
AFTER DELETE ON grado_materia
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('grado_materia', 'DELETE', OLD.id, 
            CONCAT('{id_grado:', OLD.id_grado, ', id_materia:', OLD.id_materia, '}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER horarios_after_insert
AFTER INSERT ON horarios
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('horarios', 'INSERT', NEW.id_horario, 
            CONCAT('{id_grado:', NEW.id_grado, ', id_aula:', NEW.id_aula, 
                  ', id_materia:', NEW.id_materia, ', id_profesor:', NEW.id_profesor, 
                  ', dia_semana:"', NEW.dia_semana, '", hora_inicio:"', NEW.hora_inicio, 
                  '", hora_fin:"', NEW.hora_fin, '", anio_escolar:"', NEW.anio_escolar, '"}'),
           usuario_operacion);
END //

CREATE TRIGGER horarios_after_update
AFTER UPDATE ON horarios
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('horarios', 'UPDATE', NEW.id_horario, 
            CONCAT('{id_grado:', OLD.id_grado, ', id_aula:', OLD.id_aula, 
                  ', id_materia:', OLD.id_materia, ', id_profesor:', OLD.id_profesor, 
                  ', dia_semana:"', OLD.dia_semana, '", hora_inicio:"', OLD.hora_inicio, 
                  '", hora_fin:"', OLD.hora_fin, '", anio_escolar:"', OLD.anio_escolar, '"}'),
            CONCAT('{id_grado:', NEW.id_grado, ', id_aula:', NEW.id_aula, 
                  ', id_materia:', NEW.id_materia, ', id_profesor:', NEW.id_profesor, 
                  ', dia_semana:"', NEW.dia_semana, '", hora_inicio:"', NEW.hora_inicio, 
                  '", hora_fin:"', NEW.hora_fin, '", anio_escolar:"', NEW.anio_escolar, '"}'),
            usuario_operacion);
END //

CREATE TRIGGER horarios_after_delete
AFTER DELETE ON horarios
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('horarios', 'DELETE', OLD.id_horario, 
            CONCAT('{id_grado:', OLD.id_grado, ', id_aula:', OLD.id_aula, 
                  ', id_materia:', OLD.id_materia, ', id_profesor:', OLD.id_profesor, 
                  ', dia_semana:"', OLD.dia_semana, '", hora_inicio:"', OLD.hora_inicio, 
                  '", hora_fin:"', OLD.hora_fin, '", anio_escolar:"', OLD.anio_escolar, '"}'),
             usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER inscripciones_after_insert
AFTER INSERT ON inscripciones
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('inscripciones', 'INSERT', NEW.id_inscripcion, 
            CONCAT('{id_estudiante:', IFNULL(NEW.id_estudiante, 'NULL'), 
                  ', id_representante:', IFNULL(NEW.id_representante, 'NULL'), 
                  ', anio_escolar:"', IFNULL(NEW.anio_escolar, 'NULL'), 
                  '", grado:', IFNULL(NEW.grado, 'NULL'), 
                  ', fecha_inscripcion:"', IFNULL(NEW.fecha_inscripcion, 'NULL'), 
                  '", responsable_pago:', IFNULL(NEW.responsable_pago, 'NULL'), '}'),
             usuario_operacion);
END //

CREATE TRIGGER inscripciones_after_update
AFTER UPDATE ON inscripciones
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('inscripciones', 'UPDATE', NEW.id_inscripcion, 
            CONCAT('{id_estudiante:', IFNULL(OLD.id_estudiante, 'NULL'), 
                  ', id_representante:', IFNULL(OLD.id_representante, 'NULL'), 
                  ', anio_escolar:"', IFNULL(OLD.anio_escolar, 'NULL'), 
                  '", grado:', IFNULL(OLD.grado, 'NULL'), 
                  ', fecha_inscripcion:"', IFNULL(OLD.fecha_inscripcion, 'NULL'), 
                  '", responsable_pago:', IFNULL(OLD.responsable_pago, 'NULL'), '}'),
            CONCAT('{id_estudiante:', IFNULL(NEW.id_estudiante, 'NULL'), 
                  ', id_representante:', IFNULL(NEW.id_representante, 'NULL'), 
                  ', anio_escolar:"', IFNULL(NEW.anio_escolar, 'NULL'), 
                  '", grado:', IFNULL(NEW.grado, 'NULL'), 
                  ', fecha_inscripcion:"', IFNULL(NEW.fecha_inscripcion, 'NULL'), 
                  '", responsable_pago:', IFNULL(NEW.responsable_pago, 'NULL'), '}'),
            usuario_operacion);
END //

CREATE TRIGGER inscripciones_after_delete
AFTER DELETE ON inscripciones
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('inscripciones', 'DELETE', OLD.id_inscripcion, 
            CONCAT('{id_estudiante:', IFNULL(OLD.id_estudiante, 'NULL'), 
                  ', id_representante:', IFNULL(OLD.id_representante, 'NULL'), 
                  ', anio_escolar:"', IFNULL(OLD.anio_escolar, 'NULL'), 
                  '", grado:', IFNULL(OLD.grado, 'NULL'), 
                  ', fecha_inscripcion:"', IFNULL(OLD.fecha_inscripcion, 'NULL'), 
                  '", responsable_pago:', IFNULL(OLD.responsable_pago, 'NULL'), '}'),
             usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER materias_after_insert
AFTER INSERT ON materias
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('materias', 'INSERT', NEW.id_materia, 
            CONCAT('{nivel_materia:"', NEW.nivel_materia, 
                  '", nombre:"', NEW.nombre, 
                  '", id_estado:', NEW.id_estado, '}'),
           usuario_operacion);
END //

CREATE TRIGGER materias_after_update
AFTER UPDATE ON materias
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('materias', 'UPDATE', NEW.id_materia, 
            CONCAT('{nivel_materia:"', OLD.nivel_materia, 
                  '", nombre:"', OLD.nombre, 
                  '", id_estado:', OLD.id_estado, '}'),
            CONCAT('{nivel_materia:"', NEW.nivel_materia, 
                  '", nombre:"', NEW.nombre, 
                  '", id_estado:', NEW.id_estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER materias_after_delete
AFTER DELETE ON materias
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('materias', 'DELETE', OLD.id_materia, 
            CONCAT('{nivel_materia:"', OLD.nivel_materia, 
                  '", nombre:"', OLD.nombre, 
                  '", id_estado:', OLD.id_estado, '}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER materias_pendientes_after_insert
AFTER INSERT ON materias_pendientes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('materias_pendientes', 'INSERT', NEW.id, 
            CONCAT('{id_estudiante:', NEW.id_estudiante, 
                  ', id_materia:', NEW.id_materia, 
                  ', id_grado:', NEW.id_grado, 
                  ', id_profesor:', NEW.id_profesor, 
                  ', anio_escolar:"', NEW.anio_escolar, 
                  '", promedio_final:', NEW.promedio_final, 
                  ', estado:"', NEW.estado, 
                  '", fecha_registro:"', NEW.fecha_registro, 
                  '", fecha_actualizacion:"', IFNULL(NEW.fecha_actualizacion, 'NULL'), '"}'),
           usuario_operacion);
END //

CREATE TRIGGER materias_pendientes_after_update
AFTER UPDATE ON materias_pendientes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('materias_pendientes', 'UPDATE', NEW.id, 
            CONCAT('{id_estudiante:', OLD.id_estudiante, 
                  ', id_materia:', OLD.id_materia, 
                  ', id_grado:', OLD.id_grado, 
                  ', id_profesor:', OLD.id_profesor, 
                  ', anio_escolar:"', OLD.anio_escolar, 
                  '", promedio_final:', OLD.promedio_final, 
                  ', estado:"', OLD.estado, 
                  '", fecha_registro:"', OLD.fecha_registro, 
                  '", fecha_actualizacion:"', IFNULL(OLD.fecha_actualizacion, 'NULL'), '"}'),
            CONCAT('{id_estudiante:', NEW.id_estudiante, 
                  ', id_materia:', NEW.id_materia, 
                  ', id_grado:', NEW.id_grado, 
                  ', id_profesor:', NEW.id_profesor, 
                  ', anio_escolar:"', NEW.anio_escolar, 
                  '", promedio_final:', NEW.promedio_final, 
                  ', estado:"', NEW.estado, 
                  '", fecha_registro:"', NEW.fecha_registro, 
                  '", fecha_actualizacion:"', IFNULL(NEW.fecha_actualizacion, 'NULL'), '"}'),
          usuario_operacion);
END //

CREATE TRIGGER materias_pendientes_after_delete
AFTER DELETE ON materias_pendientes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('materias_pendientes', 'DELETE', OLD.id, 
            CONCAT('{id_estudiante:', OLD.id_estudiante, 
                  ', id_materia:', OLD.id_materia, 
                  ', id_grado:', OLD.id_grado, 
                  ', id_profesor:', OLD.id_profesor, 
                  ', anio_escolar:"', OLD.anio_escolar, 
                  '", promedio_final:', OLD.promedio_final, 
                  ', estado:"', OLD.estado, 
                  '", fecha_registro:"', OLD.fecha_registro, 
                  '", fecha_actualizacion:"', IFNULL(OLD.fecha_actualizacion, 'NULL'), '"}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER profesores_after_insert
AFTER INSERT ON profesores
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('profesores', 'INSERT', NEW.id_profesor, 
            CONCAT('{cedula:"', NEW.cedula, 
                  '", nombre:"', NEW.nombre, 
                  '", nivel_grado:"', NEW.nivel_grado, 
                  '", telefono:"', NEW.telefono, 
                  '", estado:', NEW.estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER profesores_after_update
AFTER UPDATE ON profesores
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('profesores', 'UPDATE', NEW.id_profesor, 
            CONCAT('{cedula:"', OLD.cedula, 
                  '", nombre:"', OLD.nombre, 
                  '", nivel_grado:"', OLD.nivel_grado, 
                  '", telefono:"', OLD.telefono, 
                  '", estado:', OLD.estado, '}'),
            CONCAT('{cedula:"', NEW.cedula, 
                  '", nombre:"', NEW.nombre, 
                  '", nivel_grado:"', NEW.nivel_grado, 
                  '", telefono:"', NEW.telefono, 
                  '", estado:', NEW.estado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER profesores_after_delete
AFTER DELETE ON profesores
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('profesores', 'DELETE', OLD.id_profesor, 
            CONCAT('{cedula:"', OLD.cedula, 
                  '", nombre:"', OLD.nombre, 
                  '", nivel_grado:"', OLD.nivel_grado, 
                  '", telefono:"', OLD.telefono, 
                  '", estado:', OLD.estado, '}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER profesor_grado_after_insert
AFTER INSERT ON profesor_grado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('profesor_grado', 'INSERT', NEW.id, 
            CONCAT('{id_profesor:', NEW.id_profesor, ', id_grado:', NEW.id_grado, '}'),
            usuario_operacion());
END //

CREATE TRIGGER profesor_grado_after_update
AFTER UPDATE ON profesor_grado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('profesor_grado', 'UPDATE', NEW.id, 
            CONCAT('{id_profesor:', OLD.id_profesor, ', id_grado:', OLD.id_grado, '}'),
            CONCAT('{id_profesor:', NEW.id_profesor, ', id_grado:', NEW.id_grado, '}'),
             usuario_operacion);
END //

CREATE TRIGGER profesor_grado_after_delete
AFTER DELETE ON profesor_grado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('profesor_grado', 'DELETE', OLD.id, 
            CONCAT('{id_profesor:', OLD.id_profesor, ', id_grado:', OLD.id_grado, '}'),
            usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER profesor_materia_grado_after_insert
AFTER INSERT ON profesor_materia_grado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('profesor_materia_grado', 'INSERT', NEW.id, 
            CONCAT('{id_profesor:', NEW.id_profesor, 
                  ', id_materia:', NEW.id_materia, 
                  ', id_grado:', NEW.id_grado, '}'),
            usuario_operacion);
END //

CREATE TRIGGER profesor_materia_grado_after_update
AFTER UPDATE ON profesor_materia_grado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('profesor_materia_grado', 'UPDATE', NEW.id, 
            CONCAT('{id_profesor:', OLD.id_profesor, 
                  ', id_materia:', OLD.id_materia, 
                  ', id_grado:', OLD.id_grado, '}'),
            CONCAT('{id_profesor:', NEW.id_profesor, 
                  ', id_materia:', NEW.id_materia, 
                  ', id_grado:', NEW.id_grado, '}'),
          usuario_operacion);
END //

CREATE TRIGGER profesor_materia_grado_after_delete
AFTER DELETE ON profesor_materia_grado
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('profesor_materia_grado', 'DELETE', OLD.id, 
            CONCAT('{id_profesor:', OLD.id_profesor, 
                  ', id_materia:', OLD.id_materia, 
                  ', id_grado:', OLD.id_grado, '}'),
           usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER representantes_after_insert
AFTER INSERT ON representantes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('representantes', 'INSERT', NEW.id, 
            CONCAT('{cedula:"', IFNULL(NEW.cedula, 'NULL'), 
                  '", parentesco:"', NEW.parentesco, 
                  '", nombres:"', IFNULL(NEW.nombres, 'NULL'), 
                  '", apellidos:"', IFNULL(NEW.apellidos, 'NULL'), 
                  '", fecha_nac:"', IFNULL(NEW.fecha_nac, 'NULL'), 
                  '", correo:"', IFNULL(NEW.correo, 'NULL'), 
                  '", direccion:"', IFNULL(NEW.direccion, 'NULL'), 
                  '", nro_telefono:"', IFNULL(NEW.nro_telefono, 'NULL'), 
                  '", grado_inst:"', IFNULL(NEW.grado_inst, 'NULL'), 
                  '", profesion:"', IFNULL(NEW.profesion, 'NULL'), 
                  '", trabaja:"', IFNULL(NEW.trabaja, 'NULL'), 
                  '", nombre_empr:"', IFNULL(NEW.nombre_empr, 'NULL'), 
                  '", telefono_empr:"', IFNULL(NEW.telefono_empr, 'NULL'), 
                  '", direccion_empr:"', IFNULL(NEW.direccion_empr, 'NULL'), '"}'),
            usuario_operacion);
END //

CREATE TRIGGER representantes_after_update
AFTER UPDATE ON representantes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('representantes', 'UPDATE', NEW.id, 
            CONCAT('{cedula:"', IFNULL(OLD.cedula, 'NULL'), 
                  '", parentesco:"', OLD.parentesco, 
                  '", nombres:"', IFNULL(OLD.nombres, 'NULL'), 
                  '", apellidos:"', IFNULL(OLD.apellidos, 'NULL'), 
                  '", fecha_nac:"', IFNULL(OLD.fecha_nac, 'NULL'), 
                  '", correo:"', IFNULL(OLD.correo, 'NULL'), 
                  '", direccion:"', IFNULL(OLD.direccion, 'NULL'), 
                  '", nro_telefono:"', IFNULL(OLD.nro_telefono, 'NULL'), 
                  '", grado_inst:"', IFNULL(OLD.grado_inst, 'NULL'), 
                  '", profesion:"', IFNULL(OLD.profesion, 'NULL'), 
                  '", trabaja:"', IFNULL(OLD.trabaja, 'NULL'), 
                  '", nombre_empr:"', IFNULL(OLD.nombre_empr, 'NULL'), 
                  '", telefono_empr:"', IFNULL(OLD.telefono_empr, 'NULL'), 
                  '", direccion_empr:"', IFNULL(OLD.direccion_empr, 'NULL'), '"}'),
            CONCAT('{cedula:"', IFNULL(NEW.cedula, 'NULL'), 
                  '", parentesco:"', NEW.parentesco, 
                  '", nombres:"', IFNULL(NEW.nombres, 'NULL'), 
                  '", apellidos:"', IFNULL(NEW.apellidos, 'NULL'), 
                  '", fecha_nac:"', IFNULL(NEW.fecha_nac, 'NULL'), 
                  '", correo:"', IFNULL(NEW.correo, 'NULL'), 
                  '", direccion:"', IFNULL(NEW.direccion, 'NULL'), 
                  '", nro_telefono:"', IFNULL(NEW.nro_telefono, 'NULL'), 
                  '", grado_inst:"', IFNULL(NEW.grado_inst, 'NULL'), 
                  '", profesion:"', IFNULL(NEW.profesion, 'NULL'), 
                  '", trabaja:"', IFNULL(NEW.trabaja, 'NULL'), 
                  '", nombre_empr:"', IFNULL(NEW.nombre_empr, 'NULL'), 
                  '", telefono_empr:"', IFNULL(NEW.telefono_empr, 'NULL'), 
                  '", direccion_empr:"', IFNULL(NEW.direccion_empr, 'NULL'), '"}'),
           usuario_operacion);
END //

CREATE TRIGGER representantes_after_delete
AFTER DELETE ON representantes
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('representantes', 'DELETE', OLD.id, 
            CONCAT('{cedula:"', IFNULL(OLD.cedula, 'NULL'), 
                  '", parentesco:"', OLD.parentesco, 
                  '", nombres:"', IFNULL(OLD.nombres, 'NULL'), 
                  '", apellidos:"', IFNULL(OLD.apellidos, 'NULL'), 
                  '", fecha_nac:"', IFNULL(OLD.fecha_nac, 'NULL'), 
                  '", correo:"', IFNULL(OLD.correo, 'NULL'), 
                  '", direccion:"', IFNULL(OLD.direccion, 'NULL'), 
                  '", nro_telefono:"', IFNULL(OLD.nro_telefono, 'NULL'), 
                  '", grado_inst:"', IFNULL(OLD.grado_inst, 'NULL'), 
                  '", profesion:"', IFNULL(OLD.profesion, 'NULL'), 
                  '", trabaja:"', IFNULL(OLD.trabaja, 'NULL'), 
                  '", nombre_empr:"', IFNULL(OLD.nombre_empr, 'NULL'), 
                  '", telefono_empr:"', IFNULL(OLD.telefono_empr, 'NULL'), 
                  '", direccion_empr:"', IFNULL(OLD.direccion_empr, 'NULL'), '"}'),
           usuario_operacion);
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER users_after_insert
AFTER INSERT ON users
FOR EACH ROW
BEGIN
DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_nuevos, usuario)
    VALUES ('users', 'INSERT', NEW.id, 
            CONCAT('{cedula:"', NEW.cedula, 
                  '", nombres:"', IFNULL(NEW.nombres, 'NULL'), 
                  '", correo:"', IFNULL(NEW.correo, 'NULL'), 
                  '", telefono:"', IFNULL(NEW.telefono, 'NULL'), 
                  '", contrasena:"[REDACTED]", id_rol:', IFNULL(NEW.id_rol, 'NULL'), 
                  ', id_estado:', IFNULL(NEW.id_estado, 'NULL'), '}'),
            usuario_operacion);
END //

DELIMITER //
CREATE TRIGGER users_after_update
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    DECLARE usuario_operacion VARCHAR(100);
    DECLARE pass_change_info VARCHAR(50);
    
    -- Determina si la contraseña cambió
    IF NEW.contrasena <=> OLD.contrasena THEN
        SET pass_change_info = '"contrasena":"[UNCHANGED]"';
    ELSE
        SET pass_change_info = '"contrasena":"[CHANGED]"';
    END IF;
    
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, valores_nuevos, usuario)
    VALUES ('users', 'UPDATE', NEW.id, 
            CONCAT('{cedula:"', OLD.cedula, 
                  '", nombres:"', IFNULL(OLD.nombres, 'NULL'), 
                  '", correo:"', IFNULL(OLD.correo, 'NULL'), 
                  '", telefono:"', IFNULL(OLD.telefono, 'NULL'), 
                  '", contrasena:"[REDACTED]", id_rol:', IFNULL(OLD.id_rol, 'NULL'), 
                  ', id_estado:', IFNULL(OLD.id_estado, 'NULL'), '}'),
            CONCAT('{cedula:"', NEW.cedula, 
                  '", nombres:"', IFNULL(NEW.nombres, 'NULL'), 
                  '", correo:"', IFNULL(NEW.correo, 'NULL'), 
                  '", telefono:"', IFNULL(NEW.telefono, 'NULL'), 
                  '", ', pass_change_info, 
                  ', id_rol:', IFNULL(NEW.id_rol, 'NULL'), 
                  ', id_estado:', IFNULL(NEW.id_estado, 'NULL'), '}'),
            usuario_operacion); -- ¡Sin paréntesis aquí!
END //

CREATE TRIGGER users_after_delete
AFTER DELETE ON users
FOR EACH ROW
BEGIN
    DECLARE usuario_operacion VARCHAR(100);
    SET usuario_operacion = IFNULL(@usuario_actual, SYSTEM_USER());
    
    INSERT INTO auditoria (tabla_afectada, operacion, id_registro, valores_anteriores, usuario)
    VALUES ('users', 'DELETE', OLD.id, 
            CONCAT('{cedula:"', OLD.cedula, 
                  '", nombres:"', IFNULL(OLD.nombres, 'NULL'), 
                  '", correo:"', IFNULL(OLD.correo, 'NULL'), 
                  '", telefono:"', IFNULL(OLD.telefono, 'NULL'), 
                  '", contrasena:"[REDACTED]", id_rol:', IFNULL(OLD.id_rol, 'NULL'), 
                  ', id_estado:', IFNULL(OLD.id_estado, 'NULL'), '}'),
            usuario_operacion); -- ¡Sin paréntesis aquí!
END //
DELIMITER ;