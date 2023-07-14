<?php

include "conexion.php";


//Recibe variables
$id = $_REQUEST ['id'];

if ($id   > 0){
    $sql = "UPDATE  banners  SET eliminado = 1 WHERE id= $id";
    $res =$conexion-> query($sql);
}

 ?>