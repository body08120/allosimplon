<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}

// var_dump($_GET);
// die();


if (isset($_GET['id'])) {
    $film_id = $_GET['id'];

    if (!empty($_POST)) {

        include_once("../../../../assets/config/config.php");


        // On supprime les lignes de la table possede ayant l'id_film correspondant à l'id du film en cours de modification
        $sql = "DELETE FROM possede
                WHERE id_film = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $film_id);
        $result = $stmt->execute();


        // On ajoute dans la table possede, l'id du film en modification, et l'id des genres associés


    } else {
        echo "Veuillez selectionnez au moins un champ";
    }
}
?>