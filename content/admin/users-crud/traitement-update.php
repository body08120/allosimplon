<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../assets/config/config.php");


// Récupération données formulaires si formulaire n'est pas vide
if (isset($_POST['update'])) {

    $id = $_POST['id-user'];
    $nom = $_POST['nom-user'];
    $prenom = $_POST['prenom-user'];
    $email = $_POST['mail-user'];
    $password = $_POST['mdp-user'];
    $role = $_POST['id-role'];

    // Hashage du mot de passe avant enregistrement dans la base de données
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //On prépare la reqûte de modification et puis on l'exécute 
    $sql = "UPDATE users SET nom_user=:nom, prenom_user=:prenom, email_user=:email, mdp_user=:password, role_user=:role WHERE id_user=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if ($result) {
        echo 'Record updated successfully. <br> <a href="admin-view.php">Retour au panneau administration</a>';
    } else {
        $error = $stmt->errorInfo();
        echo "Error: " . $error[2];
    }

}
?>