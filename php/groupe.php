<?php include("doctype.php")?>
        <title>Groupes</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

		
		<?php
			$idg=$_GET['idg'];
			$row=getGroupeByID($pdo,$idg);
			echo "<table>";
				echo "<tr>";
					echo "<td> Nom : </td><td>".$row['nom']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Adresse :</td><td> ".$row['adresse']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Description : </td><td>".$row['description']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Createur : </td><td>".$row['createur']." </td>";
				echo "</tr>";
			echo "</table>";

		if (isset($_SESSION["login"])) {
			
			echo	"<li><a href='rejoindreGroupe.php?idg=".$idg."'>Rejoindre le groupe !</a></li>";
			 } ?>
			


        </div>

        <?php include("footer.php");?>
    </body>
</html>