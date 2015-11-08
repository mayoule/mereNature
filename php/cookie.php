<?php include("doctype.php")?>
        <title>Nom de la page</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

		<!--Setting new cookie
		============================= -->
		<?php
			/*setcookie("lebgdu77",True,time()+60 * 60);*/
			setcookie("lebgdu78",False,time()+60 * 60);
			/*name is your cookie's name
			value is cookie's value
			$int is time of cookie expires*/
		?>

		<!--Getting Cookie
		=============================-->
		<?php
			echo $_COOKIE["lebgdu77"];
			echo $_COOKIE["lebgdu78"];
		?>


        </div>

        <?php include("footer.php");?>
    </body>
</html>