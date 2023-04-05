<?php
session_start();
$id_film = $_SESSION['id_film'];

$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /projets/allosimplon/index.php');
}




include_once("../../../../assets/config/config.php");
// var_dump($_POST);
// die();

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'selectionner') {

        //On stock donnée reccueillit 
        $acteur = $_POST['acteur'];

        // On insère l'id realisateur et l'id film dans la table relationnel associé
        $stmt = $pdo->prepare("INSERT INTO possede2 (id_acteur, id_film) VALUES (?, ?)");
        $stmt->bindParam(1, $acteur);
        $stmt->bindParam(2, $id_film);
        $stmt->execute();

        header('Location: confirm_acteur.php');


    } elseif ($_POST['action'] == 'ajouter') {

        //On stock donnée reccueillit 
        $image = $_POST['img_acteur'];
        $nom = $_POST['nom_acteur'];
        $desc = $_POST['desc_acteur'];

        // Enregistrement du film dans la db
        $stmt = $pdo->prepare("INSERT INTO acteurs (img_acteur, nom_acteur, desc_acteur) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $image);
        $stmt->bindParam(2, $nom);
        $stmt->bindParam(3, $desc);
        $stmt->execute();

        // On récupère l'id du réalisateur qu'on vient d'ajouter
        $id_acteur = $pdo->lastInsertId();
        $_SESSION['id_acteur'] = $id_acteur;
        // ID film récupérer en haut de page !!


        // On insère l'id realisateur et l'id film dans la table relationnel associé
        $stmt = $pdo->prepare("INSERT INTO possede2 (id_acteur, id_film) VALUES (?, ?)");
        $stmt->bindParam(1, $id_acteur);
        $stmt->bindParam(2, $id_film);
        $stmt->execute();

        header('Location: confirm_acteur.php');

    }
}
?>