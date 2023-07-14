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
<html lang="en">
<head>
	<title>Ver Detalle</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<style>
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}
		.card {
			width: 400px;
			padding: 20px;
			box-shadow: 0 0 10px rgba(0,0,0,.1);
			border-radius: 10px;
		}
		.card img {
			width: 100px;
		}
		.card table {
			width: 100%;
			border-collapse: collapse;
		}
		.card table td {
			padding: 8px 16px;
		}
		.card table tr:nth-child(odd) {
			background-color: #f2f2f2;
		}
		.card .btn {
			margin-top: 20px;
		}
        .center-img {
      display: flex;
      justify-content: center;
      
      height: 40vh;
    }
	</style>
</head>

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
          <a class="nav-link" href="bienvenido.php">Home</a>
        </li>
        <br><br>
        <li class="nav-item">
          <a class="nav-link" href="productos.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrito_paso01.php">Carrito</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="bienvenido.php">Perfil</a>
        </li> 
         
       <li class="nav-item">
		   <a class="nav-link" href="funciones/cerrarSesion.php">Cerrar sesión</a>
		</li>
      </ul>
    </div>
  </nav>

	<div class="container">
		<div class="card">
			<?php
			include "funciones/conexion.php";

			$sql = "SELECT * FROM productos where id = '".$_GET['id']."'";
			$result = mysqli_query($conexion, $sql);
			while ($mostrar = mysqli_fetch_array($result)) {
				if ($mostrar['eliminado'] == 0) {
					?>
					<table>
						<tr>
                        
							<td ><img src="archivos/productos/<?php echo $mostrar['id'] ?>.png" alt="Imagen" width=100 title="<?php echo $mostrar['id'] ?>"></td>
						</tr>
						<tr>
					
						<tr>
							
							<td><?php echo $mostrar['nombre'] ?></td>
						</tr>
						<tr>
							<th>Codigo:</th>
							<td><?php echo $mostrar['codigo'] ?></td>
						</tr>
						<tr>
							<th>Descripcion:</th>
							<td><?php echo $mostrar['descripcion'] ?></td>
						</tr>
						<tr>
							<th>Costo:$</th>
							<td><?php echo $mostrar['costo'] ?></td>
						</tr>
					
						<tr>
							<td colspan="2" class="text-center">
								<a class="btn btn-success" href="productos.php" id="btn_new">Regresar</a>
                                <a class="btn btn-success" href="home.php" id="btn_new">comprar</a>
							</td>
						</tr>
					</table>
					<?php
				}
			}
			?>
		</div>
	</div>
</body>
</html>
