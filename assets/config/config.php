<?php
// Détection automatique de l'environnement (Docker ou Local)
$isDocker = @fsockopen('mysql', 3306, $errno, $errstr, 1) !== false;

if ($isDocker) {
    // Configuration Docker
    define('DB_HOST', 'mysql');
    define('DB_NAME', 'allosimplon');
    define('DB_USER', 'allosimplon_user');
    define('DB_PASSWORD', 'allosimplon_pass');
} else {
    // Configuration locale (WAMP/LAMP)
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'allosimplon');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
}

// Configuration production (commentée)
// define('DB_HOST', 'db5011787055.hosting-data.io');
// define('DB_NAME', 'dbs9929005');
// define('DB_USER', 'dbu5557557');
// define('DB_PASSWORD', '339ceFsJ');

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