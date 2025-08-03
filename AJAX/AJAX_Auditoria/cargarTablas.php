<?php
include("../../Configuration/Configuration.php");
include("../../Layout/mensajes.php");

/* ASGINAMOS GRADO A PARTIR DE LA CATGORIA SELECCIONADA */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['action']) && $_POST['action'] === 'cargar_tablas') {
    try {
        // Consulta SQL para obtener las tablas
        $stmt = $pdo->query("SHOW TABLES");
        
        // Mapeo de nombres técnicos a nombres amigables
        $nombresAmigables = [
            'users' => 'Usuarios del Sistema',
            'estudiantes' => 'Registro de Estudiantes',
            'profesores' => 'Cuerpo Docente',
            'materias' => 'Plan de Estudios',
            'aulas' => 'Aulas y Espacios',
            'horarios' => 'Horarios Académicos',
            'calificaciones' => 'Registro de Calificaciones',
            'actividades' => 'Actividades Primaria',
            'contacto_pago' => 'Contacto de Pago',
            'estado' => 'Estado Usuarios',
            'grados' => 'Grados de la Institución',
            'grado_materia' => 'Asignaturas asignadas a grados',
            'inscripciones' => 'Inscripciones estudiantes',
            'materias_pendientes' => 'Asignaturas pendientes',
            'profesor_grado' => 'Profesores asignados a grados',
            'profesor_materia_grado' => 'Profesor asignado a grado y asignatura',
            'representantes' => 'Representantes de estudiantes',
        ];
        
        if ($stmt->rowCount() > 0) {
            // Primera opción por defecto
            echo '<option value="">Todas las tablas</option>';
            
            while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
                $nombreTabla = $fila[0]; // SHOW TABLES retorna un array numérico
                $nombreMostrar = $nombresAmigables[$nombreTabla] ?? ucfirst(str_replace('_', ' ', $nombreTabla));
                
                echo '<option value="' . htmlspecialchars($nombreTabla) . '">' . 
                     htmlspecialchars($nombreMostrar) . '</option>';
            }
        } else {
            echo '<option value="">No hay tablas en la base de datos</option>';
        }
    } catch (PDOException $e) {
        echo '<option value="">Error al cargar las tablas</option>';
        // Para depuración (quitar en producción):
        error_log("Error al cargar tablas: " . $e->getMessage());
    }
    exit; // Importante para evitar que se envíe más contenido
}
}
