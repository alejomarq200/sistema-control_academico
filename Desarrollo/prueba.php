<?php
require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Encabezado
$pdf->Cell(190, 10, 'IV. Planteles donde curso estos estudios:', 0, 1, 'C');
$pdf->Ln(5);

// Columnas
$colWidth = 90; // ancho de cada columna
$rowHeight = 8;

$planteles = [
    ['Nº' => '1', 'Nombre' => 'U.E.C. PRADO DEL NORTE', 'Localidad' => 'EL CUJI', 'E.F.' => 'LA'],
    ['Nº' => '2', 'Nombre' => '*************', 'Localidad' => '************', 'E.F.' => '****'],
    ['Nº' => '3', 'Nombre' => '*************', 'Localidad' => '************', 'E.F.' => '****'],
    ['Nº' => '4', 'Nombre' => '*************', 'Localidad' => '************', 'E.F.' => '****'],
    ['Nº' => '5', 'Nombre' => '*************', 'Localidad' => '************', 'E.F.' => '****'],
];

// Separar en dos columnas
$leftCol = [$planteles[0], $planteles[1]];
$rightCol = [$planteles[2], $planteles[3], $planteles[4]];

// Altura máxima de la tabla para alinear ambas columnas
$maxRows = max(count($leftCol), count($rightCol));

for ($i = 0; $i < $maxRows; $i++) {
    // Izquierda
    if (isset($leftCol[$i])) {
        $data = $leftCol[$i];
        $pdf->Cell(10, $rowHeight, $data['Nº'], 1);
        $pdf->Cell(45, $rowHeight, $data['Nombre'], 1);
        $pdf->Cell(25, $rowHeight, $data['Localidad'], 1);
        $pdf->Cell(10, $rowHeight, $data['E.F.'], 1);
    } else {
        $pdf->Cell($colWidth, $rowHeight, '', 0);
    }

    // Espacio entre columnas
    $pdf->Cell(5, $rowHeight, '', 0);

    // Derecha
    if (isset($rightCol[$i])) {
        $data = $rightCol[$i];
        $pdf->Cell(10, $rowHeight, $data['Nº'], 1);
        $pdf->Cell(45, $rowHeight, $data['Nombre'], 1);
        $pdf->Cell(25, $rowHeight, $data['Localidad'], 1);
        $pdf->Cell(10, $rowHeight, $data['E.F.'], 1);
    }

    $pdf->Ln();
}

$pdf->Output();
