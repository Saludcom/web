<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saludcom | Sistemas</title>
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
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND accesos = 'Si'";
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
              <a class="sidebar-link" style="background-color: #1eac4e; color: white;" href="sistemas.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-device-desktop"></i>
                </span>
                <span class="hide-menu">Accesos Web</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../med/medico.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
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
      </header>
      <!--  Header End -->
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

    
#pnombre,
#papellido,
#cargo,
#usuario,
#rol,
#contraseña {
      width: calc(32% - 10px); /* 30% para el campo Tipo de Documento */
    }


#rol {
      width: calc(34% - 10px); /* 30% para el campo Tipo de Documento */
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
              width: 1450px;
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
    background-color: rgba(0, 0, 0, 0.8);
}

.modal-content {
    background-color: #fff;
    margin: 2% auto; /* Centrar horizontalmente */
    padding: 20px;
    width: 90%; /* Cambiado a un porcentaje */
    max-width: 820px; /* Establecido un ancho máximo */
}

@media only screen and (min-width: 600px) {
    /* Ajustes para pantallas más grandes */
    .modal-content {
        width: 60%;
        margin: 2% auto;
    }
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
            background-color: #4CAF50;
            width:600px;
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
        margin: 15px;
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
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }
  </style>
      <div class="container-fluid">
      <div style="margin-bottom: 10px;">
            <button class="agregar-btn" onclick="openModal()">Agregar</button>
            <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
            <button class="editar-btn" onclick="editar()">Editar</button>
          </div>
      <br><span class="hide-menu">Usuarios administrativos</span><hr>
     

