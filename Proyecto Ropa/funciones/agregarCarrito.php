<?php
include "conexion.php";


$idProducto = $_POST['id'];   


// Se obtiene el ID del usuario logueado actualmente
session_start();
$idUsuario = $_SESSION['id'];

// Se obtiene el pedido que actualmente está abierto para este usuario
$sql = "SELECT * FROM pedidos WHERE usuario = '$idUsuario' AND status = 0";
$consulta =  mysqli_query($conexion, $sql);
$result = mysqli_fetch_assoc($consulta);

// se guarda el Id del pedido
$idPedido = $result['id'];

// Se obtiene el precio del producto
$sql = "SELECT * FROM productos WHERE id = '$idProducto'";
$consulta =  mysqli_query($conexion, $sql);
$result = mysqli_fetch_assoc($consulta);

// se guarda el Id del pedido
$precioProducto = $result['costo'];


$sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio)
        VALUES($idPedido,$idProducto,1,$precioProducto)";


$consulta =  mysqli_query($conexion, $sql);




if($consulta){
    // Generando respuesta success
		$response = array(
	        'status' => 'success',
	        'message' => 'Se agregó al carrito'
    	);
	} else{
    // Generando respuesta error
		$response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error al agregar'
        );
	}

echo json_encode($response);              


?>