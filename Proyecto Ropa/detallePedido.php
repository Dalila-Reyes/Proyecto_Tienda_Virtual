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


	<form >  
<div class="col-md-7">
  <div class="card">
    <div class="card-body d-flex justify-content-center align-items-center">
      <table border="2px" class="table table-striped">
        <tr>
          <th colspan="7" id="title">Pedido 2/2</th>
        </tr>
        <tr>
          <td style='border: 1px solid black;'>Producto</td>
          <td style='border: 1px solid black;'>Cantidad</td>
          <td style='border: 1px solid black;'>Costo Unitario</td>
          <td style='border: 1px solid black;'>Subtotal</td>
      

          
        </tr>
        <?php
          include "funciones/conexion.php";
		  $idPedido = $_GET['id'];
		  
          $idUsuario = $_SESSION['id'];
          $sql = "SELECT prod.nombre AS 'Producto', pp.cantidad AS 'Cantidad', prod.costo AS 'Costo unitario', prod.costo * pp.cantidad AS 'Subtotal'
            FROM pedidos AS p
            INNER JOIN pedidos_productos AS pp ON p.id = pp.id_pedido
            INNER JOIN productos AS prod ON pp.id_producto = prod.id
            WHERE p.id = '$idPedido'";
            $total =0;



          $result = mysqli_query($conexion, $sql);
          while($mostrar = mysqli_fetch_array($result)){
            $subtotal = $mostrar['Subtotal'];
            $total += $subtotal;
        ?> 
        <tr>  
             <td class="color-cell"><?php echo $mostrar['Producto']  ?></td>
             <td class="color-cell"><?php echo $mostrar['Cantidad']  ?></td>
             <td class="color-cell"><?php echo $mostrar['Costo unitario']  ?></td>
             <td class="color-cell"><?php echo $mostrar['Subtotal']  ?></td>
             


          
          <td>

          </td>
        </tr>
        <?php 
          
        } 
        ?>
             <tfoot>
            
            <tr>
              <td colspan="3">Total:</td>
              <td><?php echo $total?></td>
           </tr>
        </tfoot>
      </table>
      
    </div>
  </div>
</div>
<a class="btn btn-success" href="listaDePedidos.php" id="btn_new">Regresar</a>
</body>
</html>
