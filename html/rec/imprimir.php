<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {

    $servername = "localhost";
    $username = "id18386849_asprilla";
    $password = "Asprilla2004*";
    $dbname = "id18386849_saludcombd";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Function to sanitize user input
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // Get user input from the form
    $user = sanitizeInput($_GET['usuario']);
    

$id = $_GET['codigo'];

$consulta_info = $conn->query(" select * from citasasignadas WHERE id='$id'");//traemos datos de la empresa desde BD
$dato_info = $consulta_info->fetch_object();

      $this->Image('logo.png', 20, 10, 100); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(135, 20);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("SALUD COMUNIDAD SAS"), 0, 0, '', 0);
      $this->Ln(5);
	  
      /* UBICACION */
      $this->Cell(142, 20);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("NIT: 815000353 "), 0, 0, '', 0);
	  $this->SetTextColor(103); //color
	  
	  $this->Cell(-37);  // mover a la derecha
      $this->SetFont('Arial', 'B', 17);
      $this->Cell(85, 10, utf8_decode("Fecha Cita : " . $dato_info->fecha), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
	        $this->SetTextColor(103); //color
      $this->Cell(137);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("CARRERA 29 #32 - 107 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(130);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("PALMIRA - VALLE DEL CAUCA"), 0, 0, '', 0);
	  $this->SetTextColor(103); //color

	  $this->Cell(-14);  // mover a la derecha
      $this->SetFont('Arial', 'B', 17);
      $this->Cell(85, 10, utf8_decode("Hora Cita : " . $dato_info->hora), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
	        $this->SetTextColor(103); //color
      $this->Cell(137);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("www.saludcomsas.com"), 0, 0, '', 0);
      $this->Ln(20);

	  
	  
      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("____________________________________________________________________________________________________________"), 0, 0, '', 0);
      $this->Ln(12);

      /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("EPS : " . $dato_info->eps), 0, 0, '', 0);
	  
	  $this->Cell(45);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Tipo Consulta : " . $dato_info->tipoconsulta), 0, 0, '', 0);
      $this->Ln(8);
	  
	  /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Profesional : " . $dato_info->profesional), 0, 0, '', 0);
	  
	  $this->Cell(45);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Costo de la Cita : " . $dato_info->costo), 0, 0, '', 0);
      $this->Ln(8);
	  
	
	  
	        /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("____________________________________________________________________________________________________________"), 0, 0, '', 0);
      $this->Ln(12);
	  
	        /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Paciente : " . $dato_info->nombre), 0, 0, '', 0);

	  
	  $this->Cell(45);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Correo Electronico : " . $dato_info->correo), 0, 0, '', 0);
      $this->Ln(8);
	  
	  /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Identificacion : " . $dato_info->identificacion), 0, 0, '', 0);
	  
	  $this->Cell(45);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Regimen : " . $dato_info->regimen), 0, 0, '', 0);
      $this->Ln(8);
	  
	  
	  /* TELEFONO */
      $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Telefono : " . $dato_info->telefono), 0, 0, '', 0);
	  
	  $this->Cell(45);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Codigo cita : " . $dato_info->id), 0, 0, '', 0);
      $this->Ln(12);
	  
	        $this->Cell(10);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("____________________________________________________________________________________________________________"), 0, 0, '', 0);
      $this->Ln(22);
	  
	  	  /* TELEFONO */
		  $this->SetTextColor(103); //color
      $this->Cell(32);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("RECUERDE QUE DEBE ASISTIR 30 MINUTOS ANTES DE LA HORA DE SU CITA PARA FACTURAR"), 0, 0, '', 0);
      $this->Ln(7);
	  $this->Cell(29);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("LA PRESENTE CERTIFICACION SE EXPIDE COMO REQUISITO PARA MOVILIZAR ENTRE LA CLINICA"), 0, 0, '', 0);
      $this->Ln(7);
	  $this->Cell(26);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("RECUERDE EN CASO DE NO PODER ASISTIR A SU CITA POR FAVOR LLAMAR AL TELEFONO (602)284 7251"), 0, 0, '', 0);
      $this->Ln(7);
	  $this->Cell(90);  // mover a la derecha
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(85, 10, utf8_decode("Y DE ESTA MANERA REPROGRAMAR SU CITA"), 0, 0, '', 0);
      $this->Ln(10);
	  

   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/


$pdf->Output('Certificado.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
