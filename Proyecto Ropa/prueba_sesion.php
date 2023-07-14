<?php 
    session_start();
    error_reporting(0);
   ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="funciones/funciones.js"></script>
</head>
<body>



	<button type="submit" name="btn_acceder" id="btn_acceder" class="btn btn-secondary">Acceder</button>

  <a href="funciones/pruebaSesion.php">Iniciar</a>
  Hola  <?php echo $_SESSION['usuario'] ?>


	<script type="text/javascript">
    $(document).ready(function(){
      $("#btn_acceder").click(function(e){
        e.preventDefault();
        
        foo();
      });
    });
    
  </script>

</body>
</html>