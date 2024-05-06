<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="sytle.css"> -->
    <style>
        p.errorMessage {
            background-color: #e66262;
            border: #AA4502 1px solid;
            padding: 5px 10px;
            color: #FFFFFF;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('../Controlleur/Connexion.php');
    if (isset($_POST['submit'])) {
        $login = stripslashes($_REQUEST['login']);
        $motPass = stripslashes($_REQUEST['motPass']);
        $stmt = $cnx->prepare("SELECT* FROM utilisateur where login=? and password=?");
        $stmt->bindParam(1, $login);
        $stmt->bindParam(2, $motPass);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user) { //Une ligne dans la table utilisateur
            $_SESSION['login'] = $user['login'];
            $_SESSION['nom'] = $user['nom'];
            if ($user['role'] == 1) {
                header('Location:../Controlleur/administrateur.php');
            } else if ($user['role'] == 0) {
                header('Location:../Controlleur/accueil.php');
            }
        } else {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
    ?>
    <div id="Container" style="margin-top:130px;margin-left:500px;width:30%">
        <form action="Authentification.php" method="post">
            <h1 class="text-center">S'authentifier</h1>
            <label for="">Login</label>
            <input type="text" class="form-control" placeholder="Entrer le login" name="login" value="" required>
            <label for="">Mot de Passe</label>
            <input type="password" class="form-control" placeholder="Entrer mot passe" name="motPass" value="" required><br>
            <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Connexion"><br><br>
            <p><a href="inscription.php" id="a">Cliquer ici pour s'inscrire</a></p>
            <?php if (!empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?>
                </p>
            <?php } ?>
        </form>
    </div>

</body>

</html>






<?php
// if (isset($_POST['submit'])) {
//     $login = $_POST['login'];
//     $motPass = $_POST['motPass'];
//     $stmt = $cnx->query("SELECT* FROM utilisateur where login='$login' and password=$motPass");
//     $stmt->execute();
//     while ($user = $stmt->fetch()) { //Une ligne dans la table utilisateur
//         if ($user['role'] == 1) {
//             header('Location: le chemin de la page administrateur');
//         } else if ($user['role'] == 0) {
//             header('Location:le chemin de la page utilisateur');
//         }
//     }
// }
?>