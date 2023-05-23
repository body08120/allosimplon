<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // Jeton CSRF invalide, traiter l'erreur
    } else {
        // Jeton CSRF valide, traiter le formulaire
    }
}
session_destroy();
header('Location: /projets/allosimplon/index.php');
?>