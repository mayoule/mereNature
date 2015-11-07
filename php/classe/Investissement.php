 <?php
class Investissement {
	public $pdo = null;
	public $type = '';
	public $fond = 0;
	public $ressource = '';

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function setParrain($type) {
		$this->type = $type;
	}

	public function setFond($fond) {
		$this->fond = $fond;
	}

	public function setRessource($ressource) {
		$this->ressource = $ressource;
	}

?>