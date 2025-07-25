<?php
require('../fpdf/fpdf.php'); // Asegúrate de ajustar la ruta
require('../Configuration/Configuration.php'); // Tu conexión PDO

$id_estudiante = $_GET['id'];

// Obtener datos base del estudiante, inscripción, grado, contacto de pago (uno de los representantes)
$sql = "SELECT 
            e.*, 
            i.anio_escolar, i.fecha_inscripcion, i.grado AS grado_id,
            g.id_grado, g.categoria_grado,
            cp.*
        FROM estudiantes e
        LEFT JOIN inscripciones i ON e.id = i.id_estudiante
        LEFT JOIN grados g ON i.grado = g.id
        LEFT JOIN contacto_pago cp ON cp.id = i.responsable_pago
        WHERE e.id = ? LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id_estudiante]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("No se encontró la inscripción del estudiante.");
}

// Obtener datos de la madre
$sql_madre = "SELECT r.* FROM inscripciones i
              JOIN representantes r ON i.id_representante = r.id
              WHERE i.id_estudiante = ? AND LOWER(r.parentesco) = 'madre'
              LIMIT 1";
$stmt_madre = $pdo->prepare($sql_madre);
$stmt_madre->execute([$id_estudiante]);
$madre = $stmt_madre->fetch(PDO::FETCH_ASSOC);

// Obtener datos del padre
$sql_padre = "SELECT r.* FROM inscripciones i
              JOIN representantes r ON i.id_representante = r.id
              WHERE i.id_estudiante = ? AND LOWER(r.parentesco) = 'padre'
              LIMIT 1";
$stmt_padre = $pdo->prepare($sql_padre);
$stmt_padre->execute([$id_estudiante]);
$padre = $stmt_padre->fetch(PDO::FETCH_ASSOC);
// Iniciar PDF
$pdf = new FPDF();
// Configurar página
$pdf->AddPage();
$pdf->SetMargins(15, 10, 15); // Márgenes reducidos
$pdf->SetAutoPageBreak(true, 5); // Margen inferior muy pequeño

// Estilo para el texto compacto
$pdf->SetFont('Arial', '', 7);
$pdf->SetTextColor(0, 0, 0); // Negro sólido

// Texto del contrato (sin saltos de línea adicionales)
$pdf->Cell(190, 3, utf8_decode('CONTRATO DE INSCRIPCION'), 0, 1, 'C');
$contrato = utf8_decode('Entre Sociedad civil sin fines de lucro UNIDAD EDUCATIVA COLEGIO "PRADOS DEL NORTE", debidamente registrada en el Registro Subalterno PRIMERO de la Circunscripción Judicial del Estado Lara en fecha  27 de ENERO de 1995, bajo el número 43, tomo 5, folio S/F, debidamente representada por la ciudadana IVON CARREÑO, venezolana, mayor de edad, titular de la Cedula de identidad  V-4.849.181 quien funge como DIRECTOR ADMINISTRATIVO, quien en lo sucesivo se denominara “LA INSTITUCIÓN”, por una parte y por la otra el (la) ciudadano (a)________________________________________________, mayor de edad, titular de la Cedula de Identidad ___________________________, venezolano (a), de este domicilio ,quien en lo sucesivo se denominara EL REPRESENTANTE,  las partes en conjunto contratan en el presente contrato de servicios de educación escolar privada, servicios estos prestados por LA INSTITUCIÓN, servicios que se prestaran a nombre de EL REPRESENTANTE y en beneficio del Estudiante:');

// Escribir el texto compacto
$pdf->MultiCell(0, 3, $contrato, 0, 'J'); // Alto de línea de 3mm, justificado
$pdf->Ln(1); // Espacio entre párrafos

