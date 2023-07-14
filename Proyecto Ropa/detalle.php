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
	</style>
</head>

<body>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <h1>Bienvenido <?php echo $_SESSION['usuario'] ?></h1>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="bienvenido.php">Inicio</a>
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
	<div class="container">
		<div class="card">
			<?php
 				 include "funciones/conexion.php";

 				 $sql = "SELECT * FROM datos where id = '".$_GET['id']."'";
 				$result =mysqli_query($conexion, $sql);
  				while($mostrar=mysqli_fetch_array($result)){

   				if($mostrar['eliminado'] == 0){
 				 ?>
					<table>
						 <tr>
               				 <th>Imagen</th>
                			<td>
							<img src="archivos/<?php echo $mostrar['id'] ?>.png" alt="Imagen" width="100" title="<?php echo $mostrar['id'] ?>">
						<tr>
							<th>ID:</th>
							<td><?php echo $mostrar['id'] ?></td>
						</tr>
						<tr>
							<th>Nombre:</th>
							<td><?php echo $mostrar['nombre'] ?></td>
						</tr>
						<tr>
							<th>Apellidos:</th>
							<td><?php echo $mostrar['apellidos'] ?></td>
						</tr>
						<tr>
							<th>Correo:</th>
							<td><?php echo $mostrar['correo'] ?></td>
						</tr>
					<tr>
               				 <th>Rol:</th>
               				 <td>
                				  <?php
                 				 if($mostrar['rol'] == '1')
                  				  echo "Administrador";
                  				else
                   				 echo "Gerente";
                  				?>
               		 </td>
             		 </tr>		
							<td colspan="2" class="text-center">
								<a class="btn btn-success" href="listaDeUsuarios.php" id="btn_new">Regresar</a>
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
