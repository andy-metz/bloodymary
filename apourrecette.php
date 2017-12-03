<?php
	function getBdd() {
	  $bdd = new PDO('mysql:host=localhost;dbname=mydbpdo;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	  return $bdd;
	}
	
	function insertIgnoreDansAlimentEstDansRecette($idaliment, $idrecette){
	  $bdd = getBdd();
	  $bdd->query('insert ignore into apourrecette (idaliment, idrecette) VALUES('.$idaliment.', '.$idrecette.');');

	}
	
	function getCompositionRecette($idrecette) {
	  $bdd = getBdd();
	  $composition = $bdd->query('select c.idAliment as idaliment, c.idRecette as idrecette' 
	   .' from contient c'
	   .' where c.idrecette= "'.$idrecette.'"');

	  return $composition;    
	  }

	function getRecettes($idaliment) {
	  $bdd = getBdd();
	  $recettes = $bdd->query('select c.idRecette as idrecette' 
	   .' from contient c'
	   .' where c.idAliment = "'.$idaliment.'"');

	  return $recettes;    
	  }	  

	  function getPere($idaliment) {
	  $bdd = getBdd();
	  $pere = $bdd->query('select p.id_SuperCat as idaliment' 
	   .' from parent p'
	   .' where p.idAliment= "'.$idaliment.'"');
	  return $pere;    
	  }

	function remplitapourrecette() {
	  $bdd = getBdd();
	  echo 'connexion reussie<br>';
	  $aliment_feuilles = $bdd->query('select a.idAliment as idaliment'
	   .' from aliment a'
	   .' where a.idAliment not in (select distinct a.idAliment from aliment a, enfant e where a.idAliment = e.idAliment)');

	  foreach ($aliment_feuilles as $feuille) {
	  	$idaliment = $feuille['idaliment'];
//echo 'idaliment:'.$idaliment.' <br>';	
 	  	$recettes = getRecettes($idaliment);
		foreach ($recettes as $recette) {
		  $idrecette = $recette['idrecette'];
	  	$idaliment = $feuille['idaliment'];		  
//echo 'idrecette:'.$idrecette.' <br>';  	
		  insertIgnoreDansAlimentEstDansRecette($idaliment, $idrecette);
//		  echo 'premiere insertion <br>';
		  $idaliment = getPere($idaliment);
		  while($idaliment->rowCount() > 0){
		  	foreach ($idaliment as $id){
//		  				  echo 'avant deuxieme insertion idaliment:'.$id['idaliment'].' <br>';
//		  				  echo 'avant deuxieme insertion idrecette:'.$idrecette.' <br>';
				insertIgnoreDansAlimentEstDansRecette($id['idaliment'], $idrecette);
				$idaliment = getPere($id['idaliment']);
				}
		  	}
		  }
	  	}
	  }


remplitapourrecette();
echo "Insertion des valeurs dans Contient réussit<br>";
?>