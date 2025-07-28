<?php
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../TCPDF-main/tcpdf.php");
include("../Configuration/Configuration.php");

class PDF_Reporte extends TCPDF
{
    // Configuración inicial
    function __construct()
    {
        parent::__construct('P', 'mm', 'Letter', true, 'UTF-8', false);
        $this->SetMargins(10, 10, 10);
        $this->SetAutoPageBreak(true, 10);
        $this->SetCreator('Sistema de Certificaciones');
        $this->SetAuthor('Tu Institución');
    }

    // Cabecera de página
    public function Header()
    {
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 5, 'CERTIFICACIÓN DE CALIFICACIONES', 0, 1, 'R');
        $this->SetFont('helvetica', '', 8);
        $this->Cell(0, 5, 'Código del Formato: RR-DEA-03-03', 0, 1, 'R');
        $this->Ln(2);
    }

    // Pie de página
    public function Footer()
    {
        $this->SetY(-10);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 5, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'C');
    }

    // Sección I: Plan de Estudio
    public function PlanEstudio()
    {
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(135, 5, 'I. Plan de Estudio:', 0, 0, 'R');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(60, 5, 'EDUCACION MEDIA GENERAL', 0, 1, 'R');

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(170, 5, 'Código del Plan de Estudio:', 0, 0, 'R');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(25, 5, '32011', 0, 1, 'R');

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(170, 5, 'Mención:', 0, 0, 'R');
        $this->SetFont('helvetica', '', 10);
        $this->Cell(25, 5, '*************', 0, 1, 'R');
        $this->Ln(2);
    }

    // Sección II: Datos del Plantel
    public function DatosPlantel($plantel)
    {
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(0, 6, 'II. Datos del Plantel o Zona Educativa que emite la Certificación:', 0, 1);

        // Fila 1
        $startY = $this->GetY();
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(20, 6, 'Cód.DEA:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $codigoDEA = 'PD00361303';
        $x1 = $this->GetX();
        $this->Cell(25, 6, $codigoDEA, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(20, 6, 'Nombre:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $nombre = 'UNIDAD EDUCATIVA COLEGIO "PRADO DEL NORTE"';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(95, 6, $nombre, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(15, 6, 'Dtto.Esc:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $dto = '*';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(15, 6, $dto, 0, 0, 'C');
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);
        $this->Ln();

        // Fila 2
        $startY = $this->GetY();
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(20, 6, 'Dirección:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $drc = 'AV. INTERCOMUNAL TAMACA EL CUJI KM. 08 VÍA DUACA';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(100, 6, $drc, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(25, 6, 'Teléfono:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $tel = '0251-8145640';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(45, 6, $tel, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);
        $this->Ln();

        // Fila 3
        $startY = $this->GetY();
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(25, 6, 'Municipio:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $municipio = 'Iribarren';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(30, 6, $municipio, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(25, 6, 'Ent.Federal:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $ente = 'LARA';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(35, 6, $ente, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(30, 6, 'Zona Educativa:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $zona = 'LARA';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(45, 6, $zona, 0, 0);
        $x2 = $this->GetX();
        $this->Line($x1, $y1 + 6, $x2, $y1 + 6);
        $this->Ln(6);
    }

    // Sección III: Datos del Alumno
    public function DatosAlumno($estudiante)
    {
        $this->SetFont('helvetica', 'B', 12);
        $this->Cell(0, 6, 'III. Datos de Identificación del Alumno:', 0, 1);

        // Fila 1
        $startY = $this->GetY();
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(40, 6, 'Cédula de Identidad:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $cedula = $estudiante['cedula_est'];
        $x1 = $this->GetX();
        $this->Cell(50, 6, $cedula, 0, 0, 'C');
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(40, 6, 'Fecha de Nacimiento:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $fnacimiento = $estudiante['f_nacimiento_est'];
        $x1 = $this->GetX();
        $this->Cell(60, 6, $fnacimiento, 0, 0, 'C');
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);
        $this->Ln();

        // Fila 2
        $startY = $this->GetY();
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(20, 6, 'Apellidos:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $apellido = $estudiante['apellidos_est'];
        $x1 = $this->GetX();
        $this->Cell(60, 6, $apellido, 0, 0, 'C');
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(35, 6, 'Nombres:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $nombres = $estudiante['nombres_est'];
        $x1 = $this->GetX();
        $this->Cell(75, 6, $nombres, 0, 0, 'C');
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);
        $this->Ln();

        // Fila 3
        $startY = $this->GetY();
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(38, 6, 'Lugar de Nacimiento:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $lugar = 'BARQUISIMETO';
        $x1 = $this->GetX();
        $this->Cell(60, 6, $lugar, 0, 0, 'L');
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(38, 6, 'Ent.Federal o País:', 0, 0);
        $this->SetFont('helvetica', '', 10);
        $estado = 'LARA';
        $x1 = $this->GetX();
        $this->Cell(55, 6, $estado, 0, 0, 'L');
        $x2 = $this->GetX();
        $this->Line($x1, $startY + 6, $x2, $startY + 6);
        $this->Ln(6);
    }

    // Sección IV: Planteles donde cursó estudios
  public function PlantelesCursados()
{
    $rowHeight = 6;
    $colWidths = [5, 60, 20, 10]; // Anchos: Nº, Nombre, Localidad, E.F.
    $leftTableWidth = array_sum($colWidths);
    $rightTableWidth = array_sum($colWidths);
    $titlePosition = 95; // Posición exacta para alinear el título con la segunda tabla

    // Datos fijos
    $planteles = [
        ['1', 'U.E.C. PRADO DEL NORTE', 'EL CUJI', 'LA'],
        ['2', '*************', '************', '****'],
        ['3', '*************', '************', '****'],
        ['4', '*************', '************', '****'],
        ['5', '*************', '************', '****']
    ];

    // ----- TÍTULO + SEGUNDA CABECERA -----
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell($titlePosition, $rowHeight, 'IV. Planteles donde curso estos estudios:', 0, 0);
    
    // Segunda cabecera (derecha)
    $this->SetFont('helvetica', 'B', 10);
    $this->Cell($colWidths[0], $rowHeight, 'Nº', 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, 'Nombre del Plantel', 1, 0, 'C');
    $this->Cell($colWidths[2], $rowHeight, 'Localidad:', 1, 0, 'C');
    $this->Cell($colWidths[3], $rowHeight, 'E.F.', 1, 1, 'C');

    // ----- PRIMERA FILA -----
    // Primera cabecera (izquierda)
    $this->SetFont('helvetica', 'B', 10);
    $this->Cell($colWidths[0], $rowHeight, 'Nº', 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, 'Nombre del Plantel', 1, 0, 'C');
    $this->Cell($colWidths[2], $rowHeight, 'Localidad:', 1, 0, 'C');
    $this->Cell($colWidths[3], $rowHeight, 'E.F.', 1, 0, 'C');
    
    // Espacio calculado para alineación exacta
    
    // Primer dato derecho (3)
    $this->SetFont('helvetica', '', 10);
    $this->Cell($colWidths[0], $rowHeight, $planteles[2][0], 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, $planteles[2][1], 1, 0);
    $this->Cell($colWidths[2], $rowHeight, $planteles[2][2], 1, 0);
    $this->Cell($colWidths[3], $rowHeight, $planteles[2][3], 1, 1, 'C');

    // ----- SEGUNDA FILA -----
    // Dato izquierdo (1)
    $this->Cell($colWidths[0], $rowHeight, $planteles[0][0], 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, $planteles[0][1], 1, 0);
    $this->Cell($colWidths[2], $rowHeight, $planteles[0][2], 1, 0);
    $this->Cell($colWidths[3], $rowHeight, $planteles[0][3], 1, 0, 'C');
    
  
    // Dato derecho (4)
    $this->Cell($colWidths[0], $rowHeight, $planteles[3][0], 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, $planteles[3][1], 1, 0);
    $this->Cell($colWidths[2], $rowHeight, $planteles[3][2], 1, 0);
    $this->Cell($colWidths[3], $rowHeight, $planteles[3][3], 1, 1, 'C');

    // ----- TERCERA FILA -----
    // Dato izquierdo (2)
    $this->Cell($colWidths[0], $rowHeight, $planteles[1][0], 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, $planteles[1][1], 1, 0);
    $this->Cell($colWidths[2], $rowHeight, $planteles[1][2], 1, 0);
    $this->Cell($colWidths[3], $rowHeight, $planteles[1][3], 1, 0, 'C');
    
 
    
    // Dato derecho (5)
    $this->Cell($colWidths[0], $rowHeight, $planteles[4][0], 1, 0, 'C');
    $this->Cell($colWidths[1], $rowHeight, $planteles[4][1], 1, 0);
    $this->Cell($colWidths[2], $rowHeight, $planteles[4][2], 1, 0);
    $this->Cell($colWidths[3], $rowHeight, $planteles[4][3], 1, 1, 'C');

    $this->Ln(5);
}// (Mantén las funciones auxiliares ConvertirNumeroALetras, ConvertirNumeroARomano y ObtenerNombreMateria igual)
}

// Obtener ID del estudiante
$idEstudiante = $_GET['id_estudiante'] ?? null;

if (!$idEstudiante) {
    die('ID de estudiante no especificado');
}

try {
    // 1. Obtener datos del estudiante
    $sqlEstudiante = "SELECT * FROM estudiantes WHERE id = ?";
    $stmtEstudiante = $pdo->prepare($sqlEstudiante);
    $stmtEstudiante->execute([$idEstudiante]);
    $estudiante = $stmtEstudiante->fetch(PDO::FETCH_ASSOC);
    if (!$estudiante) {
        die("Estudiante no encontrado. ID recibido: $idEstudiante");
    }

    // 2. Generar PDF
    $pdf = new PDF_Reporte();
    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(true);
    $pdf->AddPage();

    // Sección I: Plan de Estudio
    $pdf->PlanEstudio();

    // Sección II: Datos del Plantel
    $pdf->DatosPlantel([]);

    // Sección III: Datos del Alumno
    $pdf->DatosAlumno($estudiante);

    // Sección IV: Planteles donde cursó estudios
    $pdf->PlantelesCursados();

    // Salida del PDF
    $pdf->Output('certificacion_calificaciones_'.$idEstudiante.'.pdf', 'I');
    
} catch (Exception $e) {
    die('Error al generar reporte: ' . $e->getMessage());
}