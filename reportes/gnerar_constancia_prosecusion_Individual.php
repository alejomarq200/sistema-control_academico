<?php
require('../fpdf/fpdf.php');
require('../Configuration/Configuration.php');
date_default_timezone_set('America/Caracas');

// Obtener IDs de estudiantes desde la URL
$ids_estudiantes = explode(',', $_GET['id'] ?? '');
$ids_estudiantes = array_filter($ids_estudiantes, 'is_numeric');
$grado_promovido = $_GET['grado'] ?? null;

if (empty($ids_estudiantes)) {
    die("No se especificaron estudiantes");
}

try {
    // Consulta con JOIN
    $placeholders = implode(',', array_fill(0, count($ids_estudiantes), '?'));
    $stmt = $pdo->prepare("SELECT DISTINCT 
                                e.id, e.cedula_est, e.nombres_est, e.apellidos_est, 
                                e.f_nacimiento_est, e.lugar_nac_est, 
                                i.anio_escolar, i.grado AS grado_est, 
                                g.id_grado, g.categoria_grado
                            FROM estudiantes e
                            INNER JOIN inscripciones i ON e.id = i.id_estudiante
                            INNER JOIN grados g ON i.grado = g.id
                            WHERE e.id IN ($placeholders)");
    $stmt->execute($ids_estudiantes);
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($estudiantes)) {
        die("No se encontraron estudiantes.");
    }

    // Crear PDF
    $pdf = new FPDF();

    foreach ($estudiantes as $est) {
        $pdf->AddPage();
        $pdf->SetMargins(20, 20, 20);
        $pdf->SetAutoPageBreak(true, 20);

        // Título
        // Logos
        $pdf->Image('../imgs/logo_ministerio.png', 25, 0, 45); // (x, y, width)
        // Coordenadas base para texto institucional
        $x_left = 80;    // Inicio de la columna izquierda
        $y_top = 20;     // Altura superior del bloque
        $col_width = 58; // Ancho de cada columna
        $line_height = 5;

        // Línea vertical izquierda (antes del texto de columna 1)
        $x_left_line = $x_left - 2; // Línea justo antes del texto
        $pdf->Line($x_left_line, $y_top, $x_left_line, $y_top + ($line_height * 2));

        // Línea vertical intermedia (entre las dos columnas)
        $x_middle_line = $x_left + $col_width + 2;
        $pdf->Line($x_middle_line, $y_top, $x_middle_line, $y_top + ($line_height * 2));

        // Fuente
        $pdf->SetFont('Arial', '', 9);

        // Primera fila
        $pdf->SetXY($x_left, $y_top);
        $pdf->Cell($col_width, $line_height, iconv('UTF-8', 'windows-1252', 'Despacho del'), 0, 0, 'L');
        $pdf->SetXY($x_middle_line + 2, $y_top);
        $pdf->Cell($col_width, $line_height, iconv('UTF-8', 'windows-1252', 'Dirección General de'), 0, 1, 'L');

        // Segunda fila
        $pdf->SetXY($x_left, $y_top + $line_height);
        $pdf->Cell($col_width, $line_height, iconv('UTF-8', 'windows-1252', 'Viceministro de Educación'), 0, 0, 'L');
        $pdf->SetXY($x_middle_line + 2, $y_top + $line_height);
        $pdf->Cell($col_width, $line_height, iconv('UTF-8', 'windows-1252', 'Registro y Control Académico'), 0, 1, 'L');
        $pdf->Ln(10); // Espacio después de los logos para el título
        $pdf->Image('../imgs/logo_escudo.jpg', 95, 38, 20);     // centrado en el medio (ajusta si es necesario)

        $pdf->Ln(30); // Espacio después de los logos para el título

        $pdf->SetFont('Arial', 'B', 13);
        $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'CONSTANCIA DE PROSECUCIÓN EN EL NIVEL DE EDUCACIÓN MEDIA'), 0, 1, 'C');
        $pdf->Ln(5);

        // Cuerpo
        $pdf->SetFont('Arial', '', 9.5);
        $pdf->MultiCell(0, 5, iconv(
            'UTF-8',
            'windows-1252',
            "Quien suscribe ________________________________________________________________, titular de la cédula de identidad ______________________________________, en su condición de Director(a) (E) del ________________________________________________________________________, ubicado en el "
        ));
        $pdf->Ln(5);

        $pdf->SetX(40);
        $pdf->Cell(10, -5, 'municipio                    Iribarren', '', 0, 'C');
        $pdf->Cell(45, 0, '', 'B', 0, 'C');
        $pdf->Cell(20, -6, 'parroquia', '', 1, 'C');
        $pdf->SetX(120);
        $pdf->Cell(70, 5, 'Santa Eduvigis', 'B', 1, 'C');
        $pdf->Ln(2);
        $pdf->SetX(19);
        $pdf->Cell(62, 5, 'adscrito a la Zona Educativa del estado', '', 0, 'C');
        $pdf->Cell(60, 5, 'Lara', 'B', 1, 'C');
        $pdf->Ln(2);

        // Formato de nombre completo
        $nombre_completo = strtoupper($est['nombres_est'] . ' ' . $est['apellidos_est']);
        $cedula_escolar = $est['cedula_est'] ?: 'S/C';
        $lugar_nac = strtoupper($est['lugar_nac_est'] ?: '__________________');
        $fecha_nac = $est['f_nacimiento_est'];


        $pdf->SetX(19);
        // En la sección donde muestras el grado promovido:
        $pdf->SetX(19);
        $pdf->Cell(85, 7, 'Certifica por medio de la presente que el (la) estudiante', '', 0, 'C');
        $pdf->Cell(60, 5, strtoupper($est['nombres_est'] . ' ' . $est['apellidos_est']), 'B', 0, 'C');
        $pdf->Cell(20, 5, ' nacido (a) en ', '', 1, 'C');
        $pdf->Cell(60, 5, strtoupper($est['lugar_nac_est'] ?: '__________________'), 'B', 0, 'C');
        $pdf->Cell(20, 7, ' en fecha  ', '', 0, 'C');
        $pdf->Cell(40, 5, $est['f_nacimiento_est'], 'B', 0, 'C');
        $pdf->Cell(20, 7, ' curso el   ', '', 0, 'C');
        $pdf->Cell(20, 5, $est['id_grado'], 'B', 1, 'C');
        $pdf->Cell(40, 7, iconv('UTF-8', 'windows-1252', 'correspondiéndole el literal'), '', 0, 'C');
        $pdf->Cell(20, 5, '', 'B', 0, 'C');
        $pdf->Cell(40, 7, iconv('UTF-8', 'windows-1252', 'siendo promovido (a) al '), '', 0, 'C');

        // Aquí usamos el grado recibido por URL
        $pdf->Cell(20, 5, $grado_promovido ?: '', 'B', 0, 'C'); // <-- Línea modificada

        $pdf->Cell(40, 7, iconv('UTF-8', 'windows-1252', 'GRADO del nivel'), '', 1, 'C');
        $pdf->Cell(35, 7, iconv('UTF-8', 'windows-1252', 'de Educacion ' . $est['categoria_grado'] . '.'), '', 1, 'C');
        $pdf->Ln(15);

        // Fecha actual
        $dia = date('d');
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $mes = strtoupper($meses[date('n') - 1]);
        $anio = date('Y');

        $pdf->Cell(45, 7, 'Constancia que se expide en ', '', 0, 'C');
        $pdf->Cell(25, 5, 'Barquisimeto', 'B', 0, 'C');
        $pdf->Cell(15, 7, ' a los ', '', 0, 'C');
        $pdf->Cell(15, 5, $dia, 'B', 0, 'C');
        $pdf->Cell(28, 7,  iconv('UTF-8', 'windows-1252', ' días del mes de '), '', 0, 'C');
        $pdf->Cell(15, 5, $mes, 'B', 0, 'C');
        $pdf->Cell(12, 7, ' de ', '', 0, 'C');
        $pdf->Cell(15, 5, $anio, 'B', 1, 'C');
        // Posicionamiento inicial (después de la fecha)
        $pdf->Ln(35); // Espaciado antes de los cuadros

        // Coordenadas actuales
        $x_start = $pdf->GetX();
        $y_start = $pdf->GetY();

        // Dimensiones
        $box_width = 75;
        $box_height = 8;
        $line_spacing = 6;

        // Cuadro: Autoridad Educativa
        $pdf->SetXY($x_start, $y_start);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell($box_width, $box_height, iconv('UTF-8', 'windows-1252', 'Autoridad Educativa'), 1, 2, 'C');

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell($box_width, $box_height, 'Director(a)', 1, 2, 'L');
        $pdf->Cell($box_width, $box_height, iconv('UTF-8', 'windows-1252', 'Número de C.I'), 1, 2, 'L');
        $pdf->Cell($box_width, 25, 'Firma:', 1, 2, 'L');

        // Cuadro: Sello del Plantel (a la derecha)
        $x_right = $x_start + $box_width + 20; // 20 mm de espacio entre cuadros
        $pdf->SetXY($x_right, $y_start);

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell($box_width, 48, iconv('UTF-8', 'windows-1252', 'SELLO DEL PLANTEL'), 1, 2, 'C');

        // Pie de página personalizado
        $pdf->SetY(-30); // Posicionarse a 15mm del fondo
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Certificado válido a nivel nacional e internacional.'), 0, 0, 'L');
    }

    // Salida del PDF
    $pdf->Output('I', 'Constancias_Prosecucion_' . date('Ymd_His') . '.pdf');
} catch (Exception $e) {
    die("Error al generar las constancias: " . $e->getMessage());
}
