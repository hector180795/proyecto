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
		} else {
			?>
				<h3 class="bad">¡Ups ha ocurrido un error!</h3>
			<?php
		}
	}	else {
			?>
				<h3 Class="bad">¡Por favor complete los campos!</h3>
			<?php
	}
	oci_free_statement($resultado);
	oci_close($Oracle);
}
?>