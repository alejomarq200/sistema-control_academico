<?php
include('../fpdf/fpdf.php');
include("../Configuration/Configuration.php");

class PDF extends FPDF
{
    function cabeceraInstitucional($tituloLapso = '')
    {
        $this->Image('LOGO 2.png', 45, $this->GetY(), 15);
        $this->Image('LOGO1.jpg', 155, $this->GetY(), 12);
        $this->SetFont('Arial', '', 6);
        $lineHeight = 2.5;
        $y = $this->GetY() + 2;
        $this->SetY($y);
        $this->Cell(0, $lineHeight, iconv('UTF-8', 'windows-1252', 'REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
        $this->Cell(0, $lineHeight, iconv('UTF-8', 'windows-1252', 'MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'), 0, 1, 'C');
        $this->Cell(0, $lineHeight, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO PRADO DEL NORTE'), 0, 1, 'C');
        $this->Cell(0, $lineHeight, iconv('UTF-8', 'windows-1252', 'EL CUJI, ESTADO LARA'), 0, 1, 'C');
        $this->Cell(0, $lineHeight, iconv('UTF-8', 'windows-1252', 'BOLETÍN ' . $tituloLapso), 0, 1, 'C');
        $this->Ln(2);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10,  iconv('UTF-8', 'windows-1252', 'Página ' . $this->PageNo()) . '/{nb}', 0, 0, 'C');
    }
}

function obtenerNombreGrado($numeroGrado)
{
    $grados = [
        7 => '1ER AÑO',
        8 => '2DO AÑO',
        9 => '3ER AÑO',
        10 => '4TO AÑO',
        11 => '5TO AÑO',
    ];
    return $grados[$numeroGrado] ?? $numeroGrado;
}

// --- MAIN ---
$estudiantesIds = $_POST['estudiantes_seleccionados'] ?? [];
$lapso = $_POST['lapsoModalSecundaria'] ?? '';

if (empty($estudiantesIds) || $lapso !== 'All') {
    die('Datos insuficientes o lapso inválido.');
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(); // <--- Este es obligatorio antes de cualquier cabecera o Cell/Image
$pdf->SetAutoPageBreak(false);

$boletinesPorPagina = 3;
$contadorBoletin = 0;
$inicioY = 5;

$lapsos = ['1er lapso', '2do lapso', '3er lapso'];
$nombresLapsos = ['I LAPSO', 'II LAPSO', 'III LAPSO'];

foreach ($estudiantesIds as $estudianteId) {
    if ($contadorBoletin > 0 && $contadorBoletin % $boletinesPorPagina === 0) {
        $pdf->AddPage();
        $inicioY = 15;
    }

    $pdf->SetY($inicioY);
    $pdf->cabeceraInstitucional('III LAPSOS'); // <-- Se llama luego de AddPage()
    $inicioY = $pdf->GetY(); // continua después de la cabecera

    // Obtener datos del estudiante
    $sqlEstudiante = "SELECT nombres_est, apellidos_est, cedula_est FROM estudiantes WHERE id = ?";
    $stmtEst = $pdo->prepare($sqlEstudiante);
    $stmtEst->execute([$estudianteId]);
    $estudiante = $stmtEst->fetch(PDO::FETCH_ASSOC);

    $nombreCompleto = trim($estudiante['nombres_est'] . ' ' . $estudiante['apellidos_est']);
    $cedula = $estudiante['cedula_est'];

    // Obtener grado y año escolar
    $sqlDatosGenerales = "SELECT anio_escolar, id_grado FROM calificaciones WHERE id_estudiante = ? LIMIT 1";
    $stmtGen = $pdo->prepare($sqlDatosGenerales);
    $stmtGen->execute([$estudianteId]);
    $datosGenerales = $stmtGen->fetch(PDO::FETCH_ASSOC);

    // Datos generales
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(35, 6, 'Nombre y Apellido del Estudiante:', 0, 0);
    $pdf->Cell(50, 6, iconv('UTF-8', 'windows-1252', $nombreCompleto), 'B', 0, 'L');
    $pdf->Cell(10, 6, 'C.I.:', 0, 0);
    $pdf->Cell(35, 6, $cedula, 'B', 1, 'L');

    $pdf->Cell(15, 6, iconv('UTF-8', 'windows-1252', 'Año y Sección:'), 0, 0);
    $pdf->Cell(20, 6, iconv('UTF-8', 'windows-1252', obtenerNombreGrado($_POST['id_grado'])), 'B', 0, 'L');
    $pdf->Cell(25, 6, 'Periodo Escolar:');
    $pdf->Cell(5, 6, $datosGenerales['anio_escolar'], '', 1, 'C');

    // Encabezado tabla
    $pdf->SetFont('Arial', 'B', 6);
    $pdf->Cell(80, 6, 'ASIGNATURAS', 1, 0, 'C');
    foreach ($nombresLapsos as $nombreLapso) {
        $pdf->Cell(20, 6, $nombreLapso, 1, 0, 'C');
    }
    $pdf->Cell(50, 6, 'OBSERVACIONES', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 8);

    // Obtener todas las materias del estudiante
    $sqlMaterias = "SELECT DISTINCT m.id_materia, m.nombre 
                    FROM calificaciones c 
                    JOIN materias m ON c.id_materia = m.id_materia 
                    WHERE c.id_estudiante = ?";
    $stmtMat = $pdo->prepare($sqlMaterias);
    $stmtMat->execute([$estudianteId]);
    $materias = $stmtMat->fetchAll(PDO::FETCH_ASSOC);

    // Obtener promedios por lapso y materia
    $promediosPorLapso = [];

    foreach ($lapsos as $lapsoAcad) {
        $sql = "SELECT id_materia, promedio 
                FROM calificaciones 
                WHERE id_estudiante = ? AND lapso_academico = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$estudianteId, $lapsoAcad]);
        $promediosPorLapso[$lapsoAcad] = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    foreach ($materias as $materia) {
        $idMat = $materia['id_materia'];
        $nombre = iconv('UTF-8', 'windows-1252', $materia['nombre']);

        $p1 = $promediosPorLapso['1er lapso'][$idMat] ?? '-';
        $p2 = $promediosPorLapso['2do lapso'][$idMat] ?? '-';
        $p3 = $promediosPorLapso['3er lapso'][$idMat] ?? '-';

        $pdf->Cell(80, 6, $nombre, 1, 0);
        $pdf->Cell(20, 6, $p1, 1, 0, 'C');
        $pdf->Cell(20, 6, $p2, 1, 0, 'C');
        $pdf->Cell(20, 6, $p3, 1, 0, 'C');
        $pdf->Cell(50, 6, '', 1, 1);
    }

     $pdf->Ln(6);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(64, 1, '', 'B', 0);
    $pdf->Cell(62, 1, '', 0, 0);
    $pdf->Cell(62, 1, '', 'B', 1);

    $pdf->Cell(64, 5, 'Firma del Director:', 0, 0, 'C');
    $pdf->Cell(62, 5, 'SELLO', 0, 0, 'C');
    $pdf->Cell(62, 5, 'Jefe de Control de Estudio:', 0, 1, 'C');

    $pdf->Ln(8);
    $pdf->SetLineWidth(0.3);
    $pdf->Line(0, $pdf->GetY(), 285, $pdf->GetY());
    $pdf->Ln(5);

    $inicioY = $pdf->GetY();
    $contadorBoletin++;
}

$pdf->Output('I', 'Boletines_Secundaria_Tres_Lapsos.pdf');
exit;
