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
			echo "<p> Nom : ".$row['nom']."</p>";
			echo "<p> Adresse : ".$row['adresse']."</p>";
			echo "<p> Description : ".$row['description']."</p>";
			echo "<p> Createur : ".$row['createur']." </p>";
		?>



        </div>

        <?php include("footer.php");?>
    </body>
</html>