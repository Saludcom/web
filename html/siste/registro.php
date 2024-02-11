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
    $pnombre = sanitizeInput($_POST["pnombre"]);
    $papellido = sanitizeInput($_POST["papellido"]);
    $cargo = sanitizeInput($_POST["cargo"]);
    $usuario = sanitizeInput($_POST["usuario"]);
    $rol = sanitizeInput($_POST["rol"]);
    $contraseña = sanitizeInput($_POST["contraseña"]); 
    $almacenamiento = sanitizeInput($_POST["almacenamiento"]);
    $accesos = sanitizeInput($_POST["accesos"]);
    $medico = sanitizeInput($_POST["medico"]);
    $talento = sanitizeInput($_POST["talento"]);
    $pacientes = sanitizeInput($_POST["pacientes"]);
    $citas = sanitizeInput($_POST["citas"]);
    $farmacia = sanitizeInput($_POST["farmacia"]);// Hash the password

    // SQL query to insert data into the database
    $sql = "INSERT INTO login (pnombre, papellido, cargo, usuario, rol, contraseña, almacenamiento, accesos, medico, talento, pacientes, citas, farmacia)
            VALUES ('$pnombre', '$papellido', '$cargo', '$usuario', '$rol', '$contraseña', '$almacenamiento', '$accesos', '$medico', '$talento', '$pacientes', '$citas', '$farmacia')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Usuario registrado correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "sistemas.php?usuario=' . urlencode($user) . '";</script>';
    } else {
        $mensaje = "Hay algun error: " . $conn->error;
                echo '<script>alert("' . $mensaje . '");</script>';
                echo '<script>window.location.href = "sistemas.php?usuario=' . urlencode($user) . '";</script>';
    }
}

// Close the database connection
$conn->close();
?>
