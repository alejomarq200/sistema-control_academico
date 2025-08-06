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
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'REPORTE DE AULAS'), 0, 1, 'C');
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
    function crearTablaAulas($header, $data, $filtros)
    {
        // Mostrar filtros aplicados
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Filtros aplicados:'), 0, 1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, iconv(
            'UTF-8',
            'windows-1252',
            'Grado: ' . ($filtros['grado'] ?? 'Todos') .
                ' | Año escolar: ' . ($filtros['anio'] ?? 'Todos') .
                ' | Estado: ' . ($filtros['estado'] ?? 'Todos')
        ), 0, 1);
        $this->Ln(5);

        $this->SetFillColor(58, 83, 155);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('Arial', 'B', 10);

        // Anchuras de las columnas
        $w = array(15, 40, 25, 40, 40, 20);
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
            $estado = ($row['estado'] == 1) ? 'Inactivo' : 'Activo';

            $this->SetX($marginLeft);
            $this->Cell($w[0], 6, $row['id_aula'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[1], 6, iconv('UTF-8', 'windows-1252', $row['nombre'] ?? ''), 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['capacidad'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 6, iconv('UTF-8', 'windows-1252', $this->getNombreGrado($row['id_grado'])), 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row['anio_escolar'] ?? '', 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 6, $estado, 'LR', 0, 'C', $fill);
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
        // Ejemplo básico - debes adaptar a tu base de datos
        $grados = [
            1 => '1er grado',
            2 => '2do grado ',
            3 => '1er año ',
            4 => '2do año ',
            // Agrega todos los grados necesarios
        ];
        return $grados[$id_grado] ?? 'Grado ' . $id_grado;
    }
}

// Obtener parámetros del formulario
$grado = $_POST['selectGrado'] ?? '';
$anio = $_POST['selectAnio'] ?? '';
$estado = $_POST['estado'] ?? '';

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$header = array('ID', 'Nombre', 'Capacidad', 'Grado', 'Año Escolar', 'Estado');

// Obtener datos con los filtros
$aulas = reporteAulas($pdo, $grado, $anio, $estado);

// Preparar texto de filtros para mostrar en PDF
$filtros = [
    'grado' => $grado ? $pdf->getNombreGrado($grado) : 'Todos',
    'anio' => $anio ?: 'Todos',
    'estado' => $estado ? ($estado == 2 ? 'Activo' : 'Inactivo') : 'Todos'
];

if (empty($aulas)) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'No se encontraron aulas con los filtros aplicados.'), 0, 1);
} else {
    $pdf->crearTablaAulas($header, $aulas, $filtros);
}

/* FUNCIÓN PARA OBTENER AULAS FILTRADAS */
function reporteAulas($pdo, $grado, $anio, $estado)
{
    try {
        $sql = "SELECT id_aula, nombre, capacidad, id_grado, anio_escolar, estado FROM aulas WHERE 1=1";
        $params = [];

        if (!empty($grado)) {
            $sql .= " AND id_grado = :grado";
            $params[':grado'] = $grado;
        }

        if (!empty($estado)) {
            $sql .= " AND estado = :estado"; // Nota: tu tabla usa "estado", no "id_estado"
            $params[':estado'] = $estado;
        }

        if (!empty($anio)) {
            $sql .= " AND anio_escolar = :anio";
            $params[':anio'] = $anio;
        }

        $stmt = $pdo->prepare($sql);

        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        error_log("Error en reporteAulas: " . $e->getMessage());
        return [];
    }
}


$pdo = null;
$pdf->Output('D', 'Reporte_Aulas_' . date('Y-m-d') . '.pdf'); // Forzar descarga
