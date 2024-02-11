<?php
// descarga.php

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get user input from the form
$user = sanitizeInput($_GET['usuario']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $numeroCedula = $_POST['numerocedula'];
    $tipoArchivo = $_POST['archivo'];

    // Define la ruta de la carpeta principal
    $carpetaPrincipal = 'files';

    // Comprueba si la carpeta con el nombre de la cédula existe
    $rutaCarpetaCedula = $carpetaPrincipal . DIRECTORY_SEPARATOR . $numeroCedula;

    if (is_dir($rutaCarpetaCedula)) {
        // La carpeta existe, ahora intenta descargar el archivo correspondiente al tipo seleccionado
        $archivoParaDescargar = $rutaCarpetaCedula . DIRECTORY_SEPARATOR . $tipoArchivo . '.pdf';  // Cambia la extensión según tus necesidades

        if (file_exists($archivoParaDescargar)) {
            // Configura las cabeceras para forzar la descarga del archivo
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($archivoParaDescargar) . '"');
            readfile($archivoParaDescargar);
            exit;
        } else {
            $mensaje = "Error: El archivo para el tipo seleccionado no existe.";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "talento.php?usuario=' . urlencode($user) . '";</script>';
        }
    } else {
        $mensaje = "Error: La carpeta con el número de cédula proporcionado no existe.";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "talento.php?usuario=' . urlencode($user) . '";</script>';
    }
} else {
    $mensaje = "Error: El formulario no ha sido enviado correctamente.";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "talento.php?usuario=' . urlencode($user) . '";</script>';
}
?>
