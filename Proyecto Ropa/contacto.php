<?php 
  session_start();
  error_reporting(0);
  $varSesion = $_SESSION['usuario'];
  if($varSesion != null || $varSesion != ''){
    
  
  }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = 'dalilareyes2145@gmail.com';
    $subject = 'Asunto del correo';
    $message = $_POST['mensaje'];
    $headers = 'From: dalilareyes2145@gmail.com' . "\r\n" .
        'Reply-To: dalilareyes2145@gmail.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'El correo se envió correctamente.';
    } else {
        echo 'Hubo un error al enviar el correo.';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Formulario de contacto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
    }

    footer {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100px;
      background-color: #f8f8f8;
    }
   
    .center-img {
      display: flex;
      justify-content: center;
      
      height: 40vh;
    }
  </style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon contrainer"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <img src="archivos/logo.jpg" width="100" height="100">
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <br><br>
        <li class="nav-item">
          <a class="nav-link" href="productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrito_paso01.php">carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="funciones/cerrarSesion.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Formulario de contacto</h1>
    <form action="procesar_formulario.php" method="POST">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
      </div>
      <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico:</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
      </div>
      <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje:</label>
        <input type="text" class="form-control" id=" mensaje" name="mensaje" required>
      </div>
      <button type="submit" href="home.php"class="btn btn-primary">Enviar</button>
	  <button type="submit" href="home.php" class="btn btn-success">Regresar</button>
    </form>
  </div>
  <footer>
    <p>Derechos reservados | Términos y condiciones | Redes sociales</p>
  </footer>

</body>
</html>

