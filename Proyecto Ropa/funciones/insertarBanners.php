
<?php
include "conexion.php";



$nombre = $_POST['nombre'];   


$sql = "SELECT COUNT(*) nombre FROM banners WHERE nombre ='".$nombre."'";
$consulta =  mysqli_query($conexion, $sql);
$result = mysqli_fetch_assoc($consulta);

if($result['nombre'] > 0){
  // Generando respuesta error de correo repetido
    $response = array(
        'status' => 'error',
        'message' => 'El nombre '.$nombre.' ya existe en la base de datos'
    );
}else{
    $sql = "INSERT INTO banners (nombre,archivo, status, eliminado)
        VALUES('$nombre', 
               0,
               1,
               0)";



    if(mysqli_query($conexion, $sql)){

      $sqlID = "SELECT * FROM banners where nombre = '".$nombre."'";
      $resultID =mysqli_query($conexion, $sqlID);
      while($registro=mysqli_fetch_array($resultID)){
          $id = $registro['id'];
      }

      // Codigo necesario para guardar imagen
      // Valida si se seleccionó una imagen
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