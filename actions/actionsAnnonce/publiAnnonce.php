<?php
if(session_id() == '') {
    session_start();
}
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['prix']) AND !empty($_FILES['fichier']) AND !empty($_POST['id'])){
        
        $annonce_titre = htmlspecialchars($_POST['titre']);
        $annonce_description = htmlspecialchars($_POST['description']);
        $annonce_prix = htmlspecialchars($_POST['prix']);
        $nom_fichier = $_FILES['fichier']['name'];
        $formated_DATETIME = date('Y-m-d H:i:s');
        $idOfCategorie = htmlspecialchars($_POST['id']);
        
        $tmp_fichier = $_FILES['fichier']['tmp_name'];
        $nom_destination = "images/$nom_fichier";
        move_uploaded_file($tmp_fichier,$nom_destination);
        
        $insertAnnonceOnWebsite = $bdd->prepare('INSERT INTO annonces(titre, description, prix, image, date, id_categorie, id_user)VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insertAnnonceOnWebsite->execute(array($annonce_titre, $annonce_description, $annonce_prix, $nom_fichier, $formated_DATETIME, $idOfCategorie, $_SESSION['id']));
        
        $getInfosOfThisAnnonceReq = $bdd->prepare('SELECT id FROM annonces WHERE titre = ?');
        $getInfosOfThisAnnonceReq->execute(array($annonce_titre));
        
        $annonceInfos = $getInfosOfThisAnnonceReq->fetch();
        
        $annonce_id = $annonceInfos['id'];
        
        header('Location: ../annonce.php?id='.$annonce_id);
        $errorMsg = "Votre annonce a bien été publiée.";
        
    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
    
}