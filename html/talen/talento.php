<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Saludcom | Talento Humano</title>
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
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND talento = 'Si'";
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
              <a class="sidebar-link" style="background-color: #1eac4e; color: white;" href="talento.php<?php echo isset($_GET['usuario']) ? '?usuario=' . $_GET['usuario'] : ''; ?>" aria-expanded="false">
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


    #tipodocumento,
    #modalidadservicio {
      width: calc(25% - 10px); /* 30% para el campo Tipo de Documento */
    }

    #tipocontrato {
      width: calc(32% - 10px); /* 30% para el campo Tipo de Documento */
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
              width: 5200px;
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

        /* Estilo del contenedor que activa el modal */
        #modalTrigger {
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
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn-amarillo {
            background-color: #ffc107; /* Amarillo */
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-amarillo:hover {
        color: #fff; /* Mantener el mismo color al pasar el cursor */
}

        /* Estilo del botón azul */
        .btn-azul {
            background-color: #007bff; /* Azul */
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-azul:hover {
        color: #fff; /* Mantener el mismo color al pasar el cursor */
}

.file-input-container {
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin-bottom: 10px; /* Ajusta según sea necesario */
    }

    /* Estilo personalizado para el campo de archivo real */
    .file-input-container input[type="file"] {
      position: absolute;
      font-size: 100px;
      opacity: 0;
      right: 0;
      top: 0;
      cursor: pointer;
    }

    /* Estilo personalizado para el texto de marcador de posición */
    .file-input-container::before {
      content: attr(placeholder); /* Utiliza el atributo placeholder */
      display: inline-block;
      background: #f9f9f9;
      padding: 8px 12px;
      outline: none;
      white-space: nowrap;
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
      margin:15px;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        cursor: pointer;
    }

    input[type="text"], select {
            /* Estilos para las entradas de texto y select */
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        @media screen and (max-width: 600px) {
    .name-container,
    .document-container {
      flex-direction: column;
    }

    input[type="text"],
    select {
      width: 100%;
      margin-bottom: 10px; /* Espaciado entre elementos en pantallas pequeñas */
    }

    /* Ajusta el tamaño del botón para pantallas más pequeñas */
    button {
      width: 100%;
    }
  }
  @media screen and (max-width: 600px) {
    #tipodocumento,
    #genero,
    #estadocivil,
    #firma,
    #regimen,
    #tipocontrato,
    #modalidadservicio {
        width: 100%;
        margin-bottom: 10px; /* Espaciado entre elementos en pantallas pequeñas */
    }
}
  </style>

      <div class="container-fluid">
      <div class="container">
    <form action="registro.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
  <label for="pnombre">Datos personales del trabajador</label><br><br>
  <div class="name-container">
    <input type="text" id="nombrecompleto" name="nombrecompleto" placeholder="Nombre Completo">
    <select id="tipodocumento" name="tipodocumento">
      <option value="tipo de documento">Tipo de Documento</option>
      <option value="cedula ciudadania">Cedula de Ciudadania</option>
      <option value="tarjeta identidad">Tarjeta de Identidad</option>
      <option value="cedula extranjera">Cedula de Extranjera</option>
      <option value="pasaporte">Pasaporte</option>
      <option value="otro">Otro</option>
    </select>
    <input type="text" id="numerocedula" name="numerocedula" placeholder="Numero Cedula">
    <input type="text" id="fechaexpedicion" name="fechaexpedicion" placeholder="Fecha de Expedicion: dd/mm/aaaa">
  </div>
</div>

<div class="form-group">
  <div class="name-container">
    <input type="text" id="lugarexpedicion" name="lugarexpedicion" placeholder="Lugar de Expedicion">
    <input type="text" id="numeroresolucion" name="numeroresolucion" placeholder="Numero Resolucion">
    <input type="text" id="profesion" name="profesion" placeholder="Profesion">
    <select id="modalidadservicio" name="modalidadservicio">
      <option value="modalidad de servicio">Modalidad de Servicio</option>
      <option value="Administrativo">Administrativo</option>
      <option value="Asistencial">Asistencial</option>
    </select>
  </div>
</div>

<div class="form-group">
  <div class="name-container">
    <input type="text" id="nacimiento" name="nacimiento" placeholder="Nacimiento: dd/mm/aaaa">
    <input type="text" id="lugarnacimiento" name="lugarnacimiento" placeholder="Lugar de Nacimiento">
    <input type="text" id="edad" name="edad" placeholder="Edad">
    <input type="text" id="tiposangre" name="tiposangre" placeholder="Tipo Sangre">
  </div>
</div>

<div class="form-group">
  <div class="name-container">
    <input type="text" id="ciudadresidencia" name="ciudadresidencia" placeholder="Ciudad de Residencia">
    <input type="text" id="direccionresidencia" name="direccionresidencia" placeholder="Direccion de Residencia">
    <input type="text" id="telefonoempleado" name="telefonoempleado" placeholder="Telefono Trabajador">
    <input type="text" id="numerocuenta" name="numerocuenta" placeholder="Numero Cuenta Bancaria">
  </div>
</div>

<div class="form-group">
  <div class="name-container">
  <input type="text" id="nombrebanco" name="nombrebanco" placeholder="Nombre del Banco">
    <input type="text" id="contactofamiliar" name="contactofamiliar" placeholder="Contacto Familiar Nombre">
    <input type="text" id="numerofamiliar" name="numerofamiliar" placeholder="Numero del Familiar">
    <input type="text" id="direccionfamiliar" name="direccionfamiliar" placeholder="Direccion del Familiar">
  </div>
</div><br>

      <div class="form-group">
  <label for="tipocontrato">Datos del contrato</label><br><br>
  <div class="document-container">
    <select id="tipocontrato" name="tipocontrato">
      <option value="tipodecontrato">Tipo de Contrato</option>
      <option value="contrato tiempo indefinido">Contrato Tiempo Indefinido</option>
      <option value="contrato tiempo fijo">Contrato Tiempo Fijo</option>
      <option value="contrato prestacion servicios">Contrato Prestacion de Servicios</option>
      <option value="contrato obra labor">Contrato Obra Labor</option>
    </select>
    <input type="text" id="numerocontrato" name="numerocontrato" placeholder="Número de Contrato">
    <input type="text" id="detallecontrato" name="detallecontrato" placeholder="Detalle del Contrato">
  </div>
</div><br>

<div class="form-group">
  <div class="row">
    <div class="col-md-6">
      <label for="hojadevida">Hoja de Vida</label>
      <input type="file" id="hojadevida" name="hojadevida">
    </div>
    <div class="col-md-6">
      <label for="copiacedula">Copia Cedula</label>
      <input type="file" id="copiacedula" name="copiacedula">
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-6">
      <label for="actagrado">Acta de Grado</label>
      <input type="file" id="actagrado" name="actagrado">
    </div>
    <div class="col-md-6">
      <label for="copiadiploma">Copia Diploma</label>
      <input type="file" id="copiadiploma" name="copiadiploma">
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-6">
      <label for="otrosestudios">Otros Estudios</label>
      <input type="file" id="otrosestudios" name="otrosestudios">
    </div>
    <div class="col-md-6">
      <label for="epsfparl">EPS - FP - ARL</label>
      <input type="file" id="epsfparl" name="epsfparl">
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-6">
      <label for="certificadovacunas">Certificado Vacunas</label>
      <input type="file" id="certificadovacunas" name="certificadovacunas">
    </div>
    <div class="col-md-6">
      <label for="rethus">Rethus</label>
      <input type="file" id="rethus" name="rethus">
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-6">
      <label for="rut">RUT</label>
      <input type="file" id="rut" name="rut">
    </div>
    <div class="col-md-6">
      <label for="rcp">RCP</label>
      <input type="file" id="rcp" name="rcp">
    </div>  
  </div>
</div>


      <div class="form-group">
        <center><button type="submit">Registrar Trabajador</button></center>
      </div>

    </form>
  </div>
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
$sql = "SELECT * FROM empleados";
$resultado = $conexion->query($sql);

// Cerrar la conexión
$conexion->close();
?>

            <div style="margin-bottom: 10px;">
            <button class="eliminar-btn" onclick="eliminar()">Eliminar</button>
            <button class="editar-btn" onclick="abrirModal()">Descargar</button>
          </div>
          <div class="modal" id="modal">
  <div class="modal-content">
  <span class="close" onclick="cerrarModal()">&times;</span><br>
  <label for="titulo">Ingresa los datos del archivo que desea descargar:</label><br><br>
    <form action="descarga.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post">
      <label for="titulocedula">Número de Cédula:</label>
      <input type="text" id="numerocedula" name="numerocedula" placeholder="Ingresa la cedula">

      <label for="tituloarchivo">Archivo :</label>
      <select id="archivo" name="archivo">
        <option value="hojadevida">Hoja de vida</option>
        <option value="copiacedula">Copia Cédula</option>
        <option value="copiadiploma">Copia Diploma</option>
        <option value="actagrado">Copia Acta</option>
        <option value="otrosestudios">Otros Estudios</option>
        <option value="epsfparl">EPS FP ARL</option>
        <option value="certificadovacunas">Certificado Vacunas</option>
        <option value="rethus">RETHUS</option>
        <option value="rut">RUT</option>
        <option value="rcp">RCP</option>
      </select><br>
      <center>
                <input type="submit" value="Descargar Archivo">
            </center>
    </form>
  </div>
</div>

<script>
  // Funciones para abrir y cerrar la ventana modal
  function abrirModal() {
    document.getElementById('modal').style.display = 'flex';
  }

  function cerrarModal() {
    document.getElementById('modal').style.display = 'none';
  }
</script>


          <div id="elimminarodal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="loseModal()">&times;</span>
        <form action="eliminar.php?usuario=<?php echo urlencode($_GET['usuario']); ?>" method="post">
            <div class="form-row"><br>
                <label for="codigo">Escribe la cedula del trabajador que desea eliminar:</label><br><br>
                <input type="text" id="numerocedula" name="numerocedula" placeholder="Ingresa la cedula" required>
            </div><br>
            <center>
                <input type="submit" value="Eliminar Usuario">
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



<div style="overflow-x: auto;">
      <!-- Tabla de Datos -->
      <table class="data-table">
    <thead>
        <tr>
            <th >Nombre Completo</th>
            <th >Tipo ID</th>
            <th >N° Documento</th>
            <th >Fecha Expedicion</th>
            <th >Lugar Expedicion</th>
            <th >Numero Resolucion</th>
            <th >Profesion</th>
            <th >Modalidad Servicio</th>
            <th >Nacimiento</th>
            <th >Lugar Nacimiento</th>
            <th >Edad</th>
            <th >Tipo Sangre</th>
            <th >Ciudad Residencia</th>
            <th >Direccion Residencia</th>
            <th >Telefono Empleado</th>
            <th >Numero Cuenta</th>
            <th >Nombre Banco</th>
            <th >Contacto Familiar</th>
            <th >Numero Familiar</th>
            <th >Detalle Contrato</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Iterar a través de los resultados de la consulta
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td >{$fila['nombrecompleto']}</td>";
            echo "<td >{$fila['tipodocumento']}</td>";
            echo "<td >{$fila['numerocedula']}</td>";
            echo "<td >{$fila['fechaexpedicion']}</td>";
            echo "<td >{$fila['lugarexpedicion']}</td>";
            echo "<td >{$fila['numeroresolucion']}</td>";
            echo "<td >{$fila['profesion']}</td>";
            echo "<td >{$fila['modalidadservicio']}</td>";
            echo "<td >{$fila['nacimiento']}</td>";
            echo "<td >{$fila['lugarnacimiento']}</td>";
            echo "<td >{$fila['edad']}</td>";
            echo "<td >{$fila['tiposangre']}</td>";
            echo "<td >{$fila['ciudadresidencia']}</td>";
            echo "<td >{$fila['direccionresidencia']}</td>";
            echo "<td >{$fila['telefonoempleado']}</td>";
            echo "<td >{$fila['numerocuenta']}</td>";
            echo "<td >{$fila['nombrebanco']}</td>";
            echo "<td >{$fila['contactofamiliar']}</td>";
            echo "<td >{$fila['numerofamiliar']}</td>";
            echo "<td >{$fila['detallecontrato']}</td>";
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