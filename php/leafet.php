<?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
		<link rel="stylesheet" type="text/css" href="leaflet/leaflet.css" />
<script type="text/javascript" src="leaflet/leaflet.js"></script>
<script type="text/javascript" src="leaflet/leafletembed.js"></script>
<style>#map{width:25%;heigth:25%}</style>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php include("onglet.php"); ?>
		
		<div id="map"></div>
<script>initmap();</script>
        <div id="main">
		JE METS LE TEXTE QUE JE VEUX RAJOUTER ICI
        </div>
        <?php include("footer.php");?>
    </body>
</html>