// Función de sección
function addSection($pdf, $title, $withBorder = true) {
    if ($withBorder) {
        $pdf->SetFont('Arial', 'I', 11);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(1);
        $pdf->Cell(0, 7, utf8_decode($title), 1, 1, 'L');
        $pdf->Ln(1);
    } else {
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 7, utf8_decode($title), 0, 1, 'L');
    }
    $pdf->SetFont('Arial', '', 10);
}

$colorLila = [214, 205, 225];

// DATOS DEL ESTUDIANTE
addSection($pdf, 'DATOS REFERENTES A LA IDENTIDAD DEL ASPIRANTE');
$pdf->SetFillColor($colorLila[0], $colorLila[1], $colorLila[2]);
$pdf->Cell(0, 7, utf8_decode("APELLIDOS: " . $data['apellidos_est']), 0, 1, 'L', true);
$pdf->Cell(0, 7, utf8_decode("NOMBRES: " . $data['nombres_est']), 0, 1, 'L', false);
$pdf->Cell(95, 7, utf8_decode("FECHA DE NACIMIENTO: " . $data['f_nacimiento_est']), 0, 0, '', true);
$pdf->Cell(45, 7, utf8_decode("EDAD: " . $data['edad_est']), 0, 0, '', true);
$pdf->Cell(40, 7, utf8_decode("SEXO: " . $data['sexo']), 0, 1, '', true);
$pdf->Cell(95, 7, utf8_decode("LUGAR DE NACIMIENTO: " . $data['lugar_nac_est']), 0, 0);
$pdf->Cell(0, 7, utf8_decode("C.I: " . $data['cedula_est']), 0, 1);
$pdf->MultiCell(0, 8, utf8_decode("DIRECCIÓN DE HABITACIÓN: " . $data['direccion_est']), 0, '', true);

// Educación
addSection($pdf, 'DATOS REFERENCIA EDUCATIVA', false);
$pdf->Cell(95, 7, utf8_decode("Colegio Anterior: " . $data['colegio_ant_est']), 0, 0, '', true);
$pdf->Cell(85, 7, utf8_decode("Motivo Retiro: " . $data['motivo_ret_est']), 0, 1, '', true);
$pdf->Cell(95, 7, utf8_decode("Nivelación: " . $data['nivelacion_est']), 0, 0);
$pdf->MultiCell(0, 7, utf8_decode("Explicación: " . $data['explicacion_est']), 0);

// Salud
addSection($pdf, 'DATOS REFERENTES A LA SALUD DEL ESTUDIANTE', false);
$pdf->Cell(95, 7, utf8_decode("Vacunas: " . $data['vacunas_est']), 0, 1);
$pdf->Cell(180, 7, utf8_decode("Alergias: " . $data['alergias_est']), 0, 1, '', true);
$pdf->Cell(95, 7, utf8_decode("Respiratorios: " . $data['problem_resp_est']), 0, 1);
$pdf->Cell(95, 7, utf8_decode("Enfermedades: " . $data['enfermedad_est']), 0, 1);
$pdf->Cell(95, 7, utf8_decode("Grado: " . $data['id_grado']), 0, 1);
$pdf->Cell(95, 7, utf8_decode("Turno: " . $data['turno_est']), 0, 1);

// Madre
if ($madre) {
    addSection($pdf, 'DATOS DE LA MADRE');
    $pdf->SetFillColor($colorLila[0], $colorLila[1], $colorLila[2]);
    $pdf->Cell(95, 7, utf8_decode("APELLIDOS: " . $madre['apellidos']), 0, 0, '', true);
    $pdf->Cell(85, 7, utf8_decode("NOMBRES: " . $madre['nombres']), 0, 1,'', true);
    $pdf->Cell(95, 7, utf8_decode("Cédula: " . $madre['cedula']), 0, 0);
    $pdf->Cell(95, 7, utf8_decode("Dirección Habitación: " . $madre['direccion']), 0, 1);
    $pdf->Cell(95, 7, utf8_decode("Grado Instrucción: " . $madre['grado_inst']), 0, 0, '', true);
    $pdf->Cell(55, 7, utf8_decode("Profesión: " . $madre['profesion']), 0, 0, '', true);
    $pdf->Cell(30, 7, utf8_decode("Trabaja: " . $madre['trabaja']), 0, 1, '', true);
    $pdf->Cell(95, 7, utf8_decode("Empresa: " . $madre['nombre_empr']), 0, 0);
    $pdf->Cell(95, 7, utf8_decode("Teléfono: " . $madre['telefono_empr']), 0, 1);
    $pdf->MultiCell(0, 8, utf8_decode("Dirección empresa: " . $madre['direccion_empr']), 0, '', true);
}

