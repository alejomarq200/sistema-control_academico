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
        $this->SetX(40);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO PRADO DEL NORTE'), 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'REPORTE DE ASIGNATURAS'), 0, 1, 'C');
        $this->SetLineWidth(0.5);
        $this->Line(10, 40, 200, 40);
        $this->SetLineWidth(0.2);
        $this->Ln(15);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }

    // Crear tabla centrada
    function crearTablaAsignaturas($header, $data, $filtros)
    {
        // Mostrar filtros aplicados
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Filtros aplicados:'), 0, 1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, iconv(
            'UTF-8',
            'windows-1252',
            'Nivel: ' . ($filtros['nivel'] ?? 'Todos') .
                ' | Estado: ' . ($filtros['estado'] ?? 'Todos')
        ), 0, 1);
        $this->Ln(5);

        $this->SetFillColor(58, 83, 155);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 10);

        // Anchuras de las columnas
        $w = array(15, 90, 40, 50);
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
        $this->SetFont('Arial', '', 9);

        $fill = false;
        foreach ($data as $row) {
            // Mapear estado a texto
            $estado = ($row['id_estado'] == 1) ? 'Inactivo' : 'Activo';

            $this->SetX($marginLeft);
            $this->Cell($w[0], 6, $row['id_materia'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, iconv('UTF-8', 'windows-1252', $row['nombre'] ?? ''), 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, iconv('UTF-8', 'windows-1252', $row['nivel_materia'] ?? ''), 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $estado, 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Línea de cierre
        $this->SetX($marginLeft);
        $this->Cell($totalWidth, 0, '', 'T');
    }
}

// Obtener parámetros del formulario
$nivel = $_POST['nivelEducativoAsig'] ?? '';
$estado = $_POST['estadoAsig'] ?? '';

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$header = array('ID', 'Nombre', 'Nivel', 'Estado');

// Obtener datos con los filtros
$asignaturas = reporteAsignaturas($pdo, $nivel, $estado);

// Preparar texto de filtros para mostrar en PDF
$filtros = [
    'nivel' => $nivel ?: 'Todos',
    'estado' => $estado ? ($estado == 2 ? 'Activo' : 'Inactivo') : 'Todos'
];

if (empty($asignaturas)) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'No se encontraron asignaturas con los filtros aplicados.'), 0, 1);
} else {
    $pdf->crearTablaAsignaturas($header, $asignaturas, $filtros);
}

/* FUNCIÓN PARA OBTENER ASIGNATURAS FILTRADAS */
function reporteAsignaturas($pdo, $nivel, $estado)
{
    try {
        $sql = "SELECT id_materia, nivel_materia, nombre, id_estado FROM materias WHERE 1=1";
        $params = [];

        if (!empty($nivel)) {
            $sql .= " AND nivel_materia = :nivel";
            $params[':nivel'] = $nivel;
        }

        if (!empty($estado)) {
            $sql .= " AND id_estado = :estado";
            $params[':estado'] = $estado;
        }

        $stmt = $pdo->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        error_log("Error en reporteAsignaturas: " . $e->getMessage());
        return [];
    }
}

$pdo = null;
$pdf->Output('D', 'Reporte_Asignaturas_' . date('Y-m-d') . '.pdf'); // Forzar descarga