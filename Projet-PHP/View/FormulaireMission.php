<?php include_once('../Controlleur/ControleMission.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
        <h2>Ajouter mission</h2>
        <form action="../View/FormulaireMission.php" method="post" class="form">
            <div>
                <label for="">Objectif</label>
                <input type="text" name="objectif" class="form-control">
                <?php echo @$message_object; ?>
            </div>
            <div class="row">
  <div class="col-lg">
    <label for="">Les Chauffeurs</label>
 
                    <?php echo @$message_voiture; ?>
  </div>
</div>

                <div class="col">
                    <label for="">Les Voitures</label>
                    <select name="voiture" id="" class="form-select">
                        <?php
                        include('../Model/Voiture.php');
                        Voiture::getAllVoiture();
                        ?>
                    </select>
                    <?php echo @$message_voiture; ?>
                </div>
            </div>
            <div>
                <label for="">km</label>
                <input type="number" name="km" class="form-control">
            </div>

            <div class="row">
                <div class="col-lg">
                    <label for="">Date</label>
                    <input type="date" name="date" class="form-control">
                    <?php echo @$message_date; ?>
                </div>
                <div class="col-lg">
                    <label for="">Ville</label>
                    <input type="text" name="ville" class="form-control">
                    <?php echo @$message_ville; ?>
                </div>
            </div>
            <div>
                <div class="col">
                    <label for="">Description</label>
                    <textarea type="text" name="description" class="form-control" style="height: 100px"></textarea>
                    <?php echo  @$message_description; ?>
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-danger" name="Cancel" value="Cancel">
            <input type="submit" class="btn btn-primary" name="submitF" value="Ajouter">
        </form>
    </div>
</body>

</html>