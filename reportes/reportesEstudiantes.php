<?php
include('../fpdf/fpdf.php');
include('../Configuration/Configuration.php');

// Clase extendida para soportar UTF-8
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial', '', 10);
        $this->SetXY(140, 10);
        $this->Cell(50, 5, iconv('UTF-8', 'windows-1252', 'Fecha de emisión: ' . date('d/m/Y')), 0, 1, 'R');
        $this->Image('LOGO.jpg', 10, 8, 25);
        $this->SetFont('Arial', 'B', 14);
        $this->SetX(20);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO PRADO DEL NORTE'), 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'REPORTE DE ESTUDIANTES'), 0, 1, 'C');
        $this->SetLineWidth(0.5);
        $this->Line(10, 40, 200, 40);
        $this->SetLineWidth(0.2);
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }

    // Crear tabla centrada
    function crearTablaEstudiantes($header, $data, $filtros)
    {
        // Mostrar filtros aplicados
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Filtros aplicados:'), 0, 1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, iconv(
            'UTF-8',
            'windows-1252',
            'Nivel: ' . ($filtros['nivel'] ?? 'Todos') .
                ' | Grado: ' . ($filtros['grado'] ?? 'Todos') .
                ' | Género: ' . ($filtros['genero'] ?? 'Todos') .
                ' | Año escolar: ' . ($filtros['anio'] ?? 'Todos')
        ), 0, 1);
        $this->Ln(5);

        $this->SetFillColor(58, 83, 155);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 9);

        // Anchuras de las columnas (ajustadas para información importante)
        $w = array(15, 25, 40, 30, 15, 20, 25, 20);
        $totalWidth = array_sum($w);

        // Centrar la tabla
        $pageWidth = $this->GetPageWidth();
        $marginLeft = ($pageWidth - $totalWidth) / 2;

        // Cabeceras
        $this->SetX($marginLeft);
        foreach ($header as $i => $col) {
            $this->Cell($w[$i], 7, iconv('UTF-8', 'windows-1252', $col), 1, 0, 'C', true);
        }
        $this->Ln();

        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 8);

        $fill = false;
        foreach ($data as $row) {
            $this->SetX($marginLeft);
            $this->Cell($w[0], 6, $row['id'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, $row['cedula_est'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[2], 6, iconv('UTF-8', 'windows-1252', ($row['nombres_est'] ?? '') . ' ' . ($row['apellidos_est'] ?? '')), 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['sexo'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, $row['edad_est'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 6, $this->getNombreGrado($row['grado_est']), 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 6, $row['anio_escolar'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[7], 6, ($row['alergias_est'] ? 'Sí' : 'No'), 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Línea de cierre
        $this->SetX($marginLeft);
        $this->Cell($totalWidth, 0, '', 'T');
    }

    // Función para obtener nombre del grado
    function getNombreGrado($id_grado)
    {
        $grados = [
            1 => '1er Grado',
            2 => '2do Grado',
            3 => '3er Grado',
            4 => '4to Grado',
            5 => '5to Grado',
            6 => '6to Grado',
            7 => '1er Año',
            8 => '2do Año',
            9 => '3er Año',
            10 => '4to Año',
            11 => '5to Año'
        ];
        return $grados[$id_grado] ?? 'Grado ' . $id_grado;
    }
}

// Obtener parámetros del formulario
$nivel = $_POST['nivelEducativoEst'] ?? '';
$grado = $_POST['selectGradoEst'] ?? '';
$genero = $_POST['generoEst'] ?? '';
$anio = $_POST['selectAnio'] ?? '';

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Columnas del reporte (solo información importante)
$header = array('ID', 'Cédula', 'Nombre Completo', 'Género', 'Edad', 'Grado', 'Año Escolar', 'Alergias');

// Obtener datos con los filtros
$estudiantes = reporteEstudiantes($pdo, $nivel, $grado, $genero, $anio);

// Preparar texto de filtros para mostrar en PDF
$filtros = [
    'nivel' => $nivel ?: 'Todos',
    'grado' => $grado ? $pdf->getNombreGrado($grado) : 'Todos',
    'genero' => $genero ?: 'Todos',
    'anio' => $anio ?: 'Todos'
];

if (empty($estudiantes)) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'No se encontraron estudiantes con los filtros aplicados.'), 0, 1);
} else {
    $pdf->crearTablaEstudiantes($header, $estudiantes, $filtros);
}

/* FUNCIÓN PARA OBTENER ESTUDIANTES FILTRADOS */
function reporteEstudiantes($pdo, $nivel, $grado, $genero, $anio)
{
    try {
        // Construir consulta con JOIN a inscripciones
        $sql = "SELECT DISTINCT e.id, e.cedula_est, e.nombres_est, e.apellidos_est, e.sexo, 
                       e.edad_est, e.grado_est, e.alergias_est,
                       i.anio_escolar
                FROM estudiantes e
                INNER JOIN inscripciones i ON e.id = i.id_estudiante
                WHERE 1=1";

        $params = [];

        // Aplicar filtros si existen
        if (!empty($nivel)) {
            // Asume que el nivel está relacionado con el grado (1-6 Primaria, 7-11 Secundaria)
            if ($nivel == 'Primaria') {
                $sql .= " AND e.grado_est BETWEEN 1 AND 6";
            } elseif ($nivel == 'Secundaria') {
                $sql .= " AND e.grado_est BETWEEN 7 AND 11";
            }
        }

        if (!empty($grado)) {
            $sql .= " AND e.grado_est = :grado";
            $params[':grado'] = $grado;
        }

        if (!empty($genero)) {
            $sql .= " AND e.sexo = :genero";
            $params[':genero'] = $genero;
        }

        if (!empty($anio)) {
            $sql .= " AND i.anio_escolar = :anio";
            $params[':anio'] = $anio;
        }

        $sql .= " ORDER BY e.grado_est, e.apellidos_est, e.nombres_est";

        $stmt = $pdo->prepare($sql);

        // Bind de parámetros
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        error_log("Error en reporteEstudiantes: " . $e->getMessage());
        return [];
    }
}

$pdo = null;
$pdf->Output('D', 'Reporte_Estudiantes_' . date('Y-m-d') . '.pdf'); // Forzar descarga
