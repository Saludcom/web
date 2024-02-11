<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saludcom | Almacenamiento</title>
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
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND almacenamiento = 'Si'";
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
              <a class="sidebar-link" style="background-color: #1eac4e; color: white;" href="alma.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] . '&opcion=opcion1' : '?opcion=opcion1'; ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Almacenamiento</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="../siste/sistemas.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
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
      <div class="container-fluid">
        <!-- Formulario con los cuatro botones -->
<form action="" method="get">
<input type="hidden" name="usuario" value="<?php echo htmlspecialchars($_GET['usuario'] ?? ''); ?>">
    <select name="opcion" id="opciones">
        <option value="">Selecciona Inventario</option>
        <option value="opcion1">Inventario Medicamentos</option>
        <option value="opcion2">Inventario Insumos</option>
        <option value="opcion3">Inventario Suplementos</option>
        <option value="opcion4">Inventario Equipos Biomedicos</option>
    </select>
    <!-- Elimina el botón y utiliza JavaScript para enviar el formulario al cambiar el valor del select -->
    <script>
        document.getElementById('opciones').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
</form>


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
    width: 100%; /* Cambiado a un porcentaje */
    height: auto; /* Hace que la altura se ajuste automáticamente */
}

/* Contenedor para los campos de nombres y apellidos */
.name-container,
.document-container {
    display: flex;
    flex-wrap: wrap; /* Permite que los elementos se muevan a la siguiente fila en pantallas pequeñas */
    gap: 10px;
}

.name-container input,
.document-container input {
    flex: 1; /* Para que los campos se distribuyan igualmente */
    width: 100%; /* Ocupa el 100% del espacio disponible */
}

/* Establece el ancho de los campos según la pantalla */
#id_tbl_producto,
#id_producto,
#cups,
#descripcion,
#presentacion,
#concentracion,
#activo,
#agrupador,
#vr_unitario_cobro,
#observacion,
#cod,
#nombre,
#descu,
#unidad,
#fecha,
#proveedor,
#cad,
#cant,
#num_registro,
#num_lote,
#valor_compra,
#valor_venta,
#estado,
#invima,
#obs,
#codigo,
#nombre_equipo,
#descripcion,
#modelo,
#cantidad,
#fecha_adquisicion,
#proveedor,
#valor_compra,
#valor_venta,
#area,
#mantenimiento,
#estado,
#observaciones,
#codigo,
#nombre,
#descripcion,
#unidad_de_medida,
#cantidad,
#fecha_de_vencimiento,
#fecha_adquisicion,
#numero_lote,
#proveedor,
#valor_de_compra,
#valor_de_venta,
#categoria,
#numero_de_registro,
#estado,
#observaciones {
    width: calc(60% - 10px); /* 100% de ancho con un pequeño espacio entre los campos */
}

@media only screen and (min-width: 600px) {
    /* Ajustes para pantallas más grandes si es necesario */
    #id_tbl_producto,
    #id_producto,
    #cups,
    #descripcion,
    #presentacion,
    #concentracion,
    #activo,
    #agrupador,
    #vr_unitario_cobro,
    #observacion,
    #cod,
    #nombre,
    #descu,
    #unidad,
    #fecha,
    #proveedor,
    #cad,
    #cant,
    #num_registro,
    #num_lote,
    #valor_compra,
    #valor_venta,
    #estado,
    #invima,
    #obs,
    #codigo,
    #nombre_equipo,
    #descripcion,
    #modelo,
    #cantidad,
    #fecha_adquisicion,
    #proveedor,
    #valor_compra,
    #valor_venta,
    #area,
    #mantenimiento,
    #estado,
    #observaciones,
    #codigo,
    #nombre,
    #descripcion,
    #unidad_de_medida,
    #cantidad,
    #fecha_de_vencimiento,
    #fecha_adquisicion,
    #numero_lote,
    #proveedor,
    #valor_de_compra,
    #valor_de_venta,
    #categoria,
    #numero_de_registro,
    #estado,
    #observaciones {
        width: calc(32% - 10px); /* 30% para el campo Tipo de Documento */
    }
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
              width: 3000px;
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
</head>
<body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("addForm");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "regmed.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("adeForm");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "eliminar.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("aduForm");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "editar.php?usuario=" + usuarioValue;
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form3");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "regsup.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form3.1");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "eliminar_sup.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form3.2");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "editar_sup.php?usuario=" + usuarioValue;
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form2");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "regins.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form2.1");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "eliminar_ins.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form2.2");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "editar_ins.php?usuario=" + usuarioValue;
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form4");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "regebi.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form4.1");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "eliminar_ebi.php?usuario=" + usuarioValue;
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("Form4.2");
        var usuarioValue = "<?php echo isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : ''; ?>";

        form.action = "editar_ebi.php?usuario=" + usuarioValue;
    });
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
$sql = "SELECT * FROM medicamentos";
$resultado = $conexion->query($sql);

