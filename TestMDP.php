<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$db = "myDBPDO";

	try
	{
		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$mdp = $_POST["mdp"];
		$mdp = md5($mdp);
		
		$sql = $conn->prepare("SELECT mdp FROM UTILISATEUR WHERE login = :login");
		$sql->bindParam(':login', $login, PDO::PARAM_INT);
		$sql->execute
		
		if($sql["mdp"] = $mdp)
				$erreur = false;
		else
			$erreur = true;
	}
	catch(PDOException $e)
	{
		echo "Erreur Inscription: ".$e->getMessage();
	}
	$conn = null;
?>