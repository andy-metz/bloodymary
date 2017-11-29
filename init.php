<?php
//==============================//
//																	  //
// Creation de la base de donnée myDBPDO //
//																	  //
//==============================//

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "";

try
{
	echo "<h2>Creation de la base de donnée myDBPDO</h2>";
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	
	//met le mode d'erreur de PDO  à exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
	
	$sql = "CREATE DATABASE IF NOT EXISTS myDBPDO";
	$conn->exec($sql);
	echo "Database crée avec succès<br>"; 
	
	//changement de la base en utf 8
	$sql="ALTER DATABASE myDBPDO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
	$conn->exec($sql);
	echo "Database en mode UTF-8<br>";
}
catch(PDOException $e)
{
    echo $sql."<br>". $e->getMessage();
}

$conn = null;
?>

<?php
//===============//
//									//
// Creation des tables  //
//									//
//===============//

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "myDBPDO";

include'Donnees.inc.php';

try
{
	echo "<h2>Création des tables</h2>";
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//============================//
	//																 //
	// Creation table Recette + INDEX+ UTF8 //
	//																 //
	//============================//

	$sql ="CREATE TABLE IF NOT EXISTS RECETTE(
	idRecette int NOT NULL AUTO_INCREMENT PRIMARY KEY,     
	libRecette VARCHAR(100) NOT NULL,
	ingredients VARCHAR(250) NOT NULL,
	preparation VARCHAR(1000) NOT NULL
	)";
	$conn->exec($sql);
	echo "Table Recette crée<br>";	

	$sql="CREATE INDEX index_recette ON RECETTE (libRecette)";
	$conn->exec($sql);

	$sql="ALTER TABLE RECETTE CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";

	//============================//
	//																 //
	// Creation table Aliment + INDEX + UTF8 //
	//																 //
	//============================//
	
	$sql="CREATE TABLE  IF NOT EXISTS ALIMENT(
	idAliment int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	libAliment VARCHAR(40) NOT NULL UNIQUE 
	)";
	$conn->exec($sql);
	echo "Table Aliment crée<br>";
	
	$sql="CREATE INDEX index_aliment on ALIMENT (LibAliment)";
	$conn->exec($sql);
	
	$sql="ALTER TABLE ALIMENT CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
	$conn->exec($sql);
	
	//==============================//
	//																	  //
	// Creation table utilisateur + INDEX + UTF8 //
	//																	  //
	//==============================//

	$sql ="CREATE TABLE IF NOT EXISTS UTILISATEUR(
	idUtilisateur int(10)  AUTO_INCREMENT  PRIMARY KEY,
	login VARCHAR(50) NOT NULL UNIQUE,     
	mdp VARCHAR(50)  NOT NULL,
	nom VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	adresse VARCHAR(50) NOT NULL,
	cp VARCHAR(50) NOT NULL,
	ville VARCHAR(50) NOT NULL
	)
	";
	$conn->exec($sql);
	echo "Table Utilisateur crée<br>";

	$sql="CREATE INDEX index_utilisateur ON UTILISATEUR (idUtilisateur)";
	$conn->exec($sql);
	
	$sql="ALTER TABLE UTILISATEUR CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
	$conn->exec($sql);
	
	//==================//
	//										   //										   
	// Creation table Contient  //
	//										   //
	//==================//
	
	$sql="CREATE TABLE  IF NOT EXISTS CONTIENT(
	idAliment int REFERENCES ALIMENT(idAliment),
	idRecette int REFERENCES RECETTE(idRecette),
	CONSTRAINT recette_a_pour_aliment PRIMARY KEY(idAliment, idRecette)
	)";
	$conn->exec($sql);
	echo "Table Contient crée<br>";
	
	//=================//
	//									     //
	// Creation table PARENT	 //
	//										 //
	//=================//
	
	$sql="CREATE TABLE IF NOT EXISTS PARENT(
	idAliment int ,
	id_SuperCat int,
	/*FOREIGN KEY(idAliment) REFERENCES ALIMENT(idAliment),    complété l'intégrité de la base*/
	CONSTRAINT alim_a_pour_fils PRIMARY KEY(idAliment, id_SuperCat)
	)";
	$conn->exec($sql);
	echo "Table Parent crée<br>";
	
	//=================//
	//										 //	
	// Creation table ENFANT  //
	//									     //
	//=================//
	
	$sql="CREATE TABLE IF NOT EXISTS ENFANT(
	idAliment int REFERENCES ALIMENT(idAliment),
	id_SousCat int,
	CONSTRAINT alim_a_pour_pere PRIMARY KEY(idAliment, id_SousCat)
	)";
	$conn->exec($sql);
	echo "Table Enfant crée<br>";
	
	//================//
	 //                                   //
	// Creation table Favori  //
	//                                    //
	//================//
	
	$sql ="CREATE TABLE IF NOT EXISTS FAVORI(
	idUser VARCHAR(100) NOT NULL REFERENCES UTILISATEUR(nom),     
	libRecette VARCHAR(200) NOT NULL REFERENCES RECETTE(libRecette),
	CONSTRAINT user_a_pour_favori PRIMARY KEY (idUser,libRecette) 
	)";
	$conn->exec($sql);
	echo "Table Favori crée<br>";
	
	
}
	
