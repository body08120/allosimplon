<?php
session_start();

//On vérifie qu'on est bien en post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On vérifie si le jeton est vide ou ne correspond pas au jeton stocké dans la session
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo "toz";
        die();
    } else {
        // Jeton CSRF valide, on traite le formulaire
    }
}

require_once('../../assets/config/config.php');

$email = htmlspecialchars($_POST['mail-user']);
$password = htmlspecialchars($_POST['mdp-user']);



// Vérification si les champs email et mot de passe sont bien remplis
if (empty($email) || empty($password)) {
    $_SESSION['error_co_vide'] = "Veuillez remplir tous les champs.";
    header('Location: ../formulaires/connexion.php');
    exit();
}



// Recherche de l'utilisateur dans la base de données
$stmt = $pdo->prepare("SELECT * FROM users WHERE mail_user = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();



// Si l'utilisateur est trouvé et que le mot de passe est correct, on ouvre une session pour cet utilisateur
if ($user && password_verify($password, $user["mdp_user"])) {
    $_SESSION['logged_in'] = true;
    $_SESSION['mail-user'] = $_POST['mail-user'];
    $_SESSION['pseudo_user'] = $user['pseudo_user'];
    $_SESSION['role_user'] = $user['id_role'];

    header('location: /projets/allosimplon/index.php');
} else {
    $_SESSION['error_co_incor'] = "Adresse email ou mot de passe incorrect.";
    header('Location: ../formulaires/connexion.php');
    exit();
}
?>
