<?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php include("onglet.php"); ?>
		<?php include("acces_base/utilitaire.php"); ?>
		

        <div id="main">
		<h1>Connexion</h1>
            <?php
                if(empty($_GET["login"]) or empty($_GET["pass"])){
            ?>
                <fieldset>
                    <form method='get' action=#>
                        <div >
                            <label for="login">Identifiant</label>
                            <input type="login"  id="login" placeholder="Login" name='login' >
                        </div>
                       <div class="form-group">
                            <label for="pass">Mot de passe</label>
                            <input type="password"  id="pass" placeholder="pass" name='pass'>
						</div>
                        <button type="submit"  value='Valider'>Se connecter</button>
                    </form>
                </fieldset>
				

            <?php
            }
                else{
                    seConnecter($pdo,$_GET['login'],$_GET['pass']);
                }
            ?>
			<a href="./inscription.php"><button type="button" class="btn btn-success">M'inscrire</button></a>
        </div>
        <?php include("footer.php");?>
    </body>
</html>