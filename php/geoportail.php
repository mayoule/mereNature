
<html>
  <?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
    
    <style type="text/css"><!--/*--><![CDATA[/*><!--*/
    h1 {
        text-align:center;
        font-size:0.75em;
        font-style: italic;
        width:800px;
    }
    div#example_explain {
        margin:0px 0px 10px 0px;
        border: thin solid #595E61;
        width:800px;
        position:relative;
        left:0px;
        top:0px;
        text-align:justify;
        font-size: 0.75em;
        font-style: italic;
        color: #595E61;
    }
    form#gpLangChange {
        border:0px;
        margin:0px;
        padding:0px;
    }
    div#viewerDiv {
        width:800px;
        height:600px;
        background-color:white;
        background-image:url(http://api.ign.fr/geoportail/api/js/2.0.0/theme/geoportal/img/loading.gif);
        background-position:center center;
        background-repeat:no-repeat;
    }
    div#footer {
        font-size:x-small;
        text-align:center;
        width:800px;
    }
    div#footer a, div#footer a:link, div#footer a:visited, div#footer a:hover {
        text-decoration:none;
        color:black;
    }
    div#code a, div#code a:link, div#code a:visited, div#code a:hover {
        text-decoration:none;
        color: #595E61;
    }
     
   div#code {
        margin:0px 0px 10px 0px;
        width:800px;
        position:relative;
        left:0px;
        top:0px;
        text-align:justify;
        font-size: 0.75em;
        font-style: italic;
        
    }
    /*]]>*/--></style>
  </head>
  <body>
		<?php include("head.php"); ?>
		<?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php include("onglet.php"); ?>
		<?php include("acces_base/utilitaire.php"); ?>
		<?php $donnees = getXYFromInscrits($pdo); ?>
	
		<script>
	
function initMap() {
   
    // ----- Traduction
    translate();

    // ----- Options
    
    var options= {
        mode:'normal',
		territory:'FXX',
		proxy:'assets/proxy.php?url='
    };

    viewer= new Geoportal.Viewer.Default('viewerDiv', OpenLayers.Util.extend(
        options,
        // API keys configuration variable set by <Geoportal.GeoRMHandler.getConfig>
        // variable contenant la configuration des clefs API remplie par <Geoportal.GeoRMHandler.getConfig>
        window.gGEOPORTALRIGHTSMANAGEMENT===undefined? {'apiKey':APIkey} : gGEOPORTALRIGHTSMANAGEMENT)
    );
    if (!viewer) {
        // problem ...
        OpenLayers.Console.error(OpenLayers.i18n('new.instance.failed'));
        return;
    }
   
    // ----- Layers
    viewer.addGeoportalLayers(['ORTHOIMAGERY.ORTHOPHOTOS','GEOGRAPHICALGRIDSYSTEMS.MAPS']);	
    
	var latitude
	var longitude
	navigator.geolocation.getCurrentPosition(function (position) {
	latitude=position.coords.latitude; longitude=position.coords.longitude; });
    // ----- Autres
	viewer.getMap().setCenterAtLonLat(longitude,latitude,17);
	

		// create a map with default options in an element with the id "map1"
		var markers= new OpenLayers.Layer.Markers("Repères");
        viewer.getMap().addLayer(markers);
        var size= new OpenLayers.Size(100,100);
        var offset= new OpenLayers.Pixel(-(size.w/2), -(size.h/2));//centered
		
		
		
	<?php 
		foreach(array_keys($donnees) as $key)
		{
			$lon= $donnees[$key]["lon"] ;
			$lat= $donnees[$key]["lat"] ;
		
			echo "var ll= new OpenLayers.LonLat('".$lon."','".$lat."');";
			echo "ll.transform(OpenLayers.Projection.CRS84, viewer.getMap().getProjection());";
			echo "markers.addMarker(new OpenLayers.Marker(ll));";
		}
	?>	
}

</script>
	<div id="main">	
		<?php getXYFromInscrits($pdo) ?>
		<div id="viewerDiv"></div>
		<div id='code'><a href="Geoportail/js/geoportail.js" alt="quickstart" id="example_jscode" target="_blank"></a></div>
		<div id="footer"><a href="https://api.ign.fr/geoportail/document.do?doc=legal_mentions" id="legal" target="_blank"></a> - &copy;IGN 2008-2011</div>
	  
		<script type="text/javascript" src="http://api.ign.fr/geoportail/api/js/latest/GeoportalExtended.js"></script>
		<script type="text/javascript" src="Geoportail/js/utils.js"></script>     
		<script type="text/javascript" src="Geoportail/js/i18n/geoportail.js"></script>
		<script type="text/javascript" src="Geoportail/js/geoportail.js"></script>
		

	</div>
        <?php include("footer.php");?>
  </body>
</html>
