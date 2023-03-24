<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
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