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
?>