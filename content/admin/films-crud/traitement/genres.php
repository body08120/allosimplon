<?php
session_start();
$id_film = $_SESSION['id_film'];

$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}




if (isset($_POST['submit'])) {
    // On stock les données envoyer dans des variables
    $genre = $_POST['genre'];
    
    // On insère l'id genre et l'id film dans la table relationnel associé
}