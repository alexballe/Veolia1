<div id="table">
	<table border>
		<thead>
			<tr>
				<td>Identification</td>
				<td>Poids</td>
				<td>% de remplissage</td>
				<td>Frequence d'utilisation</td>
				<td>Longitude</td>
				<td>Latitude</td>
			</tr>
		</thead>
		<tbody>
		<?php 
			$monPDO = new PDO('mysql:host=127.0.0.1;dbname=Veolia;charset=utf8','root','');
			$mabdd = $monPDO->query('SELECT * FROM Etat');
			while($mesdonnee = $mabdd->fetch())
			{
				echo '<tr><td>'.$mesdonnee['Identification'].'</td>';
				echo '<td>'.$mesdonnee['Poids'].'</td>';
				echo '<td>'.$mesdonnee['% de remplissage'].'</td>';
				echo '<td>'.$mesdonnee["Frequence d'utilisation"].'</td>';
				echo '<td>'.$mesdonnee['Longitude'].'</td>';
				echo '<td>'.$mesdonnee['Latitude'].'</td></tr>';
			}
		?>
		</tbody>
	</table>
</div>