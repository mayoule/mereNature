<?php include("doctype.php")?>
        <title>Rejoindre un projet</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

		
		<?php
			$idp=$_GET['idp'];
			$idi=$_SESSION["id_in"];

			remplirInsPro($pdo,$idi,$idp);
			
		?>
			



        </div>

        <?php include("footer.php");?>
    </body>
</html>