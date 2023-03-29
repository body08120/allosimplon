<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../../assets/config/config.php");

if (isset($_GET['id'])) {

    $film_id = $_GET['id'];

    $sql = "DELETE FROM films WHERE id_film = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $film_id);
    $result = $stmt->execute();


    if ($result) {
        echo 'Record deleted successfully. <br> <a href="../admin-view.php">Retour au panneau administration</a>';
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

}

?>