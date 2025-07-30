<?php
require('../fpdf/fpdf.php');
require('../Configuration/Configuration.php');
date_default_timezone_set('America/Caracas');


$stmtPlanilla = $pdo->prepare('SELECT id FROM estudiantes ORDER BY id DESC LIMIT 1');
$stmtPlanilla->execute();
$resultadoPlanilla = $stmtPlanilla->fetch(PDO::FETCH_ASSOC);

// Obtener el último estudiante registrado
$stmt = $pdo->prepare('SELECT e.*, i.anio_escolar, g.categoria_grado, g.id_grado
                      FROM estudiantes e
                      LEFT JOIN inscripciones i ON e.id = i.id_estudiante
                      LEFT JOIN grados g ON i.grado = g.id WHERE e.id = ? ORDER BY e.id DESC LIMIT 1');

$stmt->execute([$resultadoPlanilla['id']]);
$estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$estudiante) {
    die("No se encontró el estudiante.");
}

// Crear PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(20, 15, 20);
$pdf->SetAutoPageBreak(true, 15);

// Logo a la izquierda
$pdf->Image('../imgs/logo_ministerio.png', 22, -7, 38); // (x, y, ancho)

// Ajustar margen izquierdo después del logo
$pdf->SetY(10); // Alinea vertical con el logo
$pdf->SetX(40); // Desplazamiento hacia la derecha para dejar espacio al logo

// Línea 1: Nombre de la unidad educativa (negrita y centrado)
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO “PRADO DEL NORTE”'), 0, 1, 'C');

// Línea 2: Ubicación
$pdf->SetFont('Arial', '', 11);
$pdf->SetX(40); // Reajuste por si se cambia Y
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'EL CUJI – ESTADO LARA         Código DEA: PD00361303'), 0, 1, 'C');

// Espacio inferior
$pdf->Ln(8);


// Configurar fuente
$pdf->SetFont('Arial', '', 9.5);

// Encabezado
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'CARTA DE ACEPTACION', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 9.8);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', 'Quien suscribe, '));

// Parte subrayada y en negrita
$pdf->SetFont('Arial', 'BU', 9.8);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', 'Prof. LISBETH MONCADA,'));

// Volver al estilo normal
$pdf->SetFont('Arial', '', 9.8);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', '  Titular de la Cédula de Identidad '));

// Parte subrayada y en negrita
$pdf->SetFont('Arial', 'BU', 9.5);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', ' N° V-8.683.771'));

// Volver al estilo normal
$pdf->SetFont('Arial', '', 10);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', ' coordinadora de control de estudio de la '));
// Parte subrayada y en negrita
$pdf->SetFont('Arial', 'BU', 10);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', ' Unidad Educativa Colegio "Prado del Norte"'));
// Volver al estilo normal
$pdf->SetFont('Arial', '', 10);
$pdf->Write(6, iconv('UTF-8', 'windows-1252', ' certifica que el (la) '));

$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->SetX(19); // Margen izquierdo si lo necesitas

$pdf->Write(6, iconv('UTF-8', 'windows-1252', ' estudiante(a): '));
// Nombre del estudiante (subrayado)
$pdf->SetFont('Arial', 'B', 9.2);
$pdf->Cell(50, 6, iconv('UTF-8', 'windows-1252', '' . $estudiante['nombres_est'] . ' ' . $estudiante['apellidos_est']), 'B', 0, 'C');
$pdf->SetFont('Arial', '', 9.2);
$pdf->Cell(55, 6, iconv('UTF-8', 'windows-1252', 'Titular de la Cédula de Identidad N° V-'), 0, 0);
$pdf->Cell(25, 6, iconv('UTF-8', 'windows-1252', $estudiante['cedula_est']), 'B', 0, 'C');
// Grado y año escolar
$pdf->MultiCell(0, 6, iconv('UTF-8', 'windows-1252', 'le fue '), 0, 'J');
$pdf->Cell(40, 6, iconv('UTF-8', 'windows-1252', ' asignado cupo para cursar'), 0, 0, 'C');
$pdf->Cell(30, 6, iconv('UTF-8', 'windows-1252', $estudiante['id_grado']), 'B', 0, 'C');
$pdf->Cell(20, 6, iconv('UTF-8', 'windows-1252', 'de Educación'), 0, 0);
$pdf->Cell(28, 6, iconv('UTF-8', 'windows-1252',  $estudiante['categoria_grado']), 'B', 0, 'C');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'correspondiente al periodo escolar'), 0, 1);

// Periodo escolar
// Obtener el año escolar separado
if (!empty($estudiante['anio_escolar']) && strpos($estudiante['anio_escolar'], '-') !== false) {
    // Si ya existe el año escolar en formato AAAA-AAAA
    list($anio_inicio, $anio_fin) = explode('-', $estudiante['anio_escolar']);
    $anio1 = substr($anio_inicio, -2); // Últimos 2 dígitos
    $anio2 = substr($anio_fin, -2);    // Últimos 2 dígitos
} else {
    // Si no existe, usar el año actual y siguiente
    $anio_actual = date('Y');
    $anio1 = substr($anio_actual, -2);
    $anio2 = substr($anio_actual + 1, -2);
}

// Mostrar el año escolar separado con subrayado
$pdf->Cell(7, 6, iconv('UTF-8', 'windows-1252', '20'), 0, 0, 'C');
$pdf->Cell(10, 6, iconv('UTF-8', 'windows-1252', $anio1), 'B', 0, 'C'); // Parte subrayada (ej: 25)
$pdf->Cell(7, 6, iconv('UTF-8', 'windows-1252', '-20'), 0, 0, 'C');
$pdf->Cell(10, 6, iconv('UTF-8', 'windows-1252', $anio2), 'B', 0, 'C'); // Parte subrayada (ej: 26)
$pdf->Cell(1, 10, iconv('UTF-8', 'windows-1252', '.'), 0, 0, 'C');

//$pdf->Cell(40, 6, iconv('UTF-8', 'windows-1252', $anio_escolar), 'B', 0, 'C');
$pdf->Cell(0, 6, '', 0, 1);
// Fecha actual
$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
$fecha_actual = date('d') . ' día(s) del mes de ' . $meses[date('n') - 1] . ' de ' . date('Y');
$pdf->MultiCell(0, 6, iconv('UTF-8', 'windows-1252', 'Constancia que se expide a los ' . $fecha_actual . '.'), 0, 'J');
$pdf->Ln(20);

// Firma y sello
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', '___________________________'), 0, 1, 'C');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Prof. Lisbeth Moncada'), 0, 1, 'C');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'C.I. V-8.683.771'), 0, 1, 'C');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'DIRECTORA'), 0, 1, 'C');
$pdf->Ln(5);
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'U.E.C "Prado del Norte"'), 0, 1, 'C');
$pdf->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Ubicado en la Av. Intercomunal Cují-Tamaca Km. 08'), 0, 1, 'C');

// Salida del PDF
$pdf->Output('I', 'Carta_Aceptacion_' . $estudiante['cedula_est'] . '.pdf');
exit;
