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

$nombrecompleto = $_POST['nombrecompleto'];
$tipodocumento = $_POST['tipodocumento'];
$numerocedula = $_POST['numerocedula'];
$genero = $_POST['genero'];
$nacimiento = $_POST['nacimiento'];
$edad = $_POST['edad'];
$municipio = $_POST['municipio'];
$zona = $_POST['zona'];
$direccion = $_POST['direccion'];
$barrio = $_POST['barrio'];
$telefono = $_POST['telefono'];
$tipodiscapacidad = $_POST['tipodiscapacidad'];
$discapacidad = $_POST['discapacidad'];
$nombre_con = $_POST['nombre_con'];
$telefono_con = $_POST['telefono_con'];
$parentesco = $_POST['parentesco'];
$eps = $_POST['eps'];
$regimen = $_POST['regimen'];
$ingreso = $_POST['ingreso'];

// Verificar si ya existe un registro con el mismo número de cédula
$checkIfExistsQuery = "SELECT * FROM pacientes WHERE numerocedula = '$numerocedula'";
$result = $conn->query($checkIfExistsQuery);

if ($result->num_rows > 0) {
    // Ya existe un registro, realizar la actualización
    $updateQuery = "UPDATE pacientes SET
        nombrecompleto = '$nombrecompleto',
        tipodocumento = '$tipodocumento',
        genero = '$genero',
        nacimiento = '$nacimiento',
        edad = '$edad',
        municipio = '$municipio',
        zona = '$zona',
        direccion = '$direccion',
        barrio = '$barrio',
        telefono = '$telefono',
        tipodiscapacidad = '$tipodiscapacidad',
        discapacidad = '$discapacidad',
        nombre_con = '$nombre_con',
        telefono_con = '$telefono_con',
        parentesco = '$parentesco',
        eps = '$eps',
        regimen = '$regimen',
        ingreso = '$ingreso'
    WHERE numerocedula = '$numerocedula'";

    if ($conn->query($updateQuery) === TRUE) {
        $mensaje = "Paciente actualizado correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "pac.php?usuario=' . urlencode($usuario) . '";</script>';
    } else {
        $mensaje = "Error al actualizar el paciente: " . $conn->error;
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "pac.php?usuario=' . urlencode($usuario) . '";</script>';
    }
} else {
    // No existe un registro, realizar la inserción
    $insertQuery = "INSERT INTO pacientes (nombrecompleto, tipodocumento, numerocedula, genero, nacimiento, edad, municipio, zona, direccion, barrio, telefono, tipodiscapacidad, discapacidad, nombre_con, telefono_con, parentesco, eps, regimen, ingreso)
    VALUES ('$nombrecompleto', '$tipodocumento', '$numerocedula', '$genero', '$nacimiento', '$edad', '$municipio', '$zona', '$direccion', '$barrio', '$telefono', '$tipodiscapacidad', '$discapacidad', '$nombre_con', '$telefono_con', '$parentesco', '$eps', '$regimen', '$ingreso')";

    if ($conn->query($insertQuery) === TRUE) {
        $mensaje = "Paciente registrado correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "pac.php?usuario=' . urlencode($usuario) . '";</script>';
    } else {
        $mensaje = "Error al registrar el paciente: " . $conn->error;
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "pac.php?usuario=' . urlencode($usuario) . '";</script>';
    }
}

// Cerrar conexión
$conn->close();
?>
