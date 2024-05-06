 <?php
    session_start();
    include('../Controlleur/Connexion.php');
    $login = $_POST['login'];
    $motPass = $_POST['motPass'];
    if (!empty($login) && !empty($motPass)) {
        $stmt = $cnx->prepare("SELECT* FROM utilisateur where login=?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        if ($user) { //Une ligne dans la table utilisateur
            if ($user['login'] == $login && $user['password'] == $motPass) {
                $_SESSION['login'] = $user['login'];
                $_SESSION['mail'] = $user['email'];
                if ($user['role'] == 1) {
                    header('Location:../Controlleur/administrateur.php');
                } else {
                    header('Location:../Controlleur/accueil.php');
                }
            }
        } else {
            echo "Mot de passe ou nom utilisateur incorrecte";
            header('Location:../View/Authentification.html');
        }
    }
    ?>
