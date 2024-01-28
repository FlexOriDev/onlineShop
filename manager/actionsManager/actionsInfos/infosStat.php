<?php

// 1ere requete

 require('actionsManager/database.php');
 $getIdOfCat = $bdd->prepare('SELECT id_categorie FROM annonces GROUP BY id_categorie ORDER BY COUNT(id_categorie) DESC LIMIT 1');
 $getIdOfCat->execute(array());
 
 foreach( $getIdOfCat as $lo){
     $id = $lo['id_categorie'];
 }
 $getCat = $bdd->prepare('SELECT nom FROM categories WHERE id=?');
 $getCat->execute(array($id));

 foreach( $getCat as $o){
     $name = $o['nom'];
 }


// 2eme requete

$getIdOfCatMin = $bdd->prepare('SELECT id_categorie FROM annonces GROUP BY id_categorie ORDER BY COUNT(id_categorie) LIMIT 1');
$getIdOfCatMin->execute(array());
 
 foreach( $getIdOfCatMin as $lo){
     $idMin = $lo['id_categorie'];
 }
 $getCatMin = $bdd->prepare('SELECT nom FROM categories WHERE id=?');
 $getCatMin->execute(array($idMin));

 foreach( $getCatMin as $o){
     $nameMin = $o['nom'];
 }

 // 3eme requete

$getAnnonceAncienne = $bdd->prepare('SELECT MIN(date), id, titre FROM annonces');
$getAnnonceAncienne->execute(array());

foreach( $getAnnonceAncienne as $lo){
    $idAnn = $lo['id'];
    $nameAnn = $lo['titre'];
}

 // 4eme case
 $d = date("m");

$getAllCountAnnonce = $bdd->prepare('SELECT id_categorie, COUNT(*) FROM annonces WHERE date >= ? AND date <= ? GROUP BY id_categorie
ORDER BY COUNT(*)');
 $getAllCountAnnonce->execute(array("2022-".($d-1)."-31", "2022-".date("m")."-30"));
$countAnnonces = array ();
$countIdCat = array ();
$countIdCat2 = array ();
foreach  ( $getAllCountAnnonce as $row) {
   $countAnnonces[] = $row['COUNT(*)'];
   $countIdCat[] = $row['id_categorie'];
}
foreach  ( $countIdCat as $row) {

    $get = $bdd->prepare('SELECT nom FROM categories WHERE id=?');
    $get->execute(array($row));

    foreach( $get as $lo){
        $id = $lo['nom'];
    }
    
    $countIdCat2[] = $id;
 }

 $nombre = json_encode($countAnnonces);
 $nom = json_encode($countIdCat2);



?>

