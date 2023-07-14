
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
    <title>Paginita</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="funciones/funciones.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">


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




      <div class="table_container">
        <br>
       

 <div class="col-md-6">
  <div class="card">
    <div class="card-body d-flex justify-content-center align-items-center">
      <table border="2px" class="table table-striped">
          <tr>
                <th colspan="7" id="title">Listado de pedidoss</th>
           </tr>

           <tr>
            <td style='border:  1px solid black ;'>ID</td>
            <td style='border: 1px solid black;'>FECHA</td>
            <td style='border: 1px solid black;'>USUARIO</td>

            <td style='border: 1px solid black;'>Acciones</td>
          </tr>
          </thead>
            <?php
              include "funciones/conexion.php";
              session_start();
              $idUsuario = $_SESSION['id'];

              $sql = "SELECT * FROM pedidos WHERE usuario = '$idUsuario'";
              $result =mysqli_query($conexion, $sql);
              while($mostrar=mysqli_fetch_array($result)){

            ?>

            <tr>  
              <td class="color-cell"><?php echo $mostrar['id']  ?></td>
              <td class="color-cell"><?php echo $mostrar['fecha']  ?></td>
              <td class="color-cell"><?php echo $mostrar['usuario']  ?></td>

              
              

            <td>
              
              <div style="display: flex;">
                  <a  class="btn btn-info" href="detallePedido.php?id=<?php echo $mostrar['id']; ?>" > Ver Detalle</a>
              
                  
                  
                  
            
               </tr>
            </div>


            <?php 
              } 
            ?>
             
             
          </table>
        </div>
       
</body>


          
        </script>
      </body>




</html>