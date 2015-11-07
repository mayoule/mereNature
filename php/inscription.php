<?php include("doctype.php")?>
        <title>Inscription</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>



        <div id="main"><h1>Inscription</h1>
            <?php
                if(empty($_GET["nom"]) or empty($_GET["prenom"]) or empty($_GET['age'])){
            ?>
                <fieldset>
                    <form method='get' action=#>
                        <div >
                            <label for="nom">Nom</label>
                            <input type="nom"  id="nom" placeholder="Nom" name='nom' >
                        </div>
                       <div class="form-group">
                            <label for="prenom">Prenom</label>
                            <input type="prenom"  id="prenom" placeholder="Prenom" name='prenom'>
                            </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="age"  id="age" placeholder="Age" name='age'>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="adresse"  id="adresse" placeholder="Adresse" name='adresse'>
                            </div> 
                        <button type="submit"  value='Valider'>Submit</button>
                    </form>
                </fieldset>

            <?php
            }
                else{
                    remplirInscrit($pdo,$_GET['nom'],$_GET['prenom'],$_GET['age'],$_GET['adresse']);
                }
            ?>

        </div>

        <?php include("footer.php");?>
    </body>
</html>