// Padre
if ($padre) {
    addSection($pdf, 'DATOS DEL PADRE');
    $pdf->SetFillColor($colorLila[0], $colorLila[1], $colorLila[2]);
    $pdf->Cell(95, 7, utf8_decode("APELLIDOS: " . $padre['apellidos']), 0, 0, '', true);
    $pdf->Cell(85, 7, utf8_decode("NOMBRES: " . $padre['nombres']), 0, 1,'', true);
    $pdf->Cell(95, 7, utf8_decode("Cédula: " . $padre['cedula']), 0, 0);
    $pdf->Cell(95, 7, utf8_decode("Dirección Habitación: " . $padre['direccion']), 0, 1);
    $pdf->Cell(95, 7, utf8_decode("Grado Instrucción: " . $padre['grado_inst']), 0, 0, '', true);
    $pdf->Cell(55, 7, utf8_decode("Profesión: " . $padre['profesion']), 0, 0, '', true);
    $pdf->Cell(30, 7, utf8_decode("Trabaja: " . $padre['trabaja']), 0, 1, '', true);
    $pdf->Cell(95, 7, utf8_decode("Empresa: " . $padre['nombre_empr']), 0, 0);
    $pdf->Cell(95, 7, utf8_decode("Teléfono: " . $padre['telefono_empr']), 0, 1);
    $pdf->MultiCell(0, 7, utf8_decode("Dirección empresa: " . $padre['direccion_empr']), 0, '', true);
}

// Contacto de pago
addSection($pdf, 'DATOS DEL CONTACTO Y RESPONSABLE DEL PAGO');
$pdf->SetFillColor($colorLila[0], $colorLila[1], $colorLila[2]);
$pdf->Cell(95, 7, utf8_decode("APELLIDOS: " . $data['apellidos']), 0, 0, '', true);
$pdf->Cell(85, 7, utf8_decode("NOMBRES: " . $data['nombres']), 0, 1, '', true);
$pdf->Cell(95, 7, utf8_decode("Cédula: " . $data['cedula']), 0, 0);
$pdf->MultiCell(0, 7, utf8_decode("Dirección: " . $data['direccion']), 0);
$pdf->Cell(95, 7, utf8_decode("Grado Instrucción: " . $data['grado_inst']), 0, 0, '', true);
$pdf->Cell(55, 7, utf8_decode("Profesión: " . $data['profesion']), 0, 0, '', true);
$pdf->Cell(30, 7, utf8_decode("Trabaja: " . $data['trabaja']), 0, 1, '', true);
$pdf->Cell(95, 7, utf8_decode("Empresa: " . $data['nombre_empresa']), 0, 0);
$pdf->Cell(95, 7, utf8_decode("Teléfono empresa: " . $data['telefono_empresa']), 0, 1);
$pdf->MultiCell(0, 7, utf8_decode("Dirección empresa: " . $data['direccion_empresa']), 0);
$pdf->Cell(95, 7, utf8_decode("Correo: " . $data['correo']), 0, 0, '', true);
$pdf->Cell(0, 7, utf8_decode("Telefono: " . $data['telefono']), 0, 0, '', true);

// Salida
$pdf->Output('I', 'Planilla_Inscripcion_' . $data['cedula_est'] . '.pdf');
exit;
