<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saludcom | Medico</title>
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
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND medico = 'Si'";
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
              <a class="sidebar-link" style="background-color: #1eac4e; color: white;" href="medico.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-folder"></i>
                </span>
                <span class="hide-menu">Medico</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../talen/talento.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
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
              <a class="sidebar-link" href="../rec/recepcion.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Asignacion Citas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../far/farmacia.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
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
      </header><br>
      <!--  Header End -->
      <div class="container-fluid">
      <style>
  .form-group {
    display: flex;
    flex-direction: column;
  }

  .name-container {
    display: flex;
    flex-direction: row; /* Espacio entre los campos */
  }

  .input-container {
    position: relative;
  }

  .green-box {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
  }

  .green-box1 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:250px;
  }

  .green-box2 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:170px;
  }

  .green-box3 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:98px;
  }

  .green-box4 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:160px;
  }

  .green-box5 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:250px;
  }

  .green-box6 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:200px;
  }

  .green-box7 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:564px;
  }

  .green-box8 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:564px;
  }

  .green-box9 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:282px;
  }

  .green-box10 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:282px;
  }

  .green-box11 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:282px;
  }

  .green-box12 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:282px;
  }

  .green-box13 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:1128px;
  }

  .green-box14 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:225.6px;
  }

  .green-box15 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:225.6px;
  }

  .green-box16 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:225.6px;
  }

  .green-box17 {
    background-color: #ccffcc;
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:225.6px;
  }

  .green-box18 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:225.6px;
  }

  .green-box19 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:628px;
  }

  .green-box20 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:200px;
  }

  .green-box21 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:300px;
  }

  .green-box22 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:373px;
  }

  .green-box23 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:170px;
  }

  .green-box24 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:170px;
  }

  .green-box25 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:115px;
  }

  .green-box26 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:300px;
  }

  .green-box27 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:376px;
  }

  .green-box28 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:376px;
  }

  .green-box29 {
    background-color: #ccffcc; 
    padding: 5px; 
    color: black;
    border: 1px solid black;
    width:376px;
  }

  input {
    width: 100%;
    box-sizing: border-box;
    padding: 8px; /* Ajusta el relleno según tus necesidades */ /* Ajusta el margen superior según tus necesidades */
  }

  .onput3 {
    width: 100%;
    box-sizing: border-box;
    padding: 8px; /* Ajusta el relleno según tus necesidades */ /* Ajusta el margen superior según tus necesidades */
  }

  select {
    width: 100%;
    box-sizing: border-box;
    padding: 8px; /* Ajusta el relleno según tus necesidades */ /* Ajusta el margen superior según tus necesidades */
  }

  .agregar-btn {
      background-color: #1eac4e; /* Azul */
        color: #fff;
        margin : 5px;
        width: 120px;
        padding: 3px 8px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }

    .agregar {
      background-color: #1eac4e; /* Azul */
        color: #fff;
        width: 120px;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }


</style>
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

$identValue = '';

