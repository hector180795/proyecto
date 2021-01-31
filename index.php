<?php
	include ("conexion.php");
	$tabla = "SELECT * FROM HO_ACTIVIDADES";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar actividad</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form method="post">
		<h1>Actividades</h1>
		<input type="text" name="actividad1" placeholder="actividad1">
		<input type="text" name="actividad2" placeholder="actividad2">
		<input type="text" name="actividad3" placeholder="actividad3">
		<input type="text" name="actividad4" placeholder="actividad4">
		<input type="text" name="actividad5" placeholder="actividad5">
		<input type="submit" name="registrar">
	</form>
	<div class="container-table">
		<div class="table__title">Registro de Actividades</div>
		<div class="table__header">Nombre</div>
		<div class="table__header">Actividad</div>
		<div class="table__header">Status</div>
		<div class="table__header">Porcentaje</div>
		<div class="table__header">Observacion</div>
		<?php $resultado1 = oci_parse($Oracle,$tabla);
		oci_execute($resultado1);
		while($row=oci_fetch_assoc($resultado1)) { ?>
			<div class="table__item"><?php echo $row["NOMBRE"];?></div>
			<div class="table__item"><?php echo $row["ACTIVIDAD"];?></div>
			<div class="table__item"><?php echo $row["STATUS"];?></div>
			<div class="table__item"><?php echo $row["PORCENTAJE"];?></div>
			<div class="table__item"><?php echo $row["OBSERVACION"];?></div>
		<?php } oci_free_statement($resultado1);
		oci_close($Oracle); 
		?>
	</div>
		<?php
		include("registrar.php");
		?>
</body>
</html>