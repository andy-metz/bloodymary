<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$db = "myDBPDO";

	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$statement = $conn->prepare("INSERT IGNORE INTO UTILISATEUR
		(idUtilisateur, login, mdp, nom, prenom, adresse, cp, ville)
		VALUES (null, :login, :mdp, nom, :prenom, :adresse, :cp, :ville)");
		$statement->bindParam(':login', $login, PDO::PARAM_STR);
		$statement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
		$statement->bindParam(':nom', $ingredients, PDO::PARAM_STR);
		$statement->bindParam(':prenom', $preparation, PDO::PARAM_STR);
		$statement->bindParam(':adresse', $ingredients, PDO::PARAM_STR);
		$statement->bindParam(':cp', $preparation, PDO::PARAM_STR);
		$statement->bindParam(':ville', $preparation, PDO::PARAM_STR);
		
		$login = $_POST["login"];
		$mdp = $_POST["mdp"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$adresse = $_POST["adresse"];
		$cp = $_POST["cp"];
		$ville = $_POST["ville"];
		
		$statement->execute();
	}
	catch(PDO::Exception $e)
	{
		echo "Erreur Inscription: ".$e->getMessage();
	}
	$conn = null;
?>