if (isset($_POST['identificacion'])) {
    $ident = $_POST['identificacion'];
    $identValue = $ident;
    $rowHistoriasClinicasReciente = array();

    // Consulta para obtener datos de la tabla 'pacientes'
    $sqlPacientes = "SELECT nombrecompleto, tipodocumento, nacimiento, nombre_con, zona, parentesco, municipio, discapacidad, tipodiscapacidad, genero, edad, direccion, barrio, telefono, regimen, eps FROM pacientes WHERE numerocedula = ?";
    $stmtPacientes = $conexion->prepare($sqlPacientes);

    if ($stmtPacientes) {
        $stmtPacientes->bind_param("s", $ident);
        $stmtPacientes->execute();
        $resultPacientes = $stmtPacientes->get_result();

        if ($resultPacientes->num_rows > 0) {
            $rowPacientes = $resultPacientes->fetch_assoc();

            // Obtener los valores de 'pacientes'
            $nombre = $rowPacientes['nombrecompleto'];
            $tipodocumento = $rowPacientes['tipodocumento'];
            $nombre_con = $rowPacientes['nombre_con'];
            $parentesco = $rowPacientes['parentesco'];
            $municipio = $rowPacientes['municipio'];
            $zona = $rowPacientes['zona'];
            $discapacidad = $rowPacientes['discapacidad'];
            $tipodiscapacidad = $rowPacientes['tipodiscapacidad'];
            $nacimiento = $rowPacientes['nacimiento'];
            $genero = $rowPacientes['genero'];
            $edad = $rowPacientes['edad'];
            $direccion = $rowPacientes['direccion'];
            $barrio = $rowPacientes['barrio'];
            $telefono = $rowPacientes['telefono'];
            $regimen = $rowPacientes['regimen'];
            $eps = $rowPacientes['eps'];

            // Consulta para obtener el registro más reciente de la tabla 'historiasclinicas' del paciente
            $sqlHistoriasClinicasReciente = "SELECT enfer_actual, antecedentes, diagnostico_pri, diagnostico_sec, signosvitales, analisisplan, fecha, hora, textbarner FROM historiasclinicas WHERE identificacion = ? ORDER BY CONCAT(fecha, ' ', hora) DESC LIMIT 1";
            $stmtHistoriasClinicasReciente = $conexion->prepare($sqlHistoriasClinicasReciente);

            if ($stmtHistoriasClinicasReciente) {
                $stmtHistoriasClinicasReciente->bind_param("s", $ident);
                $stmtHistoriasClinicasReciente->execute();
                $resultHistoriasClinicasReciente = $stmtHistoriasClinicasReciente->get_result();

                if ($resultHistoriasClinicasReciente->num_rows > 0) {
                    $rowHistoriasClinicasReciente = $resultHistoriasClinicasReciente->fetch_assoc();

                    // Obtener los valores de 'historiasclinicas'
                    $enfer_actual = $rowHistoriasClinicasReciente['enfer_actual'];
                    $antecedentes = $rowHistoriasClinicasReciente['antecedentes'];
                    $diagnostico_pri = $rowHistoriasClinicasReciente['diagnostico_pri'];
                    $diagnostico_sec = $rowHistoriasClinicasReciente['diagnostico_sec'];
                    $signosvitales = $rowHistoriasClinicasReciente['signosvitales'];
                    $analisisplan = $rowHistoriasClinicasReciente['analisisplan'];
                    $fecha = $rowHistoriasClinicasReciente['fecha'];
                    $hora = $rowHistoriasClinicasReciente['hora'];
                    $textbarner = $rowHistoriasClinicasReciente['textbarner'];
                } else {
                    // Si no hay datos en 'historiasclinicas' para el paciente, asignamos valores por defecto
                    $enfer_actual = $antecedentes = $diagnostico_pri = $diagnostico_sec = $signosvitales = $analisisplan = $fecha = $hora = $textbarner = '';
                }

                // Asignar valores a los campos correspondientes en el formulario después de que la página se cargue completamente
                echo "
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    console.log('Datos de pacientes:', " . json_encode($rowPacientes) . ");
                    console.log('Datos de historias clínicas:', " . json_encode($rowHistoriasClinicasReciente) . ");

                    document.getElementById('nombre').value = '$nombre';
                    document.getElementById('tipodocumento').value = '$tipodocumento';
                    document.getElementById('nombre_con').value = '$nombre_con';
                    document.getElementById('discapacidad').value = '$discapacidad';
                    document.getElementById('tipodiscapacidad').value = '$tipodiscapacidad';
                    document.getElementById('zona').value = '$zona';
                    document.getElementById('parentesco').value = '$parentesco';
                    document.getElementById('municipio').value = '$municipio';
                    document.getElementById('nacimiento').value = '$nacimiento';
                    document.getElementById('genero').value = '$genero';
                    document.getElementById('edad').value = '$edad';
                    document.getElementById('direccion').value = '$direccion';
                    document.getElementById('barrio').value = '$barrio';
                    document.getElementById('telefono').value = '$telefono';
                    document.getElementById('regimen').value = '$regimen';
                    document.getElementById('eps').value = '$eps';

                    document.getElementById('enfer_actual').value = '$enfer_actual';
                    document.getElementById('antecedentes').value = '$antecedentes';
                    document.getElementById('diagnostico_pri').value = '$diagnostico_pri';
                    document.getElementById('diagnostico_sec').value = '$diagnostico_sec';
                    document.getElementById('signosvitales').value = '$signosvitales';
                    document.getElementById('analisisplan').value = '$analisisplan';
                    document.getElementById('textbarner').value = '$textbarner';
                });
                </script>
                ";
            } else {
                echo "console.error('Error en la preparación de la consulta de historias clínicas: " . $conexion->error . "');";
            }
        } else {
            // Manejar caso en que no hay datos en 'pacientes'
            echo "console.error('No hay datos en pacientes para el paciente con identificación: $ident');";
        }
    } else {
        echo "console.error('Error en la preparación de la consulta de pacientes: " . $conexion->error . "');";
    }
}

