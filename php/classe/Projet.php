<?php
class projet {
	public $id_pro = null;
	public $nom = '';
	public $adresse = '';
	public $description = '';
	public $fond_necessaires = 0;
	public $fond_actuels = 0;
	public $date_debut = NULL;
	public $chef_de_projet = '';
	public $motCle=array();
	public $membre=array();
	public $competence=array();


/*


  id_pro int(10) NOT NULL AUTO_INCREMENT,
  nom varchar(60) NOT NULL,
  adresse varchar(160) COLLATE utf8_unicode_ci DEFAULT '' NOT NULL,
  description text,
  fond_necessaires float,
  fond_actuels float,
  date_debut date NOT NULL,
  chef_de_projet varchar(60) NOT NULL,



*/




	/**
		CONSTRUCTION :
	**/



    public function __construct() {

    }








	public function hydrate($donnees) {
		try {
			foreach ($donnees as $attribut => $valeur) {
				$methode = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
				if (is_callable(array($this, $methode))) {
					$this->$methode($valeur);
				}
			}
			return true;
		} catch(Exception $e) {
			return false;
		}
	}
	
	/**
		SETTERS :
	**/
	public function setId($id_pro) {
		$this->id_pro = $id_pro;
	}
	public function setNom($nom) {
		$this->nom = $nom;
	}
	public function setDescription($description) {
		$this->description = $description;
	}
	public function setFondNecessaire($fond_necessaires) {
		$this->fond_necessaires = $fond_necessaires;
	}
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}
	public function setFondActuel($fond_actuels) {
		$this->fond_actuels = $fond_actuels;
	}
	public function setDateDebut($date_debut) {
		$this->date_debut = $date_debut;
	}
	public function setChefProjet($chef_de_projet) {
		$this->chef_de_projet = $chef_de_projet;
	}
	public function setMotCle($motCle) {
		$this->motCle = $motCle;
	}
	public function setMembre($membre) {
		$this->membre = $membre;
	}
	public function setCompetence($competence) {
		$this->competence = $competence;
	}	



	/**
		GETTERS :
	**/
	public function getId() {
		return intval($this->id_pro);
	}
	public function getNom() {
		return $this->nom;
	}
	public function getDescription() {
		return $this->description;
	}
	public function getFondNecessaire() {
		return intval($this->fond_necessaires);
	}
	public function getAdresse() {
		return $this->adresse;
	}
	public function getFondActuel() {
		return $this->fond_actuels;
	}
	public function getDateDebut() {
		return $this->date_debut;
	}
	public function getChefProjet() {
		return $this->chef_de_projet;
	}
	public function getMotCle() {
		return $this->motCle;
	}
	public function getMembre() {
		return $this->membre;
	}
	public function getCompetence() {
		return $this->competence;
	}























	/**
		FONCTIONS :
	**/
	public function getParrains() {
		$sql = 'SELECT parrain FROM relations WHERE fillot = ' . $this->ide;
		$request = $this->pdo->query($sql);
		$parrains = array();
		while ($donnees = $request->fetch()) {
			$parrain = new Eleve($this->pdo);
			$parrain->charger($donnees['parrain']);
			$parrains[] = $parrain;
		}
		return $parrains;
	}
	


	public function ajout_competence() {
		$sql = 'SELECT parrain FROM relations WHERE fillot = ' . $this->ide;
		$request = $this->pdo->query($sql);
		$parrains = array();
		while ($donnees = $request->fetch()) {
			$parrain = new Eleve($this->pdo);
			$parrain->charger($donnees['parrain']);
			$parrains[] = $parrain;
		}
		return $parrains;
	}












































	/**
		AFFICHAGE / EXPORTATION :
	**/
	public function getJSON() {
		$tags = array('ide', 'nom', 'prenom', 'annee');
		$json = array();
		foreach ($tags as $tag) {
			$methode = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $tag)));
			//echo $methode;
			//if (is_callable(array($this, $methode))) {
				$json[$tag] = $this->$tag;
			//}
		}
		return json_encode($json);
	}
	public function getNode($lienCible = true) {
		$html = '';
		$html .= '<div class="popupNode">';
		$html .= '<h2>' . $this->getPrenom() . ' ' . $this->getNom() . '</h2>';
		$html .= '<p class="promo">Promo d\'entrée : ' . $this->getAnnee() . '</p>';
		$html .= '<p class="img"><img src="' . $this->getSrc() . '" alt="photo" /></p>';
		if ($lienCible) {$html .= '<p class="bougerCentre" data-id="' . $this->getIde() . '">Centrer l\'arbre sur ' . $this->getPrenom() . '</p>';}
		$html .= '</div>';
		return array(
			'id' => $this->getIde(),
			'shape' => 'circularImage',
			'label' => $this->getPrenom(),
			'popup' => $html,
			//'annee' => $this->getAnnee(),
			'level' => $this->getAnnee(),
			'image' => $this->getSrc()
			//"id": 36,  level:10,shape: 'circularImage', "label": "Augustin",  "annee": 2015,  "image": "http://localhost/arbre/img/id_0.jpg"
		);
	}
	public function getEdgdesParrains($parrains = false) {
		if ($parrains === false) {$parrains = $this->getParrains();}
		$edges = array();
		foreach ($parrains as $parrain) {
			$edges[] = array(
				'from' => $parrain->getIde(),
				'to' => $this->getIde()
			);
		}
		return $edges;
	}
	public function getEdgdesFillots($fillots = false) {
		if ($fillots === false) {$fillots = $this->getFillots();}
		$edges = array();
		foreach ($fillots as $fillot) {
			$edges[] = array(
				'from' => $this->getIde(),
				'to' => $fillot->getIde()
			);
		}
		return $edges;
	}
	public function getAllDataParrains($parrains = false) {
		if ($parrains === false) {$parrains = $this->getParrains();}
		$data = array(
			'nodes' => array($this->getNode()),
			'edges' => $this->getEdgdesParrains($parrains)
		);
		foreach ($parrains as $parrain) {
			$tps = $parrain->getAllDataParrains();
			$data['edges'] = array_merge($data['edges'], $tps['edges']);
			$data['nodes'] = array_merge($data['nodes'], $tps['nodes']);
		}
		return $data;
	}
	public function getAllDataFillots($fillots = false) {
		if ($fillots === false) {$fillots = $this->getFillots();}
		$data = array(
			'nodes' => array($this->getNode()),
			'edges' => $this->getEdgdesFillots($fillots)
		);
		foreach ($fillots as $fillot) {
			$tps = $fillot->getAllDataFillots();
			$data['edges'] = array_merge($data['edges'], $tps['edges']);
			$data['nodes'] = array_merge($data['nodes'], $tps['nodes']);
		}
		return $data;
	}
	public static function insert($pdo, $nom, $prenom, $annee) {
		$src = 'img/id_0.jpg';
		$sql = "INSERT INTO eleves (prenom, nom, annee, src) VALUES ('$prenom', '$nom', $annee, '$src')";
		$pdo->query($sql);
		return $pdo->lastInsertId();
	}
}
?>