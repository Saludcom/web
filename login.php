	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saludcom | Inicio Sesion</title>
	<link href="../home/logo-mini.png" rel="icon">
    <link rel="stylesheet" href="style.css">
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	 <link rel="shortcut icon" type="image/png" href="assets/images/logos/jae.png" />
</head>
<body>
<div class="container">



      <div class="forms-container">
	  
	  
		
		
		
        <div class="form-control signin-form">
          <form action="validar.php" method="post">
            <h2>Inicia Sesion Con Tus Datos </h2><br><br><br>
            <input type="text" placeholder="Ingresa Tu Usuario" name="usuario" id="usuario" required />
			<select name="rol" id="rol" required>
  <option value="" disabled selected>Selecciona Tu Rol</option>
  <option value="administrativo">Administrativo</option>
</select>
            <input type="password" placeholder="Ingresa Tu Contraseña" name="contraseña" id="contraseña" required /><br><br>
            <button name="sesion" type="submit" value="Guardar">Iniciar Sesion</button>
          </form><br><br>
		  <center>
          <img src="assets/images/logo.png" width="300px" height="72px"/>
		  </center>
        </div>
		
		
		
		
		
		
		
		
      </div>
      <div class="intros-container">
        <div class="intro-control signin-intro">
          <div class="intro-control__inner">
            <h2>Inicia Sesion!</h2>
            <p>
              Deberas ingresar tus datos los cuales fueron asignados en el momento en que fuiste registrado en el sistema, estos datos tambien te llegaran al correo.
            </p>
            <button id="signup-btn">Bienvenido A Nuestro Sistema.</button>
          </div>
        </div>
		
		
		
		
		
		
        
	
	</body>
</html>