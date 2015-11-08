<?php include("doctype.php")?>
        <title>Carte
        </title>
		 
 <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<style>#map{height:500px}</style>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		
		<div id="map"></div>
        <div id="main">
		
        </div>
        <?php include("footer.php");?>
		<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
		<script src="leaflet/leafletembed.js"></script>
    </body>
</html>