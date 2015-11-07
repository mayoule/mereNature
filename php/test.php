<?php include("doctype.php")?>
        <title>Nom de la page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>
        <?php include("classe/Inscrit.php"); ?>

		
		

        <div id="main"><h1>Test</h1>
            <?php     
                $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('Jzan','Lui',42,'Paname hein');";
                $pdo->query($sql);
             ?>
        </div>
        <?php include("footer.php");?>
    </body>
</html>