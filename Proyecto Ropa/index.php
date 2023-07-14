<?php 
  session_start();
  error_reporting(0);
  $varSesion = $_SESSION['usuario'];
  if($varSesion != null || $varSesion != ''){
    
    header("Location:home.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="funciones/funciones.js"></script>
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      max-width: 400px;
      border: none;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color: #6c757d;
      color: white;
      text-align: center;
      padding: 10px 0;
      border-radius: 10px 10px 0 0;
    }
    .card-body {
      padding: 20px;
    }
    .form-label {
      font-weight: bold;
    }
    .btn-acceder {
      background-color: #28a745;
      border: none;
    }
    .btn-acceder:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
    
    <div style="display: none;" class="alert alert-danger" role="alert" id="error">
      Debes llenar todos los campos
    </div>
  </div>
  <div class="container">
    <div class="card">
      <div class="card-header" style="background-color: pink;">
        <h4 style="color: black;">Iniciar sesión</h4>
      </div>
      <div class="card-body">
        <form id="frm_login" method="post">
          <div class="mb-3">
            <label for="correo" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="correo" placeholder="Ingresa tu correo">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña">
          </div>
          <button type="submit" name="btn_acceder" id="btn_acceder" class="btn btn-acceder btn-block">Acceder</button>
        </form>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    $(document).ready(function(){
      $("#btn_acceder").click(function(e){
        e.preventDefault();
        validar_login();
      });
    });
  </script>
</body>
</html>
