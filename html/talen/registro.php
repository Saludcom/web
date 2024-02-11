<?php

// Conectar a la base de datos
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";

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
$user = sanitizeInput($_GET['usuario']);


// Recibir datos del formulario
$nombrecompleto = isset($_POST['nombrecompleto']) ? $_POST['nombrecompleto'] : '';
$tipodocumento = isset($_POST['tipodocumento']) ? $_POST['tipodocumento'] : '';
$numerocedula = isset($_POST['numerocedula']) ? $_POST['numerocedula'] : '';
$fechaexpedicion = isset($_POST['fechaexpedicion']) ? $_POST['fechaexpedicion'] : '';
$lugarexpedicion = isset($_POST['lugarexpedicion']) ? $_POST['lugarexpedicion'] : '';
$numeroresolucion = isset($_POST['numeroresolucion']) ? $_POST['numeroresolucion'] : '';
$profesion = isset($_POST['profesion']) ? $_POST['profesion'] : '';
$modalidadservicio = isset($_POST['modalidadservicio']) ? $_POST['modalidadservicio'] : '';
$nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : '';
$lugarnacimiento = isset($_POST['lugarnacimiento']) ? $_POST['lugarnacimiento'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';
$tiposangre = isset($_POST['tiposangre']) ? $_POST['tiposangre'] : '';
$ciudadresidencia = isset($_POST['ciudadresidencia']) ? $_POST['ciudadresidencia'] : '';
$direccionresidencia = isset($_POST['direccionresidencia']) ? $_POST['direccionresidencia'] : '';
$telefonoempleado = isset($_POST['telefonoempleado']) ? $_POST['telefonoempleado'] : '';
$numerocuenta = isset($_POST['numerocuenta']) ? $_POST['numerocuenta'] : '';
$nombrebanco = isset($_POST['nombrebanco']) ? $_POST['nombrebanco'] : '';
$contactofamiliar = isset($_POST['contactofamiliar']) ? $_POST['contactofamiliar'] : '';
$numerofamiliar = isset($_POST['numerofamiliar']) ? $_POST['numerofamiliar'] : '';
$direccionfamiliar = isset($_POST['direccionfamiliar']) ? $_POST['direccionfamiliar'] : '';
$tipocontrato = isset($_POST['tipocontrato']) ? $_POST['tipocontrato'] : '';
$numerocontrato = isset($_POST['numerocontrato']) ? $_POST['numerocontrato'] : '';
$detallecontrato = isset($_POST['detallecontrato']) ? $_POST['detallecontrato'] : '';
$hojadevida = isset($_POST['hojadevida']) ? $_POST['hojadevida'] : '';
$copiacedula = isset($_POST['copiacedula']) ? $_POST['copiacedula'] : '';
$copiadiploma = isset($_POST['copiadiploma']) ? $_POST['copiadiploma'] : '';
$actagrado = isset($_POST['actagrado']) ? $_POST['actagrado'] : '';
$otrosestudios = isset($_POST['otrosestudios']) ? $_POST['otrosestudios'] : '';
$epsfparl = isset($_POST['epsfparl']) ? $_POST['epsfparl'] : '';
$certificadovacunas = isset($_POST['certificadovacunas']) ? $_POST['certificadovacunas'] : '';
$rethus = isset($_POST['rethus']) ? $_POST['rethus'] : '';
$rut = isset($_POST['rut']) ? $_POST['rut'] : '';
$rcp = isset($_POST['rcp']) ? $_POST['rcp'] : '';

// Insertar datos en la base de datos
$sql = "INSERT INTO empleados (nombrecompleto, tipodocumento, numerocedula, fechaexpedicion, lugarexpedicion, 
        numeroresolucion, profesion, modalidadservicio, nacimiento, lugarnacimiento, edad, tiposangre, ciudadresidencia, 
        direccionresidencia, telefonoempleado, numerocuenta, nombrebanco, contactofamiliar, numerofamiliar, direccionfamiliar, 
        tipocontrato, numerocontrato, detallecontrato) 
        VALUES ('$nombrecompleto', '$tipodocumento', '$numerocedula', '$fechaexpedicion', '$lugarexpedicion', 
        '$numeroresolucion', '$profesion', '$modalidadservicio', '$nacimiento', '$lugarnacimiento', '$edad', '$tiposangre', 
        '$ciudadresidencia', '$direccionresidencia', '$telefonoempleado', '$numerocuenta', '$nombrebanco', '$contactofamiliar', 
        '$numerofamiliar', '$direccionfamiliar', '$tipocontrato', '$numerocontrato', '$detallecontrato')";

if ($conn->query($sql) === TRUE) {
    $mensaje = "Trabajador registrado correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "talento.php?usuario=' . urlencode($user) . '";</script>';
} else {
    $mensaje = "Hay algun error: " . $conn->error;
    echo '<script>alert("' . $mensaje . '");</script>';
    echo '<script>window.location.href = "talento.php?usuario=' . urlencode($user) . '";</script>';
}

// Crear carpeta y mover archivos
$carpeta = "files/$numerocedula";

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

move_uploaded_file(isset($_FILES['hojadevida']['tmp_name']) ? $_FILES['hojadevida']['tmp_name'] : '', "$carpeta/hojadevida.pdf");
move_uploaded_file(isset($_FILES['copiacedula']['tmp_name']) ? $_FILES['copiacedula']['tmp_name'] : '', "$carpeta/copiacedula.pdf");
move_uploaded_file(isset($_FILES['copiadiploma']['tmp_name']) ? $_FILES['copiadiploma']['tmp_name'] : '', "$carpeta/copiadiploma.pdf");
move_uploaded_file(isset($_FILES['actagrado']['tmp_name']) ? $_FILES['actagrado']['tmp_name'] : '', "$carpeta/actagrado.pdf");
move_uploaded_file(isset($_FILES['otrosestudios']['tmp_name']) ? $_FILES['otrosestudios']['tmp_name'] : '', "$carpeta/otrosestudios.pdf");
move_uploaded_file(isset($_FILES['epsfparl']['tmp_name']) ? $_FILES['epsfparl']['tmp_name'] : '', "$carpeta/epsfparl.pdf");
move_uploaded_file(isset($_FILES['certificadovacunas']['tmp_name']) ? $_FILES['certificadovacunas']['tmp_name'] : '', "$carpeta/certificadovacunas.pdf");
move_uploaded_file(isset($_FILES['rethus']['tmp_name']) ? $_FILES['rethus']['tmp_name'] : '', "$carpeta/rethus.pdf");
move_uploaded_file(isset($_FILES['rut']['tmp_name']) ? $_FILES['rut']['tmp_name'] : '', "$carpeta/rut.pdf");
move_uploaded_file(isset($_FILES['rcp']['tmp_name']) ? $_FILES['rcp']['tmp_name'] : '', "$carpeta/rcp.pdf");
// Repite el proceso para los demás archivos

$conn->close();
?>
