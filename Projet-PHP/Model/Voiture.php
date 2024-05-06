<?php
class Voiture
{
    private $matricule;
    private $marque;
    private $couleur;
    private $date;
    private $etat;
    public function __construct($matricule, $marque, $couleur, $date, $etat)
    {
        $this->matricule = $matricule;
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->date = $date;
        $this->etat = $etat;
    }
    public function __get($name)
    {
        if (!isset($this->$name))
            return   "erreur";
        else
            return ($this->$name);
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __isset($name)
    {
        return isset($this->$name);
    }

    public function __toString()
    {
        return $this->marque . " " . $this->couleur;
    }
    /*************************************************************************************************************************/
    public static function FindAll_MissionEnAttente()
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("SELECT* FROM mission where etat=0");
            $sql->bindParam(1, $id);
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {
                    $voiture = new Voiture($ligne['matricule'], $ligne['marque'], $ligne['couleur'], $ligne['date'], $ligne['etat']);
                    echo  "$voiture";
                }
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /*****************************************************************************************************************************************************/
    public static function FindAll_Voiture()
    {
        include('../Controlleur/Connexion.php');
        $lesVoitures = "<select>";
        try {
            $result = $cnx->prepare("SELECT* FROM voiture");
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {
                    $voiture = new Voiture($ligne['matricule'], $ligne['marque'], $ligne['couleur'], $ligne['date'], $ligne['etat']);
                    $lesVoitures = $lesVoitures . "<option>$voiture</option>";
                }
                $lesVoitures = $lesVoitures . "</select>";
                return $lesVoitures;
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /*********************************************************************************************************************************************/
    public static function getAllVoiture()
    {
        include('../Controlleur/Connexion.php');
        $result = $cnx->query("SELECT * FROM voiture");
        $result->setFetchMode(PDO::FETCH_OBJ);
        $lesVoitures = $result->fetchAll();
        foreach ($lesVoitures as $v) {
            echo '<option value=' . $v->matricule . '>' . $v->marque . '</option>';
        }
    }
}