<script>
    function openModal() {
        document.getElementById('myModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
    renderTable(1);
    renderPagination();
</script>        
      <div id="myModal" class="modal">
       <div class="modal-content">
       <span class="close" onclick="closeModal()">&times;</span><br>
    <form action="registro.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post">
<div class="form-group">
<label for="tipocontrato">Crear usuario para ingreso al sistema</label><br><br>
  <div class="name-container">
    <input type="text" id="pnombre" name="pnombre" placeholder="Primer Nombre">
    <input type="text" id="papellido" name="papellido" placeholder="Primer Apellido">
    <input type="text" id="cargo" name="cargo" placeholder="Servicio a Prestar">
  </div>
</div>
<div class="form-group">
  <div class="name-container">
    <input type="text" id="usuario" name="usuario" placeholder="Crea Usuario">
    <select name="rol" id="rol" required>
     <option value="" disabled selected>Elige su rol</option>
     <option value="Administrativo">Administrativo</option>
    </select>
    <input type="text" id="contraseña" name="contraseña" placeholder="Crea Contraseña">
  </div>
</div>
<label for="tipocontrato">Usuario con ingreso a:</label>
<div class="form-group">
  <div class="name-container">
  <select name="almacenamiento" id="almacenamiento" required>
     <option value="" disabled selected>Almacenamiento</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="accesos" id="accesos" required>
     <option value="" disabled selected>Accesos web</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="medico" id="medico" required>
     <option value="" disabled selected>Medico</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="name-container">
  <select name="talento" id="talento" required>
     <option value="" disabled selected>Talento Humano</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="pacientes" id="pacientes" required>
     <option value="" disabled selected>Pacientes Registrados</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="citas" id="citas" required>
     <option value="" disabled selected>Asignacion Citas</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="name-container">
  <select name="farmacia" id="farmacia" required>
     <option value="" disabled selected>Historias Clinicas</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
  </div>
</div><br>
      <div class="form-group">
        <center><button type="submit">Crear Usuario</button></center>
      </div>
    </form>
  </div>
  </div>



  <div id="elimminarodal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="loseModal()">&times;</span>
        <form action="eliminar.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post">
            <div class="form-row"><br>
                <label for="codigo">Escribe el usuario que desea eliminar:</label><br><br>
                <input type="text" id="usuario" name="usuario" placeholder="Ingresa el usuario" required>
            </div><br>
            <center><button type="submit">Eliminar Usuario</button></center>
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
                <label for="tipocontrato">Con el usuario puedes cambiar el resto de opciones</label><br><br>
                <div class="form-group">
                <div class="name-container">
                    <input type="text" id="usuario" name="usuario" placeholder="Ingresar Usuario">
                    <select name="rol" id="rol" required>
                        <option value="" disabled selected>Selecciona Tu Rol</option>
                        <option value="administrativo">Administrativo</option>
                    </select>
                    <input type="password" id="contraseña" name="contraseña" placeholder="Ingresar Contraseña">
                </div>
            </div><br>
            <label for="tipocontrato">Usuario con ingreso a:</label><br><br>
            <div class="form-group">
  <div class="name-container">
  <select name="almacenamiento" id="almacenamiento" required>
     <option value="" disabled selected>Almacenamiento</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="accesos" id="accesos" required>
     <option value="" disabled selected>Accesos web</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="medico" id="medico" required>
     <option value="" disabled selected>Medico</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="name-container">
  <select name="talento" id="talento" required>
     <option value="" disabled selected>Talento Humano</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="pacientes" id="pacientes" required>
     <option value="" disabled selected>Pacientes Registrados</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
    <select name="citas" id="citas" required>
     <option value="" disabled selected>Asignacion Citas</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="name-container">
  <select name="farmacia" id="farmacia" required>
     <option value="" disabled selected>Historias Clinicas</option>
     <option value="Si">Si</option>
     <option value="No">No</option>
    </select>
  </div>
</div>
            </div>
            <div class="form-group">
                <center><button type="submit">Editar Usuario</button></center>
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
$sql = "SELECT * FROM login where rol='administrativo'";
$resultado = $conexion->query($sql);

// Cerrar la conexión
$conexion->close();
?>

<div style="overflow-x: auto;">
      <!-- Tabla de Datos -->
      <table class="data-table">
    <thead>
        <tr>
            <th >Primer Nombre</th>
            <th >Primer Apellido</th>
            <th >Servicio a Prestar</th>
            <th >Usuario</th>
            <th >Rol (Portal) </th>
            <th >Contraseña</th>
            <th >Almacenamiento</th>
            <th >Accesos</th>
            <th >Medico</th>
            <th >Talento</th>
            <th >Pacientes</th>
            <th >Citas</th>
            <th >Historias</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Iterar a través de los resultados de la consulta
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td >{$fila['pnombre']}</td>";
            echo "<td >{$fila['papellido']}</td>";
            echo "<td >{$fila['cargo']}</td>";
            echo "<td >{$fila['usuario']}</td>";
            echo "<td >{$fila['rol']}</td>";
            echo "<td >{$fila['contraseña']}</td>";
            echo "<td >{$fila['almacenamiento']}</td>";
            echo "<td >{$fila['accesos']}</td>";
            echo "<td >{$fila['medico']}</td>";
            echo "<td >{$fila['talento']}</td>";
            echo "<td >{$fila['pacientes']}</td>";
            echo "<td >{$fila['citas']}</td>";
            echo "<td >{$fila['farmacia']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</div>
      <div class="pagination-container">
        <ul class="pagination">
            <!-- Aquí se generará la paginación dinámicamente -->
        </ul>
    </div>

    <script>
      const tableBody = document.querySelector('.data-table tbody');
      const paginationContainer = document.querySelector('.pagination');

      function renderTable(pageNumber) {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll('tr');
          const startIndex = (pageNumber - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          rows.forEach((row, index) => {
              if (index >= startIndex && index < endIndex) {
                  row.style.display = 'table-row';
              } else {
                  row.style.display = 'none';
              }
          });
      }

      function renderPagination() {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll('tr');
          const pageCount = Math.ceil(rows.length / itemsPerPage);

          paginationContainer.innerHTML = '';

          for (let i = 1; i <= pageCount; i++) {
              const li = document.createElement('li');
              const a = document.createElement('a');
              a.textContent = i;
              a.addEventListener('click', () => {
                  renderTable(i);
              });
              li.appendChild(a);
              paginationContainer.appendChild(li);
          }
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
  </script>


      </div>
    </div>
  </div>

  
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