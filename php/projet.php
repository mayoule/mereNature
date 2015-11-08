<?php include("doctype.php")?>
        <title>Projets</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

		
		<?php
			$idp=$_GET['idp'];
			$row=getProjetByID($pdo,$idp);
			echo "<p> Nom : ".$row['nom']."</p>";
			echo "<p> Adresse : ".$row['adresse']."</p>";
			echo "<p> Description : ".$row['description']."</p>";
			echo "<p> Fonds necessaires : ".$row['fond_necessaires']." €</p>";
			echo "<p> Fonds actuels : ".$row['fond_actuels']." €</p>";
			echo "<p> Date de début : ".$row['date_debut']." </p>";
			echo "<p> Chef de projet : ".$row['chef_de_projet']." </p>";
		

		if (isset($_SESSION["login"])) {
			
			echo	"<li><a href='rejoindreProjet.php?idp=".$idp."'>Rejoindre le projet !</a></li>";
			 } ?>
			



        </div>

        <?php include("footer.php");?>
    </body>
</html>