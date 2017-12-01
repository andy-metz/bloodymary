<?php

// Renvoie la liste des noms des aliments triés par ordre croissant
function getListeAliments($libAliment) {
  $bdd = getBdd();
  $liste_aliments = $bdd->query('select af.libaliment as libaliment' 
  	.' from aliment af, aliment a, estfils f'
  	.' where f.idaliment = a.idaliment and a.libaliment ="'.$libAliment.'"'
  	.' and f.id_souscat = af.idaliment'
  	.' order by af.libaliment');
  return $liste_aliments;
}

// Renvoie la liste des noms coktails par ordre croissant
function getListerecettes($libAliment) {
  $bdd = getBdd();
  $liste_recettes = $bdd->query('select r.librecette as librecette' 
  	.' from recette r, contient c, aliment a'
  	.' where r.idrecette = c.idrecette'
  	.' and a.idaliment = c.idaliment'
    .' and a.libaliment = "'.$libAliment.'"'
  	.' order by a.libaliment');

  return $liste_recettes;
}

// Renvoie un enregistrement recette particulier
function getRecette($libRecette) {
  $bdd = getBdd();
  $recette = $bdd->query('select ingredients as composition, preparation from recette'
    .' where LibRecette = "'.$libRecette.'"');

  return $recette;
}



// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $bdd;
}
?>