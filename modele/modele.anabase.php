<?php
class Modele_anabase
{
	private $conn;
	private $var;
	public function __construct()
	{
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO(
				"mysql:host=$serveur;dbname=$bd",
				$login,
				$mdp,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
			);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}

	public function getListeNom()
	{
		$req = $this->conn->prepare("select * from session");

		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}


	// COUCOU C NOAH

	//Inserer une nouvelle session 
	function addsession($num, $date, $heure, $prix, $nom)
	{


		$req = $this->conn->prepare("INSERT INTO `session` VALUES (:num_s, :date_s, :heure_s, :prix_s, :nom_s )");
		$req->bindValue(':num_s', $num);
		$req->bindValue(':date_s', $date);
		$req->bindValue(':heure_s', $heure);
		$req->bindValue(':prix_s', $prix);
		$req->bindValue(':nom_s', $nom);

		$req->execute();
	}

	//Modifier une session 
	function updateSession($num, $date, $heure, $prix, $nom)
	{

		$req = $this->conn->prepare("UPDATE `session` SET date_session=:dateSession, 
		HEURE_SESSION =:heureSession, prix_session=:prixSession, 
		NOM_SESSION=:nomSession WHERE num_session=:numSession");

		$req->bindValue('dateSession', $date);
		$req->bindValue('heureSession', $heure);
		$req->bindValue('prixSession', $prix);
		$req->bindValue('nomSession', $nom);
		$req->bindValue('numSession', $num);

		$req->execute();
	}

	//Supprimer une session 
	function deleteSession($num)
	{

		$req = $this->conn->prepare("DELETE from `session` WHERE NUM_SESSION = :num");
		$req->bindValue(':num', $num);
		$req->execute();
	}

	//Ajout des congressiste


	function addCongressisteSession($numCongressiste, $numSession)
	{

		try {
			$req = $this->conn->prepare("INSERT INTO `participation_session` VALUES (:num_C, :num_S)");
			$req->bindValue(':num_C', $numCongressiste);
			$req->bindValue(':num_S', $numSession);
			$req->execute();
		} catch (PDOException $e) {
			echo "
		<div class='alert alert-danger erreur' role='alert'> Erreur ! Vous êtes déjà inscrit à cette session </div>";
			die();
		}
	}

	//récupération des données de la table session
	public function getSession()
	{
		$req = $this->conn->prepare("select * from session");

		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	//récupération des données de la table congressiste
	public function getCongressiste()
	{
		$req = $this->conn->prepare("select * from congressiste");

		$req->execute();

		return $req->fetchAll(PDO::FETCH_OBJ);
	}


	public function getSessionById($id)
	{
		$req = $this->conn->prepare("select * from session where NUM_SESSION = :id");
		$req->bindValue(':id', $id);
		$req->execute();

		return $req->fetch(PDO::FETCH_OBJ);
	}

	public function getCongressisteById($id)
	{
		$req = $this->conn->prepare("select * from congressiste where NUM_CONGRESSISTE = :id");
		$req->bindValue(':id', $id);
		$req->execute();

		return $req->fetch(PDO::FETCH_OBJ);
	}

	public function getSessionByCongressiste($numCongressiste)
	{
		$req = $this->conn->prepare("select *, c.NUM_CONGRESSISTE from participation_session ps 
		INNER JOIN session s ON ps.NUM_SESSION=s.NUM_SESSION 
		INNER JOIN congressiste c ON ps.NUM_CONGRESSISTE=c.NUM_CONGRESSISTE 
		WHERE ps.NUM_CONGRESSISTE = :numCong");
		$req->bindValue(':numCong', $numCongressiste);
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function deleteParticpationSession($numSession)
	{

		
		try {

			$req = $this->conn->prepare("delete from participation_session where NUM_SESSION = :numsession ");
			$req->bindValue(':numsession', $numSession);
			$req->execute();
		} catch (PDOException $e) {
			echo "
		<div class='alert alert-danger erreur' role='alert'> Erreur ! Suppression impossible </div>";
			die();
		}

	

		
	}
	
	public function getMaxIdSession(){
		$req = $this->conn->prepare("select MAX(NUM_SESSION) from session");
		$req->execute();
		return $req->fetch(PDO::FETCH_OBJ);
	}
}
