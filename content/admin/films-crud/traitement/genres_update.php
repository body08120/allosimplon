<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /projets/allosimplon/index.php');
}

// var_dump($_POST['genres']);
// die();


if (isset($_GET['id'])) {
    // On récupère l'id du film en cours de modification
    $film_id = $_GET['id'];

    // Si au moins une case est cochée 
    if (!empty($_POST)) {

        // Connexion db
        include_once("../../../../assets/config/config.php");



        // On récup les données
        $genre_ids = $_POST['genres'];
        // var_dump($chk);
        // die();

        // On supprime les lignes de la table possede ayant l'id_film correspondant à l'id du film en cours de modification
        $sql = "DELETE FROM possede
                WHERE id_film = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $film_id);
        $del = $stmt->execute();
        if ($del == 1) {
            // echo 'del réussi';
        } else {
            // echo 'del pas réussi';
        }


        // On ajoute dans la table possede, l'id du film en modification, et l'id des genres associés
        foreach ($genre_ids as $genre_id) {
        $sql = "INSERT INTO possede (id_genre, id_film) VALUES ('$genre_id', '$film_id')";
        $stmt = $pdo->prepare($sql);
        $up = $stmt->execute();
        if ($up == 1) {
            // echo 'up réussi';
        } else {
            // echo 'up pas réussi';
        }

        header('Location: ../admin-update.php?id=' . $film_id);
        // Renvoyez sur l'update
   } }  else {
        echo '<a href="../admin-update.php?id='. $film_id .'">Veuillez selectionnez au moins un champ</a>';
        // header('Location: ../admin-update.php?id=' . $film_id);
    }
}
?>