<?php
    include "conexion.php";
    
    // Se obtiene el ID del usuario logueado actualmente
    session_start();
    $idUsuario = $_SESSION['id'];
    
    // Se obtiene el pedido que actualmente está abierto para este usuario
    $sql = "SELECT * FROM pedidos WHERE usuario = '$idUsuario' AND status = 0";
	$consulta =  mysqli_query($conexion, $sql);
	$result = mysqli_fetch_assoc($consulta);

    // se guarda el Id del pedido
    $idPedido = $result['id'];


    // Obtenemos el detalle del pedido para identificar cada uno de los productos
    $sql = "SELECT * FROM pedidos_productos AS pp
            INNER JOIN pedidos AS p ON pp.id_pedido = p.id
            WHERE p.id = '$idPedido'";
            

	$consulta =  mysqli_query($conexion, $sql);

    // Se actualiza cada uno de los productos segun la cantidad del detalle
    while($mostrar = mysqli_fetch_array($consulta)){
        $idProducto = $mostrar['id_producto'];
        $cantidad = $mostrar['cantidad'];
        $sql = "UPDATE productos SET stock=stock-'$cantidad' WHERE id='$idProducto' ";

        $update =  mysqli_query($conexion, $sql);
    }

    // se actualiza el pedido y se cierra
    $sql = "UPDATE pedidos SET status = 1 WHERE id='$idPedido' ";
	$consulta =  mysqli_query($conexion, $sql);
	
    // Crear nuevo pedido vacio para proximas compras
    $fechaActual = date('Y-m-d');
    $sql = "INSERT INTO pedidos (fecha, usuario, status) VALUES ('$fechaActual', '$idUsuario', 0)";
	$consulta =  mysqli_query($conexion, $sql);

    header("Location:../home.php");

 ?>