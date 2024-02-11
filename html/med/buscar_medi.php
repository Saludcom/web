<?php
// Database connection details
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el valor del campo de nombre del medicamento desde la solicitud POST
$nombreMed = $_POST['nombre_med'];

// Realizar la consulta a la base de datos (esto es solo un ejemplo, asegúrate de modificarlo según tu estructura de base de datos)
$sql = "SELECT * FROM medicamentos WHERE descripcion LIKE '%$nombreMed%'";
$result = $conn->query($sql);

// Crear un array con los resultados
$medicamentos = array();
while($row = $result->fetch_assoc()) {
    $medicamentos[] = $row;
}

// Devolver los resultados como JSON
header('Content-Type: application/json');
echo json_encode($medicamentos);

$conn->close();
?>
