<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";

// Conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Get user input from the form
$usuario = sanitizeInput($_GET['usuario']);

// Obtener el código a eliminar del formulario
$codigo_a_eliminar = $_POST['numerocedula1'];

// Consulta SQL para eliminar el registro con el código proporcionado
$sql = "DELETE FROM pacientes WHERE numerocedula = '$codigo_a_eliminar'";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    $mensaje = "Paciente eliminado correctamente";
                echo '<script>alert("' . $mensaje . '");</script>';
                echo '<script>window.location.href = "pac.php?usuario=' . urlencode($usuario) . '";</script>';
} else {
    $mensaje = "Hay algun error: " . $conexion->error;
                echo '<script>alert("' . $mensaje . '");</script>';
                echo '<script>window.location.href = "pac.php?usuario=' . urlencode($usuario) . '";</script>';
}

// Cerrar la conexión
$conexion->close();
?>
