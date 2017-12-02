<?php
session_start();
// Premier clic sur le bouton coktail
if(!isset($_SESSION['aliment']))
	$_SESSION['aliment'] = 'Aliment';

if(!isset($_SESSION['hierarchie_aliment']))
	$_SESSION['hierarchie_aliment'] = array("Aliment");

if(!isset($_SESSION['liste_favoris']))
	$_SESSION['liste_favoris'] = array();


if(isset($_POST['libaliment'])) {
	$_SESSION['aliment'] = $_POST['libaliment'];
	$key = array_search($_POST['libaliment'], $_SESSION['hierarchie_aliment']);	
	if($key !== false)
		$_SESSION['hierarchie_aliment'] = array_slice($_SESSION['hierarchie_aliment'], 0, $key+1); 
	else
		array_push($_SESSION['hierarchie_aliment'], $_POST['libaliment']);
}

if(isset($_POST['librecette'])) {
	$_SESSION['recette_en_cours']=$_POST['librecette'];
}
$_SESSION['connected']=false;

if(isset($_POST['favori']) && $_POST['favori']!="") 
{
	if($_SESSION['connected'] == false)// on ajoute au tableau liste_favoris
	{ 
		$key = array_search($_POST['favori'], $_SESSION['liste_favoris']);	
		if($key == true)
		{
			$message_confirmation = $_POST['favori']." est déjà dans vos favoris";
		}
		else
		{
			array_push($_SESSION['liste_favoris'], $_POST['favori']);
			$message_confirmation = $_POST['favori']." a été ajouté à vos favoris";
		}
	}
	else
	{ // On enregistre dans la table des favoris
	}
}

include 'modele.php';
?> 
<div>
	<?php include "AjoutFavori.php" ?>	
</div>	
<divclas="container raw">
	<?php include "vueHierarchieAliments.php" ?>
</div>
<div class="row">
	<div id="liste_aliments" class="col s4 m4 l4"> 
		<?php include "vueListeAliments.php" ?>
	</div>
	<div id="liste_recettes" class="col s8 m8 l8">
		<?php include "vueListeRecettes.php" ?>
	</div>
</div>
