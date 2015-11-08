<?php include("doctype.php")?>
        <title>Nom de la page</title>
    
    </head>
    <body>

        <?php include("utilitaire.php"); ?>



        <div id="main"><h1>Proposer Projet</h1>
            <p>test</p>
            <fieldset>
                <form method='get' action='envoi_test.php'>
                    <div >
                        <label for="nom">Nom</label>
                        <input type="nom"  id="nom" placeholder="Nom" name='nom' value='qsdf'>
                    </div>
                   <div class="form-group">
                        <label for="adresse">adresse</label>
                        <input type="adresse"  id="adresse" placeholder="adresse" name='adresse' value='qsdf'>
                        </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="description"  id="description" placeholder="description" name='description' value='qsdf'>
                    </div>
                    <div class="form-group">
                        <label for="fond_necessaires">fond necessaires</label>
                        <input type="fond_necessaires"  id="fond_necessaires" placeholder="fond_necessaires" name='fond_necessaires' value=5>
                    </div> 
                    <div class="form-group">
                        <label for="fond_actuels">fond actuels</label>
                        <input type="fond_actuels"  id="fond_actuels" placeholder="fond_actuels" name='fond_actuels' value=5>
                    </div>
                    <div class="form-group">
                        <label for="date_debut">date de debut</label>
                        <input type="date_debut"  id="date_debut" placeholder="date_debut" name='date_debut' value='03/11/1992'>
                    </div>
                    <div class="form-group">
                        <label for="chef_de_projet">chef de projet</label>
                        <input type="chef_de_projet"  id="chef_de_projet" placeholder="chef_de_projet" name='chef_de_projet' value='qsdf'>
                    </div>
                    <div class="form-group">
                        <label for="motCle">mots Clés : mot-clé1,mot-clé2</label>
                        <input type="motCle"  id="motCle" placeholder="motCle" name='motCle' value='qsdf'>
                    </div>
                    <div class="form-group">
                        <label for="competence">Compétences requises</label>
                        <input type="competence"  id="competence" placeholder="competence" name='competence' value='qsdf'>
                    </div>

                    <button type="submit"  value='Valider'>Submit</button>
                </form>
            </fieldset>

           

            </div>
            <?php   

               // $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('Jzan','Lui',42,'Paname hein');";
               // $pdo->query($sql);
             ?>
        

    </body>
</html>