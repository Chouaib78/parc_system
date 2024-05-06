<?php
include('../Controlleur/Connexion.php');
include('../Model/Mission.php');
Mission::DeleteMissionEnAttente($_GET['idmission']);
