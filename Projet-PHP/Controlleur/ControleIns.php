<?php
// Recueillir les données POST
$cin = $_POST['cin'] ?? null;
$nom = $_POST['nom'] ?? null;
$email = $_POST['mail'] ?? null;
$login = $_POST['login'] ?? null;
$motP = $_POST['motPass'] ?? null;
$cmotP = $_POST['Cofpass'] ?? null;

if (isset($_POST['submit'])) {
    $errors = [];

    // Vérification des champs vides
    if (empty($cin)) $errors[] = 'CIN laissé vide.';
    if (empty($nom)) $errors[] = 'Nom laissé vide.';
    if (empty($email)) $errors[] = 'Email laissé vide.';
    if (empty($login)) $errors[] = 'Login laissé vide.';
    if (empty($motP)) $errors[] = 'Mot de passe laissé vide.';
    if ($motP !== $cmotP) $errors[] = 'Les mots de passe ne sont pas identiques.';

    // Si aucune erreur, tenter l'insertion dans la base
    if (empty($errors)) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=parc;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("INSERT INTO utilisateur(login, password, nom, cin, email, role) VALUES (:login, :motP, :nom, :cin, :email, '0')");
            $stmt->bindParam(':cin', $cin);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':motP', $motP);
            $stmt->execute();

            header('Location: ../View/Authentification.php');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur de base de données : " . $e->getMessage();
        }
    }

    // Afficher les erreurs s'il y en a
    foreach ($errors as $error) {
        echo "<div class='erreur'>$error</div>";
    }
}
?>
