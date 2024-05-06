<?php
class User
{
    private $login;
    private $password;
    private $nom;
    private $cin;
    private $date_naiss;
    private $mail;
    private $role;
    public function __construct($login, $password, $nom, $cin, $dateN, $mail, $role)
    {
        $this->login = $login;
        $this->password = $password;
        $this->nom = $nom;
        $this->cin = $cin;
        $this->date_naiss = $dateN;
        $this->mail = $mail;
        $this->role = $role;
    }
    public function getlogin()
    {
        return $this->login;
    }
    public function getpassword()
    {
        return $this->password;
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
        return $this->nom;
    }
    public static function add_User($user)
    {
        include('../Controlleur/Connexion.php');
        $sql = $cnx->prepare("INSERT INTO utilisateur (login,password,nom,cin,date_naiss,email,role) VALUES (?,?,?,?,?,?,?)");
        $sql->bindParam(1, $user->login);
        $sql->bindParam(2, $user->password);
        $sql->bindParam(3, $user->nom);
        $sql->bindParam(4, $user->cin);
        $sql->bindParam(5, $user->date_naiss);
        $sql->bindParam(6, $user->mail);
        $sql->bindParam(7, $user->role);
        $i = $sql->execute();
        if ($i > 0) {
            header('Location:../View/inscription.php');
            "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='../View/Authentification.php'>connecter</a></p>
       </div>";
        } else {
            echo "Erreur de la connxion";
        }
    }
    /*************************************************************************************************************************************** */
    public static function FindById_User($login)
    {
        include('../Controlleur/Connexion.php');
        try {
            $result = $cnx->prepare("SELECT* FROM Mission where login=$login");
            $sql->bindParam(1, $login);
            $result->execute();
            if (!$result) {
                echo "lecture imposible";
            } else {
                $lignes = $result->fetchAll();
                foreach ($lignes as $ligne) {
                    return new User($ligne['login'], $ligne['password'], $ligne['nom'], $ligne['cin'], $ligne['date_naiss'], $ligne['email'], $ligne['role']);
                }
                $result->closeCursor();
            }
        } catch (PDOException $e) {
            echo 'Echec de la connexion :' . $e->getMessage();
        }
    }
    /*********************************************************************************************************************************************/
    public static function getAllChauffeur()
    {
        include('../Controlleur/Connexion.php');
        $result = $cnx->query("SELECT* FROM utilisateur where role=0");
        $result->setFetchMode(PDO::FETCH_OBJ);
        $lesUtilisateurs = $result->fetchAll();
        foreach ($lesUtilisateurs as $u) {
            echo '<option value=' . $u->login . '>' . $u->nom . '</option>';
        }
    }
}
