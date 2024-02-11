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
    $cups = mysqli_real_escape_string($conn, $_POST['cups']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $presentacion = mysqli_real_escape_string($conn, $_POST['presentacion']);
    $concentracion = mysqli_real_escape_string($conn, $_POST['concentracion']);
    $vr_unitario_cobro = mysqli_real_escape_string($conn, $_POST['vr_unitario_cobro']);
    $observacion = mysqli_real_escape_string($conn, $_POST['observacion']);


    // Check if the record with the given code already exists
    $checkQuery = "SELECT * FROM medicamentos WHERE id_tbl_producto = '$id_tbl_producto'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Update the existing record
        $updateQuery = "UPDATE medicamentos SET id_producto='$id_producto', cups='$cups', descripcion='$descripcion', presentacion='$presentacion', concentracion='$concentracion', vr_unitario_cobro='$vr_unitario_cobro' , observacion='$observacion' WHERE id_tbl_producto='$id_tbl_producto'";

        if ($conn->query($updateQuery) === TRUE) {
            $mensaje = "Medicamento editado correctamente";
            $opcion = "opcion1";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        } else {
            $mensaje = "Hay algun error: " . $conn->error;
            $opcion = "opcion1";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        }
    } else {
        // Insert a new record
        $insertQuery = "INSERT INTO medicamentos (codigo, cum, cups, medicamento, descripcion, presentacion, concentracion, via_administrativa, agrupador, caducidad, cantidad, numero_lote, proveedor, fecha_recepcion, numero_registro, costo_unitario, venta_unitario, observacion) VALUES ('$codigo', '$cum', '$cups', '$medicamento', '$descripcion', '$presentacion', '$concentracion', '$via_administrativa', '$agrupador', '$caducidad', '$cantidad', '$numero_lote', '$proveedor', '$fecha_recepcion', '$numero_registro', '$costo_unitario', '$venta_unitario', '$observacion')";

        if ($conn->query($insertQuery) === TRUE) {
            $mensaje = "Medicamento registrado correctamente";
            $opcion = "opcion1";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        } else {
            $mensaje = "Hay algun error: " . $conn->error;
            $opcion = "opcion1";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "alma.php?usuario=' . urlencode($usuario) . '&opcion=' . urlencode($opcion) . '";</script>';
        }
    }
}

// Close connection
$conn->close();
?>