catch(PDOException $e)
{
    echo $sql."<br>". $e->getMessage();
}

$conn = null;
?>

<?php
//=========================//
//														   //
// Ajout des données dan les tables  //
//														   //		
//=========================//

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "myDBPDO";

include'Donnees.inc.php';

try
{
	echo "<h2>Ajout des éléments dans les tables</h2>";
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//=========================//
	//														   //
	// Insertion des valeurs dans Recette //
	//														   //
	//=========================//
	
	$statement = $conn->prepare("INSERT IGNORE INTO RECETTE
	(idRecette, libRecette, ingredients, preparation)
	VALUES (null, :titre, :ingredients, :preparation)");
	$statement->bindParam(':titre', $titre, PDO::PARAM_STR);
	$statement->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
	$statement->bindParam(':preparation', $preparation, PDO::PARAM_STR);
	
	foreach($Recettes as $array_recette_courante)
	{
		$recette=array($array_recette_courante);
		
		foreach($recette as $contenu)
		{		
			$titre="";
			$ingredients="";
			$preparation="";
			
			foreach($contenu as $libelle=>$info)
			{
				//$libelle représente le type d' information titre||ingredients||preparations
				if(strcmp($libelle,'titre')==0)
				{ // recuperation pour variable $titre
					$titre=utf8_decode($info);								
				}
				if(strcmp($libelle,'ingredients')==0)
				{// recuperation pour variable $ingredients	
					$ingredients=utf8_decode($info);
				}	
				if(strcmp($libelle,'preparation')==0)
				{	// recuperation pour variable $preparation
					$preparation=utf8_decode($info);
				}
			}	
			$statement->execute();
		}
	}
	echo "Insertion des valeurs dans Recette réussit<br>";
	
	//=========================//
	//														   //
	// Insertion des valeurs dans Aliment //
	//														   //
	//=========================//
	
	foreach($Hierarchie as $nom =>$description_categorie)
	{
		$statement = $conn->prepare("INSERT IGNORE INTO ALIMENT (idAliment, libAliment) VALUES(null, :nomAliment);");
		$statement->bindParam(':nomAliment', $nomAliment, PDO::PARAM_STR);
		$nomAliment=utf8_decode($nom);  
		
		$statement->execute();
	}
    echo "Insertion des valeurs dans Aliment réussit<br>";

	//================================//
	//														   				  //
	// Insertion des valeurs dans Parent et Enfant //
	//														   				  //
	//================================//
	
	foreach($Hierarchie as $nom =>$description_categorie)
	{    
		$nomAliment=utf8_decode($nom);
		$tab_description_categorie=array($description_categorie);
	  
		foreach($tab_description_categorie as $tab_categories)
		{   // on parcourt les deux sous tableaux de categories grâce à $tab_categories
			foreach($tab_categories as $type_categorie => $info_categorie)
			{ 
				// typ_categorie contient sous-categorie ou super -categorie
				// info categorie est le tableau qui contient les aliments
				// qui sont des sous cateogire/supercategories
				// on va voir dans $info_categorie qui est le tableau qui contient 
				// les super ou les sous categorie selon le tableau où l'on se trouve
		  
				$id_aliment = $conn->prepare("SELECT idAliment , libAliment
				FROM  ALIMENT
				WHERE libAliment = :nomAliment");
				$id_aliment->bindParam(':nomAliment', $nomAliment, PDO::PARAM_STR);
				
				$id_aliment->execute();
				//à faire seulement si $id_aliment à au moins un colonne
				$res_id = $id_aliment->fetch(PDO::FETCH_ASSOC);  
				$id_trouve = $res_id['idAliment'];
				
				if(strcmp($type_categorie,'sous-categorie')==0)
				{   
					foreach($info_categorie as $nom_ss_categorie)
					{
						$nom_ss_categorie=utf8_decode($nom_ss_categorie);   
						
						$id_ss_cat = $conn->prepare("SELECT idAliment, libAliment
						FROM ALIMENT
						WHERE libAliment= :nom_ss_categorie");
						$id_ss_cat->bindParam(':nom_ss_categorie', $nom_ss_categorie, PDO::PARAM_STR);
						$id_ss_cat->execute();
						
						$res_id_cat = $id_ss_cat->fetch(PDO::FETCH_ASSOC);
						$id_cat = $res_id_cat['idAliment'];
						
						$statement = $conn->prepare
						("INSERT IGNORE INTO ENFANT (idAliment,id_SousCat) VALUES (:id_trouve , :id_cat)");
						$statement->bindParam(':id_trouve', $id_trouve, PDO::PARAM_INT);
						$statement->bindParam(':id_cat', $id_cat, PDO::PARAM_INT);
						
						$statement->execute();
					}
				}  
				if(strcmp($type_categorie,'super-categorie')==0)  
				{ 
					foreach($info_categorie as $nom_sp_categorie)
					{		
					
						
						$nom_sp_categorie= utf8_decode($nom_sp_categorie);
						
						$id_sp_cat = $conn->prepare("SELECT idAliment,libAliment
						FROM ALIMENT
					   WHERE libAliment=:nom_sp_categorie");
					   $id_sp_cat->bindParam(':nom_sp_categorie', $nom_sp_categorie, PDO::PARAM_STR);
					   $id_sp_cat->execute();
					 
						$res_id_cat=$id_sp_cat->fetch(PDO::FETCH_ASSOC);
						$id_cat=$res_id_cat['idAliment'];
						
						$statement = $conn->prepare
						("INSERT IGNORE INTO PARENT (idAliment,id_SuperCat) VALUES (:id_trouve , :id_cat)");
						$statement->bindParam(':id_trouve', $id_trouve, PDO::PARAM_INT);
						$statement->bindParam(':id_cat', $id_cat, PDO::PARAM_INT);
						$statement->execute();
					}    
				} 
			} 
		}
	} 
	echo "Insertion des valeurs dans Parent réussit<br>";
	echo "Insertion des valeurs dans Enfant réussit<br>";
}
catch(PDOException $e)
{
	echo "Erreur: ".$e->getMessage();
}
$conn = null;
?>

<?php
//================================//
//																		  //
// Supression de la base de donnée myDBPDO //
//																 		  //
//================================//

$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "myDBPDO";
	
try
{
	echo "<h2>Supression de la base de donnée PDO</h2>";
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$sql="DROP DATABASE myDBPDO";
	$conn->exec($sql);
	echo "Database supprimée";
}	
	
catch(PDOException $e)
{
    echo $sql."<br>". $e->getMessage();
}

$conn = null;
?>