<div id="code_map">
	<?php
		$monPDO = new PDO('mysql:host=127.0.0.1;dbname=Veolia;charset=utf8','root','');
		$mabdd = $monPDO->query('SELECT * FROM Etat');
		$i=0;
		while($mesdonnee = $mabdd->fetch())
		{	
			$ID[$i] = $mesdonnee['Identification'];
			$long[$i] = $mesdonnee['Longitude'];
			$lat[$i] = $mesdonnee['Latitude'];
			$Poids[$i] = $mesdonnee['Poids'];
			$Remplissage[$i] = $mesdonnee['% de remplissage'];
			$Ouverture[$i] = $mesdonnee["Frequence d'utilisation"];
			$i++;
		}
		echo "Nombre de poubelle : ".$i;
	?>
	<script>

		var point = 0;
		var j = 0;
		var taille = <?php echo $i ?>;
		var lat = new Array();
		var long = new Array();
		var id = new Array();
		var poids = new Array();
		var remplissage = new Array();
		var ouverture = new Array();
		var tableauMarqueurs = new Array();
		var contentString = new Array();
		
		//Insertion des données recuperer en base php dans des tableau javascript
		<?php for($j=0; $j<$i;$j++){ ?>
		id[point] = <?php echo $ID[$j]; ?>;
		poids[point] = <?php echo $Poids[$j]; ?>;
		remplissage[point] = <?php echo $Remplissage[$j]; ?>;
		ouverture[point] = <?php echo $Ouverture[$j]; ?>;
		lat[point] = <?php echo $lat[$j]; ?>;
		long[point] = <?php echo $long[$j]; ?>;
		point++;
		<?php } ?>

		//Creation de tableaux d'infoview et point LatLng
		for(point = 0; point < taille; point++)
		{
			tableauMarqueurs[point]  = new google.maps.LatLng(lat[point], long[point]);

			contentString[point] = '<div>' +
			'ID : ' +
			id[point] +
			'<br/>' +
			'Poids : ' +
			poids[point] +
			' kg' +
			'<br/>' +
			'Remplissage : ' +
			remplissage[point] +
			' %' +
			'<br/>' +
			'Frequentation : ' +
			ouverture[point] +
			' par semaine' +
			'<br/>' +
			'</div>';
		}
		
		var optionsCarte = {
			zoom: 8,
			center: new google.maps.LatLng( lat[1], long[1])
		}

		//Creation d'une carte Google Map
		var maCarte = new google.maps.Map( document.getElementById("map"), optionsCarte );

		//Creation d'une bulle d'info de marker
		var infowindow = new google.maps.InfoWindow();  

		//Creation d'une zone de marker
		var zoneMarqueurs = new google.maps.LatLngBounds();

		//Creation des markers 
		for( var i = 0, I = tableauMarqueurs.length; i < I; i++ ) {

			var optionsMarqueur = {
				map: maCarte,
				position: tableauMarqueurs[i]	
			};
			//Creation du marker
			var marqueur = new google.maps.Marker( optionsMarqueur );
			zoneMarqueurs.extend( marqueur.getPosition() );

			//On recupere les info de chaque marker et on les insere dans la bulle d'info
			var content = contentString[i];

	 		marqueur.addListener('click', (function(marqueur,content) {  
	           return function() {  
	 			infowindow.setContent(content);
			    infowindow.open(maCarte, marqueur);
			}  
	         })(marqueur,content));
		}
		maCarte.fitBounds( zoneMarqueurs );
			
	</script>
</div>