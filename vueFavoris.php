<?php
session_start();
if(isset($_POST['favori']) && $_POST['favori']!="") 
{
	if($_SESSION['connected'] == false)// on retire au tableau liste_favoris
	{ 

			//nset($tab[array_search($element, $tab)]);
			unset($_SESSION['liste_favoris'][array_search($_POST['favori'], $_SESSION['liste_favoris'])]);

			$message_confirmation = $_POST['favori']." a été retiré de la liste de vos favoris";

	}
	else
	{ // On enregistre dans la table des favoris
	}
}
include 'modele.php';

?>
	
<div class="row">

	<div id="liste_recettes" class="col s8 m8 l8">
		<?php include "vueListeFavoris.php" ?>
	</div>
	<div>
		<?php include "RetireFavori.php" ?>	
	</div>	
</div>

