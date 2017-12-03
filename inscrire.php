<?php
	//fichier qui vérifie le formulaire
	require 'verifFormulaire.php';
?>
<form method="post" action=#>
	<div class="row">
		<form class="col s8">
			<div class="row">
				<div class="input-field col s2">
					<i class="material-icons prefix">account_circle</i>
					<input id="login" type="text" name="login"
						   value="<?php echo (isset($_POST['login'])?$_POST['login']:''); ?>">
					<label for="login">Login *</label>
				</div>
				<div class="input-field col s2">
					<input type="text" name="mdp"
						   value="<?php echo (isset($_POST['mdp'])?$_POST['mdp']:''); ?>">
					<label for="mdp">Mot de passe *</label>
				</div>
			</div> 
			<div class="row">
				<div class="input-field col s2">
				<i class="material-icons prefix">person</i>
					<input type="text" name="nom" 
						   value="<?php echo (isset($_POST['nom'])?$_POST['nom']:''); ?>">
					<label for="nom">Nom</label>
				</div>
				<div class="input-field col s2">
					<input type="text" name="prenom"
						   value="<?php echo (isset($_POST['prenom'])?$_POST['prenom']:''); ?>">
					<label for="prenom">Prenom</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s2">
					  <input name="sexe" type="radio" id="homme" value="Homme"
							<?php echo (isset($_POST['sexe'])?$_POST['sexe']:''); ?>/>
					  <label for="homme">Homme</label>
					  <input name="sexe" type="radio" id="femme" value="Femme"
						<?php echo (isset($_POST['sexe'])?$_POST['sexe']:''); ?>/>
					  <label for="femme">Femme</label>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="input-field col s4">
				<i class="material-icons prefix">mail_outline</i>
					<input type="text" name="adresseMail"
						   value="<?php echo (isset($_POST['adresseMail'])?$_POST['adresseMail']:''); ?>">
					<label for="adresseMail" data-error="wrong" data-success="right">Adresse Email</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s2">
					<input placeholder="xx/xx/xxxx" type="text" name="dateNaissance"
						   value="<?php echo (isset($_POST['dateNaissance'])?$_POST['dateNaissance']:''); ?>">
					<label for="dateNaissance">Date de Naissance</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s2">
					<input type="text" name="adresse"
						   value="<?php echo (isset($_POST['adresse'])?$_POST['adresse']:''); ?>">
						   <label for="adresse">Adresse</label>
				</div>
				<div class="input-field col s2">
					<input type="text" name="cp"
						   value="<?php echo (isset($_POST['cp'])?$_POST['cp']:''); ?>">
						   <label for="cp">Code Postal</label> 
				</div>
				<div class="input-field col s2">
					<input type="text" name="ville"
						   value="<?php echo (isset($_POST['ville'])?$_POST['ville']:''); ?>">
						   <label for="ville">Ville</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s2">
					<i class="material-icons prefix">phone</i>
					<input type="text" name="telephone"
							   value="<?php echo (isset($_POST['telephone'])?$_POST['telephone']:''); ?>">
					<label for="telephone">Telephone</label>
				</div>
			</div>
		</form>
	</div>
	<button class="btn waves-effect waves-light" type="submit" name="action">Valider
		<i class="material-icons right">send</i>
  </button> 
</form>

<?php
	if($erreur == true)
	{
		echo "erreur";
	}
	else
	{
		//Si pas de pb inclusion du fichier qui inscrit le client dans la base de donnée
		if(isset($_POST))
		{
			require 'InscrireClient.php';
			echo "Inscription réussit";
		}
		else
		{
			echo "veuillez remplir le formulaire";
		}
	}
?>