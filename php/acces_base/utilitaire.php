<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=ima_jam', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch(Exception $e) {
	echo 'Echec de la connexion à la base de données';
	exit();
}
function __autoload($class_name) {
    include 'php/class/' . $class_name . '.php';
}

function remplirInscrit($pdo,$nom,$prenom,$age,$adresse,$login,$pass) {
    $sql = "INSERT INTO inscrits (nom,prenom,age,adresse,login,pass) VALUES ('".$nom."','".$prenom."',".$age.",'".$adresse."','".$login."','".$pass."');";
    $pdo->query($sql);
    echo"<p>Inscritpion réussi</p>";
}

function seConnecter($pdo,$login,$pass) {
	
	$stmt = $pdo->prepare("SELECT * FROM inscrits where login = ? and pass= ?");
	if ($stmt->execute(array($login,$pass))) {
		while ($row = $stmt->fetch()) {
			// dans ce cas, tout est ok, on peut démarrer notre session
			// on la démarre :)
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}

			// on enregistre les paramètres de notre visiteur comme variables de session 
			foreach($row as $key => $elem) {
				if (!is_numeric($key)){
					$_SESSION[$key] = $elem;}
		}
	  }
	}
	}

function getProjetByID($pdo,$idp) {
    $stmt = $pdo->prepare("SELECT * FROM projets where id_pro= ? ");
	if ($stmt->execute(array($idp))) {
		$row = $stmt->fetch();
		return $row;
	  }
	}

function getGroupeByID($pdo,$idg) {
    $stmt = $pdo->prepare("SELECT * FROM groupes where id_gr= ? ");
	if ($stmt->execute(array($idg))) {
		$row = $stmt->fetch();
		return $row;
	  }
	}
	
function rechercheProjetsDunInscrit($pdo,$id_in) {
    $stmt = $pdo->prepare("SELECT * FROM projets where id_pro IN (SELECT DISTINCT idp FROM inscrits_projets WHERE idi= ?) ");
	if ($stmt->execute(array($id_in))) {
		$row = $stmt->fetch();
		return $row;
	  }
	}
	

function rechercheInscritByID($pdo,$id_in) {
    $stmt = $pdo->prepare("SELECT * FROM inscrits where id_in = ?");
	if ($stmt->execute(array($id_in))) {
		$row = $stmt->fetch();
		return $row;
	  }
	}
	
	
function rechercheCompetencesDunInscrit($pdo,$id_in) {
    $stmt = $pdo->prepare("SELECT * FROM competences where id_com IN (SELECT DISTINCT idc FROM inscrits_competences WHERE idi= ?) ");
	if ($stmt->execute(array($id_in))) {
		$row = $stmt->fetch();
		return $row;
	  }
	}

function ajoutCompetence($pdo,$nom) {
    $sql = "INSERT INTO competences (nom) VALUES ('".$nom."');";
    $pdo->query($sql);
	$sql = "INSERT INTO inscrits_competences (idi,idc) VALUES (".$_SESSION["id_in"].", (SELECT id_com FROM competences WHERE nom='".$nom."'));";
	$pdo->query($sql);
    echo"<br><p>Inscritpion réussi</p>";	
}

function getXmlCoordsFromAdress($address)
{
$coords=array();
$base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
// ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
$request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
$xml = simplexml_load_file($request_url) or die("url not loading");
$coords['lat']=$coords['lon']='';
$coords['status'] = $xml->status ;
if($coords['status']=='OK')
{
 $coords['lat'] = $xml->result->geometry->location->lat ;
 $coords['lon'] = $xml->result->geometry->location->lng ;
}
return $coords;
}



function getXYFromInscrits($pdo)
{
	$stmt = $pdo-> prepare("SELECT * FROM inscrits");
	if ($stmt->execute(array())) {
		while ($row = $stmt->fetch()) {
			$RESULTAT[$row["login"]]=$row;
	  }
	}
	
	
	return $RESULTAT;
}

?>