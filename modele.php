<?php

// Renvoie la liste des noms des aliments triés par ordre croissant
function getListeAliments($idAliment) {
  $bdd = getBdd();
  $liste_aliments = $bdd->query('select af.libaliment' 
  	.'from aliment af, aliment a, estfils f '
  	.'where f.idaliment = a.idaliment and a.libaliment = '.$idAliment
  	.' and f.id_souscat = af.idaliment '
  	.'order by af.libaliment');

  return $lis;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
  $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root', '');
  return $bdd;
}

?>