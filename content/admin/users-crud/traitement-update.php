<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../assets/config/config.php");


// Récupération données formulaires si formulaire n'est pas vide
if (isset($_POST['update'])) {

    $id = $_POST['id-user'];
    $nom = $_POST['nom-user'];
    $prenom = $_POST['prenom-user'];
    $email = $_POST['mail-user'];
    $pseudo = $_POST['pseudo-user'];
    $password = $_POST['mdp-user'];
    $role = $_POST['id-role'];

    //On prépare la reqûte de modification et puis on l'exécute 
    $sql = "UPDATE users SET nom_user=:nom, prenom_user=:prenom, mail_user=:email, pseudo_user=:pseudo, mdp_user=:password, id_role=:role WHERE id_user=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    // $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if ($result) {
        echo "Record updated successfully.";
    } else {
        $error = $stmt->errorInfo();
        echo "Error: " . $error[2];
    }

}
?>