// Cerrar la conexión
$conexion->close();
?>




      <div class="container">
      <form action="guardarhis.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post" >
      <div class="form-group">

  <div class="name-container">
    <div class="input-container">
      <div class="green-box">
        <label for="eps">Fecha Consulta</label>
      </div>
      <input type="text" id="fecha" name="fecha">
    </div>
    <script>
        // Función para obtener la fecha actual en formato dd/mm/aaaa
        function obtenerFechaActual() {
            const fecha = new Date();
            const dia = fecha.getDate().toString().padStart(2, '0');
            const mes = (fecha.getMonth() + 1).toString().padStart(2, '0');
            const año = fecha.getFullYear();
            return `${dia}/${mes}/${año}`;
        }

        // Establecer el valor del input con la fecha actual de Colombia
        document.getElementById('fecha').value = obtenerFechaActual();
    </script>

    <div class="input-container">
      <div class="green-box">
        <label for="regimen">Hora (Militar)</label>
      </div>
      <input type="text" id="hora" name="hora">
    </div>
    <script>
        // Función para obtener la hora actual en formato militar (24 horas) en Colombia
        function obtenerHoraActual() {
            const fecha = new Date();
            const horas = fecha.getHours().toString().padStart(2, '0');
            const minutos = fecha.getMinutes().toString().padStart(2, '0');
            const segundos = fecha.getSeconds().toString().padStart(2, '0');
            return `${horas}:${minutos}:${segundos}`;
        }

        // Establecer el valor del input con la hora actual de Colombia en formato militar
        document.getElementById('hora').value = obtenerHoraActual();
    </script>

    <div class="input-container">
      <div class="green-box">
        <label for="correo1">Mes</label>
      </div>
      <input type="text" id="mes" name="mes">
    </div>
  </div><br>
  <script>
        // Función para obtener el mes actual en formato completo (nombre) en Colombia
        function obtenerMesActual() {
            const meses = [
                "Enero", "Febrero", "Marzo", "Abril",
                "Mayo", "Junio", "Julio", "Agosto",
                "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ];
            
            const fecha = new Date();
            const mesActual = fecha.getMonth();
            const año = fecha.getFullYear();

            return `${meses[mesActual]}`;
        }

        // Establecer el valor del input con el mes actual de Colombia
        document.getElementById('mes').value = obtenerMesActual();
    </script>

  <label for="">Datos del paciente</label><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box1">
        <label for="correo2">Nombre Completo</label>
      </div>
      <input type="text" id="nombre" name="nombre">
    </div>

    <div class="input-container">
      <div class="green-box2">
        <label for="correo3">Fecha Nacimiento</label>
      </div>
      <input type="text" id="nacimiento" name="nacimiento">
    </div>

    <div class="input-container">
      <div class="green-box3">
        <label for="correo4">Edad</label>
      </div>
      <input type="text" id="edad" name="edad">
    </div>

    <div class="input-container">
      <div class="green-box4">
        <label for="correo5">Genero</label>
      </div>
      <input type="text" id="genero" name="genero">
    </div>

    <div class="input-container">
      <div class="green-box5">
        <label for="correo6">Tipo Documento</label>
      </div>
      <input type="text" id="tipodocumento" name="tipodocumento">
    </div>

    <div class="input-container">
      <div class="green-box6">
        <label for="correo6">N° Documento</label>
      </div>
      <input type="text" id="identificacion" name="identificacion" value="<?php echo $identValue; ?>" >
    </div>
  </div>
  <script>function handleClick() {
    var inputElement = document.getElementById("identificacion");
    handleBlur(inputElement); // Llamar a la función que se ejecuta al perder el foco
}

function handleBlur(element) {
    // Tu lógica aquí
    console.log("Se ejecutó la función. Valor del campo: " + element.value);
}</script>
  <button onclick="handleClick()">Buscar datos del paciente</button>
  <script>
function handleBlur(inputElement) {
    // Evitar la presentación del formulario
    inputElement.form.removeAttribute('action');

    // Ejecutar la función original
    inputElement.form.submit();
}
</script>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box7">
        <label for="eps">Direccion</label>
      </div>
      <input type="text" id="direccion" name="direccion">
    </div>

    <div class="input-container">
      <div class="green-box8">
        <label for="correo1">Barrio</label>
      </div>
      <input type="text" id="barrio" name="barrio">
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box9">
        <label for="eps">Municipio</label>
      </div>
      <input type="text" id="municipio" name="municipio">
    </div>

    <div class="input-container">
      <div class="green-box10">
        <label for="regimen">Zona</label>
      </div>
      <input type="text" id="zona" name="zona">
    </div>

    <div class="input-container">
      <div class="green-box11">
        <label for="regimen">Celular</label>
      </div>
      <input type="text" id="telefono" name="telefono">
    </div>


    <div class="input-container">
      <div class="green-box12">
        <label for="correo1">Telefono</label>
      </div>
      <input type="text" id="fijo" name="fijo">
    </div>
  </div>


  <div class="name-container">
    <div class="input-container">
      <div class="green-box9">
        <label for="eps">EPS</label>
      </div>
      <input type="text" id="eps" name="eps">
    </div>

    <div class="input-container">
      <div class="green-box10">
        <label for="regimen">Regimen</label>
      </div>
      <input type="text" id="regimen" name="regimen">
    </div>

    <div class="input-container">
      <div class="green-box11">
        <label for="regimen">Discapacidad</label>
      </div>
      <input type="text" id="discapacidad" name="discapacidad">
    </div>


    <div class="input-container">
      <div class="green-box12">
        <label for="correo1">Tipo Discapacidad</label>
      </div>
      <input type="text" id="tipodiscapacidad" name="tipodiscapacidad">
    </div>
  </div><br>

  <label for="">Datos del cuidador</label><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box7">
        <label for="eps">Nombre Cuidador</label>
      </div>
      <input type="text" id="nombre_con" name="nombre_con">
    </div>

    <div class="input-container">
      <div class="green-box8">
        <label for="correo1">Parentesco</label>
      </div>
      <input type="text" id="parentesco" name="parentesco">
    </div>
  </div><br>

  <label for="">Contenido Historia Clinica</label><br>


  <div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Motivo Consulta</label></center>
      </div>
      <select id="motivo" name="motivo" required>
  <option value="motivo">Motivo de consulta</option>
  <option value="Consulta de medicina general atencion domiciliaria trimestral">Consulta de medicina general atencion domiciliaria trimestral</option>
  <option value="Consulta de medicina general de atencion domiciliaria seguimiento mensual">Consulta de medicina general atencion general seguimiento mensual</option>
</select>
    </div>
  </div><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box">
        <center><label for="eps">Enfermedad Actual</label></center>
      </div>
      <textarea id="enfer_actual" name="enfer_actual" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea>
    </div>
  </div><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box">
        <center><label for="eps">Antecedentes</label></center>
      </div>
      <textarea id="antecedentes" name="antecedentes" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea>
    </div>
  </div><br>

  

  <label for="">Examen Fisico</label><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Signos Vitales</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box14">
        <label for="eps">TA</label>
      </div>
      <input type="text" id="ta" name="ta" required>
    </div>

    <div class="input-container">
      <div class="green-box15">
        <label for="regimen">FC</label>
      </div>
      <input type="text" id="fc" name="fc" required>
    </div>

    <div class="input-container">
      <div class="green-box16">
        <label for="regimen">FR</label>
      </div>
      <input type="text" id="fr" name="fr" required>
    </div>

    <div class="input-container">
      <div class="green-box17">
        <label for="regimen">T°</label>
      </div>
      <input type="text" id="t" name="t" required>
    </div>

    <div class="input-container">
      <div class="green-box18">
        <label for="correo1">SAT O2</label>
      </div>
      <input type="text" id="sat" name="sat" required>
    </div>
  </div>

  <div class="input-container">
  <textarea id="signosvitales" name="signosvitales" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea>
    </div>
  </div><br>

 

  <div class="name-container">
    <div class="input-container">
        <div class="green-box13">
            <center><label for="eps">Escala de Barthel</label></center>
        </div>
        <div class="green-box13">
            <label for="comer">Comer</label>
            <select id="comer" name="comer" required>
                <option value="0 = Dependiente">0 = Dependiente</option>
                <option value="5 = Necesita ayuda para cortar, extender mantequilla, usar condimentos, etc.">5 = Necesita ayuda para cortar, extender mantequilla, usar condimentos, etc.</option>
                <option value="10 = Independiente (capaz de usar cualquier instrumento)">10 = Independiente (capaz de usar cualquier instrumento)</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="traslado">Trasladarse entre la silla y la cama</label>
            <select id="traslado" name="traslado" required>
                <option value="0 = Dependiente, no se mantiene sentado">0 = Dependiente, no se mantiene sentado</option>
                <option value="5 = Necesita ayuda importante (1 persona entrenada o 2 personas), puede estar sentado">5 = Necesita ayuda importante (1 persona entrenada o 2 personas), puede estar sentado</option>
                <option value="10 = Necesita algo de ayuda (una pequeña ayuda física o ayuda verbal)">10 = Necesita algo de ayuda (una pequeña ayuda física o ayuda verbal)</option>
                <option value="15 = Independiente">15 = Independiente</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="aseo">Aseo personal</label>
            <select id="aseo" name="aseo" required>
                <option value="0 = Dependiente">0 = Dependiente</option>
                <option value="5 = Independiente para lavarse la cara, las manos y los dientes, peinarse y afeitarse.">5 = Independiente para lavarse la cara, las manos y los dientes, peinarse y afeitarse.</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="retrete">Uso del retrete</label>
            <select id="retrete" name="retrete" required>
                <option value="0 = Dependiente">0 = Dependiente</option>
                <option value="5 = Necesita ayuda, pero puede hacer algo solo">5 = Necesita ayuda, pero puede hacer algo solo</option>
                <option value="10 = Independiente (entrar y salir, limpiarse y vestirse)">10 = Independiente (entrar y salir, limpiarse y vestirse)</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="banarse">Bañarse/Ducharse</label>
            <select id="banarse" name="banarse" required>
                <option value="0 = Dependiente">0 = Dependiente</option>
                <option value="5 = Independiente para bañarse o ducharse">5 = Independiente para bañarse o ducharse</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="desplazarse">Desplazarse</label>
            <select id="desplazarse" name="desplazarse" required>
                <option value="0 = Inmovil">0 = Inmovil</option>
                <option value="5 = Independiente en silla de ruedas">5 = Independiente en silla de ruedas</option>
                <option value="10 = Anda con pequeña ayuda de una persona (física o verbal)">10 = Anda con pequeña ayuda de una persona (física o verbal)</option>
                <option value="15 = Independiente al menos 50 m, con cualquier tipo de muleta, excepto andador">15 = Independiente al menos 50 m, con cualquier tipo de muleta, excepto andador</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="escalera">Subir y bajar escaleras</label>
            <select id="escalera" name="escalera" required>
                <option value="0 = Dependiente">0 = Dependiente</option>
                <option value="5 = Necesita ayuda física o verbal, puede llevar cualquier tipo de muleta">5 = Necesita ayuda física o verbal, puede llevar cualquier tipo de muleta</option>
                <option value="10 = Independiente para subir y bajar">10 = Independiente para subir y bajar</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="vestirse">Vestirse y desvestirse</label>
            <select id="vestirse" name="vestirse" required>
                <option value="0 = Dependiente">0 = Dependiente</option>
                <option value="5 = Necesita ayuda, pero puede hacer la mitad aproximadamente, sin ayuda">5 = Necesita ayuda, pero puede hacer la mitad aproximadamente, sin ayuda</option>
                <option value="10 = Independiente, incluyendo botones, cremalleras, cordones, etc">10 = Independiente, incluyendo botones, cremalleras, cordones, etc</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="heces">Control de heces</label>
            <select id="heces" name="heces" required>
                <option value="0 = Incontinente (o necesita que le suministren enema)">0 = Incontinente (o necesita que le suministren enema)</option>
                <option value="5 = Accidente excepcional (uno/semana)">5 = Accidente excepcional (uno/semana)</option>
                <option value="10 = Continente">10 = Continente</option>
            </select>
        </div>
        <div class="green-box13">
            <label for="orina">Control de orina</label>
            <select id="orina" name="orina" required>
                <option value="0 = Incontinente, o sondado incapaz de cambiarse la bolsa">0 = Incontinente, o sondado incapaz de cambiarse la bolsa</option>
                <option value="5 = Accidente excepcional (máximo uno/24 horas)">5 = Accidente excepcional (máximo uno/24 horas)</option>
                <option value="10 = Continente, durante al menos 7 días">10 = Continente, durante al menos 7 días</option>
            </select>
        </div>
      <div class="green-box13">
        <label for="eps">Dependiente Total (menos de 20 puntos). Dependencia Grave (20 - 35 puntos). Dependencia Moderada (40 - 55 puntos). Dependencia Leve (Mayor o igual a 60 puntos). Independencia (100 puntos)</label>
        <input type="text" id="total_berthel" name="total_berthel" required>
      </div>
    </div>
    <script>
  // Agregar un event listener para los dropdowns específicos
  const dropdownIdsBerthel = ['comer', 'traslado', 'aseo', 'retrete', 'banarse', 'desplazarse', 'escalera', 'vestirse', 'heces', 'orina'];
  const totalBerthelInput = document.getElementById('total_berthel');

  dropdownIdsBerthel.forEach(dropdownId => {
    const dropdownBerthel = document.getElementById(dropdownId);
    if (dropdownBerthel) {
      dropdownBerthel.addEventListener('change', updateTotalBerthel);
    }
  });

  function updateTotalBerthel() {
    // Calcular la suma de los valores numéricos de las opciones seleccionadas
    let totalBerthel = dropdownIdsBerthel.reduce((sum, dropdownId) => {
      const dropdownBerthel = document.getElementById(dropdownId);
      const selectedOption = dropdownBerthel.options[dropdownBerthel.selectedIndex];
      const numericValueBerthel = parseInt(selectedOption.value, 10);
      return sum + (isNaN(numericValueBerthel) ? 0 : numericValueBerthel);
    }, 0);

    // Determinar la dependencia según el totalBerthel
    let dependencia = '';
    if (totalBerthel < 20) {
      dependencia = 'Dependiente Total';
    } else if (totalBerthel >= 20 && totalBerthel <= 35) {
      dependencia = 'Dependencia Grave';
    } else if (totalBerthel >= 40 && totalBerthel <= 55) {
      dependencia = 'Dependencia Moderada';
    } else if (totalBerthel >= 60 && totalBerthel < 100) {
      dependencia = 'Dependencia Leve';
    } else if (totalBerthel === 100) {
      dependencia = 'Independencia';
    }

    // Actualizar el campo de entrada total_berthel con el total y la clasificación de dependencia
    totalBerthelInput.value = totalBerthel + " puntos - " + dependencia;
  }
</script>


    
  </div><br>

  <div class="name-container" id="container1">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Escala de Barner</label></center>
      </div>
      <div class="green-box13">
        <label for="percepcion">Percepcion sensorial</label>
        <select id="percepcion" name="percepcion" required>
  <option value="1 punto = Completamente limitada">1 punto = Completamente limitada</option>
  <option value="2 puntos = Muy limitada">2 puntos = Muy limitada</option>
  <option value="3 puntos = Ligeramente limitada">3 puntos = Ligeramente limitada</option>
  <option value="4 puntos = Sin limitacion">4 puntos = Sin limitacion</option>
</select>
      </div>
      <div class="green-box13">
        <label for="exposicion">Exposicion humedad</label>
        <select id="exposicion" name="exposicion" required>
  <option value="1 punto = Siempre">1 punto = Siempre</option>
  <option value="2 puntos = A menudo">2 puntos = A menudo</option>
  <option value="3 puntos = Ocasionalmente">3 puntos = Ocasionalmente</option>
  <option value="4 puntos = Raramente">4 puntos = Raramente</option>
</select>
      </div>
      <div class="green-box13">
        <label for="actividad">Actividad fisica / Deambula</label>
        <select id="actividad" name="actividad" required>
  <option value="1 punto = Encamado">1 punto = Encamado</option>
  <option value="2 puntos = En silla">2 puntos = En silla</option>
  <option value="3 puntos = Deambula ocasionalmente">3 puntos = Deambula ocasionalmente</option>
  <option value="4 puntos = Deambula frecuentemente">4 puntos = Deambula frecuentemente</option>
</select>
      </div>
      <div class="green-box13">
        <label for="movilidad">Movilidad cambios postulares</label>
        <select id="movimiento" name="movimiento" required>
  <option value="1 punto = Inmovil">1 punto = Inmovil</option>
  <option value="2 puntos = Muy limitada">2 puntos = Muy limitada</option>
  <option value="3 puntos = Levemente ilimitada">3 puntos = Levemente ilimitada</option>
  <option value="4 puntos = Sin limitacion">4 puntos = Sin limitacion</option>
</select>
      </div>
      <div class="green-box13">
        <label for="nutricion">Nutricion</label>
        <select id="nutricion" name="nutricion" required>
  <option value="1 punto = Muy pobre">1 punto = Muy pobre</option>
  <option value="2 puntos = Probablemente inadecuada">2 puntos = Probablemente inadecuada</option>
  <option value="3 puntos = Adecuada">3 puntos = Adecuada</option>
  <option value="4 puntos = Excelente">4 puntos = Excelente</option>
</select>
      </div>
      <div class="green-box13">
        <label for="cizalmiento">Cizalmiento y roze</label>
        <select id="cizalmiento" name="cizalmiento" required>
  <option value="1 punto = Riesgo maximo">1 punto = Riesgo maximo</option>
  <option value="2 puntos = Riesgo potencial">2 puntos = Riesgo potencial</option>
  <option value="3 puntos = Sin riesgo aparente">3 puntos = Sin riesgo aparente</option>
  <option value="4 puntos = No riesgo">4 puntos = No riesgo</option>
</select>
      </div>
      
     

      <div class="green-box13">
        <label for="eps">Riesgo Bajo: (15 puntos o mas). Riesgo moderado o intermedio (13 - 14 puntos). Riesgo alto o elevado (menos de 12 puntos).</label>
        <input type="text" id="total_barner" name="total_barner" required>
      </div>
    </div>
    
    <script>
  // Agrega un event listener para los dropdowns específicos
  const dropdownIds = ['percepcion', 'exposicion', 'actividad', 'movimiento', 'nutricion', 'cizalmiento']; // Asegúrate de que estos IDs coincidan con tu HTML
  const totalBarnerInput = document.getElementById('total_barner');

  dropdownIds.forEach(dropdownId => {
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
      dropdown.addEventListener('change', updateTotalBarner);
    }
  });

  function updateTotalBarner() {
    // Calcula la suma de los valores numéricos de los dropdowns específicos
    let total = 0;
    dropdownIds.forEach(dropdownId => {
      const dropdown = document.getElementById(dropdownId);
      if (dropdown) {
        const numericValue = parseInt(dropdown.value);
        total += isNaN(numericValue) ? 0 : numericValue;
      }
    });

    // Determina el nivel de riesgo basado en el total
    let riesgo = '';
    if (total >= 15) {
      riesgo = 'Riesgo Bajo';
    } else if (total >= 13 && total <= 14) {
      riesgo = 'Riesgo Moderado o Intermedio';
    } else {
      riesgo = 'Riesgo Alto o Elevado';
    }

    // Actualiza el campo 'total_barner' con el total y el nivel de riesgo
    totalBarnerInput.value = total + " puntos - " + riesgo;
  }
