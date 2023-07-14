<?php 
	session_start();
	session_destroy();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
	if(isset($_SESSION['usuario'])){
	?>
	Bienvenido muppet
	

	<?php 
	}else{
	 ?>
	Se cerró la sesion
	<?php  }?>
</body>
</html>