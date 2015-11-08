<?php include("doctype.php")?>
        <title>Rejoindre un projet</title>
    
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("onglet.php"); ?>
        <?php include("acces_base/utilitaire.php"); ?>

		
		<?php

            if(empty($_GET["type"]) && empty($_GET["fond"]) && empty($_GET["ressource"])){
            	?>
            	<fieldset>
                    <form method='get' action=#>
                    	<div class="form-group">
                        	<input type="hidden" name="idp" value="<?php echo "".$_GET['idp']."" ?>"></input>
                        </div>
                        <div >
                            <label for="type">Type d'implication</label>
                            <select name="type">
							  <option>Je suis de bonne volonté</option>
							  <option>Je m'investis</option>
							  <option>J'ai une idée</option>
							</select>
                        </div>
						<div class="form-group">
						    <label class="sr-only" for="Fond">Fond (en euros)</label>
							    <div class="input-group">
							      <div class="input-group-addon">€</div>
							      	<input type="fond" class="form-control" id="Fond" placeholder="Fond" name="fond" value=0>
							      </div>
						     </div>
                        <div class="form-group">
                            <label for="ressource">Descritption ressources apportées</label>
                            <input type="ressource"  id="ressource" placeholder="Ressource" name='ressource'>
                        </div>
                        
                        <button type="submit"  value='Valider'>Submit</button>
                    </form>
                </fieldset>
                <?php }else{ 

					$idp=$_GET['idp'];
					$idi=$_SESSION["id_in"];

					remplirInsPro($pdo,$idi,$idp,$_GET["type"],$_GET["fond"],$_GET["ressource"]);
				}
			
			?>
			



        </div>

        <?php include("footer.php");?>
    </body>
</html>