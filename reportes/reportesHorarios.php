<?php
include '../Layout/mensajes.php';
include '../fpdf/fpdf.php';
include '../Configuration/Configuration.php';

class PDF extends FPDF
{
    // Mapeo numérico → nombre de día
    private $diasMap = [
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes'
    ];

    function Header()
    {
        $this->SetFont('Arial', '', 10);
        $this->SetXY(230, 10);
        $this->Cell(50, 5, iconv('UTF-8', 'windows-1252', 'Fecha de emisión: ' . date('d/m/Y')), 0, 1, 'R');

        $this->Image('LOGO.jpg', 10, 8, 25);

        $this->SetFont('Arial', 'B', 14);
        $this->SetX(20);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'UNIDAD EDUCATIVA COLEGIO PRADO DEL NORTE'), 0, 1, 'C');

        $this->Ln(5);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'REPORTE DE HORARIOS'), 0, 1, 'C');

        $this->SetLineWidth(0.5);
        $this->Line(10, 40, 285, 40);
        $this->SetLineWidth(0.2);

        $this->Ln(15);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }

    function crearHorario($data, $filtros)
    {
        // Imprime filtros aplicados
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 6, iconv('UTF-8', 'windows-1252', 'Filtros aplicados:'), 0, 1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, iconv(
            'UTF-8',
            'windows-1252',
            'Nivel: ' . ($filtros['nivel'] ?? 'Todos') .
                ' | Grado: ' . ($filtros['grado'] ?? 'Todos') .
                ' | Año escolar: ' . ($filtros['anio'] ?? 'Todos')
        ), 0, 1);

        $this->Ln(10);

        // Configuración de anchos y alturas
        $horaWidth = 35;
        $colWidth  = 48;
        $rowHeight = 15;

        // Cabecera: Hora + días
        $this->SetFillColor(58, 83, 155);
        $this->SetTextColor(255);
        $this->SetFont('Arial', 'B', 9);

        $this->Cell($horaWidth, $rowHeight, 'Hora', 1, 0, 'C', true);
        foreach ($this->diasMap as $diaNombre) {
            $this->Cell($colWidth, $rowHeight, iconv('UTF-8', 'windows-1252', $diaNombre), 1, 0, 'C', true);
        }
        $this->Ln();

        // Cuerpo de la tabla
        $this->SetFont('Arial', '', 6);
        $this->SetTextColor(0);

        $horasUnicas       = $this->getHorasUnicas($data);
        $horarioOrganizado = $this->organizarHorario($data);

        foreach ($horasUnicas as $rango) {
            // Columna de hora
            $this->Cell($horaWidth, $rowHeight, $rango, 1, 0, 'C');

            // Columnas de cada día
            foreach ($this->diasMap as $diaNum => $diaNombre) {
                if (isset($horarioOrganizado[$diaNum][$rango])) {
                    $item = $horarioOrganizado[$diaNum][$rango];
                    $contenido = sprintf(
                        "M: %s\nP: %s\nA: %s",
                        $item['nombre_materia'],
                        $item['nombre_profesor'],
                        $item['nombre_aula']
                    );
                } else {
                    $contenido = '';
                }

                // Dividir el contenido en 3 líneas iguales
                $lineas     = explode("\n", $contenido);
                $lineHeight = $rowHeight / 3;
                $x          = $this->GetX();
                $y          = $this->GetY();

                // Fondo blanco
                $this->SetFillColor(255, 255, 255);
                $this->Rect($x, $y, $colWidth, $rowHeight);

                // Escribir cada línea
                for ($i = 0; $i < 3; $i++) {
                    $texto = $lineas[$i] ?? '';
                    $this->SetXY($x, $y + ($i * $lineHeight));
                    $this->Cell($colWidth, $lineHeight, iconv('UTF-8', 'windows-1252', $texto), 0, 0, 'C');
                }

                // Mover al siguiente cuadro
                $this->SetXY($x + $colWidth, $y);
            }

            // Siguiente fila de horario
            $this->Ln($rowHeight);
        }
    }

    function getHorasUnicas($data)
    {
        $horas = [];
        foreach ($data as $item) {
            $rango = $item['hora_inicio'] . ' - ' . $item['hora_fin'];
            if (!in_array($rango, $horas)) {
                $horas[] = $rango;
            }
        }
        sort($horas);
        return $horas;
    }

    function organizarHorario($data)
    {
        $horarioOrganizado = [];
        foreach ($data as $item) {
            $diaNum = intval($item['dia_semana']);           // Clave numérica
            $rango  = $item['hora_inicio'] . ' - ' . $item['hora_fin'];
            $horarioOrganizado[$diaNum][$rango] = $item;
        }
        return $horarioOrganizado;
    }

    function getNombreGrado($id_grado)
    {
        $grados = [
            1 => '1er grado',
            2 => '2do grado',
            3 => '3er grado',
            4 => '4to grado',
            5 => '5to grado',
            6 => '6to grado',
            7 => '1er año',
            8 => '2do año',
            9 => '3er año',
            10 => '4to año',
            11 => '5to año',
        ];
        return $grados[$id_grado] ?? 'Grado ' . $id_grado;
    }
}

