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
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO "PRADO DEL NORTE"'), 0, 1, 'C');
        // Ubicación
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'MINISTERIO DEL PODER POPULAR PARA LA EDUCACION'), 0, 1, 'C');
        $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO “PRADO DEL NORTE”'), 0, 1, 'C');
        $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'EL CUJI - ESTADO LARA'), 0, 1, 'C');
        $pdf->Cell(0, 3, iconv('UTF-8', 'windows-1252', 'CODIGO DEA: PD00361303'), 0, 1, 'C');
        $pdf->Ln(2);

        // Línea gruesa
        $pdf->SetLineWidth(1);
        $pdf->Line(25, $pdf->GetY(), 190, $pdf->GetY());
        $pdf->SetLineWidth(0.2);
        $pdf->Ln(10);

        // Título constancia
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'CONSTANCIA DE ESTUDIO'), 0, 1, 'C');
        $pdf->Ln(10);

        // --- CUERPO DE LA CONSTANCIA DE RETIRO ---
        $pdf->SetX(19);
        $pdf->SetFont('Arial', '', 9);
        $textoIntro = iconv('UTF-8', 'windows-1252', 'Quien suscribe,  Prof. LISBETH MONCADA., Titular de la Cédula de Identidad  N°  V-8.683.771  Directora  de  la');
        $pdf->MultiCell(0, 6, $textoIntro, 0, 'J');   //
        $pdf->Cell(115, 8, iconv('UTF-8', 'windows-1252', 'Unidad Educativa Colegio “Prado del Norte”, certifica que el (la) estudiante:'), 0, 0, 'C');
        $pdf->Cell(-5, 8, iconv('UTF-8', 'windows-1252', strtoupper($estudiante['nombres_est'] . ' ' . $estudiante['apellidos_est'])), 0, 0, 'L');
        $pdf->Cell(50, 8, '', 'B', 0);
        // Cédula del estudiante
        $cedula_est = !empty($estudiante['cedula_est']) ? $estudiante['cedula_est'] : 'S/C';
        $pdf->SetFont('Arial', '', 9);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', 'Titular de la '));
        $pdf->Ln(8);
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetX(19);

        $pdf->Write(8, iconv('UTF-8', 'windows-1252', 'Cédula de Identidad: '));
        $pdf->Cell(20, 7, iconv('UTF-8', 'windows-1252',  $cedula_est), 'B', 0, 'C');
        $pdf->SetFont('Arial', '', 8);
        $grado_texto = 'Cursó el ';
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', $grado_texto));

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(25, 7, iconv('UTF-8', 'windows-1252',strtoupper($estudiante['id_grado'])), 'B', 0, 'C');

        $pdf->SetFont('Arial', '', 8);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ' de Educación '));

        $nivel_educacion = $estudiante['categoria_grado'];
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(25, 7, strtoupper($nivel_educacion), 'B', 0, 'C');

        $pdf->SetFont('Arial', '', 8);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ' en el Período Escolar '));

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 7, iconv('UTF-8', 'windows-1252', $estudiante['anio_escolar']), 'B', 0, 'C');


        // Fecha de retiro y causa
        $fecha_retiro = date('d-m-Y');
        $causa = 'CAMBIO DE RESIDENCIA';
        $conducta = 'BUENA CONDUCTA';
        $cedula_sistema = 'V-11627737923';
        $pdf->Ln(7);

        $pdf->SetX(19);
        $pdf->SetFont('Arial', '', 8);
        $textoRetiro = 'Se Retiró de este Plantel el día ';
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', $textoRetiro));

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(20, 7, $fecha_retiro, 'B', 0, 'C');

        $pdf->SetFont('Arial', '', 8);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ', causa: '));

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(35, 7, iconv('UTF-8', 'windows-1252', $causa), 'B', 0, 'L');

        $pdf->SetFont('Arial', '', 8);
        $pdf->MultiCell(0, 8, iconv('UTF-8', 'windows-1252', 'manifestado por su representante legal. Presentando '), 0, 'J');
        $pdf->SetX(19);
        $pdf->Cell(60, 8, iconv('UTF-8', 'windows-1252', 'durante su permanencia en esta institución '), 0, 0, 'L');
        //
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(1, 8, iconv('UTF-8', 'windows-1252', $conducta . '.'), 0, '', 'L');
        $pdf->Cell(35, 6, '', 'B', 0, 'L');
        $pdf->Cell(50, 8, iconv('UTF-8', 'windows-1252', 'Fue inscrito en el sistema de gestión escolar con la siguiente '), 0, 1, 'L');
        $pdf->SetX(19);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(50, 7, iconv('UTF-8', 'windows-1252', 'cedula: N° '  . $estudiante['cedula_est']), '', 1, 'L');


        // Fecha actual
        $pdf->SetX(20);
        // Obtener fecha actual
        setlocale(LC_TIME, 'es_ES.UTF-8'); // Para sistemas que soportan locales
        $dia = date('d');
        $mes_num = date('n');
        $anio = date('Y');

        // Array de meses en español
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $mes = strtoupper($meses[$mes_num - 1]);

        // Línea de fecha final
        $textoFecha = 'Constancia que se expide a los ';
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', $textoFecha));

        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(10, 6, $dia, '', 0, 'C');

        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ' día(s) del mes de '));

        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(25, 6, $mes, 'B', 0, 'C');

        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Write(8, iconv('UTF-8', 'windows-1252', ' de '));

        $pdf->SetFont('Arial', 'B', 9.5);
        $pdf->Cell(15, 6, $anio, 'B', 0, 'C');
        $pdf->Ln(20);


        // Firma
        $pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', '_________________________'), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Prof. LISBETH MONCADA.'), 0, 1, 'C');
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'V-8.683.771'), 0, 1, 'C');
        $pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'DIRECTORA'), 0, 1, 'C');



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
        $pdf->Cell(60, 5, iconv('UTF-8', 'windows-1252', 'U.E.C  “Prado del Norte”, Ubicado en la Av. Intercomunal Cují-Tamaca Km.  08'), 0, 1, 'L');
        $pdf->SetX(60);

    }

    // Salida del PDF
    $pdf->Output('I', 'Constancias_Estudio_' . date('Ymd_His') . '.pdf');
} catch (Exception $e) {
    die("Error al generar las constancias: " . $e->getMessage());
}
