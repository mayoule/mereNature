<?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php //include("onglet.php"); ?>
		<?php include("acces_base/utilitaire.php"); ?>
		
		

        <div id="main">
		<?php
                if(empty($_GET["nom"])){
            ?>
		<br>
		<fieldset>
		<legend>Ajouter une compétence</legend>
                    <form method='get' action=#>
                        <div >
                            <label for="nom">Nom</label>
                            <input type="nom"  id="nom" placeholder="Nom" name='nom' >
                        </div>
                        <button type="submit"  value='Valider'>Valider</button>
                    </form>
		</fieldset>
		<?php
            }
                else{
                    ajoutCompetence($pdo,$_GET['nom']);
                }
            ?>
        </div>
        <?php include("footer.php");?>
    </body>
</html>