<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saludcom | Recepcion</title>
  <link rel="shortcut icon" type="image/png" href="../../assets/images/logos/jae.png" />
  <link rel="stylesheet" href="../../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="../../assets/images/logos/logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Menu Navegacion-->
        <?php
          // Verifica si se proporciona el ID de usuario en la URL
          $nombreCompleto = ''; // Inicializa la variable para evitar advertencias de undefined
          $cargo = '';
          if (isset($_GET['usuario'])) {
            $userId = $_GET['usuario'];

            // Suponiendo que tienes una conexión a la base de datos
            $servername = "localhost";
            $username = "id18386849_asprilla";
            $password = "Asprilla2004*";
            $dbname = "id18386849_saludcombd";

            // Crea la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica la conexión
            if ($conn->connect_error) {
              die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta la información del usuario en la base de datos
            $sql = "SELECT pnombre, papellido, cargo FROM login WHERE usuario = $userId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Obtiene los datos de cada fila
              while ($row = $result->fetch_assoc()) {
                // Almacena la información del usuario en variables PHP
                $nombreCompleto = $row['pnombre'] . ' ' . $row['papellido'];
                $cargo = $row['cargo'];
              }
            } else {
              echo "0 resultados";
            }

            // Cierra la conexión a la base de datos
            $conn->close();
          }
          ?>
          <?php
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se ha enviado el parámetro 'usuario' por método GET
if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    // Consultar la base de datos para verificar si el usuario existe y tiene almacenamiento igual a 'Si'
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND citas = 'Si'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    } else {
      $mensaje = "No tienes ingreso a este submodulo";
      echo '<script>alert("' . $mensaje . '");</script>';

        // Verificar si el usuario está presente en la tabla 'login'
        $sqlUsuario = "SELECT * FROM login WHERE usuario = '$usuario'";
        $resultUsuario = $conn->query($sqlUsuario);

        if ($resultUsuario->num_rows == 0) {
            // Si el usuario no está en la tabla 'login', redireccionar a otra página
            header("Location: ../../login.php");
            exit();
        }

        // Redireccionar a la página anterior
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            // Si no hay una página anterior, redireccionar a una página predeterminada
            header("Location: ../../login.php");
            exit();
        }
    }
} else {
    $mensaje = "No has iniciado sesión";
    echo '<script>alert("' . $mensaje . '");</script>';
    echo '<script>window.location.href = "../../login.php";</script>';
}

// Cerrar la conexión
$conn->close();
?>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Pagina Principal</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../index.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false" >
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Inicio</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Submodulos</span>
            </li>
            <li class="sidebar-item">
            <a class="sidebar-link" href="../almacen/alma.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] . '&opcion=opcion1' : '?opcion=opcion1'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Almacenamiento</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link"  href="../siste/sistemas.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-device-desktop"></i>
                </span>
                <span class="hide-menu">Accesos Web</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link"  href="../med/medico.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-folder"></i>
                </span>
                <span class="hide-menu">Medico</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link"  href="../talen/talento.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-components"></i>
                </span>
                <span class="hide-menu">Talento Humano</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../pacientes/pac.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Pacientes Registrados</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" style="background-color: #1eac4e; color: white;" href="recepcion.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Asignacion Citas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link"  href="../far/farmacia.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-bandage"></i>
                </span>
                <span class="hide-menu">Historia Clinica</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Autenticacion</span>
            </li>
          </br>
  <div class="hstack gap-3">
    <div class="john-img">
      <img
        src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg"
        class="rounded-circle"
        width="40"
        height="40"
        alt=""
      />
    </div>
    <div class="john-title">
      <h6 class="mb-0 fs-4 fw-semibold"><?php echo $nombreCompleto; ?></h6>
      <span class="fs-2"><?php echo $cargo; ?></span>
    
  </div>
          </ul>
        </nav>
        <!-- Fin Menu Navegacion -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <div class="john-title">
                <h6 class="mb-0 fs-4 fw-semibold"><?php echo $nombreCompleto; ?></h6>
                <span class="fs-2"><?php echo $cargo; ?></span>
              </div>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Mi Perfil</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">Configuracion</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar Sesion</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <style>
      .container {
      max-width: 1800px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Cambia el ancho y alto de los inputs específicos */
    #photo {
      width: 300px;
      height: 600px;
    }

    /* Contenedor para los campos de nombres y apellidos */
    .name-container,
    .document-container {
      display: flex;
      gap: 10px;
    }

    .name-container input,
    .document-container input {
      flex: 1; /* Para que los campos se distribuyan igualmente */
    }

    
