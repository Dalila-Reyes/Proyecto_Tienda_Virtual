<?php 
  session_start();
  error_reporting(0);
  $varSesion = $_SESSION['usuario'];
  if($varSesion != null || $varSesion != ''){
    
  
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>CARRITO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
  <div class="table_container">
      

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

            $idUsuario = $_SESSION['id'];
            $sql = "SELECT prod.nombre AS 'Producto', pp.cantidad AS 'Cantidad', prod.costo AS 'Costo unitario', prod.costo * pp.cantidad AS 'Subtotal', pp.id AS 'id', pp.id_producto AS 'idProducto'
              FROM pedidos AS p
              INNER JOIN pedidos_productos AS pp ON p.id = pp.id_pedido
              INNER JOIN productos AS prod ON pp.id_producto = prod.id
              WHERE p.usuario = '$idUsuario' AND p.status = 0 AND p.id = pp.id_pedido AND pp.cantidad <= prod.stock";
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
<a class="btn btn-success" href="carrito_paso01.php" id="btn_new">Regresar</a>
<a class="btn btn-success" id="btn_finalizar" name="btn_finalizar">Finalizar</a>



        </div>


          
        </script>

 
        




  <script type="text/javascript">
      $(document).ready(function(){
        $("#btn_finalizar").click(function(e){
          e.preventDefault();
          alert("Gracias por tu compra");
          window.location.href = "funciones/finalizarPedido.php";
        });
      });
      
    </script>
  <footer>
    <p>Derechos reservados | Términos y condiciones | Redes sociales</p>
  </footer>

</body>
</html>