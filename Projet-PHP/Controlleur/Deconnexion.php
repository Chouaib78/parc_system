<?php
if (isset($_POST['deconnecter'])) {
    session_start();
    if (session_destroy()) {
        header('Location:../View/Authentification.php');
    }
}