#identificacion,
#nombre,
#eps,
#regimen,
#costo,
#telefono,
#correo,
#profesional,
#fecha,
#hora {
      width: calc(32% - 10px); /* 30% para el campo Tipo de Documento */
    }

    #estado,
#tipoconsulta {
      width: calc(33.5% - 10px); /* 30% para el campo Tipo de Documento */
    }

    .preview-container {
      width: 300px;
      height: 600px;
      border: 2px dashed #28a745;
      margin-bottom: 20px;
      position: relative;
      overflow: hidden;
    }

    .preview {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    button {
      background-color: #28a745;
      width: 40%;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .small-text {
              font-size: 12px;
              color: #555;
          }
  
          .data-table {
              width: 2350px;
              border-radius: 8px;
              background-color: #4CAF50;
              color: white;
              border-collapse: collapse;
              margin-top: 20px;
          }
  
          .data-table th, .data-table td {
              padding: 15px;
              text-align: left;
              border-bottom: 1px solid white;
          }
  
          .data-table td {
              background-color: #E6E6E6;
              color: black;
              
          }

          .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            padding-top: 3px;
        }

        .pagination li {
            margin-right: 5px;
        }

        .pagination a {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #dddddd;
            color: #333;
            cursor: pointer;
        }

        .pagination a:hover {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 768px) {
            .box {
                width: 80%; /* Full width for small screens */
            }
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% ;
            margin-left: 23%;
            padding: 20px;
            padding-left:55px;
            width: 820px;
        }

        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-right:40px;
            background-color: #4CAF50;
            width: 600px;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    .agregar-btn {
      background-color: #3498db; /* Azul */
        color: #fff;
        width: 120px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }

    .eliminar-btn {
        background-color: #ff4d4d; /* Rojo */
        width: 120px;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }

    .editar-btn {
      background-color: #f0c808; /* Amarillo */
      width: 120px;
        color: #fff;
        margin: 15px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }

    .imprimir-btn {
      background-color: #8D33FF; /* Amarillo */
      width: 120px;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }
  </style>
      <!--  Header End -->

      <?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "id18386849_asprilla";
$password = "Asprilla2004*";
$dbname = "id18386849_saludcombd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
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
$usuario = sanitizeInput($_GET['usuario']);

// Variable para almacenar el valor del campo 'ident'
$identValue = '';

// Comprobar si el campo 'ident' tiene un valor
if (isset($_POST['identificacion'])) {
    $ident = $_POST['identificacion'];
    $identValue = $ident;

    // Consultar la base de datos para obtener los campos correspondientes utilizando una consulta preparada
    $sql = "SELECT nombrecompleto, regimen, eps, telefono, correo FROM pacientes WHERE numerocedula = ?";
    $stmt = $conn->prepare($sql);

    // Verificar la preparación de la consulta
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $ident);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $nombre = $row['nombrecompleto'];
        $regimen = $row['regimen'];
        $eps = $row['eps'];
        $telefono = $row['telefono'];
        $correo = $row['correo'];

        // Mostrar los valores en los campos correspondientes utilizando JavaScript
        echo "
        <script>
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nombre').value = '$nombre';
            document.getElementById('regimen').value = '$regimen';
            document.getElementById('eps').value = '$eps';
            document.getElementById('telefono').value = '$telefono';
            document.getElementById('correo').value = '$correo';
        });
        </script>
        ";
    } else {
        echo "
        <script>
        window.addEventListener('DOMContentLoaded', function() {
            alert('El número de identificación $ident no existe en la base de datos');
        });
        </script>
        ";
    }
}

