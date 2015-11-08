<?php include("doctype.php")?>
        <title>Rejoindre un groupe</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

		
		<?php
			$idg=$_GET['idg'];
			$idi=$_SESSION["id_in"];

			remplirInsGro($pdo,$idi,$idg);
			
		?>
			



        </div>

        <?php include("footer.php");?>
    </body>
</html>