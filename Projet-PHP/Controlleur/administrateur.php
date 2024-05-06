<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include('../View/NavBarAdmin.php');
    ?>
    <br>
    <div class="container">
        <form action="../Controlleur/inscriptionMission.php" method="post" class="form">
            <input class="btn btn-primary" type="submit" name="AjouterNMission" value="Ajouter nouvelle Mission">
            <br><br>
        </form>
        <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Objectif</th>
                    <th>Ville</th>
                    <th>NomChauffeur</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Commentaire</th>
                    <th>Etat de la mission</th>
            </thead>
            <tbody>
                <?php
                include('../Model/Mission.php');
                Mission::FindAll_Mission_Admin();

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>