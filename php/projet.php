<?php include("doctype.php")?>
        <title>Projets</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>
       
		<div id="main">
		<?php
			$idp=$_GET['idp'];
			$row=getProjetByID($pdo,$idp);
			echo "<table  class='table table-striped''>";
				echo "<tr>";
					echo "<td> Nom :</td><td>".$row['nom']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Adresse :</td><td> ".$row['adresse']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Description : </td><td>".$row['description']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Fonds necessaires :</td><td> ".$row['fond_necessaires']." €</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Fonds actuels : </td><td>".$row['fond_actuels']." €</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Date de début : </td><td> ".$row['date_debut']." </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Chef de projet :</td><td> ".$row['chef_de_projet']." </td>";
				echo "</tr>";
			echo "</table>";
		

		if (isset($_SESSION["login"])) {
			
			echo '<a class="btn btn-primary " href="rejoindreProjet.php?idp='.$idp.' role="button">Rejoindre le projet !</a>';
			 } ?>
		</div>
			
        <?php include("footer.php");?>
    </body>
</html>