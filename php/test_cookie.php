<?php include("doctype.php")?>
        <title>Nom de la page</title>
    
    </head>
    <body>
		
        <?php if ($_COOKIE["lebgdu78"]){
         include("menu.php"); 
		 include("onglet.php"); 
         include("acces_base/utilitaire.php"); 

        }else{
        echo "<p>Hey !</p>";
    	}; ?>
        
		
        </div>

        <?php include("footer.php");?>
    </body>
</html>