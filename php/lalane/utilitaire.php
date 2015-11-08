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

function remplirInscrit($pdo,$nom,$prenom,$age,$adresse) {
    $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('".$nom."','".$prenom."',".$age.",'".$adresse."');";
    $pdo->query($sql);
    echo"<p>Inscritpion réussi</p>";
}





 function CreerProjet($pdo,$donnees,$motCle,$skill_useful) {	

 	echo "on rentre ds la fonction";
 	//recuperation des donnes du formulaire
	


	$sql = "INSERT INTO projets(`nom`, `adresse`, `description`, `fond_necessaires`, `fond_actuels`, `date_debut`, `chef_de_projet`) VALUES ('".$donnees[0]."','".$donnees[1]."','".$donnees[2]."',".$donnees[3].",".$donnees[4].",".$donnees[5].",'".$donnees[6]."');";	
	$id_pro = 'SELECT * FROM projets where  id_pro=(SELECT max(id_pro) FROM projets)';
	
	//MOT CLES DU PROJET
	//on parcourt le tableau des mots cles
	
}

?>