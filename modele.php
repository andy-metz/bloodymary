<?php

// Renvoie la liste des noms des aliments triés par ordre croissant
function getListeAliments($libAliment) {
  $bdd = getBdd();
  $liste_aliments = $bdd->query('select af.libaliment as libaliment' 
  	.' from aliment af, aliment a, enfant e'
  	.' where e.idaliment = a.idaliment and a.libaliment ="'.$libAliment.'"'
  	.' and e.id_souscat = af.idaliment'
  	.' order by af.libaliment');
  return $liste_aliments;
}

// Renvoie la liste des noms coktails par ordre croissant
// function getListerecettes($libAliment) {
//   $bdd = getBdd();
//   $liste_recettes = $bdd->query('select r.librecette as librecette' 
//   	.' from recette r, contient c, aliment a'
//   	.' where r.idrecette = c.idrecette'
//   	.' and a.idaliment = c.idaliment'
//     .' and a.libaliment = "'.$libAliment.'"'
//   	.' order by a.libaliment');

//   return $liste_recettes;
// }

//Renvoie la liste des noms coktails par ordre croissant
function getListerecettes($libAliment) {
  $bdd = getBdd();
  $liste_recettes = $bdd->query('select r.librecette as librecette' 
   .' from recette r, apourrecette c, aliment a'
   .' where r.idrecette = c.idrecette'
   .' and a.idaliment = c.idaliment'
    .' and a.libaliment = "'.$libAliment.'"'
   .' order by a.libaliment');  

  // on va parcourir toutes les recettes et pour chaque composant de la recette on l'ajoute à la table AlimentEstDansRecette

  return $liste_recettes;
}

function insertIgnoreDansAlimentEstDansRecette($aliment, $idrecette){
  $bdd = getBdd();
  $bdd->query('insert into alimentestdansrecette (idaliment, idrecette) VALUES('.$idaliment.', '.$idrecette.');');

}

function getCompositionRecette($idrecette) {
  $bdd = getBdd();
  $composition = $bdd->query('select c.idAliment as idaliment, c.idRecette as idrecette' 
   .' from contient c'
   .' where c.idrecette= "'.$idrecette.'"');

  return $composition;    
  }

  function getPere($idaliment) {
  $bdd = getBdd();
  $pere = $bdd->query('select c.id_SuperCat as idaliment' 
   .' from contient c'
   .' where c.idAliment= "'.$idaliment.'"');

  return $pere;    
  }

function getToutesLesrecettes($libAliment) {
  $bdd = getBdd();
  $liste_toutes_les_recettes = $bdd->query('select r.idRecette as idrecette' 
   .' from recette r');

  // on va parcourir toutes les recettes et pour chaque composant de la recette on l'ajoute à la table AlimentEstDansRecette
  foreach ($liste_toutes_les_recettes as $recette) {
    $aliments_contenus = getCompositionRecette($recette['idrecette']);
    foreach ($aliments_contenus as $composant) {
      $idrecette = $composant['idrecette'];
      $idaliment = $composant['idaliment'];
      insertIgnoreDansAlimentEstDansRecette($composant['idaliment'], $iderecette);
      // Tant qu'on trouvera un père pour aliment on enregistrera aussi
      $idaliment = getPere($idaliment);
      while(count($idaliment) > 0){
        insertIgnoreDansAlimentEstDansRecette($idaliment['idaliment'], $iderecette);
        $idaliment = getPere($idaliment);        
      }
    }
  }

  return $liste_toutes_les_recettes;
}

// Renvoie un enregistrement recette particulier
function getRecette($libRecette) {
  $bdd = getBdd();
  $recette = $bdd->query('select ingredients as composition, preparation from recette'
    .' where LibRecette = "'.$libRecette.'"');

  return $recette;
}

// Renvoie un enregistrement recette particulier
function updatListeFavorisRecette($libuser, $liste_favori) {
  $bdd = getBdd();
  $recette = $bdd->query('select ingredients as composition, preparation from recette'
    .' where LibRecette = "'.$libRecette.'"');

  return $recette;
}



// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
  $bdd = new PDO('mysql:host=localhost;dbname=mydbpdo;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $bdd;
}
?>