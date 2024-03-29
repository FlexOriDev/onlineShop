<?php
include("inc/top.php");
include("actions/actionsCategorie/allCategories.php");
require('actions/database.php');

//Récupérer l'identifiant de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $idOfUser = $_SESSION['id'];



    //Vérifier si l'utilisateur existe
    $getMail = $bdd->prepare('SELECT mail FROM users WHERE id=?');
    $getMail->execute(array($idOfUser));
    while($m = $getMail->fetch()){

        $mail = $m['mail'];
            
    }
    



    $headers[] = 'MIME-Version: 1.0';
     $headers[] = 'Content-type: text/html; charset=iso-8859-1';


    $getAllFavoris = $bdd->prepare('
    SELECT DISTINCT * FROM ( annonces
    INNER JOIN favoris ON annonces.id = favoris.id_annonce )
    WHERE favoris.id_user=7
    GROUP BY annonces.id');
    $getAllFavoris->execute(array($idOfUser));
    $contenu = '<table>';
    if($getAllFavoris->rowCount() > 0){
        //Récupérer toutes les données de l'utilisateur
        	
                while($favoris = $getAllFavoris->fetch()){

                    $contenu .= '<tr><td>'.$favoris['titre'].'</td><td>'.$favoris['image'].'</td><td>'.$favoris['description'].'</td><td>'.$favoris['prix'].' €</td></tr>';
                        
                }
                $contenu .= '</table>';
                ini_set("sendmail_from","louis.peron.fr@gmail.com"); 
                if (mail($mail, 'Mes favoris', $contenu, $headers)){

                    echo 'Votre message a bien été envoyé ';

                }else {

                    echo "Votre message n'a pas pu être envoyé";

                }

    }else{
        echo "Aucun favoris trouvé.";
    }

}
?>
