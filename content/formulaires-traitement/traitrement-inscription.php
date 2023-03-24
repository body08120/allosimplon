<?php
session_start();
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

// Vérification si l'email est déjà utilisé
$stmt = $pdo->prepare("SELECT * FROM users WHERE mail_user = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user) {
    echo "Cet email est déjà utilisé.";
    die();
}

// Vérification du mot de passe
if($password !== $repassword) {
    echo 'les mot de passe ne correspondent pas';
    die();
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


// On stock les données user dans une session
// $_SESSION['nom-user'] = $nom;
// $_SESSION['prenom-user'] = $prenom;
// $_SESSION['pseudo-user'] = $pseudo;



header('location: ../formulaires/connexion.php');
?>

