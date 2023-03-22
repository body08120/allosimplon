<?php

// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

require_once('assets/config/config.php');


// On détermine le nombre total de films
$sql = 'SELECT COUNT(*) AS nb_films FROM `films`;';
// On prépare la requête
$query = $pdo->prepare($sql);
// On exécute
$query->execute();
// On récupère le nombre d'articles
$result = $query->fetch();
$nbFilms = (int) $result['nb_films'];

//------------------------------

// On détermine le nombre d'articles par page
$parPage = 10;
// On calcule le nombre de pages total
$pages = ceil($nbFilms / $parPage);

//------------------------------

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `films` ORDER BY `date_film` DESC LIMIT :premier, :parpage;';
// On prépare la requête
$query = $pdo->prepare($sql);
$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
// On exécute
$query->execute();
// On récupère les valeurs dans un tableau associatif
$films = $query->fetchAll(PDO::FETCH_ASSOC);

//------------------------------

// On récupère ce les films à afficher par date
$sql = 'SELECT * FROM `films` ORDER BY `date_film` DESC;';
// On prépare la requête
$query = $pdo->prepare($sql);
// On exécute
$query->execute();
// On récupère les valeurs dans un tableau associatif
$films = $query->fetchAll(PDO::FETCH_ASSOC);

//------------------------------

require_once('assets/config/close.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <table>
            <thead>
                <th>films</th>
            </thead>
            <tbody>
                <?php
                // On boucle sur tous les articles
                foreach ($films as $film) {
                    ?>
                    <tr>
                        <td>
                            <img src="<?= $film['img_film'] ?>" alt="Affiche" />
                            <br><br>
                            <span>
                                <?= $film['nom_film'] ?>
                            </span>
                            <br><br>
                            <span>
                                <?= $film['date_film'] ?>
                            </span>
                            <br><br>
                            <p>
                                <?= $film['synopsis_film'] ?>
                            </p>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <nav>
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="pagination.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="pagination.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="pagination.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
</body>

</html>