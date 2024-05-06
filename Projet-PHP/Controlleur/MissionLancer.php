<?php
include_once("../Model/Mission.php");
Mission::UpdateEtatMissionLancerCour($_GET['id']);
header('Location: ../Controlleur/accueil.php');
