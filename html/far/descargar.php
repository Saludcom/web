<?php

require('./fpdf.php');

class PDF extends FPDF {
    function header() {
        // Puedes personalizar el encabezado aquí si es necesario
    }

    function footer() {
        // Puedes personalizar el pie de página aquí si es necesario
    }

    function chapterTitle($label) {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, $label, 0, 1, 'L');
    }

    function chapterBody($content) {
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $content);
    }
}

$pdf = new PDF();
$pdf->AddPage();

// Parte del formulario
$pdf->chapterTitle('Fecha Consulta');
$pdf->SetFillColor(204, 255, 204);
$pdf->Cell(0, 10, '', 0, 1, 'L', true); // Espacio con fondo verde
$pdf->Cell(0, 10, 'Fecha Consulta: ', 0, 1, 'L');
$pdf->Cell(0, 10, '', 0, 1, 'L');

$pdf->chapterTitle('Hora (Militar)');
$pdf->SetFillColor(204, 255, 204);
$pdf->Cell(0, 10, '', 0, 1, 'L', true); // Espacio con fondo verde
$pdf->Cell(0, 10, 'Hora (Militar): ', 0, 1, 'L');
$pdf->Cell(0, 10, '', 0, 1, 'L');

$pdf->chapterTitle('Mes');
$pdf->SetFillColor(204, 255, 204);
$pdf->Cell(0, 10, '', 0, 1, 'L', true); // Espacio con fondo verde
$pdf->Cell(0, 10, 'Mes: ', 0, 1, 'L');
$pdf->Cell(0, 10, '', 0, 1, 'L');

$pdf->Output();