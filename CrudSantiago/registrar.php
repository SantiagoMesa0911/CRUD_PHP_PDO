<?php
//print_r($_POST);
if (
	empty($_POST["oculto"]) ||
	empty($_POST["Fecha_cita"]) ||
	empty($_POST["descripcion"]) ||
	empty($_POST["Nombre_cita"]) ||
	empty($_POST["conclusiones"])
) {
	header('location:index.php?mensaje=falta');
	exit();
}

include_once 'model/conexion.php';
$Fecha_cita = $_POST["Fecha_cita"];
$descripcion = $_POST["descripcion"];
$Nombre_cita = $_POST["Nombre_cita"];
$conclusiones = $_POST["conclusiones"];

$sentencia = $bd->prepare("INSERT INTO CITAS(Fecha_cita,descripcion,Nombre_cita,conclusiones) VALUES(?,?,?,?);");
$resultado = $sentencia->execute([$Fecha_cita, $descripcion, $Nombre_cita, $conclusiones]);


if ($resultado === TRUE) {
	header('location:index.php?mensaje=Registrado');
} else {
	header('location:index.php?mensaje=error');
	exit();
}
