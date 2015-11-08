<?php include("doctype.php")?>
        <title>Nom de la page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php //include("onglet.php"); ?>
		
		
		
        <div id="main">
		<img  class="img-responsive" src="image/slogan.png" alt="Crée ta nature. La nature citoyenne" width=250em>
		<h1>Premier titre </h1>
            <p>Mon premier paragraphe
            </p>
            <h2>Premier sous titre
            </h2>
            <p> Paragraphe du premier sous titre
            </p>
            <h2> Second sous titre
            </h2>
            <p> Paragraphe du second sous titre
            </p>
            <h2> Troisieme sous titre
            </h2>
            <p> Paragraphe du troisieme sous titre
            </p>
            <p>Ajout d'un <strong>tableau</strong>
            </p>
            <table>
                <tr>
                    <td>Cellule 1 </td>
                    <td>Cellule 2</td>
                    <td> Cellule 3 </td>
                </tr>
                <tr>
                    <td>ligne 2.1</td>
                    <td>ligne 2.2</td>
                    <td>derniere cellule</td>
                </tr>
            </table>
            <p>Tout le code ici permet de tester les
                <em>feuilles de style css
                </em>
            </p>
			<img  src="image/logo_cloud_fini.png" alt="Crée ta nature. La nature citoyenne" width=250em>
			
            <a href="http://www.google.fr" title="LienGoogle">page google</a>
            <p>Un autre lien est present dans la page
            </p>
        </div>
        <?php include("footer.php");?>
    </body>
</html>