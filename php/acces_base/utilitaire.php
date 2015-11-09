<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=ima_jam', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch(Exception $e) {
	echo 'Echec de la connexion à la base de données';
	exit();
}

function remplirInscrit($pdo,$nom,$prenom,$age,$adresse,$login,$pass) {
    $sql = "INSERT INTO inscrits (nom,prenom,age,adresse,login,pass) VALUES ('".$nom."','".$prenom."',".$age.",'".$adresse."','".$login."','".$pass."');";
    $pdo->query($sql);
    echo"<p>Inscritpion réussi</p>";
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

function remplirInsPro($pdo,$idi,$idp,$type,$fond,$ressource) {
    $sql = "INSERT INTO inscrits_projets (idi,idp,type,fond,ressource) VALUES (".$idi.",".$idp.",'".$type."',".$fond.",'".$ressource."');";
    $pdo->query($sql);
    echo"<p>Bienvenue sur le projet !</p>";
}

function remplirInsGro($pdo,$idi,$idg) {
    $sql = "INSERT INTO inscrits_groupes (idi,idg) VALUES (".$idi.",".$idg.");";
    $pdo->query($sql);
    echo"<p>Bienvenue dans le groupe !</p>";
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
 $coords['lat'] = $xml->result->geometry->location->lat;
 $coords['lon'] = $xml->result->geometry->location->lng;
}
return $coords;
}



function getXYFromInscrits($pdo)
{
	$stmt = $pdo-> prepare("SELECT * FROM inscrits");
	$RESULTAT=array();
	if ($stmt->execute(array())) {
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$RESULTAT[$row['login']]=getXmlCoordsFromAdress($row['adresse']);
			
			
	  }
	}
	//print_r($RESULTAT);
	//print("\n");
	
	return $RESULTAT;
}






 function CreerProjet($pdo,$nom,$adresse,$description,$fond_necessaires,$fond_actuels,$date_debut,$chef_de_projet,$motCle,$skill_useful) {	

 	
 	//recuperation des donnes du formulaire

	$motCle = preg_split("/[\s,]+/", $_GET['motCle']);
	$skill_useful=preg_split("/[\s,]+/", $_GET['competence']);


	//$sql = "INSERT INTO projets (nom, adresse, description, fond_necessaires, fond_actuels , date_debut, chef_de_projet) VALUES ('".$nom."','".$adresse."','".$description."',".$fond_necessaires.",".$fond_actuels.",'".$date_debut."','".$chef_de_projet."')";
	//$request = $pdo->query($sql);
	//$donnees = $request->fetch();


	//identifiant de la competence
	$sth = $pdo->prepare("INSERT INTO projets (nom, adresse, description, fond_necessaires, fond_actuels , date_debut, chef_de_projet) VALUES ('".$nom."','".$adresse."','".$description."',".$fond_necessaires.",".$fond_actuels.",'".$date_debut."','".$chef_de_projet."')");
	$sth ->execute();
	$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
	$result= $stmt->fetch(PDO::FETCH_ASSOC);
	$id_pro= $result['LAST_INSERT_ID()'];
	echo "<p>Le projet a été ajouté</p>";

	//MOT CLES DU PROJET
	//on parcourt le tableau des mots cle
	foreach ($motCle as $attribut) {
		//mots cles existants ?
		

		$exist=$pdo->prepare("SELECT * FROM competences WHERE nom='".$attribut."'");
		$exist->execute();
		$result1= $exist->fetch(PDO::FETCH_ASSOC);
		//$result3=$result1['LAST_INSERT_ID()'];


		//si la competence n existe pas			
		if ($result1){
			
			$id_m = $result1['id_com'];
		}else
			{
			
			//modif competence
			$sql2 = $pdo->prepare("INSERT INTO competences (nom)  VALUES ('".$attribut."')");
			$sql2->execute();

			$stmt = $pdo->query("SELECT LAST_INSERT_ID() ");
			$result3= $stmt->fetch(PDO::FETCH_ASSOC);
			$id_m= $result3['LAST_INSERT_ID()'];

			
		}
		$sql3 = $pdo->prepare("INSERT INTO mots_projets (idm, idp)  VALUES (".$id_m.", ".$id_pro.")");	
		$sql3->execute();
	}

	//COMPETENCES DU PROJETs
	//on parcourt le tableau des competences
	foreach ($skill_useful as $attribut) {
		//mots cles existants ?
		

		$exist=$pdo->prepare("SELECT * FROM competences WHERE nom='".$attribut."'");
		$exist->execute();
		$result5= $exist->fetch(PDO::FETCH_ASSOC);
		//$result3=$result1['LAST_INSERT_ID()'];
		//echo $result3;





		//si la competence n existe pas			
		if ($result5){
			
			$id_m1 = $result5['id_com'];
		}else
			{
			//modif competence
			
			$sql4 = $pdo->prepare("INSERT INTO competences (nom)  VALUES ('".$attribut."')");
			$sql4->execute();

			$stmt = $pdo->query("SELECT LAST_INSERT_ID() ");
			$result2= $stmt->fetch(PDO::FETCH_ASSOC);
			$id_m1= $result2['LAST_INSERT_ID()'];
		


		}
		$sql3 = $pdo->prepare("INSERT INTO competences_projets (idc, idp)  VALUES (".$id_m1.", ".$id_pro.")");	
		$sql3->execute();		
	}	

}


