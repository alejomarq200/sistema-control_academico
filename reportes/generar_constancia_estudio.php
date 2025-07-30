<?php
require('../fpdf/fpdf.php');
require('../Configuration/Configuration.php');
date_default_timezone_set('America/Caracas');

// Obtener IDs de estudiantes desde la URL
$ids_estudiantes = explode(',', $_GET['ids'] ?? '');
$ids_estudiantes = array_filter($ids_estudiantes, 'is_numeric');

if (empty($ids_estudiantes)) {
    die("No se especificaron estudiantes");
}

try {
    // Obtener datos de todos los estudiantes
    $placeholders = implode(',', array_fill(0, count($ids_estudiantes), '?'));
    $stmt = $pdo->prepare("SELECT DISTINCT e.*, i.anio_escolar, g.categoria_grado, g.id_grado
                          FROM estudiantes e
                          LEFT JOIN inscripciones i ON e.id = i.id_estudiante
                          LEFT JOIN grados g ON i.grado = g.id 
                          WHERE e.id IN ($placeholders)");
    $stmt->execute($ids_estudiantes);
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($estudiantes)) {
        die("No se encontraron estudiantes.");
    }

    // Crear PDF
    $pdf = new FPDF();
    
    foreach ($estudiantes as $estudiante) {
        // Agregar nueva página para cada estudiante
        $pdf->AddPage();
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetAutoPageBreak(true, 20);
        
        // --- ENCABEZADO ---
        // Logo
        $pdf->Image('../imgs/logo_ministerio.png', 10, -8, 45);
        
        // Título del colegio centrado
        $pdf->SetY(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO "PRADO DEL NORTE"'), 0, 1, 'C');
        
        // Ubicación
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'EL CUJI - ESTADO LARA'), 0, 1, 'C');
        
        // Línea gruesa
        $pdf->SetLineWidth(1);
        $pdf->Line(25, $pdf->GetY(), 190, $pdf->GetY());
        $pdf->SetLineWidth(0.2);
        $pdf->Ln(10);
        
        // Título constancia
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'CONSTANCIA DE ESTUDIO'), 0, 1, 'C');
        $pdf->Ln(10);
        
        // --- CUERPO DE LA CONSTANCIA ---
        $pdf->SetX(18);
        $pdf->SetFont('Arial', '', 8.2);
        $textoIntro = iconv('UTF-8', 'windows-1252', 'Quien suscribe Prof. Lisbeth Moncada, titular de la Cédula de Identidad V-8.683.771 DIRECTORA de la U.E Colegio "Prado del Norte"');
        $pdf->MultiCell(0, 6, $textoIntro, 0, 'J');
        
        $pdf->SetX(80);
        $ceritifica = iconv('UTF-8', 'windows-1252', '  certifica que el (la) Estudiante:');
        $pdf->MultiCell(0, 8, $ceritifica, 0, 'J');
        
        // Nombre del estudiante
        $pdf->SetX(70);
        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(70, 8, iconv('UTF-8', 'windows-1252', $estudiante['nombres_est'] . ' ' . $estudiante['apellidos_est']), 0, 1, 'C');
        $pdf->SetX(70);
        $pdf->Cell(70, 1, '', 'B', 1, 'C');
        $pdf->Ln(2);
        
        // Cédula
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', 'Titular de la Cédula de Identidad N° V-'));
        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(40, 7, $estudiante['cedula_est'], 'B', 0, 'C');
        
        // Grado
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(7, iconv('UTF-8', 'windows-1252', 'Está Cursando el '));
        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(25, 7, iconv('UTF-8', 'windows-1252', $estudiante['id_grado']), 'B', 1, 'C');
        
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(25, 7, iconv('UTF-8', 'windows-1252', ' de Educación '), 'B', 0, 'C');
        
        // Nivel educativo
        $nivel_educacion = (strpos($estudiante['categoria_grado'], 'grado') !== false) ? 'Primaria' : 'Secundaria';
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(30, 7, $nivel_educacion, 'B', 0, 'C');
        
        $pdf->SetFont('Arial', '', 9.5);
        $textoPeriodo = iconv('UTF-8', 'windows-1252', ' en el Periodo Escolar ');
        $pdf->Write(8, $textoPeriodo);
        
        // Periodo escolar
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(30, 7, $estudiante['anio_escolar'], 'B', 0, 'C');
        $pdf->Ln(10);
        
        // Fecha actual
        $pdf->SetX(20);
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $fecha_texto = iconv('UTF-8', 'windows-1252', 'Constancia que se hace a petición de la parte interesada a los ');
        $pdf->Write(8, $fecha_texto);
        
        // Día
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(10, 8, date('d'), '', 0, 'C');
        
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ' Día(s) del mes de '));
        
        // Mes
        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(20, 8, $meses[date('n') - 1], 'B', 0, 'C');
        
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ' de '));
        
        // Año
        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(14, 8, date('Y'), 'B', 0, 'C');
        $pdf->Ln(20);
        
        // Firma
        $pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', '_________________________'), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Lisbeth Moncada'), 0, 1, 'C');
        $pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'C.I. V-8.683.771'), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'DIRECTORA'), 0, 1, 'C');
        $pdf->Ln(5);
        
        // Footer
        $pdf->SetFont('Arial', 'I', 9.5);
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'U.E. Colegio "Prado del Norte"'), 0, 1, 'C');
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Av. Intercomunal Cují-Tamaca Km. 08'), 0, 1, 'C');
        
        // Línea gruesa del footer
        $pdf->SetY(-32);
        $pdf->SetLineWidth(1);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->Line(25, $pdf->GetY(), 190, $pdf->GetY());
        $pdf->SetLineWidth(0.2);
        $pdf->Ln(2);
        $pdf->SetX(60);
        
        // Datos del colegio
        $pdf->SetFont('Arial', 'I', 9);
        $pdf->Cell(60, 5, iconv('UTF-8', 'windows-1252', 'U.E. Colegio "Prado del Norte"  Av. Intercomunal Cují-Tamaca Km. 08'), 0, 1, 'L');
        $pdf->SetX(60);
        
        // Teléfono
        $pdf->Cell(60, 5, iconv('UTF-8', 'windows-1252', 'Telf: 0416-6014149'), 0, 1, 'R');
    }

    // Salida del PDF
    $pdf->Output('I', 'Constancias_Estudio_' . date('Ymd_His') . '.pdf');
} catch (Exception $e) {
    die("Error al generar las constancias: " . $e->getMessage());
}