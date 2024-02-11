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



    // Check if the record with the given code already exists
    $checkQuery = "SELECT * FROM equipos WHERE codigo = '$codigo'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Update the existing record
        $updateQuery = "UPDATE equipos
        SET descripcion = '$descripcion',
            cantidad = '$cantidad',
            valor_compra = '$valor_compra',
            observaciones = '$observaciones'
        WHERE codigo = '$codigo'";
        

        if ($conn->query($updateQuery) === TRUE) {
            $mensaje = "Equipo editado correctamente";
            $opcion = "opcion4";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        } else {
            $mensaje = "Hay algun error: " . $conn->error;
            $opcion = "opcion4";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        }
    } else {
        // Insert a new record
        $insertQuery = "INSERT INTO equipos (codigo, nombre_equipo, descripcion, modelo, cantidad, proveedor, valor_compra, valor_venta, estado, observaciones)
        VALUES ('$codigo', '$nombre_equipo', '$descripcion', '$modelo', '$cantidad', '$proveedor', '$valor_compra', '$valor_venta', '$estado', '$observaciones')";

        if ($conn->query($insertQuery) === TRUE) {
            $mensaje = "Equipo registrado correctamente";
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
}

// Close connection
$conn->close();
?>
