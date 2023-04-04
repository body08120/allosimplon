<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // echo "toz";
    } else {
        // Jeton CSRF valide, traiter le formulaire
    }
}
require_once('../../assets/config/config.php');
$nom = htmlspecialchars($_POST['nom-user']);
$prenom = htmlspecialchars($_POST['prenom-user']);
$email = htmlspecialchars($_POST['mail-user']);
$pseudo = htmlspecialchars($_POST['pseudo-user']);
$password = htmlspecialchars($_POST['mdp-user']);
$repassword = htmlspecialchars($_POST['remdp-user']);

// Vérification si les champs obligatoires sont bien remplis
if (empty($nom) || empty($prenom) || empty($email) || empty($pseudo) || empty($password) || empty($repassword)) {
    echo "Veuillez remplir tous les champs obligatoires.";
    die();
}

// Vérification de l'email avec une expression régulière
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "L'email n'est pas valide.";
    $_SESSION['error_message_email1'] = "Cet email est déjà utilisé.";
    header('Location: ../formulaires/inscription.php');
    exit();
}

// Vérification si l'email est déjà utilisé
$stmt = $pdo->prepare("SELECT * FROM users WHERE mail_user = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user) {
    $_SESSION['error_message_email'] = "Cet email est déjà utilisé.";
    header('Location: ../formulaires/inscription.php');
    exit();
}

// Vérification longueur mot de passe
if (strlen($password) < 8) {
    $_SESSION['error_message_mdp'] = "Le mot de passe doit contenir au moins 8 caractères.";
    header('Location: ../formulaires/inscription.php');
    exit();
}

// Vérification du mot de passe
if ($password !== $repassword) {
    $_SESSION['error_message_mdp1'] = "les mot de passe ne correspondent pas.";
    header('Location: ../formulaires/inscription.php');
    exit();
} else {

}
// Hashage du mot de passe avant enregistrement dans la base de données
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$role = '1';
// Enregistrement de l'utilisateur dans la base de données
$stmt = $pdo->prepare("INSERT INTO users (nom_user, prenom_user, mail_user, pseudo_user, mdp_user, id_role) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $nom);
$stmt->bindParam(2, $prenom);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $pseudo);
$stmt->bindParam(5, $hashed_password);
$stmt->bindParam(6, $role);
$stmt->execute();



header('location: ../formulaires/connexion.php');
?>