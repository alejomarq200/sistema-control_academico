<?php
include('../fpdf/fpdf.php');
// Incluye tu archivo con las funciones de usuarios
include('../Configuration/functions_php/functionsCRUDUser.php');

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
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'REPORTE DE USUARIOS'), 0, 1, 'C');
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
    function crearTablaUsuarios($header, $data)
    {
        $this->SetFillColor(58, 83, 155);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 10);

        // Anchuras de las columnas
        $w = array(25, 35, 45, 25, 20, 20, 20);
        $totalWidth = array_sum($w);

        // Centrar la tabla
        $pageWidth = $this->GetPageWidth();
        $marginLeft = ($pageWidth - $totalWidth) / 2;

        // Cabeceras
        $this->SetX($marginLeft);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, iconv('UTF-8', 'windows-1252', $header[$i]), 1, 0, 'C', true);
        $this->Ln();

        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 9);

        $fill = false;
        foreach ($data as $row) {
            // Mapear id_estado a su valor correspondiente
            if ($row['id_estado'] == 1) {
                $row['id_estado'] = 'Inactivo';
            } elseif ($row['id_estado'] == 2) {
                $row['id_estado'] = 'Activo';
            }

            // Mapear id_rol a su valor correspondiente
            if ($row['id_rol'] == 1) {
                $row['id_rol'] = 'Administrador';
            } elseif ($row['id_rol'] == 2) {
                $row['id_rol'] = 'Usuario';
            }
            $this->SetX($marginLeft);
            $this->Cell($w[0], 6, iconv('UTF-8', 'windows-1252', $row['cedula'] ?? ''), 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, iconv('UTF-8', 'windows-1252', $row['nombres'] ?? ''), 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, iconv('UTF-8', 'windows-1252', $row['correo'] ?? ''), 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, iconv('UTF-8', 'windows-1252', $row['telefono'] ?? ''), 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 6, '****', 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 6, $row['id_estado'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 6, $row['id_rol'] ?? '', 'LR', 0, 'C', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Línea de cierre
        $this->SetX($marginLeft);
        $this->Cell($totalWidth, 0, '', 'T');
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$header = array('Cédula', 'Nombres', 'Correo', 'Teléfono', 'Contraseña', 'Rol', 'Estado');

$estado = $_POST['estadoU'];
$rol = $_POST['RolU'];
// Obtener datos
$usuarios = reporteUsuarios($pdo, $estado, $rol);

if (empty($usuarios)) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'No se encontraron usuarios registrados.'), 0, 1);
} else {
    $pdf->crearTablaUsuarios($header, $usuarios);
}

$pdo = null;

$pdf->Output();
