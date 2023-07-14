<?php
    include "conexion.php";

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];




    $sql = "SELECT COUNT(*) correo FROM datos WHERE id !='".$id."' AND correo ='".$correo."'";
	$consulta =  mysqli_query($conexion, $sql);
	$result = mysqli_fetch_assoc($consulta);

	if($result['correo'] > 0){
	  // Generando respuesta error de correo repetido
	    $response = array(
	        'status' => 'error',
	        'message' => 'El correo '.$correo.' ya existe en la base de datos'
	    );
	}else{
		$sql = "UPDATE datos SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol='$rol' WHERE id=$id";
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
	      $dir        ="../archivos/";
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