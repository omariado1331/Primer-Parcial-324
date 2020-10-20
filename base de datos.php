<?php
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