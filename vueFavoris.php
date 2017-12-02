<?php
session_start();
if(isset($_POST['favori']) && $_POST['favori']!="") 
{

	//nset($tab[array_search($element, $tab)]);
	unset($_SESSION['liste_favoris'][array_search($_POST['favori'], $_SESSION['liste_favoris'])]);

	if($_SESSION['connected'] == false)// on retire au tableau liste_favoris
	{ 


	}
	else
	{ // mettre à jour la table favoris
		
	}
	$message_confirmation = $_POST['favori']." a été retiré de la liste de vos favoris";

}
include 'modele.php';

?>
	
<div class="row">

	<div id="liste_recettes" class="col s8 m8 l8 offset-l2">
		<?php include "vueListeFavoris.php" ?>
	</div>
	<div>
		<?php include "RetireFavori.php" ?>	
	</div>	
</div>

