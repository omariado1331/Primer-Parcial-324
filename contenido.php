<?php
include "cabecera.php";
session_start(); 
if (isset($_SESSION['usuario']))
{
	$nom=$_SESSION['usuario'];
	?>
	<?php 
	include 'conexion.php';
	$sql="SELECT nombre,color FROM usuario WHERE nombre like '$nom';";
	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);
	$color=$fila[1];
		// echo "aca".$fila[1];
	if (isset($_GET["color"])) {
		$color=$_GET["color"];
		$sql="UPDATE usuario SET color = '$color' WHERE usuario.nombre ='$nom';";
		$result=mysqli_query($conn,$sql);
	}
		//imagenes
	$archivo='';
	if($nom=='Vanessa'){
		$archivo='src="img/img3.jpg"';
	}elseif ($nom=='Alex') {
		$archivo='src="img/img2.jpg"';
	}elseif ($nom=='Omar Alejandro') {
		$archivo='src="img/img1.jpg"';
	}elseif ($nom=='Henry') {
		$archivo='src="img/img4.jpg"';
	}
	?>

	<body  class="cuerpo">
		<header style="background-color: <?php echo $color?> ;opacity: 0.8">
			<div class="perfil">
				<img <?php echo $archivo ?>>
				<?php echo '<h2>Usuario: '.$nom.'</h2>'?>
				<div style="margin-right: 40px;"><a href="cerrarsesion.php"><b style="color: #ffffff">Cerrar Sesion</b></a></div>
			</div>
		</header>
		<!-- <?php $color?> -->
		<div class="Contenido" style="background-color: <?php echo $color?> ">
			<h1>Selección de colores</h1>
			<p>Puedes escoger el color de tu portada</p>
			<form action="contenido.php" action="_GET">
				<select name="color" class="selec">
					<option disabled="">Selecciona un color</option>
					<option value="#581845">Lila</option>
					<option value="#900c3f">Guindo</option>
					<option value="#c70039">Rojo</option>
					<option value="#ff5733">Naranja</option>
					<option value="#ffc305">Amarillo</option>
					<option value="#8b4513">Cafe</option>
				</select>
				<input type="submit" name="Enviar Color">
			</form>
		</div>

		<div> 
			<p style="text-align: left; color: white;padding-left: 100px; padding-right: 100px">Adicione una tabla de notas por materia y cuente la cantidad de aprobados por departamento de manera que solo obtenga una sola fila de resultados con SQL (Dos posibles formas, una mediante el conteo y otra mediante función de la BD o SGBD).</p>
			<p style="text-align: left; color: white;padding-left: 100px; padding-right: 100px">Realice lo mismo con PHP</p>
			
			<?php 
			$sql="SELECT count(case when i.lugarnac like '01' then n.nota end) 'La Paz',
							count(case when i.lugarnac like '02' then n.nota end) 'Cochabamba',
						 	count(case when i.lugarnac like '03' then n.nota end) 'Santa Cruz',
						 	count(case when i.lugarnac like '04' then n.nota end) 'Beni',
						 	count(case when i.lugarnac like '05' then n.nota  end) 'Oruro',
						 	count(case when i.lugarnac like '06' then n.nota  end) 'Potosi',
						 	count(case when i.lugarnac like '07' then n.nota  end) 'Tarija',
						 	count(case when i.lugarnac like '08' then n.nota  end) 'Chuquisaca',
						 	count(case when i.lugarnac like '09' then n.nota  end) 'Pando'
			FROM identificador as i, notas as n
			where i.ci like n.ci
			and n.nota > 50";

			echo'<div  class="tablas">';
			$result=mysqli_query($conn,$sql);
			echo "<h3 style='color:white;'>Mediante conteo</h3>";
			echo '<table>';
			echo '<caption>Numero de aprobados por Departamento</caption>';
			echo "<tr>";
			echo "<td>La Paz</td><td>Cochabamba</td><td>Santa Cruz</td><td>Beni</td><td>Oruro</td><td>Potosi</td><td>Tarija</td><td>Chuquisaca<td>Pando</td>";
			echo "</tr>";
			echo "<tr>";
			while($fila=mysqli_fetch_array($result))
			{
				echo '<td>'.$fila["La Paz"].'</td><td>'.$fila["Cochabamba"].'</td><td>'.$fila["Santa Cruz"].'</td><td>'.$fila["Beni"].'</td><td>'.$fila["Oruro"].'</td><td>'.$fila["Potosi"].'</td><td>'.$fila["Tarija"].'</td><td>'.$fila["Chuquisaca"].'</td><td>'.$fila["Pando"].'</td>';
			}
			echo "</tr>";
			echo '</table>';




			$sql="SELECT count(a.lugarnac) cantidad,(a.lugarnac),(case 
			when a.lugarnac like '01' then 'La Paz'
			when a.lugarnac like '02' then 'Cochabamba'
			when a.lugarnac like '03' then 'Santa Cruz'
			when a.lugarnac like '04' then 'Beni'
			when a.lugarnac like '05' then 'Oruro'
			when a.lugarnac like '06' then 'Potosi'
			when a.lugarnac like '07' then 'Tarija'
			when a.lugarnac like '08' then 'Chuquisaca'
			when a.lugarnac like '09' then 'Pando'
			end) Departamento
			FROM (SELECT ci,lugarnac
			FROM identificador) as a, notas as n
			where a.ci like n.ci
			and n.nota > 50
			GROUP by a.lugarnac;";

			echo "<h3 style='color:white;'>Mediante funcion del SGBD</h3>";
			echo '<table>';
			echo"<caption>Aprobados por departamento</caption>";
			$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_row($result))
			{
				echo "<tr>";
				echo "<td>".$fila[0]."</td>";
				echo "<td>".$fila[1]."</td>";
				echo "<td>".$fila[2]."</td>";
				echo "</tr>";
				echo "<tr>";
			}
			echo "</table>";	

			$result=mysqli_query($conn,$sql);
			echo "<h3 style='color:white;'>Utilizando PHP</h3>";
			echo '<table>';
			echo "<caption>Aprobados por departamento</caption>";
			echo "<tr>";
			echo "<th>Departamento</th>";
			while($fila=mysqli_fetch_row($result))
			{
				echo "<td>".$fila[2]."</td>";
			}
			echo "</tr>";
			echo "<tr>";
			echo "<th>Nro Aprobados</th>";
			$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_row($result))
			{
				echo "<td>".$fila[0]."</td>";
			}
			echo "</tr>";
			echo "</table>";
			
			echo"</div>";
			?>
		</div>

	</body>
	</html>
<?php 
}else
{header('Location: principal.php');} ?>
</body>
</html>