<!doctype html>
<html lang="en">

<head>
	<title>Title</title>
	<!--  meta tags -->
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
	<?php
	if (!isset($_GET['Id'])) {
		header('location:index.php?mensaje=error');
		exit();
	}

	require_once 'model/conexion.php';
	$Id = $_GET['Id'];

	$sentencia = $bd->prepare("select * from citas where Id = ?;");
	$sentencia->execute([$Id]);
	$persona = $sentencia->fetch(PDO::FETCH_OBJ);
/* 	print_r($persona); */

	?>
	<div class="container-fluir	mt-5">
		<div class="row justify-content-center">
			<div class="col-md-4">

				<div class="card">
					<div class="card-header">
						EDITAR DE DATOS
					</div>
				</div>
				<form class="p-4" action="editarProceso.php" method="post">
					<div class="mb-3">
						<label for="" class="form-label">FECHA CITA</label>
						<input type="datetime-local" name="Fecha_cita" id="" Required class="form-control" value="<?php echo $persona->Fecha_cita ?>">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">DESCRIPCION</label>
						<input type="text" class="form-control" name="descripcion" Required placeholder="Ingrese su descripcion" value="<?php echo $persona->Descripcion ?>">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">NOMBRE CITA</label>
						<input type="text" name="Nombre_cita" id="" class="form-control" Required placeholder="Ingrese el nombre de la cita" value="<?php echo $persona->Nombre_cita ?>">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">CONCLUSIONES</label>
						<input type="text" name="conclusiones" id="" class="form-control" Required placeholder="Escriba las conclusiones" value="<?php echo $persona->Conclusiones ?>">
					</div>
					<div class="d-grid">
						<input type="hidden" name="Id" value="<?= $persona->Id ?>">
						<input type="submit" class="btn btn-warning" value="Editar">
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