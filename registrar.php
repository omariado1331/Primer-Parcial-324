<?php
include "cabecera.php";
?>

<hr style="border-style: inset;">

<h2 style="color: white">Registro de Datos</h2>
<form action="controladorregistrar.php" method="GET">
	<table align="center">
		<tr>
			<td ><input type="text" name="ci" placeholder="CI" value=""></td>
		</tr>
		<tr>
			<td><input type="text" name="nombre" placeholder="Nombres" value=""></td>
		</tr>
		<tr>
			<td><input type="text" name="apeP" placeholder="A. Paterno" value=""></td>
		</tr>
		<tr>
			<td><input type="text" name="apeM" placeholder="A. Materno" value=""></td>
		</tr>
		<tr>
			<td><input type="text" name="fechanaci" placeholder="AAAA-MM-DD" value=""></td>
		</tr>
		<tr>
			<td><input type="password" name="contraseña" placeholder="Contraseña" value=""></td>
		</tr>
		<tr>
		<td colspan="2"><!-- <input type="text" name="lugarnaci" placeholder="Lugar de nacimiento" value=""> -->
			<form >
				<select name="lugarnaci" class="selec">
					<option disabled="">Lugar de nacimiento</option>
					<option value="01"> La Paz</option>
					<option value="02">Cochabamba</option>
					<option value="03">Santa Cruz</option>
					<option value="04">Beni</option>
					<option value="05">Oruro</option>
					<option value="06">Potosi</option>
					<option value="07">Tarija</option>
					<option value="08">Chuquisaca</option>
					<option value="09">Pando</option>
				</select>
			</form>
			</td>
		</tr>

	</table>
	<input type="submit" value="Registrar">
</form>
	<?php  if (!empty($mensaje)){ ?>
		<div>
			<?php echo $mensaje; ?>
		</div>
 	<?php } ?>
<p style="color: white">¿Ya tienes Cuenta?...
<a href="iniciasesion.php">Inicia Sesión</a>
</p>