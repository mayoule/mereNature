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

function getProjetByID($pdo,$idp) {
    $stmt = $pdo->prepare("SELECT * FROM projets where id_pro= ? ");
	if ($stmt->execute(array($idp))) {
		$row = $stmt->fetch();
		return $row;
	  }
	}

function remplirInsPro($pdo,$idi,$idp) {
    $sql = "INSERT INTO inscrits_projets (idi,idp) VALUES (".$idi.",".$idp.");";
    $pdo->query($sql);
    echo"<p>Bienvenue sur le projet !</p>";
}

function remplirInsGro($pdo,$idi,$idg) {
    $sql = "INSERT INTO inscrits_groupes (idi,idg) VALUES (".$idi.",".$idg.");";
    $pdo->query($sql);
    echo"<p>Bienvenue dans le groupe !</p>";
}

?>