<?php
session_start();

// if ($_SESSION['logged_in'] === true){
//     header('Location: http://localhost/allosimplon/index.php');
// }

require_once('../../assets/config/config.php');

$email = htmlspecialchars($_POST['mail-user']);
$password = htmlspecialchars($_POST['mdp-user']);



// Vérification si les champs email et mot de passe sont bien remplis
if (empty($email) || empty($password)) {
    echo "Veuillez remplir tous les champs.";
    die();
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

    header('location: /allosimplon/index.php');

} else {
    echo "Identifiants incorrects.";
    // header('location: error.php');
}
?>