</script>

  </div>
  <textarea id="textbarner" name="textbarner" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
  
  <div class="name-container">
    <div class="input-container">
      <div class="green-box">
        <center><label for="eps">Diagnostico Principal</label></center>
      </div>
      <textarea id="diagnostico_pri" name="diagnostico_pri" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea>
    </div>
  </div><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box">
        <center><label for="eps">Diagnosticos Secundarios</label></center>
      </div>
      <textarea id="diagnostico_sec" name="diagnostico_sec" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea>
    </div>
  </div><br>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Analisis Y Plan</label></center>
      </div>
    </div>
  </div>
  

  <div class="name-container">
    <div class="input-container">
      <div class="green-box27">
        <label for="eps">Total o Parcial</label>
      </div>
      <input type="text" id="total_parcial" name="total_parcial">
    </div>

    <div class="input-container">
      <div class="green-box28">
        <label for="regimen">Sin potencial de rehabilitación</label>
      </div>
      <input type="text" id="potencial" name="potencial">
    </div>

    <div class="input-container">
      <div class="green-box29">
        <label for="regimen">Cuidados paliativos o de mantenimiento</label>
      </div>
      <input type="text" id="cuidados" name="cuidados">
    </div>
    </div>

  <div class="input-container">
  <textarea id="analisisplan" name="analisisplan" style="width: 1128px; resize: vertical; overflow-y: auto;" required>
  CABEZA: Normal,  OJOS: Normal,  ORL: Normal,  CUELLO: Normal,  TORAX: Normal,  PULMONES: Normal,  CORAZON: Normal,  ABDOMEN: Normal,  GENITOURINARIO: Normal,  EXTREMIDADES: Normal,  OSTEOMUSCULAR: Normal,  SNC: Normal,  PIEL: Normal.
