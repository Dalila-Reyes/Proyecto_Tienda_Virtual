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
          <a class="nav-link" href="bienvenido.php">Perfil</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="funciones/cerrarSesion.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>
 



  </div>
  


  <div class="container">
    
    <div class="row">
      <?php
      include "funciones/conexion.php";

      $sql = "SELECT * FROM productos WHERE eliminado=0 AND stock > 0 ORDER BY RAND() ";
      $result =mysqli_query($conexion, $sql);
      while($mostrar=mysqli_fetch_array($result)){
        
        echo '<div class="col-md-2">';
        echo '<div class="card">';
        echo '<div class="card-body text-center">';
        echo '<img src="archivos/productos/' . $mostrar['id'] . '.png" alt="Imagen" width=150px height=150px title="' . $mostrar['id'] . '">';
        echo '<h5 class="card-title"><a class="nav-link"  href="verDetalleProducto.php?id='.  $mostrar['id'].'">' . $mostrar['nombre'] . '</a></h5>';
        
        echo '<p class="card-text">Código: ' . $mostrar["codigo"] . '</p>';
        echo '<p class="card-text">$' . $mostrar["costo"] . '</p>';
        echo '<a class="btn btn-success" href="home.php" id="btn_new">comprar</a>';
        echo '<br></div>';
        echo '<br></div>';
        echo '<br></div>';
        echo '<br><div class="col-md-2">';
        echo '<br></div>';

        echo '<br><br>';
        echo '<br><br>';
        echo '<br><br>';
        echo '<br><br>';
      }

      ?>
    </div>
  </div>
 





<br>
<br>
<br>




  <footer>
    <p>Derechos reservados | Términos y condiciones | Redes sociales</p>
  </footer>

</body>
</html>