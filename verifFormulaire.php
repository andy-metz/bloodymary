<?php 
  	if(isset($_POST["submit"]))
	{
		$login = $_POST["login"];
		$mdp = $_POST["mdp"];
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$adresse = $_POST["adresse"];
		$cp = $_POST["cp"];
		$ville = $_POST["ville"];
	
		$erreur = false;
		
		$elementIncorrect = array();
		$elementCorrect = array();
		
		if($_POST["login"] != null)
		{
			if(preg_match("#[^a-zA-Z0-9]#",  $_POST["login"]) == 1)
				$elementCorrect = "\$login";
			else
			{
				$erreur == true;
				$elementIncorrect = "login";
			}
		}
		else
		{
			$erreur == true;
			$elementIncorrect = "login";
		}
		
		if($_POST["mdp"] != null)
		{
			if(preg_match("#[^a-zA-Z0-9]#",  $_POST["mdp"]) == 1)
				$elementCorrect = "\$mdp";
			else
			{
				$erreur == true;
				$elementIncorrect = "mdp";
			}
		}
		else
		{
			$erreur == true;
			$elementIncorrect = "login";
		}
		
		if(preg_match('#^[\x20-\x7E]{2}#', $_POST["nom"]) == 1)
			$elementCorrect = "\$nom";
		else
		{
			$erreur == true;
			$elementIncorrect = "nom";
		}
			
		if($_POST["prenom"] != null)
		{
			if(preg_match("#^[a-zA-Z]#", $_POST["prenom"]) != 1)
			{
				$erreur == true;
				$elementIncorrect = "prenom";
			}
			elseif(preg_match("#[^a-zA-Z]#",  $_POST["prenom"]) == 1)
			{
				$erreur == true;
				$elementIncorrect = "prenom";
			}
			else
				$elementCorrect = "\$prenom";
		}
		else
		{
			$erreur == true;
			$elementIncorrect = "prenom";
		}
		
		if($_POST["adresse"] != null)
		{
			if(preg_match("#^[0-9]{1,2} [' '] [a-z]* [' '] [A-Z]? [a-z]*#", $_GET["adresse"]) == 1)
			{
				$erreur == true;
				$elementIncorrect = "adresse";
			}
			else
				$elementCorrect = "\$adresse";
		}
		else if($_POST["cp"] != null)
		{
			if(preg_match("#^[0-9]{5}", $_GET["cp"]) == 1)
			{
				$erreur == true;
				$elementIncorrect = "cp";
			}
			else
				$elementCorrect = "\$cp";
		}
		else if ($_GET["ville"] != null)
		{
			if(preg_match("#^[0-9]{5}", $_GET["cp"]) == 1)
			{
				$erreur == true;
				$elementIncorrect = "ville";
			}
			else
				$elementCorrect = "\$ville";
		}
		else
		{
			$erreur == true;
			$elementIncorrect = "cp";
		}
	}
?>   