</textarea>
    </div><br>
    <script>
        var textarea = document.getElementById('analisisplan');

        textarea.addEventListener('input', function() {
            // Puedes realizar acciones de corrección aquí si es necesario
            // En este ejemplo, simplemente se imprime el texto corregido en la consola.
            console.clear();
            console.log("Texto corregido:", textarea.value);
        });

        
    </script>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Servicios Medicos / Terapeuticos / Enfermeria / Curaciones</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box19">
        <label for="eps">Descripcion</label>
      </div>
      <input type="text" id="descripcion" name="descripcion" >
      <button type="button" class="agregar-btn" onclick="agregarDato()">Agregar</button>
    </div>

    <div class="input-container">
      <div class="green-box20">
        <label for="regimen">Cantidad</label>
      </div>
      <input type="text" id="cant_servicios" name="cant_servicios">
    </div>

    <div class="input-container">
    <div class="green-box21">
      <label for="mes">Mes</label>
    </div>
    <input type="text" id="meses" name="meses">
    
  </div>
</div>
  
  <textarea id="ser_medicos" name="ser_medicos" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
  <script>
  var contador1 = 1;

  function agregarDato() {
    var descripcion = document.getElementById("descripcion").value;
    var cantidad = document.getElementById("cant_servicios").value;
    var meses = document.getElementById("meses").value;

    // Verificar si los campos no están vacíos
    if (descripcion !== "" && cantidad !== "" && meses !== "") {
      var textarea = document.getElementById("ser_medicos");
      // Agregar datos al textarea con enumeración
      textarea.value += `${contador1}. (${descripcion}), (${cantidad}), (${meses})\n`;
      contador1++;
      // Limpiar campos después de agregar datos
      document.getElementById("descripcion").value = "";
      document.getElementById("cant_servicios").value = "";
      document.getElementById("meses").value = "";
    } else {
      alert("Por favor, completa todos los campos.");
    }
  }
