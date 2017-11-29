<?php
	session_start();
?>

<?php
	//fichier qui vérifie le formulaire
	include 'VerifFormulaire';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Inscrire</title>
		<meta charset="utf-8" />
	</head>
	
	<body>
		<form method="post" action=#>
			Login :
			<input type="text" name="login" 
				   value="<?php echo (isset($_POST['login'])?$_POST['login']:''); ?>"><br />
			Mot de Passe :
			<input type="text" name="mdp"
				   value="<?php echo (isset($_POST['mdp'])?$_POST['mdp']:''); ?>"><br />
			Nom :
			<input type="text" name="nom" 
				   value="<?php echo (isset($_POST['nom'])?$_POST['nom']:''); ?>"><br />
			Prénom :
			<input type="text" name="prenom"
				   value="<?php echo (isset($_POST['prenom'])?$_POST['prenom']:''); ?>"><br />
			Adresse :
			<input type="text" name="adresse"
				   value="<?php echo (isset($_POST['adresse'])?$_POST['adresse']:''); ?>"><br />
			Code Postal :
			<input type="text" name="cp"
				   value="<?php echo (isset($_POST['cp'])?$_POST['cp']:''); ?>"><br />
			Ville : 
			<input type="text" name="ville"
				   value="<?php echo (isset($_POST['ville'])?$_POST['ville']:''); ?>"><br />
			<input type="submit" name="submit" value="Valider">	   
		</form>
		
	<?php
		if($erreur == true)
		{
			echo "<br>";
			echo "Merci de remplir correctement les champs ci-dessous : ";
			echo "<br>";
		}
		else
		{
			//Si pas de pb inclusion du fichier qui inscrit le client dans la base de donnée
			echo "Inscription réussit";
		}
		?>
		<a href="/deconnexion.php">Déconnexion</a><br/>  
	</body>
</html>