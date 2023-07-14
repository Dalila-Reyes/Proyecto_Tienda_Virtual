<?php 
  session_start();
  error_reporting(0);
  $varSesion = $_SESSION['usuario'];
  if($varSesion == null || $varSesion == ''){
    echo "<h1>Permiso denegado</h1>";
    die();
  }
 ?>
<?php
    include "funciones/conexion.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM datos WHERE id=$id";
    $result = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($result);
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Editar Registro</h5>
                        <form method="post" action="funciones/actualizarRegistro.php" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-floating">
                                                    <input class="form-control" type="hidden" name="id" id="id"
                                                        value="<?php echo $registro['id']; ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-floating">
                                                    <img class="form-floating"
                                                        src="archivos/<?php echo $registro['id']; ?>.png"
                                                        alt="Imagen" width="100"
                                                        title="<?php echo $registro['id'] ?>">
                                                     <input class="form-control" type="file" name="imagen" id="imagen" accept="image/*">
                                                        
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-floating">
                                                    <input class="form-control" type="text" name="nombre" id="nombre"
                                                        value="<?php echo $registro['nombre']; ?>">
                                                    <label>Nombre:</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-floating">
                                                    <input class="form-control" type="text" name="apellidos" id="apellidos"
                                                        value="<?php echo $registro['apellidos']; ?>">
                                                    <label>Apellidos:</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-floating">
                                                    <input class="form-control" type="text" name="correo"
                                                        id="correo"
                                                        value="<?php echo $registro['correo']; ?>">
                                                    <label>Correo:</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-floating">
                                                    <select class="form-control" name="rol" id="rol">
                                                         <option value="1" <?php if($registro['rol'] == 1) echo "selected"; ?>>Administrador<optio>
                                                         <option value="2" <?php if($registro['rol'] == 2) echo "selected"; ?>>Gerente</option>

                                                    </select>
                                                    <label>Rol:</label>
                                                </div>
                                         <tr>
                                            <td>
                                              
                                                
                                                <div class="form-floating">
                                                    <br>
                                                    <button type="submit" class="btn btn-success" name="btn_guardar" id="btn_guardar">Actualizar Registro</button>
                                                    <br><br>
                                                          <a class="btn btn-success" href="listaDeUsuarios.php" id="btn_new" >Regresar</a>
                                                </div>
                                                    </td>
                                        



                                    </form>
                                </div>


       <script type="text/javascript">
          $(document).ready(function(){
            $("#btn_guardar").click(function(e){
              e.preventDefault();
              
              actualizar_datos();
            });
          });
          
        </script>


    </body>
</html>