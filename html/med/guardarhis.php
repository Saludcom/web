<?php
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get user input from the form
$usuario = sanitizeInput($_GET['usuario']);

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$mes = $_POST['mes'];
$nombre = $_POST['nombre'];
$nacimiento = $_POST['nacimiento'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$tipodocumento = $_POST['tipodocumento'];
$identificacion = $_POST['identificacion'];
$direccion = $_POST['direccion'];
$barrio = $_POST['barrio'];
$municipio = $_POST['municipio'];
$zona = $_POST['zona'];
$telefono = $_POST['telefono'];
$fijo = $_POST['fijo'];
$eps = $_POST['eps'];
$regimen = $_POST['regimen'];
$tipodiscapacidad = $_POST['tipodiscapacidad'];
$discapacidad = $_POST['discapacidad'];
$nombre_con = $_POST['nombre_con'];
$parentesco = $_POST['parentesco'];
$motivo = $_POST['motivo'];
$enfer_actual = $_POST['enfer_actual'];
$antecedentes = $_POST['antecedentes'];
$diagnostico_pri = $_POST['diagnostico_pri'];
$diagnostico_sec = $_POST['diagnostico_sec'];
$ta = $_POST['ta'];
$fc = $_POST['fc'];
$fr = $_POST['fr'];
$t = $_POST['t'];
$sat = $_POST['sat'];
$signosvitales = $_POST['signosvitales'];
$total_parcial = $_POST['total_parcial'];
$potencial = $_POST['potencial'];
$cuidados = $_POST['cuidados'];
$analisisplan = $_POST['analisisplan'];
$comer = $_POST['comer'];
$traslado = $_POST['traslado'];
$aseo = $_POST['aseo'];
$retrete = $_POST['retrete'];
$banarse = $_POST['banarse'];
$desplazarse = $_POST['desplazarse'];
$escalera = $_POST['escalera'];
$vestirse = $_POST['vestirse'];
$heces = $_POST['heces'];
$orina = $_POST['orina'];
$total_berthel = $_POST['total_berthel'];
$percepcion = $_POST['percepcion'];
$exposicion = $_POST['exposicion'];
$actividad = $_POST['actividad'];
$movimiento = $_POST['movimiento'];
$nutricion = $_POST['nutricion'];
$cizalmiento = $_POST['cizalmiento'];
$total_barner = $_POST['total_barner'];
$textbarner = $_POST['textbarner'];
$ser_medicos = $_POST['ser_medicos'];
$rec_insumo = $_POST['rec_insumo'];
$rec_insumopb = $_POST['rec_insumopb'];
$rec_sup = $_POST['rec_sup'];
$rec_equi = $_POST['rec_equi'];
$rec_medi = $_POST['rec_medi'];
$realizador = $_POST['realizador'];
$tar_pro = $_POST['tar_pro'];


// Preparar la consulta SQL
$query = "INSERT INTO historiasclinicas (fecha, hora, mes, nombre, nacimiento, edad, genero, tipodocumento, identificacion, direccion, barrio, municipio, zona, telefono, fijo, eps, regimen, tipodiscapacidad, discapacidad, nombre_con, parentesco, motivo, enfer_actual, antecedentes, diagnostico_pri, diagnostico_sec, ta, fc, fr, t, sat, signosvitales, total_parcial, potencial, cuidados, analisisplan, comer, traslado, aseo, retrete, banarse, desplazarse, escalera, vestirse, heces, orina, total_berthel, percepcion, actividad, exposicion, movimiento, nutricion, cizalmiento, total_barner, textbarner, ser_medicos, rec_insumo, rec_insumopb, rec_sup, rec_equi, rec_medi, realizador)
VALUES ('$fecha', '$hora', '$mes', '$nombre', '$nacimiento', '$edad', '$genero', '$tipodocumento', '$identificacion', '$direccion', '$barrio', '$municipio', '$zona', '$telefono', '$fijo', '$eps', '$regimen', '$tipodiscapacidad', '$discapacidad', '$nombre_con', '$parentesco', '$motivo', '$enfer_actual', '$antecedentes', '$diagnostico_pri', '$diagnostico_sec', '$ta', '$fc', '$fr', '$t', '$sat', '$signosvitales', '$total_parcial', '$potencial', '$cuidados', '$analisisplan', '$comer', '$traslado', '$aseo', '$retrete', '$banarse', '$desplazarse', '$escalera', '$vestirse', '$heces', '$orina', '$total_berthel', '$percepcion', '$actividad', '$exposicion','$movimiento', '$nutricion', '$cizalmiento', '$total_barner', '$textbarner', '$ser_medicos', '$rec_insumo', '$rec_insumopb', '$rec_sup', '$rec_equi', '$rec_medi', '$tar_pro')";

// Ejecutar la consulta
if ($conn->query($query) === TRUE) {
    $mensaje = "Historia clinica realizada correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "medico.php?usuario=' . urlencode($usuario) . '";</script>';
} else {
    $mensaje = "Hay algun error: " . $conn->error;
    echo '<script>alert("' . $mensaje . '");</script>';
    echo '<script>window.location.href = "medico.php?usuario=' . urlencode($usuario) . '";</script>';
}

// Cerrar conexión
$conn->close();
?>
