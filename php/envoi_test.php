<?php include("doctype.php")?>
        <title>Nom de la page</title>
         </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>
        <?php include("classe/Inscrit.php"); ?>

		
	
        <?php

          $donnees = array($_GET['nom'],$_GET['adresse'],$_GET['description'],$_GET['fond_necessaires'],$_GET['fond_actuels'],$_GET['date_debut'],$_GET['chef_de_projet']);

          $nom=$_GET['nom'];
          $adresse=$_GET['adresse'];
          $description=$_GET['description'];
          $fond_necessaires=$_GET['fond_necessaires'];
          $fond_actuels=$_GET['fond_actuels'];
          $date_debut=$_GET['date_debut'];
          $chef_de_projet=$_GET['chef_de_projet'];





          //$motCle = array preg_split( ',' , $_GET['motCle'],$limit = -1 [,$flags = 0 ]] );
          $motCle = preg_split("/[\s,]+/", $_GET['motCle']);
          //echo "<h2>".$motCle[0]."</h2>";
          $skill_useful=preg_split("/[\s,]+/", $_GET['competence']);
          CreerProjet($pdo,$nom,$adresse,$description,$fond_necessaires,$fond_actuels,$date_debut,$chef_de_projet,$motCle,$skill_useful);



         ?>
   
            <?php   

              //$sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('".$_GET['nom']."','".$_GET['prenom']."',".$_GET['age'].",'".$_GET['adresse']."');";
              //$pdo->query($sql);

              // $sql = "INSERT INTO inscrits (nom,prenom,age,adresse) VALUES ('Jzan','Lui',42,'Paname hein');";
               // $pdo->query($sql);
             ?>
        
        <?php include("footer.php");?>
    </body>
</html>