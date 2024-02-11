<?php

require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
      $this->SetFont('Arial', 'B', 10);
      $logoPath = 'logo.png'; // Ruta de tu logo
$logoSize = 45;
$logoWidth = 45; // Ancho del logo
$logoHeight = 18; // Alto del logo
$logoX = 0; // Mover hacia la izquierda
$logoY = 13; // Mover hacia arriba

// Colocar logo
$this->Image($logoPath, 10 + $logoX, 10 + $logoY, $logoWidth, $logoHeight);


// Configurar borde alrededor del logo
$this->SetDrawColor(0, 0, 0); // Color del borde (negro)
$this->SetLineWidth(0.3); // Ancho del borde
$this->Rect(10, 10, $logoSize, $logoSize); // Rectángulo alrededor del logo

// Resto del código para los rectángulos
$this->Rect(55, 10, 95, 9);
$this->Cell(180, 9, 'Proceso: Programa de Atencion Domiciliaria ', 0, 0, 'C'); // Agregar texto en el primer rectángulo

$this->Rect(55, 19, 95, 7);
$this->Cell(-175, 25, 'Registro', 0, 0, 'C'); // Agregar texto en el segundo rectángulo

$this->Rect(55, 26, 95, 29);
$this->Cell(173, 50, 'HISTORIA CLINICA', 0, 0, 'C'); 
$this->Cell(-173, 62, 'MEDICINA GENERAL DOMICILIARIA', 0, 0, 'C'); // Agregar texto en el tercer rectángulo

$this->Rect(150, 10, 50, 9);
$this->Cell(320, 9, 'Codigo: RG-AD-01', 0, 0, 'C'); // Agregar texto en el cuarto rectángulo

$this->Rect(150, 19, 50, 7);
$this->Cell(-320, 25, 'Version: 1', 0, 0, 'C'); // Agregar texto en el quinto rectángulo

$this->Rect(150, 26, 50, 11);
$this->Cell(320, 39, 'Fecha de emision:', 0, 0, 'C'); // Agregar texto en el sexto rectángulo
$this->Cell(-320, 47, '24/09/2004', 0, 0, 'C'); // Agregar texto en el sexto rectángulo

$this->Rect(150, 37, 50, 11);
$this->Cell(320, 61, 'Fecha de revision:', 0, 0, 'C'); // Agregar texto en el sexto rectángulo
$this->Cell(-320, 70, '24/09/2004', 0, 0, 'C'); // Agregar texto en el sexto rectángulo

$this->Rect(150, 48, 50, 7);
$texto2 = utf8_decode('Página ') . $this->PageNo() . '/{nb}';
$this->Cell(325, 83, $texto2, 0, 0, 'C');// Agregar texto en el octavo rectángulo

$this->Ln(50); // Salto de línea


      

        $servername = "localhost";
        $username = "id18386849_asprilla";
        $password = "Asprilla2004*";
        $dbname = "id18386849_saludcombd";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $id = $_GET['id'];

        $consulta_info = $conn->query("SELECT fecha, hora, mes, nombre, nacimiento, edad, genero, tipodocumento, identificacion, direccion, barrio, municipio, zona, telefono, fijo, eps, regimen, tipodiscapacidad, discapacidad, nombre_con, parentesco, motivo, enfer_actual, antecedentes, diagnostico_pri, diagnostico_sec, ta, fc, fr, t, sat, signosvitales, total_parcial, potencial, cuidados, analisisplan, comer, traslado, aseo, retrete, banarse, desplazarse, escalera, vestirse, heces, orina, total_berthel, percepcion, actividad, movimiento, exposicion, nutricion, cizalmiento, total_barner, textbarner, ser_medicos, rec_insumo, rec_insumopb, rec_sup, rec_equi, rec_medi, realizador, tar_pro FROM historiasclinicas WHERE id = $id");
        $this->dato_info = $consulta_info->fetch_object();
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'B', 10);
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF(); // Hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); // Añade la página / en blanco
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 20); // Salto de página automático


