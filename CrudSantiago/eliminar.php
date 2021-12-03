<?php

if(!isset($_GET['Id'])){
	header('location:index.php?mensaje=error');
	exit();
}

require_once 'model/conexion.php';
$Id=$_GET['Id'];

$sentencia = $bd->prepare(" delete from citas where Id=?;");
$resultado = $sentencia->execute([$Id]);

if ($resultado === true) {
	header('location:index.php?mensaje=Eliminado');
} else {
	header('location:index.php?mensaje=error');
	exit();
}



?>