$insumos_sql = "SELECT * FROM insumos";
$insumos_result = $conexion->query($insumos_sql);

$suple_sql = "SELECT * FROM suplementos";
$suple_result = $conexion->query($suple_sql);

$ebio_sql = "SELECT * FROM equipos";
$ebio_result = $conexion->query($ebio_sql);
// Cerrar la conexión
$conexion->close();

// Verifica si se ha seleccionado una opción y muestra la tabla correspondiente
if (isset($_GET['opcion'])) {
    $opcion = $_GET['opcion'];

    // Crea una tabla diferente según la opción seleccionada
    switch ($opcion) {
        case 'opcion1':
            echo '<br><br><span class="hide-menu">Inventario de Medicamentos</span><hr>';
            echo '<div style="margin-bottom: 10px;">
            <button class="agregar-btn" onclick="openModal()">Agregar</button>
            <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
            <button class="editar-btn" onclick="editar()">Editar</button>
          </div>';
          echo '
    <script>
      function openModal() {
        document.getElementById(\'myModal\').style.display = \'block\';
      }

      function closeModal() {
        document.getElementById(\'myModal\').style.display = \'none\';
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
    </script>';
    echo '
    <script>
      function eliminar() {
        document.getElementById(\'eliminarmodal\').style.display = \'block\';
      }

      function loseModal() {
        document.getElementById(\'eliminarmodal\').style.display = \'none\';
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
    </script>';
    echo '
    <script>
      function editar() {
        document.getElementById(\'editarmodal\').style.display = \'block\';
      }

      function eloseModal() {
        document.getElementById(\'editarmodal\').style.display = \'none\';
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
    </script>';
          echo '<div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <form id="addForm" action="regmed.php" method="post">
  <div class="form-row"><br>
    <label for="codigo">Registrar medicamento en el inventario:</label><br><br>
    <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa ID tbl producto" required>
    <input type="text" id="id_producto" name="id_producto" placeholder="Ingresa el ID producto" required>
    <input type="text" id="cups" name="cups" placeholder="Ingresa el Cups" required>
  </div>
  <div class="form-row">
    <input type="text" id="descripcion" name="descripcion" placeholder="Escribe descripción" required>
    <input type="text" id="presentacion" name="presentacion" placeholder="Escribe presentación" required>
    <input type="text" id="concentracion" name="concentracion" placeholder="Escribe concentración" required>
  </div>
  <div class="form-row">
    <input type="text" id="vr_unitario_cobro" name="vr_unitario_cobro" placeholder="Valor Unitario" required>
    <input type="text" id="observacion" name="observacion" placeholder="Escribe Observacion" required>
  </div><br>
  <center><button type="submit">Registrar Medicamento</button></center>
</form>

        </div>
      </div>';
      echo '<div id="eliminarmodal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="loseModal()">&times;</span>
          <form id="adeForm" action="eliminar.php" method="post">
  <div class="form-row"><br>
    <label for="codigo">Codigo del medicamento que va a eliminar:</label><br><br>
    <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el ID tbl producto" required>
  </div><br>
  <center><button type="submit">Eliminar Medicamento</button></center>
</form>

        </div>
      </div>';
      echo '<div id="editarmodal" class="modal">
        <div class="modal-content">
          <span class="close" onclick="eloseModal()">&times;</span>
          <form id="aduForm" action="editar.php" method="post">
          <div class="form-row"><br>
          <label for="codigo">Con el id_tbl_producto puedes cambiar el resto de opciones</label><br><br>
          <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa ID tbl producto" required>
          <input type="text" id="id_producto" name="id_producto" placeholder="Ingresa el ID producto" required>
          <input type="text" id="cups" name="cups" placeholder="Ingresa el Cups" required>
        </div>
        <div class="form-row">
          <input type="text" id="descripcion" name="descripcion" placeholder="Escribe descripción" required>
          <input type="text" id="presentacion" name="presentacion" placeholder="Escribe presentación" required>
          <input type="text" id="concentracion" name="concentracion" placeholder="Escribe concentración" required>
        </div>
        <div class="form-row">
          <input type="text" id="vr_unitario_cobro" name="vr_unitario_cobro" placeholder="Valor Unitario" required>
          <input type="text" id="observacion" name="observacion" placeholder="Escribe Observacion" required>
        </div><br>
        <center><button type="submit">Editar Medicamento</button></center>
</form>

        </div>
      </div>';
            echo '<div style="overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                      <th> Id_tbl_producto</th>
                      <th> Id_producto	</th>
                      <th> Cups </th>
                      <th> Descripcion</th>
                      <th> Presentacion </th>
                      <th> Concentracion </th>
                      <th> Valor Unitario </th>
                      <th> Observacion </th>
                    </tr>
                </thead>
                <tbody>';
    // Iterar a través de los resultados de la consulta
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
echo "<td>{$fila['id_tbl_producto']}</td>";
echo "<td>{$fila['id_producto']}</td>";
echo "<td>{$fila['cups']}</td>";
echo "<td>{$fila['descripcion']}</td>";
echo "<td>{$fila['presentacion']}</td>";
echo "<td>{$fila['concentracion']}</td>";
echo "<td>{$fila['vr_unitario_cobro']}</td>";
echo "<td>{$fila['observacion']}</td>";
        echo "</tr>";
    }

    echo '</tbody>
          </table>
        </div>
        <div class="pagination-container">
            <ul class="pagination">
                <!-- Aquí se generará la paginación dinámicamente -->
            </ul>
        </div>
        <script>
      const tableBody = document.querySelector(\'.data-table tbody\');
      const paginationContainer = document.querySelector(\'.pagination\');

      function renderTable(pageNumber) {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const startIndex = (pageNumber - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          rows.forEach((row, index) => {
              if (index >= startIndex && index < endIndex) {
                  row.style.display = \'table-row\';
              } else {
                  row.style.display = \'none\';
              }
          });
      }

      function renderPagination() {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const pageCount = Math.ceil(rows.length / itemsPerPage);

          paginationContainer.innerHTML = \'\';

          for (let i = 1; i <= pageCount; i++) {
              const li = document.createElement(\'li\');
              const a = document.createElement(\'a\');
              a.textContent = i;
              a.addEventListener(\'click\', () => {
                  renderTable(i);
              });
              li.appendChild(a);
              paginationContainer.appendChild(li);
          }
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
  </script>';
    break;

    case 'opcion2':
      echo '<br><br><span class="hide-menu">Inventario de Insumos</span><hr>';
      echo '<div style="margin-bottom: 10px;">
      <button class="agregar-btn" onclick="openModal()">Agregar</button>
      <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
      <button class="editar-btn" onclick="editar()">Editar</button>
    </div>';
    echo '
<script>
function openModal() {
  document.getElementById(\'myModal\').style.display = \'block\';
}

function closeModal() {
  document.getElementById(\'myModal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '
<script>
function eliminar() {
  document.getElementById(\'eliminarins\').style.display = \'block\';
}

function loseModal() {
  document.getElementById(\'eliminarins\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '
<script>
function editar() {
  document.getElementById(\'editarmodal\').style.display = \'block\';
}

function eloseModal() {
  document.getElementById(\'editarmodal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
    echo '<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <form id="Form2" action="regins.php" method="post">
  <div class="form-row"><br>
    <label for="codigo">Registrar insumo en el inventario:</label><br><br>
    <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el ID tbl producto" required>
    <input type="text" id="nombre" name="id_producto" placeholder="Ingresa ID producto" required>
    <input type="text" id="cups" name="cups" placeholder="Escribe cups" required>
  </div>
  <div class="form-row">
    <input type="text" id="descripcion" name="descripcion" placeholder="Escribe descripcion" required>
    <input type="text" id="vr_unitario_cobro" name="vr_unitario_cobro" placeholder="Valor unitario" required>
    <input type="text" id="agrupador" name="agrupador" placeholder="Escribe su agrupador" required>
  </div><br>
  <center><button type="submit">Registrar Insumo</button></center>
</form>


  </div>
</div>';
echo '<div id="eliminarins" class="modal">
  <div class="modal-content">
    <span class="close" onclick="loseModal()">&times;</span>
    <form id="Form2.1" action="eliminar_ins.php" method="post">
<div class="form-row"><br>
<label for="codigo">Codigo del insumo que va a eliminar:</label><br><br>
<input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el ID tbl producto" required>
</div><br>
<center><button type="submit">Eliminar Insumo</button></center>
</form>

  </div>
</div>';
echo '<div id="editarmodal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="eloseModal()">&times;</span>
    <form id="Form2.2" action="editar_ins.php" method="post">
    <div class="form-row"><br>
    <label for="codigo">Editar insumo en el inventario:</label><br><br>
    <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el ID tbl producto" required>
    <input type="text" id="nombre" name="id_producto" placeholder="Ingresa ID producto" required>
    <input type="text" id="cups" name="cups" placeholder="Escribe cups" required>
  </div>
  <div class="form-row">
    <input type="text" id="descripcion" name="descripcion" placeholder="Escribe descripcion" required>
    <input type="text" id="vr_unitario_cobro" name="vr_unitario_cobro" placeholder="Valor unitario" required>
    <input type="text" id="agrupador" name="agrupador" placeholder="Escribe su agrupador" required>
  </div><br>
  <center><button type="submit">Editar Insumo</button></center>
</form>

  </div>
</div>';
      echo '<div style="overflow-x: auto;">
      <table class="data-table">
          <thead>
              <tr>
                <th> Id_tbl_producto</th>
                <th> Id_producto </th>
                <th> Cups </th>
                <th> Descripcion </th>
                <th> Agrupador</th>
                <th> valor Unitario </th>
              </tr>
          </thead>
          <tbody>';
// Iterar a través de los resultados de la consulta
while ($fila = $insumos_result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>{$fila['id_tbl_producto']}</td>";
  echo "<td>{$fila['id_producto']}</td>";
  echo "<td>{$fila['cups']}</td>";
  echo "<td>{$fila['descripcion']}</td>";
  echo "<td>{$fila['agrupador']}</td>";
  echo "<td>{$fila['vr_unitario_cobro']}</td>";
  echo "</tr>";
}

echo '</tbody>
    </table>
  </div>
  <div class="pagination-container">
      <ul class="pagination">
          <!-- Aquí se generará la paginación dinámicamente -->
      </ul>
  </div>
  <script>
      const tableBody = document.querySelector(\'.data-table tbody\');
      const paginationContainer = document.querySelector(\'.pagination\');

      function renderTable(pageNumber) {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const startIndex = (pageNumber - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          rows.forEach((row, index) => {
              if (index >= startIndex && index < endIndex) {
                  row.style.display = \'table-row\';
              } else {
                  row.style.display = \'none\';
              }
          });
      }

      function renderPagination() {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const pageCount = Math.ceil(rows.length / itemsPerPage);

          paginationContainer.innerHTML = \'\';

          for (let i = 1; i <= pageCount; i++) {
              const li = document.createElement(\'li\');
              const a = document.createElement(\'a\');
              a.textContent = i;
              a.addEventListener(\'click\', () => {
                  renderTable(i);
              });
              li.appendChild(a);
              paginationContainer.appendChild(li);
          }
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
  </script>';
break;

case 'opcion3':
  echo '<br><br><span class="hide-menu">Inventario de Suplementos</span><hr>';
  echo '<div style="margin-bottom: 10px;">
  <button class="agregar-btn" onclick="openModal()">Agregar</button>
  <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
  <button class="editar-btn" onclick="editar()">Editar</button>
</div>';
echo '
<script>
function openModal() {
document.getElementById(\'myModal\').style.display = \'block\';
}

function closeModal() {
document.getElementById(\'myModal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '
<script>
function eliminar() {
document.getElementById(\'eliminarmodal\').style.display = \'block\';
}

function loseModal() {
document.getElementById(\'eliminarmodal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '
<script>
function editar() {
document.getElementById(\'editarmodal\').style.display = \'block\';
}

function eloseModal() {
document.getElementById(\'editarmodal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '<div id="myModal" class="modal">
<div class="modal-content">
<span class="close" onclick="closeModal()">&times;</span>
<form id="Form3" action="regsup.php" method="post">
<div class="form-row"><br>
    <label for="codigo">Agregar suplemento en el inventario:</label><br><br>
    <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el Id tbl producto" required>
    <input type="text" id="id_producto" name="id_producto" placeholder="Ingresa ID producto" required>
    <input type="text" id="cups" name="cups" placeholder="Codigo Cups" required>
</div>
<div class="form-row">
<input type="text" id="descripcion" name="descripcion" placeholder="Descripcion" required>
    <input type="text" id="agrupador" name="agrupador" placeholder="Escribe su agrupador" required>
    <input type="text" id="vr_unitario_cobro" name="vr_unitario_cobro" placeholder="Valor unitario" required>
</div><br>

<center><button type="submit">Registrar Suplemento</button></center>
</form>

</div>
</div>';
echo '<div id="eliminarmodal" class="modal">
<div class="modal-content">
<span class="close" onclick="loseModal()">&times;</span>
<form id="Form3.1" action="eliminar_sup.php" method="post">
<div class="form-row"><br>
<label for="codigo">Codigo del suplemento que va a eliminar:</label><br><br>
<input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el código" required>
</div><br>
<center><button type="submit">Eliminar Suplemento</button></center>
</form>

</div>
</div>';
echo '<div id="editarmodal" class="modal">
<div class="modal-content">
<span class="close" onclick="eloseModal()">&times;</span>
<form id="Form3.2" action="editar_sup.php" method="post">
<div class="form-row"><br>
    <label for="codigo">Agregar suplemento en el inventario:</label><br><br>
    <input type="text" id="id_tbl_producto" name="id_tbl_producto" placeholder="Ingresa el Id tbl producto" required>
    <input type="text" id="id_producto" name="id_producto" placeholder="Ingresa ID producto" required>
    <input type="text" id="cups" name="cups" placeholder="Codigo Cups" required>
</div>
<div class="form-row">
<input type="text" id="descripcion" name="descripcion" placeholder="Descripcion" required>
    <input type="text" id="agrupador" name="agrupador" placeholder="Escribe su agrupador" required>
    <input type="text" id="vr_unitario_cobro" name="vr_unitario_cobro" placeholder="Valor unitario" required>
</div><br>

<center><button type="submit">Editar Suplemento</button></center>
</form>

</div>
</div>';
  echo '<div style="overflow-x: auto;">
  <table class="data-table">
      <thead>
          <tr>
            <th> Id_tbl_producto</th>
            <th> Id_producto	</th>
            <th> Cups	</th>
            <th> Descripcion </th>
            <th> Agrupador </th>
            <th> Valor Unitario </th>
          </tr>
      </thead>
      <tbody>';
// Iterar a través de los resultados de la consulta
while ($fila = $suple_result->fetch_assoc()) {
echo "<tr>";
echo "<td>{$fila['id_tbl_producto']}</td>";
echo "<td>{$fila['id_producto']}</td>";
echo "<td>{$fila['cups']}</td>";
echo "<td>{$fila['descripcion']}</td>";
echo "<td>{$fila['agrupador']}</td>";
echo "<td>{$fila['vr_unitario_cobro']}</td>";
echo "</tr>";
}

echo '</tbody>
</table>
</div>
<div class="pagination-container">
  <ul class="pagination">
      <!-- Aquí se generará la paginación dinámicamente -->
  </ul>
</div>
<script>
      const tableBody = document.querySelector(\'.data-table tbody\');
      const paginationContainer = document.querySelector(\'.pagination\');

      function renderTable(pageNumber) {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const startIndex = (pageNumber - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          rows.forEach((row, index) => {
              if (index >= startIndex && index < endIndex) {
                  row.style.display = \'table-row\';
              } else {
                  row.style.display = \'none\';
              }
          });
      }

      function renderPagination() {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const pageCount = Math.ceil(rows.length / itemsPerPage);

          paginationContainer.innerHTML = \'\';

          for (let i = 1; i <= pageCount; i++) {
              const li = document.createElement(\'li\');
              const a = document.createElement(\'a\');
              a.textContent = i;
              a.addEventListener(\'click\', () => {
                  renderTable(i);
              });
              li.appendChild(a);
              paginationContainer.appendChild(li);
          }
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
  </script>';
break;

case 'opcion4':
  echo '<br><br><span class="hide-menu">Inventario de Equipos Biomedicos</span><hr>';
  echo '<div style="margin-bottom: 10px;">
  <button class="agregar-btn" onclick="openModal()">Agregar</button>
  <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
  <button class="editar-btn" onclick="editar()">Editar</button>
</div>';
echo '
<script>
function openModal() {
document.getElementById(\'myModal\').style.display = \'block\';
}

function closeModal() {
document.getElementById(\'myModal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '
<script>
function eliminar() {
document.getElementById(\'eliminarmodal\').style.display = \'block\';
}

function loseModal() {
document.getElementById(\'eliminarmodal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '
<script>
function editar() {
document.getElementById(\'editarmodal\').style.display = \'block\';
}

function eloseModal() {
document.getElementById(\'editarmodal\').style.display = \'none\';
}

// Inicializa la tabla y la paginación
renderTable(1);
renderPagination();
</script>';
echo '<div id="myModal" class="modal">
<div class="modal-content">
<span class="close" onclick="closeModal()">&times;</span>
<form id="Form4" action="regebi.php" method="post">
<div class="form-row"><br>
<label for="codigo">Agregar equipo en el inventario:</label><br><br>
<input type="text" id="codigo" name="codigo" placeholder="Ingresa el código" required>
<input type="text" id="descripcion" name="descripcion" placeholder="Escribe descripcion" required>
<input type="text" id="cantidad" name="cantidad" placeholder="Dias de alquiler" required>
</div>
<div class="form-row">
<input type="text" id="valor_compra" name="valor_compra" placeholder="Valor total" required>
<input type="text" id="observaciones" name="observaciones" placeholder="Escribe observaciones" required>
</div><br>

<center><button type="submit">Registrar Equipo Biomedico</button></center>
</form>


</div>
</div>';
echo '<div id="eliminarmodal" class="modal">
<div class="modal-content">
<span class="close" onclick="loseModal()">&times;</span>
<form id="Form4.1" action="eliminar_ebi.php" method="post">
<div class="form-row"><br>
<label for="codigo">Codigo del equipo que va a eliminar:</label><br><br>
<input type="text" id="codigo" name="codigo" placeholder="Ingresa el código" required>
</div><br>
<center><button type="submit">Eliminar Equipo Biomedico</button></center>
</form>

</div>
</div>';
echo '<div id="editarmodal" class="modal">
<div class="modal-content">
<span class="close" onclick="eloseModal()">&times;</span>
<form id="Form4.2" action="editar_ebi.php" method="post">
<div class="form-row"><br>
<label for="codigo">Agregar equipo en el inventario:</label><br><br>
<input type="text" id="codigo" name="codigo" placeholder="Ingresa el código" required>
<input type="text" id="descripcion" name="descripcion" placeholder="Escribe descripcion" required>
<input type="text" id="cantidad" name="cantidad" placeholder="Dias de alquiler" required>
</div>
<div class="form-row">
<input type="text" id="valor_compra" name="valor_compra" placeholder="Valor total" required>
<input type="text" id="observaciones" name="observaciones" placeholder="Escribe observaciones" required>
</div><br>
<center><button type="submit">Editar Equipo Biomedico</button></center>
</form>

</div>
</div>';
  echo '<div style="overflow-x: auto;">
  <table class="data-table">
      <thead>
          <tr>
            <th> Codigo</th>
            <th> Descripcion </th>
            <th> Dias Alquiler</th>
            <th> Observaciones </th>
          </tr>
      </thead>
      <tbody>';
// Iterar a través de los resultados de la consulta
while ($fila = $ebio_result->fetch_assoc()) {
echo "<tr>";
echo "<td>{$fila['codigo']}</td>";
echo "<td>{$fila['descripcion']}</td>";
echo "<td>{$fila['cantidad']}</td>";
echo "<td>{$fila['observaciones']}</td>";
echo "</tr>";
}

echo '</tbody>
</table>
</div>
<div class="pagination-container">
  <ul class="pagination">
      <!-- Aquí se generará la paginación dinámicamente -->
  </ul>
</div>
<script>
      const tableBody = document.querySelector(\'.data-table tbody\');
      const paginationContainer = document.querySelector(\'.pagination\');

      function renderTable(pageNumber) {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const startIndex = (pageNumber - 1) * itemsPerPage;
          const endIndex = startIndex + itemsPerPage;

          rows.forEach((row, index) => {
              if (index >= startIndex && index < endIndex) {
                  row.style.display = \'table-row\';
              } else {
                  row.style.display = \'none\';
              }
          });
      }

      function renderPagination() {
          const itemsPerPage = 10;
          const rows = tableBody.querySelectorAll(\'tr\');
          const pageCount = Math.ceil(rows.length / itemsPerPage);

          paginationContainer.innerHTML = \'\';

          for (let i = 1; i <= pageCount; i++) {
              const li = document.createElement(\'li\');
              const a = document.createElement(\'a\');
              a.textContent = i;
              a.addEventListener(\'click\', () => {
                  renderTable(i);
              });
              li.appendChild(a);
              paginationContainer.appendChild(li);
          }
      }

      // Inicializa la tabla y la paginación
      renderTable(1);
      renderPagination();
  </script>';
break;

        // Repite esto para cada opción adicional que necesites
        default:
            // Código por defecto o mensaje de error si la opción no es válida
            echo '<p>Opción no válida.</p>';
            break;
    }
} 
?>


      
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