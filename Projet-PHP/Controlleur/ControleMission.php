<?php
@$object = $_POST['objectif'];
@$chauf = $_POST['chauffeur'];
@$voiture = $_POST['voiture'];
@$date = $_POST['date'];
@$description = $_POST['description'];
@$ville = $_POST['ville'];
if (isset($_POST['submitF'])) {
    if (empty($object) && empty($chauf) && empty($voiture) && empty($date) && empty($description) && empty($ville)) {
        @$messageGroupe = '<div class="erreur">Les ne doivent pas être vide.</div>';
    }
    if (empty($object)) {
        @$message_object = '<div class="erreur">Indiquer objectif de la mission.</div>';
    }
    if (empty($chauf)) {
        @$message_chauf = '<div class="erreur">Selectionner un chauffeur.</div>';
    }
    if (empty($voiture)) {
        @$message_voiture = '<div class="erreur">Selectionner une voiture.</div>';
    }
    if (empty($date)) {
        @$message_date = '<div class="erreur">Date laisser vide.</div>';
    }
    if (empty($description)) {
        @$message_description = '<div class="erreur">Donner une description pour la mission.</div>';
    }
    if (empty($ville)) {
        @$message_ville = '<div class="erreur">Indiquer la ville.</div>';
    }
    if ((!empty(@$object)) && (!empty(@$chauf)) && (!empty(@$voiture)) && (!empty(@$date)) && (!empty(@$description)) && (!empty(@$ville))) {
        
        // Connexion à la base de données (remplacez les informations de connexion par les vôtres)
    
        $db = new PDO('mysql:host=localhost;dbname=parc;charset=utf8', 'root', 'root');

       // Prepare the SQL statement to avoid SQL injection
       $sql = "INSERT INTO missions (objectif, chauffeur, voiture, date, description, ville) VALUES (?, ?, ?, ?, ?, ?)";
       $stmt = $db->prepare($sql);
       // Execute the statement with the form values
       $stmt->execute([$object, $chauf, $voiture, $date, $description, $ville]);


    // Exécution de la requête
    $stmt->execute();

    // Vérification de la réussite de l'insertion
    if ($stmt->rowCount() > 0) {
        header('Location:../View/Authentification.php'); // Redirection vers la page d'authentification
        exit;
    } else {
        @$messageErreur = '<div class="erreur">Erreur lors de l\'insertion des données.</div>';
    }
}
   
        // header('Location:../View/FormulaireMission.php');
    }

if (isset($_POST['Cancel'])) {
    header('Location:../Controlleur/administrateur.php');
}
// else {
//     header('Location:../View/FormulaireMission.php');
// }
