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
$user = sanitizeInput($_GET['usuario']);

$usuario = sanitizeInput($_POST['usuario']);
$rol = sanitizeInput($_POST['rol']);
$contraseña = sanitizeInput($_POST['contraseña']);
$almacenamiento = sanitizeInput($_POST['almacenamiento']);
$accesos = sanitizeInput($_POST['accesos']);
$medico = sanitizeInput($_POST['medico']);
$talento = sanitizeInput($_POST['talento']);
$pacientes = sanitizeInput($_POST['pacientes']);
$citas = sanitizeInput($_POST['citas']);
$farmacia = sanitizeInput($_POST['farmacia']);

// Obtener el código a eliminar del formulario
$codigo_a_eliminar = $_GET['usuario'];

// Verificar si el usuario existe antes de ejecutar la consulta
$verificacion_sql = "SELECT * FROM login WHERE usuario = '$usuario'";
$resultado_verificacion = $conexion->query($verificacion_sql);

if ($resultado_verificacion->num_rows > 0) {
    // El usuario existe, ejecutar la actualización
    $sql = "UPDATE login SET rol = '$rol' , contraseña = '$contraseña' , almacenamiento = '$almacenamiento' , accesos= '$accesos'
    , medico = '$medico' , talento = '$talento' , pacientes = '$pacientes' , citas = '$citas' , farmacia = '$farmacia'WHERE usuario = '$usuario'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Usuario editado correctamente";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "sistemas.php?usuario=' . urlencode($user) . '";</script>';
    } else {
        $mensaje = "Hay algún error: " . $conexion->error;
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "sistemas.php?usuario=' . urlencode($user) . '";</script>';
    }
} else {
    // El usuario no existe, mostrar mensaje de error
    $mensaje = "El usuario ingresado no existe";
    echo '<script>alert("' . $mensaje . '");</script>';
    echo '<script>window.location.href = "sistemas.php?usuario=' . urlencode($user) . '";</script>';
}

// Cerrar la conexión
$conexion->close();
?>
