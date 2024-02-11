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

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidad']);
    $valor_compra = mysqli_real_escape_string($conn, $_POST['valor_compra']);
    $observaciones = mysqli_real_escape_string($conn, $_POST['observaciones']);

    // SQL query to insert data into the table
    $sql = "INSERT INTO equipos (codigo, descripcion, cantidad, valor_compra, observaciones)
    VALUES ('$codigo', '$descripcion', '$cantidad', '$valor_compra', '$observaciones')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Equipo registrado correctamente";
        $opcion = "opcion4";

        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
    } else {
        $mensaje = "Hay algún error: " . $conn->error;
        $opcion = "opcion4";

        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
    }
}

// Close connection
$conn->close();
?>
