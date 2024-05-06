<?php
session_start();
@$date_debut = $_POST['date_debut'];
@$date_fin = $_POST['date_fin'];
@$Cmmentaire = $_POST['commentaire'];
if (isset($_POST['valider'])) {
    if (empty($date_debut) && empty($date_fin) && empty($Cmmentaire)) {
        @$messageGroupe = '<div class="erreur">Les ne doivent pas être vide.</div>';
    }
    if (empty($date_debut)) {
        @$messagedate_debut = '<div class="erreur">Indiquer la date de début de la mission.</div>';
    }
    if (empty($date_fin)) {
        @$messagedate_fin = '<div class="erreur">Indiquer la date de fin de la mission.</div>';
    }
    if (!empty(@$date_debut) && !empty(@$date_fin) && !empty(@$Cmmentaire)) {
        $object = $_SESSION['object'];
        $chauf = $_SESSION['nomChauffeur'];
        $voiture = $_SESSION['voiture'];
        $date = $_SESSION['date'];
        $description = $_SESSION['description'];
        $ville = $_SESSION['ville'];
        echo $object . "   " . $chauf;
        die();
        include('../Model/User.php');
        //ecrire une methode qui va ajouter la 
    }
}
if (isset($_POST['Cancel'])) {
    header('Location:../Controlleur/accueil.php');
}
