<?php
include("acces_base/utilitaire.php");
$donnees = getXYFromInscrits($pdo);
$donneesProjet = getXYFromProjet($pdo);

$data=array("donnees"=>$donnees,"donnees_projet"=>$donneesProjet);

echo json_encode($data);
/*
foreach(array_keys($donnees) as $key)
{
	$lon= $donnees[$key]["lon"] ;
	$lat= $donnees[$key]["lat"] ;

	echo "var ll= new OpenLayers.LonLat('".$lon."','".$lat."');";
	echo "ll.transform(OpenLayers.Projection.CRS84, viewer.getMap().getProjection());";
	echo "markers.addMarker(new OpenLayers.Marker(ll));";
}

foreach(array_keys($donneesProjet) as $key)
{
	$lon= $donneesProjet[$key]["lon"] ;
	$lat= $donneesProjet[$key]["lat"] ;

	echo "var ll= new OpenLayers.LonLat('".$lon."','".$lat."');";
	echo "ll.transform(OpenLayers.Projection.CRS84, viewer.getMap().getProjection());";
	echo "markers.addMarker(new OpenLayers.Marker(ll));";
}
*/
 
 
 ?>