// Guardar los datos ingresados en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Guardar'])) {
    $estado = $_POST["estado"];
    $identificacion = $_POST["identificacion"];
    $nombre = $_POST["nombre"];
    $eps = $_POST["eps"];
    $regimen = $_POST["regimen"];
    $costo = $_POST["costo"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $profesional = $_POST["profesional"];
    $tipoconsulta = $_POST["tipoconsulta"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    $sql = "INSERT INTO citasasignadas (estado, identificacion, nombre, eps, regimen, costo, telefono, correo, profesional, tipoconsulta, fecha, hora)
    VALUES ('$estado', '$identificacion', '$nombre', '$eps', '$regimen', '$costo', '$telefono', '$correo', '$profesional', '$tipoconsulta', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "¡Cita Asignada! Se ha registrado con éxito.";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "recepcion.php?usuario=' . urlencode($usuario) . '";</script>';
    } else {
        $mensaje = "¡Tu cita no fue asignada! Hay un error.";
        echo '<script>alert("' . $mensaje . '");</script>';
        echo '<script>window.location.href = "recepcion.php?usuario=' . urlencode($usuario) . '";</script>';
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

      <div class="container-fluid">
      <div style="margin-bottom: 10px;">
      <div class="container">
      <form action="" method="post" >
<div class="form-group">
<label for="tipocontrato">Datos del paciente para asignar cita</label><br><br>
  <div class="name-container">
  <select name="estado" id="estado" required>
     <option value="" disabled selected>Estado de la cita</option>
     <option value="Pendiente">Pendiente</option>
     <option value="Cancelada">Cancelada</option>
     <option value="Si Asistio">Si Asistio</option>
     <option value="No Asistio">No Asistio</option>
    </select>
    <input type="text" id="identificacion" name="identificacion" placeholder="Identificacion" value="<?php echo $identValue; ?>" onblur="this.form.submit()">
    <input type="text" id="nombre" name="nombre" placeholder="Nombre Paciente">
  </div>
</div>
<div class="form-group">
  <div class="name-container">
    <input type="text" id="eps" name="eps" placeholder="EPS">
    <input type="text" id="regimen" name="regimen" placeholder="Regimen">
    <input type="text" id="correo" name="correo" placeholder="Correo">
  </div>
</div>
<div class="form-group">
  <div class="name-container">
    <input type="text" id="telefono" name="telefono" placeholder="Telefono">
    <input type="text" id="costo" name="costo" placeholder="Costo Cita">
    <input type="text" id="profesional" name="profesional" placeholder="Profesional">
  </div>
</div>
<div class="form-group">
  <div class="name-container">
  <select id="tipoconsulta" name="tipoconsulta">
        <option value="" disabled selected>Tipo de consulta</option>
        <option value="Consulta de rutina o preventiva">Consulta de rutina o preventiva</option>
        <option value="Consulta de atención primaria">Consulta de atención primaria</option>
        <option value="Consulta de especialista">Consulta de especialista</option>
        <option value="Consulta de emergencia">Consulta de emergencia</option>
        <option value="Consulta de seguimiento">Consulta de seguimiento</option>
        <option value="Consulta prenatal">Consulta prenatal</option>
        <option value="Consulta de salud mental">Consulta de salud mental</option>
        <option value="Consulta geriátrica">Consulta geriátrica</option>
        <option value="Consulta pediátrica">Consulta pediátrica</option>
        <option value="Consulta de control de peso">Consulta de control de peso</option>
        <option value="Consulta de endocrinología">Consulta de endocrinología</option>
        <option value="Consulta de reumatología">Consulta de reumatología</option>
        <option value="Consulta de neurología">Consulta de neurología</option>
        <option value="Consulta de gastroenterología">Consulta de gastroenterología</option>
        <option value="Consulta de cardiología">Consulta de cardiología</option>
        <option value="Consulta de urología">Consulta de urología</option>
        <option value="Consulta de ginecología">Consulta de ginecología</option>
        <option value="Consulta de oftalmología">Consulta de oftalmología</option>
        <option value="Consulta de otorrinolaringología">Consulta de otorrinolaringología</option>
        <option value="Consulta de dermatología">Consulta de dermatología</option>
        <option value="Consulta de odontología">Consulta de odontología</option>
        <option value="Consulta de medicina interna">Consulta de medicina interna</option>
        <option value="Consulta de cirugía general">Consulta de cirugía general</option>
        <option value="Consulta de cirugía ortopédica">Consulta de cirugía ortopédica</option>
        <option value="Consulta de oncología">Consulta de oncología</option>
        <option value="Consulta de radiología e imágenes médicas">Consulta de radiología e imágenes médicas</option>
        <option value="Consulta de nefrología">Consulta de nefrología</option>
        <option value="Consulta de hematología">Consulta de hematología</option>
        <option value="Consulta de infecciones y enfermedades contagiosas">Consulta de infecciones y enfermedades contagiosas</option>
        <option value="Consulta de diabetes y endocrinología">Consulta de diabetes y endocrinología</option>
        <option value="Consulta de medicina física y rehabilitación">Consulta de medicina física y rehabilitación</option>
        <option value="Consulta de nutrición">Consulta de nutrición</option>
        <option value="Consulta de fisioterapia">Consulta de fisioterapia</option>
        <option value="Consulta de psicología clínica">Consulta de psicología clínica</option>
        <option value="Consulta de terapia ocupacional">Consulta de terapia ocupacional</option>
    </select>
    <input type="text" id="fecha" name="fecha" placeholder="Fecha Cita, dd/mm/aaaa ">
    <input type="text" id="hora" name="hora" placeholder="Hora Cita, Ej: 8:00 pm ">
    <input type="hidden" id="usuario" name="usuario" value="<?php echo urlencode($_GET['usuario']); ?>">
  </div>
</div><br>
      <div class="form-group">
        <center><button type="submit" name="Guardar" value="Guardar">Asignar Cita</button></center>
      </div>
    </form>
  </div>
  <span class="hide-menu">Asignacion Citas</span><hr>
      <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
      <button class="editar-btn" onclick="editar()">Editar</button>
      <button class="imprimir-btn" onclick="imprimir()">Descargar</button>


      <div id="imprimir" class="modal">
    <div class="modal-content">
        <span class="close" onclick="Close()">&times;</span>
        <form action="imprimir.php" method="get">
            <div class="form-row"><br>
                <label for="codigo">Escribe el codigo de la cita que quiere descargar:</label><br><br>

                <?php
    // Assuming $_GET['usuario'] contains the user value
    $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
    ?>
    
    <input type="hidden" id="usuario" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>">
                <input type="text" id="codigo" name="codigo" placeholder="Ingresa el codigo" required>
                

            </div><br>
            <center>
                <input type="submit" value="Descargar Cita">
            </center>
        </form>
    </div>
</div>

<script>
// JavaScript code
function imprimir() {
    var modal = document.getElementById('imprimir');
    modal.style.display = 'block';
}

function Close() {
    var modal = document.getElementById('imprimir');
    modal.style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('imprimir');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>


      <div id="elimminarodal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="loseModal()">&times;</span>
        <form action="eliminar.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post">
            <div class="form-row"><br>
                <label for="codigo">Escribe el codigo que desea eliminar:</label><br><br>
                <input type="text" id="id" name="id" placeholder="Ingresa el codigo" required>
            </div><br>
            <center>
                <input type="submit" value="Eliminar Cita">
            </center>
        </form>
    </div>
</div>

<script>
// JavaScript code
function eliminar() {
    var modal = document.getElementById('elimminarodal');
    modal.style.display = 'block';
}

function loseModal() {
    var modal = document.getElementById('elimminarodal');
    modal.style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('elimminarodal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>


<div id="editarModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="ploseModal()">&times;</span><br>
        <form action="editar.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post">
        <div class="form-group">
<label for="tipocontrato">Datos del paciente para editar cita</label><br><br>
  <div class="name-container">
  <input type="text" id="id" name="id" placeholder="Codigo">
  <input type="text" id="identificacion" name="identificacion" placeholder="Identificacion ">
  <select name="estado" id="estado" required>
     <option value="" disabled selected>Estado de la cita</option>
     <option value="Pendiente">Pendiente</option>
     <option value="Cancelada">Cancelada</option>
     <option value="Si Asistio">Si Asistio</option>
     <option value="No Asistio">No Asistio</option>
    </select>

  </div>
</div>           
            <div class="form-group">
                <center><button type="submit">Editar Cita</button></center>
            </div>
        </form>
    </div>
</div>

<script>
// JavaScript code
function editar() {
    var modal = document.getElementById('editarModal');
    modal.style.display = 'block';
}

function ploseModal() {
    var modal = document.getElementById('editarModal');
    modal.style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('editarModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>     







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

// Consulta SQL para obtener los datos
$sql = "SELECT * FROM citasasignadas";
$resultado = $conexion->query($sql);

// Cerrar la conexión
$conexion->close();
?>

<div style="overflow-x: auto;">
      <!-- Tabla de Datos -->
      <table class="data-table">
    <thead>
        <tr>
              <th> Codigo</th>
              <th> Estado</th>
							<th> Identificacion </th>
							<th> Paciente </th>
              <th> EPS </th>
              <th> Regimen</th>
              <th> Costo Cita</th>
							<th> Telefono </th>
              <th> Correo</th>
              <th> Profesional</th>
              <th> Tipo Consulta</th>
							<th> Fecha Cita </th>
							<th> Hora Cita </th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Iterar a través de los resultados de la consulta
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td >{$fila['id']}</td>";
            echo "<td >{$fila['estado']}</td>";
            echo "<td >{$fila['identificacion']}</td>";
            echo "<td >{$fila['nombre']}</td>";
            echo "<td >{$fila['eps']}</td>";
            echo "<td >{$fila['regimen']}</td>";
            echo "<td >{$fila['costo']}</td>";
            echo "<td >{$fila['telefono']}</td>";
            echo "<td >{$fila['correo']}</td>";
            echo "<td >{$fila['profesional']}</td>";
            echo "<td >{$fila['tipoconsulta']}</td>";
            echo "<td >{$fila['fecha']}</td>";
            echo "<td >{$fila['hora']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</div><br><br>
      
  </div>


  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/sidebarmenu.js"></script>
  <script src="../../assets/js/app.min.js"></script>
  <script src="../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../../assets/js/dashboard.js"></script>
</body>

</html>