<?php
session_start();
$id_film = $_SESSION['id_film'];

$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../../assets/config/config.php");




if (isset($_POST['submit'])) {
    // On stock les données envoyer dans des variables
    $genre = $_POST['genre'];
    
    // On insère l'id genre et l'id film dans la table relationnel associé
    $stmt = $pdo->prepare("INSERT INTO possede (id_genre, id_film) VALUES (?, ?)");
    $stmt->bindParam(1, $genre);
    $stmt->bindParam(2, $id_film);
    $stmt->execute();

    header('Location: ../film_realisateur.php');


} else {
    echo 'Une erreur est survenue. Actualiser la page';
}