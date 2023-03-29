<?php
session_start();
$id_film = $_SESSION['id_film'];

$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}




include_once("../../../../assets/config/config.php");
// var_dump($_POST);
// die();

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'selectionner') {

        //On stock donnée reccueillit 
        $realisateur = $_POST['realisateur'];

        // On insère l'id realisateur et l'id film dans la table relationnel associé
        $stmt = $pdo->prepare("INSERT INTO tourner (id_realisateur, id_film) VALUES (?, ?)");
        $stmt->bindParam(1, $realisateur);
        $stmt->bindParam(2, $id_film);
        $stmt->execute();

        header('Location: confirm_realisateur.php');


    } elseif ($_POST['action'] == 'ajouter') {

        //On stock donnée reccueillit 
        $image = $_POST['img_realisateur'];
        $nom = $_POST['nom_realisateur'];
        $desc = $_POST['desc_realisateur'];

        // Enregistrement du film dans la db
        $stmt = $pdo->prepare("INSERT INTO realisateurs (img_realisateur, nom_realisateur, desc_realisateur) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $image);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $desc);
        $stmt->execute();

        // On récupère l'id du réalisateur qu'on vient d'ajouter
        $id_realisateur = $pdo->lastInsertId();
        $_SESSION['id_realisateur'] = $id_realisateur;

        // On insère l'id realisateur et l'id film dans la table relationnel associé
        $stmt = $pdo->prepare("INSERT INTO tourner (id_realisateur, id_film) VALUES (?, ?)");
        $stmt->bindParam(1, $id_realisateur);
        $stmt->bindParam(2, $id_film);
        $stmt->execute();

        header('Location: confirm_realisateur.php');

    }
}
?>