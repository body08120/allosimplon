<?php
session_start();
include_once("../../../assets/config/config.php");

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);
    $result = $stmt->execute();


    if ($result) {
        echo "Record deleted successfully.";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

}

?>