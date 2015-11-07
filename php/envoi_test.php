<?php include("doctype.php")?>
        <title>Nom de la page</title>
         </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>
        <?php include("classe/Inscrit.php"); ?>

		
	
        <?php echo "<h2>".$_GET['prenom']."</h2>"; ?>
   
            <?php   

              $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('".$_GET['nom']."','".$_GET['prenom']."',".$_GET['age'].",'".$_GET['adresse']."');";
              $pdo->query($sql);

              // $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('Jzan','Lui',42,'Paname hein');";
               // $pdo->query($sql);
             ?>
        
        <?php include("footer.php");?>
    </body>
</html>