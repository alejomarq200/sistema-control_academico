<?php
require('../fpdf/fpdf.php');
require('../Configuration/Configuration.php');
date_default_timezone_set('America/Caracas');

class PDF extends FPDF {
    // Cabecera de página
    function Header() {
        // Logo
        //$this->Image('../img/logo.png', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Reporte de Auditoria', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer() {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
    
    // Función mejorada para limpiar el formato específico de tus datos
    function limpiarDatosAuditoria($data) {
        if (empty($data)) return 'Sin datos';
        
        // Si parece contener el formato {clave:"valor",...}
        if (strpos($data, '{') === 0 && strpos($data, '}') !== false) {
            // Extraemos el contenido entre llaves
            $contenido = substr($data, 1, -1);
            
            // Dividimos por comas para obtener los pares clave-valor
            $pares = explode(',', $contenido);
            
            $camposTraducidos = [
                'anio_escolar' => 'Año',
                'id_grado' => 'Grado',
                'lapso_academico' => 'Lapso',
                'id_profesor' => 'Profesor',
                'id_materia' => 'Materia',
                'id_estudiante' => 'Estudiante',
                'calificacion' => 'Calificación',
                'actividad' => 'Actividad',
                'tipo_actividad' => 'Tipo',
                'promedio' => 'Promedio'
            ];
            
            $resultado = [];
            foreach ($pares as $par) {
                // Dividimos cada par en clave y valor
                $partes = explode(':', $par, 2);
                if (count($partes) === 2) {
                    $clave = trim($partes[0]);
                    $valor = trim($partes[1]);
                    
                    // Limpiamos comillas si existen
                    $clave = str_replace(['"', "'"], '', $clave);
                    $valor = str_replace(['"', "'"], '', $valor);
                    
                    // Saltamos valores NULL
                    if ($valor === 'NULL') continue;
                    
                    // Traducimos la clave si está en nuestro mapeo
                    $claveMostrar = $camposTraducidos[$clave] ?? $clave;
                    
                    $resultado[] = "$claveMostrar: $valor";
                }
            }
            
            return implode(' - ', $resultado);
        }
        
        // Si no coincide con el formato esperado, devolvemos el dato tal cual
        return $data;
    }

}

// Recibir parámetros
$usuario = $_POST['usuarioAuditoria'] ?? '';
$tabla = $_POST['tablaAuditoria'] ?? '';
$operacion = $_POST['operacionAuditoria'] ?? '';
$fechaInicio = $_POST['fechaInicioAuditoria'] ?? '';
$fechaFin = $_POST['fechaFinAuditoria'] ?? '';

// Crear PDF en orientación horizontal
$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// Construir consulta SQL
$sql = 'SELECT * FROM auditoria WHERE usuario = :usuario AND tabla_afectada = :tabla_afectada AND operacion = :operacion';

if ($fechaInicio && $fechaFin) {
    $sql .= ' AND fecha_hora BETWEEN :fechaInicio AND :fechaFin';
}

$sql .= ' ORDER BY fecha_hora ASC';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
$stmt->bindValue(':tabla_afectada', $tabla, PDO::PARAM_STR);
$stmt->bindValue(':operacion', $operacion, PDO::PARAM_STR);

if ($fechaInicio && $fechaFin) {
    $fechaInicio .= ' 00:00:00';
    $fechaFin .= ' 23:59:59';
    $stmt->bindValue(':fechaInicio', $fechaInicio);
    $stmt->bindValue(':fechaFin', $fechaFin);
}

$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mostrar parámetros de filtro
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Filtros aplicados:', 0, 1);
$pdf->SetFont('Arial', '', 10);

$filtros = "Usuario: $usuario | Tabla: $tabla | Operación: $operacion";
if ($fechaInicio && $fechaFin) {
    $filtros .= " | Rango: " . substr($fechaInicio, 0, 10) . " a " . substr($fechaFin, 0, 10);
}

$pdf->MultiCell(0, 10, $filtros, 0, 'L');
$pdf->Ln(10); // Espacio antes de la tabla

// Encabezados de la tabla
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(40, 10, 'Fecha/Hora', 1, 0, 'C', true);
$pdf->Cell(100, 10, 'Valor Anterior', 1, 0, 'C', true);
$pdf->Cell(130, 10, 'Nuevo Valor', 1, 1, 'C', true);

// Datos de la tabla
$pdf->SetFillColor(255, 255, 255);
foreach ($resultados as $row) {
    $pdf->Cell(40, 10, $row['fecha_hora'], 1, 0, 'C');
    
    // Limpiar y formatear valor anterior
    $valorAnterior = $pdf->limpiarDatosAuditoria($row['valores_anteriores']);
    $pdf->Cell(100, 10, substr($valorAnterior, 0, 80), 1, 0, 'L');
    
    // Limpiar y formatear nuevo valor
    $nuevoValor = $pdf->limpiarDatosAuditoria($row['valores_nuevos']);
    $pdf->Cell(130, 10, substr($nuevoValor, 0, 80), 1, 1, 'L');
}

// Salida del PDF
$pdf->Output('I', 'Reporte_Auditoria_'.date('YmdHis').'.pdf');
?>