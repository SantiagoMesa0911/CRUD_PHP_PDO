<?php

print_r($_POST);
if(!isset($_POST['Id'])){
	header('location:index.php?mensaje=error');
}

require_once 'model/conexion.php';
$Id = $_POST['Id'];
$Fecha_cita = $_POST['Fecha_cita'];
$descripcion = $_POST['descripcion'];
$Nombre_cita = $_POST['Nombre_cita'];
$conclusiones = $_POST['conclusiones'];

$sentencia = $bd->prepare("UPDATE citas SET  Fecha_cita = ?,descripcion = ?,Nombre_cita = ?,conclusiones = ? where Id = ?;");
$resultado = $sentencia->execute([$Fecha_cita,$descripcion,$Nombre_cita,$conclusiones,$Id]);

if ($resultado) {
	header('location:index.php?mensaje=editado');

} else {
	header('location:index.php?mensaje=error');
exit();
}
