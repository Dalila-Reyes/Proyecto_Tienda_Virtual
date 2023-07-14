
<?php
include "conexion.php";



$nombre = $_POST['nombre'];   
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$stock = $_POST['stock'];

$sql = "SELECT COUNT(*) codigo FROM productos WHERE codigo ='".$codigo."'";
$consulta =  mysqli_query($conexion, $sql);
$result = mysqli_fetch_assoc($consulta);

if($result['codigo'] > 0){
  // Generando respuesta error de correo repetido
    $response = array(
        'status' => 'error',
        'message' => 'El codigo '.$codigo.' ya existe en la base de datos'
    );
}else{
    $sql = "INSERT INTO productos (nombre, codigo, descripcion, costo, stock, archivo_n, archivo, status, eliminado)
        VALUES('$nombre', 
               '$codigo',
               '$descripcion',
               '$costo',
               '$stock',
               0,
               0,
               1,
               0)";



    if(mysqli_query($conexion, $sql)){

      $sqlID = "SELECT * FROM productos where codigo = '".$codigo."'";
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
        $dir        ="../archivos/productos/";
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