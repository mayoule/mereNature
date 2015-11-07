<?php
class Groupe {
	public $pdo = null;
	public $id_gr = 0;
	public $nom = 0;
	public $adresse = 0;
	public $description = ''; 
  	public $createur = '';
	/**
		CONSTRUCTION :
	**/
	public function __construct($pdo) {
		$this->pdo = $pdo;
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
	public function charger($ide) {
		if ($ide != 0) {
			$sql = 'SELECT * FROM groupes WHERE id_gr = ' . $ide;
			$request = $this->pdo->query($sql);
			if ($request != false) {
				$donnees = $request->fetch();
				return $this->hydrate($donnees);
			}
		}
		return false;
	}
	/**
		SETTERS :
	**/
	public function setId_gr($id_gr) {
		$this->id_gr = $id_gr;
	}
	public function setNom($nom) {
		$this->nom = $nom;
	}
	public function setAdresse($adresse) {
		$this->adresse = $adresse;
	}
	public function setDescription($description) {
		$this->description = $description;
	}
	public function setCreateur($createur) {
		$this->createur = $createur;
	}
	/**
		GETTERS :
	**/
	public function getIde() {
		return intval($this->ide);
	}
	public function getNom() {
		return $this->nom;
	}
	public function getAdresse() {
		return $this->adresse;
	}
	public function getDescription() {
		return $this->descritption;
	}
	public function getCreateur() {
		return $this->createur;
	}
	/**
		FONCTIONS :
	**/
	
	/**
		AFFICHAGE / EXPORTATION :
	**/

?>
