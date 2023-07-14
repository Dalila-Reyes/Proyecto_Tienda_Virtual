<?php
include "conexion.php";


$nombre = $_POST['nombre'];   
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$rol = $_POST['rol'];


$sql = "SELECT COUNT(*) correo FROM datos WHERE correo ='".$correo."'";
$consulta =  mysqli_query($conexion, $sql);
$result = mysqli_fetch_assoc($consulta);

if($result['correo'] > 0){
  // Generando respuesta error de correo repetido
    $response = array(
        'status' => 'error',
        'message' => 'El correo '.$correo.' ya existe en la base de datos'
    );
}else{
    $sql = "INSERT INTO datos (nombre, apellidos, correo, pass, rol, archivo_n, archivo, status, eliminado)
        VALUES('$nombre', 
               '$apellidos',
               '$correo',
               '$password',
               $rol,
               0,
               0,
               1,
               0)";

	if(mysqli_query($conexion, $sql)){
    
	  

    $sqlID = "SELECT * FROM datos where correo = '".$correo."'";
    $resultID =mysqli_query($conexion, $sqlID);
    while($registro=mysqli_fetch_array($resultID)){
        $id = $registro['id'];
    }

    // Crear nuevo pedido vacio para proximas compras
    $fechaActual = date('Y-m-d');
    $sqlPedido = "INSERT INTO pedidos (fecha, usuario, status) VALUES ('$fechaActual', '$id', 0)";
    $consultaPedido =  mysqli_query($conexion, $sqlPedido);

    // Codigo necesario para guardar imagen
    // Valida si se seleccionó una imagen
    if(isset($_FILES['imagen'])){ 
      $file_name  =$_FILES['imagen']['name'];
      $file_tmp   = $_FILES['imagen']['tmp_name'];
      $cadena     = explode(".", $file_name);
      $len        = count ($cadena)-1;
      $ext        =$cadena[$len];
      $dir        ="../archivos/";
      $file_enc   =md5_file($file_tmp);


      if($file_name != '' ) {
          $fileName1  ="$file_enc.$ext";
          copy($file_tmp, $dir.$id.".png");
      }
    }
    




    // Generando respuesta success
		$response = array(
	        'status' => 'success',
	        'message' => 'Se agregó correctamente'
    	);
	} else{
    // Generando respuesta error
		$response = array(
            'status' => 'error',
            'message' => 'Ocurrió un error al agregar los datos'
        );
	}
}

echo json_encode($response);              


?>