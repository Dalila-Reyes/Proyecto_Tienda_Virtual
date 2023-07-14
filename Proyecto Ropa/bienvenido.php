
 <?php 
  session_start();
  error_reporting(0);
  $varSesion = $_SESSION['usuario'];
  if($varSesion == null || $varSesion == ''){
    echo "<h1>Permiso denegado</h1>";
    die();
  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	  <script src="funciones/funciones.js"></script>
	   <link rel="stylesheet" type="text/css" href="estilos.css">
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
		  <h1>Bienvenido <?php echo $_SESSION['usuario'] ?></h1>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="home.php">Inicio</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="listaDeUsuarios.php">Administradores</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="listaDeProductos.php">Productos</a>
		      </li>
				<li class="nav-item">
		        <a class="nav-link" href="listaDeBanners.php">Banners</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="listaDePedidos.php">Pedidos</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="funciones/cerrarSesion.php">Cerrar sesión</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	



		<footer>
    <p>Derechos reservados | Términos y condiciones | Redes sociales</p>
  </footer>

</body>
</html>