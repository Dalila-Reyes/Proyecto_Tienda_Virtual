<?php
    include "conexion.php";
    

$id = $_POST['id'];
$nombre = $_POST['nombre'];


    $sql = "SELECT COUNT(*) nombre FROM banners WHERE id !='".$id."' AND nombre ='".$nombre."'";
	$consulta =  mysqli_query($conexion, $sql);
	$result = mysqli_fetch_assoc($consulta);

	if($result['nombre'] > 0){
	  // Generando respuesta error de codigo repetido
	    $response = array(
	        'status' => 'error',
	        'message' => 'El nombre '.$nombre.' ya existe en la base de datos'
	    );
	}else{
		$sql = "UPDATE banners SET nombre='$nombre' WHERE id=$id";
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
		      $dir        ="../archivos/banners/";
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