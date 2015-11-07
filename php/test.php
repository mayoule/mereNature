<?php include("doctype.php")?>
        <title>Nom de la page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>
        

		
		

        <div id="main"><h1>Test</h1>
            <?php     
                //$donnees=array('5','4','5',4,5,'4');
                $sql = 'SELECT * FROM inscrits where  id_in=(SELECT max(id_in) FROM inscrits)';
                $pdo->query($sql);
             ?>
        </div>
        <?php include("footer.php");?>
    </body>
</html>