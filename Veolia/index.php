<html>
	<head>
		<meta charset="utf-8">
		<title>Affichage des données</title>
		<link rel="shortcut icon" href="">
		<style>
	      /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map {
	        height: 100%;
	      }
	      /* Optional: Makes the sample page fill the window. */
	      html, body {
	        height: 80%;
	        margin: 0;
	        padding: 0;
	      }
	    </style>
	</head>
	<body>
		<div class="content">
			<H1 style="text-align:center; color:red;">Information des poubelles</H1>
			<div id="table"></div>
			<div id="map"></div>
			<div id="code_map"></div>
		</div>
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAB8uAAXIngnrtnDihmcbH5h_jyTOisj8k"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="function.js"></script>
	</body>
</html>