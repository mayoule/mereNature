<?php
class Inscrit {
	public $id = null;
	public $nom = 0;
	public $prenom = '';
	public $age = '';
	public $adresse = 0;
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
	public function setId($id) {
		$this->id = $id;
	}
	public function setNom($nom) {
		$this->nom = $nom;
	}
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}
	public function setAge($age) {
		$this->age = $age;
	}
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}



	/**
		GETTERS :
	**/
	public function getId() {
		return intval($this->ide);
	}
	public function getNom() {
		return $this->nom;
	}
	public function getPrenom() {
		return $this->prenom;
	}
	public function getAge() {
		return intval($this->annee);
	}
	public function getAdresse() {
		return $this->src;
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