<?php include_once('../Controlleur/ControleIns.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .erreur {
            font: 10pt arial;
            color: #DD0000;
            background-color: #EEEEEE;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container" style="width: 30rem;"><br>
        <?php
        echo @$messageGroupe;
        ?>
        <h1 class="box-title">S'inscrire</h1>
        <form action="../View/inscription.php" method="post" class="form">
            <div>
                <label for="">Login</label>
                <input type="text" name="login" value="<?php echo $login ?>" class="form-control">
                <?php echo  @$messageLogin  ?>
            </div>
            <div class="row">
                <div class="col-lg">
                    <label for="">Nom</label>
                    <input type="text" name="nom" value="<?php echo $nom ?>" class="form-control">
                    <?php echo  @$messageNom ?>
                </div>
                  
            </div>
            <div>
                <label for="">E-mail</label>
                <input type="email" name="mail" value="<?php echo $email ?>" class="form-control">
                <?php echo @$messageEmail ?>
            </div>
            <div>
                <label for="">Cin</label>
                <input type="text" name="cin" value="<?php echo $cin ?>" class="form-control">
                <?php echo @$messageCin ?>
            </div>
            <div class="row">
                <div class="col-lg">
                    <label for="">Mot de passe</label>
                    <input type="password" name="motPass" value="<?php echo $motP ?>" class="form-control">
                    <?php echo @$messageMot ?>
                </div>
                <div class="col">
                    <label for="">Confirmer mot de passe</label>
                    <input type="password" name="Cofpass" class="form-control">
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" name="submit" value="Ajouter"><br><br>
            <p class="box-register">Déja inscrit ?<a href="../View/Authentification.php"> connectez-vous ici</a></p>
        </form>
    </div>
</body>

</html>