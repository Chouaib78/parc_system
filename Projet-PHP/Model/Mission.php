<?php
class Mission
{
    protected $idMission;
    private $objectif;
    private $ville;
    private $description;
    private $date_debut;
    private $date_fin;
    private $etat;
    private $commentaire;
    private $login;
    private $matricule;

    public function __construct($i, $objectif, $ville, $des, $date_d, $date_f, $etat, $commentaire, $login, $matricule)
    {
        $this->idMission = $i;
        $this->objectif = $objectif;
        $this->ville = $ville;
        $this->description = $des;
        $this->date_debut = $date_d;
        $this->date_fin = $date_f;
        $this->etat = $etat;
        $this->commentaire = $commentaire;
        $this->login = $login;
        $this->matricule = $matricule;
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
        $resul = "<tr><td><a href=\"../View/DescriptionMissionUser.php?idMission=" . $this->idMission . "\">Description Mission</a></td><td>$this->ville</td><td>$this->matricule</td><td>$this->date_debut</td><td>$this->date_fin</td>";
        if ($this->etat == 0) {
            $resul = $resul . "<td><a href=\"../Controlleur/MissionLancer.php?id=" . $this->idMission . "\">Lancer mission</a></td><br>";
        }
        if ($this->etat == 1) {
            $resul = $resul . "<td><a href=\"../View/MissionFinalisee.php\">En cours</a></td><br>";
        }
        if ($this->etat == 2) {
            $resul = $resul . "<td><a href=\"../Controlleur/Finaliser.php?id" . $this->idMission . "\">Finalisée<a/></td>";
        }
        $resul = $resul . "</tr>";
        return $resul;
    }
    /**********************************************************************************************************************/
    public static function UpdateEtatMissionLancerCour($idM)
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("UPDATE mission set etat=1 where idMission=?");
            $result->bindParam(1, $idM);
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /**********************************Aprés authentification d'un Chauffeur(utilisateur)*************************************************************************************************************************************************/
    public static function FindAll_Mission_User($id_chauffeur)
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("SELECT* FROM mission where login=?");
            $result->bindParam(1, $id_chauffeur);
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {

                    $mission = new Mission(
                        $ligne['idmission'],
                        $ligne['objectif'],
                        $ligne['ville'],
                        $ligne['description'],
                        $ligne['date_debut'],
                        $ligne['date_fin'],
                        $ligne['etat'],
                        $ligne['commentaire'],
                        $ligne['login'],
                        $ligne['matricule']
                    );
                    echo $mission;
                }
                echo "</table>";
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /********************Aprés authentification d'un administrateur*******************************************************************/
    public static function FindAll_Mission_Admin()
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("SELECT* FROM mission");
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {
                    $id = $ligne['idmission'];
                    $obj = $ligne['objectif'];
                    $ville = $ligne['ville'];
                    $description = $ligne['description'];
                    $date_d = $ligne['date_debut'];
                    $date_f = $ligne['date_fin'];
                    $etat = $ligne['etat'];
                    $comm = $ligne['commentaire'];
                    $login = $ligne['login'];
                    $matricule = $ligne['matricule'];
                    echo  "<tr><td><a href=\"../View/DescriptionMissionAdmin.php?idMission=" . $id . "\">$obj</a></td><td>$ville</td><td>$login</td><td>$date_d</td><td>$date_f</td><td>$comm</td><td>$etat</td></tr>";
                }
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /*****************La methode de la page mission en attente****************************************************************************************/
    public static function FindAll_MissionEnAttente()
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("SELECT* FROM mission where etat=1");
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {
                    $id = $ligne['idmission'];
                    $obj = $ligne['objectif'];
                    $ville = $ligne['ville'];
                    $description = $ligne['description'];
                    $date_d = $ligne['date_debut'];
                    $date_f = $ligne['date_fin'];
                    $etat = $ligne['etat'];
                    $comm = $ligne['commentaire'];
                    $login = $ligne['login'];
                    $matricule = $ligne['matricule'];
                    echo  "<tr><td>$obj</td><td>$ville</td><td>$login</td><td>$date_d</td><td>$date_f</td><td>$comm</td><td>Mission en attente</td><td><a href=\"AnnulerMission.php?idmission=" . $id . "\">Annuler</a></td></tr>";
                }
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /***************La methode de la page Description mission***************************************************************/
    public static function FindAll_Mission($id)
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("SELECT* FROM mission where idmission=?");
            $result->bindParam(1, $id);
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {
                    $idM = $ligne['idmission'];
                    $ob = $ligne['objectif'];
                    $ville = $ligne['ville'];
                    $description = $ligne['description'];
                    $date_d = $ligne['date_debut'];
                    $date_f = $ligne['date_fin'];
                    $cmt = $ligne['commentaire'];
                    $login = $ligne['login'];
                    $matricule = $ligne['matricule'];
                    if ($ligne['etat'] == 0) {
                        $etat = "En attente";
                    }
                    if ($ligne['etat'] == 1) {
                        $etat = "En cours";
                    }
                    if ($ligne['etat'] == 2) {
                        $etat = "Finalisée";
                    }
                    echo "<tr><td>$ob</td><td>$ville</td><td>$description</td><td>$date_d</td><td>$date_f</td><td>$cmt</td><td>$login</td><td>$matricule</td><td>$etat</td></tr>";
                }
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /*************************La methode qui permet d'ajouter une mission*********************************************************************************************/
    public static function add_Mission($mission)
    {
        include('../Controlleur/Connexion.php');
        $sql = $cnx->prepare("INSERT INTO mission (objectif,ville,description,date_debut,date_fin,etat,commentaire,login,matricule) VALUES (?,?,?,?,?,?,?,?,?)");
        $sql->bindParam(1, $mission->objectif);
        $sql->bindParam(2, $mission->ville);
        $sql->bindParam(3, $mission->description);
        $sql->bindParam(4, $mission->date_debut);
        $sql->bindParam(5, $mission->date_fin);
        $sql->bindParam(6, $mission->etat);
        $sql->bindParam(7, $mission->commentaire);
        $sql->bindParam(8, $mission->login);
        $sql->bindParam(9, $mission->matricule);
        $i = $sql->execute();
        if ($i > 0) {
            header('Location:../Controlleur/administrateur.php');
        } else {
            echo "Erreur de la connxion";
        }
    }
    /********************************************************************************************************************/
    public static function finaliserMission()
    {
    }
    /*******************************************************************************************************************/
    public static function DeleteMissionEnAttente($idMission)
    {
        include('connexion.php');
        $sql = $cnx->prepare("DELETE FROM mission where idmission=?");
        $sql->bindParam(1, $idMission);
        $i = $sql->execute();
        if ($i > 0) {
            header('Location: ../Controlleur/MissionEnAttente.php');
        } else {
            echo "Erreur de la connxion";
        }
    }
}
