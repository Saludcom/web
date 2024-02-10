<?php
// Database connection parameters
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

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Get user input from the form
$usuario = sanitizeInput($_POST['usuario']);
$contraseña = sanitizeInput($_POST['contraseña']);
$rol = sanitizeInput($_POST['rol']);

// Query to check user credentials
$sql = "SELECT * FROM login WHERE usuario = '$usuario' AND contraseña = '$contraseña' AND rol = '$rol'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid credentials, redirect based on role
    if ($rol == 'administrativo') {
		$mensaje = "Datos Correctos, Estás Ingresando como administrativo";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "html/index.php?usuario=' . urlencode($usuario) . '";</script>';
        exit();
    } elseif ($rol == 'paciente') {
		$mensaje = "Datos Correctos, Estás Ingresando como paciente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "php/index2.php?usuario=' . urlencode($usuario) . '";</script>';
        exit();
    }
} else {
    // Invalid credentials, redirect with error message
    $mensaje = "Datos Incorrectos, Los datos ingresados no existen";
                echo '<script>alert("' . $mensaje . '");</script>';
                echo '<script>window.location.href = "login.php";</script>';
    exit();
}

// Close the database connection
$conn->close();
?>