$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha Consulta'), 1, 0, 'C', 1);
$pdf->Cell(30, 10, utf8_decode('Hora (Militar)'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Mes'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 0, 'C');
$pdf->Cell(30, 10, $pdf->dato_info->hora, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->mes, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(25, 10, utf8_decode('Nacimiento'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(23, 10, utf8_decode('Género'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(25, 10, $pdf->dato_info->nacimiento, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(23, 10, $pdf->dato_info->genero, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 1, 'C');



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Dirección de Domicilio'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Barrio del Domicilio'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->direccion, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->barrio, 1, 1, 'C');



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(47.5, 10, utf8_decode('Municipio'), 1, 0, 'C', 1);
$pdf->Cell(47.5, 10, utf8_decode('Zona'), 1, 0, 'C', 1);
$pdf->Cell(47.5, 10, utf8_decode('Celular'), 1, 0, 'C', 1);
$pdf->Cell(47.5, 10, utf8_decode('Telefono'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->Cell(47.5, 10, $pdf->dato_info->municipio, 1, 0, 'C');
$pdf->Cell(47.5, 10, $pdf->dato_info->zona, 1, 0, 'C');
$pdf->Cell(47.5, 10, $pdf->dato_info->telefono, 1, 0, 'C');
$pdf->Cell(47.5, 10, $pdf->dato_info->fijo, 1, 1, 'C');



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(47.5, 10, utf8_decode('EPS Afiliado'), 1, 0, 'C', 1);
$pdf->Cell(47.5, 10, utf8_decode('Regimen'), 1, 0, 'C', 1);
$pdf->Cell(47.5, 10, utf8_decode('Discapacidad'), 1, 0, 'C', 1);
$pdf->Cell(47.5, 10, utf8_decode('Tipo Discapacidad'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(47.5, 10, $pdf->dato_info->eps, 1, 0, 'C');
$pdf->Cell(47.5, 10, $pdf->dato_info->regimen, 1, 0, 'C');
$pdf->Cell(47.5, 10, $pdf->dato_info->discapacidad, 1, 0, 'C');
$pdf->Cell(47.5, 10, $pdf->dato_info->tipodiscapacidad, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Nombre del Cuidador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Parentesco'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->Cell(95, 10, $pdf->dato_info->nombre_con, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->parentesco, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Motivo de Consulta'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->Cell(190, 10, $pdf->dato_info->motivo, 1, 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Enfermedad Actual'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(190, 6, utf8_decode($pdf->dato_info->enfer_actual), 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Antecedentes'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(190, 6, utf8_decode($pdf->dato_info->antecedentes), 1, 'L');
$pdf->Ln(10);


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Signos Vitales'), 1, 1, 'C', 1);
$pdf->Cell(38, 10, utf8_decode('TA'), 1, 0, 'C', 1);
$pdf->Cell(38, 10, utf8_decode('FC'), 1, 0, 'C', 1);
$pdf->Cell(38, 10, utf8_decode('FR'), 1, 0, 'C', 1);
$pdf->Cell(38, 10, utf8_decode('T°'), 1, 0, 'C', 1);
$pdf->Cell(38, 10, utf8_decode('SAT O2'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->Cell(38, 10, $pdf->dato_info->ta, 1, 0, 'C');
$pdf->Cell(38, 10, $pdf->dato_info->fc, 1, 0, 'C');
$pdf->Cell(38, 10, $pdf->dato_info->fr, 1, 0, 'C');
$pdf->Cell(38, 10, $pdf->dato_info->t, 1, 0, 'C');
$pdf->Cell(38, 10, $pdf->dato_info->sat, 1, 1, 'C');
$pdf->MultiCell(190, 6, utf8_decode($pdf->dato_info->signosvitales), 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(190, 10, utf8_decode('Escala de Barthel'), 1, 1, 'C', 1);


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Comer'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->comer), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Trasladarse entre la silla y la cama'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->traslado), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Aseo personal'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->aseo), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Uso del retrete'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->retrete), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Bañarse/Ducharse'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->banarse), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Desplazarse'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->desplazarse), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Subir y bajar escaleras'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->escalera), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Vestirse y desvestirse'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->vestirse), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Control de heces'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->heces), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Control de orina'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->orina), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Total puntos:'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->total_berthel), 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(190, 10, utf8_decode('Escala de Barthel'), 1, 1, 'C', 1);


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Percepcion sensorial'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->percepcion), 1, 'L',);


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Exposicion humedad'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->exposicion), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Actividad fisica / Deambula'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->actividad), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Nutricion'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->nutricion), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Movilidad cambios postulares'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->movimiento), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Cizalmiento y roze'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->cizalmiento), 1, 'L');


$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(50, 6, utf8_decode('Total puntos:'), 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(140, 6, utf8_decode($pdf->dato_info->total_barner), 1, 'L');
$pdf->MultiCell(190, 6, utf8_decode($pdf->dato_info->textbarner), 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Diagnostico principal'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(190, 6, $pdf->dato_info->diagnostico_pri, 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Diagnosticos secundarios'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->MultiCell(190, 6, $pdf->dato_info->diagnostico_sec, 1, 'L');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124); 
$pdf->SetTextColor(0, 0, 0); 
$pdf->SetDrawColor(163, 163, 163); 
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Analisis y Plan'), 1, 1, 'C', 1);
$pdf->Cell(63.3, 10, utf8_decode('Total o parcial'), 1, 0, 'C', 1);
$pdf->Cell(63.3, 10, utf8_decode('Sin potencial de rehabilitacion'), 1, 0, 'C', 1);
$pdf->Cell(63.4, 10, utf8_decode('Cuidados paliativos o de mantenimiento'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220); 
$pdf->Cell(63.3, 10, $pdf->dato_info->total_parcial, 1, 0, 'C');
$pdf->Cell(63.3, 10, $pdf->dato_info->potencial, 1, 0, 'C');
$pdf->Cell(63.4, 10, $pdf->dato_info->cuidados, 1, 1, 'C');
$pdf->MultiCell(190, 6, $pdf->dato_info->analisisplan, 1, 'L');
$pdf->Ln(10);


$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Servicios Medicos / Terapeuticos / Enfermeria / Curaciones'), 1, 1, 'C', 1);
$pdf->Cell(110, 10, utf8_decode('Descripcion'), 1, 0, 'C', 1);
$pdf->Cell(30, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
$pdf->Cell(50, 10, utf8_decode('Mes'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayser = explode("\n", $pdf->dato_info->ser_medicos);

foreach ($datosArrayser as $datoser) {
    $datosser = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoser));

    if (count($datosser) >= 3) {
        $descripcion_ser = utf8_decode(trim($datosser[0]));
        $cantidad_ser = utf8_decode(trim($datosser[1]));
        $mes_ser = utf8_decode(trim($datosser[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_ser", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_ser", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_ser", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);


$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Insumos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayInsumos = explode("\n", $pdf->dato_info->rec_insumo);

foreach ($datosArrayInsumos as $datoInsumo) {
    $datosInsumo = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoInsumo));

    if (count($datosInsumo) >= 3) {
        $descripcion = utf8_decode(trim($datosInsumo[0]));
        $cantidad = utf8_decode(trim($datosInsumo[1]));
        $mes = utf8_decode(trim($datosInsumo[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);



$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Insumos no PB'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayInsumosPB = explode("\n", $pdf->dato_info->rec_insumopb);

foreach ($datosArrayInsumosPB as $datoInsumoPB) {
    $datosInsumoPB = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoInsumoPB));

    if (count($datosInsumoPB) >= 3) {
        $descripcion_pb = utf8_decode(trim($datosInsumoPB[0]));
        $cantidad_pb = utf8_decode(trim($datosInsumoPB[1]));
        $mes_pb = utf8_decode(trim($datosInsumoPB[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_pb", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_pb", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_pb", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);



$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Suplementos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArraysup = explode("\n", $pdf->dato_info->rec_sup);

foreach ($datosArraysup as $datosup) {
    $datosup = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datosup));

    if (count($datosup) >= 3) {
        $descripcion_sup = utf8_decode(trim($datosup[0]));
        $cantidad_sup = utf8_decode(trim($datosup[1]));
        $mes_sup = utf8_decode(trim($datosup[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_sup", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_sup", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_sup", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);



$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Equipos biomedicos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayequi = explode("\n", $pdf->dato_info->rec_equi);

foreach ($datosArrayequi as $datoequi) {
    $datosequi = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoequi));

    if (count($datosequi) >= 3) {
        $descripcion_equi = utf8_decode(trim($datosequi[0]));
        $cantidad_equi = utf8_decode(trim($datosequi[1]));
        $mes_equi = utf8_decode(trim($datosequi[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_equi", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_equi", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_equi", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);



$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Medicamentos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArraymed = explode("\n", $pdf->dato_info->rec_medi);

foreach ($datosArraymed as $datomed) {
    $datosmed = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datomed));

    if (count($datosmed) >= 3) {
        $descripcion_med = utf8_decode(trim($datosmed[0]));
        $cantidad_med = utf8_decode(trim($datosmed[1]));
        $mes_med = utf8_decode(trim($datosmed[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_med", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_med", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_med", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');


$pdf->AddPage();

$pdf->AddPage();

$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha de Formula'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 0, 'C', 1);
$pdf->Cell(48, 10, utf8_decode('EPS Afiliado'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 0, 'C');
$pdf->Cell(48, 10, $pdf->dato_info->eps, 1, 1, 'C');
$pdf->Ln(10);

$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Servicios Medicos / Terapeuticos / Enfermeria / Curaciones'), 1, 1, 'C', 1);
$pdf->Cell(110, 10, utf8_decode('Descripcion'), 1, 0, 'C', 1);
$pdf->Cell(30, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
$pdf->Cell(50, 10, utf8_decode('Mes'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayser = explode("\n", $pdf->dato_info->ser_medicos);

foreach ($datosArrayser as $datoser) {
    $datosser = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoser));

    if (count($datosser) >= 3) {
        $descripcion_ser = utf8_decode(trim($datosser[0]));
        $cantidad_ser = utf8_decode(trim($datosser[1]));
        $mes_ser = utf8_decode(trim($datosser[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_ser", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_ser", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_ser", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(190, 6, 'Diagnostico Principal: ' . $pdf->dato_info->diagnostico_pri, 1, 1, 'L');
$pdf->Ln(2);
$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');
$pdf->Ln(10);

$pdf->AddPage();

$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha de Formula'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 0, 'C', 1);
$pdf->Cell(48, 10, utf8_decode('EPS Afiliado'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 0, 'C');
$pdf->Cell(48, 10, $pdf->dato_info->eps, 1, 1, 'C');


$pdf->Ln(10);
$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Insumos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayInsumos = explode("\n", $pdf->dato_info->rec_insumo);

foreach ($datosArrayInsumos as $datoInsumo) {
    $datosInsumo = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoInsumo));

    if (count($datosInsumo) >= 3) {
        $descripcion = utf8_decode(trim($datosInsumo[0]));
        $cantidad = utf8_decode(trim($datosInsumo[1]));
        $mes = utf8_decode(trim($datosInsumo[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(190, 6, 'Diagnostico Principal: ' . $pdf->dato_info->diagnostico_pri, 1, 1, 'L');
$pdf->Ln(2);
$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');
$pdf->Ln(10);

$pdf->AddPage();

$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha de Formula'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 0, 'C', 1);
$pdf->Cell(48, 10, utf8_decode('EPS Afiliado'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 0, 'C');
$pdf->Cell(48, 10, $pdf->dato_info->eps, 1, 1, 'C');


$pdf->Ln(10);
$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Insumos no PB'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayInsumosPB = explode("\n", $pdf->dato_info->rec_insumopb);

foreach ($datosArrayInsumosPB as $datoInsumoPB) {
    $datosInsumoPB = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoInsumoPB));

    if (count($datosInsumoPB) >= 3) {
        $descripcion_pb = utf8_decode(trim($datosInsumoPB[0]));
        $cantidad_pb = utf8_decode(trim($datosInsumoPB[1]));
        $mes_pb = utf8_decode(trim($datosInsumoPB[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_pb", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_pb", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_pb", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(190, 6, 'Diagnostico Principal: ' . $pdf->dato_info->diagnostico_pri, 1, 1, 'L');
$pdf->Ln(2);
$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');
$pdf->Ln(10);


$pdf->AddPage();

$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha de Formula'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 0, 'C', 1);
$pdf->Cell(48, 10, utf8_decode('EPS Afiliado'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 0, 'C');
$pdf->Cell(48, 10, $pdf->dato_info->eps, 1, 1, 'C');


$pdf->Ln(10);
$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Suplementos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArraysup = explode("\n", $pdf->dato_info->rec_sup);

foreach ($datosArraysup as $datosup) {
    $datosup = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datosup));

    if (count($datosup) >= 3) {
        $descripcion_sup = utf8_decode(trim($datosup[0]));
        $cantidad_sup = utf8_decode(trim($datosup[1]));
        $mes_sup = utf8_decode(trim($datosup[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_sup", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_sup", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_sup", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(190, 6, 'Diagnostico Principal: ' . $pdf->dato_info->diagnostico_pri, 1, 1, 'L');
$pdf->Ln(2);
$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');
$pdf->Ln(10);


$pdf->AddPage();

$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha de Formula'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 0, 'C', 1);
$pdf->Cell(48, 10, utf8_decode('EPS Afiliado'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 0, 'C');
$pdf->Cell(48, 10, $pdf->dato_info->eps, 1, 1, 'C');


$pdf->Ln(10);
$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Equipos biomedicos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArrayequi = explode("\n", $pdf->dato_info->rec_equi);

foreach ($datosArrayequi as $datoequi) {
    $datosequi = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datoequi));

    if (count($datosequi) >= 3) {
        $descripcion_equi = utf8_decode(trim($datosequi[0]));
        $cantidad_equi = utf8_decode(trim($datosequi[1]));
        $mes_equi = utf8_decode(trim($datosequi[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_equi", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_equi", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_equi", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(190, 6, 'Diagnostico Principal: ' . $pdf->dato_info->diagnostico_pri, 1, 1, 'L');
$pdf->Ln(2);
$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');
$pdf->Ln(10);


$pdf->AddPage();

$pdf->SetFillColor(148,204,124); // Color de fondo
$pdf->SetTextColor(0, 0, 0); // Color de texto
$pdf->SetDrawColor(163, 163, 163); // Color de borde
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(50, 10, utf8_decode('Fecha de Formula'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(50, 10, $pdf->dato_info->fecha, 1, 1, 'C');
$pdf->Ln(10);



$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(60, 10, utf8_decode('Nombre Completo'), 1, 0, 'C', 1);
$pdf->Cell(15, 10, utf8_decode('Edad'), 1, 0, 'C', 1);
$pdf->Cell(40, 10, utf8_decode('Tipo Documento'), 1, 0, 'C', 1);
$pdf->Cell(27, 10, utf8_decode('N° Documento'), 1, 0, 'C', 1);
$pdf->Cell(48, 10, utf8_decode('EPS Afiliado'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(60, 10, $pdf->dato_info->nombre, 1, 0, 'C');
$pdf->Cell(15, 10, $pdf->dato_info->edad, 1, 0, 'C');
$pdf->Cell(40, 10, $pdf->dato_info->tipodocumento, 1, 0, 'C');
$pdf->Cell(27, 10, $pdf->dato_info->identificacion, 1, 0, 'C');
$pdf->Cell(48, 10, $pdf->dato_info->eps, 1, 1, 'C');


$pdf->Ln(10);
$pdf->SetFillColor(148, 204, 124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(190, 10, utf8_decode('Medicamentos'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(238, 238, 238);

$datosArraymed = explode("\n", $pdf->dato_info->rec_medi);

foreach ($datosArraymed as $datomed) {
    $datosmed = explode(',', preg_replace('/^\d+\.\s*|\(|\)|\s*$/', '', $datomed));

    if (count($datosmed) >= 3) {
        $descripcion_med = utf8_decode(trim($datosmed[0]));
        $cantidad_med = utf8_decode(trim($datosmed[1]));
        $mes_med = utf8_decode(trim($datosmed[2]));

        // Descripcion en una MultiCell
        $pdf->MultiCell(190, 5, "Descripcion: $descripcion_med", 1, 'L', true);

        // Cantidad y Mes en la misma línea
        $pdf->Cell(95, 5, "Cantidad: $cantidad_med", 1, 0, 'L');
        $pdf->Cell(95, 5, "Mes: $mes_med", 1, 1, 'L');  // 1 indica un salto de línea después de esta celda
    }
}

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(190, 6, 'Diagnostico Principal: ' . $pdf->dato_info->diagnostico_pri, 1, 1, 'L');
$pdf->Ln(2);

$pdf->SetFillColor(148,204,124);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(163, 163, 163);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(95, 10, utf8_decode('Profesional Realizador'), 1, 0, 'C', 1);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Profesional'), 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, $pdf->dato_info->realizador, 1, 0, 'C');
$pdf->Cell(95, 10, $pdf->dato_info->tar_pro, 1, 1, 'C');
$pdf->Ln(10);




$pdf->Output();
?>
