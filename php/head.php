<div id="head">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <img src="./image/logo_cloud_fini.png" alt="Ce qui nous unis" width=25px>
          <a class="navbar-brand" href="index.php"><img src="./image/bandeau_meme_couleur.png" alt="Ce qui nous unis" width=70px></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="./index.php">Accueil</a></li>
            <li><a href="./cree_ta_nature.php">Crée ta nature</a></li>
			
			<li><a href="./apropos.php">A propos</a></li>
      <li><a href="./contact.php">Contact</a></li>
      <?php
      if (isset($_SESSION["login"])) {
      
        
        echo '<li><a href="./leaflet.php">Carte</a></li>';
        echo '<li><a href="./profil.php">Mon profil</a></li>';
       } ?>
			

        <?php 
      if (!isset($_SESSION["login"])) {
      ?>
        <li><a href="./seConnecter.php">Se Connecter</a></li>
      <?php
      } else {
      ?>
        <li><a href="./seDeconnecter.php">Se Deconnecter</a></li>
      <?php
      
      }
      ?>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<div id="fix-for-navbar-fixed-top-spacing" style="height: 42px;">&nbsp;</div>
</div>