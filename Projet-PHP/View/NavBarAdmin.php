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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class=" container-fluid">
            <a class="navbar-brand" href="#">Gestion d’un Parc de Voiture</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../Controlleur/MissionEnAttente.php">Missions en attente</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="../Controlleur/administrateur.php">
                            Administration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">#</a>
                    </li>
                </ul>
                <form action="../Controlleur/Deconnexion.php" method="POST">
                    <div class=pull-left>
                        <input type="submit" class="btn btn-outline-primary btn-lg mb-2" name="deconnecter" value="Déconneter">
                    </div>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>