<?php
    include "conexion.php";
    
$id = $_POST['id'];
$nombre = $_POST['nombre'];   
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];




    $sql = "SELECT COUNT(*) codigo FROM productos WHERE id !='".$id."' AND codigo ='".$codigo."'";
	$consulta =  mysqli_query($conexion, $sql);
	$result = mysqli_fetch_assoc($consulta);

	if($result['codigo'] > 0){
	  // Generando respuesta error de codigo repetido
	    $response = array(
	        'status' => 'error',
	        'message' => 'El codigo '.$codigo.' ya existe en la base de datos'
	    );
	}else{
		$sql = "UPDATE productos SET nombre='$nombre', codigo='$codigo',descripcion='$descripcion', costo='$costo', stock='$stock' WHERE id=$id";
	    if(mysqli_query($conexion, $sql)){

	    	$response = array(
	        'status' => 'success',
	        'message' => 'Se modificó correctamente'
    	);

		if(isset($_FILES['imagen'])){ 
			
	      $file_name  =$_FILES['imagen']['name'];
	      $file_tmp   = $_FILES['imagen']['tmp_name'];
	      $cadena     = explode(".", $file_name);
	      $len        = count ($cadena)-1;
	      $ext        =$cadena[$len];
	      $dir        ="../archivos/productos";
	      $file_enc   =md5_file($file_tmp);


	      if($file_name != '' ) {
	          $fileName1  ="$file_enc.$ext";
	          copy($file_tmp, $dir.$id.".png");
	      }
	    }

	    }else{

	    	$response = array(
	        'status' => 'error',
	        'message' => 'No se pudo modificar'
    		);
	    }
	}

    echo json_encode($response);

    //header('Location: ../index.php');
?>