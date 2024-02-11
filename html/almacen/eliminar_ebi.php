<?php
// Database connection details
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Get user input from the form
$usuario = sanitizeInput($_GET['usuario']);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the code from the form
    $code = $_POST["codigo"];

    // Validate and sanitize the input if needed

    // Perform the deletion query
    $sql = "DELETE FROM equipos WHERE codigo = '$code'";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Equipo eliminado correctamente";
$opcion = "opcion4";

echo '<script>alert("' . $mensaje . '");</script>';
echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
    } else {
        $mensaje = "Hay algun error: " . $conn->error;
$opcion = "opcion4";

echo '<script>alert("' . $mensaje . '");</script>';
echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
    }
}

// Close the database connection
$conn->close();
?>
