<?php
	include "conexion.php";

	//Recibe variables
	$correo = $_POST ['correo'];
	$password = $_POST ['password'];

	$sql = "SELECT * FROM datos WHERE correo = '$correo' AND pass = '$password' AND eliminado = 0";
	
	$consulta = mysqli_query($conexion, $sql);


	if ($consulta) {
		//$resultado = mysqli_fetch_row($consulta);
		$registro = mysqli_fetch_assoc($consulta);

		if ($registro != null) {
			// Generando respuesta éxito
			$response = array(
				'status' => 'success',
				'message' => 'Se ha ingresado correctamente'
			);
			

			session_start();
			$_SESSION['usuario'] = $registro['nombre'];
			$_SESSION['id'] = $registro['id'] ;


		} else {
			// Generando respuesta error de usuario o contraseña incorrectos
			$response = array(
				'status' => 'error',
				'message' => 'El usuario no existe'
			);
		}
	} else {
		// Generando respuesta error de consulta
		$response = array(
			'status' => 'error',
			'message' => 'Error al realizar la consulta'
		);
	}

	echo json_encode($response);

	exit;
?>
