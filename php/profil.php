<?php include("doctype.php")?>
        <title>Nouvelle Page
        </title>
    </head>
    <body>
		
        <?php include("head.php"); ?>
        <?php include("menu.php"); ?>
		<?php include("pub.php"); ?>
		<?php include("acces_base/utilitaire.php"); ?>
		<?php
		if (isset($_GET['id_in'])){
			$id_in=$_GET['id_in'];
		}
		else{
			$id_in=$_SESSION['id_in'];
		}
		
		
		$rowProjets=rechercheProjetsDunInscrit($pdo,$id_in);
		$rowIdentiteInformation=rechercheInscritByID($pdo,$id_in);
		$rowIdentiteCompetences=rechercheCompetencesDunInscrit($pdo,$id_in);
		?>
		
        <div id="main">
		<br>
		<fieldset class="scheduler-border">
		<legend class="scheduler-border">Identité</legend>
		 <div class="control-group">
		<label class="control-label input-label" for="startTime">Nom : </label><?php echo $rowIdentiteInformation['nom'] ?>
		<label class="control-label input-label" for="startTime">Prénom : </label><?php echo $rowIdentiteInformation["prenom"]?>
		</div>
		</fieldset>
		<br>
		<fieldset>
		<legend>Information Personnelle</legend>
		Age : <?php echo $rowIdentiteInformation["age"]?>
		Adresse : <?php echo $rowIdentiteInformation["adresse"]?>
		</fieldset>
		<br>
		<fieldset>
		<legend>Les projets auquels je participe : </legend>
		Nom du projet : <?php echo $rowProjets["nom"]?> <br/>
		<?php if (!isset($_GET['id_in'])) {?>
		 <a href="form_proj.php"><button type="button" class="btn btn-success">Ajouter un projet</button></a>
			<?php
		}?>
		</fieldset>
		<br>
		<fieldset>
		<legend>Mes compétences : </legend>
		<p>Mes compétences actuelles : <?php echo $rowIdentiteCompetences["nom"]?></p>
		<br/>
		<?php if (!isset($_GET['id_in'])) {?>
		 <a href="ajouterCompetence.php"><button type="button" class="btn btn-success">Ajouter une compétence à mon profil</button></a>
			<?php
		}?>
		</fieldset>
		<br>
        </div>
        <?php include("footer.php");?>
    </body>
</html>