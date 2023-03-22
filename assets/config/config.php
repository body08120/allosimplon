<?php
// Paramètres de connexion à la base de données
define('DB_HOST', 'localhost'); // nom de l'hôte
define('DB_NAME', 'allosimplon'); // nom de la base de données
define('DB_USER', 'root'); // nom d'utilisateur de la base de données
define('DB_PASSWORD', ''); // mot de passe de l'utilisateur de la base de données

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    // Si une erreur survient, on configure PDO pour qu'il renvoie une exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
    die();
} 



// Vérification pour afficher un message indiquant si la connexion à la base de données a réussi ou échoué :
// if ($pdo->errorCode() !== null) {
//   echo "Erreur de connexion à la base de données: ";
//   $error = $pdo->errorInfo();
//   echo $error[2];
//   die();
// } else {
//   echo "Connexion à la base de données réussie.";
// }
?>