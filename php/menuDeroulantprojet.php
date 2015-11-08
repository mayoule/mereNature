<?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
    </head>

    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php include("onglet.php"); ?>

		    <!-- Bootstrap core CSS -->
        <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
         <!-- Customize CSS -->
        <link href="./style_personnalise.css" rel="stylesheet">
		

        <div id="main">
		

        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=ima_jam', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch(Exception $e) {
            echo 'Echec de la connexion à la base de données';
            exit();
        }

        //$requete = mysql_query("SELECT * FROM projets ");



        $sth = $pdo->prepare("SELECT nom,description,id_pro FROM projets");
        $sth->execute();

        $result = $sth->fetchAll();
        //var_dump($result[1]);
        //echo sizeof($result);
        //echo sizeof($result);
        ////echo sizeof($result[1]);



        echo "<table>";
        echo "<th>Nom Description</th>";
         for ($i=0; $i < sizeof($result) ; $i++) { 
            echo "<tr>";          
            for ($j=0; $j < 2; $j++) { 
                if($j == 1){
                    echo "<td><a href='contact.php?idp=".$result[$i][2]."'>".$result[$i][$j]."</a></td>";  
                }else{
                    echo "<td>".$result[$i][$j]."</td>";  
                }
                  
            }
            echo "</tr>";
        }
        echo "</table>";





        //foreach ($skill_useful as $attribut) {


        


    ?>

   

    




        




     
        









        </div>
        <?php include("footer.php");?>
    </body>
</html>