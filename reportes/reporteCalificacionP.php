<?php
include('../fpdf/fpdf.php');
include("../Configuration/Configuration.php");

$estudiantesIds = $_POST['estudiantes_seleccionados'] ?? [];
$idProfesor = $_POST['id_profesor'] ?? null;

if (!$idProfesor || empty($estudiantesIds)) {
    die('Datos insuficientes');
}

// Obtener datos del profesor
$sqlProfesor = "SELECT nombre FROM profesores WHERE id_profesor = ?";
$stmtProf = $pdo->prepare($sqlProfesor);
$stmtProf->execute([$idProfesor]);
$profesor = $stmtProf->fetch(PDO::FETCH_ASSOC);

// Directorio temporal para los PDFs
$tempDir = __DIR__ . '/temp_pdfs/';
if (!file_exists($tempDir)) {
    mkdir($tempDir, 0777, true);
}

$pdfFiles = [];

foreach ($estudiantesIds as $estudianteId) {
    // Obtener datos del estudiante
    $sqlEstudiante = "SELECT nombres_est, apellidos_est FROM estudiantes WHERE id = ?";
    $stmtEst = $pdo->prepare($sqlEstudiante);
    $stmtEst->execute([$estudianteId]);
    $estudiante = $stmtEst->fetch(PDO::FETCH_ASSOC);

    $nombreCompleto = trim($estudiante['nombres_est'] . ' ' . $estudiante['apellidos_est']);
    $nombreArchivoBase = 'Boletin_' . str_replace(' ', '_', $nombreCompleto);
    $nombreCarpetaZip = str_replace(' ', '_', $nombreCompleto); // Subcarpeta dentro del ZIP

    // Obtener asignaturas
    $sqlAsignaturas = "SELECT DISTINCT m.id_materia, m.nombre 
                       FROM calificaciones c 
                       JOIN materias m ON c.id_materia = m.id_materia 
                       WHERE c.id_estudiante = ?";
    $stmtAsig = $pdo->prepare($sqlAsignaturas);
    $stmtAsig->execute([$estudianteId]);
    $asignaturas = $stmtAsig->fetchAll(PDO::FETCH_ASSOC);

    if (empty($asignaturas)) {
        continue;
    }

    // Crear PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);

    // Encabezado
    $pdf->Image('LOGO 2.png', 35, 8, 25);
    $pdf->Image('LOGO1.jpg', 150, 8, 25);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetXY(5, 10);
    $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 1, 'C');
    $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'), 0, 1, 'C');
    $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO PRADO DEL NORTE'), 0, 1, 'C');
    $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'EL CUJI, ESTADO LARA'), 0, 1, 'C');
    $pdf->Ln(5);
    $pdf->Cell(0, 5, iconv('UTF-8', 'windows-1252', 'BOLETIN INFORMATIVO I LAPSO'), 0, 1, 'C');
    $pdf->Ln(8);

    // Datos personales y académicos
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60, 10, iconv('UTF-8', 'windows-1252', 'NOMBRES Y APELLIDOS DEL NIÑO(A):'), 0, 0);
    $pdf->Cell(54, 10, iconv('UTF-8', 'windows-1252', $nombreCompleto), 0, 1, 'R');

    $sqlDatosGenerales = "SELECT c.anio_escolar, c.id_grado, c.lapso_academico, p.nombre AS nombrePr
                          FROM calificaciones c
                          JOIN profesores p ON c.id_profesor = p.id_profesor
                          WHERE c.id_estudiante = ? LIMIT 1";
    $stmtGen = $pdo->prepare($sqlDatosGenerales);
    $stmtGen->execute([$estudianteId]);
    $datosGenerales = $stmtGen->fetch(PDO::FETCH_ASSOC);

    $pdf->Cell(40, 10, iconv('UTF-8', 'windows-1252', 'AÑO ESCOLAR:'), 0, 0);
    $pdf->Cell(30, 10, $datosGenerales['anio_escolar'], 0, 0);
    $pdf->Cell(20, 10, 'GRADO:', 0, 0);
    $pdf->Cell(20, 10, obtenerNombreGrado($datosGenerales['id_grado']), 0, 0);
    $pdf->Cell(35, 10, 'DOCENTE GUIA:', 0, 0);
    $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $datosGenerales['nombrePr']), 0, 1);
    $pdf->Cell(0, 10, 'EX= EXCELENTE     MB= MUY BIEN     B = BIEN     DM= DEBE MEJORAR', 0, 1, 'C');

    // Asignaturas y calificaciones
    foreach ($asignaturas as $asignatura) {
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(150, 10, iconv('UTF-8', 'windows-1252', $asignatura['nombre']), 1, 0);
        $pdf->Cell(10, 10, '', 1, 0, 'C');
        $pdf->Cell(10, 10, '', 1, 0, 'C');
        $pdf->Cell(10, 10, '', 1, 0, 'C');
        $pdf->Cell(10, 10, '', 1, 1, 'C');

        $sqlTiposActividad = "SELECT DISTINCT c.tipo_actividad 
                              FROM calificaciones c 
                              WHERE c.id_estudiante = ? AND c.id_materia = ?";
        $stmtTipos = $pdo->prepare($sqlTiposActividad);
        $stmtTipos->execute([$estudianteId, $asignatura['id_materia']]);
        $tiposActividad = $stmtTipos->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tiposActividad as $tipo) {
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(150, 10, iconv('UTF-8', 'windows-1252', ucfirst($tipo['tipo_actividad'])), 1, 0);
            $pdf->Cell(10, 10, '', 1, 0, 'C');
            $pdf->Cell(10, 10, '', 1, 0, 'C');
            $pdf->Cell(10, 10, '', 1, 0, 'C');
            $pdf->Cell(10, 10, '', 1, 1, 'C');

            $sqlCalificaciones = "SELECT c.calificacion, a.contenido FROM calificaciones c
                                  JOIN actividades a ON c.actividad = a.id_actividad
                                  WHERE c.id_estudiante = ? AND c.id_materia = ? AND c.tipo_actividad = ?";
            $stmtCalif = $pdo->prepare($sqlCalificaciones);
            $stmtCalif->execute([$estudianteId, $asignatura['id_materia'], $tipo['tipo_actividad']]);
            $calificaciones = $stmtCalif->fetchAll(PDO::FETCH_ASSOC);

            $pdf->SetFont('Arial', '', 10);
            foreach ($calificaciones as $calificacion) {
                $pdf->Cell(150, 8, iconv('UTF-8', 'windows-1252', $calificacion['contenido']), 1, 0);
                $ex = $calificacion['calificacion'] == 'EX' ? 'X' : '';
                $mb = $calificacion['calificacion'] == 'MB' ? 'X' : '';
                $b  = $calificacion['calificacion'] == 'B'  ? 'X' : '';
                $dm = $calificacion['calificacion'] == 'DM' ? 'X' : '';
                $pdf->Cell(10, 8, $ex, 1, 0, 'C');
                $pdf->Cell(10, 8, $mb, 1, 0, 'C');
                $pdf->Cell(10, 8, $b, 1, 0, 'C');
                $pdf->Cell(10, 8, $dm, 1, 1, 'C');
            }
        }
    }

    // Guardar PDF
    $fileName = $nombreArchivoBase . '.pdf';
    // Comprobar si queda poco espacio antes de agregar observaciones
    if ($pdf->GetY() > 250) {
        $pdf->AddPage();
    }

    // Espacio antes de observaciones
    $pdf->Ln(10);

    // Título "OBSERVACIONES:"
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'OBSERVACIONES:'), 0, 1);

    // Líneas para observaciones (3 líneas)
    $pdf->SetFont('Arial', '', 10);
    for ($i = 0; $i < 3; $i++) {
        $pdf->Cell(0, 8, '_______________________________________________________________________________________________', 0, 1);
    }

    // Espacio entre observaciones y firma
    $pdf->Ln(15);

    // Firma y sello (alineados a los extremos)
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(60, 8, '______________________________', 0, 0, 'L'); // Firma docente
    $pdf->Cell(70, 8, '', 0, 0);
    $pdf->Cell(60, 8, '__________________________', 0, 1, 'R'); // Sello

    // Etiquetas debajo de líneas
    $pdf->Cell(60, 5, iconv('UTF-8', 'windows-1252', 'Docente'), 0, 0, 'C');
    $pdf->Cell(70, 5, '', 0, 0);
    $pdf->Cell(60, 5, 'Sello', 0, 1, 'C');

    // Nombre del docente centrado debajo de la firma
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 8, iconv('UTF-8', 'windows-1252', $datosGenerales['nombrePr']), 0, 1, 'C');

    $filePath = $tempDir . $fileName;
    $pdf->Output('F', $filePath);

    // Almacenar ruta con subcarpeta ZIP
    $pdfFiles[] = [
        'path' => $filePath,
        'zip_path' => $nombreCarpetaZip . '/' . $fileName
    ];
}


// Crear archivo ZIP
$zipName = 'reportes_estudiantes_' . time() . '.zip';
$zipPath = $tempDir . $zipName;
$zip = new ZipArchive();

if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
    foreach ($pdfFiles as $pdf) {
        $zip->addFile($pdf['path'], $pdf['zip_path']);
    }
    $zip->close();
} else {
    die('No se pudo crear el archivo ZIP.');
}

// Enviar ZIP al navegador
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename=' . $zipName);
header('Content-Length: ' . filesize($zipPath));
readfile($zipPath);

// Limpieza opcional
foreach ($pdfFiles as $pdf) {
    unlink($pdf['path']);
}
unlink($zipPath);

unlink($zipPath);
exit;

// Función auxiliar
function obtenerNombreGrado($numeroGrado)
{
    $grados = [
        1 => '1ERO',
        2 => '2DO',
        3 => '3ERO',
        4 => '4TO',
        5 => '5TO',
        6 => '6TO'
    ];
    return $grados[$numeroGrado] ?? $numeroGrado;
}
