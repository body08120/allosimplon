<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../../assets/config/config.php");


// Récupération données formulaires si formulaire n'est pas vide
if (isset($_POST['update'])) {

    $id = $_POST['id-film'];
    $img = $_POST['img-film'];
    $titre = $_POST['nom-film'];
    $date = $_POST['date-film'];
    $synopsis = $_POST['synopsis-film'];
    $ba = $_POST['ba-film'];


    //On prépare la reqûte de modification et puis on l'exécute 
    $sql = "UPDATE films SET img_film=:img, nom_film=:titre, date_film=:date, synopsis_film=:synopsis, ba_film=:ba WHERE id_film=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':synopsis', $synopsis);
    $stmt->bindParam(':ba', $ba);
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if ($result) {
        echo 'Record updated successfully. <br> <a href="../admin-view.php">Retour au panneau administration</a>';
    } else {
        $error = $stmt->errorInfo();
        echo "Error: " . $error[2];
    }

}
?>