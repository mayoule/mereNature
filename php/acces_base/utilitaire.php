<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=mernat', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch(Exception $e) {
	echo 'Echec de la connexion à la base de données';
	exit();
}
function __autoload($class_name) {
    include 'php/class/' . $class_name . '.php';
}

function remplirInscrit($pdo,$nom,$prenom,$age,$adresse) {
    $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('".$nom."','".$prenom."',".$age.",'".$adresse."');";
    $pdo->query($sql);
    echo"<p>Inscritpion réussi</p>";
}





 function CreerProjet($pdo,$nom,$adresse,$description,$fond_necessaires,$fond_actuels,$date_debut,$chef_de_projet,$motCle,$skill_useful) {	

 	echo "on rentre ds la fonction";
 	//recuperation des donnes du formulaire

	$motCle = preg_split("/[\s,]+/", $_GET['motCle']);
	$skill_useful=preg_split("/[\s,]+/", $_GET['competence']);


	$sql = "INSERT INTO projets (nom, adresse, description, fond_necessaires, fond_actuels , date_debut, chef_de_projet) VALUES ('".$nom."','".$adresse."','".$description."',".$fond_necessaires.",".$fond_actuels.",'".$date_debut."','".$chef_de_projet."')";
	$request = $pdo->query($sql);
	$donnees = $request->fetch();


	//identifiant de la competence
	$sth = $pdo->prepare("INSERT INTO projets (nom, adresse, description, fond_necessaires, fond_actuels , date_debut, chef_de_projet) VALUES ('".$nom."','".$adresse."','".$description."',".$fond_necessaires.",".$fond_actuels.",'".$date_debut."','".$chef_de_projet."')");
	$sth ->execute();
	$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
	$result= $stmt->fetch(PDO::FETCH_ASSOC);
	$id_pro= $result['LAST_INSERT_ID()'];

	//MOT CLES DU PROJET
	//on parcourt le tableau des mots cle
	foreach ($motCle as $attribut) {
		//mots cles existants ?
		$exist=$pdo->prepare("SELECT * FROM competence WHERE nom='".$attribut."'");
		$exist->execute();
		$result1= $exist->fetch(PDO::FETCH_ASSOC);
		$result3=$result1['LAST_INSERT_ID()'];


		//si la competence n existe pas			
		if ($result3 == false){

			//modif competence
			$sql2 = $pdo->prepare("INSERT INTO competences (nom)  VALUES ('".$attribut."')");
			$sql2->execute();

			$stmt = $pdo->query("SELECT LAST_INSERT_ID() ");
			$result2= $stmt->fetch(PDO::FETCH_ASSOC);
			$id_m= $result2['LAST_INSERT_ID()'];

			
		}
		$sql3 = $pdo->prepare("INSERT INTO mots_projets (idm, idp)  VALUES (".$id_m.", ".$id_pro.")");	
		$sql3->execute();
	}

	//COMPETENCES DU PROJETs
	//on parcourt le tableau des competences
	foreach ($skill_useful as $attribut) {
		//mots cles existants ?
		echo $attribut;

		$exist=$pdo->prepare("SELECT * FROM competence WHERE nom='".$attribut."'");
		$exist->execute();
		$result1= $exist->fetch(PDO::FETCH_ASSOC);
		$result3=$result1['LAST_INSERT_ID()'];
		echo $result3;





		//si la competence n existe pas			
		if ($result3 == false){
			//modif competence
			echo "c est nul";
			$sql4 = $pdo->prepare("INSERT INTO competences (nom)  VALUES ('".$attribut."')");
			$sql4->execute();

			$stmt = $pdo->query("SELECT LAST_INSERT_ID() ");
			$result2= $stmt->fetch(PDO::FETCH_ASSOC);
			$id_m1= $result2['LAST_INSERT_ID()'];
			echo $id_m1;


		}
		$sql3 = $pdo->prepare("INSERT INTO competences_projets (idc, idp)  VALUES (".$id_m1.", ".$id_pro.")");	
		$sql3->execute();		
	}	

}

?>