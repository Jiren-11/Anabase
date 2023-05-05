<?php
include("./modele/modele.anabase.php");

class Controleur_session
{
	// --- champs de base du controleur
	public $vue = ""; //vue appelée par le controleur

	public $message = "";
	public $erreur = "";

	public $data; // le tableau des données de la vue

	public $modele; // nom du modele

	public $m; // objet modele

	public $post; // renseigné par index

	// --- Constructeur
	public function __construct()
	{
		// déclarer la vue
		$this->vue = "session";
		$this->modele = new Modele_anabase();
	}

	public function todo_initialiser()
	{
		$this->post["nomSession"] = "";
		$this->post["numSession"] = "";
		$this->post["dateSession"] = "";
		$this->post["heureSession"] = "";
		$this->post["prixSession"] = "";
		
	}

	public function todo_enregistrer()
	{
		if (
			empty($this->post["nomSession"]) && empty($this->post["numSession"]) && empty($this->post["dateSession"])
			&& empty($this->post["heureSession"]) && empty($this->post["prixSession"])
		) {

			echo "Veuillez remplir tous les champs";
		} else {
			$this->data["liste"] = $this->modele->addsession(null, $this->post["dateSession"], $this->post["heureSession"], $this->post["prixSession"], $this->post["nomSession"]);
			echo "<div class='alert alert-success erreur' role='alert'> Insertion réussie </div>";
			
		}
	}


}

