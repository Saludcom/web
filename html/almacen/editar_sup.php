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
    $id_tbl_producto = mysqli_real_escape_string($conn, $_POST['id_tbl_producto']);
    $id_producto = mysqli_real_escape_string($conn, $_POST['id_producto']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $agrupador = mysqli_real_escape_string($conn, $_POST['agrupador']);
    $cups = mysqli_real_escape_string($conn, $_POST['cups']);
    $vr_unitario_cobro = mysqli_real_escape_string($conn, $_POST['vr_unitario_cobro']);

    // Check if the record with the given code already exists
    $checkQuery = "SELECT * FROM suplementos WHERE id_tbl_producto = '$id_tbl_producto'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Update the existing record
        $updateQuery = "UPDATE suplementos
        SET 
            id_producto = '$id_producto', 
            descripcion = '$descripcion', 
            agrupador = '$agrupador', 
            cups = '$cups', 
            vr_unitario_cobro = '$vr_unitario_cobro'
        WHERE id_tbl_producto = '$id_tbl_producto'";
        

        if ($conn->query($updateQuery) === TRUE) {
            $mensaje = "Suplementos editado correctamente";
            $opcion = "opcion3";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        } else {
            $mensaje = "Hay algun error: " . $conn->error;
            $opcion = "opcion3";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        }
    } else {
        // Insert a new record
        $insertQuery = "INSERT INTO suplementos (
            id_tbl_producto, 
            id_producto, 
            descripcion, 
            agrupador,
            presentacion, 
            concentracion, 
            activo, 
            vr_unitario_cobro
        ) VALUES (
            '$id_tbl_producto', 
            '$id_producto', 
            '$descripcion',
            '$agrupador', 
            '$presentacion', 
            '$concentracion', 
            '$activo', 
            '$vr_unitario_cobro'
        )";
        if ($conn->query($insertQuery) === TRUE) {
            $mensaje = "Suplemento registrado correctamente";
            $opcion = "opcion3";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        } else {
            $mensaje = "Hay algun error: " . $conn->error;
            $opcion = "opcion3";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        }
    }
}

// Close connection
$conn->close();
?>
