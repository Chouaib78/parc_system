<?php
$serveur = "localhost";
$login = "root";
$pass = "root";
$bd_name = "parc";
try {
    //code...  
    $cnx = new PDO("mysql:host=$serveur;dbname=$bd_name", $login, $pass);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Echec de la connexion :' . $e->getMessage();
}