</script>

<div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Insumos</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
        <div class="green-box13">
            <label for="medicamento">Descripcion de insumo</label>
        </div>
        <select class="onput3" id="nombre_ins" name="nombre_ins">
    <?php
    // Conexión a la base de datos (reemplaza con tus credenciales)
    $conexion = new mysqli("localhost", "id18386849_asprilla", "Asprilla2004*", "id18386849_saludcombd");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta a la base de datos con condición WHERE
    $consulta = "SELECT descripcion FROM insumos WHERE agrupador = 'PB'";
    $resultado = $conexion->query($consulta);

    // Generar opciones del select
    while ($fila = $resultado->fetch_assoc()) {
        echo '<option value="' . $fila['descripcion'] . '">' . $fila['descripcion'] . ' </option>';
    }

    // Cerrar la conexión
    $conexion->close();
    ?>
</select>

    </div>
</div>
    
    <div class="input-container">
      <div class="green-box13">
        <label for="regimen">Cantidad</label>
      </div>
      <input type="text" id="cant_ins" name="cant_ins">
    </div>

    <div class="input-container">
      <div class="green-box13">
        <label for="correo1">Mes</label>
      </div>
      <input type="text" id="mes_insumo" name="mes_insumo">
      <button type="button" class="agregar-btn" onclick="agregarDatas()">Agregar</button>
    </div>
    <textarea id="rec_insumo" name="rec_insumo" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
  

  
  <script>
  var contador2 = 1;

  function agregarDatas() {
    var nombre_ins = document.getElementById("nombre_ins").value;
    var cant_ins = document.getElementById("cant_ins").value;
    var mes_insumo = document.getElementById("mes_insumo").value;

    // Verificar si los campos no están vacíos
    if (nombre_ins !== "" && cant_ins !== "" && mes_insumo !== "") {
      var textarea = document.getElementById("rec_insumo");
      // Agregar datos al textarea con enumeración
      textarea.value += `${contador2}. (${nombre_ins}), (${cant_ins}), (${mes_insumo})\n`;
      contador2++;
      // Limpiar campos después de agregar datos
      document.getElementById("nombre_ins").value = "";
      document.getElementById("cant_ins").value = "";
      document.getElementById("mes_insumo").value = "";
    } else {
      alert("Por favor, completa todos los campos.");
    }
  }
