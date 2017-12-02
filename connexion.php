<body>
	<form method="post" action=#>
		<div class="row">
			<form class="col s8">
				<div class="row">
					<div class="input-field col s2">
						<input id="login" type="text" name="login"
							   value="<?php echo (isset($_POST['login'])?$_POST['login']:''); ?>">
						<label for="login">Login</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s2">
						<input type="text" name="mdp"
							   value="<?php echo (isset($_POST['mdp'])?$_POST['mdp']:''); ?>">
						<label for="mdp">Mot de passe</label>
					</div>
				</div> 
			</form>
		</div>
	</form>
	<?php
		/*if(isset($_POST["login"]) && isset($_POST["mdp"])
			$_SESSION["login"] = $_POST["login"];*/
	?>
</body>