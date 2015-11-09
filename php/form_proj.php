<?php include("doctype.php")?>
        <title>Projet</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

        <?php
                if(empty($_GET["nom"]) or empty($_GET["chef_de_projet"])){
            ?>

        <div id="main"><h1>Proposer Projet</h1>
            <fieldset>
                <form method='get' action=#>
                    <div >
                        <label for="nom">Nom</label>
                        <input type="nom"  id="nom" placeholder="Nom" name='nom' >
                    </div>
                   <div class="form-group">
                        <label for="adresse">adresse</label>
                        <input type="adresse"  id="adresse" placeholder="adresse" name='adresse' >
                        </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="description"  id="description" placeholder="description" name='description' >
                    </div>
                    <div class="form-group">
                        <label for="fond_necessaires">fond necessaires</label>
                        <input type="fond_necessaires"  id="fond_necessaires" placeholder="fond_necessaires" name='fond_necessaires'>
                    </div> 
                    <div class="form-group">
                        <label for="fond_actuels">fond actuels</label>
                        <input type="fond_actuels"  id="fond_actuels" placeholder="fond_actuels" name='fond_actuels'>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">date de debut</label>
                        <input type="date_debut"  id="date_debut" placeholder="date_debut" name='date_debut' >
                    </div>
                    <div class="form-group">
                        <label for="chef_de_projet">chef de projet</label>
                        <input type="chef_de_projet"  id="chef_de_projet" placeholder="chef_de_projet" name='chef_de_projet' >
                    </div>
                    <div class="form-group">
                        <label for="motCle">mots Clés : mot-clé1,mot-clé2</label>
                        <input type="motCle"  id="motCle" placeholder="motCle" name='motCle' >
                    </div>
                    <div class="form-group">
                        <label for="competence">Compétences requises</label>
                        <input type="competence"  id="competence" placeholder="competence" name='competence' >
                    </div>

                    <button type="submit"  value='Valider'>Submit</button>
                </form>
            </fieldset>
            <?php
            }
                else{
                    CreerProjet($pdo,$_GET['nom'],$_GET['adresse'],$_GET['description'],$_GET['fond_necessaires'],$_GET['fond_actuels'],$_GET['date_debut'],$_GET['chef_de_projet'],$_GET['motCle'],$_GET['competence']);
                }
            ?>


           

            </div>
            <?php   

               // $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('Jzan','Lui',42,'Paname hein');";
               // $pdo->query($sql);
             ?>
        
        <?php include("footer.php");?>
    </body>
</html>