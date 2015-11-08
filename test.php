<?php include("doctype.php")?>
        <title>Nom de la page</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>



        <div id="main"><h1>Test</h1>
            <p>test</p>
            <fieldset>
                <form method='get' action='envoi_test.php'>
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


            

            </div>
            <?php   

               // $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('Jzan','Lui',42,'Paname hein');";
               // $pdo->query($sql);
             ?>
        
        <?php include("footer.php");?>
    </body>
</html>