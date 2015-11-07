<?php

$link = mysqli_connect("u2.ensg.eu", "trombino","", "trombino");
if (!$link) {
     die('Erreur de connexion');
}else{
     echo 'Succès... ';
};

?>