function CreerGroupe($pdo,$nom,$adresse,$description,$createur,$motCle) {	

 	echo "on rentre ds la fonction";
 	//recuperation des donnes du formulaire

	$motCle = preg_split("/[\s,]+/", $_GET['motCle']);


	//$sql = "INSERT INTO projets (nom, adresse, description, fond_necessaires, fond_actuels , date_debut, chef_de_projet) VALUES ('".$nom."','".$adresse."','".$description."',".$fond_necessaires.",".$fond_actuels.",'".$date_debut."','".$chef_de_projet."')";
	//$request = $pdo->query($sql);
	//$donnees = $request->fetch();


	//identifiant de la competence
	$sth = $pdo->prepare("INSERT INTO groupes (nom, adresse, description, createur) VALUES ('".$nom."','".$adresse."','".$description."','".$createur."')");
	$sth ->execute();
	$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
	$result= $stmt->fetch(PDO::FETCH_ASSOC);
	$id_pro= $result['LAST_INSERT_ID()'];

	//MOT CLES DU PROJET
	//on parcourt le tableau des mots cle
	foreach ($motCle as $attribut) {
		//mots cles existants ?
		

		$exist=$pdo->prepare("SELECT * FROM competences WHERE nom='".$attribut."'");
		$exist->execute();
		$result1= $exist->fetch(PDO::FETCH_ASSOC);
		//$result3=$result1['LAST_INSERT_ID()'];


		//si la competence n existe pas			
		if ($result1){
			
			$id_m = $result1['id_com'];
		}else
			{
			
			//modif competence
			$sql2 = $pdo->prepare("INSERT INTO competences (nom)  VALUES ('".$attribut."')");
			$sql2->execute();

			$stmt = $pdo->query("SELECT LAST_INSERT_ID() ");
			$result3= $stmt->fetch(PDO::FETCH_ASSOC);
			$id_m= $result3['LAST_INSERT_ID()'];

			
		}
		$sql3 = $pdo->prepare("INSERT INTO competences_groupes (idc, idg)  VALUES (".$id_m.", ".$id_pro.")");	
		$sql3->execute();
	}
}


function getXYFromProjet($pdo)
{
	$stmt = $pdo-> prepare("SELECT * FROM projets");
	$RESULTAT=array();
	if ($stmt->execute(array())) {
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$RESULTAT[$row['id_pro']]=getXmlCoordsFromAdress($row['adresse']);
			
			
	  }
	}
	//print_r($RESULTAT);
	//print("\n");
	
	return $RESULTAT;
}

?>