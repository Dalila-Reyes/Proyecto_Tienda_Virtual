<?php

//administradores_elimina.php
include "conexion.php";


//Recibe variables
$id = $_REQUEST ['id'];
if ($id   > 0){
    $sql = "DELETE FROM pedidos_productos WHERE id= $id";
    $res =$conexion-> query($sql);
}

 ?>