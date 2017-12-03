<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$db = "myDBPDO";

	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$login = $_POST["login"];
		$mdp = $_POST["mdp"];
		$mdp = md5($mdp);
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$sexe = $_POST["sexe"];
		$adresseMail = $_POST["adresseMail"];
		$dateNaissance = $_POST["dateNaissance"];
		$adresse = $_POST["adresse"];
		$cp = $_POST["cp"];
		$ville = $_POST["ville"];
		$telephone = $_POST["telephone"];
		
		$statement = $conn->prepare("INSERT IGNORE INTO UTILISATEUR
		(idUtilisateur, login, mdp, nom, prenom, sexe, adresseMail, dateNaissance, adresse, cp, ville, telephone)
		VALUES (null, :login, :mdp, :nom, :prenom, :sexe, :adresseMail, :dateNaissance, :adresse, :cp, :ville, :telephone)");
		$statement->bindParam(':login', $login, PDO::PARAM_STR);
		$statement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
		$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
		$statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
		$statement->bindParam(':sexe', $sexe, PDO::PARAM_STR);
		$statement->bindParam(':adresseMail', $adresseMail, PDO::PARAM_STR);
		$statement->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
		$statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
		$statement->bindParam(':cp', $cp, PDO::PARAM_STR);
		$statement->bindParam(':ville', $ville, PDO::PARAM_STR);
		$statement->bindParam(':telephone', $telephone, PDO::PARAM_STR);
		$statement->execute();
	}
	catch(PDOException $e)
	{
		echo "Erreur Inscription: ".$e->getMessage();
	}
	$conn = null;
?>