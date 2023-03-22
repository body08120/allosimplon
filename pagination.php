<?php
require_once('assets/config/config.php');

$sql = 'SELECT * FROM `films` ORDER BY `date_film` DESC;';

// On prépare la requête
$query = $pdo->prepare($sql);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$films = $query->fetchAll(PDO::FETCH_ASSOC);

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
        <table class="table">
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
</body>

</html>