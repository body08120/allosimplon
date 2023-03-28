<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../../assets/config/config.php");


if (isset($_POST['submit'])) {

    // On stock les données envoyer dans des variables
    $affiche = $_POST['img_film'];
    $titre = $_POST['nom_film'];
    $date = $_POST['date_film'];
    $synopsis = $_POST['synopsis_film'];
    $ba = $_POST['ba_film'];

    // Enregistrement du film dans la db
    $stmt = $pdo->prepare("INSERT INTO films (img_film, nom_film, date_film, synopsis_film, ba_film) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $affiche);
    $stmt->bindParam(2, $titre);
    $stmt->bindParam(3, $date);
    $stmt->bindParam(4, $synopsis);
    $stmt->bindParam(5, $ba);
    $stmt->execute();

    $id_film = $pdo->lastInsertId();
    $_SESSION['id_film'] = $id_film;


    header('Location: ../film_genre.php');
} else {
    echo 'Une erreur est survenue, <a href="admin-create.php">Cliquez pour réessayer</a>';
}
include_once("../../../assets/config/close.php");

?>