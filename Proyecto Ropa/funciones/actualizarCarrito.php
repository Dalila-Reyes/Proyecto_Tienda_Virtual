<?php
    include "conexion.php";
    
	$id = $_POST['id'];
	$cantidad = $_POST['cantidad'];
	$idProducto = $_POST['idProducto'];


    $sql = "SELECT * FROM productos WHERE id ='$idProducto'" ;
	$consulta =  mysqli_query($conexion, $sql);
	$result = mysqli_fetch_assoc($consulta);

	if($result['stock'] >= $cantidad){
		$sql = "UPDATE  pedidos_productos SET   cantidad='$cantidad' WHERE id='$id' ";
		$consulta =  mysqli_query($conexion, $sql);
	
	  // Generando respuesta error de codigo repetido
	    $response = array(
	        'status' => 'success',
	        'message' => 'Se actualizo tu pedido'
	    );
	}else{

		$response = array(
	        'status' => 'error',
	        'message' => 'No hay stock suficiente'
	    );

	

	}
	

    echo json_encode($response);

    //header('Location: ../index.php');
?>