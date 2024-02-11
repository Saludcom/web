<?php
// Establish database connection (Modify these credentials)
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $estado = sanitizeInput($_POST["estado"]);
    $identificacion = sanitizeInput($_POST["identificacion"]);
    $nombre = sanitizeInput($_POST["nombre"]);
    $eps = sanitizeInput($_POST["eps"]);
    $regimen = sanitizeInput($_POST["regimen"]);
    $costo = sanitizeInput($_POST["costo"]);
    $telefono = sanitizeInput($_POST["telefono"]);
    $correo = sanitizeInput($_POST["correo"]);
    $profesional = sanitizeInput($_POST["profesional"]);
    $tipoconsulta = sanitizeInput($_POST["tipoconsulta"]);
    $fecha = sanitizeInput($_POST["fecha"]);
    $hora = sanitizeInput($_POST["hora"]);

    // SQL query to insert data into the database
    $sql = "INSERT INTO citasasignadas (estado, identificacion, nombre, eps, regimen, costo, telefono, correo, profesional, tipoconsulta, fecha, hora)
            VALUES ('$estado', '$identificacion', '$nombre', '$eps', '$regimen', '$costo', '$telefono', '$correo', '$profesional', '$tipoconsulta', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Cita asignada correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "recepcion.php?usuario=' . urlencode($user) . '";</script>';
    } else {
        $mensaje = "Hay algun error: " . $conn->error;
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "recepcion.php?usuario=' . urlencode($user) . '";</script>';
    }
}

// Close the database connection
$conn->close();
?>
