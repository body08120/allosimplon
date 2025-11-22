<?php
// Inclure le fichier de connexion à la base de données
require_once('../../assets/config/config.php');

// Récupérer la valeur de recherche à partir de la requête GET
$searchTerm = $_GET['search-input-catalogue'];

// Effectuer la requête de recherche dans la base de données
$stmt = $pdo->prepare("SELECT * 
                        FROM films 
                        WHERE nom_film 
                        LIKE ?");
                        
$stmt->execute(["%$searchTerm%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les résultats de la recherche
foreach ($results as $film) {
    echo '<div class="w-4/5 h-96 mx-auto my-9">
     <div class="mx-auto my-2 text-center h-96">
     <a href="/content/pages/film.php?id=' . $film['id_film'] . '">
     <img class="h-96 mx-auto" src="' . $film['img_film'] . '" alt="Affiche" />
     <span>' . $film['nom_film'] . '</span>
     </a></div></div>';
}
?>