</script>

<div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Insumos No PB</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
        <div class="green-box13">
            <label for="medicamento">Descripcion de insumo</label>
        </div>
        <select class="onput3" id="nombre_inspb" name="nombre_inspb">
            <?php
            // Conexión a la base de datos (reemplaza con tus credenciales)
            $conexion = new mysqli("localhost", "id18386849_asprilla", "Asprilla2004*", "id18386849_saludcombd");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta a la base de datos
            $consulta = "SELECT descripcion FROM insumos WHERE agrupador = 'NO PB'";
            $resultado = $conexion->query($consulta);

            // Generar opciones del select
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="' . $fila['descripcion'] . '">' . $fila['descripcion'] . ' </option>';
            }

            // Cerrar la conexión
            $conexion->close();
            ?>
        </select>
    </div>
</div>
    
    <div class="input-container">
      <div class="green-box13">
        <label for="regimen">Cantidad</label>
      </div>
      <input type="text" id="cant_inspb" name="cant_inspb">
    </div>

    <div class="input-container">
      <div class="green-box13">
        <label for="correo1">Mes</label>
      </div>
      <input type="text" id="mes_insumopb" name="mes_insumopb">
      <button type="button" class="agregar-btn" onclick="agregarDataspb()">Agregar</button>
    </div>
    <textarea id="rec_insumopb" name="rec_insumopb" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
  

  
  <script>
  var contador3 = 1;

  function agregarDataspb() {
    var nombre_inspb = document.getElementById("nombre_inspb").value;
    var cant_inspb = document.getElementById("cant_inspb").value;
    var mes_insumopb = document.getElementById("mes_insumopb").value;

    // Verificar si los campos no están vacíos
    if (nombre_inspb !== "" && cant_inspb !== "" && mes_insumopb !== "") {
      var textarea = document.getElementById("rec_insumopb");
      // Agregar datos al textarea con enumeración
      textarea.value += `${contador3}. (${nombre_inspb}), (${cant_inspb}), (${mes_insumopb})\n`;
      contador3++;
      // Limpiar campos después de agregar datos
      document.getElementById("nombre_inspb").value = "";
      document.getElementById("cant_inspb").value = "";
      document.getElementById("mes_insumopb").value = "";
    } else {
      alert("Por favor, completa todos los campos.");
    }
  }
</script>

<div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Suplementos</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
        <div class="green-box13">
            <label for="medicamento">Descripcion de suplemento</label>
        </div>
        <select class="onput3" id="nombre_sup" name="nombre_sup">
            <?php
            // Conexión a la base de datos (reemplaza con tus credenciales)
            $conexion = new mysqli("localhost", "id18386849_asprilla", "Asprilla2004*", "id18386849_saludcombd");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta a la base de datos
            $consulta = "SELECT descripcion FROM suplementos";
            $resultado = $conexion->query($consulta);

            // Generar opciones del select
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="' . $fila['descripcion'] . '">' . $fila['descripcion'] . ' </option>';
            }

            // Cerrar la conexión
            $conexion->close();
            ?>
        </select>
    </div>
</div>
    
    <div class="input-container">
      <div class="green-box13">
        <label for="regimen">Cantidad</label>
      </div>
      <input type="text" id="cant_sup" name="cant_sup">
    </div>

    <div class="input-container">
      <div class="green-box13">
        <label for="correo1">Mes</label>
      </div>
      <input type="text" id="mes_sup" name="mes_sup">
      <button type="button" class="agregar-btn" onclick="agregarDatasup()">Agregar</button>
    </div>
    <textarea id="rec_sup" name="rec_sup" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
  

  
  <script>
  var contador4 = 1;

  function agregarDatasup() {
    var nombre_sup = document.getElementById("nombre_sup").value;
    var cant_sup = document.getElementById("cant_sup").value;
    var mes_sup = document.getElementById("mes_sup").value;

    // Verificar si los campos no están vacíos
    if (nombre_sup !== "" && cant_sup !== "" && mes_sup !== "") {
      var textarea = document.getElementById("rec_sup");
      // Agregar datos al textarea con enumeración
      textarea.value += `${contador4}. (${nombre_sup}), (${cant_sup}), (${mes_sup})\n`;
      contador4++;
      // Limpiar campos después de agregar datos
      document.getElementById("nombre_sup").value = "";
      document.getElementById("cant_sup").value = "";
      document.getElementById("mes_sup").value = "";
    } else {
      alert("Por favor, completa todos los campos.");
    }
  }
