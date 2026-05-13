<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../assets/config/config.php");


// Récupération données formulaires si formulaire n'est pas vide
if (isset($_POST['update'])) {

    $id     = (int) $_POST['id-user'];
    $nom    = trim($_POST['nom-user']);
    $prenom = trim($_POST['prenom-user']);
    $email  = trim($_POST['mail-user']);
    $mdp    = $_POST['mdp-user'];
    $role   = (int) $_POST['id-role'];

    if (!empty($mdp)) {
        $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET nom_user=:nom, prenom_user=:prenom, email_user=:email, mdp_user=:password, role_user=:role WHERE id_user=:id";
        $params = [':nom'=>$nom, ':prenom'=>$prenom, ':email'=>$email, ':password'=>$hashed_password, ':role'=>$role, ':id'=>$id];
    } else {
        $sql = "UPDATE users SET nom_user=:nom, prenom_user=:prenom, email_user=:email, role_user=:role WHERE id_user=:id";
        $params = [':nom'=>$nom, ':prenom'=>$prenom, ':email'=>$email, ':role'=>$role, ':id'=>$id];
    }

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute($params);

    if ($result) {
        header('Location: /content/admin/users-crud/admin-view.php');
        exit;
    } else {
        $error = $stmt->errorInfo();
        echo "Erreur : " . $error[2];
    }

}
?>