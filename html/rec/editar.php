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


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $identificacion = $_POST["identificacion"];
    $codigo = $_POST["id"];
    $nuevoEstado = $_POST["estado"];

    // Consulta para actualizar el estado en la base de datos
    $sql = "UPDATE citasasignadas SET estado = ? WHERE identificacion = ? AND id = ?";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("sss", $nuevoEstado, $identificacion, $codigo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            $mensaje = "Cita editada correctamente";
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "recepcion.php?usuario=' . urlencode($usuario) . '";</script>';
        } else {
            $mensaje = "Hay algún error: " . $stmt->error;
            echo '<script>alert("' . $mensaje . '");</script>';
            echo '<script>window.location.href = "recepcion.php?usuario=' . urlencode($usuario) . '";</script>';
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        // Manejar el error de preparación
        die("Error al preparar la declaración: " . $conexion->error);
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
