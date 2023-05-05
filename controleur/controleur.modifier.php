<?php
include("./modele/modele.anabase.php");


class Controleur_modifier
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
		$this->vue = "updateSession";
		$this->modele = new Modele_anabase();
		
	

	
	}

	public function todo_initialiser()
	{
		if(isset($_GET["idSession"])){
			$this->modele->deleteSession($_GET["idSession"]);
			echo "suppression réussie";
		}

		if(isset($_GET["idSessionM"])){
			$this->modele->getSessionById($_GET["idSessionM"]);
			
		}

		$this->data["value"] = $this->modele->getSession();

		

		
	}
	
	public function todo_Sauvegarder()
	{
		if (
			empty($this->post["nomSession"]) && empty($this->post["dateSession"])
			&& empty($this->post["heureSession"]) && empty($this->post["prixSession"])
		) {

			echo "Veuillez remplir tous les champs";
		}else {
			$this->data["value"] =
			$this->modele->updateSession($this->post["numSession"], $this->post["dateSession"], 
			$this->post["heureSession"], $this->post["prixSession"], $this->post["nomSession"]);
			$this->data["value"] = $this->modele->getSession();
			
		}
		//header("Location:/?controleur=modifier");
		
	}
	//$UneSession= getSession();
}


