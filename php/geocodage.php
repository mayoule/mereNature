<?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php include("onglet.php"); ?>
		<?php include("acces_base/utilitaire.php"); ?>
		
		

        <div id="main">
		<?php 
		
$coords=getXmlCoordsFromAdress("22 rue rambuteau, 75003 PARIS, france");
echo $coords['status']." ".$coords['lat']." ".$coords['lon'];
?>
        </div>
        <?php include("footer.php");?>
    </body>
</html>