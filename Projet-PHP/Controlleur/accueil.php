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
    session_start();
    include('../View/NavBarUser.php');
    ?>
    <div class="container"><br>
        <h2>La Liste des Missions affectées au chauffeur <?php echo $_SESSION['nom'] ?></h2>
        <table class='table table-hover'>
            <thead>
                <tr>
                    <th>Objectif</th>
                    <th>Ville</th>
                    <th>Voiture</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Etat de la mission</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../Model/Mission.php');
                Mission::FindAll_Mission_User($_SESSION['login']);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>