</script>

<div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Equipos Biomedicos</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
        <div class="green-box13">
            <label for="medicamento">Descripcion del equipo</label>
        </div>
        <select class="onput3" id="nombre_equi" name="nombre_equi">
            <?php
            // Conexión a la base de datos (reemplaza con tus credenciales)
            $conexion = new mysqli("localhost", "id18386849_asprilla", "Asprilla2004*", "id18386849_saludcombd");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta a la base de datos
            $consulta = "SELECT descripcion FROM equipos";
            $resultado = $conexion->query($consulta);

            // Generar opciones del select
            while ($fila = $resultado->fetch_assoc()) {
                echo '<option value="' . $fila['descripcion'] . '">' . $fila['descripcion'] . ' </option>';
            }

            // Cerrar la conexión
            $conexion->close();
            ?>
        </select>
    </div>
</div>
    
    <div class="input-container">
      <div class="green-box13">
        <label for="regimen">Cantidad</label>
      </div>
      <input type="text" id="cant_equi" name="cant_inspb">
    </div>

    <div class="input-container">
      <div class="green-box13">
        <label for="correo1">Mes</label>
      </div>
      <input type="text" id="mes_equi" name="mes_equi">
      <button type="button" class="agregar-btn" onclick="agregarDatasequi()">Agregar</button>
    </div>
    <textarea id="rec_equi" name="rec_equi" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
  

  
  <script>
  var contador5 = 1;

  function agregarDatasequi() {
    var nombre_equi = document.getElementById("nombre_equi").value;
    var cant_equi = document.getElementById("cant_equi").value;
    var mes_equi = document.getElementById("mes_equi").value;

    // Verificar si los campos no están vacíos
    if (nombre_equi !== "" && cant_equi !== "" && mes_equi !== "") {
      var textarea = document.getElementById("rec_equi");
      // Agregar datos al textarea con enumeración
      textarea.value += `${contador5}. (${nombre_equi}), (${cant_equi}), (${mes_equi})\n`;
      contador5++;
      // Limpiar campos después de agregar datos
      document.getElementById("nombre_equi").value = "";
      document.getElementById("cant_equi").value = "";
      document.getElementById("mes_equi").value = "";
    } else {
      alert("Por favor, completa todos los campos.");
    }
  }
</script>

  <div class="name-container">
    <div class="input-container">
      <div class="green-box13">
        <center><label for="eps">Medicamentos</label></center>
      </div>
    </div>
  </div>

  <div class="name-container">
    <div class="input-container">
        <div class="green-box13">
            <label for="medicamento">Nombre del Medicamento</label>
        </div>
        <select class="onput3" id="nombre_med" name="nombre_med">
            <?php
            // Conexión a la base de datos (reemplaza con tus credenciales)
            $conexion = new mysqli("localhost", "id18386849_asprilla", "Asprilla2004*", "id18386849_saludcombd");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta a la base de datos
            $consulta = "SELECT descripcion, presentacion, concentracion FROM medicamentos";
            $resultado = $conexion->query($consulta);

            // Generar opciones del select
            while ($fila = $resultado->fetch_assoc()) {
              echo '<option value="' . $fila['descripcion'] . ' ' . $fila['presentacion'] . ' ' . $fila['concentracion'] . '">' . $fila['descripcion'] . ' ' . $fila['presentacion'] . ' ' . $fila['concentracion'] . '</option>';
}

            // Cerrar la conexión
            $conexion->close();
            ?>
        </select>
    </div>
</div>

    <div class="input-container">
      <div class="green-box13">
        <label for="regimen">Cantidad</label>
      </div>
      <input type="text" id="cant_med" name="cant_med">
    </div>

    <div class="input-container">
      <div class="green-box13">
        <label for="correo1">Via de Administracion / Dosis</label>
      </div>
      <input type="text" id="via" name="via">
      <button type="button" class="agregar-btn" onclick="agregarData()">Agregar</button>
    </div>
    <textarea id="rec_medi" name="rec_medi" style="width: 1128px; resize: vertical; overflow-y: auto;" required></textarea><br><br>
    <div class="name-container">
    <div class="input-container">
      <div class="green-box7">
        <label for="eps">Profesional Realizador</label>
      </div>
      <input type="text" id="realizador" name="realizador" required>
    </div>

    <div class="input-container">
      <div class="green-box8">
        <label for="correo1">Tarjeta Profesional</label>
      </div>
      <input type="text" id="tar_pro" name="tar_pro" required>
    </div>
  </div>
  </div>

  
  <script>
  var contador4 = 1;

  function agregarData() {
    var nombre_med = document.getElementById("nombre_med").value;
    var cant_med = document.getElementById("cant_med").value;
    var via = document.getElementById("via").value;

    // Verificar si los campos no están vacíos
    if (nombre_med !== "" && cant_med !== "" && via !== "") {
      var textarea = document.getElementById("rec_medi");
      // Agregar datos al textarea con enumeración
      textarea.value += `${contador4}. (${nombre_med}), (${cant_med}), (${via})\n`;
      contador4++;
      // Limpiar campos después de agregar datos
      document.getElementById("nombre_med").value = "";
      document.getElementById("cant_med").value = "";
      document.getElementById("via").value = "";
    } else {
      alert("Por favor, completa todos los campos.");
    }
  }
</script>


  </div>
  
  
  </div>
  
</div>


      <div class="form-group">
       <center><button type="submit" class="agregar" name="Guardar" value="Guardar">Guardar Historia Clinica</button></center>
      </div>
    </form>
  </div>
      <br><br>
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