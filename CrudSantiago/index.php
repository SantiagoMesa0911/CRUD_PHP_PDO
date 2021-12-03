<?php

include_once "model/conexion.php";
$sentencia = $bd->query("select * from citas");
$citas = $sentencia->fetchAll(PDO::FETCH_OBJ);
/* print_r( $citas);
 */
?>
<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

</head>

<body>
	<div class="container-fluid bg-dark text-light text-center">
		<div class="row">
			<div class="col-md">
				<header class="py-3 ">
					<h3>
						CRUD DE CITAS
					</h3>
				</header>
			</div>
		</div>
	</div>

	<div class="container-fluir	mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<!-- INICION ALERTA DE FORMULARIOS -->

				<?php
				if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
				?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error!</strong> Rellena todos los campos.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				}
				?>

				<?php
				if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'Registrado') {
				?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Registrado!</strong> Se agregaron los datos.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				}
				?>



				<?php
				if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
				?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error!</strong> Vuelve a intentar.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				}
				?>



				<?php
				if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
				?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Cambiado!</strong> Los datos fueron actualizados.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				}
				?>

				<?php
				if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'Eliminado') {
				?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Eliminado!</strong> Los datos fueron borrados.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				<?php
				}
				?>

				<!-- FIN ALERTA DE  FORMULARIOS -->
				<div class="card">
					<div class="card-header">
						LISTA DE CITAS
					</div>
					<div class="p-4">
						<table class="table aling-middle">
							<thead>
								<tr>
									<th>#</th>
									<th>FECHA CITA</th>
									<th scope="col" colspan="2">DESCRIPCION</th>
									<th scope="col" colspan="2">NOMBRE CITA</th>
									<th scope="col" colspan="2">CONCLUSIONES</th>
									<th scope="col" colspan="2">OPCIONES</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($citas as $datos) {
								?>
									<tr>
										<td scope="row"><?= $datos->Id ?></td>
										<td><?= $datos->Fecha_cita ?></td>
										<td colspan="2"><?= $datos->Descripcion ?></td>
										<td colspan="2"><?= $datos->Nombre_cita ?></td>
										<td colspan="2"><?= $datos->Conclusiones ?></td>
										<td ><a class="text-primary" href="editar.php?Id=<?= $datos->Id ?>"><i class="bi bi-pencil-square"></i></a></td>
										<td><a onclick="return confirm('ESTAS SEGURO DE ELIMINAR ESTE DATO ?');" class="text-danger" href="eliminar.php?Id=<?= $datos->Id ?>"><i class="bi bi-trash"></i></a></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						INGRESO DE DATOS
					</div>
				</div>
				<form class="p-4" action="registrar.php" method="post">
					<div class="mb-3">
						<label for="" class="form-label">FECHA CITA</label>
						<input type="datetime-local" name="Fecha_cita" id="" class="form-control" autofocus required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">DESCRIPCION</label>
						<input type="text" class="form-control" name="descripcion" placeholder="Ingrese su descripcion" autofocus required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">NOMBRE CITA</label>
						<input type="text" name="Nombre_cita" id="" class="form-control" placeholder="Ingrese el nombre de la cita" autofocus required>
					</div>
					<div class="mb-3">
						<label for="" class="form-label">CONCLUSIONES</label>
						<input type="text" name="conclusiones" id="" class="form-control" placeholder="Escriba las conclusiones" autofocus required>
					</div>
					<div class="d-grid">
						<input type="hidden" name="oculto" value="1">
						<input type="submit" class="btn btn-warning" value="Registrar">
					</div>
				</form>
			</div>
		</div>
	</div>


	<footer class="container-fluid bg-dark text-light fixed-bottom">
		<div class="row">
			<div class="col-md py-3 text-center">
				DESARROLLADO POR SANTIAGO MESA
			</div>
		</div>
	</footer>



	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
</body>

</html>