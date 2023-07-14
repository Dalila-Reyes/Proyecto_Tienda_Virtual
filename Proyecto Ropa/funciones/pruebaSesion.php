<?php

	session_start();
  	$_SESSION['usuario'] = "Muppet";

  	$response = array(
			'status' => 'success',
			'message' => 'Se inicio como '.$_SESSION['usuario']
		);


  	echo json_encode($response);

 ?>


