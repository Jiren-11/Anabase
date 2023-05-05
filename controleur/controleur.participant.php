<?php
include("./modele/modele.anabase.php");
class Controleur_participant
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
		$this->vue = "participant";
		$this->modele = new Modele_anabase();
			
	}

	public function todo_initialiser()
	{
		if (isset($_GET['idSuppr'])){
            $this->modele->deleteParticpationSession($_GET['idSuppr']);
			$this->data["liste"] = $this->modele->getCongressiste();
        }
		$this->data["liste"] = $this->modele->getCongressiste();
		$this->data["value"] = $this->modele->getSession();
		

		
	}

	public function todo_enregistrer()
	{
		$this->modele->addCongressisteSession($this->post["congressiste"], $this->post["session"]);
		$this->data["liste"] = $this->modele->getCongressiste();
	
	}

	public function todo_rechercher()
	{
		$this->data["listeCongressisteParticipe"] =$this->modele->getSessionByCongressiste($this->post['congressiste2']);
		$this->data["liste"] = $this->modele->getCongressiste();
		$this->data["value"] = $this->modele->getSession();

	
	}
}
