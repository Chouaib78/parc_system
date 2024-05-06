<?php include_once('../Controlleur/ControleMissionFinalisee.php'); ?>
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
        .card {
            margin: 0 auto;
        }

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
    <br><br>
    <div id="Container" style="margin-top:5px;margin-left:450px;width:30%"><br>
        <h2 class="box-title">Finalisée mission</h2>
        <form action="../View/MissionFinalisee.php" method="post" class="form">
            <div>
                <label for="">Date début</label>
                <input type="date" name="date_debut" class="form-control">
                <?php echo @$messagedate_debut ?>
            </div>
            <div class="row">
                <div class="col-lg">
                    <label for="">Date fin</label>
                    <input type="date" name="date_fin" class="form-control">
                    <?php echo @$messagedate_fin ?>
                </div>
            </div>
            <div class="col-lg">
                <label for="">Commentaire</label>
                <textarea type="texteria" name="commentaire" style="height: 100px" class="form-control"></textarea>
                <?php echo @$messagedate_fin ?>
            </div>
            <br>
            <input type="submit" class="btn btn-danger" name="Cancel" value="Cancel">
            <input type="submit" class="btn btn-primary" name="valider" value="Valider">
        </form>
    </div>
</body>

</html>