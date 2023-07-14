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




 <style>
    .card {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .card-title {
      margin-bottom: 20px;
      font-size: 20px;
      color: #007bff;
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

  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
        <h5 class="card-title">Nuevo Persona</h5>
        
        <form id="frm_agregar" method="post">
          <table class="table">
            <tr>
              <td>
                <div class="form-floating">
                  <input class="form-control" type="text" name="nombre" id="nombre" value="" required>
                  <label class="form-floating" for="nombre">Nombre</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-floating">
                  <input class="form-control" type="text" name="apellidos" id="apellidos" value="" required>
                  <label class="form-floating" for="apellidos">Apellidos:</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-floating">
                  <input class="form-control" type="text" name="correo" id="correo" value="" required>
                  <label class="form-floating" for="correo">Correo:</label>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="form-floating">
                  <input class="form-control" type="password" name="password" id="password" value="" required>
                    <label class="form-floating" for="password">Password</label>
                </div>
              </td>
            </tr>
       
            <tr>
                <td>
                  <div class="form-floating">
                    <select class="form-select form-select-sm" name="rol" id="rol">
                      <option value="0">Administrador</option>
                      <option value="1">Gerente</option>
                    </select>
                    <label class="form-floating" for="rol">Rol</label>
                  </div>
                </td>
              </tr>
            </tr>
                  <tr>
                <td>
                  <div class="form-floating">
                    <input class="form-control" type="file" width="600" height="200" name="imagen" id="imagen" accept="image/*">
                    <label class="form-floating" for="imagen">Imagen</label>
                  </div>
                </td>
              </tr>
            <tr>
              <td>
               
          
          


         

          <div class="input-field text-center">
            <button type="submit" name="btn_guardar" id="btn_guardar" class="btn btn-success">Guardar</button>
            <label class="form-floating"></label>
            <br><br>
            <a class="btn btn-success" href="listaDeUsuarios.php" id="btn_new" >Regresar</a>
          </div>
          
        </form>
      </div>
    </div>




   <script type="text/javascript">
      $(document).ready(function(){
        $("#btn_guardar").click(function(e){
          e.preventDefault();
          
          agregar_datos();
        });
      });
      
    </script>
    

  </body>
</html>