// Captura de filtros desde el formulario
$grado = $_POST['selectGradoHorario'] ?? '';
$anio  = $_POST['selectAnioHorario']    ?? '';
$nivel  = $_POST['nivelEducativoHorario']    ?? '';
$cantidad = $_POST['cantidadReportes'] ?? '';

/// Instancia y configuración inicial del PDF
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages();

// Obtiene los datos de horarios según filtros
$horarios = reporteHorarios($pdo, $grado, $anio);

// Prepara etiquetas de filtros para el encabezado
$filtros = [
    'nivel' => $nivel,
    'grado' => $grado ? $pdf->getNombreGrado($grado) : 'Todos',
    'anio'  => $anio ?: 'Todos'
];

if (empty($horarios)) {
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, iconv('UTF-8','windows-1252','No se encontraron horarios con los filtros aplicados.'), 0, 1);
} else {
    if ($cantidad >= 1 && $cantidad <= 30) {
        for ($i = 1; $i <= $cantidad; $i++) {
            // Para la primera iteración, abrimos la página inicial
            if ($i === 1) {
                $pdf->AddPage();
            } else {
                // para las páginas 2..N, agregamos páginas nuevas
                $pdf->AddPage();
            }

            // Dibuja el horario en la página actual
            $pdf->crearHorario($horarios, $filtros);
        }
    } else {
        $_SESSION['mensaje'] = 'La cantidad de reporte a emitir no está permitida';
        $_SESSION['icono']   = 'warning';
        $_SESSION['titulo']  = 'Atención';
        header('Location: ../Desarrollo/reportesSistema.php');
        exit;
    }
}

// Cierra conexión y envía el PDF al navegador
$pdo = null;
$pdf->Output('I', 'Reporte_Horarios_' . date('Y-m-d') . '.pdf');

// Función para consulta de horarios
function reporteHorarios($pdo, $grado, $anio)
{
    try {
        $sql = "SELECT h.id_horario,
       h.id_grado,
       h.id_aula,
       a.nombre AS nombre_aula,  
       h.id_materia,
       h.id_profesor,
       h.dia_semana,
       h.hora_inicio,
       h.hora_fin,
       h.anio_escolar,
       pr.nombre AS nombre_profesor,
       pr.id_profesor ,
       mat.nombre AS nombre_materia, 
       mat.id_materia
       FROM horarios h
       INNER JOIN aulas a ON h.id_aula = a.id_aula 
       INNER JOIN profesores pr ON h.id_profesor = pr.id_profesor
       INNER JOIN materias mat ON h.id_materia = mat.id_materia
       WHERE 1=1";

        $params = [];

        if (!empty($grado)) {
            $sql     .= " AND h.id_grado = :grado";
            $params[':grado'] = $grado;
        }

        if (!empty($anio)) {
            $sql     .= " AND h.anio_escolar = :anio";
            $params[':anio']  = $anio;
        }

        $sql .= " ORDER BY FIELD(h.dia_semana, '1','2','3','4','5'), h.hora_inicio";

        $stmt = $pdo->prepare($sql);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        error_log("Error en reporteHorarios: " . $e->getMessage());
        return [];
    }
}

// Liberar conexión y enviar PDF al navegador
$pdo = null;
$pdf->Output('I', 'Reporte_Horarios_' . date('Y-m-d') . '.pdf');
