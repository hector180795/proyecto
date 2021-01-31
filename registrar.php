<!DOCTYPE html>
<html>
<head>
	<title>Registrar actividad</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<?php

	include ("conexion.php");
	
	if (isset($_POST['registrar'])) {
		if ((strlen($_POST['actividad1']) >= 1 && strlen($_POST['actividad2']) >= 1 && strlen($_POST['actividad3']) >= 1 && strlen($_POST['actividad4']) >= 1 && strlen($_POST['actividad5']) >= 1)) {
			$actividad1 = trim($_POST['actividad1']);
			$actividad2 = trim($_POST['actividad2']);
			$actividad3 = trim($_POST['actividad3']);
			$actividad4 = trim($_POST['actividad4']);
			$actividad5 = trim($_POST['actividad5']);
			$consulta = "INSERT INTO HO_ACTIVIDADES(NOMBRE,ACTIVIDAD,STATUS,PORCENTAJE,OBSERVACION) VALUES('$actividad1','$actividad2','$actividad3','$actividad4','$actividad5')";
			$resultado = oci_parse($Oracle,$consulta);
			oci_execute($resultado);
			if ($resultado) {
				?>
					<h3 Class="ok">¡Ha registrado correctamente!</h3>
				<?php
					include ("conexion.php");
					$tabla = "SELECT * FROM HO_ACTIVIDADES";
				?>
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
			} else {
				?>
					<h3 class="bad">¡Ups ha ocurrido un error!</h3>
				<?php
			}oci_free_statement($resultado);
			oci_close($Oracle);
		}	else {
				?>
					<h3 Class="bad">¡Por favor complete los campos!</h3>
				<?php
		}
	?>	
		<form method="post" action="RegresarInicio.php">
			<input type="submit" name="regresar" value="Regresar">
		</form>
		<?php
	}
	?>
</body>
</html>



